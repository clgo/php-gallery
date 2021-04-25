<?php 

require_once("dbconfig.php");

/**
 * 
 */
class Database {

	public $connection;
	
	function __construct() {

		$this->open_db_connection();

		// echo "True";		
	}

	public function open_db_connection() {

		// old functional way of doing sql connection
		// $this->connection = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);

		// using oop way of doing sql connection
		$this->connection = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

		if($this->connection->connect_errno) {
			// Do not use die, it will creates problem and kills database sliently especially hard to debug in jquery/ajax request.
			// die("Database connection failed badly" . mysql_error());
			
			// using oop way of doing sql connection
			throw new Exception($this->connection->connect_error);
		}
	}

	public function query($sql) {
		// old functional way of doing sql connection
		// $result = mysqli_query($this->connection, $sql);

		$result = $this->connection->query($sql);

		$this->confirm_query($result);
		
		return $result;		
	}

	private function confirm_query($result) {

		if($result === false) {
			// Do not use die, it will creates problem and kills database sliently especially hard to debug in jquery/ajax request.
			// die("Database connection failed badly" . mysql_error());
			
			// old functional way of doing sql connection
			// throw new Exception(mysql_error($this->connection));

			// using oop way of doing sql connection
			throw new Exception($this->connection->connect_error);
		}

	}

	public function escape_string($string) {

		// old functional way of doing sql connection
		// $escaped_string = mysqli_real_escape_string($this->connection, $string);

		// using oop way of doing sql connection
		$escaped_string = $this->connection->real_escape_string($string);
		return $escaped_string;
	}


	public function the_insert_id() {

		return $this->connection->insert_id;
	}


}

$database = new Database();


?>