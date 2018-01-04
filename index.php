<?php
	session_start();
	session_destroy();
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<!-- Required meta tags -->
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<title>JHLT</title>
		
		<!-- BUNGEE FONT -->
		<link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
		
		<!-- Bootstrap CSS -->
		<link rel="stylesheet" href="css/bootstrap.min.css">
		<link rel="stylesheet" href="css/style.css">
		
		<!-- FORM CHECKING WITH JAVASCRIPT -->
		<script src="js/check_login.js" type="text/javascript"></script>
	</head>
	
	<body>
		<nav class="navbar navbar-expand-md fixed-top navbar-dark bg-dark">
			<div class="navbar-brand">
				<picture style="display: flex; align-items: center">
					<img src="images/eagle.png" width="60" height="60">
					<figcaption class="h5">&nbsp;&nbsp;Johnston Heights Leadership</figcaption>
				</picture>
			</div>
		</nav>
		<div class="stage" style="padding-top: 100px;">
			<div class="container text-light">
				<div class="jumbotron" style="background-color: rgba(12,12,12,0.75); border-radius: 10px;">
					<div class="row align-items-center">
						<div class="col">
							<h1 class="display-3 text-center">Hello!</h1>
							<p class="lead text-center">Please sign in</p>
						</div>
						<div class="col">
							<form id="login_form" onsubmit="check_info(); _('login_btn').disabled = false; return false;">
								<div class="form-group">
									<label for="email">Email address</label>
									<input type="text" class="form-control" id="email" placeholder="Enter email">
								</div>
								<div class="form-group">	
									<label for="pword">Password</label>
									<input type="password" class="form-control" id="pword" placeholder="Password">
								</div>
								<div class="btn-group d-flex justify-content-center" role="group">
									<button type="submit" id="login_btn" class="btn btn-primary">Login</button>
									<button type="button" onclick="window.location.href='register.php'" class="btn btn-primary">Register</button>
									<button type="button" onclick="window.location.href='forgotPass.php'" class="btn btn-primary">Reset my password!</button>
								</div>
								<small style="text-align: center;" id="warning" class="form-text text-muted"><br>Never share your email or password with anyone else. We won't either :)</small>
								<br>
							</form>
						</div>
					</div>
					<div class="col-md-6 offset-md-6" style="text-align: center;">
						<span id="error_msg" class="text-danger"></span>
					</div>
				</div>
			</div>
		</div>
	
		<!-- Optional JavaScript -->
		<!-- jQuery first, then Popper.js, then Bootstrap JS -->
		<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/js/bootstrap.min.js" integrity="sha384-a5N7Y/aK3qNeh15eJKGWxsqtnX/wWdSZSKp+81YjTmS15nvnvxKHuzaWwXHDli+4" crossorigin="anonymous"></script>
	</body>
</html>