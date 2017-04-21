<?php
class LogoutAction extends Action
{
    public function run()
    {
        Yii::app()->user->logout();
        // $this->getController()->redirect('login');
        header('location:'. BASE_URL);
    }
}