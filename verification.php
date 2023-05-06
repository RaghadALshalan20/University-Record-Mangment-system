<?php
require_once 'header.php';

?>
<main role="main">

      <!-- Main jumbotron for a primary marketing message or call to action -->
      <div class="jumbotron">
        <div class="container">
          <h1 class="display-3">Bank Verification Number </h1>
          <h5>Verify BVN</h5>
          <form action="ver2.php" method="post" class="form-inline">
            <div class="form-group">
              <label class="sr-only" for="form-first-name"></label>
              <input type="text" name="customer" placeholder="Enter your BVN no...." class="form-control form-control-lg" id="phone" required>
            </div>
            <button type="submit" class="btn btn-primary">Search</button>
          </form>
        </div>
      </div>
<?php
require_once 'footer.php';
 ?>
