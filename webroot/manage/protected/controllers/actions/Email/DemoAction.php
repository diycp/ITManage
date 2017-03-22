<?php
class DemoAction extends Action 
{
    public function run()
    {
        $receiver = 'guangcaida13@163.com';
        $title = 'test email';
        $content = '测试邮箱';
        $email = new EmailComponent();
        $email->sendEmail($receiver, $title, $content);
    }
}