<?php
session_start();
require 'connection.php';
require_once '../functions.php';

?>
<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <link href="../assets/css/style" rel="stylesheet">

  <title>Home| admin-Igboowu Polytechnic</title>
  <?php
  $userstr = ' (Guest)';

  if (isset($_SESSION['user'])) {
    $user     = $_SESSION['user'];
    $priviledge = TRUE;
    $userstr  = " ($user)";
  } else $priviledge = FALSE;
  echo "<title>$appname | $userstr</title>";

  ?>

  <!-- Bootstrap core CSS -->
  <link href="../assets/css/style.css" rel="stylesheet">
  <!-- Custom styles for this template -->
  <link href="../assets/css/form-elements.css" rel="stylesheet">
  <link href="../assets/css/jumbotron.css" rel="stylesheet">
</head>

<body>

  <div class="nav-header">
    <nav class="navbar">
      <header>
        <span class="logo-style" >Student <br>Registertion</span>
      </header>


      <ul class="navbar-nav mr-auto">
        <?php
        if ($priviledge) {
        ?>
          <li class="item-link ">
            <a class="nav-link" href="dashboard.php">Dashboard</span></a>
          </li>
          <li class="item-link">
            <a class="nav-link" href="approval.php">approve payments</a>
          </li>
          <li class="item-link">
            <a class="nav-link" href="createcourse.php">Create Course</a>
          </li>
          <li class="item-link">
            <a class="nav-link" href="createadmin.php">create Users</a>
          </li>
          <li class="item-link">
            <a class="nav-link" href="createCalendar.php"> Create Semester</a>
          </li>

          <li class="item-link">
            <a class="nav-link" href="logout.php">log out</a>
          </li>
        <?php } else { ?>
          <li class="item-link active">
            <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
          </li>

        <?php } ?>
      </ul>
      </ul>

  </div>
  </nav>
  <?php
  if ($priviledge) {
  ?>

    <div class="row">
      <nav class="col-2 Dashboard-nav">
        <ul class="nav nav-pills flex-column">
          <li class="nav-item">
            <a class="nav-link" href="dashboard.php">Overview <span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" href="deptlist.php">List of departments</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="courselist.php">List of Courses</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="createdepartment.php">Insert Department</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="AllStudent.php">All Students List</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="students.php">blocked Students List</a>
          </li>
          <li class="item-link">
            <a class="nav-link" href="AddStudentGrade.php"> Add Grade</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="approval.php">Approve Payments</a>
          </li>
        </ul>


      </nav>
      <main role="main" class="col-9 ">

      <?php
    }
      ?>