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




if (isset($_POST['calendar'])) {

  $startsDate = $_POST['startsDate'];
  $endDate = $_POST['endDate'];
  $semester = $_POST['form-semester'];
  $description = $_POST['description'];


  if (queryMysql(" INSERT INTO calendar ( starts, ends, description, semester_ID) VALUES (' $startsDate', ' $endDate', '$description', '  $semester')")) {

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

      <form action="" method="post" class="">
        <fieldset>
          <div id="look"></div>
          <legend class="text-center">Create Calendar</legend>


          <label class="label-style" class="label-style" for="email">semester</label>
          <select name="form-semester" class="">
            <option value="">select semester</option>
            <?php
            $sql = "SELECT * FROM `semester_session`";
            $result = mysqli_query($conn, $sql);
            if (mysqli_num_rows($result) === 0) {
              "<div class=\"container mt-4\">
      <h2> record not found, click here to <br> <a href=\"register.php\">Register</a></h2>
    </div>";
            } else {

              while ($row = mysqli_fetch_array($result)) {
                echo '<option value=" ' . $row[0] . '">' . $row[1] . '</option>';
              }
            } ?>


          </select>

          <br>
          <label class="label-style" for="password">starts Date</label>
          <input type="date" placeholder="starts ....." name="startsDate" class="form-control">

          <br>
          <label class="label-style" for="name">End Date</label>
          <input type="date" placeholder="end" name="endDate" class="form-control"><br>
          <br>

          <label class="label-style" for="password">description</label>
          <input type="text" placeholder="description ....." name="description" class="form-control">



          <div class="clearfix"></div>
          <button type='submit' name="calendar" class="btn">Create Calendar &raquo;</button>
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