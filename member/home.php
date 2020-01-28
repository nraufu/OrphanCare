<?php
session_start();
include("./include/connect.php");

if(!isset($_SESSION['member']))
	{
		header("Location: ../essay.php");
	}
$today=date('Y-m-d');

if (isset($_GET['action']) && ($_GET['action'] == 'add_event')) {
  $n = $_SESSION['memberid'];
  $ev = $_POST['event'];
  $dt = $_POST['date'];
  $ven = $_POST['venue'];
  $tm = $_POST['time'];
  $qry = "insert into event (m_id,name,venue,date,time) values('$n','$ev','$ven','$dt','$tm')";
  mysqli_query($con, $qry);
  header("Location:home.php");
}
if (isset($_GET['action']) && ($_GET['action'] == 'add_req')) {
  $n = $_SESSION['memberid'];
  $req = $_POST['ureq'];
  $qry = "insert into event (o_id,urgent) values('$n','$req')";
  mysqli_query($con, $qry);
  header("Location:home.php");
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <?php
  $pagetitle = 'Member | Panel';
  include('./include/libraries.php'); ?>
</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!--sidebar -->
    <?php
    $dashboard = 'active';
    include('./include/sidebar.php'); ?>
    <!--end of sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- topbar -->
        <?php include('./include/header.php'); ?>
        <!-- end of topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <?php
          $icon = 'fas fa-calendar-alt';
          $title = 'Events';
          $page='./pdfEvents.php';
          $name='Generate Event List';
          include('./include/title.php'); ?>

          <div class="row">
            <div class="col-md-10 mx-auto">
              <h4><i class="fa fa-angle-right mb-5"></i> Event Proposal form </h4>

              <form action="home.php?action=add_event" method="post" name="updateform" id="updateform" onsubmit="return val();">
                <div class="form-group row">
                  <label class="col-sm-2 col-form-label">Event Description: </label>
                  <div class="col-sm-8">
                    <textarea class="form-control" name="event" rows="4" placeholder="Description..."></textarea>
                  </div>
                </div>
                <div class="form-group row">
                  <label class="col-sm-2 col-form-label">Venue: </label>
                  <div class="col-sm-8">
                    <input type="text" class="form-control" name="venue" placeholder="Venue">
                  </div>
                </div>
                <div class="form-group row">
                  <label class="col-sm-2 col-form-label">Date: </label>
                  <div class="col-sm-8">
                    <input type="date" class="form-control" name="date" placeholder="Date">
                  </div>
                </div>
                <div class="form-group row">
                  <label class="col-sm-2 col-form-label">Time: </label>
                  <div class="col-sm-8">
                    <input type="time" class="form-control" name="time" placeholder="Time">
                  </div>
                </div>
                <div class="form-group">
                  <input type="submit" name="submit" value="Submit" class="btn btn-primary">
                </div>
              </form>


            </div>

          </div>


        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

      <!--footer -->
      <?php include('./include/footer.php') ?>

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


</body>

</html>