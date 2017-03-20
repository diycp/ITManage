<?php
class MenuForm extends FormModel
{
    public $page = 1;
    public $length = 10;

    public function list()
    {
        $response = ['code' => -1, 'message' => 'error:empty', 'data' => ['list' => []]];
        $criteria = new CDbCriteria();
        $criteria->select = "tbMenu.id, tbMenu.fdController, tbMenu.fdAction, tbMenu.fdPlatform, tbMenu.fdStatus, tbMenu.fdName, tbMenu.fdUpdate";
        $tablename = "{$this->im}.tbMenu";
        $criteriaCount = clone $criteria;
        $criteriaCount->select = "COUNT(id)";
        $total = Yii::app()->db->commandBuilder->createFindCommand($tablename, $criteriaCount, 'tbMenu')->queryScalar();
        if (empty($total)) {
            $response['message'] = '暂无数据';
            return $response;
        }
        $criteria->limit = $this->length;
        $criteria->offset = ($this->page-1) * $this->length;
        $criteria->order = 'tbMenu.fdUpdate DESC';
        $table = Yii::app()->db->commandBuilder->createFindCommand($tablename, $criteria, 'tbMenu')->queryAll();
        foreach ($table as $row) {
            $menu = [];
            $menu['id'] = $row['id'];
            $menu['controller'] = $row['fdController'];
            $menu['action'] = $row['fdAction'];
            $menu['platform'] = $row['fdPlatform'];
            $menu['name'] = $row['fdName'];
            $menu['status'] = $row['fdStatus'];
            $menu['update'] = $row['fdUpdate'];
            $menuList[] = $menu;
        }
        $response['code'] = 0;
        $response['message'] = 'ok';
        $response['data']['list'] = $menuList;
        // Yii::log(CVarDumper::dumpAsString($response), 'info', 'system.log');
        return $response;
    }

    public function modify($params)
    {
        $response = ['code' => -1, 'message' => ''];
        list($id, $name, $controller, $action, $platform, $status) = array($params['id'], $params['name'], $params['controller'], $params['action'], $params['platform'], $params['status']);
        if ($id == 2 && $status == 0) {
            $response['message'] = '菜单设置为关闭状态';
        }
        $sql = "SELECT fdName, fdController FROM {$this->im}.tbMenu WHERE id != :id AND (fdName = :name OR (fdController = :controller AND fdAction = :action))";
        $exist = Yii::app()->db->createCommand($sql)->queryAll(true, [
            ':id' => $id,
            ':name' => $name,
            ':controller' => $controller,
            ':action' => $action
        ]);
        if ($exist) {
            $nameCheck = array_column($exist, 'fdName');
            if (in_array($name, $nameCheck)) {
                $response['message'] = '该菜单名已被使用';
                return $response;
            }
            $response['message'] = '该控制器-动作已被使用';
            return $response;
        }
        $result = Yii::app()->db->createCommand()->update("{$this->im}.tbMenu",[
            'fdName' => $name,
            'fdController' => $controller,
            'fdAction' => $action,
            'fdPlatform' => $platform,
            'fdStatus' => $status
        ],'id = :id', [':id' => $id]);
        if (!empty($result)) {
            $response['code'] = 0;
        } else {
            $response['message'] = '数据更新失败';
        }
        return $response;
    }

    public function add($params)
    {
        $response = ['code' => -1, 'message' => ''];
        list($name, $controller, $action, $platform, $status) = array($params['name'], $params['controller'], $params['action'], $params['platform'], $params['status']);
        $sql = "SELECT COUNT(*) FROM {$this->im}.tbMenu WHERE fdController = :controller AND fdAction = :action AND fdPlatform = :platform";
        $exist = Yii::app()->db->createCommand($sql)->queryScalar([':controller' => $controller, ':action' => $action, ':platform' => $platform]);
        if ($exist) {
            $response['message'] = '该控制器-动作已被使用';
            return $response;
        }
        $sql = "SELECT COUNT(*) FROM {$this->im}.tbMenu WHERE fdName = :name AND fdPlatform = :platform";
        $exist = Yii::app()->db->createCommand($sql)->queryScalar([':name' => $name, ':platform' => $platform]);
        if ($exist) {
            $response['message'] = '该菜单已被使用';
            return $response;
        }
        $sql = "INSERT INTO {$this->im}.tbMenu (fdName, fdController, fdAction, fdPlatform, fdStatus) VALUES (:name, :controller, :action, :platform, :status)";
        $result = Yii::app()->db->createCommand($sql)->execute([
            ':name' => $name,
            ':controller' => $controller,
            ':action' => $action,
            ':platform' => $platform,
            ':status' => $status
        ]);
        if (!empty($result)) {
            $response['code'] = 0;
        } else {
            $response['message'] = '数据插入失败';
        }
        return $response;
    }

    public function del($params)
    {
        $response = ['code' => -1, 'message' => ''];
        $id = $params['id'];
        if ($id == 2) {
            $response['message'] = '菜单不允许删除';
            return $response;
        }
        $result = Yii::app()->db->createCommand()->delete('tbMenu','id =:id',[':id' => $id]);
        if (!empty($result)) {
            $response['code'] = 0;
        } else {
            $response['message'] = '数据删除失败';
        }
        return $response;
    }
}