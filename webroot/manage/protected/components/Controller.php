<?php
/**
 * Controller is the customized base controller class.
 * All controller classes for this application should extend from this base class.
 */
class Controller extends CController
{

	/**
	 *  $this->actions  保存route中action到对应action文件
	 * @var array
	 */
	public  $actions = array();
	public function actions(){
		return $this->actions;
	}

	public function init()
	{
		$baseURL = rtrim(BASE_URL, '/');
		Yii::app()->getRequest()->setBaseUrl($baseURL);
	}

	/**
	 * 进入controller之后创建action，要求url上面的action和对应文件action的映射关系如
	 * controllerID/actionID => application.controllers.actions.controllerID.ActionIDAction.php
	 * @param $actionID
	 * @return mixed
	 */
	public function createAction($actionID){
		if (empty($this->module)) {
			Yii::import("application.controllers.actions.{$this->id}.*");
		}
		if(empty($actionID)) {
			$actionID = $this->defaultAction;
		}
		$this->actions[$actionID] = ucfirst($actionID). 'Action';
		/*if ($moduleID = $this->module->id) {
			Yii::import("application.modules.{$moduleID}.controllers.actions.{$this->id}.*");
			Yii::import("application.modules.{$moduleID}.models.{$this->id}.*");
		} else {
			Yii::import("application.controllers.actions.{$this->id}.*");
			Yii::import("application.models.{$this->id}.*");
		}
		if(empty($actionID)) {
			$actionID = $this->defaultAction;
		}
		
		$this->actions[$actionID] = ucfirst($actionID) . "Action";*/
		return parent::createAction($actionID);
	}
	
	/**
	 * 过滤url，未登录用户需要跳转到登录页面
	 */
	public function filters() {
		return array(
			array(
				'application.components.Filter'
			),
		);
	}

	public function beforeAction($action){
		if(method_exists($action,'beforeRun'))
			$action->beforeRun();
		return true;
	}

	public function afterAction($action){
		if(method_exists($action, 'afterRun')){
			$action->afterRun();
		}
		return true;
	}

	public function smartyRender($views, $data = array(), $themeID = '', $moduleID = '', $controllerID = '', $return = false)
	{
		$assignData = array();
		$assignData['baseURL'] = BASE_URL;
		$assignData['cssURL'] = BASE_CSS_URL;
		$assignData['jsURL'] = BASE_JS_URL;
		/*$assignData['imgURL'] = BASE_URL;
		$assignData['storeID'] = Yii::app()->store->id;
		$assignData['storeName'] = Yii::app()->store->name;
		$assignData['storeLogo'] = Yii::app()->store->logo;
        $assignData['storeQrcode'] = Yii::app()->store->qrcode;
        $assignData['storeWxName'] = Yii::app()->store->wxName;
		$assignData['storeURL'] = BASE_URL.'?storeID='.$assignData['storeID'];
		$assignData['__accountURL'] = BASE_URL.'account/?storeID='.$assignData['storeID'];
		$assignData['__packageURL'] = BASE_URL.'hotel/packageList?storeID='.$assignData['storeID'];
		$assignData['__hotelURL'] = BASE_URL.'hotel/index?storeID='.$assignData['storeID'];
		$assignData['__ticketURL'] = BASE_URL.'ticket/list?storeID='.$assignData['storeID'];*/
		$assignData = array_merge($assignData, $data);

		if (Yii::app()->request->getParam('_debug') == 'mayi') {
			echo json_encode($assignData);
			Yii::app()->end();
		}

		return Yii::app()->smarty->render($views, $assignData, $themeID, $moduleID, $controllerID, $return);
	}

	public function errorRender($errorMsg = '', $params = ['backURL' => true])
	{
		$backURL = isset($params['backURL']) && $params['backURL'] ? BASE_URL.'?storeID='.Yii::app()->store->id : null;
		$data = [
			'errorMsg' => $errorMsg,
			'backURL' => $backURL,
		];
		$this->smartyRender('404', $data, null, null, 'site');
		Yii::app()->end();
	}
}