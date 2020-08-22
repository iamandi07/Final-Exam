<?php include "header2.php"; ?>
<?php include "db_connect.php"; ?>
<?php include "logout.php"; ?>
<?php include "password.php"; ?>

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
				echo "</table>";
			}
					else echo "0 results";
	
}
?>