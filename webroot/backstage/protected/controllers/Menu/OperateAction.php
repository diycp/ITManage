<?php
class OperateAction extends Action
{
    public $methods = ['list', 'modify', 'del', 'add'];
    public $menuForm;
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
            $this->menuForm = new MenuForm();
            switch ($this->_POST['operate']) {
                case 'list':
                    $this->listMenu();
                    break;
                case 'modify':
                    $this->modifyMenu();
                    break;
                case 'del':
                    $this->delMenu();
                    break;
                case 'add':
                    $this->addMenu();
                    break;
            }
            $this->put();
        } catch (Exception $e) {
            $message = $e->__toString();
            Yii::log('[访问菜单报错]:'. $message, 'error', 'system.log');
        }
    }

    public function addMenu()
    {
        try {
            $params['name'] = $this->_POST['name'];
            $params['controller'] = $this->_POST['controller'];
            $params['action'] = $this->_POST['action'];
            $params['platform'] = $this->_POST['platform'];
            $params['status'] = $this->_POST['status'];
            if (sizeof( $params ) != 5 ) {
                $this->code = 1;
                $this->message = '请填写完整信息';
                return false;
            }
            $result = $this->menuForm->add($params);
            $this->code = $result['code'];
            $this->message = $result['message'];
        } catch(Exception $e) {
            Yii::log('[添加菜单数据：]'. $e->__toString());
        }
    }

    public function listMenu()
    {
        $result = $this->menuForm->list();
        $this->code = $result['code'];
        $this->message = $result['message'];
        $this->data = $this->code ? '' : $this->controller->renderPartial('__table', $result['data'], true);
    }

    public function modifyMenu()
    {
        try {
            $params['name'] = $this->_POST['name'];
            $params['controller'] = $this->_POST['controller'];
            $params['action'] = $this->_POST['action'];
            $params['platform'] = $this->_POST['platform'];
            $params['status'] = $this->_POST['status'];
            $params['id'] = $this->_POST['sign'];
            if (sizeof($params) != 6 ) {
                $this->code = 1;
                $this->message = '请填写完整信息';
                return false;
            }
            $result = $this->menuForm->modify($params);
            $this->code = $result['code'];
            $this->message = $result['message'];
        } catch (Exception $e) {
            $this->code = 1;
            $this->message = '操作失败';
            Yii::log($e->__toString(), 'error', 'system.log');
        }
    }

    public function delMenu()
    {
        try {
            $params['id'] = $this->_POST['sign'];
            if (empty($params['id']) || !is_numeric($params['id'])) {
                $this->code = 1;
                $this->message = '请求错误';
                return false;
            }
            $result = $this->menuForm->del($params);
            $this->code = $result['code'];
            $this->message = $result['message'];
        } catch (Exception $e) {
            $this->code = 1;
            $this->message = '操作失败';
            Yii::log($e->__toString(), 'error', 'system.log');
        }
    }
}