<?php // Example 26-4: index.php
require_once 'header.php';
if (!$loggedin)  header('location:index.php');
$user = $_SESSION['pass'];
$matricno = $_SESSION['user'];
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
if (mysqli_num_rows($result) > 0) {
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
    if (!$row['blocked']) die("you have been blocked");
    $fname = strtoupper($row['fullname']);
    $reg = ($row['mobile']) ? true : false;
    //check if registration is complete

    $mobile = strtoupper($row['telephone']);
  }





?>
  <div class="container">
    <div class="row">
      <nav class="col-2 Dashboard-nav">
        <ul class="menu">
          <li class="nav-item">
            <a class="nav-link active" href="dashboard.php">Overview <span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="">Complete/update registration</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="coursereg.php">Register Courses</a>
          </li>

        </ul>


      </nav>
      <main role="main" class="col-9">


        <section class="row text-center placeholders">
          <div class="col-3"></div>
          <div class="col-6 card-index">
            <h1>Dashboard</h1>
            <?php
            $image = "images/$user.jpg";
            if (file_exists($image)) {

            ?>
              <img src="<?php echo $image; ?>" width="200" height="200" class="img-fluid rounded-circle" alt="Generic placeholder thumbnail">
              <h4><?php echo $matricno; ?></h4>
            <?php } else {
              echo "<div class=\"dash\"><i class=\"fa fa-user\" width=\"200\"></i></div>";

              echo "<h4>" .  $matricno; ?></h4>
              <div class="text-muted">Upload your image</div>
              <form action="upload.php" method="POST" enctype='multipart/form-data'>

                <label class="label-style" for="Amount">Upload picture</label>
                <input type="file" name="image" class="form-last-name form-control" id="form-last-name" required>


                <button type="submit" class="btn btn-sm btn-success">submit</button>
              </form>

            <?php } ?>




            <h2>Details</h2>
            <div class="table-responsive">
              <table class="table table-striped">

                <tbody>
                  <tr>
                    <td>Full Names:</td>
                    <td>
                      <h4><?php echo $fname; ?></h4>
                    </td>

                  </tr>

                  <tr>
                    <td>Department</td>
                    <td>
                      <h4><?php echo $mat; ?></h4>
                    </td>

                  </tr>
                  <tr>
                    <td>Level: </td>
                    <td>ND 1</td>

                  </tr>
                  <tr>
                    <td>Next of Kin</td>
                    <td>
                      <h4><?php echo $parents; ?></h4>
                    </td>

                  </tr>
                  <tr>
                    <td>Next of Kin phone- number</td>
                    <td>
                      <h4><?php echo $pphone; ?></h4>
                    </td>
                  </tr>

                </tbody>
              </table>
            </div>
          </div>
          <div class="col-2"></div>
        </section>
      </main>
    </div>
  </div>
  </div>
<?php
}
require_once 'footer.php';
?>