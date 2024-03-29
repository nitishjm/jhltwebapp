<?php
	session_start();
	include 'database/connect.php';
	include 'database/check_login/check_login.php';
	
	$edit = mysqli_real_escape_string($db_found, $_GET["edit"]);
	
	if($edit){
		$entry_id = mysqli_real_escape_string($db_found, $_GET["entry_id"]);
	
		$SQL = "SELECT * FROM tbl_log WHERE entry_id='". $entry_id ."'";
		$result = mysqli_query($db_found, $SQL);
		$row = mysqli_fetch_assoc($result);
		
		$event = $row["event"];
		$description = $row["description"];
		$hours = $row["hours"];
		$minutes = $row["minutes"];
		$coordinated = $row["coordinator"];
		$date = $row["date"];
		
	}else{
		header("Location: my_log.php");
	}
?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<!-- Required meta tags -->
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<title>JHLT</title>
		
		<!-- ROBOTO FONT -->
		<link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
		
		<!-- BOOTSTRAP CSS -->
		<link rel="stylesheet" href="css/bootstrap.min.css">
		<link rel="stylesheet" href="css/style.css">
		
		<!-- FORM CHECKING WITH JAVASCRIPT -->
		<?php $searched_id = $_SESSION['searched_id']; ?>
		<script type="text/javascript">
			 var searched_id = ;
		</script>
		<script src="js/update_entry.js" type="text/javascript"></script>
		
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
		<div class="stage" style="padding-top: 105px;">
			<div class="container text-dark font-weight-bold">
				<div class="jumbotron" style="background-color: rgba(248,249,250,0.75); border-radius: 10px;">
					<div class="row align-items-center">
						<div class="col">
							<h1 class="display-3 text-center">Edit entry:</h1>
						</div>
					</div>
					<div class="row">
						<div class="col-md-6">
							<form id="edit_form" onsubmit="check_info(<?php print($entry_id); ?>); _('update_btn').disabled = false; return false;">
								<div class="form-group">
									<label for="event_name">Event name</label>
									<input type="text" class="form-control" id="event_name" placeholder="Event name" value="<?php print($event) ?>">
								</div>
							
								<div class="form-group">
									<label for="event_desc">Event description</label>
									<textarea class="form-control" id="event_desc"><?php print($description) ?></textarea>
								</div>
								
								<div class="form-group">
									<label for="coordinator">Did you coordinate?&nbsp;</label>
									<small style="text-align: left;" id="warning" >Your hours will be automatically doubled</small><br>
									<div class="form-check form-check-inline">
									  <label class="form-check-label">
										<input class="form-check-input" type="radio" name="coordinator" id="yes" <?php if($coordinated){ print("checked"); }?>> Yes
									  </label>
									</div>
									
									<div class="form-check form-check-inline">
									  <label class="form-check-label">
										<input class="form-check-input" type="radio" name="coordinator" id="no" <?php if(!($coordinated)){ print("checked"); }?>> No
									  </label>
									</div>
								</div>
							</div>
							<div class="col-md-6">
							
								<div class="form-group">
									<label for="hours">Hours</label>
									<input type="number" class="form-control" id="hours" value="<?php print($hours) ?>">
								</div>
								
								<div class="form-group">
									<label for="minutes">Minutes</label>
									<input type="number" class="form-control" id="minutes" value="<?php print($minutes) ?>">
								</div>
							
								<div class="form-group">
									<label for="date">Date</label>
									<input type="date" class="form-control" id="date" pattern="[0-9]{4}-(0[1-9]|1[012])-(0[1-9]|1[0-9]|2[0-9]|3[01])" required title="YYYY-MM-DD" value="<?php print($date) ?>">
								</div>
								
								
								<button style="float: right;" type="submit" id="update_btn" class="btn btn-primary">Update entry</button>
								<button style="float: right; margin-right: 6px;" type="button" id="cancel_btn" onclick="window.location.href='my_log.php'" class="btn btn-secondary">Cancel</button>
								
								
							</form>
						</div>
					</div>
					<div class="col-md-6 offset-md-3" style="text-align: center;">
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