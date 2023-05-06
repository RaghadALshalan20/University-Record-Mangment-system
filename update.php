<?php // Example 26-4: index.php
require_once 'header.php';
if (!$loggedin)  header('location:index.php');

$ID = $_SESSION['ID'];
$sql = "SELECT
students_info.id,
students_info.email,
students_info.password,
students_info.name As StdName,
students_info.gender,
students_info.mobile,
students_info.home_address,
students_info.payment_verified,
students_info.blocked,
students_info.image,
department.name As DepName 
FROM
students_info
INNER JOIN department ON students_info.department__id = department.dept_id where students_info.id=$ID";

$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) === 0) {
  die("<div class=\"container mt-4\">
      <h2> record not found, click here to <br> <a href=\"register.php\">Register</a></h2>
    </div>");
} else {

  while ($row = mysqli_fetch_array($result)) {

    $approved = strtoupper($row['image']);
    $mat = $row['DepName'];
    $ID = $row['id'];
    $email = $row['email'];
    $Address = $row['home_address'];
    $gender = $row['gender'];
    $password = $row['password'];
    $image=$row['image'];
    if (!$row['blocked']) die("you have been blocked");
    $fname = strtoupper($row['StdName']);
    $phone = $row['mobile'];
    //check if registration is complete

    $mobile = strtoupper($row['mobile']);
  }
}
?>


  <div class="container">
  <?php require_once 'sidebar.php'; ?>
    <div class="row">
     
<div class="col-2"></div>
      <main role="main" class="col-7">
        <?php if($image !="") { ?>
<img src="<?php  echo $image ?>" class="size-image" alt="">
<?php }?>
        <div class="table-responsive">
          <table class="table table-striped">
            <form action="regtreat.php" enctype="multipart/form-data" method="POST">
              <div class="title-style" style="color: rgb(83, 53, 3);">
                <h1>Update Registration</h1>
                <h2>Details</h2>
              </div>
              <thead>
                <tr>
                  <th>field</th>
                  <th>Details</th>
                </tr>
              </thead>
              <tbody>

                <tr>
                  <td>Full Names</td>
                  <td>
                    <h4><input type="hidden" name="FORM-ID" placeholder="enter your mobile line" value="<?php echo $ID; ?>" required></h4>

                    <h4><input type="text" name="first-name" placeholder="enter your mobile line" value="<?php echo $fname; ?>" class="form-group" required></h4>
                  </td>

                </tr>
                <tr>
                  <td>email</td>
                  <td>
                    <h4><input type="email" name="form-email" placeholder="enter your email " value="<?php echo $email; ?>" class="form-group" required></h4>
                  </td>

                </tr>

                <tr>
                  <td>Phone number</td>
                  <td class="bg-dark"><input type="text" name="form-phone" value="<?php echo $phone; ?>" placeholder="enter your mobile line" class="form-group" required></td>

                </tr>
                <tr>
                  <td>Gender:</td>
                  <td>
                    <select name="form-Gander" class="form-group">
                      <option value="<?php echo $gender; ?>"><?php echo $gender; ?></option>
                      <option value="male">Male</option>
                      <option value="female">Female</option>

                    </select>
                  </td>

                </tr>

                <tr>
                  <td>Department</td>
                  <td>
                    <h4><?php echo $mat; ?></h4>
                  </td>

                </tr>
                <tr>
                  <td>Program Type:</td>
                  <td>
                    <select name="program">
                      <option value="HND">HND</option>
                      <option value="ND">ND</option>

                    </select>
                  </td>

                </tr>
                <tr>
                  <td>Date of Birth:</td>
                  <td class="bg-dark"><input type="date" name="dob" class="form-group"></td>

                </tr>
                <tr>
                  <td>Address</td>
                  <td><input type="text" name="form-Address" value=" <?php echo ($Address) ? $Address : ""; ?> " class="form-group"></td>

                </tr>
                <tr>
                  <td>password</td>
                  <td><input type="password" name="form-password" value=" <?php echo ($password) ? $password : ""; ?> " class="form-group"></td>

                </tr>
                <tr>
                  <td>confirm password</td>
                  <td><input type="password" name="form-passwordConf" value=" <?php echo ($password) ? $password : ""; ?> " class="form-group"></td>

                </tr>
                <tr>
                  <td>upload image</td>
                  <input type="hidden" name="old-image" value=" <?php echo $image ?> " class="form-group"></td>

                  <td><input type="file" name="image"  class="form-group"></td>

                </tr>
                <tr>
                  <td colspan="2"><button type="submit" name="UPDATE" class="btn btn-success">Submit</button></td>
                </tr>

              </tbody>
          </table>
          </form>
        </div>

      </main>
      <div class="col-2"></div>
</div>
    <?php
  
   require_once 'footer.php';
    ?>