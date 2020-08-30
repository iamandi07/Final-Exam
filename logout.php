<?php
if (isset($_POST["logout"]) ) {
		if(!isset($_SESSION["user"])) {
			echo "Try and login first!";
		}
		else {
		session_destroy();
		}
		echo "Logout reusit!";
    	exit;
		
		}
}
?>