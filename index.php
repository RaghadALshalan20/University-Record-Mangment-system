<?php // Example 26-4: index.php
  require_once 'header.php';
  

?>

  <main class="row">
<div class="col-12 center-text">
    <!-- Main jumbotron for a primary marketing message or call to action -->
  
      <div class=" card-welcom">
        <h1 class="display-3">Welcome University Record Management App! </h1>
        <p>Center for academic excellence and innovations that is unparallel to any other institution in Nigeria.</p>
        <p class="text-muted">Important- New and aspiring students should click the Register Link to put in for registration. old students should click on login to acces their portal</p>
        <p><a class="btn " href="register.php" >Learn more &raquo;</a></p>
      </div>
    

    <div class="">
      <!-- Example row of columns -->
      <div class="row text-center">
        <div class="col-5 card-index text-center">
          <h2>Log in</h2>
          <p>Access your portal to update and modify your details. </p>
          <p><a class="btn-style " href="login1.php" >View details &raquo;</a></p>
        </div>
        <div class="col-1"></div>
        <div class="col-5 card-index">
          <h2>Register</h2>
          <p>Aspiring candidate should register here and view registration details later. </p>
          <p><a class="btn-style " href="register.php" >View details &raquo;</a></p>
        </div>
        
      </div>

      <hr>


    </div> <!-- /container -->
</div>
  </main>
 <?php require_once 'footer.php';
 ?>