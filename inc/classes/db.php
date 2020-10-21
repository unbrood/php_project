<?php 

	//If no constant called __CONFIG__ is defined; the file will not be loaded
	if(!defined('__CONFIG__')) {
	exit('You do not have a config file');
	}


class DB {
	
	// static variable (can access inside the class and child)
	protected static $con;

	// initialize the attribute 
	// private function: this function only can use inside the function
	// construct: OOP <-- this function will be used to initialize the class (object). 
	// constructor: https://en.wikipedia.org/wiki/Constructor_(object-oriented_programming)
	// reserve keyword __construct() <-- trigger when someone want to create this object. 
	// however, this class is private because they want to `singleton pattern`
	// https://en.wikipedia.org/wiki/Singleton_pattern
	private function __construct() {
	
		try {
			//the double colon allows to access the constant variable $con
			// https://www.php.net/manual/en/book.pdo.php
			///PDO::ATTR_ERRMODE: Error reporting.
    		// PDO::ERRMODE_SILENT: Just set error codes.
    		// PDO::ERRMODE_WARNING: Raise E_WARNING.
			// PDO::ERRMODE_EXCEPTION: Throw exceptions.
			
			//The value of the PDO::ATTR_PERSISTENT option is converted to boolean 
			//(enable/disable persistent connections), unless it is a non-numeric string, in which case it allows to use multiple persistent connection pools.

			self::$con = new PDO('mysql:charset=utf8mb4;host=localhost;port=3306;dbname=login_system', 'root', '1GHsda5123asdV?to32' );
			self::$con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			self::$con->setAttribute(PDO::ATTR_PERSISTENT, false);
		
		} catch (PDOException $e) {
			//var_dump can output different expressions (https://www.php.net/manual/en/function.var-dump.php)
			//in this case writes the exception directly on the webpage
			//var_dump($e);
			echo "Could not connect to database";
			exit;
		}
	}
	//In case connection doesn't exist, creates new connection using above 
	public static function getConnection() {
		if (!self::$con) {
			new DB();
		}
		return self::$con;
	}
}

?>
