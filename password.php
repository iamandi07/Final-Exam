<?php include "header2.php"; ?>
<?php include "logout.php"; ?>
<?php include "db_connect.php"; ?>
<?php include "passwordverification.php" ?>

<?php
if(!isset($_SESSION["user"]))
    //Daca nu suntem logati redirectioneaza catre index.php
    header("Location: index.php");

?>

<form method="post">

    <p>
    <div class="form-row col-sm-4">
    Parola curenta:<div class="col">
    <input type="text" class="form-control" id="password" name="password" placeholder="" value="" required> 
    </div></div>
    </p>

    <p>
    <div class="form-row col-sm-4">
    Parola noua:<div class="col">
    <input type="password" class="form-control" id="password2" name="password2" placeholder="" value="<?php echo $password2;?>">
    </div></div>
    </p>

    <p>
    <div class="form-row col-sm-4">
    Parola noua:<div class="col">
    <input type="password" class="form-control" id="password3" name="password3"  placeholder="" value="<?php echo $password3;?>">
    </div></div>
    </p>

    <p>
    <div class="form-row col-sm-6">
    <div class="col">
    <button type="submit" name="submit" id="submit" class="btn btn-primary">change</button>
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

//Preventing SQL Injections & XSS Injections
$newpass = "'".md5(htmlentities($_POST["password2"],ENT_HTML5,'UTF-8',TRUE))."'";
$currentUser = $_SESSION["user"];
$currentPass = $_SESSION["password"];

$sql = "UPDATE person SET password = $newpass WHERE user = $currentUser AND password = $currentPass";

if(mysqli_query($connection,$sql))
    echo "Added!";
else
    echo "Error:".$sql."<br>".$connection->error;

}
?>
