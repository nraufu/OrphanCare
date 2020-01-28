<?php
include("admin/include/connect.php");

require_once "vendor/autoload.php";

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

/* if(isset($_POST['email'])) {
    $email = $_POST['email'];
    include("rp.php");
    $pass = randomPassword();
    $query = "SELECT * FROM sponsor WHERE email = '$email'";
    $result = mysqli_query($con, $query) or die(mysql_error());
    $count = mysqli_num_rows($result);

    if ($count > 1) {
        header('location:user_register.php?msg=exist');
	}else{
		header('location:user_register.php?add');
	}

}
 */


$req = isset($_REQUEST['action']) ? $_REQUEST['action'] : '';
if ($req == 'add') {
	
	$targetfolder = "user_register/";
	$targetfolder = $targetfolder . basename($_FILES['file']['name']);
	$ok = 1;
	$file_type = $_FILES['file']['type'];
	move_uploaded_file($_FILES['file']['tmp_name'], $targetfolder);
	include("rp.php");
	$pass = randomPassword();
	mysqli_query($con, "insert into sponsor(f_name,l_name,email,address,country,phone,date,comment,orpPass) values('" . $_POST['First_Name'] . "','" . $_POST['Last_Name'] . "','" . $_POST['Email_id'] . "','" . $_POST['address'] . "','" . $_POST['country'] . "','" . $_POST['phone'] . "','" . $_POST['date'] . "','" . $_POST['comment'] . "','" . $pass . "')");
	header('Location:user_register.php?msg=added');
}

 $req = isset($_REQUEST['msg']) ? $_REQUEST['msg'] : '';
if ($req == 'added') {
	$regcontact = mysqli_query($con, "select max(s_id) as qid from sponsor");
	$result = mysqli_fetch_array($regcontact);
	$sql = mysqli_query($con, "select * from sponsor where s_id=" . $result['qid']);
	$fetch = mysqli_fetch_array($sql);
	$message = "Dear Mr. ,";
	$message .= "\n";
	$message .= "New application on alleluyaophancare.com";
	$message .= "Name";
	$message .= "\t";
	$message .= $fetch['f_name'];
	$message .= "\n";
	$message .= "Located at";
	$message .= "\t";
	$message .= $fetch['address'] . ' ' . $fetch['country'];
	$message .= "\n";
	$message .= "Contact No.";
	$message .= "\t";
	$message .= '+' . $fetch['phone'];
	$message .= "\n";
	$message .= "E-Mail";
	$message .= "\t";
	$message .= $fetch['email'];
	$message .= " Applying for becoming a sponsor add the following ";
	$message .= "\n";
	$message .= "Comment: ";
	$message .= "\t";
	$message .= $fetch['comment'];
	$message .= "\n";
	$subject = "Applicant Details";

	$mail->From = $_POST['Email_id'];
	$mail->FromName = $fetch['name'];
	$mail->addAddress("alleluyaorphancare@gmail.com", "Website");

	$mail->isHTML(true);

	$mail->Subject = "Request";
	$mail->Body = $message;
	$mail->send();

	if ($mail->send())
		header('Location:user_register.php?msg=added2');
}

$req = isset($_REQUEST['msg']) ? $_REQUEST['msg'] : '';
if ($req == 'added2') {
	$regcontact = mysqli_query($con, "select max(s_id) as qid from sponsor");
	$result = mysqli_fetch_array($regcontact);
	$sql = mysqli_query($con, "select * from sponsor where s_id=" . $result['qid']);
	$fetch = mysqli_fetch_array($sql);
	$reply = "Dear Mr/Ms ";
	$reply .= $fetch['f_name'];
	$reply .= "\n";
	$reply .= "Welcome to Alleluya.com, your application was received Successfully!";
	$reply .= "\n";
	$reply .= "Now you can login to your account.";
	$reply .= "\n";
	$reply .= "Username: ";
	$reply .= $fetch['email'];
	$reply .= "\n";
	$reply .= "Password: ";
	$reply .= $fetch['orpPass'];
	$reply .= "\n";
	$reply .= "Regards,";
	$reply .= "\n";
	$reply .= "Relationship Team";
	$reply .= "\n";
	$reply .= "Alleluyaorphancare.com";
	$reply .= "\n";
	$subject = "Application Submission Confirmation";

	$mail->From = "Alleluyaorphancare@gmail.com";
	$mail->FromName = "Alleluya Orphancare";
	$mail->addAddress($fetch['email'], $fetch['f_name']);

	$mail->isHTML(true);

	$mail->Subject = "Application";
	$mail->Body = $reply;
	$mail->send();

	if ($mail->send())
		header('Location:user_register.php?msg=success');
	else
		header('Location:user_register.php?msg=unsuccess');
} 


?>


<!DOCTYPE html>
<html lang="en">

<head>
	<?php
	$pagetitle = "Sponsor Application";
	include('./include/libraries.php');
	?>

</head>

<body>
	<!--navbar -->
	<?php
	$applicant = "active";
	include('./include/navbar.php'); ?>
	<!--end of navbar -->

	<div class="container">
		<div class="row" style="margin-top: 60px;">
			<div class="col-md-6 mx-auto my-5 mb-5">
				<?php
				$req = isset($_REQUEST['msg']) ? $_REQUEST['msg'] : '';
				if ($req == 'success') {
					?>
					<div class="text-success text-center">
						<h5>Application submitted successfully. Please check your mail for details.</h5>
					</div>
				<?php
				} ?>
				<?php
				$req = isset($_REQUEST['msg']) ? $_REQUEST['msg'] : '';
				if ($req == 'exist') {
					?>
					<div class="text-warning text-center">
						<h4>Email Already Exists</h4>
					</div>
				<?php
				} ?>
				<div id="error text-danger"></div>
				<form class="bg-light p-4 rounded" action="user_register.php?action=add" enctype="multipart/form-data" onSubmit="return validateform();" name="user_reg" method="post">
					<h2 class="text-center">Application Form</h2>
					<p class="form-text text-center text-muted mb-3">For becoming a sponsor</p>
					<div class="form-group">
						<div class="row">
							<div class="col-md-6">
								<input type="text" class="form-control" name="First_Name" placeholder="First Name" maxlength="100" required>
							</div>
							<div class="col-md-6">
								<input type="text" class="form-control" name="Last_Name" placeholder="Last Name" maxlength="100" required>
							</div>
						</div>
					</div>
					<div class="form-group">
						<input id="email" class="form-control" type="email" name="Email_id" placeholder="Email" maxlength="50" required>
						<small id="helpId" class="text-muted">Your Email will not be shared with other third party</small>
					</div>
					<div class="form-group">
						<input id="dateofbirth" class="form-control" type="date" name="date" min="1970-01-01" max="2000-01-01" placeholder="Date Of Birth" maxlength="50" required>
					</div>
					<div class="form-group">
						<input id="phone" class="form-control" type="number" name="phone" placeholder="Phone Number" maxlength="100" required>
					</div>
					<div class="form-group">
						<input id="Country" class="form-control" type="text" name="country" placeholder="Country of Residence" maxlength="100" required>
					</div>
					<div class="form-group">
						<input id="address" class="form-control" type="text" name="address" placeholder="Address" maxlength="50" required>
					</div>
					<div class="form-group">
						<textarea id="message" class="form-control" name="comment" cols="20" rows="5" placeholder="Your message goes here ..." required></textarea>
					</div>
					<div class="form-group">
						<input type="submit" name="send" class="btn btn-info btn-block btn-lg" value="Submit Application">
					</div>
				</form>
				<div class="text-center">

				</div>
			</div>
		</div>
	</div>
	<!--footer -->
	<?php include('./include/footer.php'); ?>
	<!--end of footer -->


	<script src="./js/jquery.slim.min.js"></script>
	<script src="./js/popper.min.js"></script>
	<script src="./js/bootstrap.min.js"></script>
	<script src="./script.js"></script>
</body>

</html>