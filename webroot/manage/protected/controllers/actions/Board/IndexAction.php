<?php
class IndexAction extends Action
{
    public function run()
    {
        Yii::import('application.models.Common.MenuForm');
        $menuForm = new MenuForm;
        $menus = $menuForm->getMenus();
        $data['data'] = $menus;
        Yii::import('application.models.Common.SelectorForm');
        $selectorForm = new SelectorForm();
        $params = [
            'project'
        ];
        $project = $selectorForm -> search($params);
        $data['project'] = $project['data']['project'];
        $data['controller'] = $this->controller->id;
        $data['career'] = Yii::app()->user->career;
        $data['nickname'] = Yii::app()->user->nickname;
        $data['url'] = $this->controller->createUrl('board/operate');
        $this->controller->smartyRender('index', $data);
    }
}