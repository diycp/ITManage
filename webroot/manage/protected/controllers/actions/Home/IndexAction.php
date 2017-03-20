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
        $this->controller->smartyRender('layout', $data);
    }
}