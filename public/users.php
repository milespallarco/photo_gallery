<?php
require_once('database.php');

class User {

  public $id;
  public $username;
  public $password;
  public $first_name;
  public $last_name;

  public static function find_all(){
  	global $database;
	$result_set = $database->query("SELECT * FROM users");
	return $result_set;
	}
	
	public static function find_by_id($id=0) {
	  global $database;
	  $result_set = $database->query("SELECT * FROM users 
	  WHERE id={$id}");
	  $found = $database->fetch_array($result);
	  return $found; 
  }	
     public static function find_by_sql($sql="") {
	 	global $database;
		$result_set = $database->query($sql);
		return $result_set;
	 }
     public function full_name() {
	 	if(isset($this->first_name) && isset($this->last_name)) {
			return $this->first_name ." " .$this->last_name;
		} else {
			return "";
		}
	 }
	 private static function instantiates($record) {
	 	//$object = new self;
		//$object->id = $record['id'];
		//$object->username = $record['username'];
		//$object->password = $record['password'];
		//$object->first_name = $record['first_name'];
		//$object->last_name = $record['last_name'];
		
		foreach($record as $attribute=>$value) {
			if($object->has_attribute($attibute)) {
				$object->$attribute = $value;
			}
		}
		return $object;
	 }
   private function has_attribute($attribute){
   	$object_vars = get_object_vars($this);
	return array_key_exists($attribute, $object_vars);
   }
?>