<?php
class IndexAction extends Action
{
    public function run()
    {
        // echo 'welcome to backstage';
        $this->controller->smartyRender('home',[]);
    }
}