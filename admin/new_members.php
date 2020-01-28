<?PHP
session_start();
include("include/connect.php");
if (!isset($_SESSION['admin'])) {
  header("Location: ../essay.php");
}

require_once "../vendor/autoload.php";

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

if (isset($_GET['mode']) && ($_GET['mode'] == 'app')) {
  $about = mysqli_query($con, "update member set approved=1 where id=" . $_GET['id']);
  $sql = mysqli_query($con, "select name,email,orpPass from member where id=" . $_GET['id']);
  $name = mysqli_fetch_array($sql);
  $body = "Member ";
  $body .= $name['name'];
  $body .= "\n";
  $body .= "\n";
  $body .= "Welcome to AlleluyaOrphanCare.com, your application is verified...";
  $body .= "\n";
  $body .= "Now you can login to your account.";
  $body .= "\n";
  $body .= "Username: ";
  $body .= $name['email'];
  $body .= "\n";
  $body .= "Password: ";
  $body .= $name['orpPass'];
  $body .= "\n";
  $body .= "\n";
  $body .= "Regards,";
  $body .= "\n";
  $body .= "Relationship Team";
  $body .= "\n";
  $body .= "AlleluyaOrphanCare.com";
  $body .= "\n";

  $mail->From = "Alleluyaorphancare@gmail.com";
  $mail->FromName = "Alleluya Orphancare";
  $mail->addAddress($name['email'], $name['name']);

  $mail->isHTML(true);

  $mail->Subject = "Application Verified";
  $mail->Body = $body;
  $mail->send();

  if ($mail->send())
    header("Location:new_members.php?mode=show&Approved");
} else if (isset($_GET['mode']) && ($_GET['mode'] == 'disapprove')) {
  $regcontact = mysqli_query($con, "select max(id) as qid from member");
	$result = mysqli_fetch_array($regcontact);
	$sql = mysqli_query($con, "select * from member where id=" . $result['qid']);
	$fetch = mysqli_fetch_array($sql);
	$reply = "Dear Mr/Ms ";
	$reply .= $fetch['name'];
	$reply .= "\n";
	$reply .= "We couldn't Approve your request As Your Email Has already been Used ....";
	$reply .= "\n";
	$reply .= "\n";
	$reply .= "Regards,";
	$reply .= "\n";
	$reply .= "Relationship Team";
	$reply .= "\n";
	$reply .= "Alleluyaorphancare.com";
	$reply .= "\n";
	$subject = "Application Disapproved";

	$mail->From = "Alleluyaorphancare@gmail.com";
	$mail->FromName = "Alleluya Orphancare";
	$mail->addAddress($fetch['email'], $fetch['name']);

	$mail->isHTML(true);

	$mail->Subject = "Application";
	$mail->Body = $reply;
	$mail->send();

	if ($mail->send()){

  $about = mysqli_query($con, "delete from member where id=" . $_GET['id']);


  header("Location:new_members.php?mode=show&Deleted");}
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <?php
  $pagetitle = 'New Applicant';
  include('./include/libraries.php');
  ?>

</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <?php
    $request = 'active';
    include('./include/sidebar.php'); ?>

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
        <?php include('./include/header.php'); ?>

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-4 text-gray-800"><i class="fas fa-user-edit"></i> New Applicants</h1>

          <!-- applicants -->
          <div class="row">

            <div class="col-md-12">
              <div class="content-panel">
                <table class="table table-striped table-advance table-hover" id="dataTable">

                  <thead>
                    <tr>
                      <th>Sno.</th>
                      <th class="hidden-phone"> Name</th>
                      <th> Email</th>
                      <th> Address</th>
                      <th> Phone</th>
                      <th> Reference</th>
                      <th> Cv</th>
                      <th>Approve/Disapprove</th>

                    </tr>
                  </thead>
                  <tbody>
                    <?PHP
                    $sqlabout = mysqli_query($con, "select * from member where approved=0 order by id");
                    if (mysqli_num_rows($sqlabout) == 0) {
                      ?>
                      <h4 class="text-warning m-3">
                        No New Request To Display!
                      </h4>
                    <?PHP } ?>
                    <?PHP
                    $i = 1;
                    while ($resultabout = mysqli_fetch_array($sqlabout)) {
                      ?>
                      <tr>
                        <td><?PHP echo $i . '.'; ?> </td>
                        <td><?PHP echo $resultabout['name'];  ?></td>
                        <td><?PHP echo $resultabout['email'];  ?></td>
                        <td><?PHP echo $resultabout['address'];  ?></td>
                        <td><?PHP echo $resultabout['phone'];  ?></td>
                        <td><?PHP echo $resultabout['comment'];  ?></td>

                        <td>
                          <a href="../initial_details/<?php echo $resultabout['init_details']; ?>">
                            <button class="btn btn-info btn-xs" onClick="return confirm('Download this CV?');"><i class="fas fa-download"></i></button></a>
                        </td>
                        <td>
                          <a href="new_members.php?mode=app&amp;id=<?php echo $resultabout['id']; ?>">
                            <button class="btn btn-success btn-xs" onClick="return confirm('Do you really want to Approve this Member?');"><i class="fas fa-user-check"></i> </button></a>

                          <a href="new_members.php?mode=disapprove&amp;id=<?php echo $resultabout['id']; ?>">
                            <button class="btn btn-danger btn-xs" onClick="return confirm('Do you really want to Disapprove this member?');"><i class="fas fa-user-times"></i> </button></a>
                        </td>

                      </tr>
                      <?php
                      $i++;
                    }
                    ?>
                  </tbody>
                </table>
              </div>
            </div>



          </div>

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

      <!-- Footer -->
      <?php include('./include/footer.php'); ?>

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Logout Modal-->
  <?php include('./include/logout.php'); ?>


  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin-2.min.js"></script>

  <!-- Page level plugins -->
  <script src="vendor/datatables/jquery.dataTables.min.js"></script>
  <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

  <!-- Page level custom scripts -->
  <script src="js/demo/datatables-demo.js"></script>

</body>

</html>