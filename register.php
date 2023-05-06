<?php
require_once 'header.php';
?>
<div class="container mt-4">
	<div class="row">
		<div class="col-7 text-center ">
			<div style="margin:5rem 1rem ;">
				<h1><strong><?php echo $appname; ?></strong><br>Registration Form</h1>
				<div class="description">
					<p>Apply for the course of your choice here and click on restration status a while later to find out if you have been admitted.

					</p>
				</div>
			</div>
		</div>
		<div class="col-5 form-box ">
			<fieldset class=" background-dark">
				<div class="form-top">
					<div class="title-style">
						<h3>Register Now</h3>
						<p>Fill in your particulars in the form below:</p>
					</div>
				</div>

				<form role="form" action="regtreat.php" enctype="multipart/form-data"  method="post" class="registration-form">

					<label class="label-style" for="form-first-name">First name</label>
					<input type="text" name="first-name" placeholder="First name..." class="form-first-name form-control" id="form-first-name" required>
					<br>
					<label class="label-style" for="form-last-name">Last name</label>
					<input type="text" name="form-last-name" placeholder="Last name..." class="form-last-name form-control" id="form-last-name" required>
					<br>
					<label class="label-style" for="form-email">Email</label>
					<input type="email" name="form-email" placeholder="Email..." id="form-email" required>
					<br>
					<label class="label-style" for="form-phone">Phone</label>
					<input type="tel" name="form-phone" placeholder="Phone..." id="form-phone" required>
					<br>
					<label class="label-style" for="form-Address">Address</label>
					<input type="tel" name="form-Address" placeholder="Address..." id="form-Address" required>
					<br>
					<label class="label-style" for="form-password"> password</label>
					<input type="password" name="form-password" placeholder="password..." id="form-password" required>
					<br>
					<label class="label-style" for="form-passwordConf">confirm password</label>
					<input type="password" name="form-passwordConf" placeholder="confirm password..." id="form-passwordConf" required>

					<br>
					<label class="label-style" for="form-password">Gander</label>
					<select name="form-Gander" class="form-group">
						<option value="male">Male</option>
						<option value="female">Female</option>

					</select>
					<br>
					<label class="label-style">Select Department</label>
					<?php getdepartment(); ?>
					<br>
					
					<label class="label-style" for="form-passwordConf">uplode image</label>
					<input type="file" name="image" placeholder="confirm password..." id="form-image" >

					<br>
					<br>
					<br>

					<button type="submit" name="INSERT" class="btn-style">Register</button>
				</form>
			</fieldset>
		</div>
	</div>
</div>

<?php
require_once 'footer.php';
?>