<?php
/**
 * @author    ThemePunch <info@themepunch.com>
 * @link      http://www.themepunch.com/
 * @copyright 2015 ThemePunch
 */
 
class RevSliderDB{
	private $wpdb;

	private $lastRowID;
	
	/**
	 * 
	 * constructor - set database object
	 */
	public function __construct(){
             $this->wpdb = rev_db_class::rev_db_instance();   
	}
       
	/**
	 * 
	 * throw error
	 */
	private function throwError($message,$code=-1){
		RevSliderFunctions::throwError($message,$code);
	}
	
	//------------------------------------------------------------
	// validate for errors
//	private function checkForErrors($prefix = ""){
//		//global $wpdb;
//		 $wpdb = $this->wpdb;
//		if($wpdb->last_error !== ''){
//			$query = $wpdb->last_query;
//			$message = $wpdb->last_error;
//			
//			if($prefix) $message = $prefix.' - <b>'.$message.'</b>';
//			if($query) $message .=  '<br>---<br> Query: ' . esc_attr($query);
//			
//			$this->throwError($message);
//		}
//                
//	}
	
	private function checkForErrors($prefix = ""){

            $errno = '';
  
			if(!empty($errno)){

				$message = '';

				$message = '';

				$this->throwError($message);

			}

		}
	/**
	 * 
	 * insert variables to some table
	 */
	public function insert($table,$arrItems){
		//global $wpdb;
		$wpdb = $this->wpdb;
		$wpdb->insert($table, $arrItems);
		$this->checkForErrors("Insert query error");
		
		$this->lastRowID = $wpdb->Insert_ID();
		
		return($this->lastRowID);
	}
	
	/**
	 * 
	 * get last insert id
	 */
	public function getLastInsertID(){
		//global $wpdb;
		 $wpdb = $this->wpdb;
		$this->lastRowID = $wpdb->Insert_ID();
		return($this->lastRowID);			
	}
	
	
	/**
	 * 
	 * delete rows
	 */
	public function delete($table,$where){
		//global $wpdb;
		 $wpdb = $this->wpdb;
		RevSliderFunctions::validateNotEmpty($table,"table name");
		RevSliderFunctions::validateNotEmpty($where,"where");
		
		$query = "delete from $table where $where";
		
		$wpdb->query($query);
		
		$this->checkForErrors("Delete query error");
	}
	
	
	/**
	 * 
	 * run some sql query
	 */
	public function runSql($query){
		//global $wpdb;
		 $wpdb = $this->wpdb;
		$wpdb->query($query);			
		$this->checkForErrors("Regular query error");
	}
	
	
	/**
	 * 
	 * run some sql query
	 */
	public function runSqlR($query){
		//global $wpdb;
		 $wpdb = $this->wpdb;
		$return = $wpdb->get_results($query, ARRAY_A);
		
		return $return;
	}
	
	
	/**
	 * 
	 * insert variables to some table
	 */
	public function update($table,$arrItems,$where){
		//global $wpdb;
		 $wpdb = $this->wpdb;
		$response = $wpdb->update($table, $arrItems, $where);
		return $response;
		//return($wpdb->num_rows);
	}
	
	
	/**
	 * 
	 * get data array from the database
	 * 
	 */
	public function fetch($tableName,$where="",$orderField="",$groupByField="",$sqlAddon=""){
            
		//global $wpdb;
		$wpdb = $this->wpdb;
		$query = "select * from $tableName";
		if($where) $query .= " where $where";
		if($orderField) $query .= " order by $orderField";
		if($groupByField) $query .= " group by $groupByField";
		if($sqlAddon) $query .= " ".$sqlAddon;
		
		$response = $wpdb->get_results($query,ARRAY_A);
		
		$this->checkForErrors("fetch");
		
		return($response);
	}
	
	/**
	 * 
	 * fetch only one item. if not found - throw error
	 */
	public function fetchSingle($tableName,$where="",$orderField="",$groupByField="",$sqlAddon=""){
		$response = $this->fetch($tableName, $where, $orderField, $groupByField, $sqlAddon);
		
		if(empty($response))
			$this->throwError("Record not found");
		$record = $response[0];
		return($record);
	}
	
	
	/**
	 * prepare statement to avoid sql injections
	 */
	public function prepare($query, $array){
		//global $wpdb;
		 $wpdb = $this->wpdb;
		 $query = $wpdb->prepare($query, $array);
		
		return($query);
	}
	
}

/**
 * old classname extends new one (old classnames will be obsolete soon)
 * @since: 5.0
 **/
class UniteDBRev extends RevSliderDB {}
?>