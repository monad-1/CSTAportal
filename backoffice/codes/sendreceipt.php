<?php
session_start();
require('../includes/connect.php');
require 'fetchuserdetails.php';
// require_once '/student/includes/functions.php';
require("../mailer/PHPMailer/src/PHPMailer.php");
require("../mailer/PHPMailer/src/SMTP.php");
require("../mailer/PHPMailer/src/Exception.php");

use PHPMailer\PHPMailer\PHPMailer;

if (isset($_POST['sendreceipt'])) {

    date_default_timezone_set('Asia/Manila');
    $date = date('y-m-d h:i:s');


    try {


        if ($_POST['OrNum'] == "") {
            $OR = "NA";
        } else {
            $OR = htmlspecialchars(trim($_POST['OrNum']));
        }


        if ($_POST['ArNum'] == "") {
            $AR = "NA";
        } else {

            $AR = htmlspecialchars(trim($_POST['ArNum']));
        }


        $pv_ID = $_POST['pv_ID'];


        $remarks = htmlspecialchars(trim($_POST['Remarks']));
        $email = $_POST['txtemail'];
        $name = $_POST['txtname'];


        //update payment status
        $sql = "Update paymentverif set payment_status=?, OR_num=?, AR_num=?, remarks=?, date_completed=? where pv_ID=? ";
        $data = array('Verified', $OR, $AR, $remarks, $date, $pv_ID);
        $stmt = $con->prepare($sql);
        $stmt->execute($data);

        //insert notification
        $notif = "Your official receipt is sent to your email.";
        $icon = "fas fa-receipt text-white";
        $link = "enrollment.php";
        $color = "bg-success";

        // $sql2 = "INSERT INTO notif (sid,notification,icon,color,link,date)VALUES(?,?,?,?,?,?)";
        // $data2 = array($sid, $notif, $icon, $color, $link, $date);
        // $stmt2 = $con->prepare($sql2);
        // $stmt2->execute($data2);


        $mailTo = $email;

        $body = "Hi Ma'am/Sir,<br><br>

        Please see attached advance copy of Official Receipt for your reference.<br><br>
        
        You may get the Original Copy at CSTA Cashier Monday to Friday 9am-4pm. <br><br>
        
        Thank You & Keep Safe.<br><br>
        
    
        ";

            $body =
            "<pre style='font-family:times new roman;'>
            Hello Teresian!  
                Here's a copy of the <b>assessment form</b>. Minimum down payment is Php. 3,000.00.
                Payments can be made thru Bank Deposit or Online Bank Transfer. Kindly send your proof of payment together with your assessment form to 
                <a href='https://cstaportaltest.online/payverif.php'>https://cstaportaltest.online/payverif.php</a> for
                verification and Official Receipt purposes.
            
            
            Regards, 
            CSTA Student Portal
            </pre>";



        $mail = new PHPMailer();

        // $mail->SMTPDebug = 3;
        $mail->isSMTP();

        //SMTP user credentials
        include "../includes/smtp_config.php";

        $mail->setFrom($deptemail); // insert department email here
        $mail->FromName = "CSTA Accounting"; // employee name + Department 
        $mail->addAddress($mailTo, $name); // recipient
        $mail->SMTPOptions = array('ssl' => array(
            'verify_peer' => false,
            'verify_peer_name' => false,
            'allow_self_signed' => false
        ));
        $mail->isHTML(true);
        $mail->Subject = "Receipt"; // email subject
        $mail->Body = $body;


        //attachments
        foreach ($_FILES["OReceipt"]["name"] as $k => $v) {
            $mail->AddAttachment($_FILES["OReceipt"]["tmp_name"][$k], $_FILES["OReceipt"]["name"][$k]);
        }

        if (!$mail->send()) {
            // echo "<Email Not Sent: " . $mail->ErrorInfo;
            $_SESSION['status'] = "Error!";
            $_SESSION['msg'] = "Receipt notSent!";
            $_SESSION['status_code'] = "error";
            header('location:../for-receipt-issuance.php');
        } else {

            $_SESSION['status'] = "Success!";
            $_SESSION['msg'] = "Receipt Sent!";
            $_SESSION['status_code'] = "success";
            header('location:../for-receipt-issuance.php');
        }
        $mail->smtpClose();
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
}

//assign snum
if (isset($_POST['assignsnum'])){
    $snum_sid=$_POST['snum_sid'];
    $ass_snum=$_POST['ass_snum'];

    $sql = "Update students set snum=? where id=? ";
    $data = array($ass_snum,$snum_sid);
    $stmt = $con->prepare($sql);
    $stmt->execute($data);



}