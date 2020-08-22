<?php

$salutation=$firstName=$lastName=$plant=$phoneNumber=$email=$password=$password2=$user=$fail="";

if (isset($_POST['salutation']))
    $salutation = fix_string($_POST['salutation']);
if (isset($_POST['firstName']))
    $firstName = fix_string($_POST['firstName']);
if (isset($_POST['lastName']))
    $lastName = fix_string($_POST['lastName']);
if (isset($_POST['plant']))
    $plant = fix_string($_POST['plant']);
if (isset($_POST['phoneNumber']))
    $phoneNumber = fix_string($_POST['phoneNumber']);
if (isset($_POST['email']))
    $email = fix_string($_POST['email']);
if (isset($_POST['password']))
    $password = $_POST['password'];
if (isset($_POST['password2']))
    $password2 = $_POST['password2'];
if (isset($_POST['user']))
    $user = fix_string($_POST['user']);

    $fail = validate_salutation($salutation);
    $fail .= validate_firstName($firstName);
	$fail .= validate_lastName($lastName);
	$fail .= validate_plant($plant);
	$fail .= validate_phoneNumber($phoneNumber);
    $fail .= validate_email($email);
	$fail .= validate_password($password,$password2);
    $fail .= validate_user($user);
    ?>

<?php
function fix_string($string) {
 if (get_magic_quotes_gpc())
 $string = stripslashes($string);
 return htmlentities ($string);
}
?> 

<?php
    function validate_salutation($field) {
     if ($field == "")
     return "No salutation was entered<br />";
     return "";
    }
?>

<?php
function validate_firstName($field) {
 if ($field == "")
 return "No firstName was entered<br />";
 return ""; }
?>

<?php
function validate_lastName($field) {
 if ($field == "")
 return "No lastName was entered<br />";
 return ""; }
?>

<?php
function validate_plant($field) {
 if ($field == "")
 return "No plant was entered<br />";
 return ""; }
?>

<?php
function validate_user($field) {
 if ($field == "")
 return "No User was entered<br />";
 else if (strlen($field) < 5)
 return "User must be at least 5 characters<br/>";
 else if (preg_match("/[^a-zA-Z0-9_-]/", $field))
 return "Only letters, numbers, - and _ in user";

$fieldTemp = "'" . $field . "'";

include "db_connect.php";
$sql = "SELECT * FROM person WHERE user = $fieldTemp";
$result = $connection->query($sql);	
if($result->num_rows > 0) 
return "User already exists";
 
return "";
}
?> 

<?php
function validate_password($field1,$field2) {
 if ($field1 == "" || $field2 == "" )
 return "No Password was entered<br />";
 else if (strlen($field1) < 1 || strlen($field2) < 1 )
 return "Passwords must be at least 1 character<br/>";
 else if (strcmp($field1, $field2) != 0) {
 return "Passwords have to match";
}
 return "";
}
?> 

<?php
function validate_email($field) {
 if ($field == "")
 return "No Email was entered<br />";
 else if (!((strpos($field, ".") > 0) &&
(strpos($field, "@") > 0)) ||
preg_match("/[^a-zA-Z0-9.@_-]/", $field))
 return "The Email address is invalid<br />";

 $fieldTemp = "'" . $field . "'";

include "db_connect.php";
$sql = "SELECT * FROM person WHERE email = $fieldTemp";
$result = $connection->query($sql);	
if($result->num_rows > 0) 
return "Email already exists";

 return "";
}
?>

<?php
    function validate_phoneNumber($field) {
     if ($field == "")
     return "No phone number was entered<br />";
     else if (preg_match("/[^0-9+]/", $field))
     return "The phone number is invalid<br />";
     return "";
    }
?>