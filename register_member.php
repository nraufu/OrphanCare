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


$req = isset($_REQUEST['action']) ? $_REQUEST['action'] : '';
if ($req == 'add') {
	/* $targetfolder = "initial_details/";
	$targetfolder = $targetfolder . basename($_FILES['file']['name']);
	$ok = 1;
	$file_type = $_FILES['file']['type'];
	move_uploaded_file($_FILES['file']['tmp_name'], $targetfolder);
	include("rp.php");
	$pass = randomPassword();
	mysqli_query($con, "insert into member(name,email,country,address,phone,date,init_details,comment,orpPass) values('" . $_POST['name'] . "','" . $_POST['Email_id'] . "','" . $_POST['country'] . "','" . $_POST['address'] . "','" . $_POST['Phone'] . "','" . $_POST['date'] . "','" . basename($_FILES['file']['name']) . "','" . $_POST['Reference'] . "','" . $pass . "')"); */
	header('Location:register_member.php?msg=added');
}

/* $req = isset($_REQUEST['msg']) ? $_REQUEST['msg'] : '';
if ($req == 'added') {
	$regcontact = mysqli_query($con, "select max(id) as qid from member");
	$result = mysqli_fetch_array($regcontact);
	$sql = mysqli_query($con, "select * from member where id=" . $result['qid']);
	$fetch = mysqli_fetch_array($sql);
	$message = "Dear Mr. ,";
	$message .= "\n";
	$message .= "New application on alleluyaophancare.com";
	$message .= "\n";
	$message .= "Name";
	$message .= "\t";
	$message .= $fetch['name'];
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
	$message .= "\n";
	$message .= "Applying for becoming a Member add the following ";
	$message .= "\n";
	$message .= "Comment: ";
	$message .= "\t";
	$message .= $fetch['comment'];
	$message .= "\n";

	$mail->From = $_fetch['email'];
	$mail->FromName = $fetch['name'];
	$mail->addAddress("alleluyaorphancare@gmail.com", "Website");

	$mail->isHTML(true);

	$mail->Subject = "Application Details";
	$mail->Body = $message;
	$mail->send();
	if ($mail->send())
		header('Location:register_member.php?msg=added2');
}

$req = isset($_REQUEST['msg']) ? $_REQUEST['msg'] : '';
if ($req == 'added2') {
	$regcontact = mysqli_query($con, "select max(id) as qid from member");
	$result = mysqli_fetch_array($regcontact);
	$sql = mysqli_query($con, "select * from member where id=" . $result['qid']);
	$fetch = mysqli_fetch_array($sql);
	$reply = "Dear Mr/Ms ";
	$reply .= $fetch['name'];
	$reply .= "\n";
	$reply .= "Welcome to Alleluya.com, your application is Submitted! We will intimate after verification...";
	$reply .= "\n";
	$reply .= "\n";
	$reply .= "Regards,";
	$reply .= "\n";
	$reply .= "Relationship Team";
	$reply .= "\n";
	$reply .= "Alleluyaorphancare.com";
	$reply .= "\n";
	$mail_to = $fetch['email'];

	$mail->From = "Alleluyaorphancare@gmail.com";
	$mail->FromName = "Alleluya Orphancare";
	$mail->addAddress($fetch['email'], $fetch['name']);

	$mail->isHTML(true);

	$mail->Subject = "Application Submission Confirmation";
	$mail->Body = $reply;
	$mail->send();

	if ($mail->send())
		header('Location:register_member.php?msg=success');
	else
		header('Location:register_member.php?msg=unsuccess');
} */


?>


<!DOCTYPE html>
<html lang="en">

<head>
	<?php
	$pagetitle = "Member Application";
	include('./include/libraries.php');
	?>
</head>

<body>
	<?php
	$applicant = "active";
	include("include/navbar.php");
	?>
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
				<form class="bg-light p-4 rounded" action="register_member.php?action=add" enctype="multipart/form-data" onSubmit="return validateform();" name="orp_reg" method="post">
					<h2 class="text-center">Application Form</h2>
					<p class="form-text text-center text-muted mb-3">For Membership</p>
					<div class="form-group">
						<label for="name">Full Name</label>
						<input type="text" class="form-control" name="name" placeholder="First Name" maxlength="100" required>
					</div>
					<div class="form-group">
						<label for="email">Email</label>
						<input id="email" class="form-control" type="email" name="Email_id" placeholder="Email" maxlength="50" required>
					</div>
					<div class="form-group">
						<label for="">Country</label>
						<input type="text" name="country" id="country" class="form-control" placeholder="Country Residence">
					</div>
					<div class="form-group">
						<label for="address">Address</label>
						<input id="address" class="form-control" type="text" name="address" placeholder="Address" maxlength="50" required>
					</div>

					<div class="form-group">
						<label for="phone">Phone</label>
						<input id="phone" class="form-control" type="number" name="Phone" placeholder="Phone Number" maxlength="100" required>
					</div>
					<div class="form-group">
						<label for="dateofbirth">Year of Birth</label>
						<input id="dateofbirth" class="form-control" type="date" min="1950/01/01" max="2000/01/01" name="date" placeholder="Date Of Birth" maxlength="100" required>
					</div>
					<div class="form-group">
						<label for="cv">Upload your curriculum vitae</label>
						<input id="cv"  type="file" name="file" placeholder="CV" required>
					</div>
					<div class="form-group">
						<label for="message">Reference/ Comments / Questions</label>
						<textarea id="message" class="form-control" name="Reference" cols="20" rows="5" placeholder="...." required></textarea>
					</div>
					<div class="form-group">
						<input type="submit" name="send" class="btn btn-info btn-block btn-lg" value="Submit Application">
					</div>
				</form>
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