<?php
class SelectorForm extends FormModel
{
    public function search($params)
    {
        if (empty($params) || !is_array($params)) return [];
        $list = [];
        foreach ($params as $value) {
            $list[$value] = $this->cache($value);
        }
        return $list;
    }

    public function getCache($id)
    {
        $cache = Yii::app()->cache->get($id);
        if($cache === false) {
            $file = YiiBase::getPathOfAlias('webroot.assets.file'). '/'. $id. 'cache.txt';
            $cache = $this->$id();
            Yii::app()->cache->set($id, $cache, 24*60*60, new CFileCacheDependency($file));
        }
        return $cache;
    }

    public function __get($id)
    {
        $fn = 'get'. ucfirst($id);
        if (!method_exists(self, $fn)) {
            return parent::__get($id);
        }
        return $this->$fn($id);
    }

    public function getProject()
    {
        $sql = "SELECT id, fdName FROM {$this->im}.tbProject";
        $table = Yii::app()->db->createCommand($sql)->queryAll();
        if(empty($table)) return [];
        return $table;
    }

    public function getType()
    {
        $sql = "SELECT id, fdName FROM {$this->im}.tbDutyType";
        $table = Yii::app()->db->createCommand($sql)->queryAll();
        if(empty($table)) return [];
        return $table;
    }

    public function getPrority()
    {
        $sql = "SELECT id, fdName FROM {$this->im}.tbDutyPrority";
        $table = Yii::app()->db->createCommand($sql)->queryAll();
        if(empty($table)) return [];
        return $table;
    }

    public function getManager()
    {
        $sql = "SELECT id, fdNickname FROM {$this->im}.tbUser WHERE fdUserTypeID = 2";
        $table = Yii::app()->db->createCommand($sql)->queryAll();
        if(empty($table)) return [];
        return $table;
    }

    public function getDeveloper()
    {
        $sql = "SELECT id, fdNickname FROM {$this->im}.tbUser WHERE fdUserTypeID = 3";
        $table = Yii::app()->db->createCommand($sql)->queryAll();
        if(empty($table)) return [];
        return $table;
    }

    public function getTester()
    {
        $sql = "SELECT id, fdNickname FROM {$this->im}.tbUser WHERE fdUserTypeID = 4";
        $table = Yii::app()->db->createCommand($sql)->queryAll();
        if(empty($table)) return [];
        return $table;
    }
}