<?php
class EmailComponent
{
    const EMAIL_HOST = "smtp.sina.com";
    const EMAIL_PORT = 25;
    const EMAIL_USERNAME = "itcommunication@sina.com";
    const EMAIL_ID = "itcommunication";
    const EMAIL_PASSWORD = "wsqit9425";

    public $email;

    public function __construct()
    {
        $emailPath = Yii::getPathOfAlias('application.vendor.Email');
        require_once($emailPath.'/Email.class.php');
        $this->email = new Email();
    }

    public function sendEmail($receiver, $title, $email_comtent)
    {
        $this->email->host = self::EMAIL_HOST;
        $this->email->port = self::EMAIL_PORT;
        $this->email->user = self::EMAIL_USERNAME;
        $this->email->pass = self::EMAIL_PASSWORD;
        $this->email->distUser = $receiver;
        $this->email->subject = $title;
        $this->email->body = $email_comtent;
        $result = $this->email->send();
        echo $result? 'success':'failed';
    }
}