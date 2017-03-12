<?php
class IndexAction extends Action
{
    public function run()
    {
        // $demo = new HomeForm();
        // $demo->demo();
        $this->controller->smartyRender('demo', []);
    }
}