
<script>
     function message() {
          window.alert(' Updated succesfully');
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
     $sql = "SELECT * FROM course_reg WHERE id='$id'";
     $result = queryMysql($sql);

     if ($result->num_rows == 0) {

          die('<br><br><center><h1><span class="well">  Record not found in the database</span></h1></center>');
     } else {
          $row = $result->fetch_array(MYSQLI_ASSOC);
          $idCo=$row['course_ID'];
          $C_reg_stud_id=$row['C_reg_stud_id'];
          $sql = "SELECT * FROM register_student WHERE Register_id='$C_reg_stud_id'";
          $result = queryMysql($sql);
          $rowR = $result->fetch_array(MYSQLI_ASSOC);

          $R_Student_id=$rowR['R_Student_id'];
          $sql = "SELECT * FROM students_info WHERE id='$R_Student_id'";
          $result = queryMysql($sql);
          $rowR = $result->fetch_array(MYSQLI_ASSOC);
$nameSt= $rowR['name'];
          $sql = "SELECT * FROM courses WHERE id='$idCo'";
          $result = queryMysql($sql);
          $row = $result->fetch_array(MYSQLI_ASSOC);
          $name = $row['course_name'];
          $code = $row['course'];
          $result->free();
     } ?>

     <div class="container">
          <div class="row">
               <div class="col-3"></div>
               <div class="col-5 card-index ">
                    <div class="page-header">
                         <h1 style=" 0   auto    0   auto;margin:1rem 5px 2rem 5px">Change details for <?php echo $nameSt ?></h1>
                         <hr>

                    </div>
                    <form action="" method="post" class="form">

                         <label class="label-style" for="name">Course Title</label>
                         <input disabled type="text" placeholder="change course title..." name="title" value=<?php echo $name ?> class="form-control" required><br>

                         <label for="course-code" class="label-style">Course code</label>
                         <input disabled type="text" placeholder="Update course code..." name="code"  value=<?php echo $code ?> class="form-control" required><br>

                         <label class="label-style" for="level">student name</label>
                         <input disabled type="text" placeholder="Update level" name="level"  value=<?php echo $nameSt ?> class="form-control" required><br>

                         <label class="label-style" for="name">add Grade</label>
                         <input type="text" placeholder="add Grade" name="test" class="form-control" required><br>

                         <button  name="U-test" class="btn ">Update Course &raquo;</button>
               </div>
          </div>
          <div class="row">
               <div class="col-3"></div>
          </div>
     <?php

     if (isset($_POST['U-test'])) {
          $test = sanitizeString($_POST['test']);

          $sql = "Update course_reg set exams ='fales', test ='$test'  WHERE id='$id'";
          if (queryMysql($sql)) {

               echo '<script>message();</script>';
          } else {
               echo '<script>messageFAILED();</script>';
          }
     }
}

require_once 'footer.php';
     ?>