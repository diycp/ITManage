<?php
class OperateAction extends Action
{
    public $homeForm;

    public function run ()
    {
        try {
            $userID = Yii::app()->user->id;
            $type = Yii::app()->user->type;
            $status = $this->statusTypeMap($type);
            $career = $this->careerTypeMap($type);
            if (empty($status)) {
                throw new Exception('工作类型不在范围内');
            }
            $this->homeForm = new HomeForm();
            $this->homeForm->userID = $userID;
            $this->homeForm->status = $status;
            $this->homeForm->career = $career;
            $result = $this->homeForm->search();
            $this->code = $result['code'];
            $this->message = $result['message'];
            $this->data = $this->controller->smartyRender('__table', $result['data'], '', '', '', true);
        } catch (Exception $e) {
            WapLogger::getLogger('itmanage')->info('[访问主页报错]：'. $e->__toString());
        }
        $this->put();
    }

    public function statusTypeMap ($type)
    {
        //type: 1-manager 2-developer 3-tester
        //status: 1-待确认 2-需求 3-待开发 4-开发 5-待修复 6-待测试 7-测试
        $map = [
            '2' => [1,2],
            '3' => [3,4,5],
            '4' => [6,7]
        ];
        return isset($map[$type]) ? $map[$type] : '';
    }

    public function careerTypeMap ($type)
    {
        $map = [
            '2' => 'fdManager',
            '3' => 'fdDeveloper',
            '4' => 'fdTester'
        ];
        return isset($map[$type]) ? $map[$type] : '';
    }
}