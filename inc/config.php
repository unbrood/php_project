<?php 
	//If no constant called __CONFIG__ is defined; the file will not be loaded
	if(!defined('__CONFIG__')) {
		exit('You do not have a config file');
	}
	// Sessions are always turned on
	if(!isset($_SESSION)){
		session_start();
	}

	// Allow errors to be displayed
	error_reporting(-1);
	ini_set('display_errors', 'On');

	//Config posted below will not be loaded in case the above constant is not defined

	include_once "classes/db.php";
	include_once "classes/filter.php";
?>