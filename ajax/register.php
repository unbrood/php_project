<?php 
	//Allows the index.php to use the config file defined in the *inc* folder
	define('__CONFIG__', true);
	//Sets the config.php as required; Will try to include once and then stay loaded
	require_once "../inc/config.php"; 

    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        // Always returns JSON format
        //header('Content-Type: application/json');

        $return = [];
        
        // Uses filter function to sanitize DB query
        $email = Filter::String( $_POST['email'] );

        // Get the DB connection (*move to config file)
        // $con = DB::getConnection();

        // Verify user does not exist
        $findUser = $con->prepare("SELECT user_id FROM users WHERE email = LOWER(:email) LIMIT 1");
        $findUser->bindParam(':email', $email, PDO::PARAM_STR);
        $findUser->execute();

        if($findUser->rowCount() == 1){
            // If user already exists
            // Can also check if already logged in
            $return['error'] = "You already have an account.";
            $return['is_logged_in'] = false; 
        } else {

            $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

            $addUser = $con->prepare("INSERT INTO users(email, password) VALUES(LOWER(:email), :password)");
            $addUser->bindParam(':email', $email, PDO::PARAM_STR);
            $addUser->bindParam(':password', $password, PDO::PARAM_STR);
            $addUser->execute();

            $user_id = $con->lastInsertId();

            $_SESSION['user_id'] = (int) $user_id;

            $return['redirect'] = 'dashboard.php?message=welcome';
            $return['is_logged_in'] = true; 
        }
        
        // Verify user can be added AND is added
        
        // Return the information back to JavaScript to redirect user
        // $return['redirect'] = '/dashboard.php';        

        echo json_encode($array, JSON_PRETTY_PRINT); exit;
    } else {
        // Stop script and redirect user
        exit('Invalid URL');
    }
 
?>