<?php
class MenuForm extends FormModel
{
    public function getMenus()
    {
        $sql = "SELECT * FROM {$this->im}.tbMenu WHERE fdPlatform = 0";
        $menus = Yii::app()->db->createCommand($sql)->queryAll();
        if(empty($menus)) return [];
        foreach($menus as $row) {
            $menu = [];
            $menu['name'] = $row['fdName'];
            $menu['tag'] = $row['fdController'];
            $menu['url'] = Yii::app()->getController()->createUrl($row['fdController'].'/'.$row['fdAction']);
            $menuList[] = $menu;
        }
        return $menuList;
    }
}