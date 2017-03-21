<?php
class SelectorForm extends FormModel
{
    public function search($params)
    {
        $response = ['code' => -1, 'message' => 'empty'];
        if (empty($params) || !is_array($params)) return $response;
        $list = [];
        foreach ($params as $value) {
            $list[$value] = $this->getCache($value);
        }
        $response['code'] = 0;
        $response['message'] = 'ok';
        $response['data'] = $list;
        return $response;
    }

    public function getCache($id)
    {
        $cache = Yii::app()->cacheDb->get($id);
        if($cache === false) {
            $data = $this->$id();
            if (empty($data)) {
                $cache = [];
            } else {
                $cache = $data['cache'];
                $sql = $data['sql'];
                Yii::app()->cacheDb->set($id, $cache, 24*60*60, new CDbCacheDependency($sql));
            }
        }
        return $cache;
    }

    public function __call($id, $value)
    {
        $fn = 'get'. ucfirst($id);
        return $this->$fn();
    }

    public function getProject()
    {
        $sql = "SELECT id, fdName FROM {$this->im}.tbProject";
        $table = Yii::app()->db->createCommand($sql)->queryAll();
        if(empty($table)) return [];
        return ['cache' => $table, 'sql' => $sql];
    }

    public function getType()
    {
        $sql = "SELECT id, fdName FROM {$this->im}.tbDutyType";
        $table = Yii::app()->db->createCommand($sql)->queryAll();
        if(empty($table)) return [];
        return ['cache' => $table, 'sql' => $sql];
    }

    public function getPrority()
    {
        $sql = "SELECT id, fdName FROM {$this->im}.tbDutyPrority";
        $table = Yii::app()->db->createCommand($sql)->queryAll();
        if(empty($table)) return [];
        return ['cache' => $table, 'sql' => $sql];
    }

    public function getManager()
    {
        $sql = "SELECT id, fdNickname FROM {$this->im}.tbUser WHERE fdUserTypeID = 2";
        $table = Yii::app()->db->createCommand($sql)->queryAll();
        if(empty($table)) return [];
        return ['cache' => $table, 'sql' => $sql];
    }

    public function getDeveloper()
    {
        $sql = "SELECT id, fdNickname FROM {$this->im}.tbUser WHERE fdUserTypeID = 3";
        $table = Yii::app()->db->createCommand($sql)->queryAll();
        if(empty($table)) return [];
        return ['cache' => $table, 'sql' => $sql];
    }

    public function getTester()
    {
        $sql = "SELECT id, fdNickname FROM {$this->im}.tbUser WHERE fdUserTypeID = 4";
        $table = Yii::app()->db->createCommand($sql)->queryAll();
        if(empty($table)) return [];
        return ['cache' => $table, 'sql' => $sql];
    }
}