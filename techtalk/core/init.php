<!-- Initializer file -->
<!-- Creating autoloader for the classes and requiring any files -->

<?php

	//Start Session
	session_start();

	//Include Configuration
	require_once('config/config.php');

	//Helper Function Files
	require_once('helpers/system_helper.php');
	require_once('helpers/format_helper.php');
	require_once('helpers/db_helper.php');

	//Autoload Classes
	//This function will autoload the class unless the file name matches the class name then it will require the class automatically otherwise should have to require
	function __autoload($class_name){
		require_once('libraries/'.$class_name.'.php');
	}
?>