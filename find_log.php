<?php
	session_start();
	include 'database/check_login/check_admin.php';
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
		<script src="js/find_log.js" type="text/javascript"></script>
		
	</head>
	
	<body>
		<nav class="navbar navbar-expand-md fixed-top navbar-dark bg-dark">
			<button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"></span>
			</button>
			<div class="navbar-brand">
				<picture style="display: flex; align-items: center">
					<img src="images/eagle.png" width="60" height="60">
					<figcaption class="h5">&nbsp;&nbsp;Welcome <?php print($_SESSION['fname']); ?>!</figcaption>
				</picture>
			</div>
			<div class="collapse navbar-collapse" id="navbarNav">
				<div class="navbar-nav ml-auto">
					<?php include("database/links.php") ?>
				</div>
			</div>	
		</nav>
		<div class="stage" style="padding-top: 100px; margin-bottom: 20px;">
			<div class="container text-dark">
				<div class="jumbotron" style="background-color: rgba(248,249,250,0.75); border-radius: 10px;">
					<div class="row align-items-center">
						<div class="col">
							<h1 class="display-3 text-center">Find a log</h1>
						</div>
						<div class="col">
							<form id="find_form" onsubmit="find_log(); _('find_btn').disabled = false; return false;">
								<div class="form-group">
									<label for="student_id">Student number</label><br>
									<input type="text" style="width: 430px; float: left;" class="form-control" id="student_id" placeholder="Enter student number">
									<button type="submit" style="float: right;" id="find_btn" class="btn btn-primary">Search</button>
								</div>
							</form>
						</div>
					</div>
					<div class="col-md-6 offset-md-6" style="text-align: center;">
						<span id="error_msg" class="text-danger"></span>
					</div>
					<div class="row">
						<div class="col">
						
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