<?php
class IndexAction extends Action
{
    public function run ()
    {
        $this->beforeRun();
        Yii::import('application.models.MenuForm');
        $menuForm = new MenuForm;
        $menus = $menuForm->getMenus();
        $data['data'] = $menus;
        $this->controller->render('homepage', ['data'=>$menus]);
    }
}