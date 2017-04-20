<?php
class GenerateDataCommand extends CConsoleCommand
{
    public function actionIndex()
    {
        echo 'test';
    }

    public function actionGenerateUser()
    {
        $users = [
            ['产品经理','guangcaida13@163.com', password_hash('chanpin',PASSWORD_DEFAULT),2],
            ['开发','minedesigndream@163.com', password_hash('kaifa',PASSWORD_DEFAULT),3],
            ['测试','2075001987@qq.com', password_hash('ceshi',PASSWORD_DEFAULT),4],
        ];
        $exUser = array_map(function($arr) {return implode("','", $arr);}, $users);
        $pattern = "('%s'),";
        $values = '';
        foreach ($exUser as $val) {
            $values.= sprintf($pattern, $val);
        }
        $values = rtrim($values, ',');
        $sql = "INSERT INTO wsqITManage.tbUser (fdNickname,fdAccount,fdPassword,fdUserTypeID) VALUES".$values;
        $result = Yii::app()->db->createCommand($sql)->execute();
        echo $result ? 'success'.PHP_EOL : 'failes'.PHP_EOL;
    }

    public function actionGenerateMenu()
    {
        $menus = [
            ['用户','user','index',1,0],
            ['菜单','menu','index',1,0],
            ['公告','announcement','index',1,0],
            ['搜索','search','index',1,1],
            ['公告','announcement','index',1,1],
            ['创建','build','index',1,1],
            ['项目','project','index',1,1],
            ['看板','board','index',1,1]
        ];
        $exMenu = array_map(function($arr) {return implode("','", $arr);}, $menus);
        $pattern = "('%s'),";
        $values = '';
        foreach ($exMenu as $val) {
            $values.= sprintf($pattern, $val);
        }
        $values = rtrim($values, ',');
        $sql = "INSERT INTO wsqITManage.tbMenu (fdName,fdController,fdAction,fdStatus,fdPlatform) VALUES".$values;
        $result = Yii::app()->db->createCommand($sql)->execute();
        echo $result ? 'success'.PHP_EOL : 'failes'.PHP_EOL;
    }
}