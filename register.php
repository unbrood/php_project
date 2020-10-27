<?php 
	//Allows the index.php to use the config file defined in the *inc* folder
	define('__CONFIG__', true);
	//Sets the config.php as required; Will try to include once and then stay loaded
	require_once "inc/config.php"; 

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
		<div class="uk-grid uk-child-width-1-3@s uk-child-width-1-1" uk-grid>
			<form class="uk-form-stacked js-register">

				<h2>Register</h2>
    			
    			<div class="uk-margin">
        			<label class="uk-form-label" for="form-stacked-text">email</label>
        			<div class="uk-form-controls">
            			<input class="uk-input" id="form-stacked-text" type="email" required="required" placeholder="email@email.com">
        			</div>
    			</div>
    
			    <div class="uk-margin">
			        <label class="uk-form-label" for="form-stacked-text">password</label>
			        <div class="uk-form-controls">
			            <input class="uk-input" id="form-stacked-text" type="password" required="required" placeholder="Your password">
			        </div>
			    </div>

				<div class="uk-margin uk-alert uk-alert-danger js-error" style='display: none;'></div>
			    
			    <div class="uk-margin">
			        <button class="button-uk-button uk-button-default" type="submit">Register</button>
			    </div>
			    
			</form>
		</div>
	</div>
	 <?php 
		 require_once "inc/footer.php"; 
	?>
	</body>
</html>	