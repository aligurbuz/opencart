<?php
/* 
Version: 1.0
Author: Artur Sułkowski
Website: http://artursulkowski.pl
*/

class ModelNewsletterNewsletter extends Model {		
	public function install() {
		if($this->is_table_exist(DB_PREFIX . "newsletter")) {
			$query = $this->db->query("
				CREATE TABLE IF NOT EXISTS `".DB_PREFIX."newsletter` (
					`id` int(11) unsigned NOT NULL AUTO_INCREMENT,
					`email` varchar(128) NOT NULL,
					PRIMARY KEY (`id`)
				) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1
			");
		}
		return false;
	}

	public function is_table_exist($table){
		$query = $this->db->query("SHOW TABLES LIKE '".$table."'");
		if( count($query->rows) <= 0 ) { 
			return true;
		}
	  	return false;
	}
	
    public function getTotalSubscribers() {
        $query = $this->db->query("SELECT COUNT(*) AS total FROM ((SELECT email FROM " . DB_PREFIX . "customer WHERE newsletter = 1) UNION (SELECT email FROM " . DB_PREFIX . "newsletter)) TEMP");

        return $query->row['total'];
    }

    public function getSubscribers($data = array()) {
        $sql = 'SELECT email FROM ((SELECT email FROM ' . DB_PREFIX . 'customer WHERE newsletter = 1) UNION (SELECT email FROM ' . DB_PREFIX . 'newsletter)) TEMP';

        if (isset($data['start']) || isset($data['limit'])) {
            if ($data['start'] < 0) {
                $data['start'] = 0;
            }

            if ($data['limit'] < 1) {
                $data['limit'] = 20;
            }

            $sql .= " LIMIT " . (int)$data['start'] . "," . (int)$data['limit'];
        }
        
        $users = array();

        $query = $this->db->query($sql);
        foreach($query->rows as $row) {
        	$users[] = array(
        		'email' => $row['email'],
        		'customer' => $this->isCustomer($row['email'])
        	);
        }

        return $users;
    }	
    
    public function isCustomer($email) {
    	$query = $this->db->query("SELECT customer_id FROM " . DB_PREFIX . "customer WHERE email = '" . $email . "'");
    	if ($query->num_rows > 0) {
    		return 'yes';
    	} else {
    		return 'no';
    	}
    }
    
    public function deleteSubscriber($email) {
    	$this->db->query("UPDATE " . DB_PREFIX . "customer SET newsletter = 0 WHERE email = '" . $email . "'");
    	$this->db->query("DELETE FROM " . DB_PREFIX . "newsletter WHERE email = '" . $email . "'");
    }
}
?>