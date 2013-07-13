<?php namespace ThisAmericanLab\Memberboat;

//require_once dirname(__FILE__).'/Group.php';
//require_once dirname(__FILE__).'/GroupDAO.php';
require_once __DIR__.'/BaseService.php';

interface iSubscriptionService {
	
}

class SubscriptionService extends BaseService implements iSubscriptionService {
	
	public function __construct() {
	//	$this->_dao = new GroupDAO();
	}
	
	/**
	 * @return	array<Member>
	 * */
	public function getSubscriptionMembers() {
		// $dao = $this->_dao;
		
		return $dao->selectMembers();
		
	}
	
	/***** INHERITED FROM BaseService *****
	 * public function set_mysqli_db(mysqli $db)
	 */
	
}
