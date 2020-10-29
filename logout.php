<?php
	
	// kills session after 1 hour was required by php 5.6 and lower
	// $past = time() - 3600;

	session_start();
	session_destroy();
	session_write_close();
	setcookie(session_name(),'',0,'/');
	session_regenerate_id(true);

	header("Location: /index.php");

?>
