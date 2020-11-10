<?php 
	//Allows the index.php to use the config file defined in the *inc* folder
	define('__CONFIG__', true);
	//Sets the config.php as required; Will try to include once and then stay loaded
	require_once "../inc/config.php"; 

    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        // Always returns JSON format
        // header('Content-Type: application/json');

        $return = [];
        
        // Uses filter function to sanitize DB query
        $email = Filter::String( $_POST['email'] );
        $password = $_POST['password'];

        // Get the DB connection (moved to config file)
        // $con = DB::getConnection();

        // Verify user does not exist
        $findUser = $con->prepare("SELECT user_id, password FROM users WHERE email = LOWER(:email) LIMIT 1");
        $findUser->bindParam(':email', $email, PDO::PARAM_STR);
        $findUser->execute();

        if($findUser->rowCount() == 1){
            // If user already exists try to sign them in 
            //query user id and password
            $User = $findUser->fetch(PDO::FETCH_ASSOC);
            
            $user_id = (int) $User['user_id'] = 1;
            $hash = (string) $User['password'];

            if(password_verify($password, $hash)){
                // User is signed in (redirect doesn't seem to be working)
                $return['redirect'] = '/dashboard.php';
                // header("Location: http://localhost:8080/dashboard.php");

                $_SESSION['user_id'] = $user_id;
            } else {
                // Invalid user email/password
                $return['error'] = "Invalid user email or password.";
            }

        } else {
            $return['error'] = "You do not have an account. <a href='../register.php'> Create an account now</a>";
        }
     
        // Return the information back to JavaScript to redirect user
        $return['redirect'] = 'dashboard.php';
        // $return = [
        //    'redirect' => 'dashboard.php'
        // ]

        $str = json_encode($return, JSON_PRETTY_PRINT);
        // {"redirect":"dashboard.php"}

        echo $str; 
        exit;
    } else {
        // Stop script and redirect user
        exit('Invalid URL');
    }
    //https://stackoverflow.com/questions/14918462/get-response-from-php-file-using-ajax
?>