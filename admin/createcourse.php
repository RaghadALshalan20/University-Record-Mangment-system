<script>
  function message() {
    window.alert("INSERT DONE SUCCESSFULLY");
  }

  function messageFAILED() {
    window.alert("INSERT FAILED");
  }
</script>
<?php
//session_destroy();
require_once 'header.php';
if (!($priviledge)) {
  header('Location: ../index.php');
}




if (isset($_POST['code'])) {

  $code = sanitizeString($_POST['code']);
  $title = sanitizeString($_POST['title']);
  $credit = $_POST['credit'];
  $level = sanitizeString($_POST['level']);
  $department = sanitizeString($_POST['department']);





  if (queryMysql("INSERT INTO courses VALUES ('','$code','$title','$credit','$department','$level', NULL)")) {

    echo '<script>message();</script>';
  } else {
    echo '<script>messageFAILED();</script>';
  }
}



?>

<div class="container-fluid">

  <hr>
  <div class="row">
    <div class="col-3"></div>
    <div class="col-6 card-index">

      <form action="" method="post" class="form bg-light">
        <fieldset>
          <div id="look"></div>
          <legend class="text-center">Create Course</legend>



          <label class="label-style" class="label-style" for="email">Course code</label>
          <input type="text" placeholder="Course Code...." name="code" class="form-control">

          <br>
          <label class="label-style" for="password">Course Title</label>
          <input type="text" placeholder="title ....." name="title" class="form-control">

          <br>
          <label class="label-style" for="name">Credit</label>
          <input type="number" placeholder="credit" name="credit" class="form-control"><br>
          <br>
          <label class="label-style" for="telephone">department</label>
          <?php getdepartment(); ?>

          <br>
          <label class="label-style" for="password">level</label>
          <input type="text" placeholder="level ....." name="level" class="form-control">



          <div class="clearfix"></div>
          <button class="btn btn-primary btn-lg">Create Course &raquo;</button>
        </fieldset>

      </form>

    </div>
    <div class="col-3"></div>

  </div>
  </center>
</div>

</div>
</div>
<?php require_once 'footer.php';
?>