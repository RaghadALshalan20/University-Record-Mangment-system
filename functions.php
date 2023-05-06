<?php // Example 26-1: functions.php

function createTable($name, $query)
{
  queryMysql("CREATE TABLE IF NOT EXISTS $name($query)");
  echo "Table '$name' created or already exists.<br>";
}

function queryMysql($query)
{
  global $conn;
  $result = $conn->query($query);
  if (!$result) die($conn->error);
  return $result;
}

function destroySession()
{
  $_SESSION = array();

  if (session_id() != "" || isset($_COOKIE[session_name()]))
    setcookie(session_name(), '', time() - 2592000, '/');

  session_destroy();
}

function sanitizeString($var)
{
  global $conn;
  $var = strip_tags($var);
  $var = htmlentities($var);
  $var = stripslashes($var);
  return $conn->real_escape_string($var);
}
function getdepartment()
{
  global $connection;
  $sql = "SELECT * FROM department";
  $result = queryMysql($sql);
  if ($result->num_rows == 0) {
    $thro = header('Location: index.php');
    die($thro);
  } else {
    $row = $result->fetch_array(MYSQLI_ASSOC);
    echo "<select name=\"department\" class=\"form-control\" >";
    do {
      echo "<option value=\"" . $row['dept_id'] . "\">" . $row['name'] . "</option>";
    } while ($row = $result->fetch_array());
    echo "</select>";
    $result->free();
  }
}
/*  function getSession(){
    global $connection;
    $sql ="SELECT * FROM calendar WHERE  ";
    $result = queryMysql($sql);
    if($result->num_rows ==0){
      $thro =header('Location: index.php');
      die($thro);

    }else{
      $row =$result->fetch_array(MYSQLI_ASSOC);
      
    }
  }*/
function showProfile($user)
{
  if (file_exists("$user.jpg"))
    echo "<img src='$user.jpg' style='float:left;'>";

  $result = queryMysql("SELECT * FROM profiles WHERE user='$user'");

  if ($result->num_rows) {
    $row = $result->fetch_array(MYSQLI_ASSOC);
    echo stripslashes($row['text']) . "<br style='clear:left;'><br>";
  }
}
