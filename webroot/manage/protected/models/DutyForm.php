<?php
class DutyForm extends FormModel
{
    public $dutyID;

    public function search()
    {
        $response = ['code' => -1, 'message' => '', 'data' => []];
        $sql = "SELECT duty.id,duty.fdDesc, duty.fdName, duty.fdPlanTime, duty.fdCompleteTime, manager.fdNickname maname, developer.fdNickname dename, tester.fdNickname tename, tbProject.fdName prname, tbDutyPrority.fdName dpname, tbDutyType.fdName dtname, tbDutyStatus.fdName dsname, duty.fdStatusID, developer.id AS developerID, tester.id AS testerID, manager.id AS managerID
        FROM 
        ( SELECT tbDuty.id, tbDuty.fdDesc, tbDuty.fdName, tbDuty.fdProjectID, tbDuty.fdPrority, tbDuty.fdManager, tbDuty.fdDeveloper, tbDuty.fdTester, tbDuty.fdStatusID, tbDuty.fdTypeID, fdPlanTime, fdCompleteTime FROM {$this->im}.tbDuty WHERE id = :dutyID) AS duty
        INNER JOIN {$this->im}.tbUser AS manager ON manager.id = duty.fdManager
        INNER JOIN {$this->im}.tbUser AS developer ON developer.id = duty.fdDeveloper
        INNER JOIN {$this->im}.tbUser AS tester ON tester.id = duty.fdTester
        INNER JOIN {$this->im}.tbProject ON tbProject.id = duty.fdProjectID
        INNER JOIN {$this->im}.tbDutyPrority ON tbDutyPrority.id = duty.fdPrority
        INNER JOIN {$this->im}.tbDutyType ON tbDutyType.id = duty.fdTypeID
        INNER JOIN {$this->im}.tbDutyStatus ON tbDutyStatus.id = duty.fdStatusID";
        $row = Yii::app()->db->createCommand($sql)->queryRow(true, [':dutyID' => $this->dutyID]);
        if (empty($row)){
            $response['message'] = 'empty';
            return $response;
        }
        $duty['id'] = $row['id'];
        $duty['name'] = $row['fdName'];
        $duty['plantime'] = $row['fdPlanTime'];
        $duty['completetime'] = $row['fdCompleteTime'];
        $duty['manager'] = $row['maname'];
        $duty['developer'] = $row['dename'];
        $duty['tester'] = $row['tename'];
        $duty['project'] = $row['prname'];
        $duty['prority'] = $row['dpname'];
        $duty['type'] = $row['dtname'];
        $duty['status'] = $row['dsname'];
        $duty['statusID'] = $row['fdStatusID'];
        $duty['content'] = $row['fdDesc'];
        $duty['log'] = $this->getLog();
        $duty['bug'] = $this->getBug();
        $duty['authority'] = $this->getAuthority($row['developerID'],$row['testerID'],$row['managerID'], $row['fdStatusID']);
        $response['code'] = 0;
        $response['message'] = 'ok';
        $response['data']['list'] = $duty;
        return $response;
    }

    public function record($dutyID, $action)
    {
        if (empty($action) || empty($dutyID)) return false;
        $career = Yii::app()->user->career;
        $user = Yii::app()->user->nickname;
        switch ($action) {
            case 'create':
                $str = '创建任务</br>';
                break;
            case 'commitDevelop':
                $str = '提交开发</br>';
                break;
            case 'rollbackRequirement':
                $str = '打回需求</br>';
                break;
            case 'develop':
                $str = '开始开发</br>';
                break;
            case 'commitTest':
                $str = '提交测试</br>';
                break;
            case 'rollbackDevelop':
                $str = '打回开发</br>';
                break;
            case 'test':
                $str = '开始测试</br>';
                break;
            case 'complete':
                $str = '确认开发完成</br>';
                break;
            case 'cancel':
                $str = '取消任务</br>';
                break;
        }
        $log = $career. ' : '. $user. $str;
        try {
            if (strcmp($action, 'create')) {
                $sql = "UPDATE {$this->im}.tbDutyLog SET fdLog = CONCAT(fdLog, :log) WHERE fdDutyID = :id";
                Yii::app()->db->createCommand($sql)->execute([':log' => $log, ':id' =>$dutyID ]);
            } else {
                Yii::app()->db->createCommand()->insert("{$this->im}.tbDutyLog",[
                    'fdDutyID' => $dutyID,
                    'fdLog' => $log
                ]);
            }
        } catch (Exception $e) {
            WapLogger::getLogger('itmanage')->info('更新任务日志报错：'. $e->__toString());
        }
    }

    public function getLog()
    {
        $sql = "SELECT fdLog FROM {$this->im}.tbDutyLog WHERE fdDutyID = :dutyID";
        $log = Yii::app()->db->createCommand($sql)->queryScalar([':dutyID' => $this->dutyID]);
        return $log;
    }

    public function getBug()
    {
        $sql = "SELECT fdStatus, fdDesc FROM {$this->im}.tbBugFix WHERE fdDutyID = :dutyID";
        $table = Yii::app()->db->createCommand($sql)->queryAll(true, [':dutyID' => $this->dutyID]);
        if(empty($table)) return [];
        return $table;
    }

    public function getAuthority($developer, $tester, $manager, $status)
    {
        $userID = Yii::app()->user->id;
        if (!in_array($userID, [$developer, $tester, $manager])) return 0;
        $type = Yii::app()->user->type;
        $statusIDs = $this->statusTypeMap($type);
        if (!in_array($status, $statusIDs)) return 0;
        return 1;
    }

    public function statusTypeMap ($type)
    {
        //type: 1-manager 2-developer 3-tester
        //status: 1-待确认 2-需求 3-待开发 4-开发 5-待修复 6-待测试 7-测试
        $map = [
            '2' => [1,2],
            '3' => [3,4,5],
            '4' => [6,7]
        ];
        return isset($map[$type]) ? $map[$type] : '';
    }
}