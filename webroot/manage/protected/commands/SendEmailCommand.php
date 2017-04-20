<?php
class SendEmailCommand extends CConsoleCommand
{
    public function actionAnnouncementBatch($id = '')
    {
        try {
            $email = new EmailComponent();
            $sql = "SELECT fdName, fdDesc, fdMarkdown FROM wsqITManage.tbAnnouncement WHERE id = :id AND fdBatch = 1 AND fdSent = 0";
            $announcement = Yii::app()->db->createCommand($sql)->queryRow(true, [':id' => $id]);
            if(empty($announcement)) {
                $str = 'no exist announcement';
                throw new Exception($str);
            }
            $sql = "SELECT fdAccount FROM wsqITManage.tbUser";
            $emails = Yii::app()->db->createCommand($sql)->queryAll();
            if(empty($emails)) {
                $str = 'no exist account'. PHP_EOL;
                throw new Exception($str);
            }
            $title = $announcement['fdName'];
            $content = $announcement['fdMarkdown'];
            foreach ($emails as $row) {
                $receiver = $row['fdAccount'];
                $email->sendEmail($receiver, $title, $content);
            }
            Yii::log('[ '.date('Y-m-d H:i:s'). ' ]'.'[群发公告邮件]：'. $id .PHP_EOL. $title.PHP_EOL.$content, 'info', 'system.console');
            Yii::app()->db->createCommand()->update('wsqITManage.tbAnnouncement', ['fdSent'=>1], 'id = :id', [':id' => $id]);
        } catch (Exception $e) {
            Yii::log('[群发公告邮件报错]：'. $e->__toString(), 'error', 'system.console');
        }
    }

    //@param ids dutyID-userID
    public function actionDutyNew ($ids = '')
    {
        try {
            Yii::log('[发送任务邮件]：'. $ids, 'info', 'system.console');
            $arr = explode('-', $ids);
            $email = new EmailComponent();
            $dutyID = $arr[0];
            $userID = $arr[1];
            $sql = "SELECT fdName, fdDesc FROM wsqITManage.tbDuty WHERE tbDuty.id = :id";
            $duty = Yii::app()->db->createCommand($sql)->queryRow(true, [':id' => $dutyID]);
            $sql = "SELECT tbUser.fdAccount  FROM wsqITManage.tbUser WHERE tbUser.id = :id";
            $account = Yii::app()->db->createCommand($sql)->queryScalar([':id' => $userID]);
            if(empty($duty) || empty($account)) {
                $str =  "no exist duty:$dutyID or account:$userID".PHP_EOL;
                echo $str;
                throw new Exception($str);
            }
            $title = '新任务提醒-'. $duty['fdName'];
            $content = $duty['fdDesc'];
            $receiver = $account;
            $result = $email->sendEmail($receiver, $title, $content);
            Yii::log('[发送任务邮件结果]：'. $result, 'info', 'system.console');
        } catch (Exception $e) {
            Yii::log('[发送任务邮件报错]：'. $e->__toString(), 'error', 'system.console');
        }
    }

    public function dutyBatch($id = '')
    {
        try {
            $email = new EmailComponent();
            $sql = "SELECT fdName, fdDesc, fdManager,fdTester,fdDeveloper FROM wsqITManage.tbDuty WHERE tbDuty.id = :id";
            $duty = Yii::app()->db->createCommand($sql)->queryRow(true, [':id' => $id]);
            $sql = "SELECT tbUser.fdAccount  FROM wsqITManage.tbUser 
            WHERE tbUser.id in ({$duty['fdManager']}, {$duty['fdTester']}, {$duty['fdDeveloper']})";
            $emails = Yii::app()->db->createCommand($sql)->queryAll(true, [':id' => $id]);
            if (empty ($emails)) {
                $str = 'no exist duty'.PHP_EOL;
                throw new Exception($str);
            }
            foreach ($emails as $row) {
                $receiver = $row['fdAccount'];
                $title = '任务到期提醒';
                $content = '<a href="http://manage.yii.com:8000/index.php?r=duty/index&id=6">'.$duty['fdName']. '</a></br>'.$duty['fdDesc'];
                $email->sendEmail($receiver, $title, $content);
            }
        } catch (Exception $e) {
            Yii::log('[群发任务邮件报错]：'. $e->__toString(), 'error', 'system.console');
        }
    }

// php /home/itmanage/ITManage/webroot/manage/protected/yiic.php sendemail checkduty
    public function actionCheckDuty()
    {
        $sql = "SELECT id FROM wsqITManage.tbDuty WHERE fdPlanTime <= NOW()";
        $dutyIDs = Yii::app()->db->createCommand($sql)->queryAll();
        if(empty($dutyIDs)) return false;
        foreach($dutyIDs as $id) {
            $this->dutyBatch($id['id']);
        }
    }
}