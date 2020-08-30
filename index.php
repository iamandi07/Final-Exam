<?php include "header.php"; ?>
<?php include "login.php"; ?>
<?php include "db_connect.php"; ?>

<head>

<link rel="stylesheet" type="text/css" href="css/background.css">

</head

<body>
<?php

	
	if(isset($_SESSION["user"])) {
	

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
					header("Location: header2.php");
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



<?php include "footer.php"; ?>