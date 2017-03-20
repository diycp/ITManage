<?php
class OperateAction extends Action
{
    public $methods = ['list', 'modify', 'del', 'add'];
    public $announcementForm;
    public function run ()
    {
        try{
            // $this->beforeRun();
            if ( empty($_POST['operate'])) $this->put();
            if (!in_array($_POST['operate'], $this->methods)) {
                $this->code = 1;
                $this->message = 'error: param';
                $this->put();
            }
            $this->announcementForm = new AnnouncementForm();
            switch ($_POST['operate']) {
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
            Yii::log('[访问公告报错]:'. $message, 'error', 'system.log');
        }
    }

    public function addAnnouncement()
    {
        try {
            $params['name'] = $_POST['name'];
            $params['content'] = $_POST['content'];
            $params['batch'] = $_POST['batch'];
            $params['status'] = $_POST['status'];
            $params['md'] = $_POST['md'];
            $params['userID'] = Yii::app()->user->id;
            if (sizeof( $params ) != 6 ) {
                $this->code = 1;
                $this->message = '请填写完整信息';
                return false;
            }
            $result = $this->announcementForm->add($params);
            $this->code = $result['code'];
            $this->message = $result['message'];
        } catch(Exception $e) {
            Yii::log('[添加公告数据：]'. $e->__toString());
        }
    }

    public function listAnnouncement()
    {
        $result = $this->announcementForm->list();
        $this->code = $result['code'];
        $this->message = $result['message'];
        $this->data = $this->code ? '' : $this->getController()->renderPartial('__table', $result['data'], true);
    }

    public function modifyAnnouncement()
    {
        try {
            $params['name'] = $_POST['name'];
            $params['batch'] = $_POST['batch'];
            $params['md'] = $_POST['md'];
            $params['content'] = $_POST['content'];
            $params['id'] = $_POST['sign'];
            if (sizeof($params) != 5 ) {
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
            $params['id'] = $_POST['sign'];
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