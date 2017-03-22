<?php

class Action extends CAction
{

    protected $controller;
    protected $param;

    protected $code = -1;
    protected $message = '操作失败';
    protected $data;

    protected $_REQUEST;
    protected $_POST;
    protected $_GET;
    protected $_requestType;

    const SUCCESS = 0;
    const FAILED = -1;
    const MESSAGE_SUCCESS = 'SUCCESS';
    const MESSAGE_FAILED = 'FAILED';

    public function beforeRun(){
        try {
            $this->controller = $this->getController();
            $this->_setRequestType();
            $this->_setGET();
            $this->_setPOST();
            $this->_setREQUEST();
            $this->setAssets();
            $this->_setParam();
        }catch(Exception $e){
            // if (OPER_ENV !== 'prod') {
            //     echo $e->getMessage().'<br>';
            // }
            throw new CHttpException(500);
            exit;
        }
        return true;
    }

    public function afterRun(){
        $response = array('code' => $this->code, 'message' => $this->message, 'data' => $this->data);
        // WapLogger::info('返回结果: ' . CVarDumper::dumpAsString($response));
    }

    /**
     * 设置资源
     */
    protected function setAssets() {

    }

    /**
     * 设置参数对象
     */
    protected function _setParam()
    {
        $this->param = new CommonParam();
    } 

    /**
     * put response data to view
     */
    protected function put(){
        $this->code |= 0;
        if(empty($this->message))
            $this->message = self::MESSAGE_SUCCESS;
        //解决数据查询数据乱码导致json_encode失败返回null
        if(empty(json_encode($this->data)))
            $this->data = mb_convert_encoding($this->data, 'UTF-8','ascii,GB2312,gbk,UTF-8');
        $response = array('code' => $this->code, 'message' => $this->message, 'data' => $this->data);
        echo json_encode($response);
        die;
    }

    /**
     * set requestType from request type
     */
    private function _setRequestType(){
        $this->_requestType = Yii::app()->request->requestType;
    }

    /**
     * set request data from ajax request
     */
    private function _setREQUEST(){
        $this->_REQUEST = Tool::trim($_REQUEST);
        $this->_REQUEST = Tool::escape($this->_REQUEST);
        $this->_REQUEST = Tool::purify($this->_REQUEST);
    }

    private function _setPOST(){
        $this->_POST = Tool::trim($_POST);
        $this->_POST = Tool::escape($this->_POST);
        $this->_POST = Tool::purify($this->_POST);
    }

    private function _setGET(){
        $this->_GET = Tool::trim($_GET);
        $this->_GET = Tool::escape($this->_GET);
        $this->_GET = Tool::purify($this->_GET);
    }


}