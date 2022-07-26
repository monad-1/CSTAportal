<?php
// session_start();
require_once('../includes/connect.php');
require_once('../includes/functions.php');
require_once('../codes/fetchuserdetails.php'); //get snum value from userdetails(students accounts)
require_once('../codes/fetchcurrentsyandsem.php');


// current date and time
date_default_timezone_set('Asia/Manila');
$date = date('y-m-d h:i:s');


if (isset($_POST['enroll_id'])){
    $filename=$_POST['filename'];
    $sql = "DELETE FROM enrollment where enrollment_ID=?";
    $data = array($_POST['enroll_id']);
    $stmt = $con->prepare($sql);
    $stmt->execute($data);

   

    unlink("../uploads/copygrades/$filename");


}

if (isset($_POST['enroll_valid_id'])){
    $receipt=$_POST['receipt'];
    $assessment=$_POST['assessment'];

    $sql = "DELETE FROM enrollment_validation where ev_ID=?";
    $data = array($_POST['enroll_valid_id']);
    $stmt = $con->prepare($sql);
    $stmt->execute($data);


    unlink("../uploads/enroll_val/enroll_receipt/$receipt");
    unlink("../uploads/enroll_val/enroll_assess/$assessment");

}
