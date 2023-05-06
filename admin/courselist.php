<?php 
require_once 'header.php';
if (!($priviledge) ) {
   header('Location: ../index.php');}
$per_page=10;

		$sql="SELECT c.id as id, c.course as code, c.course_name as title, c.credit as credit,c.level as level, d.name as dept FROM courses c JOIN department d ON c.department_id = d.dept_id";

		$result = queryMysql($sql);
	if($result->num_rows){
		$total =$result->num_rows;
		$row = $result->fetch_array(MYSQLI_ASSOC);
		$total_pages=ceil($total/$per_page);

		if (isset($_GET['page']) && is_numeric($_GET['page']))
		{
		$show_page = $_GET['page'];
		
		// make sure the $show_page value is valid
		if ($show_page > 0 && $show_page <= $total_pages)
		{
			$start = ($show_page -1) * $per_page;
			$end = $start + $per_page; 
		}
		else
		{
			// error - show first set of results
			$start = 0;
			$end = $per_page; 
		}		
	}
	else
	{
		// if page isn't set, show first set of results
		$start = 0;
		$end = $per_page; 
	}
echo <<<_END
<div class="container-fluid">
<div class="row">
<div class="col-sm-8">
_END;

	// display pagination
	echo "<p align='center'>  <b>All course List :</b> ";
	for ($i = 1; $i <= $total_pages; $i++)
	{
		echo "<a href='courselist.php?page=$i'>$i</a> ";
	}
	echo "</p><div class=\"table-responsive\">";
	echo '<table   align="center" class="table table-stripped"><thead><tr>';
	echo '<th>option</th> 
	<th>Course code</th>
	<th>NAME</th>
	<th>DEPARTMENT</th>
	<th>Level</th>
	<th>credit</th></tr>
	</thead><tbody>';
	$i= $start;
	//for ($i = $start; $i < $end; $i++)
	do {
		// make sure that PHP doesn't try to show results that don't exist
		if ($i == $total) { break; }
		
		echo "<tr>";
		echo '<td><a href="editcourse.php?id='.$row['id'].'">Edit</a></td>';
		echo '<td>'.$row['code'].'</td>';
		echo '<td>'.$row['title'].'</td>';
		echo '<td>'.$row['dept'].'</td>';
		echo '<td>'.$row['level'].'</td>';
		echo '<td>'.$row['credit'].'</td>';
		
		echo "</tr>";
		$i++;

		}while(($row = $result->fetch_array()) && ($i < $end) ); 
	echo "</tbody></table></div></div>";





}
require_once 'footer.php';
?>