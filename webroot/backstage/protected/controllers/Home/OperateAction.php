<?php
class OperateAction extends Action
{
    public function run()
    {
        try {
            $this->beforeRun();
            $homeForm = new HomeForm();
            $result = $homeForm->search();
            $this->code = $result['code'];
            $this->message = $result['message'];
            $this->data = $this->code ? '' : $this->controller->renderPartial('__table', $result['data']['list'], true);
            // $this->data = $result['data'];
        } catch (Exception $e) {
            Yii::log('[访问home报错]:'. $e->__toString(), 'info', 'system.home');
        }
        $this->put();
    }
}