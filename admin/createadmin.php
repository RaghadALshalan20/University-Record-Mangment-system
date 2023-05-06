<?php
//session_destroy();
require_once 'header.php';
if (!($priviledge)) {
    header('Location: ../index.php');
}




if (isset($_POST['email'])) {

    $email = sanitizeString($_POST['email']);
    $name = sanitizeString($_POST['name']);
    $password = $_POST['password'];
    $telephone = sanitizeString($_POST['telephone']);
    $joined = sanitizeString($_POST['department']);





    if (queryMysql("INSERT INTO admin VALUES('','$name','$email','$telephone','$password','$joined')")) {
        Session::flash('success', 'user has been added succesfully');
        header('Location: dashboard.php');
?>
        <script>
            alert('successfully registered ');
        </script>
    <?php
    } else {
    ?>
        <script>
            alert('error while registering new user..');
        </script>
<?php
    }
}
?>






<div class="container-fluid">

    <hr>
    <center>
        <div class="row">
            <div class="col-3"></div>
            <div class="col-6 card-index ">
                <form action="" method="post" class="form">
                    <fieldset>
                        <div id="look"></div>
                        <legend>Create user account</legend>

                        <label class="label-style" for="email">Email</label>
                        <input type="email" placeholder="user email...." name="email" class="form-control"><br>


                        <label class="label-style" for="password">Password</label>
                        <input type="password" placeholder="password" name="password" class="form-control">

                        <br>
                        <label class="label-style" for="name">Name</label>
                        <input type="text" placeholder="name" name="name" class="form-control"><br>

                        <label class="label-style" for="telephone">Telephone</label>
                        <input type="text" placeholder="Telephone" name="telephone" class="form-control"><br>

                        <br>
                        <label class="label-style" for="role">Department</label>
                        <?php getdepartment(); ?>


                        <div class="clearfix"></div>
                        <button class="btn btn-primary btn-lg">Create User &raquo;</button>
                    </fieldset>

                </form>
            </div>
            <div class="col-3"></div>

    </center>


</div>
</div>

</div>
</div>
<?php require_once 'footer.php';
?>