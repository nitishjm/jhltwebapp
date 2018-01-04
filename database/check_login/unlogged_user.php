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
		<link rel="stylesheet" href="../../css/bootstrap.min.css">
	</head>
	
	<body>
		<nav class="navbar navbar-expand-md fixed-top navbar-dark bg-dark">
			<div class="navbar-brand">
				<picture style="display: flex; align-items: center">
					<img src="../../images/eagle.png" width="60" height="60">
					<figcaption class="h5">&nbsp;&nbsp;Johnston Heights Leadership</figcaption>
				</picture>
			</div>
		</nav>
		<div class="stage" id="unlogged_user" style="padding-top: 100px;">
			<div class="container text-light">
				<div class="jumbotron" style="background-color: rgba(0,0,0,0.75); border-radius: 10px;">
					<div class="row align-items-center">
						<div class="col">
							<h1 class="display-4 text-center">Sorry, you need to sign in to view this page</h1>
							<p class="lead text-center">Click <a href="../../index.php">here</a> to log in</p>
						</div>
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