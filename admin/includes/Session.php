<?php  

/**
 * 
 */
class Session
{
	private $signed_in = false;
	public $user_id;

	
	function __construct()
	{
		# Automatically starts a session.
		session_start();
		$this->check_user_login();
	}

	public function is_signed_in() {

		return $this->signed_in;

	}

	public function login($user) {

		if($user) {

			// two things are done here, assigning the user id from database to $_SESSION['user_id'] and then assigning to this to this session instance user_id
			$this->user_id = $_SESSION['user_id'] = $user->id;
			$this->signed_in = true;

		}
	}

	public function logout() {

		unset($_SESSION['user_id']);
		unset($this->user_id);
		$this->signed_in = false;
		
	}

	private function check_user_login() {
		if(isset($_SESSION['user_id'])) {
			$this->user_id 		= $_SESSION['user_id'];
			$this->signed_in	= true;
		}
		else {
			unset($this->user_id);
			$this->signed_in = false;
		}
	}
}

$session = new Session();

?>