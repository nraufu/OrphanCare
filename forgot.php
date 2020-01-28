<?php

session_start();
include("include/connect.php");

require_once "./vendor/autoload.php";


$mail = new PHPMailer\PHPMailer\PHPMailer();

//Enable SMTP debugging. 
$mail->SMTPDebug = 3;
//Set PHPMailer to use SMTP.
$mail->isSMTP();
//Set SMTP host name                          
$mail->Host = "smtp.gmail.com";
//Set this to true if SMTP host requires authentication to send email
$mail->SMTPAuth = true;
//Provide username and password     
$mail->Username = "alleluyaorphancare@gmail.com";
$mail->Password = "Bit*2019";
//If SMTP requires TLS encryption then set it
$mail->SMTPSecure = "tls";
//Set TCP port to connect to 
$mail->Port = 587;


if (isset($_POST['email']) && $_POST['userType'] == 'member') {
    $email = $_POST['email'];
    include("rp.php");
    $pass = randomPassword();
    $query = "SELECT * FROM member WHERE email = '$email'";
    $result = mysqli_query($con, $query) or die(mysql_error());
    $count = mysqli_num_rows($result);

    if ($count == 0) {
        header('location:forgot.php?msg=dntexist');
    }

    if ($count == 1) {
        mysqli_query($con, "update member set orpPass='$pass' where email='$email'");
        //That Mail code should be put here    <----------------------

        $body = '';
        $body .= 'Hello member, Your new Pass is ';
        $body .= $pass;

        $mail->From = "alleluyaorphancare@gmail.com";
        $mail->FromName = "Alleluya Orphancare";

        $mail->addAddress($email);

        $mail->isHTML(true);

        $mail->Subject = "Password Recovery";
        $mail->Body = $body;


        if ($mail->send())

            header('location:forgot.php?msg=success');
    }else{
        header('location:forgot.php?msg=error');
    }
}elseif (isset($_POST['email']) && $_POST['userType'] == 'sponsor') {
    $email = $_POST['email'];
    include("rp.php");
    $pass = randomPassword();
    $query = "SELECT * FROM sponsor WHERE email = '$email'";
    $result = mysqli_query($con, $query) or die(mysql_error());
    $count = mysqli_num_rows($result);

    if ($count == 0) {
        header('location:forgot.php?msg=dntexist');
    }

    if ($count == 1) {
        mysqli_query($con, "update sponsor set orpPass='$pass' where email='$email'");
        //That Mail code should be put here    <----------------------

        $body = '';
        $body .= 'Hello sponsor, Your new Pass is ';
        $body .= $pass;

        $mail->From = "alleluyaorphancare@gmail.com";
        $mail->FromName = "Allelluya Orphancare";

        $mail->addAddress($email);

        $mail->isHTML(true);

        $mail->Subject = "Password Recovery";
        $mail->Body = $body;


        if ($mail->send())

            header('location:forgot.php?msg=success');
    }else{
        header('location:forgot.php?msg=error');
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    $pagetitle = 'Forgot password';
    include('./include/libraries.php'); ?>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-md-8 mx-auto" style="margin-top:100px;">
                <form action="#" class="bg-light p-4 rounded" method="post">
                    <!-- form-login begin -->
                    <h2 class="text-info text-center"> Recover Password </h2>
                    <div class="form-group">
                        <input type="text" class="form-control mb-4" placeholder="Email Address" name="email" required>

                    </div>
                    <div class="form-group">
                        <label for="userType">I was a: </label>
                        <input type="radio" name="userType" value="sponsor" class="custom-radio" required>&nbsp;Sponsor
                        <input type="radio" name="userType" value="member" class="custom-radio" required>&nbsp;Member

                    </div>

                    <button type="submit" class="btn btn-info" name="Send">
                        <!-- btn btn-lg btn-info btn-block begin -->

                        Send Email

                    </button><!-- btn btn-lg btn-info btn-block finish -->

                    <a class="btn btn-info" href="./essay.php">Go Back</a>
                    <div class="text-danger"></div>

                    <?php
                    $req = isset($_REQUEST['msg']) ? $_REQUEST['msg'] : '';

                    if ($req == 'success') {
                        ?>
                        <div class="text-success text-cente mt-3">
                            <h3>Message Sent</h3 </div> <?php
                        }
                        ?> 
                    <?php
                    $req = isset($_REQUEST['msg']) ? $_REQUEST['msg'] : '';

                    if ($req == 'dntexist') {
                        ?>
                        <div class="text-warning text-center mt-3">
                            <h3>You are not registered</h3 </div> <?php
                        }
                        ?> 
                    <?php
                    $req = isset($_REQUEST['msg']) ? $_REQUEST['msg'] : '';

                    if ($req == 'error') {
                        ?>
                        <div class="text-danger text-center mt-3">
                            <h3>invalid Email or user doesn't exist</h3 </div> <?php
                        }
                        ?> 
                        </form> <!-- form-login finish -->
                    </div>
            </div>
        </div>