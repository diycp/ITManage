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
        var_dump(Yii::app()->db);
        // $sql = "select * from wsqITmanage.tbUserType";
        // $data = Yii::app()->db->createCommand($sql)->queryAll();
        // die(json_encode($data));
        $returnUrl = Yii::app()->user->returnUrl;
        $this->controller->smartyRender('login', ['url' => $returnUrl]);
    }
}