<?php

require_once "../includes/connect.php";
require("../mailer/PHPMailer/src/PHPMailer.php");
require("../mailer/PHPMailer/src/SMTP.php");
require("../mailer/PHPMailer/src/Exception.php");

use PHPMailer\PHPMailer\PHPMailer;




    $selector = bin2hex(random_bytes(8));
    $token = random_bytes(32);
    

  
    $expires = date("U") + 1800;
    // $isAdmin = $_POST['isAdminpw'];
    $userEmail =  htmlspecialchars(trim($_POST['email']));


    // if ($isAdmin == "") {
        //Check if user email is registered in students
        $sql = "SELECT email from vwemployees where email=?";
        $data = array($userEmail);
        $stmt = $con->prepare($sql);
        $stmt->execute($data);
        $checkemail = $stmt->rowCount();
        
        // $admin="no";
    // } else if($isAdmin = "admin") {

    //     //Check if user email is registered in students
    //     $sql = "SELECT email from vwemployees where email=?";
    //     $data = array($userEmail);
    //     $stmt = $con->prepare($sql);
    //     $stmt->execute($data);
    //     $checkemail = $stmt->rowCount();
    //     $admin="yes";
    // }
    $url = "http://localhost/CSTAportal/backoffice/create-new-password.php?selector=" . $selector . "&validator=" . bin2hex($token);

    // $url = "http://localhost/CSTAportal/student/create-new-password.php?selector=" . $selector . "&validator=" . bin2hex($token)."&ad=".$admin;

    if ($checkemail >= 1) {

        try {
            $sql = "DELETE From pwdreset where pwdresetEmail = ?;";
            $data = array($userEmail);
            $stmt = $con->prepare($sql);
            $stmt->execute($data);
        } catch (PDOException $e) {
            echo $e->getMessage();
        }

        $hashedToken = password_hash($token, PASSWORD_DEFAULT);

        try {
            $sql = "INSERT INTO pwdreset (pwdresetEmail,pwdresetSelector,pwdresetToken,pwdresetExpires) VALUES(?,?,?,?);";
            $data = array($userEmail, $selector, $hashedToken, $expires);
            $stmt = $con->prepare($sql);
            $stmt->execute($data);
        } catch (PDOException $e) {
            echo $e->getMessage();
        }

        $mailTo = $userEmail;
        $subject = "Password RESET";

        // $message  = '<p>We received a password reset request. The link to reset your password is below. If you did not make 
        // this request, you can ignore this email. </p>';
        // $message .= '<p>Here is your password reset link: <br><a href="' . $url . '">' . $url . '</a>  </p>';

        $message =
        '<pre style="font-family:times new roman;">
        Hello Teresian,  
                We received a password reset request. The link to reset your password is below. If you did not make 
                this request, you can ignore this email. Here is your password reset link: <a href="' . $url . '">' . $url . '</a>
 
        Regards, 
        CSTA Student Portal
  
        </pre>';





        $headers = "From: Sender\r\n";
        $headers .= "Reply-To: Sender\r\n";
        $headers .= "Content-type: text/html\r\n";

        $mail = new PHPMailer();

        $mail->SMTPDebug = 3;
        $mail->isSMTP();

        //SMTP user credentials
        include '../includes/smtp_config.php';

        //$mail->setFrom("CSTA@sampleemail.com"); // insert department email here
        $mail->FromName = "CSTA Student Portal"; // employee name + Department 
        $mail->addAddress($mailTo); // recipient
        $mail->SMTPOptions = array('ssl' => array(
            'verify_peer' => false,
            'verify_peer_name' => false,
            'allow_self_signed' => false
        ));
        $mail->isHTML(true);
        $mail->Subject = "Password RESET"; // email subject
        $mail->Body = $message;

        if (!$mail->send()) {
            echo "Email Not Sent: " . $mail->ErrorInfo;
        } else {

            // $_SESSION['status'] = "Registration Success!";
            // $_SESSION['status_code'] = "success";
            header('location:../login.php?reset=success');
        }

        $mail->smtpClose();
    } else {
        header('location:../login.php?reset=notfound');
    }

