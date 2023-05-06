<?php // Example 26-7: login.php
require_once 'header.php';
echo "<div class='main'><h3>Please enter your details to log in</h3>";
$error = $user = $pass = "";

if (isset($_POST['user'])) {
  $user = $_POST['user'];
  $pass = $_POST['pass'];

  if ($user == "" || $pass == "") {
    $error = "Not all fields were entered<br>";
    header("Location: login1.php?mes=" . $error);
  } else {

    $sql = "SELECT * FROM students_info WHERE email='$user' AND password='$pass'";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) === 0) {
      $error = "<span class='error'>Username/Password invalid</span><br><br>";
      header("Location:login1.php?mes=" . $error);
    } else {
      $row = $row = mysqli_fetch_array($result);
      $_SESSION['ID'] = $row['id'];
      $_SESSION['user'] = $user;
      $_SESSION['pass'] = $pass;
      /*  die("You are now logged in. Please <a href='dashboard.php?view=$user'>" .
          "click here</a> to continue.<br><br>");
          */
      header("Location:index.php?mes=" . $error);
    }
  }
}
?>
<!--  <form method='post' action='login.php'>$error
    <span class='fieldname'>MATRIC NO</span><input type='text'
      maxlength='16' name='user' value='$user'><br>
    <span class='fieldname'>E-MAIL</span><input type='email'
       name='pass' value='$pass'>



<br>
<span class='fieldname'>&nbsp;</span>
<input type='submit' value='Login'>
</form><br></div>
</body> -->

</html>