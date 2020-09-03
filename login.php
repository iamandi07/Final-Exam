<?php	
//Managementul sesiunii
include "db_connect.php"; 

if (isset($_POST["login"]) ) {	
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
			$_SESSION['user'] = $userFinal;
			$_SESSION['password'] = $passwordFinal;		
			echo "<meta http-equiv='refresh' content='0;URL=index.php'>";
			//header("Location: test1.php");
		}	
	}
}

?>