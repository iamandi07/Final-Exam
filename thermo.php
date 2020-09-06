<?php

$value1=$value2=$value3=$value4=$fail="";

if (isset($_POST['value1']))
    $value1 = $_POST['value1'];
if (isset($_POST['value2']))
    $value2 = $_POST['value2'];
if (isset($_POST['value3']))
    $value3 = $_POST['value3'];
if (isset($_POST['value4']))
    $value4 = $_POST['value4'];

$fail .= validate_value1($value1);
$fail .= validate_value2($value2);
$fail .= validate_value3($value3);
$fail .= validate_value4($value4);
?>

<?php
function validate_value1($value1) {

if ($value1 == "")
return "Please give the measured value";

return "";
}

function validate_value2($value2) {

if ($value2 == "")
return "Please give the measured value";

return "";
}

function validate_value3($value3) {

if ($value3 == "")
return "Please give the measured value";

return "";
}
function validate_value4($value4) {

if ($value4 == "")
return "Please give the measured value";

return "";
}
?> 