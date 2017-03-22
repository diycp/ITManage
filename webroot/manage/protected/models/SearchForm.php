<?php
class SearchForm extends FormModel
{
    public $page = 1;
    public $length = 15;
    public $keyword;

    public function search()
    {
        $response = ['code' => -1, 'message' => '', 'data' => []];
        $sql = "SELECT duty.id, duty.fdName, duty.fdPlanTime, duty.fdCompleteTime, manager.fdNickname maname, developer.fdNickname dename, tester.fdNickname tename, tbProject.fdName prname, tbDutyPrority.fdName dpname, tbDutyType.fdName dtname, tbDutyStatus.fdName dsname 
        FROM 
        ( SELECT tbDuty.id, tbDuty.fdName, tbDuty.fdProjectID, tbDuty.fdPrority, tbDuty.fdManager, tbDuty.fdDeveloper, tbDuty.fdTester, tbDuty.fdStatusID, tbDuty.fdTypeID, fdPlanTime, fdCompleteTime FROM {$this->im}.tbDuty WHERE fdName REGEXP :keyword) AS duty
        INNER JOIN {$this->im}.tbUser AS manager ON manager.id = duty.fdManager
        INNER JOIN {$this->im}.tbUser AS developer ON developer.id = duty.fdDeveloper
        INNER JOIN {$this->im}.tbUser AS tester ON tester.id = duty.fdTester
        INNER JOIN {$this->im}.tbProject ON tbProject.id = duty.fdProjectID
        INNER JOIN {$this->im}.tbDutyPrority ON tbDutyPrority.id = duty.fdPrority
        INNER JOIN {$this->im}.tbDutyType ON tbDutyType.id = duty.fdTypeID
        INNER JOIN {$this->im}.tbDutyStatus ON tbDutyStatus.id = duty.fdStatusID";
        $table = Yii::app()->db->createCommand($sql)->queryAll(true, [':keyword' => $this->keyword]);
        if (empty($table)){
            $response['message'] = 'empty';
            return $response;
        } 
        foreach ($table as $row) {
            $duty = [];
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
            $duty['url'] = Yii::app()->getController()->createUrl('duty/index',['id'=>$row['id']]);
            $dutyList[] = $duty;
        }
        $response['code'] = 0;
        $response['message'] = 'ok';
        $response['data']['list'] = $dutyList;
        return $response;
    }
}