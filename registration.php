<?php include "header.php"; ?>
<?php include "login.php"; ?>
<?php include "logout.php"; ?>
<?php include "db_connect.php"; ?>
<?php include "verification.php"; ?>

<!--Formulare de inscriere-->
<form method="POST" enctype="multipart/form-data">

<p>
    <div class="form-row col-sm-6">
	<div class="col">
    <input type="text" class="form-control" id="salutation" name="salutation " placeholder="<?php echo 'Salutation: ' . $salutation;?>" value="<?php echo $salutation;?>" required> 
    </div>
    <div class="col">
    <input type="text" class="form-control" id="firstName" name="firstName " placeholder="<?php echo 'FirstName: ' . $firstName;?>" value="<?php echo $firstName;?>" required> 
    </div>
    <div class="col">
    <input type="text" class="form-control" id="lastName" name="lastName " placeholder="<?php echo 'LastName: ' . $lastName;?>" value="<?php echo $lastName;?>"  required>
    </div>
    <div class="col">
    <input type="text" class="form-control" id="plant" name="plant "  placeholder="<?php echo 'Plant: ' . $plant;?>" value="<?php echo $plant;?>" required>
    </div>
	<div class="col">
    <input type="text" class="form-control" id="phoneNumber" name="phoneNumber "  placeholder="<?php echo 'PhoneNumber: ' . $phoneNumber;?>" value="<?php echo $phoneNumber;?>" required>
    </div>
	<div class="col">
    <input type="email" class="form-control" id="email" name="email "  placeholder="<?php echo 'Email: ' . $email;?>" value="<?php echo $email;?>" required>
    </div>
    </div>
</p>

<p>
	<script src="passcheck.js"></script>
    <div class="form-row col-sm-6">
    <div class="col">
    <input type="text" class="form-control" id="user" name="user"  placeholder="<?php echo 'User: ' . $user;?>" value="<?php echo $user;?>"  required>
    </div>
    <div class="col">
    <input type="password" class="form-control" id="password" name="password"  placeholder="<?php echo 'Password: ' . $password;?>" value="<?php echo $password;?>" required>
    </div>
    <div class="col">
    <input type="password" class="form-control" id="password2" name="password2"  placeholder="<?php echo 'Password2: ' . $password2;?>" value="<?php echo $password2;?>" required>
	 
	 <!--Checking pass match client-side-->
	 <div id="chkForm1"></div>
	 <span id='message'></span>
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
        // header("Location: registration.php");
        echo $fail;
        exit;
    }

//Preventing SQL Injections & XSS Injections
$salutation = "'".htmlentities($_POST["salutation"],ENT_HTML5,'UTF-8',TRUE)."'";
$firstName = "'".htmlentities($_POST["firstName"],ENT_HTML5,'UTF-8',TRUE)."'";
$lastName = "'".htmlentities($_POST["lastName"],ENT_HTML5,'UTF-8',TRUE)."'";
$plant = "'".htmlentities($_POST["plant"],ENT_HTML5,'UTF-8',TRUE)."'";
$phoneNumber = "'".htmlentities($_POST["phoneNumber"],ENT_HTML5,'UTF-8',TRUE)."'";
$email = "'".htmlentities($_POST["email"],ENT_HTML5,'UTF-8',TRUE)."'";
$passwordFinal = "'".md5(htmlentities($_POST["password"],ENT_HTML5,'UTF-8',TRUE))."'";
$userFinal = "'".htmlentities($_POST["user"],ENT_HTML5,'UTF-8',TRUE)."'";





$sql = "INSERT INTO person (salutation,firstName,lastName,plant,phoneNumber,email,password,user)
        VALUES ($salutation,$firstName,$lastName,$plant,$phoneNumber,$email,$passwordFinal,$userFinal)";

if(mysqli_query($connection,$sql)) {
    echo "Added!";
}
else {
    echo "Error:".$sql."<br>".$connection->error;
}


}
?>

<?php include "footer.php"; ?>