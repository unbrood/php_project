<?php 

    // Force the user to be logged in or redirect

    function ForceLogin(){
		if(isset($_SESSION['user_id'])){
			// if the user is allowed here
		
		} else {
			// if the user is not allowed here
			header("Location: /login.php"); exit;
		}		
    }

    // Force user to go to dashboard when logged in
    // function ForceDashboard(){
	// 	if(isset($_SESSION['user_id'])){
	// 		// if the user is allowed here
		
	// 	} else {
	// 		// if the user is not allowed here
	// 		header("Location: /dashboard.php"); exit;
	// 	}		
    // }
?>