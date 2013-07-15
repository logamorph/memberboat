<?php namespace ThisAmericanLab\Memberboat;

interface iBaseService {
	

}

class BaseService implements iBaseService {
	
	protected $_pdo_db;
	protected $_dao;
	
	public function set_pdo_db(\PDO $db) {
		$this->_pdo_db = $db;
		$this->_dao->set_pdo_db($db);
	}
	
}
