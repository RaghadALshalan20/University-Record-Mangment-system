<?php
$dbhost  = 'localhost';    // Unlikely to require changing
$dbname  = 'student';   // Modify these...
$dbuser  = 'root';   // ...variables according
$dbpass  = '';   // ...to your installation
$appname = "Igbo-Owu Polytechnics"; // ...and preference

$conn = new mysqli($dbhost, $dbuser, $dbpass, $dbname);
if ($conn->connect_error) die($conn->connect_error);
