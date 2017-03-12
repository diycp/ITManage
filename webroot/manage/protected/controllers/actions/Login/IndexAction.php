<?php
/**
 * login
 */
class IndexAction extends Action
{
    public function run()
    {
        // echo 'enter login';
        // echo Yii::app()->user->returnUrl;
        $this->controller->smartyRender('login');
    }
}