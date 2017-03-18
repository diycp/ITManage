<?php
class IndexAction extends Action
{
    public function run ()
    {
        $this->beforeRun();
        Yii::import('application.models.Common.MenuForm');
        $menuForm = new MenuForm;
        $menus = $menuForm->getMenus();
        $url = $this->controller->createUrl('user/operate');
        $this->controller->render('index', ['data'=>$menus, 'url' => $url]);
    }
}