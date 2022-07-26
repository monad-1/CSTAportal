<?php
session_start();
require_once('../codes/fetchuserdetails.php');
require_once('../includes/connect.php');
require("../mailer/PHPMailer/src/PHPMailer.php");
require("../mailer/PHPMailer/src/SMTP.php");
require("../mailer/PHPMailer/src/Exception.php");



// current date and time
date_default_timezone_set('Asia/Manila');
$date = date('y-m-d H:i:s');


use PHPMailer\PHPMailer\PHPMailer;


if (isset($_POST['accept_id'])) {
  $id = $_POST['accept_id'];
  $email = $_POST['email'];
  $sname = $_POST['sname'];

  $sql = "UPDATE students set isAccepted=? where id=?";
  $data = array('1', $id);
  $stmt = $con->prepare($sql);
  $stmt->execute($data);


  //insert notification
  $notif = "Welcome to CSTA Student Portal. You can now set up your profile here.";
  $icon = "fas fa-user text-white";
  $link = "profile.php";
  $color = "bg-success";


  $sql2 = "INSERT INTO notif (sid,notification,icon,color,link,date)VALUES(?,?,?,?,?,?)";
  $data2 = array($id, $notif, $icon, $color, $link, $date);
  $stmt2 = $con->prepare($sql2);
  $stmt2->execute($data2);


  ##email

  //Send Set Credentials to USER's email address
  $selector = bin2hex(random_bytes(8));
  $token = random_bytes(32);

  $url = "http://localhost/CSTAportal/student/set-password.php?selector=" . $selector . "&validator=" . bin2hex($token);
  $expires = date("U") + 86400; //1-Day Expiration

  try {
      $sql = "DELETE From pwdreset where pwdresetEmail = ?;";
      $data = array($email);
      $stmt = $con->prepare($sql);
      $stmt->execute($data);
  } catch (PDOException $e) {
      echo $e->getMessage();
  }

  $hashedToken = password_hash($token, PASSWORD_DEFAULT);

  try {
      $sql = "INSERT INTO pwdreset (pwdresetEmail,pwdresetSelector,pwdresetToken,pwdresetExpires) VALUES(?,?,?,?);";
      $data = array($email, $selector, $hashedToken, $expires);
      $stmt = $con->prepare($sql);
      $stmt->execute($data);
  } catch (PDOException $e) {
      echo $e->getMessage();
  }

  $mailTo = $email;

  $body = 
  "<pre style='font-family:times new roman;'>
  Dear ".$sname.",
      Welcome to CSTA Student Portal. We are pleased to informed you that your account
      registration is accepted. You can now set up your account credentials by clicking the link below. 
      <a href='".$url."'>".$url."</a>.
 
  Regards, 
  CSTA Student Portal
  
  </pre>";

  $mail = new PHPMailer();

  //$mail->SMTPDebug = 3;
  $mail->isSMTP();

  //SMTP user credentials
  include "../includes/smtp_config.php";

  $mail->setFrom($deptemail); // insert department email here
  $mail->FromName = $dept; // employee name + Department 
  $mail->addAddress($mailTo, $sname); // recipient
  $mail->SMTPOptions = array('ssl' => array(
    'verify_peer' => false,
    'verify_peer_name' => false,
    'allow_self_signed' => false
  ));
  $mail->isHTML(true);
  $mail->Subject = "Welcome to CSTA Student Portal"; // email subject
  $mail->Body = $body;

  // $mail->addAttachment(path: "$file", name: "Grades_{$lname}'.jpg'");

  //$mail->AltBody="";


  if (!$mail->send()) {
    echo "Email Not Sent: " . $mail->ErrorInfo;
  } else {

    //   $_SESSION['status'] = "Success!";
    //   $_SESSION['status_code'] = "success";
    //  $_SESSION['msg'] = "We have sent you an email.";
    //   header('location: registrations.php');
  }

  $mail->smtpClose();
}

if (isset($_POST['decline_id'])) {
  $sql = "DELETE FROM students where id=?";
  $data = array($_POST['decline_id']);
  $stmt = $con->prepare($sql);
  $stmt->execute($data);

  $con = null;
}
