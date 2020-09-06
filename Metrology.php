<?php session_start(); ?>
<?php include "header2.php"; ?>
<?php include "logout.php"; ?>
<?php include "db_connect.php"; ?>
<?php include "equ.php" ?>
<h1>This is the metrology verification page</h1>
<p> The list of equipment, which have Inspection Plan, will be updated</p>
<br><br><br><br>

<p> Do you now why is necesary to do the calibration? On the video you can see why.</p>

<iframe width="978" height="506" src="https://www.youtube.com/embed/SFLjoTI-LVA" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>

<br><br>
<form>
    <div class="form-row col-sm-6">
	<div class="col">
	Please Choose an equipment
    <select id="equipment" name="equipment"  placeholder="<?php echo 'Equipment: ' . $equipment;?>" value="<?php echo $equipment;?>" onchange="myFunction()" required 
		<option> </option>
		<option>Thermometer</option>
		<option>DC Power Supply</option>
	</select>
	<div class="form-row col-sm-6">
    <div class="col">
    <button type="button" onclick="myFunction()"> Choosen </button>
    </div>
    </div>

</form>
<p id="demo"></p>
<script>
function myFunction() {
  var x = document.getElementById("equipment");
  document.getElementsById("demo").innerHTML = x;
}
</script>
