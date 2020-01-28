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
	mysqli_query($con, "insert into contact_details(cname,email,msg) values('" . $_POST['cname'] . "','" . $_POST['email'] . "','" . $_POST['msg'] . "')");
	header('location:contactus.php?msg=added');
}
$req = isset($_GET['msg']) ? $_GET['msg'] : '';
if ($req == 'added') {
	$regcontact = mysqli_query($con, "select max(id) as qid from contact_details");
	$result = mysqli_fetch_array($regcontact);
	$sql = mysqli_query($con, "select * from contact_details where id=" . $result['qid']);
	$fetch = mysqli_fetch_array($sql);
	$body = "Dear Mr. ,";
	$body .= "\n";
	$body .= "Here are the details of query on AlleluyaOrphancare.com";
	$body .= "\n";
	$body .= "Name";
	$body .= "\t";
	$body .= $fetch['cname'];
	$body .= "\n";
	$body .= "E-Mail";
	$body .= "\t";
	$body .= $fetch['email'];
	$body .= "\n";
	$body .= "Mobile";
	$body .= "\t";
	$body .= $fetch['phone'];
	$body .= "\n";
	$body .= "Message";
	$body .= "\t";
	$body .= $fetch['msg'];
	$body .= "\n";


	$mail->From = $_fetch['email'];
	$mail->FromName = $fetch['name'];
	$mail->addAddress("alleluyaorphancare@gmail.com", "Website");

	$mail->isHTML(true);

	$mail->Subject = "Query Details";
	$mail->Body = $body;
	$mail->send();
	if ($mail->send())

		header('Location:contactus.php?msg=added2');
}
$req = isset($_GET['msg']) ? $_GET['msg'] : '';
if ($req == 'added2') {
	$regcontact = mysqli_query($con, "select max(id) as qid from contact_details");
	$result = mysqli_fetch_array($regcontact);
	$sql = mysqli_query($con, "select * from contact_details where id=" . $result['qid']);
	$fetch = mysqli_fetch_array($sql);
	$body = "Dear Mr/Ms ";
	$body .= $fetch['cname'];
	$body .= "\n";
	$body .= "Welcome to AllelluyaOrphan.com . We will get back to you as soon as possible. !";
	$body .= "\n";
	$body .= "\n";
	$body .= "Regards,";
	$body .= "\n";
	$body .= "Relationship Team";
	$body .= "\n";
	$body .= "AllelluyaOrphan.com";
	$body .= "\n";

	$mail->From = "Alleluyaorphancare@gmail.com";
	$mail->FromName = "Alleluya Orphancare";
	$mail->addAddress($fetch['email'], $fetch['name']);

	$mail->isHTML(true);

	$mail->Subject = "Message Received";
	$mail->Body = $body;
	$mail->send();
	if ($mail->send())
		header('Location:contactus.php?msg=success');
	else
		header("location:contactus.php?msg=unsuccess");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<?php
	$pagetitle = "Contact Us";
	include './include/libraries.php';
	?>
	<script type="text/javascript">
		function emailValidator(elem, helpMsg) {
			var emailExp = /^[\w\-\.\+]+\@[a-zA-Z0-9\.\-]+\.[a-zA-Z0-9]{2,4}$/;
			if (elem.value.match(emailExp)) {
				return true;
			} else {
				alert(helpMsg);
				elem.value = "";
				elem.focus();
				return false;
			}
		}



		function validateform() {
			var emailid = document.getElementById('email');

			if (emailValidator(emailid, 'Please use Valid Email Id'))
				return true;
			return false;

		}
	</script>

</head>

<body>
	<!--navbar -->
	<?php
	$contact = "active";
	include('./include/navbar.php') ?>
	<!--end of navbar -->

	<!--content start-->
	<div class="container">

		<!--banner -->
		<?php
		$icon = "fas fa-address-card";
		$title = "Contact Us";
		$tdescription = "We are here to help you";
		include('./include/banner.php');
		?>

		<!--end of banner -->


		<div class="row mt-5">
			<p class="text-info">Alleluyah Orphan Care Centre operates in Namwera, T/A Jalasi in Mangochi district. It is located along the Bakili Muluzi highway opposite Orthodox church in Namwera.</p>
			<?php
			$req = isset($_GET['msg']) ? $_GET['msg'] : '';
			if ($req == 'success') {
				?>
				<div class="text-success text-center">
					<h2>Message submitted successfully. Please check your mail for details.</h2>
				</div>
			<?php
			} ?>
			<form class="bg-light p-4 rounded col-md-8 mx-auto" action="contactus.php?action=add" onsubmit="return validateform();" method="post">
				<h2 class="text-center">Contact Form</h2>
				<div class="form-group">
					<label for="message">Full Name:</label>
					<input id="myName" class="form-control" type="text" name="cname" placeholder="Full Name" required>
				</div>
				<div class="form-group">
					<label for="message">Email:</label>
					<input id="email" class="form-control" type="email" name="email" placeholder="Email" required>
				</div>
				<div class="form-group">
					<label for="message">Message:</label>
					<textarea id="message" class="form-control" name="msg" rows="4" cols="20" placeholder="Your message goes here...." required></textarea>
				</div>
				<div class="form-group">
					<div class="row">
						<div class="col-md-6">
							<input type="submit" style="width:150px;" class="btn btn-success" value="Send Message">
						</div>
						<div class="col-md-6">
							<input type="reset" style="width:150px;" class="btn btn-danger" value="Reset">
						</div>
					</div>
				</div>
			</form>
		</div>

	</div>

	<!--footer -->
	<?php include('./include/footer.php'); ?>
	<!--end of footer -->

	<script src="./js/jquery.slim.min.js"></script>
	<script src="./js/popper.min.js"></script>
	<script src="./js/bootstrap.min.js"></script>
</body>

</html>