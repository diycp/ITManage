<?php
class OperateAction extends Action
{
    public $category = ['duty', 'project'];
    public $operate = ['listDuty', 'addDuty', 'addProject'];
    public $buildForm;

    public function run()
    {
        try {
            if ( empty($_POST['operate'])) $this->put();
            if (!in_array($_POST['operate'], $this->operate)) {
                $this->code = 1;
                $this->message = 'error: param';
                $this->put();
            }
            $this->buildForm = new BuildForm();
            switch ($_POST['operate']) {
                case 'listDuty' :
                    $this->listDuty();
                    break;
                case 'addDuty' :
                    break;
                case 'addProject' :
                    break;
            }
            $this->put();
        } catch (Exception $e) {
            $message = $e->__toString;
            Yii::log('[访问创建错误]：'. $message, 'info', 'system.build');
        }
    }

    public function listDuty()
    {
        
    }
}