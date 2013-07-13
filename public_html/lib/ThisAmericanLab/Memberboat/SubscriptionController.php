<?php namespace ThisAmericanLab\Memberboat;

require_once __DIR__.'/BaseController.php';

require_once __DIR__.'/SubscriptionViewService.php';

interface iSubscriptionController {
	
}

class SubscriptionController extends BaseController implements iSubscriptionController {

	public function getList() {
		$db = $this->_mysqli_db;
		
		// ****************************************************
		// instantiate the service objects
		
		// putting everything in this because I don't know what else yet
		$subscription_view_service = new SubscriptionViewService();
		$subscription_view_service->set_mysqli_db($db);
		
		// ****************************************************
		// data retrieval and processing
		
		// array
		$viewmodel_list = $subscription_view_service->listAllCurrent();
		
		return $viewmodel_list;
	}
}
