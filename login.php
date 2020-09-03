<?php	
//Managementul sesiunii
<<<<<<< HEAD
include "db_connect.php"; 

if (isset($_POST["login"]) ) {	
=======
if(!isset($_SESSION["user"]))
session_start();

include "db_connect.php";

if (isset($_POST["login"]) ) {	

	//Mesaje pentru client la logare
	if(isset($_SESSION["user"]))
		die ("Already logged in!");

	if(isset($_SESSION["user"]))
    
>>>>>>> 2086d5e01c4a190a7f15f9bc486ba3b5e29d45cc
	//Avoiding SQL injections by using "'" and sanitising variables
	$userFinal = "'".htmlentities($_POST["user"],ENT_HTML5,'UTF-8',TRUE)."'";
	$passwordFinal =  "'".md5(htmlentities($_POST["password"],ENT_HTML5,'UTF-8',TRUE))."'";
	$sql = "SELECT user,password FROM person WHERE user=$userFinal";
	$result = $connection->query($sql);
	//Mesaje pentru client la logare
	if($result->num_rows == 0) {
	die ("User incorrect!");	
	}
	if($result->num_rows == 1) {
		while($row = $result->fetch_assoc()) {
			$usercheck = $row["user"];
			$passcheck = $row["password"];
			
			//Mesaje pentru client la logare
			if("'".$usercheck."'" === $userFinal && "'".$passcheck."'" != $passwordFinal) {
			die ("Password incorrect!");
			}
			//Managementul sesiunii
<<<<<<< HEAD
			$_SESSION['user'] = $userFinal;
			$_SESSION['password'] = $passwordFinal;		
			echo "<meta http-equiv='refresh' content='0;URL=index.php'>";
			//header("Location: test1.php");
=======
			$_SESSION["user"] = $userFinal;
			$_SESSION["password"] = $passwordFinal;
			echo "Connected successfully!"."<br><br>";
>>>>>>> 2086d5e01c4a190a7f15f9bc486ba3b5e29d45cc
		}	
	}
}

?>