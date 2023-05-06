<?php
require_once 'header.php';

if(isset($_POST['customer']))
{
  $idR="";
  $tel = sanitizeString($_POST['customer']);
  $sql="SELECT  students_info.id as idST,  students_info.email as mail,
  students_info.department__id,
  payments.id,
  payments.name  as charges,
  payments.teller_no as teller,
  payments.date as dat,
  payments.amount as charge,
  payments.approved 
  FROM
  students_info
  INNER JOIN register_student ON students_info.id = register_student.R_Student_id
  INNER JOIN payments  ON register_student.R_pay_id = payments.id WHERE students_info.email ='$tel'" ;
  $result = queryMySQL($sql);

  if ($result->num_rows == 0)
  {
    die("<div class=\"container mt-4\">
      <h2> record not found, click here to <br> <a href=\"register.php\">Register</a></h2>
    </div>");
  }
  else
  {
    while ($row = mysqli_fetch_array($result)) {
    $approved =strtoupper($row['approved']);

    $id=$row['idST'];
    $idD=$row['department__id'];
    $R_Student_id=$row['idST'];
    $sql = "SELECT * FROM register_student WHERE R_Student_id='$R_Student_id' and matric_no=''";
          $result = queryMysql($sql);
          if ($result->num_rows !== 0){
          $rowR = $result->fetch_array(MYSQLI_ASSOC);
          $idR=$rowR['Register_id'];
          $sql = " SELECT * FROM `department` WHERE dept_id='$idD' ";
          $result = queryMysql($sql);
          $rowD = $result->fetch_array(MYSQLI_ASSOC);
        
          $mat=$rowD['name'];} else{
            die("<div class=\"container mt-4\">
            <h2> record not found, click here to <br> <a href=\"register.php\">Register</a></h2>
          </div>");
          }
          
    ($id > 10)?$id ="00".$id:$id="000".$id;
    }
    if ($approved){
      $matricno=date('Y')."/".strtoupper(substr($mat, 0,3))."/".$id;
      $query="UPDATE register_student SET matric_no='$matricno' WHERE Register_id='$idR'";
      queryMySQL($query);

    /*die("<body onload=\"document.forms['account'].submit()\">
    <form action=\"printed.php\" id=\"regform\" name=\"account\" method=\"POST\">
        <input type=\"hidden\" name=\"customer\" value=\"$tel\">
      </form></body>");*/
      die("<div class=\"container mt-4\"> you have been assigned <strong>$matricno</strong>&nbsp;as your matric number<br>
      <h2> Proceed to <br> <a href=\"login1.php\">Here  </a> to complete your registation.</h2>
    </div>");
    } else
    {
        die("<div class=\"container mt-4\"><h4>payment is under processing<br> check back in a little while</h4></div>");
      }

}
}