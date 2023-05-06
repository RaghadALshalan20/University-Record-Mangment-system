<?php
require_once 'header.php';

?>
<main role="main">

      <!-- Main jumbotron for a primary marketing message or call to action -->
      <div class="jumbotron">
        <div class="container">
        
          <div class="row">
          <div class="col-4 "></div>
          
            <div class="col-4 card-index">
            <form action="ver.php" method="post" class="form-inline">
            <h1 class="display-3">Confirm registration status </h1>
          <h5>confirm registration</h5>
              <label class="label-style" for="form-first-name">Email</label>
              <input type="email" name="customer" placeholder="enter your email address to verify registration...." class="form-control form-control-lg" id="phone"  required>
            
            <button type="submit" class="btn">Verify</button>
            </div>
          </form>
          <div class="col-4"></div>
          </div>
        </div>
      </div>
<?php
require_once 'footer.php';
 ?>
