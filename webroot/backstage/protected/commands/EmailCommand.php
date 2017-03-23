<?php
class EmailCommand extends CConsoleCommand
{
    public function actionIndex()
    {
        echo 'email';
    }

    public function actionGenerate($val)
    {
        $str = str_replace('{{}}', ' ', $val);
        $arr = explode('##', $str);
        print_r($arr);
    }
}