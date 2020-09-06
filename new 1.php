<?php

$password=$password2=$password3=$fail="";

if (isset($_POST['password']))
    $password = $_POST['password'];
if (isset($_POST['password2']))
    $password2 = $_POST['password2'];
if (isset($_POST['password3']))
    $password3 = $_POST['password3'];

$fail .= validate_password($password,$password2,$password3);
?>

<?php
function validate_password($password,$password2,$password3) {

if(strcmp("'".md5(htmlentities($password,ENT_HTML5,'UTF-8',TRUE))."'" , $_SESSION["password"]) != 0 )
return "Parola veche este incorecta<br />";

if ($password2 == "" || $password3 == "" )
return "Ambele parole noi trebuie completate<br />";

if (strcmp($password3,$password2) != 0 )
return "Parolele noi nu sunt la fel<br />";

if (strcmp($password,$password2) == 0 )
return "Parolele noi sunt la fel ca parola veche<br />";

return "";
}
?> 