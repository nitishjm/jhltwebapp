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
		
		<script>
			function confirm_delete(entry_id){
				var action =  confirm("Are you sure you want to delete this entry?");
				if (action == true){
					window.location.href = "database/delete_entry.php?entry_id="+entry_id;
				}	
			}
			
			function delete_all(){
				var action =  confirm("Are you sure you want to delete ALL entries?");
				if (action == true){
					window.location.href = "database/clear_log.php";
				}
			}
			
		</script>
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
				<div class="row">
					<div class="col" style="background-color: rgba(248,249,250,0.75); border-radius: 10px; padding-bottom: 20px;">
						<h1 class="display-3 text-center">Your log:</h1>
						<?php include('database/get_log.php'); ?>
						<button type="button" style="float: right;" class="btn btn-danger" onclick="delete_all();">Delete all entries</button></a>
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