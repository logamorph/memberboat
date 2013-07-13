<?php namespace ThisAmericanLab\Memberboat;

class Base {
	
	// MAGIC METHODS RESTRICT PUBLICLY ACCESSIBLE VARIABLES
	
	public function __get($name) {
		if (!property_exists($this, $name)) {
			return FALSE;
		}
	}
	
	public function __set($name, $value) {
		if (!property_exists($this, $name)) {
			return FALSE;
		}
	}

}
