<?php
class HomeForm extends FormModel
{
    public function search()
    {
        $response = ['code' => -1, 'message' => '', 'data' => []];
        $criteria = new CDbCriteria();
        $criteria->select = "tbUser.fdNickName, tbAnnouncement.fdName, tbAnnouncement.fdMarkdown, tbAnnouncement.fdUpdate";
        $tablename = "{$this->im}.tbAnnouncement";
        $criteria->join = "INNER JOIN {$this->im}.tbUser ON tbUser.id = tbAnnouncement.fdOperatorID";
        $criteria->addCondition("tbAnnouncement.fdSent = 1");
        $criteria->addCondition("tbAnnouncement.fdDeleted = 0");
        $criteria->order = "tbAnnouncement.fdUpdate DESC";
        $criteria->offset = 0;
        $criteria->limit = 1;
        $row = Yii::app()->db->commandBuilder->createFindCommand($tablename, $criteria, 'tbAnnouncement')->queryRow();
        if (empty($row)) {
            $response['message'] = 'empty';
            return $response;
        }
        $data = [];
        $data['name'] = $row['fdName'];
        $data['content'] = $row['fdMarkdown'];
        $data['update'] = $row['fdUpdate'];
        $data['operater'] = $row['fdNickName'];

        $response['code'] = 0;
        $response['message'] = 'ok';
        $response['data']['list'] = $data;
        return $response;
    }
}