<?php
	//Allows the index.php to use the config file defined in the *inc* folder
	define('__CONFIG__', true);
	//Sets the config.php as required; Will try to include once and then stay loaded
	require_once "inc/config.php"; 

	ForceLogin();	

	$user_id = $_SESSION['user_id'];

	$getUserInfo = $con->prepare("SELECT email, reg_time FROM users WHERE user_id = :user_id LIMIT 1");
	$getUserInfo->bindParam(':user_id', $user_id, PDO::PARAM_INT);
	$getUserInfo->execute();

	if($getUserInfo->rowCount() == 1){
		// if user is found
		$User = $getUserInfo->fetch(PDO::FETCH_ASSOC);
	}else{
		// If user is not found redirect to logout
		header("Location: /logout.php"); exit;
	}
	// echo $_SESSION['user_id'] . 'is your user id';
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
		<h2>This is the dashboard</h2>

		<p>You are signed in as user: <?php echo $User['email']; ?> <?php echo $User['reg_time']; ?></p>
		<p>Your ID is: <?php echo $_SESSION['user_id']; ?></p>
		<p><a href='/logout.php'>Logout</a>

	</div>
	<div class="uk-container">
		<form class="uk-form-stacked js-dashboard">
			<fieldset class="uk-fieldset">

				<legend class="uk-legend">Comment</legend>

				<div class="uk-margin">
					<input class="uk-input" type="text" placeholder="Title">
				</div>

				<div class="uk-margin">
					<textarea class="uk-textarea" rows="5" placeholder="Write your comment here..."></textarea>
				</div>
					<div class="uk-margin">
						<button class="button-uk-button uk-button-default" type="submit">Submit</button>
					</div>
					<div class="uk-margin">
						<button class="button-uk-button uk-button-default" type="cancel">Cancel</button>
					</div>
			</fieldset>
		</form>
	</div>
	<?php 
		require_once "inc/footer.php";
	?>
	</body>
</html>	