<?php
/**
 * login
 */
class IndexAction extends Action
{
    public function run()
    {
        // echo 'enter login';
        if (!Yii::app()->user->isGuest) {
            $returnUrl = Yii::app()->user->returnUrl;
            $this->controller->redirect($returnUrl);
            Yii::app()->end();
        }
        $returnUrl = Yii::app()->user->returnUrl;
        $this->controller->smartyRender('login', ['url' => $returnUrl]);
    }
}