<?php 

$servername       = "localhost";
$username   = "root";
$password   = "";
$dbname     = "calibration";

//DB connection
// require_once('config.php');
$connection = mysqli_connect($servername,$username,$password,$dbname);

//Verificarea conexiunii
if(!$connection)
    die ("Connection failed!");

?>