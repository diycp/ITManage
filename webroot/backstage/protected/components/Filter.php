<?php
class Filter extends CFilter
{
    public function preFilter($filterChain)
    {
        if (Yii::app()->user->isGuest && Yii::app()->getController()->id != 'login') {
            Yii::app()->user->loginRequired();
        }
        $filterChain->run();
    }
}