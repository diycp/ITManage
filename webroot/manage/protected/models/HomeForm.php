<?php
class HomeForm extends FormModel
{
    public $userID;
    public $status;
    public $career;

    public function search()
    {
        $response = ['code' => -1, 'message' => '', 'data' => []];
        $criteria = new CDbCriteria();
        $criteria->select = "tbDuty.id, tbDuty.fdName, tbDutyStatus.fdName sname, tbDutyPrority.fdName pname";
        $tablename = "{$this->im}.tbDuty";
        $criteria->join = "INNER JOIN {$this->im}.tbDutyStatus ON tbDutyStatus.id = tbDuty.fdStatusID
        INNER JOIN {$this->im}.tbDutyPrority ON tbDutyPrority.id = tbDuty.fdPrority";
        $criteria->addCondition("tbDuty.{$this->career} = {$this->userID}");
        $criteria->compare('tbDuty.fdStatusID', $this->status);
        // $criteria->params = [':userID' => $this->userID];
        $criteria->order = 'tbDuty.fdPrority DESC';
        $table = Yii::app()->db->commandBuilder->createFindCommand($tablename, $criteria, 'tbDuty')->queryAll();
        if (empty($table)) {
            $response['message'] = 'empty';
            return $response;
        }
        $result = [];
        foreach ($table as $row) {
            $row['url'] = Yii::app()->getController()->createUrl('duty/index',['id'=>$row['id']]);
            $result[$row['sname']][] = $row;
        }
        $response['code'] = 0;
        $response['message'] = 'ok';
        $response['data']['list'] = $result;
        return $response;
    }

    public function formatArr($arr)
    {
        $newArr = [];
        foreach ($arr as $row) {
            $newArr[$row['fdName']][] = $response;
        }
    }
}