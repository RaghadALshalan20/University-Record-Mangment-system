<?php // Example 26-4: index.php
  require_once 'header.php';
  if (!$priviledge)  header('location:index.php');
  	$result1  = queryMysql("SELECT COUNT(*) as total FROM students_info");
  	$row = $result1->fetch_array(MYSQLI_ASSOC);
  	$totalStudent =$row['total'];
  	//echo "$total";

  	$result2 =queryMysql("SELECT COUNT(*) as total FROM payments WHERE approved=0");
  	$row2 = $result2->fetch_array(MYSQLI_ASSOC);
  	$totalunapproved = $row2['total'];
  	echo "$totalunapproved";
?>
  


  <section class="row ">
    <div class="col-6">
    <div class="center-text">
    <h1>Dashboard</h1>
    	<h3>There are <?php echo "$totalStudent"; ?> number of students</h3>
    	<h3>you have <?php echo "$totalunapproved";?> payments approval to attend to <a href="approval.php">here</a></h3>
</div>