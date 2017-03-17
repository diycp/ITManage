<?php
/**
 * Controller is the customized base controller class.
 * All controller classes for this application should extend from this base class.
 */
class Controller extends CController
{
	/**
	 * @var string the default layout for the controller view. Defaults to '//layouts/column1',
	 * meaning using a single column layout. See 'protected/views/layouts/column1.php'.
	 */
	public $layout='//layouts/column1';
	/**
	 * @var array context menu items. This property will be assigned to {@link CMenu::items}.
	 */
	public $menu=array();
	/**
	 * @var array the breadcrumbs of the current page. The value of this property will
	 * be assigned to {@link CBreadcrumbs::links}. Please refer to {@link CBreadcrumbs::links}
	 * for more details on how to specify this property.
	 */
	public $breadcrumbs=array();

	public $defaultAction = 'index';

	public  $actions = array();
	public function actions(){
		return $this->actions;
	}

	public function init()
	{
		$baseURL = rtrim(BASE_URL, '/');
		Yii::app()->getRequest()->setBaseUrl($baseURL);
	}
	
	public function createAction($actionID){
	    Yii::import("application.controllers.".ucfirst($this->id).".*");
		if(empty($actionID)) {
			$actionID = $this->defaultAction;
		}
		$this->actions[$actionID] = ucfirst($actionID). 'Action';
		return parent::createAction($actionID);
	}

	public function filters()
	{
		return array(
			array(
				'application.components.Filter'
			),
		);
	}
}