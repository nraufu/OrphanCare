<?php
session_start();
include("./include/connect.php");

if (!isset($_SESSION['admin'])) {
	header("Location:../essay.php");
}

$req = isset($_REQUEST['action']) ? $_REQUEST['action'] : '';

if ($req == 'del_msg') {
	$qry = "delete from contact_details where id=" . $_GET['id'];
	mysqli_query($con, $qry);
	header("Location: home.php?Message_Deleted");
}
if($req=='del_event')
	{
		$qry="delete from event where e_id=". $_GET['id'];
		mysqli_query($con,$qry);
		header("Location: home.php?Event_Deleted");
  }
  
if ($req == 'post_event') {
	$qry = "update event set post_event=1 where e_id=" . $_GET['id'];
	mysqli_query($con, $qry);
	header("Location: home.php?Event_Posted");
}
if ($req == 'unpost_event') {
	$qry = "update event set post_event=0 where e_id=" . $_GET['id'];
	mysqli_query($con, $qry);
	header("Location: home.php?Event_Post_Removed");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
<?php
$pagetitle='Admin | Panel';
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
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            
            <h1 class="h3 mb-0 text-gray-800"><i class="fas fa-tachometer-alt"></i> Dashboard</h1>
          </div>

          <!--info -->
          <?php include('./include/info.php'); ?>



          <!-- Message from website -->
          <div class="row">


            <div class="col-md-12 mt-5">
              <div class="content-panel">
                <table class="table table-striped table-advance table-hover">
                  <h4><i class="fa fa-angle-right"></i> Message from Website </h4>
                  <thead>
                    <tr>
                      <th>Sno.</th>
                      <th class="hidden-phone"> Name</th>
                      <th> Email</th>
                      <th> Message</th>
                      <th></th>
                    </tr>
                  </thead>
                  <tbody>
                  <?PHP
								$sqlabout = mysqli_query($con, "select * from contact_details order by id ");
								if (mysqli_num_rows($sqlabout) == 0) {
									?>
									<div class="error_box">
										No Record To Display!!
									</div>
								<?PHP }
								$i = 1;
								while ($resultabout = mysqli_fetch_array($sqlabout)) {
									?>
                    <tr>
                      <td><?php echo $i;?></td>
                      <td><?php echo $resultabout['cname'];  ?></td>
                      <td><?php echo $resultabout['email'];  ?></td>
                      <td><?php echo $resultabout['msg']; ?></td>
                      <td>
                        <a href="home.php?action=del_msg&amp;id=<?php echo $resultabout['id']; ?>">
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

          <!-- event Proposals -->
          <!-- Message from website -->
          <div class="row">


            <div class="col-md-12 mt-5">
              <div class="content-panel">
                <table class="table table-striped table-advance table-hover">
                  <h4><i class="fa fa-angle-right"></i> Event Proposals from members </h4>
                  <thead>
                    <tr>
                      <th>Sno.</th>
                      <th> Member Name</th>
                      <th> Event</th>
                      <th> Venue</th>
                      <th> Date</th>
                      <th></th>
                    </tr>
                  </thead>
                  <tbody>

                  <?PHP
								$sqlabout = mysqli_query($con, "select a.e_id as e_id, b.name as oname,a.venue as venue, a.date as date from event as a inner join member as b on a.m_id=b.id");
								if (mysqli_num_rows($sqlabout) == 0) {
									?>
									<div class="text-warning">
										No Record To Display!!
									</div>
								<?PHP }
								$i = 1;
								while ($resultabout = mysqli_fetch_array($sqlabout)) {
									?>
                    <tr>
                      <td><?PHP echo $i; ?></td>
                      <td><?PHP echo $resultabout['oname'];  ?></td>
                      <td><?PHP echo $resultabout['venue'];  ?></td>
                      <td><?PHP echo $resultabout['date'];  ?></td>
                      <?php
                        $ev=mysqli_fetch_array(mysqli_query($con,"select post_event from event where e_id=".$resultabout['e_id']));
                        if($ev['post_event']==0)
                        {
                        ?>
                      <td>
                        <a href="home.php?action=post_event&amp;id=<?php echo $resultabout['e_id']; ?>">
                          <button class="btn btn-info btn-xs ml-2">Post</button></a>
                        <a href="home.php?action=del_event&amp;id=<?php echo $resultabout['e_id']; ?>">
                          <button class="btn btn-danger btn-xs" onClick="return confirm('Do you really want to delete');"><i class="fas fa-trash-alt"></i></button></a>
                      </td>
                      <?php 
                        }
                        else
                        {?>
                        <td>
                        <a href="home.php?action=unpost_event&amp;id=<?php echo $resultabout['e_id']; ?>">
                          <button class="btn btn-info btn-xs ml-2">Remove Post</button></a>
                        <a href="home.php?action=del_event&amp;id=<?php echo $resultabout['e_id']; ?>">
                          <button class="btn btn-danger btn-xs" onClick="return confirm('Do you really want to delete');"><i class="fas fa-trash-alt"></i></button></a>
                          </td>
                      <?php
                      }
                      ?> 
                    </tr>
                    <?PHP
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