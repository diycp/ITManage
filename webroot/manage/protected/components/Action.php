<?php

class Action extends CAction
{

    protected $controller;

    protected $code;
    protected $message;
    protected $data;

    protected $_REQUEST;
    protected $_POST;
    protected $_GET;

    protected $_requestType;

    protected $storeID;
    protected $templatePath;

    public $sellerCode; //销售员标志符
    protected $storeDistributeSetting;//店铺分销设置

    const SUCCESS = 0;
    const FAILED = -1;
    const MESSAGE_SUCCESS = 'SUCCESS';
    const MESSAGE_FAILED = 'FAILED';

    public function beforeRun(){
        try {
            // WapLogger::info('请求地址: ' . Yii::app()->request->url);
            // WapLogger::info('请求参数: ' . CVarDumper::dumpAsString($_REQUEST));
            $this->controller = $this->getController();
            $this->_setRequestType();
            $this->_setGET();
            $this->_setPOST();
            $this->_setREQUEST();
            $this->setAssets();
            // $this->_setStoreID();
            // $this->_setSellerCode();
            // $this->_sellerCodeRedirect();
        }catch(Exception $e){
            if (OPER_ENV !== 'prod') {
                echo $e->getMessage().'<br>';
            }
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

    private function _setStoreID()
    {
        $this->storeID = (int)$this->_GET['storeID'];
        if (!$this->storeID) {
            $this->storeID = (int)Yii::app()->request->cookies['store_id']->value;
        }
        if ($this->storeID) {
            Yii::app()->request->cookies['store_id'] = new CHttpCookie('store_id', $this->storeID, ['expire' => time()+60*60*24*30]);

            Yii::app()->store->setStoreID($this->storeID);
            $storeInfo = Yii::app()->store->getStoreInfo();
            $this->templatePath = $storeInfo['templatePath'];

            if (!in_array($this->controller->module->id, ['account', 'wechat'])) {
                if (!$storeInfo || !$storeInfo['templatePath']) {
                    $this->controller->errorRender('店铺不存在', ['backURL' => false]);
                }
            }
        } else {
            //公共模块不需要检查storeID
            if (!in_array($this->controller->module->id, ['account', 'wechat']) && !in_array($this->controller->id, ['pay'])) {
                $this->controller->errorRender('店铺不存在', ['backURL' => false]);
            }
        }
    }

    private function _setSellerCode()
    {
        //微信网页授权跳转链接带有code，跳过不做赋值
        if ($this->controller->module->id == 'wechat') {
            return true;
        }
        $this->sellerCode = $this->_GET['code'];
        if(empty($this->sellerCode)) {
            $this->sellerCode = Yii::app()->request->cookies['code']->value;
        } else {
            $code = Yii::app()->request->cookies['code']->value;
            if($code != $this->sellerCode)
                Yii::app()->request->cookies['code'] = new CHttpCookie('code', $this->sellerCode);
        }
    }

    /**
     * sellerCode重定向
     */
    private function _sellerCodeRedirect()
    {
        if (Yii::app()->request->isAjaxRequest) {
            return true;
        }
        //微信网页授权跳转链接带有code，下面的跳转会影响到微信网页授权
        if ($this->controller->module->id == 'wechat') {
            return true;
        }
        $this->storeDistributeSetting = ServiceFactory::getService('distribute')->getStoreDistributeSetting();
        if (empty($this->storeDistributeSetting)) {
            return true;
        }
        //若店铺设置『销售员之间购买』不结算佣金，『销售员自己购买』结算佣金，判断sellerCode是否和用户自己的一致，不一致则跳转成自己的code
        if ($this->storeDistributeSetting['fdBetweenSellersSettleStatus'] == 0 
            && $this->storeDistributeSetting['fdSelfSellerSettleStatus'] == 1) {
            $userSellerInfo = ServiceFactory::getService('distribute')->getStoreSellerInfo(Yii::app()->user->id, $this->storeID);
            if (!empty($userSellerInfo) && $userSellerInfo['fdCode'] != $this->sellerCode) {
                $queryParams = [];
                $path = '';
                if (!empty($_SERVER['REQUEST_URI'])) {
                    $parseURL = parse_url($_SERVER['REQUEST_URI']);
                    if (isset($parseURL['query'])) {
                        parse_str($parseURL['query'], $queryParams);
                    }
                    if (isset($parseURL['path'])) {
                        $path = ltrim($parseURL['path'], '/');
                    }
                    $queryParams['code'] = $userSellerInfo['fdCode'];
                }
                $url = BASE_URL . $path . '?' . http_build_query($queryParams);
                header("location: $url");
                Yii::app()->end();
            }
        }
    }

}