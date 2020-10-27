<?php
	//Allows the index.php to use the config file defined in the *inc* folder
	define('__CONFIG__', true);
	//Sets the config.php as required; Will try to include once and then stay loaded
	require_once "inc/config.php"; 

	if(isset($_SESSION['user_id'])){
		// if the user is allowed here

	} else {
		// if the user is not allowed here
		header("Location: /login.php"); exit;
	}
	echo $_SESSION['user_id'] . 'is your user id';
	exit;
?>
<!DOCTYPE = html>
<html lang="en">
	<head>
		<meta charset="utf-8" />
		<meta http-equiv="X-UA-Compatible" content="If=edge" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<meta name="robots" content="follow" />

			<title>PHP Project</title>
		
			<base href="/" />
		<!-- Most browsers expect a favicon to be defined
		<link rel="icon" type="image/png" href="/somefolder/myicon.png" /> -->
		
		<!-- UIkit CSS -->
		<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/uikit@3.5.8/dist/css/uikit.min.css" />

	</head>	
	
	<body>
	<div class="uk-section uk-container">
		This is the dashboard
	</div>
	<?php 
		require_once "inc/footer.php";
	?>
	</body>
</html>	