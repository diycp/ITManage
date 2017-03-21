<?php
class BuildForm extends FormModel
{
    public $page = 1;
    public $length = 20;

    public function addProject ($params)
    {
        $response = ['code' => -1, 'message' => ''];
        list($name, $content, $leader, $remind, $startTime, $endTime, $userID) = array($params['name'], $params['content'], $params['leader'], $params['remind'], $params['startTime'], $params['endTime'], $params['userID']);
        $result = Yii::app()->db->createCommand()->insert("{$this->im}.tbProject",[
            'fdName' => $name,
            'fdDesc' => $content,
            'fdLeader' => $leader,
            'fdRemind' => $remind,
            'fdTimeStart' => date('Y-m-d', $startTime),
            'fdTimeEnd' => date('Y-m-d', $endTime),
            'fdBuilder' => $userID
        ]);
        if (!empty($result)) {
            $response['code'] = 0;
        } else {
            $response['message'] = '数据插入失败';
        }
        return $response;
    }

    public function addDuty ($params)
    {
        $response = ['code' => -1, 'message' => ''];
        list($name, $content, $prority, $time, $developer, $tester, $manager, $userID, $type, $project) = array($params['name'], $params['content'], $params['prority'], $params['time'], $params['developer'], $params['tester'], $params['manager'], $params['userID'], $params['type'], $params['project']);
        $result = Yii::app()->db->createCommand()->insert("{$this->im}.tbDuty",[
            'fdName' => $name,
            'fdDesc' => $content,
            'fdProjectID' => $project,
            'fdPrority' => $prority,
            'fdManager' => $manager,
            'fdPlanTime' => date('Y-m-d', $time),
            'fdBuilder' => $userID,
            'fdDeveloper' => $developer,
            'fdTester' => $tester,
            'fdTypeID' => $type,
        ]);
        if (!empty($result)) {
            $response['code'] = 0;
        } else {
            $response['message'] = '数据插入失败';
        }
        return $response;
    }
}