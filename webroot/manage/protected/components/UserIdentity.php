<?php

/**
 * UserIdentity represents the data needed to identity a user.
 * It contains the authentication method that checks if the provided
 * data can identity the user.
 */
class UserIdentity extends CUserIdentity
{

    public $userInfo;
    public $account;
    public $password;

	private $_id;
	private $_name;

    const ERROR_PWD_VALID = 0;
    const ERROR_ACCOUNT_INVALID = -1;
    const ERROR_PWD_INVALID = -2;

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
        $this->_validate();

        if ($this->errorCode === self::ERROR_NONE) {
            $this->_id = $this->userInfo['id'];
            $this->_name = $this->userInfo['fdNickname'];
            $this->setState('__id', $this->userInfo['id']);
            $this->setState('__nickname', $this->userInfo['fdNickName']);
            $this->setState('__authority', $this->userInfo['fdAuthority']);
            $this->setState('__worker', $this->userInfo['fdName']);
        }
		return $this->errorCode;
	}

    public function getErrorMsg()
    {
        $messages = [
            self::ERROR_PWD_INVALID => '手机号码格式错误',
            self::ERROR_ACCOUNT_INVALID => '验证码错误',
        ];
        return isset($messages[$this->errorCode]) ? $messages[$this->errorCode] : '验证错误';
    }

	public function getId(){
		return $this->_id;
	}
	
	public function getName(){
		return $this->_name;
	}

    private function _validate()
    {
        $im = Yii::app()->params['dbMap']['im'];
        $sql = "SELECT tbUser.id, tbUser.fdNickName, tbUser.fdPassword, tbUserType.fdName, tbUserType.fdAuthority 
        FROM {$im}.tbUser 
        INNER JOIN {$im}.tbUserType ON tbUserType.id = tbUser.fdUserTypeID
        WHERE tbUser.fdAccount = :account";
        $this->userInfo = Yii::app()->db->createCommand($sql)->queryRow(true, [':account' => $this->account]);
        if (empty($this->userInfo)) {
            $this->errorCode = self::ERROR_ACCOUNT_INVALID;
        }
        if ( password_verify($this->password, $this->userInfo['fdPassword'])) {
            $this->errorCode = self::ERROR_PWD_VALID;
        } else {
            $this->errorCode = self::ERROR_PWD_INVALID;
        }
    }

}
