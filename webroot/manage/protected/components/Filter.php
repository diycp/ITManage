<?php 
class Filter extends CFilter {

	private $_actions = [
		'account/index/index',
		'account/order/list',
		'account/order/detail',
		'account/seller/index',
		'account/seller/getProductList',
		'account/seller/applySeller',
		'account/seller/customList',
		'account/seller/idcard',
		'account/seller/poster',
		'account/withdraw/index',
		'account/withdraw/apply',
		'account/withdraw/auth',
		'account/withdraw/applyResult',
		'account/withdraw/withdrawList',
		'account/withdraw/incomeList',
		'/hotel/order',
		'/hotel/submitOrder',
		'/ticket/order',
		'/ticket/submitOrder',
		'/pay/index',
		'/pay/result',
		'/pay/wechatPay',
	];

	private $_distributeActions = [
		'/index/index',
		'/hotel/detail',
		'/ticket/detail',
		'/hotel/product',
        '/ticket/product'
	];

	//绑定手机
	private $_bindingPhoneActions = [
		'/hotel/order',
		'/ticket/order',
		'account/seller/index',
	];

	protected function preFilter ($filterChain) {
		// phpinfo();die;
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
