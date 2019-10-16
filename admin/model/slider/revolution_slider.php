<?php
/* 
Version: 1.0
Author: Artur Sułkowski
Website: http://artursulkowski.pl
*/

class ModelSliderRevolutionslider extends Model {	
	private $errors = array();
	
	public function getSliders() {
		$output = array();
		if($this->is_table_exist(DB_PREFIX . "revslider_sliders")) {
     		$query = $this->db->query("SELECT * from ".DB_PREFIX."revslider_sliders");
     		if (count($query->rows) > 0) {
     			foreach ($query->rows as $row) {
     				$output[] = array(
     					'id' => $row['id'],
     					'name' => $row['title']
     				);
     			}
     		}
     	}
		return $output;
	}
	
	public function is_table_exist($table){
		$query = $this->db->query("SHOW TABLES LIKE '".$table."'");
		if( count($query->rows) > 0 ) { 
			return true;
		}
	  	return false;
	}
}
?>