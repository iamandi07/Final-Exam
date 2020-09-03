<?php session_start(); ?>
<?php include "header2.php"; ?>
<?php include "logout.php"; ?>
<?php include "db_connect.php"; ?>
<?php include "verification2.php"; ?>


<?php
if(!isset($_SESSION["user"]))
    //Daca nu suntem logati redirectioneaza catre index.php
    header("Location: index.php");

?>

<form method="POST" enctype="multipart/form-data">

    <p>
    <div class="form-row col-sm-6">
	<div class="col">
    <input type="text" class="form-control" id="plant" name="plant"  placeholder="<?php echo 'Plant: ' . $plant;?>" value="<?php echo $plant;?>"  required>
    </div>
    <div class="col">
    <input type="text" class="form-control" id="costCenterManagerId" name="costCenterManagerId"  placeholder="<?php echo 'CostCenterManagerId: ' . $costCenterManagerId;?>" value="<?php echo $costCenterManagerId;?>"  required> 
    </div>
	<div class="col">
    <input type="text" class="form-control" id="equipmentResponsibleId" name="equipmentResponsibleId"  placeholder="<?php echo 'EquipmentResponsibleId: ' . $equipmentResponsibleId;?>" value="<?php echo $equipmentResponsibleId;?>" required>
    </div>
    <div class="col">
    <input type="text" class="form-control" id="foremanId" name="foremanId"  placeholder="<?php echo 'ForemanId: ' . $foremanId;?>" value="<?php echo $foremanId;?>"  required>
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
$plant = "'".htmlentities($_POST["plant"],ENT_HTML5,'UTF-8',TRUE)."'";
$costCenterManagerId = "'".htmlentities($_POST["costCenterManagerId"],ENT_HTML5,'UTF-8',TRUE)."'";
$equipmentResponsibleId = "'".htmlentities($_POST["equipmentResponsibleId"],ENT_HTML5,'UTF-8',TRUE)."'";
$foremanId = "'".htmlentities($_POST["foremanId"],ENT_HTML5,'UTF-8',TRUE)."'";

$sql = "INSERT INTO costcenter1 (plant,costCenterManagerId,equipmentResponsibleId,foremanId)
        VALUES ($plant,$costCenterManagerId,$equipmentResponsibleId,$foremanId)";
echo $sql;
if(mysqli_query($connection,$sql)) {
    echo "Added!";
}
else {
    echo "Error:".$sql."<br>".$connection->error;
}
}
?>
