<?php
class OperateAction extends Action
{
    public $dutyForm;
    public $operate = ['list', 'updateStatus', 'addBug', 'updateBug', 'delBug', 'editDuty'];

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
                case 'updateStatus':
                    $this->updateStatus();
                    break;
                case 'addBug':
                    $this->addBug();
                    break;
                case 'updateBug':
                    $this->updateBug();
                    break;
                case 'delBug':
                    $this->delBug();
                    break;
                case 'editDuty':
                    $this->editDuty();
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

    public function updateStatus()
    {
        $id = $this->_POST['id'];
        $status = $this->_POST['status'];
        if(empty($id) || empty($status)) return false;
        $this->dutyForm->dutyID = $id;
        $this->dutyForm->status = $status;
        $result = $this->dutyForm->updateStatus();
        $this->code = $result['code'];
        $this->message = $result['message'];
    }

    public function addBug()
    {
        $val = $this->_POST['value'];
        $id = $this->_POST['id'];
        if(empty($val)) return false;
        $this->dutyForm->bugDesc = $val;
        $this->dutyForm->dutyID = $id;
        $result = $this->dutyForm->addBug();
        $this->code = $result['code'];
        $this->message = $result['message'];
        $this->data = $result['data'];
    }

    public function updateBug()
    {
        $bugID = $this->_POST['bugID'];
        $bugStatus = $this->_POST['bugStatus'];
        if(empty($bugID)) return false;
        $this->dutyForm->bugID = $bugID;
        $this->dutyForm->bugStatus = $bugStatus;
        $result = $this->dutyForm->updateBug();
        $this->code = $result['code'];
        $this->message = $result['message'];
        $this->data = $result['data'];
    }

    public function delBug()
    {
        $bugID = $this->_POST['bugID'];
        if(empty($bugID)) return false;
        $this->dutyForm->bugID = $bugID;
        $result = $this->dutyForm->delBug();
        $this->code = $result['code'];
        $this->message = $result['message'];
        $this->data = $result['data'];
    }

    public function editDuty()
    {
        $val = $this->_POST['value'];
        $id = $this->_POST['id'];
        if(empty($val)) return false;
        $this->dutyForm->dutyDesc = $val;
        $this->dutyForm->dutyID = $id;
        $result = $this->dutyForm->editDuty();
        $this->code = $result['code'];
        $this->message = $result['message'];
        $this->data = $result['data'];
    }
}