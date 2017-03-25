<?php
require __DIR__.'/PHPMailer_master/PHPMailer_master/PHPMailerAutoload.php';


class Email{
    public $email;
    public $email_param = array();
    
    public function __construct(){
        $this->email = new PHPMailer;
        $this->email->isHTML(true);
        $this->email->CharSet = "UTF-8";
    }
    /**
    *设置邮件参数
    *@param string $host 邮件服务端
    *@param string $user 邮件账户
    *@param string $pass 邮件密码
    *@param string $port 邮件端口
    *@param string $distUser 邮件目标用户
    *@param string $subject 邮件标题
    *@param string $body 邮件内容
    */
    public function __set($key,$val){
        $this->email_param[$key] = $val;
    }
    
    
    private function emailParam(){
        $this->email->isSMTP();                                      // Set mailer to use SMTP
        $this->email->Host = $this->email_param['host'];  // Specify main and backup SMTP servers
        $this->email->SMTPAuth = true;                               // Enable SMTP authentication
        $this->email->Username = $this->email_param['user'];                 // SMTP username
        $this->email->Password = $this->email_param['pass'];                           // SMTP password
        $this->email->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
        $this->email->Port = $this->email_param['port'];             // TCP port to connect to
        
        $this->email->setFrom($this->email_param['user']);
        
        $this->email->addAddress($this->email_param['distUser']);
        
        $this->email->Subject = $this->email_param['subject'];
        $this->email->Body    = $this->email_param['body'];
        $this->email->AltBody = 'Please open the email with HTML mail clients';
    }
    
    public function send(){
        
        $this->emailParam();
        
        return $this->email->send();
        /*if(!$mail->send()) {
            echo 'Message could not be sent.';
            echo 'Mailer Error: ' . $mail->ErrorInfo;
        } else {
            echo 'Message has been sent';
        }*/
    }
    
}