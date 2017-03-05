<?php

/**
 * UserIdentity represents the data needed to identity a user.
 * It contains the authentication method that checks if the provided
 * data can identity the user.
 */
class UserIdentity extends CUserIdentity
{
    public $phone;
    public $verifyCode;
    public $userID;

    public $loginWay;//登录方式
    public $userInfo;

	private $_id;
	private $_name;

    const ERROR_PHONE_INVALID = -1;
    const ERROR_CODE_INVALID = -2;
    const ERROR_TIME_OUT = -3;
    const ERROR_LOGIN_FAIL = -4;

    public function __construct()
    {

    }

	/**
	 * Authenticates a user.
	 * The example implementation makes sure if the username and password
	 * are both 'demo'.
	 * In practical applications, this should be changed to authenticate
	 * against some persistent user identity storage (e.g. database).
	 * @return boolean whether authentication succeeds.
	 */
	public function authenticate()
	{
        $this->errorCode = self::ERROR_NONE;
        
        switch ($this->loginWay) {
            case 'sms':
                $this->_validateSMS();
                break;
            case 'wechat':
                $this->_validateWechat();
                break;
            default:
                $this->errorCode = self::ERROR_LOGIN_FAIL;
                break;
        }

        if (empty($this->userInfo)) {
            $this->errorCode = self::ERROR_LOGIN_FAIL;
        }

        if ($this->errorCode === self::ERROR_NONE) {
            $this->_id = $this->userInfo['id'];
            $this->_name = $this->userInfo['fdPhone'];
            $this->setState('__id', $this->userInfo['id']);
            $this->setState('__nickname', $this->userInfo['fdNickName']);
            $this->setState('__phone', $this->userInfo['fdPhone']);
            $this->setState('__avatar', $this->userInfo['fdImage']);
        }
		return $this->errorCode;
	}

    public function getErrorMsg()
    {
        $messages = [
            self::ERROR_PHONE_INVALID => '手机号码格式错误',
            self::ERROR_CODE_INVALID => '验证码错误',
            self::ERROR_TIME_OUT => '验证超时，请重新获取验证码',
            self::ERROR_LOGIN_FAIL => '登录失败',
        ];
        return isset($messages[$this->errorCode]) ? $messages[$this->errorCode] : '验证错误';
    }

	public function getId(){
		return $this->_id;
	}
	
	public function getName(){
		return $this->_name;
	}

    /**
     * 验证短信登录
     */
    private function _validateSMS()
    {
        $djyStore = Yii::app()->params['dbMap']['djyStore'];
        $sql = "SELECT * FROM {$djyStore}.tbPhone WHERE tbPhone.fdPhone = :phone";
        $phone = Yii::app()->db->createCommand($sql)->queryRow(true, [':phone' => $this->phone]);
        if (empty($phone)) {
            $this->errorCode = self::ERROR_PHONE_INVALID;
            return $this->errorCode;
        }

        if ($phone['fdCode'] != $this->verifyCode || $phone['fdVerified'] > 0) {
            $this->errorCode = self::ERROR_CODE_INVALID;
            return $this->errorCode;
        }

        if (strtotime($phone['fdSent'])+SMS_VERIFY_TIMEOUT <= time()) {
            $this->errorCode = self::ERROR_TIME_OUT;
            return $this->errorCode;
        }

        $this->userInfo = ServiceFactory::getService('account')->loginBySmsValidate($this->phone);
    }

    /**
     * 验证微信登录
     */
    private function _validateWechat()
    {
        $this->userInfo = ServiceFactory::getService('account')->getUserInfo($this->userID);
    }
}
