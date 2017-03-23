<?php
class OperateAction extends Action
{
    public function run()
    {
        try {
            $announcementForm = new AnnouncementForm();
            $result = $announcementForm->search();
            $this->code = $result['code'];
            $this->message = $result['message'];
            $this->data = $this->code ? '' : $this->data = $this->code ? '' : $this->controller->smartyRender('__table', $result['data']['list'], '', '', '', true);
            // $this->data = $result['data'];
        } catch (Exception $e) {
            WapLogger::getLogger('itmanage')->info('[访问公告报错]：'. $e->__toString());
        }
        $this->put();
    }
}