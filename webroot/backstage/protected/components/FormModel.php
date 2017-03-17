<?php
class FormModel extends CFormModel
{
    public $_db;

    public function __get($name)
    {
        $dbMaps = Yii::app()->params['dbMap'];
        if(isset($dbMaps[$name])) 
            return $dbMaps[$name];
        else 
            throw new Exception('db no found');
    }
}