<?php
require_once 'header.php';
if (isset($_POST['user'])) {
  $user = sanitizeString($_POST['user']);
  $pass = sanitizeString($_POST['pass']);

  if ($user == "" || $pass == "")
    $error = "Not all fields were entered<br>";
  else {
    $result = queryMySQL("SELECT matric_no,email FROM students_info
        WHERE matric_no='$user' AND email='$pass'");

    if ($result->num_rows == 0) {
      $error = "<span class='error'>Username/Password
                  invalid</span><br><br>";
    } else {
      $_SESSION['user'] = $user;
      $_SESSION['pass'] = $pass;
      header('location:dashboard.php');
    }
  }
}

?>






<main class="login-form">


  <div class="container">
    <div class="row">
      <div class="col-4"></div>
      <div class="col-5">
        <?php if (isset($_GET['mas'])) {
          $error = $_GET['mas'];
          echo "<p>  $error</p>";
        } ?>
        <div class="body-form text-center">
          <form class="form-signin" action="login.php" method="POST">
            <h3 class="form-signin-heading text-center">Please sign in with yourmatric no and Email address as your password.</h3>
            <label class="label-style" for="inputMatricno">Email</label>
            <input type="email" id="inputMatricno" class="input-style" name="user" placeholder="Email address" required autofocus>
            <br><br>
            <label class="label-style" for="inputPassword">password</label>
            <input type="password" id="inputPassword" class="input-style" name="pass" placeholder="password" required>
            <br><br>
            <button class="btn-style" type="submit">Sign in</button>
          </form>
        </div>
      </div>
      <div class="col-3"></div>
    </div>

  </div>
</main>


<? require_once 'footer.php';
?>