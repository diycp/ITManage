<?php
class AnnouncementForm extends FormModel
{
    public $page = 1;
    public $length = 10;

    public function list()
    {
        $response = ['code' => -1, 'message' => 'error:empty', 'data' => ['list' => []]];
        $criteria = new CDbCriteria();
        $criteria->select = "tbAnnouncement.id, tbAnnouncement.fdDesc, tbAnnouncement.fdBatch, tbAnnouncement.fdSent, tbAnnouncement.fdName, tbAnnouncement.fdUpdate, tbUser.fdNickname, tbAnnouncement.fdMarkdown";
        $tablename = "{$this->im}.tbAnnouncement";
        $criteria->join = "INNER JOIN {$this->im}.tbUser ON tbUser.id = tbAnnouncement.fdOperatorID";
        $criteria->addCondition('tbAnnouncement.fdDeleted = 0');
        $criteriaCount = clone $criteria;
        $criteriaCount->select = "COUNT(tbAnnouncement.id)";
        $total = Yii::app()->db->commandBuilder->createFindCommand($tablename, $criteriaCount, 'tbAnnouncement')->queryScalar();
        if (empty($total)) {
            $response['message'] = '暂无数据';
            return $response;
        }
        $criteria->limit = $this->length;
        $criteria->offset = ($this->page-1) * $this->length;
        $criteria->order = 'tbAnnouncement.fdUpdate DESC';
        $table = Yii::app()->db->commandBuilder->createFindCommand($tablename, $criteria, 'tbAnnouncement')->queryAll();
        foreach ($table as $row) {
            $menu = [];
            $menu['id'] = $row['id'];
            $menu['content'] = $row['fdDesc'];
            $menu['batch'] = $row['fdBatch'];
            $menu['sent'] = $row['fdSent'];
            $menu['name'] = $row['fdName'];
            $menu['update'] = $row['fdUpdate'];
            $menu['operator'] = $row['fdNickname'];
            $menu['md'] = $row['fdMarkdown'];
            $menuList[] = $menu;
        }
        $response['code'] = 0;
        $response['message'] = 'ok';
        $response['data']['list'] = $menuList;
        Yii::log(CVarDumper::dumpAsString($response), 'info', 'system.log');
        return $response;
    }

    public function modify($params)
    {
        $response = ['code' => -1, 'message' => ''];
        list($name, $content, $batch, $id, $md) = array($params['name'], $params['content'], $params['batch'], $params['id'], $params['md']);
        $result = Yii::app()->db->createCommand()->update("{$this->im}.tbAnnouncement",[
            'fdName' => $name,
            'fdDesc' => $content,
            'fdBatch' => $batch,
            'fdMarkdown' => $md,
        ],'id = :id', [':id' => $id]);
        if (!empty($result)) {
            $response['code'] = 0;
        } else {
            $response['message'] = '数据更新失败';
        }
        return $response;
    }

    public function add($params)
    {
        $response = ['code' => -1, 'message' => ''];
        list($name, $status, $content, $batch, $userID, $md) = array($params['name'], $params['status'], $params['content'], $params['batch'], $params['userID'], $params['md']);
        $sql = "INSERT INTO {$this->im}.tbAnnouncement (fdName, fdDesc, fdSent, fdBatch, fdOperatorID, fdMarkdown) VALUES (:name, :content, :status, :batch, :userID, :md)";
        $result = Yii::app()->db->createCommand($sql)->execute([
            ':name' => $name,
            ':content' => $content,
            ':status' => $status,
            ':batch' => $batch,
            ':md' => $md,
            ':userID' => $userID
        ]);
        if (!empty($result)) {
            $response['code'] = 0;
        } else {
            $response['message'] = '数据插入失败';
        }
        return $response;
    }

    public function del($params)
    {
        $response = ['code' => -1, 'message' => ''];
        $id = $params['id'];
        $sql = "SELECT fdSent FROM {$this->im}.tbAnnouncement WHERE id = :id";
        $exist = Yii::app()->db->createCommand($sql)->queryRow(true, [':id' => $id]);
        if(empty($exist) && !isset($exist)) {
            $response['message'] = '公告已被删除，请刷新';
            return $response;
        }
        if ($exist['fdSent'] == 1) {
            $result = Yii::app()->db->createCommand()->update("{$this->im}.tbAnnouncement",['fdDeleted' => 1], 'id =:id', [':id' => $id]);
        } else {
            $result = Yii::app()->db->createCommand()->delete("{$this->im}.tbAnnouncement",'id =:id',[':id' => $id]);
        }
        if (!empty($result)) {
            $response['code'] = 0;
        } else {
            $response['message'] = '数据删除失败';
        }
        return $response;
    }
}