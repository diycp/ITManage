<?php

/**
 * Class FormModel
 */
class FormModel extends CFormModel{

    public $storeID;

    public $partnerID;

    public function __construct($scenario=''){
        try{
        }catch(Exception $e){
        }
    }

    public function __get($property){
        if(isset(Yii::app()->params['dbMap'][$property])) {
            $dbName = Yii::app()->params['dbMap'][$property];
        }
        if(!empty($dbName)) {
            return $dbName;
        }
        if(Yii::app()->hasComponent($property)){
            return Yii::app()->$property;
        }
        return parent::__get($property);
    }

}
