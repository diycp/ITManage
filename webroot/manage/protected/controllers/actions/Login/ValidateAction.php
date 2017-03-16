<?php
class ValidateAction extends Action
{
    public function run()
    {
        $response = ['code'=>-1, 'message'=>'failed', 'data'=>[]];
        try {
            $loginF = new LoginForm();
            $loginF->account = $this->_POST['account'];
            $loginF->password = $this->_POST['password'];
            if ($loginF->validate()) {
                $response = $loginF->login();
            } else {
                $errors = $loginF->getErrors();
                $errorMessage = implode(';', array_column($errors, 0));
                throw new Exception($errorMessage);
            }
        } catch (Exception $e) {
            $response['error'] = -1;
            $response['message'] = 'error : '. $e->getMessage();
        }
        $this->code = $response['code'];
        $this->message = $response['message'];
        $this->put();
    }
}