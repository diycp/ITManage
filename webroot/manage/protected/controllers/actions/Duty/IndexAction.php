<?php
class IndexAction extends Action
{
    public function run()
    {
        Yii::import('application.models.Common.MenuForm');
        $menuForm = new MenuForm;
        $menus = $menuForm->getMenus();
        $data['data'] = $menus;
        $data['controller'] = $this->controller->id;
        $data['career'] = Yii::app()->user->career;
        $data['nickname'] = Yii::app()->user->nickname;
        $data['url'] = $this->controller->createUrl('duty/operate');
        $data['id'] = $this->_REQUEST['id'];
        $this->controller->smartyRender('index', $data);
    }
}