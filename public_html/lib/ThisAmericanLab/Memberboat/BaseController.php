<?php namespace ThisAmericanLab\Memberboat;

interface iBaseController {
	

}

class BaseController implements iBaseController {
	
	protected $_mysqli_db;
	
	public function set_mysqli_db(\mysqli $db) {
		$this->_mysqli_db = $db;
	}
	
}
