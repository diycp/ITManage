<?php 
class Filter extends CFilter {

	protected function preFilter ($filterChain) {
		if (Yii::app()->getController()->id != 'login' && Yii::app()->user->isGuest) {
			Yii::app()->user->loginRequired();
		}
		/*$action = $filterChain->controller->module->id . '/' . $filterChain->controller->id . '/' . $filterChain->action->id;
		if (in_array($action, $this->_actions)) {
			if (Yii::app()->user->isGuest) {
				Yii::app()->user->loginRequired();
			}
		}
		//如果后台设置了点击链接绑定分销关系，应该要求先登录
		if (in_array($action, $this->_distributeActions)) {
			$sellerCode = Yii::app()->request->getParam('code');
			$storeID = Yii::app()->request->getParam('storeID');
			$distributeSet = ServiceFactory::getService('distribute')->getStoreDistributeSetting($storeID);
	        if ($sellerCode>'' && $distributeSet['fdBindingType'] == 1) {
	        	if (Yii::app()->user->isGuest) {
					Yii::app()->user->loginRequired();
				}
	        }
		}
		//如果用户没有绑定手机，则要求登录
		if (in_array($action, $this->_bindingPhoneActions)) {
			Yii::import("application.modules.account.models.services.*");
			$userInfo = ServiceFactory::getService('account')->getUserInfo();
			if (empty($userInfo['fdPhone'])) {
				$bindingURL = Yii::app()->getController()->createUrl('/account/profile/bindingPhone', ['return' => urlencode($_SERVER['REQUEST_URI'])]);
				Yii::app()->getController()->redirect($bindingURL);
				Yii::app()->end();
			}
		}*/
		
		$filterChain->run();
	}

	protected function postFilter ($filterChain) {
		
	}
}
