<?php
$plant=$costCenterManagerId=$equipmentResponsibleId=$foremanId=$fail="";

if (isset($_POST['plant']))
    $plant = fix_string($_POST['plant']);
if (isset($_POST['costCenterManagerId']))
    $costCenterManagerId = fix_string($_POST['costCenterManagerId']);
if (isset($_POST['equipmentResponsibleId']))
    $equipmentResponsibleId = fix_string($_POST['equipmentResponsibleId']);
if (isset($_POST['foremanId']))
    $foremanId = $_POST['foremanId'];


if (isset($_POST['user']))
{
    $fail = validate_plant($plant);
	$fail .= validate_costCenterManagerId($costCenterManagerId);
    $fail .= validate_equipmentResponsibleId($equipmentResponsibleId);
	$fail .= validate_foremanId($foremanId);
}




function fix_string($string) {
 if (get_magic_quotes_gpc())
 $string = stripslashes($string);
 return htmlentities ($string);
}



function validate_plant($field) {
 if ($field == "")
 return "No plant was entered<br />";
else if(strlen($field) < 4);
 return "Plant must be at least 4 characters<br/>";
 return ""; }


function validate_costCenterManagerId($field) {
 if ($field == "")
 return "No costCenterManagerId was entered<br />";

$fieldTemp = "'" . $field . "'";
 
include "db_connect.php";
$sql = "SELECT * FROM person WHERE id = $fieldTemp";
$result = $connection->query($sql);	
if($result->num_rows < 1) 
return "User not exists";
 
return "";
}

function validate_equipmentResponsibleId($field) {
 if ($field == "")
 return "No costCenterManagerId was entered<br />";

$fieldTemp = "'" . $field . "'";
 
include "db_connect.php";
$sql = "SELECT * FROM person WHERE id = $fieldTemp";
$result = $connection->query($sql);	
if($result->num_rows < 1) 
return "User not exists";
 
return "";
}

function validate_foremanId($field) {
 if ($field == "")
 return "No costCenterManagerId was entered<br />";

$fieldTemp = "'" . $field . "'";
 
include "db_connect.php";
$sql = "SELECT * FROM person WHERE id = $fieldTemp";
$result = $connection->query($sql);	
if($result->num_rows < 1) 
return "User not exists";
 
return "";
}
?>