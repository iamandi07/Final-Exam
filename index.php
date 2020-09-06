<?php session_start(); ?>
<link rel="stylesheet" type="text/css" href="css/background.css">
<?php 
if(isset($_SESSION['user'])) 
	include "header2.php"; 
	else include "header.php"; 
?>
<?php include "login.php"; ?>
<?php include "logout.php"; ?>
<?php include "db_connect.php"; ?>




<?php
	if(isset($_SESSION['user'])) {
		$sql = "SELECT * FROM person";
		$result = $connection->query($sql);
					if($result->num_rows > 0) {
					echo "Registrated persons list:
					<br><br>
					<table class=\"table\">
					<tr>
					<th>Salutation</th>
					<th>FirstName</th>
    				<th>Lastname</th>
					<th>Plant</th>
					<th>PhoneNumber</th>
					<th>email</th>
					</tr>
					<tr>";	
					while($row = $result->fetch_assoc()) {
						echo "<tr>";
						echo "<td>" . $row["salutation"] . "</td>";
						echo "<td>" . $row["firstName"] . "</td>";
						echo "<td>" . $row["lastName"] . "</td>";
						echo "<td>" . $row["plant"] . "</td>";
						echo "<td>" . $row["phoneNumber"] . "</td>";
						echo "<td>" . $row["email"] . "</td>";
						}
					
				echo "</table>";
			}
					else echo "0 results";
				echo "<br><br><br>";
				
			$sql2 = "SELECT * FROM costcenter1";
			$result = $connection->query($sql2);
					if($result->num_rows > 0) {
					echo "Registrated costcenters list:
					<br><br>
					<table class=\"table\">
					<tr>
					<th>Plant</th>
					<th>CostCenterManagerId</th>
    				<th>EquipmentResponsibleId</th>
					<th>ForemanId</th>
					</tr>
					<tr>";	
					while($row = $result->fetch_assoc()) {
						echo "<tr>";
						echo "<td>" . $row["plant"] . "</td>";
						echo "<td>" . $row["costCenterManagerId"] . "</td>";
						echo "<td>" . $row["equipmentResponsibleId"] . "</td>";
						echo "<td>" . $row["foremanId"] . "</td>";
						}
					
				echo "</table>";
			}
					else echo "0 results";
			
			$sql3 = "SELECT * FROM equipment";
			$result = $connection->query($sql3);
					if($result->num_rows > 0) {
					echo "Registrated equipments list:
					<br><br>
					<table class=\"table\">
					<tr>
					<th>Type</th>
					<th>Owner</th>
    				<th>Location</th>
					<th>Model</th>
					<th>SerialNumber</th>
					<th>CalibrationDate</th>
    				<th>LastCalibration</th>
					<th>InspectionPlan</th>
					</tr>
					<tr>";	
					while($row = $result->fetch_assoc()) {
						echo "<tr>";
						echo "<td>" . $row["type"] . "</td>";
						echo "<td>" . $row["owner"] . "</td>";
						echo "<td>" . $row["location"] . "</td>";
						echo "<td>" . $row["model"] . "</td>";
						echo "<td>" . $row["serialNumber"] . "</td>";
						echo "<td>" . $row["calibrationDate"] . "</td>";
						echo "<td>" . $row["lastCalibration"] . "</td>";
						echo "<td>" . $row["inspectionPlan"] . "</td>";
						}
					
				echo "</table>";
			}
					else echo "0 results";
	}
	
	else {
    echo '<div class="bg">
	
		<h3 class="bg1"> Hello, Welcome to the equipment database. If you want to review the equipment list, please register or login</h3>
	
	</div>';
	
	}
?>

</body>
