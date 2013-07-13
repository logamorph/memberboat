<?php namespace ThisAmericanLab\Memberboat;

require_once __DIR__.'/SubscriptionViewmodel.php';
require_once __DIR__.'/BaseDAO.php';

interface iSubscriptionViewDAO {
	
}

class SubscriptionViewDAO extends BaseDAO implements iSubscriptionViewDAO {
		
	public function selectAllCurrent() {
		$db = $this->_mysqli_db;
		
		$sql = "SELECT boat_member.address_line1, 
					boat_person.first_name,
					boat_person.last_name,
					boat_person.email,
					boat_person.phone,
					boat_subscription.expire_on 
				FROM boat_subscription 
				  JOIN boat_member ON boat_subscription.member_id = boat_member.id 
				  JOIN boat_person ON boat_member.main_person_id = boat_person.id";
		
		$rs = $db->query($sql);
		
		while($object = $rs->fetch_object('SubscriptionViewmodel')) {
			$result[] = $object;
		}
		
		return (!empty($result)) ? $result : FALSE;
	}
}
