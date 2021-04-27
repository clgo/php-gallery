<?php  

	// Scanning the folders in our project to undefind objects
	function autoLoader($class) {

		// Change the class name to all same case, either lowercase or uppercase
		$class = strtolower($class);

		$path = "includes/{$class}.php";

		if(is_file($path) && !class_exists($class)) {

			include $path;
		}

	}

	function redirect($location) {

		header("Location: $location");
	}

	spl_autoload_register('autoLoader');
?>