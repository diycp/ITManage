<?php
class UserForm extends FormModel
{
    public $page = 1;
    public $length = 12;
    public $userID;
    
    public function list()
    {
        $response = ['code' => -1, 'message' => 'error:empty', 'data' => ['list' => []]];
        $criteria = new CDbCriteria();
        $criteria->select = "tbUser.id, tbUser.fdAccount, tbUser.fdNickname, tbUserType.fdName, tbUser.fdUpdate, tbUserType.id AS type";
        $tablename = "{$this->im}.tbUser";
        $criteria->join = "INNER JOIN {$this->im}.tbUserType ON tbUserType.id = tbUser.fdUserTypeID";
        $criteriaCount = clone $criteria;
        $criteriaCount->select = "COUNT(DISTINCT tbUser.id)";
        $total = Yii::app()->db->commandBuilder->createFindCommand($tablename, $criteriaCount, 'tbUser')->queryScalar();
        if (empty($total)) return $response;
        $criteria->limit = $this->length;
        $criteria->offset = ($this->page-1) * $this->length;
        $criteria->order = 'tbUser.fdUpdate DESC';
        $table = Yii::app()->db->commandBuilder->createFindCommand($tablename, $criteria, 'tbUser')->queryAll();
        foreach($table as $row) {
            $user = [];
            $user['id'] = $row['id'];
            $user['account'] = $row['fdAccount'];
            $user['nickname'] = $row['fdNickname'];
            $user['career'] = $row['fdName'];
            $user['update'] = $row['fdUpdate'];
            $user['type'] = $row['type'];
            $userList[] = $user;
        }
        $pagination = new CPagination($total);
        $pagination->pageSize = $this->length;
        $response['code'] = 0;
        $response['message'] = 'ok';
        $response['data']['list'] = $userList;
        $response['data']['pagination'] = $pagination;
        // Yii::log(CVarDumper::dumpAsString($response), 'info', 'system.log');
        return $response;
    }

    public function add($params)
    {
        $response = ['code' => -1, 'message' => ''];
        list($nickname, $account, $password, $career) = array($params['nickname'], $params['account'], $params['password'], $params['career']);
        $sql = "SELECT COUNT(*) FROM {$this->im}.tbUser WHERE fdAccount = :account";
        $exist = Yii::app()->db->createCommand($sql)->queryScalar([':account' => $account]);
        if ($exist) {
            $response['message'] = '该帐号已被注册';
            return $response;
        }
        $sql = "SELECT COUNT(*) FROM {$this->im}.tbUser WHERE fdNickname = :nickname";
        $exist = Yii::app()->db->createCommand($sql)->queryScalar([':nickname' => $nickname]);
        if ($exist) {
            $response['message'] = '该昵称已被使用';
            return $response;
        }
        $sql = "INSERT INTO {$this->im}.tbUser (fdNickname, fdAccount, fdPassword, fdUserTypeID) VALUES (:nickname, :account, :password, :career)";
        $result = Yii::app()->db->createCommand($sql)->execute([
            ':nickname' => $nickname,
            ':account' => $account,
            ':password' => password_hash($password, PASSWORD_DEFAULT),
            ':career' => $career
        ]);
        if (!empty($result)) {
            $response['code'] = 0;
        } else {
            $response['message'] = '数据插入失败';
        }
        return $response;
    }
}