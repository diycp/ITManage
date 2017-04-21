<?php
class DutyForm extends FormModel
{
    public $dutyID;
    public $status;
    public $dutyDesc;
    public $bugDesc;
    public $bugStatus;
    public $bugID;

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
        $duty['url'] = Yii::app()->getController()->createUrl('operate');
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
        $duty['career'] = Yii::app()->user->type;
        $response['code'] = 0;
        $response['message'] = 'ok';
        $response['data']['list'] = $duty;
        return $response;
    }

    public function updateStatus()
    {
        $response = ['code' => -1, 'message' => '', 'data' => []];
        $params = ['fdStatusID' => $this->status];
        if ($this->status == 8) {
            $params['fdCompleteTime'] = date('Y-m-d');
            $sql = "SELECT COUNT(*) bugcount, SUM(fdStatus) bugsum FROM {$this->im}.tbBugFix WHERE fdDutyID = :id";
            $row = Yii::app()->db->createCommand($sql)->queryRow(true, [':id' => $this->dutyID]);
            if(!empty($row)) {
                if ($row['bugcount'] > $row['bugsum']) {
                    $response['message'] = '尚有bug未处理，请检测';
                    return $response;
                }
            }
        }
        $result = Yii::app()->db->createCommand()->update("{$this->im}.tbDuty", $params, 'id = :id', [':id' => $this->dutyID]);
        if (!$result) {
            $response['message'] = '更新失败';
            return $response;
        }
        $this->record($this->dutyID, $this->status);
        $response['code'] = 0;
        $response['message'] = 'ok';
        return $response;
    }

    public function record($dutyID, $action)
    {
        if (empty($action) || empty($dutyID)) return false;
        $career = Yii::app()->user->career;
        $user = Yii::app()->user->nickname;
        $time = date('Y-m-d H:i:s');
        switch ($action) {
            // case 'create':
            case -1:
                $str = '创建任务</br>';
                break;
            // case 'commitDevelop':
            case 3:
                $str = '提交开发</br>';
                break;
            // case 'rollbackRequirement':
            case 1:
                $str = '打回需求</br>';
                break;
            // case 'develop':
            case 4:
                $str = '开始开发</br>';
                break;
            // case 'commitTest':
            case 6:
                $str = '提交测试</br>';
                break;
            // case 'rollbackDevelop':
            case 5:
                $str = '打回开发</br>';
                break;
            // case 'test':
            case 7:
                $str = '开始测试</br>';
                break;
            // case 'complete':
            case 8:
                $str = '确认开发完成</br>';
                break;
            // case 'cancel':
            case 9:
                $str = '取消任务</br>';
                break;
        }
        $log = $time.'   '.$career. ' : '. $user. $str;
        try {
            if ($action != -1) {
                $sql = "UPDATE {$this->im}.tbDutyLog SET fdLog = CONCAT(fdLog, :log) WHERE fdDutyID = :id";
                Yii::app()->db->createCommand($sql)->execute([':log' => $log, ':id' =>$dutyID ]);
                if(!in_array($action, [4,7,8,9])) {
                    $this->execEmail($dutyID, $action);
                }
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

    public function execEmail($dutyID, $action)
    {
        $sql = "SELECT fdManager AS manager, fdDeveloper AS developer, fdTester AS tester FROM {$this->im}.tbDuty WHERE id = :id";
        $row = Yii::app()->db->createCommand($sql)->queryRow(true, [':id' => $dutyID]);
        $role = $this->typeStatusMap($action);
        $userID = $row[$role];
        $ids = $dutyID.'-'.$userID;
        $dir = Yii::getPathOfAlias('application');
        $mount = $dir . '/models/mount.php';
        $yiic = $dir . '/yiic.php';
        exec(PHP_BIN.' ' . $yiic . "  sendemail dutynew --ids=$ids>$mount &");
    }

    public function editDuty()
    {
        $response = ['code' => -1, 'message' => '', 'data' => []];
        $result = Yii::app()->db->createCommand()->update("{$this->im}.tbDuty", [
            'fdDesc' => $this->dutyDesc
        ], 'id = :id', [':id' => $this->dutyID]);
        if(empty($result)) return $response;
        $response['code'] = 0;
        $response['message'] = 'ok';
        return $response;
    }

    public function addBug()
    {
        $response = ['code' => -1, 'message' => '', 'data' => []];
        $result = Yii::app()->db->createCommand()->insert("{$this->im}.tbBugFix", [
            'fdDutyID' => $this->dutyID,
            'fdDesc' => $this->bugDesc
        ]);
        if(empty($result)) return $response;
        $id = Yii::app()->db->getLastInsertID();
        $response['code'] = 0;
        $response['message'] = 'ok';
        $response['data']['id'] = $id;
        return $response;
    }

    public function delBug()
    {
        $response = ['code' => -1, 'message' => '', 'data' => []];
        $sql = "SELECT COUNT(*) FROM {$this->im}.tbBugFix WHERE id = :id";
        $exist = Yii::app()->db->createCommand($sql)->queryScalar([':id' => $this->bugID]);
        if(empty($exist)) return $response;
        $result = Yii::app()->db->createCommand()->delete("{$this->im}.tbBugFix",
        'id = :id',[
            ':id' => $this->bugID
        ]);
        if(empty($result)) return $response;
        $response['code'] = 0;
        $response['message'] = 'ok';
        return $response;
    }

    public function updateBug()
    {
        $response = ['code' => -1, 'message' => '', 'data' => []];
        $sql = "SELECT COUNT(*) FROM {$this->im}.tbBugFix WHERE id = :id";
        $exist = Yii::app()->db->createCommand($sql)->queryScalar([':id' => $this->bugID]);
        if(empty($exist)) return $response;
        $result = Yii::app()->db->createCommand()->update("{$this->im}.tbBugFix",[
            'fdStatus' => $this->bugStatus
        ], 'id = :id', [':id' => $this->bugID]);
        if(empty($result)) return $response;
        $response['code'] = 0;
        $response['message'] = 'ok';
        return $response;
    }

    public function getLog()
    {
        $sql = "SELECT fdLog FROM {$this->im}.tbDutyLog WHERE fdDutyID = :dutyID";
        $log = Yii::app()->db->createCommand($sql)->queryScalar([':dutyID' => $this->dutyID]);
        if(empty($log)) return '无操作日志';
        return $log;
    }

    public function getBug()
    {
        $sql = "SELECT id,fdStatus, fdDesc FROM {$this->im}.tbBugFix WHERE fdDutyID = :dutyID";
        $table = Yii::app()->db->createCommand($sql)->queryAll(true, [':dutyID' => $this->dutyID]);
        if(empty($table)) return [];
        return $table;
    }

    //判断登陆用户是否有任务操作权限
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

    public function typeStatusMap ($status)
    {
        $map = [
            '1' => 'manager',
            '2' => 'manager',
            '3' => 'developer',
            '4' => 'developer',
            '5' => 'developer',
            '6' => 'tester',
            '7' => 'tester',            
        ];
        return isset($map[$status]) ? $map[$status] : '';
    }
}