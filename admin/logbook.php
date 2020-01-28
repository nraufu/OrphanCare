<?PHP
session_start();
include("include/connect.php");

if (!isset($_SESSION['admin'])) {
	header("Location: ../essay.php");
}

if (isset($_GET['mode']) && ($_GET['mode'] == 'del')) {
  mysqli_query($con, "delete from logbook where id=" . $_GET['id']);
  header("Location:logbook.php");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <?php
  $pagetitle = 'Logbook';
  include('./include/libraries.php'); ?>
</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <?php
    $logbook = 'active';
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
          <?php 
          $icon='fas fa-user-secret';
          $title='Logbook';
          $page='./pdfLogbook.php';
          $name='Generate PDF';
          include('./include/title.php');
          ?>
          

          <div class="col-md-12 mt-5">
            <div class="content-panel">
              <table class="table table-striped table-advance table-hover" id="dataTable" width="100%" cellspacing="0">

                <thead>
                  <tr>
                    <th>Sno.</th>
                    <th > Name</th>
                    <th> Role</th>
                    <th> Task</th>
                    <th> Date&Time</th>
                    <th></th>
                  </tr>
                </thead>
                <tbody>
                  <?PHP
                  $sqlabout = mysqli_query($con, "select * from logbook");
                  if (mysqli_num_rows($sqlabout) == 0) {
                    ?>
                   <h4 class="text-warning m-3">
                        No Sponsor To Display!
                      </h4>
                  <?PHP } ?>
                  <?PHP
                  $i = 1;
                  while ($resultabout = mysqli_fetch_array($sqlabout)) {
                    ?>
                    <tr>
                      <td><?PHP echo $i . '.'; ?> </td>
                      <td><?PHP echo $resultabout['name'] ?></td>
                      <td><?php echo $resultabout['userType']; ?></td>
                      <td><?PHP echo $resultabout['task']; ?></td>
                      <td><?php echo $resultabout['date']; ?></td>
                      <td>
                        <a href="logbook.php?mode=del&amp;id=<?php echo $resultabout['id']; ?>">
                          <button class="btn btn-danger btn-xs" onClick="return confirm('Do you really want to delete');"><i class="fas fa-trash-alt"></i></button></a>
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