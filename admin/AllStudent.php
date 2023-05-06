<?php
require_once 'header.php';
if (!($priviledge)) {
	header('Location: ../index.php');
}
$per_page = 10;



$sql = "SELECT
students_info.id,
students_info.image,
students_info.email,
students_info.name As StdName,
students_info.gender,
students_info.mobile,
students_info.home_address,
department.name As DepName ,
courses.course_name,
course_reg.test
FROM
register_student
INNER JOIN students_info ON register_student.R_Student_id=students_info.id 
INNER JOIN calendar  ON register_student.R_cal_id = calendar.cal_id 
INNER JOIN course_reg ON register_student.Register_id = course_reg.C_reg_stud_id
INNER JOIN department ON students_info.department__id = department.dept_id 
INNER JOIN courses ON course_reg.course_ID = courses.id 
where   DATE_FORMAT(calendar.`starts`, '%Y')=DATE_FORMAT( SYSDATE(), '%Y' )and course_reg.exams ='false' ";

$result = mysqli_query($conn, $sql);

$result = queryMysql($sql);
if ($result->num_rows) {
	$total = $result->num_rows;
	$row = $result->fetch_array(MYSQLI_ASSOC);
	$total_pages = ceil($total / $per_page);

	if (isset($_GET['page']) && is_numeric($_GET['page'])) {
		$show_page = $_GET['page'];

		// make sure the $show_page value is valid
		if ($show_page > 0 && $show_page <= $total_pages) {
			$start = ($show_page - 1) * $per_page;
			$end = $start + $per_page;
		} else {
			// error - show first set of results
			$start = 0;
			$end = $per_page;
		}
	} else {
		// if page isn't set, show first set of results
		$start = 0;
		$end = $per_page;
	}
	echo <<<_END
<div class="container">
<div class="row">
<div class="col-11">
_END;

	// display pagination
	echo "<p align='center'>  <b>All course List :</b> ";
	for ($i = 1; $i <= $total_pages; $i++) {
		echo "<a href='courselist.php?page=$i'>$i</a> ";
	}
	echo "</p><div>";
	echo '<table   align="center" class="t"><thead><tr>';
	echo '
	<th>image</th>
	<th>email</th>
	<th>NAME</th>
	<th>Gander</th>
	<th>mobile</th>
	<th>Address</th>
	<th>department</th>
	<th>Course name</th>
	<th>Course Grade</th></tr>
	</thead><tbody>';
	$i = $start;
	//for ($i = $start; $i < $end; $i++)
	while ($row = mysqli_fetch_array($result)) {

		echo "<tr>";
	
		echo '<td> <img src="../'. $row[1] .'" class="size-image" alt=""></td>';
		echo '<td>' . $row[2] . '</td>';
		echo '<td>' . $row[3] . '</td>';
		echo '<td>' . $row[4] . '</td>';
		echo '<td>' . $row[5] . '</td>';
		echo '<td>' . $row[6] . '</td>';
		echo '<td>' . $row[7] . '</td>';
		echo '<td>' . $row[8] . '</td>';
		echo '<td>' . $row[9] . '</td>';

		echo "</tr>";
		
	} 
	echo "</tbody></table></div></div>";
}
require_once 'footer.php';
