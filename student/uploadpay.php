<?php
// session_start();
require_once('includes/connect.php');
require_once('codes/fetchuserdetails.php');
require_once('codes/fetchstudenttable.php');
require_once('includes/functions.php');



if (isset($_POST['sendpay'])) {
    $paynum = $_POST['paynumsearch'];


    if ($_POST['selsy'] == "") {
        $pay_sy = '-';
    } else {
        $pay_sy = $_POST['selsy'];
    }

    if ($_POST['selsem'] == "") {
        $pay_sem = 1;
    } else {
        $pay_sem = $_POST['selsem'];
    }

    if ($_POST['selterm'] == "") {
        $payterm = 1;
    } else {
        $payterm = $_POST['selterm'];
    }

    // current date and time
    date_default_timezone_set('Asia/Manila');
    $date = date('y-m-d h:i:s');

    $tfeeamount = htmlspecialchars(trim($_POST['tfeeamount']));
    $total_others = $_POST['totalothers'];
    $amountdue = $_POST['totaldue'];
    $amtpaid = htmlspecialchars(trim($_POST['amtpaid']));;
    $sentthru = $_POST['sentthru'];
    $paymethod = $_POST['paymethod'];
    $dop = $_POST['DoP'];
    $top = $_POST['ToP'];
    $notes = $_POST['note'];

    if ($_POST['otherpart'] == "") {
        $particulars = "-";
    } else {

        $particulars = ucwords($_POST['otherpart']);
    }


    //insert new payment
    if ($paynum == "") {
        try {
            //Generate Tracking number key
            $random = (time() + rand(1, 4294967295));

            $sql = "INSERT INTO paymentverif (sid,paynum,date_of_payment,time_of_payment,schoolyr,semester_ID,terms_ID,tfeeamount,particulars,particulars_total,sentvia_ID,paymethod_ID,note,gtotal,amtpaid,date_sent) VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
            $data = array($sid, $random, $dop, $top, $pay_sy, $pay_sem, $payterm, $tfeeamount, $particulars, $total_others, $sentthru, $paymethod, $notes, $amountdue, $amtpaid, $date);
            $stmt = $con->prepare($sql);
            $stmt->execute($data);
            $newname = $con->lastInsertId();

            if ($_FILES['paymentproof']['name'] != "" || $_FILES['reqform']['name'] != "") {
                $msg = uploadpayment($_FILES['paymentproof'], $newname);
                $msg2 = uploadreqform($_FILES['reqform'], $newname);

                $sql = "UPDATE paymentverif set payproof=?, reqform=? where pv_ID=?";
                $data = array($msg, $msg2, $con->lastInsertId());
                $stmt = $con->prepare($sql);
                $stmt->execute($data);
            } else {
                $msg = "";
                $msg2 = "";
            }
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
        $_SESSION['status'] = "Success!";
        $_SESSION['msg'] = "Payment Sent!";
        $_SESSION['status_code'] = "success";
        header('location:payverif.php');




        //update payment
    } else {
        $sql1 = "SELECT pv_ID from paymentverif where paynum=?";
        $data1 = array($paynum);
        $stmt1 = $con->prepare($sql1);
        $stmt1->execute($data1);
        $row1 = $stmt1->fetch();
        $id = $row1['pv_ID'];


        try {

            $sql = "UPDATE paymentverif SET sid=?,date_of_payment=?,time_of_payment=?,schoolyr=?,semester_ID=?,terms_ID=?,tfeeamount=?,particulars=?,particulars_total=?,sentvia_ID=?,paymethod_ID=?,note=?,gtotal=?,amtpaid=?,date_sent=? WHERE paynum=?";
            $data = array($sid, $dop, $top, $pay_sy, $pay_sem, $payterm, $tfeeamount, $particulars, $total_others, $sentthru, $paymethod, $notes, $amountdue, $amtpaid, $date, $paynum);
            $stmt = $con->prepare($sql);
            $stmt->execute($data);
             $newname = $id;

            if ($_FILES['paymentproof']['name'] != "" || $_FILES['reqform']['name'] != "") {
                $msg = uploadpayment($_FILES['paymentproof'], $newname);
                $msg2 = uploadreqform($_FILES['reqform'], $newname);

                $sql = "UPDATE paymentverif set payproof=?, reqform=? where paynum=?";
                $data = array($msg, $msg2, $paynum);
                $stmt = $con->prepare($sql);
                $stmt->execute($data);
            } else {
                $msg = "";
                $msg2 = "";
            }
        } catch (PDOException $e) {
            echo $e->getMessage();
        }

        $_SESSION['status'] = "Success!";
        $_SESSION['msg'] = "Payment Details Updated!";
        $_SESSION['status_code'] = "success";
        header('location:payverif.php');
    }
}
