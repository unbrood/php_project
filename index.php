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
			<form class="uk-form-stacked js-login">

    			<div class="uk-margin">
        			<label class="uk-form-label" for="form-stacked-text">Email</label>
        			<div class="uk-form-controls">
            			<input class="uk-input" id="form-stacked-text" type="Email" required="required" placeholder="email@email.com">
        			</div>
    			</div>
    
			    <div class="uk-margin">
			        <label class="uk-form-label" for="form-stacked-text">Password</label>
			        <div class="uk-form-controls">
			            <input class="uk-input" id="form-stacked-text" type="Password" required="required" placeholder="Your password">
			        </div>
			    </div>

			    <div class="uk-margin">
			        <button class="button-uk-button uk-button-default" type="submit">Login</button>
			    </div>

			    <div class="uk-margin">
			        <button class="button-uk-button uk-button-default" type="submit">Register</button>
			    </div>
			    
			</form>
		</div>
	</div>
		<!-- jQuery JS -->
		<script type="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
		<!-- UIkit JS -->
		<script src="https://cdn.jsdelivr.net/npm/uikit@3.5.8/dist/js/uikit.min.js"></script>
		<script src="https://cdn.jsdelivr.net/npm/uikit@3.5.8/dist/js/uikit-icons.min.js"></script>	
	</body>
</html>	