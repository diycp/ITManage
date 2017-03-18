<?php
class OperateAction extends Action
{
    public $methods = ['list', 'modify', 'del', 'add'];
    public $userForm;
    public function run ()
    {
        try{
            $this->beforeRun();
            if ( empty($this->_POST['operate'])) $this->put();
            if (!in_array($this->_POST['operate'], $this->methods)) {
                $this->code = 1;
                $this->message = 'error: param';
                $this->put();
            }
            $this->userForm = new UserForm();
            switch ($this->_POST['operate']) {
                case 'list':
                    $this->listUser();
                    break;
                case 'modify':
                    $this->modifyUser();
                    break;
                case 'del':
                    $result = $this->userForm->del();
                    break;
                case 'add':
                    $this->addUser();
                    break;
            }
            $this->put();
        } catch (Exception $e) {
            $message = $e->__toString();
            Yii::log('[访问用户菜单报错]:'. $message, 'error', 'system.log');
        }
    }

    public function addUser()
    {
        try {
            $params['nickname'] = $this->_POST['nickname'];
            $params['account'] = $this->_POST['account'];
            $params['password'] = $this->_POST['password'];
            $params['career'] = $this->_POST['career'];
            if (sizeof( array_filter($params)) != 4 ) {
                $this->code = 1;
                $this->message = '请填写完整信息';
                return false;
            }
            if (!Tool::regex($params['account'], 'email')) {
                $this->code = 2;
                $this->message = '帐号格式错误:邮箱';
                return false;
            }
            $result = $this->userForm->add($params);
            $this->code = $result['code'];
            $this->message = $result['message'];
        } catch(Exception $e) {
            Yii::log('[添加用户数据：]'. $e->__toString());
        }
    }

    public function listUser()
    {
        $result = $this->userForm->list();
        $this->code = $result['code'];
        $this->message = $result['message'];
        $this->data = $this->code ? '' : $this->controller->renderPartial('__table', $result['data'], true);
    }

    public function modifyUser()
    {
        try {
            $params['nickname'] = $this->_POST['nickname'];
            $params['account'] = $this->_POST['account'];
            $params['id'] = $this->_POST['sign'];
            $params['career'] = $this->_POST['career'];
            if (sizeof( array_filter($params)) != 4 ) {
                $this->code = 1;
                $this->message = '请填写完整信息';
                return false;
            }
            if (!Tool::regex($params['account'], 'email')) {
                $this->code = 2;
                $this->message = '帐号格式错误:邮箱';
                return false;
            }
            $result = $this->userForm->modify($params);
            $this->code = $result['code'];
            $this->message = $result['message'];
        } catch (Exception $e) {
            $this->code = 1;
            $this->message = '操作失败';
        }
    }
}