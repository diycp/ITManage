<?php
class OperateAction extends Action
{
    public $dutyForm;
    public $operate = ['list'];

    public function run()
    {
        try {
            if ( empty($_POST['operate'])) $this->put();
            if (!in_array($_POST['operate'], $this->operate)) {
                $this->code = 1;
                $this->message = 'error: param';
                $this->put();
            }
            $this->dutyForm = new DutyForm();
            switch($this->_POST['operate']) {
                case 'list':
                    $this->list();
                    break;
            }
        } catch (Exception $e) {
            WapLogger::getLogger('itmanage')->info('[访问任务报错]：'. $e->__toString());
        }
        $this->put();
    }

    public function list()
    {
        $id = $this->_POST['id'];
        if(empty($id)) return false;
        $this->dutyForm->dutyID = $id;
        $result = $this->dutyForm->search();
        $this->code = $result['code'];
        $this->message = $result['message'];
        // $this->data = $result['data'];
        $this->data = $this->code? '' : $this->controller->smartyRender('__table', $result['data']['list'], '', '', '', true);
    }
}