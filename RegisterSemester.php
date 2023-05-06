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
department.name As DepName 
FROM
students_info
INNER JOIN department ON students_info.department__id = department.dept_id where students_info.id=$ID";

$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_array($result)) {
        $dept = $row['department__id'];
        $mat = $row['DepName'];
        $approved = $row['approved'];
        $level = 100;
        $fname = strtoupper($row['StdName']);
        $email=$row['email'];
    }
}


?>
<div class="container">
    <div class="row">
        <div class="col-3"></div>
        <div class="col-6 card-index ">
            <div class="page-header">
                <h1 style=" 0   auto    0   auto;margin:1rem 5px 2rem 5px">Change details for $name</h1>
                <hr>

            </div>
            <form action="regtreat.php" enctype="multipart/form-data" method="post" class="form">
            <input type="hidden" value="<?php echo $ID  ?>" name="std-id">
            <input type="hidden" value="<?php echo $email ?>" name="std-email">
                <label for="course-code" class="label-style">Student name</label>
               
                <input disabled type="text" placeholder="Update course code..." value="<?php echo $fname ?>" name="code" required><br>
                <br>

                <label class="label-style"  for="email">semester</label>
                <select name="form-semester" class="">
                    <option value="">select semester</option>
                    <?php
                    $sql = "SELECT
            calendar.cal_id,
            semester_session.semester_Name,
            calendar.`starts`,
            calendar.`ends` 
        FROM
            semester_session
            INNER JOIN calendar ON semester_session.id = calendar.semester_ID where DATE_FORMAT(calendar.`starts`, '%Y')=DATE_FORMAT( SYSDATE(), '%Y' )";
                    $result = mysqli_query($conn, $sql);
                    if (mysqli_num_rows($result) === 0) {
                        "<div class=\"container mt-4\">
      <h2> record not found, click here to <br> <a href=\"register.php\">Register</a></h2>
    </div>";
                    } else {

                        while ($row = mysqli_fetch_array($result)) {
                            echo '<option value=" ' . $row[0] . '">' . $row[1] . " star date " . $row[2] . '</option>';
                        }
                    } ?>


                </select>

                <div class="form-top">
                    <div class="title-style">

                        <p>enter registration payment details:</p>
                    </div>

                </div>
                <label class="label-style" for="transaction-date">transaction date</label>
                <input type="date" name="transaction-date" placeholder="date on teller" class="form-first-name form-control" id="transaction-date" required>
                <br>
                <label class="label-style" for="teller-number">Teller Number</label>
                <input type="text" name="teller-number" placeholder="teller-number" class="form-last-name form-control" id="teller-number" required>
                <br>
                <label class="label-style" for="bank-name">Bank name</label>
                <input type="text" name="bank-name" placeholder="bank name..." class="form-last-name form-control" id="bank-name" required>
                <br>
                <label class="label-style" for="Amount">Amount paid</label>
                <input type="text" name="amount" placeholder="amount paid..." class="form-last-name form-control" id="form-last-name" required>
                <br>

                <button class="btn " name="R-semester">Update Course &raquo;</button>
        </div>
    </div>
    <div class="row">
        <div class="col-2"></div>
    </div>
</div>
<?php require_once 'footer.php'; ?>