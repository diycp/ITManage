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
            $query = parse_url($returnUrl, PHP_URL_QUERY);
            if ( strcmp($this->controller->id, substr($query, 2, 6)) == 0) {
                $this->controller->redirect('/');
            } else {
                $this->controller->redirect($returnUrl);
            }
            Yii::app()->end();
        }
        $this->controller->smartyRender('login');
    }
}