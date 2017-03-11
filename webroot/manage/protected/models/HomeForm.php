<?php
class HomeForm extends CFormModel
{
    public function demo()
    {
        // echo 'enter form';
        $sql = "SELECT * FROM wsqITManage.tbUserType";
        $data = Yii::app()->db->createCommand($sql)->queryAll();
        print_r($data);
    }
}