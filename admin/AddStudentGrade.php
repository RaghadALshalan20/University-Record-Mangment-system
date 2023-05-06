<?php
require_once 'header.php';
if (!($priviledge)) {
	header('Location: ../index.php');
}
$per_page = 10;

$sql = "SELECT
		course_reg.ID,
		students_info.name,
		students_info.gender,
		register_student.Register_Date,
		courses.course_name,
		course_reg.course_code
	FROM
		students_info
		INNER JOIN register_student ON students_info.id = register_student.R_Student_id
		INNER JOIN course_reg ON register_student.Register_id = course_reg.C_reg_stud_id
		INNER JOIN courses ON course_reg.course_ID = courses.id where course_reg.exams ='True'";

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
<div class="col-10">
_END;

	// display pagination
	echo "<p align='center'>  <b>All course List :</b> ";
	for ($i = 1; $i <= $total_pages; $i++) {
		echo "<a href='courselist.php?page=$i'>$i</a> ";
	}
	echo "</p><div>";
	echo '<table   align="center" class="t"><thead><tr>';
	echo '<th>option</th> 
	<th>NAME</th>
	<th>Gander</th>
	<th>Register Date</th>
	<th>course name</th>
	<th>Course code</th></tr>
	</thead><tbody>';
	$i = $start;
	//for ($i = $start; $i < $end; $i++)
	while ($row = mysqli_fetch_array($result)) {

		echo "<tr>";
		echo '<td><a href="AddGrade.php?id=' . $row[0] . '">Add Grade</a></td>';
		echo '<td>' . $row[1] . '</td>';
		echo '<td>' . $row[2] . '</td>';
		echo '<td>' . $row[3] . '</td>';
		echo '<td>' . $row[4] . '</td>';
		echo '<td>' . $row[5] . '</td>';

		echo "</tr>";
		
	} 
	echo "</tbody></table></div></div>";
}
require_once 'footer.php';
