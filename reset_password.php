<?php
	include 'database/connect.php';

	$sent_time = mysqli_real_escape_string($db_found, $_GET['time']);
	$current_time = time();
	
	if($current_time - $sent_time > 900){
		header("Location: link_expired.php");
	}
	
	$encrypt = $_GET['encrypt'];
	
	$SQL = "SELECT email FROM tbl_users";
	$result = mysqli_query($db_found, $SQL);
	$num_users = mysqli_num_rows($result);
	$id = -1;
	
	for($row = 0; $row < $num_users; $row++){
		$SQL = "SELECT email, ID FROM tbl_users LIMIT 1 OFFSET ".$row;
		$result = mysqli_query($db_found, $SQL);
		$check = mysqli_fetch_assoc($result);
		if(md5($check['email']) == $encrypt){
			$id = $check['ID'];
		}
	}
	
	if($id == -1){
		header("Location: index.php");
	}
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
		<script src="js/reset_pass.js" type="text/javascript"></script>
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
							<h1 class="display-3 text-center">Reset password</h1>
						</div>
						<div class="col">
							<form id="reset_form" onsubmit="reset_pass(<?php print($id); ?>); _('reset_btn').disabled = false; return false;">
								<div class="form-group">
									<label for="new_pass">New password</label>
									<input type="password" class="form-control" id="new_pass" placeholder="Enter new password">
								</div>
								<div class="form-group">	
									<label for="confirm_pass">Confirm password</label>
									<input type="password" class="form-control" id="confirm_pass" placeholder="Confirm new password">
								</div>
								<div class="btn-group d-flex justify-content-center" role="group">
									<button type="submit" id="reset_btn" class="btn btn-primary">Reset</button>
									<button type="button" onclick="window.location.href='index.php'" class="btn btn-secondary">Cancel</button>
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