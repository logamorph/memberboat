<?php namespace ThisAmericanLab\Memberboat;
	
require_once __DIR__.'/BaseService.php';

require_once __DIR__.'/SubscriptionViewDAO.php';

interface iSubscriptionViewService {
}

class SubscriptionViewService extends BaseService implements iSubscriptionViewService {
	
	public function __construct() {
		$this->_dao = new SubscriptionViewDAO();
	}
	
	/**
	 * @return	array<Member>
	 * */
	public function listAllCurrent() {
		$dao = $this->_dao;
		
		return $dao->selectAllCurrent();
		
	}
	
	/***** INHERITED FROM BaseService *****
	 * public function set_mysqli_db(\mysqli $db) {
	 * 	$this->_mysqli_db = $db;
	 * 	$this->_dao->set_mysqli_db($db);
	 * }
	 */
	
}
