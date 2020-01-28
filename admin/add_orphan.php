<?PHP
session_start();
include("include/connect.php");

if (!isset($_SESSION['admin'])) {
  header("Location: ../essay.php");
}

$req = isset($_REQUEST['action']) ? $_REQUEST['action'] : '';
if ($req == 'add') {
  $targetfolder = "image/";
  $targetfolder = $targetfolder . basename($_FILES['file']['name']);
  $ok = 1;
  $file_type = $_FILES['file']['type'];
  move_uploaded_file($_FILES['file']['tmp_name'], $targetfolder);

  $sql = mysqli_query($con, " insert into orphans(name,school,grade,gender,date_of_birth,address,disability,imgPath) values('" . $_POST['name'] . "','" . $_POST['school'] . "' ,'" . $_POST['grade'] . "' ,'" . $_POST['gender'] . "' ,'" . $_POST['date'] . "' ,'" . $_POST['address'] . "' , '" . $_POST['disability'] . "' ,'" . basename($_FILES['file']['name']) . "')");

  header('Location: add_orphan.php?mode=add&msg=added');
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <?php
  $pagetitle = 'Orphans Details';
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
          <h1 class="h3 mb-4 text-gray-800"><i class="fas fa-plus"></i> Register a new Orphan</h1>
          <?php
          $req = isset($_GET['msg']) ? $_GET['msg'] : '';
          if ($req == 'added') {
            ?>
            <div class="text-success">
              Children Added Successfully
            </div>
          <?PHP
          }
          ?>

          <div class="row">
            <?PHP
            if (isset($_GET['mode']) && ($_GET['mode'] == 'add')) {
              ?>
              <div class="col-md-8 mx-auto">

                <form action="add_orphan.php?action=add" method="post" class="mt-3" enctype="multipart/form-data" name="form1" id="form1" onSubmit="return check();">

                  <div class="form-group">
                    <label class="control-label" for="typeahead">Full Name: </label>
                    <input name="name" type="text" class="form-control" size="60" placeholder="Enter Full Name" required />

                  </div>
                  <div class="form-group">
                    <label class="control-label" for="typeahead">Choose Gender: </label>
                    <select name="gender" class="form-control" required>
                      <option>--Choose Gender--</option>
                      <option value="male">Male</option>
                      <option value="female">Female</option>
                    </select>
                  </div>
                  <div class="form-group">
                    <label class="control-label" for="typeahead">School: </label>
                    <input name="school" type="text" class="form-control" size="60" placeholder="Enter School"/>
                  </div>
                  <div class="form-group">
                    <label class="control-label" for="typeahead">grade: </label>
                    <input name="grade" type="text" class="form-control" size="60" placeholder="Enter Grade" required />
                  </div>
                  <div class="form-group">
                    <label class="control-label" for="typeahead">Date_Of_Birth: </label>
                    <input name="date" type="date" min="1990-01-01" id="dt" class="form-control" size="60" placeholder="Enter Date Of birth" required />
                  </div>
                  <div class="form-group">
                    <label class="control-label" for="typeahead">Address: </label>
                    <input name="address" type="text" class="form-control" size="60" placeholder="Enter Address" required />
                  </div>
                  <div class="form-group">
                    <label class="control-label" for="typeahead">Have a Disability: </label>
                    <select name="disability" class="form-control" required>
                      <option>----</option>
                      <option value="Yes">Yes</option>
                      <option value="No">No</option>
                    </select>
                  </div>

                  <div class="form-group">
                    <label class="control-label" for="typeahead"> Image Path: </label>
                    <input name="file" type="file" size="60" id="img" />

                  </div>
                  <div>
                    <div class="form-group">
                      <button type="submit" class="btn btn-primary"> Add Children </button>
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
  
  <script src="./script.js"></script>

</body>

</html>