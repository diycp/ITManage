<?php
# php /home/itmanage/ITManage/webroot/manage/protected/yiic.php generatedata
class GenerateDataCommand extends CConsoleCommand
{
    public function actionIndex()
    {
        echo 'enter command';
        $this->generateAccount();
    }

    protected function generateAccount()
    {
        $sql = "INSET INTO wsqITManage.tbUser (fdNickName,fdAccount,fdPassword,fdUserTypeID) VALUES (:name,:account,:password,:type)";
        $params = [
            ':name' => 'admin',
            ':account' => '969610165@qq.com',
            ':password' => password_hash('imadmin', PASSWORD_DEFAULT),
            ':type' => 1
        ];
        $result = Yii::app()->db->createCommand($sql)->execute($params);
        echo $result ? 'success' : 'error';
    }
}