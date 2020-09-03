<?php
$type=$owner=$location=$model=$serialNumber=$calibrationDate=$lastCalibration=$inspectionPlan=$fail="";

if (isset($_POST['type']))
    $type = fix_string($_POST['type']);
if (isset($_POST['owner']))
    $owner = fix_string($_POST['owner']);
if (isset($_POST['location']))
    $location = fix_string($_POST['location']);
if (isset($_POST['model']))
    $model = fix_string($_POST['model']);
if (isset($_POST['serialNumber']))
    $serialNumber = fix_string($_POST['serialNumber']);
if (isset($_POST['calibrationDate']))
    $calibrationDate = fix_string($_POST['calibrationDate']);
if (isset($_POST['lastCalibration']))
    $lastCalibration = fix_string($_POST['lastCalibration']);
if (isset($_POST['inspectionPlan']))
    $inspectionPlan = fix_string($_POST['inspectionPlan']);


if (isset($_POST['user']))
{
    $fail = validate_type($type);
	$fail .= validate_owner($owner);
    $fail .= validate_location($location);
	$fail .= validate_model($model);
	$fail .= validate_serialNumber($serialNumber);
	$fail .= validate_calibrationDate($calibrationDate);
	$fail .= validate_lastCalibration($lastCalibration);
	$fail .= validate_inspectionPlan($inspectionPlan);
}




function fix_string($string) {
 if (get_magic_quotes_gpc())
 $string = stripslashes($string);
 return htmlentities ($string);
}



function validate_type($field) {
 if ($field == "")
 return "No type was entered<br />";
 return ""; }


function validate_owner($field) {
 if ($field == "")
 return "No owner was entered<br />";

$fieldTemp = "'" . $field . "'";
 
include "db_connect.php";
$sql = "SELECT * FROM person WHERE id = $fieldTemp";
$result = $connection->query($sql);	
if($result->num_rows < 1) 
return "User not exists";
 
return "";
}

function validate_location($field) {
 if ($field == "")
 return "No location was entered<br />";

$fieldTemp = "'" . $field . "'";
 
include "db_connect.php";
$sql = "SELECT * FROM person WHERE id = $fieldTemp";
$result = $connection->query($sql);	
if($result->num_rows < 1) 
return "User not exists";
 
return "";
}

function validate_model($field) {
 if ($field == "")
 return "No model was entered<br />";
 return "";
}

function validate_serialNumber($field) {
 if ($field == "")
 return "No serialNumber was entered<br />";
 return "";
}

function validate_calibrationDate($field) {
 if ($field == "")
 return "No calibrationdate was entered<br />";
 return "";
}

function validate_lastCalibration($field) {
 if ($field == "")
 return "No calibrationDate was entered<br />";
 else if($field > date("Y/m/d")) 
 return "The last calibration date can't be in the future";
 return "";
}

function validate_inspectionPlan($field) {
 if ($field == "")
 return "No inspectionPlan was entered<br />";
 return "";
}
?>