<?php
class OperateAction extends Action
{
    public $projectForm;

    public function run ()
    {
        try {
            $id = $this->_POST['id'];
            if(empty($id)) $this->put();
            $this->projectForm = new ProjectForm();
            $this->projectForm->id = $id;
            $result = $this->projectForm->search();
            $this->code = $result['code'];
            $this->message = $result['message'];
            // $this->data = $result['data'];
            $this->data = $this->code ? '' : $this->controller->smartyRender('__table', $result['data']['list'], '', '', '', true);
        } catch (Exception $e) {
            WapLogger::getLogger('itmanage')->info('[访问项目报错]:'. $e->__toString());
        }
        $this->put();
    }
}