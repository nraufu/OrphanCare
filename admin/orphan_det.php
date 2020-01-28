<?PHP
session_start();
include("include/connect.php");

if (!isset($_SESSION['admin'])) {
  header("Location: ../essay.php");
}

$req = isset($_REQUEST['action']) ? $_REQUEST['action'] : '';
if ($req == 'edit') {
  $sqlget = mysqli_query($con, "select * from orphans where id=" . $_GET['id']);
  $res = mysqli_fetch_array($sqlget);

  if ($_FILES['file']['name'] != "") {
    $filename = rand() . $_FILES['file']['name'];
    $filename = str_replace(" ", "_", $filename);
    $temporary_name = $_FILES['file']['tmp_name'];
    $filename_1 = $_POST['file'];
    $uploaddir = 'image/';
    $uploadfile = $uploaddir . basename($filename);
    $allowedExts = array("jpg", "jpeg", "pjpeg", "gif", "png");
    $temp = explode(".", $filename);
    $extension = end($temp);
    if (in_array($extension, $allowedExts)) {
      move_uploaded_file($temporary_name, $uploadfile);
    }
  }
  if ($_FILES['file']['name'] == "") {
    $filename = $filename_1;
  }
  if ($filename == '') {
    $image1 = $res['imgPath'];
  } else {
    $image1 = $filename;
  }
  mysqli_query($con, "update Orphans set name='" . $_POST['name'] . "', age='" . $_POST['age'] . "', school='" . $_POST['school'] . "', grade='" . $_POST['grade'] . "', address='" . $_POST['address'] . "', gender='" . $_POST['gender'] . "', disability='" . $_POST['disability'] . "', date_of_birth='" . $_POST['date'] . "', imgPath='" . $image1 . "' where id=" . $_GET['id']);
  header('Location:orphan_det.php?mode=show&msg=edited');
}
$req = isset($_REQUEST['action']) ? $_REQUEST['action'] : '';
if ($req == 'delete') {
  mysqli_query($con, "delete from orphans where id=" . $_GET['id']);
  header('Location:orphan_det.php?mode=show&msg=deleted');
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <?php
  $pagetitle = 'Add Children';
  include('./include/libraries.php');
  ?>
</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <?php
    $orphans = 'active';
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
          $icon='fas fa-list';
          $title='Orphan List';
          $page='./pdfOrphans.php';
          $name='Generate PDF';
          include('./include/title.php');
          ?>



          <?php
          $req = isset($_GET['msg']) ? $_GET['msg'] : '';
          if ($req == 'deleted') {
            ?>
            <div class="text-danger">
              Record Deleted Successfully
            </div>
          <?PHP
          }

          $req = isset($_GET['msg']) ? $_GET['msg'] : '';
          if ($req == 'edited') {
            ?>
            <div class="text-success">
              Image Edited Successfully
            </div>
          <?PHP
          }
          ?>

          <div class="row">
            <div class="col">

              <?PHP
              if (isset($_GET['mode']) && ($_GET['mode'] == 'show')) {
                ?>

                <table class="table table-striped table-advance table-hover" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th> S.No.</th>
                      <th> Full Name</th>
                      <th> Gender</th>
                      <th> Date Of Birth</th>
                      <th> Place of Birth</th>
                      <th> School</th>
                      <th> Disability</th>
                      <th></th>
                    </tr>
                  </thead>
                  <tbody>
                    <?PHP
                    $sqlabout = mysqli_query($con, "select * from orphans order by id ");
                    if (mysqli_num_rows($sqlabout) == 0) {
                      ?>
                      <div class="text_warning">
                        No Orphan Record To Display!!
                      </div>
                    <?PHP } ?>
                    <?PHP
                    $i = 1;
                    while ($resultabout = mysqli_fetch_array($sqlabout)) {
                      ?>
                      <tr>
                        <td><?PHP echo $i . '.'; ?> </td>
                        <td><?PHP echo $resultabout['name'];  ?></td>
                        <td><?php echo $resultabout['gender']; ?></td>
                        <td><?PHP echo $resultabout['date_of_birth'];  ?></td>
                        <td><?PHP echo $resultabout['address'];  ?></td>
                        <td><?php echo $resultabout['school']; ?></td>
                        <td><?PHP echo $resultabout['disability'];  ?></td>
                        <td>
                          <a class="btn btn-info" href="orphan_det.php?mode=edit&amp;id=<?php echo $resultabout['id']; ?>">
                            <i class="fas fa-edit"></i>
                          </a>
                          <a class="btn btn-danger" href="orphan_det.php?action=delete&amp;id=<?php echo $resultabout['id']; ?>" onClick="return confirm('Are you sure you want to delete this data?');">
                            <i class="fas fa-trash-alt"></i>
                          </a>
                        </td>
                      </tr>
                      <?PHP
                      $i++;
                    }
                    ?>
                  </tbody>

                </table>

              <?PHP
              }
              ?>
            </div>
          </div>

          <div class="row">
            <?PHP
            if (isset($_GET['mode']) && ($_GET['mode'] == 'edit')) {
              ?>
              <div class="col-md-8">
                <h1 class="mb-3 ">
                  <a class="btn btn-info" href="./orphan_det.php?mode=show"><i class="fas fa-angle-left"></i> Back</a>
                </h1>
                <form action="orphan_det.php?action=edit&id=<?PHP echo $_GET['id']; ?>" method="post" class="form-horizontal" enctype="multipart/form-data" name="form1" id="form1" onSubmit="return check();">

                  <?PHP
                  $about = mysqli_query($con, "select * from orphans where id=" . $_GET['id']);
                  $about_data = mysqli_fetch_array($about);
                  ?>
                  <div class="form-group">
                    <label class="control-label">Full Name: </label>
                    <input name="name" type="text" class="form-control" size="60" value="<?PHP echo $about_data['name']; ?>" />
                  </div>
                  <div class="form-group">
                    <label class="control-label">Age: </label>
                    <input name="age" type="text" class="form-control" size="60" value="<?PHP echo $about_data['age']; ?>" />
                  </div>
                  <div class="form-group">
                    <label class="control-label" for="typeahead">Choose Gender: </label>
                    <select name="gender" class="form-control" required>
                      <option selected>--Choose Gender--</option>
                      <option value="male">Male</option>
                      <option value="female">Female</option>
                    </select>
                  </div>
                  <div class="form-group">
                    <label class="control-label">School: </label>
                    <input name="school" type="text" class="form-control" size="60" value="<?PHP echo $about_data['school']; ?>" />
                  </div>
                  <div class="form-group">
                    <label class="control-label">Grade: </label>
                    <input name="grade" type="text" class="form-control" size="60" value="<?PHP echo $about_data['grade']; ?>" />
                  </div>
                  <div class="form-group">
                    <label class="control-label">Date of Birth: </label>
                    <input name="date" type="text" class="form-control" size="60" value="<?PHP echo $about_data['date_of_birth']; ?>" readonly/>
                  </div>
                  <div class="form-group">
                    <label class="control-label">Address: </label>
                    <input name="address" type="text" class="form-control" size="60" value="<?PHP echo $about_data['address']; ?>" />
                  </div>
                  <div class="form-group">
                    <label class="control-label" for="typeahead">Have a Disability: </label>
                    <select name="disability" class="form-control" required>
                      <option selected>----</option>
                      <option value="Yes">Yes</option>
                      <option value="No">No</option>
                    </select>
                  </div>



                  <div class="form-group">
                    <label class="control-label">&nbsp; </label>
                    <img src="image/<?PHP echo $about_data['imgPath']; ?>" class="img-fluid rounded" style="width:350px; height:250px" />
                    <input type="hidden" name="file" value="<?PHP echo $about_data['imgPath_home']; ?>" />
                  </div>
                  <div class="form-group">
                    <label class="control-label" for="typeahead"> Image Path: </label>
                    <input name="file" type="file" size="60" id="img2" />
                  </div>



                  <div>
                    <div class="form-actions">
                      <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                  </div>

                </form>
              </div>
              </td>
              </tr>
            <?PHP
            }
            ?>
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