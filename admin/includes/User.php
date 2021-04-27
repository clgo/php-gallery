<?php

/**
 * 
 */
class User
{
	public $id;
	public $username;
	public $password;
	public $first_name;
	public $last_name;
	
	function __construct()
	{
		# code...
	}

	public static function find_all_users() {
		return self::find_this_query("SELECT * FROM users");
	}

	public static function find_user_by_id($userid) {
		$result_array = self::find_this_query("SELECT * FROM users WHERE id = $userid LIMIT 1");

		return empty($result_array) ? false : array_shift($result_array);
	}


	public static function verify_user($username, $password) {
		global $database;

		$clean_username = $database->escape_string($username);
		$clean_password = $database->escape_string($password);

		$query = "SELECT * FROM users WHERE ";
		$query .= "username = '{$clean_username}' ";
		$query .= "and password = '{$clean_password}' ";
		$query .= "Limit 1";

		$result_array = self::find_this_query($query);	

		return empty($result_array) ? false : array_shift($result_array);	
	}


	public static function find_this_query($sql) {
		global $database;

		$result_set = $database->query($sql);
		$object_array = array();
		while($row = mysqli_fetch_array($result_set)) {
			$object_array[] = self::instantiate($row);
		}
		return $object_array;
	}


	public static function instantiate($record) {
		$obj = new self;

		foreach ($record as $attribute => $value) {
			# code...
			if($obj->has_the_attribute($attribute)) {
				$obj->$attribute = $value;
			}
		}

		return $obj;
	}


	private function has_the_attribute($attribute) {
		$obj_properties = get_object_vars($this);

		return array_key_exists($attribute, $obj_properties);
	}
}

?>