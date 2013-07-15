<?php namespace ThisAmericanLab\Memberboat;

require_once __DIR__.'/BaseService.php';

require_once dirname(__FILE__).'/Member.php';
require_once dirname(__FILE__).'/MemberDAO.php';

interface iMemberService {
	
	public function getById($id);
	
}

class MemberService extends BaseService implements iMemberService {
	
  // *****************************************************
	
	const OBJECT_CLASS = 'ThisAmericanLab\Memberboat\Member';
	const TABLE        = 'boat_member';

  // *****************************************************
	
	public function __construct() {
		
		$this->_dao = new MemberDAO();
		
		$this->_dao->set_value_object_class(self::OBJECT_CLASS);
		$this->_dao->set_table(self::TABLE);
	}
	
	/**
	 * @param	(int) id
	 * @return	Member
	 * */
	public function getById($id) {
		$dao = $this->_dao;
		
		return $dao->select($id);
	}
	
	/***** INHERITED FROM BaseService *****
	 * public function set_pdo_db(\PDO $db)
	 */
	
}
