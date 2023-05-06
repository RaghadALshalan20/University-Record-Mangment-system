<?php // Example 26-4: index.php
require_once 'header.php';
if (!$loggedin)  header('location:index.php');
$user = $_SESSION['pass'];
$matricno = $_SESSION['user'];
$dept = "";
$mat = "";
$approved = "";
$level = "";
$fname = "";


$ID_r="";
$ID = $_SESSION['ID'];
$sql = "SELECT
students_info.id,
students_info.email,
students_info.password,
students_info.name As StdName,
students_info.gender,
students_info.mobile,
students_info.department__id,
students_info.home_address,
students_info.approved,
students_info.blocked,
students_info.image,
department.name As DepName ,
register_student.Register_id
FROM
register_student
INNER JOIN students_info ON register_student.R_Student_id=students_info.id 
INNER JOIN calendar  ON register_student.R_cal_id = calendar.cal_id 
INNER JOIN department ON students_info.department__id = department.dept_id 
where  students_info.id='$ID' And DATE_FORMAT(calendar.`starts`, '%Y')=DATE_FORMAT( SYSDATE(), '%Y' ) ";

$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0) {
	while ($row = mysqli_fetch_array($result)) {
		$dept = $row['department__id'];
		$mat = $row['DepName'];
		$approved = $row['approved'];
		$ID_r=$row['Register_id'];
		$level = 100;
		$fname = strtoupper($row['StdName']);
		$image=$row['image'];
		
	}
}


?>
<div class="container">
	<div class="row">
		<main role="main" class="col-9" style="margin: auto ;">


			<section class="row text-center ">
				<div class="col-3"></div>
				<div class="col-6 card-index ">
					<div class="title-style" style="color:#533503">
						<h1>Course Registration</h1>
					</div>
					<?php if($image !=""){?>
						<img src="<?php  echo $image ?>" class="size-image" alt=""><?php }?>

					<form action="" method="POST" enctype='multipart/form-data'>



						<div class="card-Welcom">
							<p><b>Name:</b><?php echo $fname; ?></p>
							<p><b>Department:</b><?php echo $mat .$ID_r; ?></p>
						</div>

				


						<table class="">
							<thead>
								<th>s/n</th>
								<th>Course code</th>
								<th>Course Title</th>
								<th>Credit</th>

							</thead>
							<tbody>
								<?php
								$result = "SELECT * FROM courses WHERE department_id ='$dept'";
								$courses = queryMysql($result);
								if ($courses->num_rows) {
									$total = $courses->num_rows;
									$rwo = $courses->fetch_array(MYSQLI_ASSOC);

									$i = 0;
									do {
										if ($i == $total) {
											break;
										}
										$reg[$i] = $rwo['course'];
										$sn = $i + 1;
										echo "<tr>";
										echo '<td><input type="checkbox" name="course' . $i . '"  value="' . $rwo['id'] . '"class="form-control"></td>';
										echo '<td>' . $rwo['course'] . '</td>';
										echo '<td>' . $rwo['course_name'] . '</td>';
										echo '<td>' . $rwo['credit'] . '</td>';



										echo "</tr>";
										$i++;
									} while (($rwo = $courses->fetch_array()) && ($i < $total));
								}



								?>

							</tbody>
						</table>
						<button type="submit" name="insert" class="btn btn-sm btn-success">Course Registration</button>
					</form>
					<?php
					if (isset($_POST['insert'])) {

						$result = "SELECT * FROM courses WHERE department_id ='$dept'";
						$courses = queryMysql($result);
						if ($courses->num_rows) {
							$total = $courses->num_rows;
							$i = 0;
							$rwo = $courses->fetch_array(MYSQLI_ASSOC);

							do {
								if ($i === $total) {
									header("Location:index.php?mes=");

									break;
								}
								$name1 = 'course' . $i;
								if (isset($_POST[$name1])) {
									$ID = $_POST[$name1];
									$IDStudent = $ID_r;
									$course = $rwo['course'];
									queryMysql("INSERT INTO course_reg (course_code, test, exams, course_ID, C_reg_stud_id)VALUES ('$course','','','$ID','$IDStudent')");
								}
								$i++;
							} while (($rwo = $courses->fetch_array()) && ($i < $total));
						}
					}


					?>

				</div>
	</div>
	<div class="col-2"></div>
	</section>
</div>

</div>
</main>
</div>
<?php require_once 'footer.php'; ?>