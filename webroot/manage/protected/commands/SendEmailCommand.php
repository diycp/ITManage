<?php
class SendEmailCommand extends CConsoleCommand
{
    public function actionAnnouncementBatch($id = '')
    {
        Yii::log('[群发公告邮件测试]：', 'error', 'system.console');
        try {
            $email = new EmailComponent();
            $sql = "SELECT fdName, fdDesc, fdMarkdown FROM wsqITManage.tbAnnouncement WHERE id = :id AND fdBatch = 1 AND fdSent = 0";
            $announcement = Yii::app()->db->createCommand($sql)->queryRow(true, [':id' => $id]);
            if(empty($announcement)) {
                echo 'no exist announcement'.PHP_EOL;
                die;
            }
            $sql = "SELECT fdAccount FROM wsqITManage.tbUser";
            $emails = Yii::app()->db->createCommand($sql)->queryAll();
            if(empty($emails)) {
                echo 'no exist account'. PHP_EOL;
                die;
            }
            foreach ($emails as $row) {
                $receiver = $row['fdAccount'];
                $title = $announcement['fdName'];
                $content = $announcement['fdMarkdown'];
                $email->sendEmail($receiver, $title, $content);
                // Yii::log('[群发公告邮件测试]：'. $receiver, 'error', 'system.console');
            }
            Yii::app()->db->createCommand()->update('wsqITManage.tbAnnouncement', ['fdSent'=>1], 'id = :id', [':id' => $id]);
        } catch (Exception $e) {
            Yii::log('[群发公告邮件报错]：'. $e->__toString(), 'error', 'system.console');
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
                echo 'no exist duty'.PHP_EOL;
                die;
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