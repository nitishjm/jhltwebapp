<?php
	session_start();
	include 'database/check_login/check_login.php';
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
		
		<!-- EDIT ACCOUNT INFO -->
		<script type="text/javascript" src="js/edit_account.js"></script>
	</head>
	
	<body>
		<nav class="navbar navbar-expand-md fixed-top navbar-dark bg-dark">
			<button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"></span>
			</button>
			<div class="navbar-brand">
				<picture style="display: flex; align-items: center">
					<img src="images/eagle.png" width="60" height="60">
					<figcaption class="h5" id="welcome_name">&nbsp;&nbsp;Welcome <?php print($_SESSION['fname']); ?>!</figcaption>
				</picture>
			</div>
			<div class="collapse navbar-collapse" id="navbarNav">
				<div class="navbar-nav ml-auto">
					<?php include("database/links.php") ?>
				</div>
			</div>	
		</nav>
		<div class="stage" style="padding-top: 100px;">
			<div class="container text-dark">
				<div class="jumbotron" style="background-color: rgba(248,249,250,0.75); border-radius: 10px; padding-bottom: 30px;">
					<div class="row">
						<div class="col">
							<h1 class="display-3 text-center">Your Account</h1>
						</div>
					</div>
					<div class="row justify-content-center">
						<div class="col-md-6">
							<table class="table">
								<tbody>
									<tr>
										<th style="text-align: center;" scope="row">&nbsp;Name:</th>
										<td style="text-align: center;" id="account_name"><?php print($_SESSION['fname'] . " " . $_SESSION['lname']); ?></td>	
										<td><button type="button" data-toggle="modal" data-target="#name"><img src='https://upload.wikimedia.org/wikipedia/commons/thumb/6/64/Edit_icon_%28the_Noun_Project_30184%29.svg/2000px-Edit_icon_%28the_Noun_Project_30184%29.svg.png' width='15' height='15'/></button></td>
									</tr>
									<tr>
										<th style="text-align: center;" scope="row">&nbsp;Email:</th>
										<td style="text-align: center;" id="account_email"><?php print($_SESSION['email']); ?></td>	
										<td><button type="button" data-toggle="modal" data-target="#email_modal"><img src='https://upload.wikimedia.org/wikipedia/commons/thumb/6/64/Edit_icon_%28the_Noun_Project_30184%29.svg/2000px-Edit_icon_%28the_Noun_Project_30184%29.svg.png' width='15' height='15'/></button></td>
									</tr>
									<tr>
										<th style="text-align: center;" scope="row">&nbsp;Student #:</th>
										<td style="text-align: center;" id="account_number"><?php print($_SESSION['student_id']); ?></td>
										<td><button type="button" data-toggle="modal" data-target="#studentnumber_modal"><img src='https://upload.wikimedia.org/wikipedia/commons/thumb/6/64/Edit_icon_%28the_Noun_Project_30184%29.svg/2000px-Edit_icon_%28the_Noun_Project_30184%29.svg.png' width='15' height='15'/></button></td>
									</tr>
									<tr>
										<th style="text-align: center;" scope="row">&nbsp;Password:</th>
										<td style="text-align: center;" >*********</td>
										<td><button type="button" data-toggle="modal" data-target="#password_modal"><img src='https://upload.wikimedia.org/wikipedia/commons/thumb/6/64/Edit_icon_%28the_Noun_Project_30184%29.svg/2000px-Edit_icon_%28the_Noun_Project_30184%29.svg.png' width='15' height='15'/></button></td>
									</tr>
								</tbody>
							</table>
							
							<button type="button" style="margin-left: 200px;" class="btn btn-danger" data-toggle="modal" data-target="#deleteaccount_modal">Delete Account</button></a>
								
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="modal fade" id="name" tabindex="-1" role="dialog" aria-labelledby="name_label" aria-hidden="true">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="name_label">Change your name</h5>
						<button type="button" onclick="location.reload();" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">
						<form id="name_form" onsubmit="update_names(); _('update_name').disabled = false; return false;">
							<div class="form-group">
								<label for="fname">First name</label>
								<input type="text" class="form-control" id="fname" value="<?php print($_SESSION['fname']);?>">
							</div>
							<div class="form-group">	
								<label for="lname">Last name</label>
								<input type="text" class="form-control" id="lname" value="<?php print($_SESSION['lname']);?>">
							</div>
							<div class="modal-footer">
								<button type="button" class="btn btn-secondary" onclick="location.reload();" data-dismiss="modal">Cancel</button>
								<button type="submit" id="update_name" class="btn btn-primary">Save changes</button>
							</div>
							<span style="float: right;" id="error_msg" class="text-danger"></span>
						</form>
					</div>
				</div>
			</div>
		</div>
		<div class="modal fade" id="email_modal" tabindex="-1" role="dialog" aria-labelledby="name_label" aria-hidden="true">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="name_label">Change your email</h5>
						<button type="button" onclick="location.reload();" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">
						<form id="email_form" onsubmit="update_emails(); _('update_email').disabled = false; return false;">
							<div class="form-group">
								<label for="email">Email</label>
								<input type="text" class="form-control" id="email" value="<?php print($_SESSION['email']);?>">
							</div>
							<div class="modal-footer">
								<button type="button" class="btn btn-secondary" onclick="location.reload();" data-dismiss="modal">Cancel</button>
								<button type="submit" id="update_email" class="btn btn-primary">Save changes</button>
							</div>
							<span style="float: right;" id="error_msg2" class="text-danger"></span>
						</form>
					</div>
				</div>
			</div>
		</div>
		<div class="modal fade" id="studentnumber_modal" tabindex="-1" role="dialog" aria-labelledby="name_label" aria-hidden="true">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="name_label">Change your student number</h5>
						<button type="button" onclick="location.reload();" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">
						<form id="studentnumber_form" onsubmit="update_studentID(); _('update_studentnumber').disabled = false; return false;">
							<div class="form-group">
								<label for="student_number">Student number</label>
								<input type="text" class="form-control" id="student_number" value="<?php print($_SESSION['student_id']);?>">
							</div>
							<div class="modal-footer">
								<button type="button" class="btn btn-secondary" onclick="location.reload();" data-dismiss="modal">Cancel</button>
								<button type="submit" id="update_studentnumber" class="btn btn-primary">Save changes</button>
							</div>
							<span style="float: right;" id="error_msg3" class="text-danger"></span>
						</form>
					</div>
				</div>
			</div>
		</div>
		<div class="modal fade" id="password_modal" tabindex="-1" role="dialog" aria-labelledby="name_label" aria-hidden="true">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="name_label">Change your password</h5>
						<button type="button" onclick="location.reload();" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">
						<form id="password_form" onsubmit="update_password(); _('update_pword').disabled = false; return false;">
							<div class="form-group">
								<label for="old_pass">Current password</label>
								<input type="password" class="form-control" id="old_pass" autocomplete="off">
							</div>
							<div class="form-group">	
								<label for="new_pass">New password</label>
								<input type="password" class="form-control" id="new_pass" autocomplete="off">
							</div>
							<div class="form-group">	
								<label for="confirm_new_pass">Confirm new password</label>
								<input type="password" class="form-control" id="confirm_new_pass" autocomplete="off">
							</div>
							<div class="modal-footer">
								<button type="button" class="btn btn-secondary" onclick="location.reload();" data-dismiss="modal">Cancel</button>
								<button type="submit" id="update_pword" class="btn btn-primary">Save changes</button>
							</div>
							<span style="float: right;" id="error_msg4" class="text-danger"></span>
						</form>
					</div>
				</div>
			</div>
		</div>
		<div class="modal fade" id="deleteaccount_modal" tabindex="-1" role="dialog" aria-labelledby="name_label" aria-hidden="true">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="name_label">Are you sure?</h5>
						<button type="button" onclick="location.reload();" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">
						<form id="deleteaccount_form" onsubmit="delete_account_total(); _('delete_acc').disabled = false; return false;">
							<div class="form-group">
								<label for="password">Enter your password</label>
								<input type="password" class="form-control" id="password" autocomplete="off">
							</div>
							<div class="modal-footer">
								<button type="button" class="btn btn-secondary" onclick="location.reload();" data-dismiss="modal">Cancel</button>
								<button type="submit" id="delete_acc" class="btn btn-danger">Delete account</button>
							</div>
							<span style="float: right;" id="error_msg5" class="text-danger"></span>
						</form>
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