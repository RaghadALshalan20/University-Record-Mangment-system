<?php
session_start();
require 'admin/connection.php';
require_once 'functions.php';

?>
<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <link rel="icon" href="../../../../favicon.ico">

  <title>Home| student registration system</title>
  <?php
  $userstr = ' (Guest)';

  if (isset($_SESSION['user'])) {
    $user     = $_SESSION['user'];
    $loggedin = TRUE;
    $userstr  = " ($user)";
  } else $loggedin = FALSE;
  echo "<title>$appname | $userstr</title>";

  ?>


  <!-- Custom styles for this template -->
  <link href="assets/css/form-elements.css" rel="stylesheet">
  <link href="assets/css/jumbotron.css" rel="stylesheet">
  <link href="assets/css/style.css" rel="stylesheet">
</head>

<body>

  <div class="nav-header">
    <nav class="navbar">

      <header>
      
      <span class="logo-style" >Student <br>Registertion</span>
      </header>



      <ul class="navbar-nav mr-auto">
        <?php
        if ($loggedin) {
        ?>
          <li class="item-link">
            <a class="nav-link" href="dashboard.php">Dashboard</a>
          </li>
          <li class="item-link">
            <a class="nav-link" href="coursereg.php">Register Course</a>
          </li>
          <li class="item-link">
            <a class="nav-link" href="RegisterSemester.php">Register semester</a>
          </li>
          <li class="item-link">
            <a class="nav-link" href="update.php">complete/update your registration</a>
          </li>
          <li class="item-link">
            <a class="nav-link" href="logout.php">log out</a>
          </li>
        <?php } else { ?>
          <li class="item-link ">
            <a class="nav-link" href="index.php">Home </a>
          </li>
          <li class="item-link">
            <a class="nav-link" href="register.php">Register</a>
          </li>
          <li class="item-link">
            <a class="nav-link" href="confirm.php">Confirm Registration</a>
          </li>
          <li class="item-link">
            <a class="nav-link" href="login1.php">Log in</a>
          </li>
        <?php } ?>
      </ul>


    </nav>
  </div>