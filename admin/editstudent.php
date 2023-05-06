<script>
     function message() {
          window.alert('  Updated succesfully');
     }

     function messageFAILED() {
          window.alert("INSERT FAILED");
     }
</script>
<?php

require_once 'header.php';
if (!($priviledge)) {
     header('Location: ../index.php');
}
if (isset($_GET['id']) && is_numeric($_GET['id']) && $_GET['id'] > 0) {
     // query db
     $id = sanitizeString($_GET['id']);
     $sql = "SELECT * FROM students_info WHERE id='$id'";
     $result = queryMysql($sql);

     if ($result->num_rows == 0) {

          die('<br><br><center><h1><span class="well">  Record not found in the database</span></h1></center>');
     } else {
          $row = $result->fetch_array(MYSQLI_ASSOC);
          $name = $row['name'];
          $code = $row['email'];
          $status = $row['blocked'];

          $result->free();
     } ?>

     <div class="container">
          <div class="row">
               <div class="col-3"></div>
               <div class="col-5 card-index ">
                    <div class="page-header">
                         <h1 style=" 0   auto    0   auto;margin: 1rem 5px 2rem 5px">BLOCK/UNBLOCK students</h1>
                         <hr>

                    </div>
                    <form action="" method="post" class="form">
                         <div class="form-group">
                              <label class="label-style" for="name">Name:</label>
                              <input type="select" value="<?php echo $name ?>" name="title" class="form-control" readonly><br>
                         </div>
                         <label class="label-style" for="course-code"> email</label>
                         <input type="select" value="<?php echo $code ?>" name="code" class="form-control" readonly><br>


                         <label for="level">Block student(checked if blocked)</label>
                         <input type="checkbox" name="blocked" value=0 class="form-control"><br>

                         <button class="btn ">Update &raquo;</button>
               </div>
               <div class="col-3"></div>
          </div>
     <?php


     if (isset($_POST['code'])) {
          $title = sanitizeString($_POST['blocked']);


          $sql = "Update students_info set blocked ='$title' WHERE id='$id'";
          if (queryMysql($sql)) {


               echo '<script>message();</script>';
          } else {
               echo '<script>messageFAILED();</script>';
          }
     }
}

require_once 'footer.php';
     ?>