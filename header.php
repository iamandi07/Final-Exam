<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Calibration</title>

  <!-- Custom fonts for this theme -->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet" type="text/css">

  <!-- Theme CSS -->
  <link href="css/freelancer.min.css" rel="stylesheet">
  <link href="css/style.css" rel="stylesheet">

</head>

<body id="page-top">

  <!-- Navigation -->
  <nav class="navbar navbar-expand-lg bg-secondary fixed-top" id="mainNav">
    <div class="container">
    <a class="navbar-brand js-scroll-trigger" href="index.php">Calibration Page</a>
    
    <!--formular login-->
    <form method = "post"> 
    <div class="form-row">
    <div class="col-sm-2">
    <input type="text" class="form-control" id="user" name="user" placeholder="user">
    </div>
    <div class="col-sm-2">
    <input type="password" class="form-control" id="password" name="password" placeholder="password"> 
    </div>  
	
	<div class="col-sm-0.5">
	</div>
	<div class="col-sm-1.5">
	<button type="submit" class="btn btn-info btn-block" name = "login">Login</button>
    </div>
	
	<div class="col-sm-1.5">
	<a role="button" class="btn btn-info btn-block" href="registration.php">Registration</a>
	
	</div>
	</form>
   
    </div>

</nav>

<br><br><br><br><br>