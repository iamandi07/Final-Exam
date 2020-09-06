<?php include "header2.php"; ?>
<?php include "logout.php"; ?>
<?php include "thermo.php"; ?>

<?php
if(!isset($_SESSION["user"]))
    //Daca nu suntem logati redirectioneaza catre index.php
    header("Location: index.php");

?>

<form method="post">

    <p>
    <div class="form-row col-sm-4">
    Valure for the 50°C:<div class="col">
    <input type="text" class="form-control" id="value1" name="value1" placeholder="<?php echo 'Value1: ' . $value1;?>" value="<?php echo $value1;?>" required> 
    </div></div>
    </p>

    <p>
    <div class="form-row col-sm-4">
    Valure for the 100°C:<div class="col">
    <input type="text" class="form-control" id="value2" name="value2" placeholder="<?php echo 'Value2: ' . $value2;?>" value="<?php echo $value2;?>" required>
    </div></div>
    </p>

    <p>
    <div class="form-row col-sm-4">
    Valure for the 250°C<div class="col">
    <input type="text" class="form-control" id="value3" name="value3" placeholder="<?php echo 'Value3: ' . $value3;?>" value="<?php echo $value3;?>" required>
    </div></div>
    </p>
	<p>
    <div class="form-row col-sm-4">
    Valure for the 300°C<div class="col">
    <input type="text" class="form-control" id="value4" name="value4" placeholder="<?php echo 'Value4: ' . $value4;?>" value="<?php echo $value4;?>" required>
    </div></div>
    </p>

    <p>
    <div class="form-row col-sm-6">
    <div class="col">
    <button type="submit" name="submit" id="submit" class="btn btn-primary">submit</button>
    </div></div>
    </p>

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

 
$myfile = fopen("results.txt", "w") or die("Unable to open file!");
fwrite($myfile, $value1, $value2, $value3, $value4);
fclose($myfile);
 
}
?>
