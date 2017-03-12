<?php
class ValidateAction extends Action
{
    public function run()
    {
        $response = ['code'=>-1, 'message'=>'failed', 'data'=>[]];
        try {
            $loginF = new LoginForm();
            $response['code'] = 0;
        } catch (Exception $e) {
            $response['error'] = -1;
            $response['message'] = 'error : '. $e->__toString();
        }
        $this->code = $response['code'];
        $this->message = $response['message'];
        $this->data = $response['data'];
        $this->put();
    }
}