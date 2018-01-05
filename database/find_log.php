<?php
				
	if($db_found){
		
		$SQL = "SELECT hours, minutes, coordinator FROM tbl_log WHERE student_id='".$_SESSION['searched_id']."'";
		
		$total_hours = 0;
		
		foreach(mysqli_query($db_found, $SQL) as $row){
			$MINSINHOUR = 60.0;
			$hours = $row['hours'] + (($row['minutes'])/$MINSINHOUR);
			if($row['coordinator']){
				$total_hours += $hours*2;
			}else{
				$total_hours += $hours;
			}
			
		}
		
		echo "<h4 class='text-center'>Total time logged: " . round($total_hours, 2) . " hours</h4>";
		
		echo "<div class='table-responsive'>";
		
		echo "<tbody>";
		echo "<table class='table table-bordered'  style='border: 1px solid black; text-align: center;'>";
			echo "<thead>";
				echo "<tr>";
					echo "<th>Event</th>";
					echo "<th>Description of job</th>";
					echo "<th>Time</th>";
					echo "<th>Coordinator</th>";
					echo "<th style='width: 110px;'>Date</th>";
					echo "<th>Edit</th>";
					echo "<th>Delete</th>";
				echo "<tr>";
			echo "</thead>";
				
		$SQL = "SELECT * FROM tbl_log WHERE student_id='". $_SESSION['searched_id'] ."' ORDER BY date DESC";
		
		foreach(mysqli_query($db_found, $SQL) as $row){
			
			$MINSINHOUR = 60.0;
			$entry_id = $row['entry_id'];
			$hours = $row['hours'] + (($row['minutes'])/$MINSINHOUR);
			
			if($row['coordinator'] == 1){
				echo "<tr style='background-color: rgba(7, 214, 0, 0.4);'>";
				$hours *= 2;
			}else{
				echo "<tr>";
			}
				echo "<td>" . $row['event'] . "</td>";
				echo "<td style='text-align: left;'>" . $row['description'] . "</td>";
				echo "<td style='width: 110px;'>" . round($hours, 2) . " hrs</td>";
				if($row['coordinator'] == 1){
					echo "<td style='text-align: center;'>Yes</td>";
				}else{
					echo "<td style='text-align: center;'>No</td>";
				}
				echo "<td>" . $row['date'] . "</td>";
				echo "<td style='width: 75px;'>";
					echo "<a href='edit_entry.php?entry_id=".$entry_id."&edit=true'><button type='button' style='width: 41px; height: 41px;'>";
						echo "<img src='images/edit.png' width='25' height='25'/>";
					echo "</button></a>";
				echo "</td>";
				echo "<td style='width: 75px;'>";
					echo "<button type='button' onclick='confirm_delete(".$entry_id.");' style='width: 41px; height: 41px;'>";
						echo "<img src='images/delete.png' width='25' height='25'/>";
					echo "</button>";
				echo "</td>";
			echo "</tr>";
		}
		echo "</tbody>";
	echo "</table>";
	}
?>