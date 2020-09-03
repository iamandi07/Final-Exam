<?php session_start(); ?>
<?php include "header2.php"; ?>
<?php include "logout.php"; ?>
<?php include "db_connect.php"; ?>
<?php include "verification3.php"; ?>


<?php
if(!isset($_SESSION["user"]))
    //Daca nu suntem logati redirectioneaza catre index.php
    header("Location: index.php");

?>

<form method="POST" enctype="multipart/form-data">

    <p>
    <div class="form-row col-sm-6">
	<div class="col">
    <input type="text" class="form-control" id="type" name="type"  placeholder="<?php echo 'Type: ' . $type;?>" value="<?php echo $type;?>"  required>
    </div>
	<div class="col">
    <input type="text" class="form-control" id="owner" name="owner"  placeholder="<?php echo 'Owner: ' . $owner;?>" value="<?php echo $owner;?>"  required> 
    </div>
	<div class="col">
    <input type="text" class="form-control" id="location" name="location"  placeholder="<?php echo 'Location: ' . $location;?>" value="<?php echo $location;?>"  required> 
    </div>
	<div class="col">
    <input type="text" class="form-control" id="model" name="model"  placeholder="<?php echo 'Model: ' . $model;?>" value="<?php echo $model;?>"  required> 
    </div>
	<div class="col">
    <input type="text" class="form-control" id="serialNumber" name="serialNumber"  placeholder="<?php echo 'SerialNumber: ' . $serialNumber;?>" value="<?php echo $serialNumber;?>" required>
    </div>
	<div class="col">
    <select id="calibrationDate" name="calibrationDate"  placeholder="<?php echo 'CalibrationDate: ' . $calibrationDate;?>" value="<?php echo $calibrationDate;?>"  required>
		<option value=""></option>
		<option value="Yes">Yes</option>
		<option value="No">No</option>
	</select>
    </div>
	<div class="col">
    <input type="text" class="form-control" id="lastCalibration" name="lastCalibration"  placeholder="<?php echo 'LastCalibration: ' . $lastCalibration;?>" value="<?php echo $lastCalibration;?>" required>
    </div>
    <div class="col">
    <input type="text" class="form-control" id="inspectionPlan" name="inspectionPlan"  placeholder="<?php echo 'InspectionPlan: ' . $inspectionPlan;?>" value="<?php echo $inspectionPlan;?>"  required>
    </div>
	</div>
	</p>
	<div class="form-row col-sm-6">
    <div class="col">
    <button type="submit" name="submit" id="submit" class="btn btn-primary">Add</button>
    </div>
    </div>

</form>

<?php

if (isset($_POST['submit'])) {  


    if ($fail == "") {
        echo "Form data successfully validated";
    }
    else {
        echo $fail;
        exit;
    }

//Preventing SQL Injections & XSS Injections
$type = "'".htmlentities($_POST["type"],ENT_HTML5,'UTF-8',TRUE)."'";
$owner = "'".htmlentities($_POST["owner"],ENT_HTML5,'UTF-8',TRUE)."'";
$location = "'".htmlentities($_POST["location"],ENT_HTML5,'UTF-8',TRUE)."'";
$model = "'".htmlentities($_POST["model"],ENT_HTML5,'UTF-8',TRUE)."'";
$serialNumber = "'".htmlentities($_POST["serialNumber"],ENT_HTML5,'UTF-8',TRUE)."'";
$calibrationDate = "'".htmlentities($_POST["calibrationDate"],ENT_HTML5,'UTF-8',TRUE)."'";
$lastCalibration = "'".htmlentities($_POST["lastCalibration"],ENT_HTML5,'UTF-8',TRUE)."'";
$inspectionPlan = "'".htmlentities($_POST["inspectionPlan"],ENT_HTML5,'UTF-8',TRUE)."'";


$sql = "INSERT INTO equipment (type,owner,location,model,serialNumber,calibrationDate,lastCalibration,inspectionPlan)
        VALUES ($type,$owner,$location,$model,$serialNumber,$calibrationDate,$lastCalibration,$inspectionPlan)";
echo $sql;
if(mysqli_query($connection,$sql)) {
    echo "Added!";
}
else {
    echo "Error:".$sql."<br>".$connection->error;
}
}
?>
