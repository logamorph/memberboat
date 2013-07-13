<?php namespace ThisAmericanLab\Memberboat;

date_default_timezone_set('America/Chicago');

class BaseDAO {
	
	protected	$_mysqli_db;
	protected	$_insert_id;
	
  /*******************************************************************/
	
	protected function getValueObjectFromArray(array $row) {
		$object = new $this->_value_object_class();
		
		$properties = array_keys(get_class_vars($this->_value_object_class));
		foreach ($properties as $name) {
			$object->$name = $row[$name];
		}
		
		return $object;
	}
	
	protected function getRecordFromValueObject($object) {
		
		$properties = array_keys(get_class_vars(get_class($object)));
		
		foreach ($properties as $name) {
			$row[$name] = $object->$name;
		}
		
		return $row;
	}
	
	protected function getValueObjectFromRecord(array $row) {
	
		$object = new $this->_value_object_class();
	
		foreach ($object as $property => $value) {
			$object->$property = $row[$property];
		}
	
		return $object;
	}
	
	/**
	 * @param	array
	 * @return	array
	 * http://no2.php.net/manual/en/mysqli-stmt.bind-param.php#100879
	 * */
	protected static function refValues(array $arr) {
		if (strnatcmp(phpversion(),'5.3') >= 0) //Reference is required for PHP 5.3+
		{
			$refs = array();
			foreach($arr as $key => $value)
				$refs[$key] = &$arr[$key];
			return $refs;
		}
		return $arr;		
	}

  //******************************************************************
  // BOILERPLATE
	
	public function set_mysqli_db(\mysqli $db) {
		$this->_mysqli_db = $db;
	}
	
}
