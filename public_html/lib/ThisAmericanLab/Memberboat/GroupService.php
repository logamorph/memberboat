<?php namespace ThisAmericanLab\Memberboat;

//require_once dirname(__FILE__).'/Group.php';
//require_once dirname(__FILE__).'/GroupDAO.php';
require_once __DIR__.'/BaseService.php';

interface iGroupService {
	
	public function getByUrlname($urlname);
	
}

class GroupService extends BaseService implements iGroupService {
	
	public function __construct() {
	//	$this->_dao = new GroupDAO();
	}
	
	/**
	 * @param	Lead
	 * @return	Group
	 * */
	public function getByUrlname($urlname) {
		// $dao = $this->_dao;
		
		$group = new \StdClass();
		$group->name = "Greenwood Hills Neighborhood Association";
		
		// return $dao->getGroupForLead($lead);
		return $group;
	}
	
	/***** INHERITED FROM BaseService *****
	 * public function set_mysqli_db(mysqli $db)
	 */
	
}
