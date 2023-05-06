<?php
require_once 'header.php';
if (!($priviledge)) {
   header('Location: ../index.php');
}
if (isset($_GET['id']) && is_numeric($_GET['id']) && $_GET['id'] > 0){
 // query db
 $id =sanitizeString($_GET['id']);
$sql="SELECT * FROM department WHERE dept_id='$id'";
$result=queryMysql($sql);

if ($result->num_rows==0){

	die('<br><br><center><h1><span class="well">  Record not found in the database</span></h1></center>');
}else{
	$row = $result->fetch_array(MYSQLI_ASSOC);
	$name = $row['name'];
	
	$result->free();

}
echo <<<_END

<div class="container">
<div class="page-header">
                    <h1 style=" 0   auto    0   auto;">Change details for $name</h1><hr>

                </div>
               <form  action="" method="post" class="form">
               <div class="form-group">
                    <label for="name">Department Name</label><br>
               <input type="text" placeholder="change department Name..." name="dept_name" class="form-control" required><br>
               </div>
               
               
               <button class="btn btn-primary btn-lg"  >Update Department &raquo;</button>
  </div>

_END;


if (isset($_POST['dept_name'])){
	$title= sanitizeString($_POST['dept_name']);

	
	$sql="Update department set name ='$title' WHERE dept_id='$id'";
	if(queryMysql($sql)){

		die('<br><br><center><h1><span class="well"> course Updated succesfully<a href="dashboard.php"> click here to go back</a> </span></h1></center>');}
	


}
}

require_once 'footer.php';
?>
