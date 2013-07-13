<?php namespace ThisAmericanLab\Memberboat;

require_once __DIR__.'/Base.php';
require_once __DIR__.'/Person.php';

class Member extends Base {
	
	public $id;
	public $main_person_id;
	public $address_line1;
	public $address_line2;
	public $address_city;
	public $adderss_state;
	public $address_zip;
	
}
