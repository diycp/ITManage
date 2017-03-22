<?php
class OperateAction extends Action
{
    public $category = ['duty', 'project'];
    public $operate = ['listDuty', 'addDuty', 'addProject', 'listProject'];
    public $buildForm;

    public function run()
    {
        try {
            if ( empty($_POST['operate'])) $this->put();
            if (!in_array($_POST['operate'], $this->operate)) {
                $this->code = 1;
                $this->message = 'error: param';
                $this->put();
            }
            $this->buildForm = new BuildForm();
            switch ($_POST['operate']) {
                case 'listDuty' :
                    $this->listDuty();
                    break;
                case 'listProject' :
                    $this->listProject();
                    break;
                case 'addDuty' :
                    $this->addDuty();
                    break;
                case 'addProject' :
                    $this->addProject();
                    break;
            }
        } catch (Exception $e) {
            $message = $e->__toString();
        }
        $this->put();
    }

    public function listDuty()
    {
        try {
            Yii::import('application.models.Common.SelectorForm');
            $selectorForm = new SelectorForm();
            $params = [
                'type', 'prority', 'manager', 'tester', 'developer', 'project', 'status'
            ];
            $result = $selectorForm -> search($params);
            $this->code = $result['code'];
            $this->message = $result['message'];
            // $this->data = $result['data'];
            $this->data = $this->code ? '' : $this->controller->smartyRender('__table', $result['data'], '', '', '', true);
        } catch (Exception $e) {
            WapLogger::getLogger('itmanage')->info('[访问listDuty报错：]'. $e->__toString());
        }
    }

    public function listProject()
    {
        Yii::import('application.models.Common.SelectorForm');
        $selectorForm = new SelectorForm();
        $params = [
            'developer'
        ];
        $result = $selectorForm -> search($params);
        $this->code = $result['code'];
        $this->message = $result['message'];
        $this->data = $result['data'];
    }

    public function addProject()
    {
        try {
            $params['name'] = $this->_POST['name'];
            $params['leader'] = $this->_POST['leader'];
            $params['content'] = $this->_POST['content'];
            $params['startTime'] = strtotime($this->_POST['start-time']);
            $params['endTime'] = strtotime($this->_POST['end-time']);
            $params['userID'] = Yii::app()->user->id;
            if (sizeof(array_filter($params)) != 6 ) {
                $this->code = 1;
                $this->message = '请填写完整信息';
                return false;
            }
            $params['remind'] = $this->_POST['remind'];
            if ($params['startTime'] >= $params['endTime']) {
                $this->code = 2;
                $this->message = '结束时间不能小于开始时间';
                return false;
            }
            $result = $this->buildForm->addProject($params);
            $this->code = $result['code'];
            $this->message = $result['message'];
        } catch(Exception $e) {
            WapLogger::getLogger('itmanage')->info('[添加项目数据：]'. $e->__toString());
        }
    }

    public function addDuty()
    {
        try {
            $params['name'] = $this->_POST['name'];
            $params['project'] = $this->_POST['project'];
            $params['content'] = $this->_POST['content'];
            $params['type'] = $this->_POST['type'];
            $params['status'] = $this->_POST['status'];
            $params['developer'] = $this->_POST['developer'];
            $params['tester'] = $this->_POST['tester'];
            $params['manager'] = $this->_POST['manager'];
            $params['prority'] = $this->_POST['prority'];
            $params['time'] = strtotime($this->_POST['time']);
            $params['userID'] = Yii::app()->user->id;
            if (sizeof(array_filter($params)) != 11 ) {
                $this->code = 1;
                $this->message = '请填写完整信息';
                return false;
            }
            if (time() >= $params['time']) {
                $this->code = 2;
                $this->message = '上线时间不能小于当前时间';
                return false;
            }
            $result = $this->buildForm->addDuty($params);
            $this->code = $result['code'];
            $this->message = $result['message'];
        } catch(Exception $e) {
            WapLogger::getLogger('itmanage')->info('[添加任务数据：]'. $e->__toString());
        }
    }
}