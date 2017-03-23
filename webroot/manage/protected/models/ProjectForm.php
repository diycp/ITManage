<?php
class ProjectForm extends FormModel
{
    public $id;

    public function search()
    {
        $response = ['code' => -1, 'message' => '', 'data' => []];
        $criteria = new CDbCriteria();
        $criteria->select = 'tbProject.fdName, tbProject.fdDesc, tbProject.fdTimeStart, tbProject.fdTimeEnd, tbUser.fdNickName';
        $tablename = "{$this->im}.tbProject";
        $criteria->join = "INNER JOIN {$this->im}.tbUser ON tbUser.id = tbProject.fdLeader";
        $criteria->addCondition("tbProject.id = {$this->id}");
        $row = Yii::app()->db->commandBuilder->createFindCommand($tablename, $criteria, 'tbProject')->queryRow();
        if(empty($row)) {
            $response['message'] = 'empty';
            return $response;
        }
        $response['code'] = 0;
        $response['message'] = 'ok';
        $response['data']['list'] = $row;
        return $response;
    }
}