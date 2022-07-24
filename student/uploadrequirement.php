<?php
require_once('includes/connect.php');
require_once('includes/fetchuserdetails.php'); //get snum value from userdetails(students accounts)
require_once('includes/fetchcurrentsyandsem.php');
date_default_timezone_set("Etc/GMT-8");
if (isset($_POST['uploadReq'])) {

    $document = $_POST['selDocument'];
    $date=date("m-d-y");

    $sqlquery1 = "select * from requirements where req_ID=? ";
    $info1 = array($document);
    $statement1 = $con->prepare($sqlquery1);
    $statement1->execute($info1);
    $fetch1 = $statement1->fetch();
    $reqname = $fetch1['reqname'];
    


    $sqlquery = "select * from vwsubmittedreq where id=? and reqname=?";
    $info = array($sid, $reqname);
    $statement = $con->prepare($sqlquery);
    $statement->execute($info);
    $rc = $statement->rowCount(); //counter


    if ($rc == 0) { //if none, upload file and insert data 
        try {
            $sql = "INSERT INTO studreq (sid,req_ID,date_submitted)VALUES(?,?,?)";
            $data = array($sid, $document,$date);
            $stmt = $con->prepare($sql);
            $stmt->execute($data);
            $newname=$con->lastInsertId();


            function upload($fname, $newname)
            {
                $upload_directory = 'uploads/requirements/';
                if (is_uploaded_file($fname['tmp_name'])) {
                    $filname = basename($fname['name']);
                    $tmp = explode('.', $fname['name']);
                    $uploadfile = $upload_directory . $newname . "." . end($tmp);

                    if (move_uploaded_file($fname['tmp_name'], $uploadfile)) {

                        $_SESSION['status'] = "Requirement Uploaded!";
                        $_SESSION['status_code'] = "success";
                        header('location:requirements.php');
                    } else {
                        $_SESSION['status'] = "Requirement Upload Failed!";
                        $_SESSION['status_code'] = "error";
                        header('location:requirements.php');
                    }
                }
            }
           
            if ($_FILES['requirement']['name'] != "") {
                $msg = upload($_FILES['requirement'], $newname);
            }
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    } else if ($rc >= 1) {
        try {
            $sql = "UPDATE studreq set req_ID= ?, date_submitted=? where sid=? and req_ID=? ";
            $data = array($document,$date, $sid, $document);
            $stmt = $con->prepare($sql);
            $stmt->execute($data);

            function upload($fname, $newname)
            {
                $upload_directory = 'uploads/requirements/';
                if (is_uploaded_file($fname['tmp_name'])) {
                    $filname = basename($fname['name']);
                    $tmp = explode('.', $fname['name']);
                    $uploadfile = $upload_directory . $newname . "." . end($tmp);

                    if (move_uploaded_file($fname['tmp_name'], $uploadfile)) {
                        $_SESSION['status'] = "Requirement Updated!";
                        $_SESSION['status_code'] = "success";
                        header('location:requirements.php');

                        //echo "<script>alert('File Successfully Updated!');document.location='profile.php'</script>";
                    } else {
                        $_SESSION['status'] = "Requirement Update Failed!";
                        $_SESSION['status_code'] = "error";
                        header('location:requirements.php');
                        //echo "<script>alert('File Update Failed');document.location='profile.php'</script>";
                    }
                }
            }
            $newname = sha1($reqname . '-' . $row['username'] . '-' . $row['bday']);
            if ($_FILES['requirement']['name'] != "") {
                $msg = upload($_FILES['requirement'], $newname); // learn how to properly name a picture from database 2:17:09
            }

            //header("location:success.php");
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
}
