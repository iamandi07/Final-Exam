<?php

$equipment=$fail="";

if (isset($_POST['equipment']))
    $equipment = $_POST['equipment'];

$fail .= validate_equipment($equipment);
?>

<?php
function validate_equipment($equipment) {

if ($equipment == "")
return "You didn't choose an equipment";

return "";
}
?> 