<?php
class HomeAction extends Action
{
    public function run()
    {
        $this->controller->smartyRender('demo', []);
    }
}