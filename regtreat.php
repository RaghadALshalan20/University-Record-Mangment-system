<?php
require_once 'header.php';

if (isset($_POST['INSERT'])) {
	$name = $_POST['first-name'];
	$lname = $_POST['form-last-name'];
	$email = $_POST['form-email'];
	$phone = $_POST['form-phone'];
	$Address = $_POST['form-Address'];
	$Gander = $_POST['form-Gander'];
	$password = $_POST['form-password'];
	$passwordConf = $_POST['form-passwordConf'];
	$department = $_POST['department'];

	
	$image = $_FILES['image']['name'];
		$tmp_image = $_FILES['image']['tmp_name'];
		$dest = "upload/";
	$name .= " " . $lname;
	if ($passwordConf === $password) {

			if (!empty($image)) {
				$image = $dest . $image;
				move_uploaded_file($tmp_image,   $image);
			} 
		$query1 = "INSERT INTO students_info  ( `email`, `password`, `name`, `gender`, `department__id`, `mobile`, `home_address`, `image`)  
		VALUES ('$email','$password','$name','$Gander','$department','$phone','$Address','$image')";
		if (queryMysql($query1)) {


			die("<h4 class=\"mt-2\">succesfully registered check <a href=\"confirm.php\">Here</a> for Registration Status</h4>");
		} {
			die("error");
		}
	} else {
	}
}

if (isset($_POST['R-semester'])) {
	$date = $_POST['transaction-date'];
	$bank = $_POST['bank-name'];
	$teller = $_POST['teller-number'];
	$std_id = $_POST['std-id'];
	$semester = $_POST['form-semester'];
	$date1 = date('Y-m-d');
	$email=$_POST['std-email'];
	$amount=$_POST['amount'];
	$type = "registration charge";
	$query2 = "INSERT INTO payments Values('','$type','$teller','$date','$email','$amount','0','$bank')";
	if (queryMysql($query2) === true) {
		$sql = "SELECT id FROM payments WHERE id= LAST_INSERT_ID();";
		$result = mysqli_query($conn, $sql);
		$row = mysqli_fetch_array($result);
		$ID_pay = $row['id'];
		$sql = "INSERT INTO `register_student` ( `R_Student_id`, `R_cal_id`, `R_pay_id`, `Register_Date`,matric_no) VALUES ('$std_id', '$semester', '$ID_pay', '$date1','')";
		if (queryMysql($sql) === true)
			die("<h4 class=\"mt-2\">succesfully registered check <a href=\"confirm.php\">Here</a> for Registration Status</h4>");
	}
}
if (isset($_POST['UPDATE'])) {
	$ID = $_POST['FORM-ID'];
	$name = $_POST['first-name'];
	$email = $_POST['form-phone'];
	$phone = $_POST['form-email'];
	$Address = $_POST['form-Address'];
	$Gander = $_POST['form-Gander'];
	
	$old_image=$_POST['old-image'];
	$image = $_FILES['image']['name'];
	$tmp_image = $_FILES['image']['tmp_name'];
	$dest = "upload/";
	

		if (!empty($image)) {
			$image = $dest . $image;
			move_uploaded_file($tmp_image,   $image);
		} else {
			$image = $old_image;
		}
	$query1 = "UPDATE  `students_info` SET email='$email',name='$name', gender='$Gander',mobile='$phone', home_address='$Address',image='$image' where id=$ID ";
	if (queryMysql($query1)) {
		die("<h4 class=\"mt-2\">update succesfully   <a href=\"index.php\">Here</a> for Registration Status</h4>");
		
	}
}
