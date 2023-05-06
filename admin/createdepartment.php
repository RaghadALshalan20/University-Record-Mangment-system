<script>
    function message() {
        window.alert("INSERT DONE SUCCESSFULLY");
    }

    function messageFAILED() {
        window.alert("INSERT FAILED");
    }
</script>
<?php
//session_destroy();
require_once 'header.php';
if (!($priviledge)) {
    header('Location: ../index.php');
}




if (isset($_POST['department'])) {

    $joined = sanitizeString($_POST['department']);

    if (queryMysql("INSERT INTO department VALUES('','$joined','')")) {
        echo '<script>message();</script>';
    } else {
        echo '<script>messageFAILED();</script>';
    }
}
?>






<div class="container">

    <div class="row">
        <div class="col-4"></div>
        <div class="col-4 card-index">
            <form action="" method="post" class="form">
                <fieldset>
                    <div id="look"></div>
                    <legend>Create Department</legend>




                    <br>

                    <label class="label-style" for="name">Name</label>
                    <input type="text" placeholder="Department Name...." name="name" class=""><br>


                    <div class="clearfix"></div>
                    <button class="btn btn-primary btn-lg">Create Department &raquo;</button>
                </fieldset>
            </form>
        </div>
        <div class="col-4"></div>
    </div>



</div>
</center>
</div>

</div>
</div>
<?php require_once 'footer.php';
?>