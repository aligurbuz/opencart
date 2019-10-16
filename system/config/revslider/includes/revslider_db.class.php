<?php
class rev_db_class{
    public static $wpdb;
    public $sdsdb;
    public $mysqli;
    public $prefix;
    public function __construct() {
        $this->prefix = DB_PREFIX;
        $this->sdsdb = new DB(DB_DRIVER,DB_HOSTNAME,DB_USERNAME,DB_PASSWORD,DB_DATABASE);
        $registry = new Registry();
        $registry->set('db', $this->sdsdb);
    }
    public function _real_escape( $string ) {
            return $this->sdsdb->escape($string);
    }
    public function _escape( $data ) {
        if ( is_array( $data ) ) {

                foreach ( $data as $k => $v ) {

                        if (is_array($v))

                                $data[$k] = $this->sdsdb->escape($v);

                        else

                                $data[$k] = $this->_real_escape( $v );

                }

        } else {

                $data = $this->_real_escape( $data );

        }



        return $data;

    }

    public function delete($table,$where){
		//global $wpdb;
		// $wpdb = $this->wpdb;
		RevSliderFunctions::validateNotEmpty($table,"table name");
		RevSliderFunctions::validateNotEmpty($where,"where");
		$where_string="";
                if(!empty($where) && is_array($where)){
            $where_string .= " ";
            $wherestr = '';
        $c = 0; 
            foreach($where as $k => $val){
                if($c > 0)
                    $wherestr .= " AND ";
                
                $wherestr .= "{$k}=";                
                if(is_string($val))
                    $wherestr .= '"'.$this->_escape($val).'"';                    
                else
                    $wherestr .= $val;
                
                $c++;
            }
            $where_string .= $wherestr;
            
        }else{
            $where_string = $where;
        }
		$query = "delete from $table where $where_string";
		
		$this->query($query);
		
		$this->checkForErrors("Delete query error");
	}
private function checkForErrors($prefix = ""){

            $errno = '';
  
			if(!empty($errno)){

				$message = '';

				$message = '';

				$this->throwError($message);

			}

		}
                private function throwError($message,$code=-1){
		RevSliderFunctions::throwError($message,$code);
	}
    public function query($sql){
    
        $query = $this->sdsdb->query($sql);
        if($query)
           return true;

        return FALSE;

    }

    public function update($table, $data, $where = '', $limit = 0, $null_values = false, $use_cache = true, $add_prefix = false){

        $wherestr = '';
        $c = 0;      

        $sql = "UPDATE {$table} SET ";
        
        if(!empty($data))
            foreach ($data as $k=>$d){
                if($c > 0)
                $sql .= ', ';
                
                if(is_string($d))
                    $sql .= "$k=\"".addslashes($d)."\"";
                else {
                    $sql .= "$k=$d";
                }
                
                $c++;
            }
        
        $sql .= " ";
            
        $c = 0;    
            
        if(!empty($where) && is_array($where)){
            $sql .= "WHERE ";
            
            foreach($where as $k => $val){
                if($c > 0)
                    $wherestr .= " AND ";
                
                $wherestr .= "{$k}=";                
                if(is_string($val))
                    $wherestr .= '"'.$this->_escape($val).'"';                    
                else
                    $wherestr .= $val;
                
                $c++;
            }
            $sql .= $wherestr;
            
        }
        
        if($this->sdsdb->query($sql))
            return true;
        
        return false;

    }
    

    public function insert($table, $data, $null_values = false, $use_cache = true, $type = 1, $add_prefix = false){

        $c = 0;      

        $cols = '';
        $vals = '';
        
        $sql = "INSERT INTO {$table}";
        
        if(!empty($data)){            
            $cols .= '(';
            $vals .= ' VALUES(';
            foreach ($data as $k=>$d){
                if($c > 0){
                    $cols .= ', ';
                    $vals .= ', ';
                }
                $cols .= $k;
                
                if(is_string($d))
                    //$vals .= "\"".addslashes($d)."\"";
                    $vals .= "'".addslashes($d)."'";
                else {
                    $vals .= $d;
                }
                
                $c++;
            }
            $cols .= ')';
            $vals .= ')';
        }
        
        $sql .= "{$cols} {$vals}";
        
        if($this->sdsdb->query($sql))
            return $this->Insert_ID();
        
        return false;

    }
    
    public function Insert_ID(){
        return $this->sdsdb->getLastId();
    }
    

    public function get_var($sql, $assoc = OBJECT){
        $sql .= ' LIMIT 1';
        $query = $this->sdsdb->query($sql);

        if(!empty($query->row)) return array_shift($query->row);

        return false;

    }

    public function get_row($sql, $assoc = OBJECT){
        $sql .= ' LIMIT 1';
        $query = $this->sdsdb->query($sql);
        if($query->row)
            return $query->row;
        return false;
    }

    public function get_results($sql, $assoc = OBJECT){
        
        $query = $this->sdsdb->query($sql); 
       // die("sdfsssdf");
        if(!empty($query->rows)) 
            return $query->rows;
        return false;
    }

public function prepare( $query, $args ) {
    if ( is_null( $query ) )
        return;
 
    // This is not meant to be foolproof -- but it will catch obviously incorrect usage.
     
 
    $args = func_get_args();
    array_shift( $args );
    // If args were passed as an array (as in vsprintf), move them up
    if ( isset( $args[0] ) && is_array($args[0]) )
        $args = $args[0];
    $query = str_replace( "'%s'", '%s', $query ); // in case someone mistakenly already singlequoted it
    $query = str_replace( '"%s"', '%s', $query ); // doublequote unquoting
    $query = preg_replace( '|(?<!%)%f|' , '%F', $query ); // Force floats to be locale unaware
    $query = preg_replace( '|(?<!%)%s|', "'%s'", $query ); // quote the strings, avoiding escaped strings like %%s
    array_walk( $args, array( $this, 'escape_by_ref' ) );
    return @vsprintf( $query, $args );
}
public function escape_by_ref( &$string ) {
    if ( ! is_float( $string ) )
        $string = $this->_real_escape( $string );
}
    public static function rev_db_instance(){
     if(!self::$wpdb instanceof rev_db_class){ 
		return self::$wpdb = new rev_db_class(); 
		} 
		return self::$wpdb; 
    }

    

}



