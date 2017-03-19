<?php
class OperateAction extends Action
{
    public $methods = ['list', 'modify', 'del', 'add'];
    public $announcementForm;
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
            $this->announcementForm = new AnnouncementForm();
            switch ($this->_POST['operate']) {
                case 'list':
                    $this->listAnnouncement();
                    break;
                case 'modify':
                    $this->modifyAnnouncement();
                    break;
                case 'del':
                    $this->delAnnouncement();
                    break;
                case 'add':
                    $this->addAnnouncement();
                    break;
            }
            $this->put();
        } catch (Exception $e) {
            $message = $e->__toString();
            Yii::log('[访问菜单报错]:'. $message, 'error', 'system.log');
        }
    }

    public function addAnnouncement()
    {
        try {
            $params['name'] = $this->_POST['name'];
            $params['content'] = $this->_POST['content'];
            $params['method'] = $this->_POST['method']; //0-save 1-send
            $params['batch'] = $this->_POST['batch'];
            $params['status'] = $this->_POST['status'];
            if (sizeof( $params ) != 5 ) {
                $this->code = 1;
                $this->message = '请填写完整信息';
                return false;
            }
            $result = $this->announcementForm->add($params);
            $this->code = $result['code'];
            $this->message = $result['message'];
        } catch(Exception $e) {
            Yii::log('[添加菜单数据：]'. $e->__toString());
        }
    }

    public function listAnnouncement()
    {
        $result = $this->announcementForm->list();
        $this->code = $result['code'];
        $this->message = $result['message'];
        $this->data = $this->code ? '' : $this->controller->renderPartial('__table', $result['data'], true);
    }

    public function modifyAnnouncement()
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
            $result = $this->announcementForm->modify($params);
            $this->code = $result['code'];
            $this->message = $result['message'];
        } catch (Exception $e) {
            $this->code = 1;
            $this->message = '操作失败';
            Yii::log($e->__toString(), 'error', 'system.log');
        }
    }

    public function delAnnouncement()
    {
        try {
            $params['id'] = $this->_POST['sign'];
            if (empty($params['id']) || !is_numeric($params['id'])) {
                $this->code = 1;
                $this->message = '请求错误';
                return false;
            }
            $result = $this->announcementForm->del($params);
            $this->code = $result['code'];
            $this->message = $result['message'];
        } catch (Exception $e) {
            $this->code = 1;
            $this->message = '操作失败';
            Yii::log($e->__toString(), 'error', 'system.log');
        }
    }
}