<?php
class OperateAction extends Action
{
    public $boardForm;

    public function run ()
    {
        try {
            $id = $this->_POST['id'];
            if(empty($id)) $this->put();
            $this->boardForm = new BoardForm();
            $this->boardForm->id = $id;
            $result = $this->boardForm->search();
            $this->code = $result['code'];
            $this->message = $result['message'];
            // $this->data = $result['data'];
            $this->data = $this->code ? '' : $this->controller->smartyRender('__table', $result['data'], '', '', '', true);
        } catch (Exception $e) {
            WapLogger::getLogger('itmanage')->info('[访问项目报错]:'. $e->__toString());
        }
        $this->put();
    }
}