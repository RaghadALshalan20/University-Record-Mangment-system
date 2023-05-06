<?php
require_once 'header.php';
if (!($priviledge)) {
   header('Location: ../index.php');
}
if (isset($_GET['id']) && is_numeric($_GET['id']) && $_GET['id'] > 0){
 // query db
 $id =sanitizeString($_GET['id']);
$sql="SELECT * FROM courses WHERE id='$id'";
$result=queryMysql($sql);

if ($result->num_rows==0){

	die('<br><br><center><h1><span class="well">  Record not found in the database</span></h1></center>');
}else{
	$row = $result->fetch_array(MYSQLI_ASSOC);
	$name = $row['course_name'];
	$code =$row['course'];
	$result->free();

}?>

<div class="container">
<div class="row">
      <div class="col-3"></div>
      <div class="col-5 card-index ">
<div class="page-header">
                    <h1 style=" 0   auto    0   auto;margin:1rem 5px 2rem 5px">Change details for $name</h1><hr>

                </div>
               <form  action="" method="post" class="form">
              
                    <label class="label-style" for="name">Course Title</label>
               <input type="text" placeholder="change course title..." name="title" class="form-control" required><br>
             
                    <label for="course-code" class="label-style">Course code</label>
               <input type="text" placeholder="Update course code..." name="code" class="form-control" required><br>
               
                    <label  class="label-style"for="level">level</label>
               <input type="text" placeholder="Update level" name="level" class="form-control" required><br>
              
                    <label class="label-style"for="name">Credit</label>
               <input type="text" placeholder="Update credit" name="credit" class="form-control" required><br>
             
               <button class="btn "  >Update Course &raquo;</button>
  </div>
</div>
  <div class="row">
      <div class="col-3"></div>
</div>
<?php

if (isset($_POST['code'])){
	$title= sanitizeString($_POST['title']);
	$code= sanitizeString($_POST['code']);
	$level= sanitizeString($_POST['level']);
	$credit= sanitizeString($_POST['credit']);
	
	$sql="Update courses set course ='$code', course_name ='$title', level='$level', credit ='$credit' WHERE id='$id'";
	if(queryMysql($sql)){

		die('<br><br><center><h1><span class="well"> course Updated succesfully<a href="dashboard.php"> click here to go back</a> </span></h1></center>');}
	


}
}

require_once 'footer.php';
?>
