<?php namespace ThisAmericanLab\Memberboat;

class SubscriptionViewmodel {

	public $address_line1;
	
	public $first_name;
	public $last_name;
	public $email;
	public $phone;
	public $expire_on;
	
	
	/* The Complicated Way */
	protected $subscription;
	protected $member;
	protected $group;
	protected $person_list;
	
	
	public function getRowForView() {
		
	}
	
  // GETTER SETTER
  
	public function __get($name) {
		if (!property_exists($this, $name)) {
			return FALSE;
		} else {
			return $this->$name;
		}
	}
	
	public function __set($name, $value) {
		if (!property_exists($this, $name)) {
			return FALSE;
		}
		
		switch ($name) {
			case 'subscription':
				if ($value instanceof Subscription)
					$this->subscription = $value;
				break;
			case 'member':
				if ($value instanceof Member)
					$this->member = $value;
				break;
			case 'group':
				if ($value instanceof Group)
					$this->group = $value;
				break;
			case 'person_list':
				if (is_array($value)) {
				  foreach ($value as $obj) {
				    if ($obj instanceof Person)
					$this->person_list[] = $obj;
				  }
				}
				break;
		}
	}
	
}
