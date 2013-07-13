<?php namespace ThisAmericanLab\Memberboat;

require_once __DIR__.'/Member.php';
require_once __DIR__.'/Subscription.php';
require_once __DIR__.'/BaseDAO.php';

interface iSubscriptionDAO {
	
}

class SubscriptionDAO extends BaseDAO implements iSubscriptionDAO {
	
	protected $_value_object_class = 'Subscription';


	/**
	 * @param	Group
	 * @return	array<Members>
	 * */
	public function selectMembers() {
		$db = $this->_mysqli_db;
		
		$sql = "SELECT boat_member.*
				  
				FROM boat_subscription 
				  JOIN boat_member ON boat_subscription.member_id = boat_member.id 
				  JOIN boat_person ON boat_member.main_person_id = boat_person.id";
		
		$rs = $db->query($sql);
		
		while($object = $rs->fetch_object('Member')) {
			$result[] = $object;
		}
		
		return (!empty($result)) ? $result : FALSE;
	}
	
	/**
	 * @param	Lead
	 * @return	Subscription
	 * */
	public function getSubscription() {
		$db = $this->_mysqli_db;
		
		
		if ($rs = $db->query($sql)) {
			$object = $rs->fetch_object($this->_value_object_class);
		}
		
		return (!empty($object)) ? $object : FALSE;
	}
	
	
	/**
	 * @param	Subscription
	 * @return	boolean
	 */
	public function saveSubscription(Subscription $subscription) {
		$db = $this->_mysqli_db;
		
		//****************************************************
		// SAVE TO `disposition` TABLE
		
		// transform data to array for prepared query
		$stmt_data_row = array();
		$stmt_data_row['date_entered'] 	= ($disposition->date_entered) ? $disposition->date_entered : date('Y-m-d H:i:s');
		$stmt_data_row['created_by']	= $disposition->created_by;
		$stmt_data_row['crm_lead_id'] = $disposition->crm_lead_id;
		$stmt_data_row['disposition'] = $disposition->disposition;
		$stmt_data_row['disposition_memo'] = $disposition->disposition_memo;
		$stmt_data_row['do_not_call'] = $disposition->do_not_call;
		$stmt_data_row['notes'] = $disposition->notes;
		
		$sql = "INSERT INTO disposition 
				(date_entered, created_by, crm_lead_id, disposition, disposition_memo, do_not_call, notes)
				VALUES
				( ?, ?, ?, ?, ?, ?, ? )";

		try {
			
			// create the prepared statement
			$stmt = $db->prepare($sql);

			// bind param data to statement
			$stmt->bind_param('siissis', 
				$stmt_data_row['date_entered'],
				$stmt_data_row['created_by'],
				$stmt_data_row['crm_lead_id'],
				$stmt_data_row['disposition'],
				$stmt_data_row['disposition_memo'],
				$stmt_data_row['do_not_call'],
				$stmt_data_row['notes']);
			
			// execute statement
			$stmt->execute();
			$this->_disposition_insert_id = $stmt->insert_id;
			
			echo $stmt->error;
			exit;
			
			$stmt->close();	
			
		} catch (Exception $e) {
			// return new Exception("Statement execution failed in ".__METHOD__.", ".$e->getMessage());
			// trigger_error("Statement execution failed in ".__METHOD__.", ".$e->getMessage() , E_USER_ERROR);
			return FALSE;
		}
		
		return TRUE;
	}
	
	/**
	 * @param	Subscription, Lead
	 * @return	boolean
	 */
	public function saveLeadSubscriptionRelation(Subscription $disposition, Lead $lead) {
		$db = $this->_mysqli_db;
		
		//****************************************************
		// SAVE RELATION TO `lead_disposition` TABLE
		
		// transform data to array for prepared query
		$stmt_data_row = array();
		$stmt_data_row['crm_lead_id'] 	= $lead->crm_lead_id;
		$stmt_data_row['disposition_id']	= $this->_disposition_insert_id;
		
		$sql = "INSERT INTO lead_disposition 
				(crm_lead_id, disposition_id)
				VALUES
				( ?, ? )
				ON DUPLICATE KEY UPDATE disposition_id = ?";

		try {
			
			// create the prepared statement
			$stmt = $db->prepare($sql);
			
			// bind param data to statement
			$stmt->bind_param('iii', 
				$stmt_data_row['crm_lead_id'],
				$stmt_data_row['disposition_id'],
				$stmt_data_row['disposition_id']);
			
			// execute statement
			$stmt->execute();
			$stmt->close();	
			
		} catch (Exception $e) {
			// return new Exception("Statement execution failed in ".__METHOD__.", ".$e->getMessage());
			// trigger_error("Statement execution failed in ".__METHOD__.", ".$e->getMessage() , E_USER_ERROR);
			return FALSE;
		}		
		return TRUE;
		
	}
	
	public function logSavingSubscriptionForLead(Lead $lead, Subscription $disposition, Subscription $old_disposition) {
		
		$db = $this->_mysqli_db;
		//****************************************************
		// SAVE TO `lead_disposition_log` TABLE
		// transform data to array for prepared query
		
		$stmt_data_row = array();
		$stmt_data_row['crm_lead_id'] 	= $lead->crm_lead_id;
		$stmt_data_row['disposition_id']	= $this->_disposition_insert_id;
		
		$sql = "INSERT INTO lead_disposition 
				(crm_lead_id, disposition_id)
				VALUES
				( ?, ? )
				ON DUPLICATE KEY UPDATE disposition_id = ?";

		try {
			
			// create the prepared statement
			$stmt = $db->prepare($sql);
			
			// bind param data to statement
			$stmt->bind_param('iii', 
				$stmt_data_row['crm_lead_id'],
				$stmt_data_row['disposition_id'],
				$stmt_data_row['disposition_id']);
			
			// execute statement
			$stmt->execute();
			$stmt->close();	
			
		} catch (Exception $e) {
			// return new Exception("Statement execution failed in ".__METHOD__.", ".$e->getMessage());
			// trigger_error("Statement execution failed in ".__METHOD__.", ".$e->getMessage() , E_USER_ERROR);
			return FALSE;
		}		
		return TRUE;
		
	}
	
	/**
	 * @param	int
	 * @param	string
	 * @return	array<Subscription>
	 */
	public function select($id, $column_name = 'id') {
		$db = $this->_mysqli_db;
		
		$id_escaped = $db->real_escape_string($id);
		
		$sql = "SELECT * FROM disposition 
				WHERE $column_name = $id";
		
		$rs = $db->query($sql);
		
		while($object = $rs->fetch_object($this->_value_object_class)) {
			$result[] = $object;
		}
		
		return (!empty($result)) ? $result : FALSE;
	}
	
	
	/***** INHERITED FROM BaseDAO *****
	 * public function set_mysqli_db(mysqli $db)
	 */
	
}
