<?php namespace ThisAmericanLab\Memberboat;

date_default_timezone_set('America/Chicago');

class BaseDAO {
	
	protected	$_pdo_db;
	protected	$_insert_id;
	
	protected	$_table;
	protected	$_value_object_class;
	
  /*******************************************************************/

	public function select($id_value, $column = 'id') {
		$db = $this->_pdo_db;
		
		$params = array(
			':id_value' => $id_value
			);
		
		$sql = "SELECT * FROM $this->_table
				WHERE $column = :id_value";
		
		if (($stmt = $db->prepare($sql)) instanceof \PDOStatement) {
			if ($stmt->execute($params)) {
				$thing = $stmt->fetchObject($this->_value_object_class);
			} else {
				var_dump($stmt->errorInfo());
			}
		}
		
		return $thing;
	}
	
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
	
	public function set_table($name) {
		$this->_table = $name;
	}

	public function set_value_object_class($name) {
		$this->_value_object_class = $name;
	}
	
	public function set_pdo_db(\PDO $db) {
		$this->_pdo_db = $db;
	}
	
	public function set_mysqli_db(\mysqli $db) {
		$this->_mysqli_db = $db;
	}
	
}
