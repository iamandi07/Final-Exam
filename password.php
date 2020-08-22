<?php include "header.php"; ?>
<?php include "login.php"; ?>
<?php include "logout.php"; ?>
<?php include "db_connect.php"; ?>

<?php
if(!isset($_SESSION["user"]))
    //Daca nu suntem logati redirectioneaza catre index.php
    header("Location: index.php");

?>

<form method="post">

    <p>
    <div class="form-row col-sm-4">
    Parola curenta:<div class="col">
    <input type="text" class="form-control" id="parola" name="parola" placeholder="<?php echo $parola;?>" value="<?php echo $parola;?>" required> 
    </div></div>
    </p>

    <p>
    <div class="form-row col-sm-4">
    Parola noua:<div class="col">
    <input type="password" class="form-control" id="parola2" name="parola2" placeholder="<?php echo $parola2;?>" value="<?php echo $parola2;?>">
    </div></div>
    </p>

    <p>
    <div class="form-row col-sm-4">
    Parola noua:<div class="col">
    <input type="password" class="form-control" id="parola3" name="parola3"  placeholder="<?php echo $parola3;?>" value="<?php echo $parola3;?>">
    </div></div>
    </p>

    <p>
    <div class="form-row col-sm-6">
    <div class="col">
    <button type="submit" name="submit" id="submit" class="btn btn-primary">schimba</button>
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
$newpass = "'".md5(htmlentities($_POST["parola2"],ENT_HTML5,'UTF-8',TRUE))."'";
$currentUser = $_SESSION["user"];
$currentPass = $_SESSION["password"];

$sql = "UPDATE utilizatori SET parola = $newpass WHERE usernume = $currentUser AND parola = $currentPass";

if(mysqli_query($connection,$sql))
    echo "Added!";
else
    echo "Error:".$sql."<br>".$connection->error;

}
?>

<?php include "templates/footer.php"; ?>