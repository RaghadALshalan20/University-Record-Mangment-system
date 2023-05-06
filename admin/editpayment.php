<script>
  function message() {
    window.alert("INSERT DONE SUCCESSFULLY");
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
if (isset($_GET['id']) && is_numeric($_GET['id']) && $_GET['id'] > 0){
 // query db
 $id =sanitizeString($_GET['id']);
 $sql = "SELECT
 payments.id,
 payments.name,
 students_info.`name`as nameSt
FROM
 students_info
 INNER JOIN register_student ON students_info.id = register_student.R_Student_id
 INNER JOIN payments  ON register_student.R_pay_id = payments.id where payments.id  ='$id'";

$result = mysqli_query($conn, $sql);
if ($result->num_rows==0){

	die('<br><br><center><h1><span class="well">  Record not found in the database</span></h1></center>');
}
else{
    while ($row = mysqli_fetch_array($result)) {
      $name = $row['name'];
      $nameSt=$row['nameSt'];
    }
  }
}
?>
<div class="container">
   <div class="row">
      <div class="col-3"></div>
      <div class="col-5 card-index ">
<div class="page-header">
                    <h1 style=" 0   auto    0   auto; margin:1rem 5px 2rem 5px">Approve Payments</h1><hr>

                </div>
               <form  action="" method="post" class="form">
              
                    <label  class="label-style" for="name">Name:</label>
               <input type="select" value=<?php echo $nameSt?> name="title" class="form-control" readonly><br>
               <br>
               
               <label  class="label-style" for="name">Name:</label>
               <input type="select" value=<?php echo $name?> name="title" class="form-control" readonly><br>
               <br>
                <label class="" for="level">Approve Payment( check to approve)</label>
               <input type="checkbox"  name="blocked" value=1 class="form-control">
               <br>
            

               
               <button class="btn"  >Update &raquo;</button>
  </div>
  </div>
  <div class="col-3"></div>
   </div>
  <?php


if (isset($_POST['blocked'])){
	$title= sanitizeString($_POST['blocked']);
	
	$sql="Update payments set approved ='$title' WHERE id='$id'";
	if(queryMysql($sql)){
      echo '<script>message();</script>';
   } else {
     echo '<script>messageFAILED();</script>';
   }
}

require_once 'footer.php';
?>
