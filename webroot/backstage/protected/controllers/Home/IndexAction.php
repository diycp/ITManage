<?php
class IndexAction extends Action
{
    public function run ()
    {
        $this->beforeRun();
        Yii::import('application.models.Common.MenuForm');
        $menuForm = new MenuForm;
        $menus = $menuForm->getMenus();
        $data['data'] = $menus;
        $url = $this->controller->createUrl('home/operate');
        $this->controller->render('index', ['data'=>$menus, 'url' => $url]);
    }
}