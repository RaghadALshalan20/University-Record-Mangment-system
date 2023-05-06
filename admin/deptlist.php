<?php 
require_once 'header.php';
if (!($priviledge) ) {
   header('Location: ../index.php');}
$per_page=10;

		$sql="SELECT * FROM department";

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
<div class="container"><center>
<div class="col-sm-6">
_END;

	// display pagination
	echo "<p align='center'>  <b>All Department List :</b> ";
	for ($i = 1; $i <= $total_pages; $i++)
	{
		echo "<a href='deptlist.php?page=$i'>$i</a> ";
	}?>
	</p>
	<div class="row">
		<div class="col-4"></div>
		<div class="col-4">
	
		<table   align="center" class="table table-stripped">
			<thead><th>option</th><th>NAME</th></thead>
			<tbody>
	<?php
	$i= $start;
	//for ($i = $start; $i < $end; $i++)
	do {
		// make sure that PHP doesn't try to show results that don't exist
		if ($i == $total) { break; }
		
		echo "<tr>";
		echo '<td><a href="editdept.php?id='.$row['dept_id'].'">Edit</a></td>';
		echo '<td>'.$row['name'].'</td>';

		echo "</tr>";
		$i++;

		}while(($row = $result->fetch_array()) && ($i < $end) ); 
		?>
	</tbody></table></div>
	<div class="col-3"></div>
	</div>
	<?php
	echo "
              <a class=\"btn btn-lg btn-success\" href=\"createdepartment.php\">Insert Department</a>
           ";





}
require_once 'footer.php';
?>