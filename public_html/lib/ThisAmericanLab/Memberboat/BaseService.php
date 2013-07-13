<?php namespace ThisAmericanLab\Memberboat;

interface iBaseService {
	

}

class BaseService implements iBaseService {
	
	protected $_mysqli_db;
	protected $_dao;
	
	public function set_mysqli_db(\mysqli $db) {
		$this->_mysqli_db = $db;
		$this->_dao->set_mysqli_db($db);
	}
	
}
