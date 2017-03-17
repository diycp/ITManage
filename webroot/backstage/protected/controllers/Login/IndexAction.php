<?php
class IndexAction extends Action
{
    public function run()
    {
        if (!Yii::app()->user->isGuest) {
            $returnUrl = Yii::app()->user->returnUrl;
            $this->controller->redirect($returnUrl);
            Yii::app()->end();
        }
        $returnUrl = Yii::app()->user->returnUrl;
        $this->getController()->renderPartial('login', ['url'=>$returnUrl]);
    }
}