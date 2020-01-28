<?PHP
session_start();
include("include/connect.php");
if (!isset($_SESSION['member'])) {
  header("Location: ../essay.php");
}
$today = date('Y-m-d');

$req = isset($_REQUEST['action']) ? $_REQUEST['action'] : '';
if ($req == 'add') {
  $targetfolder = "image/";
  $targetfolder = $targetfolder . basename($_FILES['file']['name']);
  $ok = 1;
  $file_type = $_FILES['file']['type'];
  move_uploaded_file($_FILES['file']['tmp_name'], $targetfolder);

  $sql = mysqli_query($con, " insert into gallery(title,description,imgPath_home) values('" . $_POST['title'] . "' , '" . $_POST['description'] . "' , '" . basename($_FILES['file']['name']) . "')");

  header('Location: gallery.php?mode=show&msg=added');
}
$req = isset($_REQUEST['action']) ? $_REQUEST['action'] : '';
if ($req == 'edit') {
  $sqlget = mysqli_query($con, "select * from gallery where id=" . $_GET['id']);
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
    $image1 = $res['imgPath_home'];
  } else {
    $image1 = $filename;
  }
  mysqli_query($con, "update gallery set title='" . $_POST['title'] . "',description='" . $_POST['description'] . "',imgPath_home='" . $image1 . "' where id=" . $_GET['id']);
  header('Location:gallery.php?mode=show&msg=edited');
}
$req = isset($_REQUEST['action']) ? $_REQUEST['action'] : '';
if ($req == 'delete') {
  mysqli_query($con, "delete from gallery where id=" . $_GET['id']);
  header('Location:gallery.php?mode=show&msg=deleted');
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
  <?php
  $pagetitle = 'Gallery';
  include('./include/libraries.php');
  ?>
</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <?php
    $gallery = 'active';
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
          <div class="d-sm-flex align-items-center justify-content-between mb-5">
            <h1 class="h3 mb-0 text-gray-800"><i class="fas fa-image"></i> Gallery</h1>
          </div>

          <?PHP
          $req = isset($_GET['msg']) ? $_GET['msg'] : '';
          if ($req == 'edited') {
            ?>
            <div class="text-success" style="color:#FF0000; font-size:24px; margin-bottom:20px;">
              Image Edited Successfully
            </div>
          <?PHP
          }
          $req = isset($_GET['msg']) ? $_GET['msg'] : '';
          if ($req == 'deleted') {
            ?>
            <div class="text-success" style="color:#FF0000; font-size:24px; margin-bottom:20px;">
              Image Deleted Successfully
            </div>
          <?PHP
          }
          $req = isset($_GET['msg']) ? $_GET['msg'] : '';
          if ($req == 'added') {
            ?>
            <div class="text-success" style="color:#FF0000; font-size:24px; margin-bottom:20px;">
              Image Added Successfully
            </div>
          <?PHP
          }
          ?>

          <div class="row">
            <div class="col">

              <?PHP
              if (isset($_GET['mode']) && ($_GET['mode'] == 'show')) {
                ?>

                <table class="table table-striped table-advance table-hover">
                  <thead>
                    <tr>
                      <th>S.No.</th>
                      <th>Title</th>
                      <th>Description</th>
                      <th>Actions</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?PHP
                    $sqlabout = mysqli_query($con, "select * from gallery order by id ");
                    if (mysqli_num_rows($sqlabout) == 0) {
                      ?>
                      <div class="text_warning">
                        No Image To Display!!
                      </div>
                    <?PHP } ?>
                    <?PHP
                    $i = 1;
                    while ($resultabout = mysqli_fetch_array($sqlabout)) {
                      ?>
                      <tr>
                        <td><?PHP echo $i . '.'; ?> </td>
                        <td><?PHP echo $resultabout['title'];  ?></td>
                        <td><?PHP echo $resultabout['description'];  ?></td>
                        <td>
                          <a class="btn btn-info" href="gallery.php?mode=edit&amp;id=<?php echo $resultabout['id']; ?>">
                            <i class="fas fa-edit"></i>
                          </a>
                          <a class="btn btn-danger" href="gallery.php?action=delete&amp;id=<?php echo $resultabout['id']; ?>" onClick="return confirm('Are you sure you want to delete this data?');">
                            <i class="fas fa-trash-alt"></i>
                          </a>
                        </td>
                      </tr>
                      <?PHP
                      $i++;
                    }
                    ?>
                  </tbody>
                  <tfoot>
                    <tr>

                      <td><a href="gallery.php?mode=add" class="btn btn-primary"> Add new Image </a></td>
                    </tr>
                  </tfoot>
                </table>

              <?PHP
              }
              ?>
            </div>
          </div>

          <div class="row">
            <?PHP
            if (isset($_GET['mode']) && ($_GET['mode'] == 'add')) {
              ?>
              <div class="col-md-6 mx-auto">
                <h3>
                  <a class="btn btn-info" href="./gallery.php?mode=show"><i class="fas fa-angle-left"></i> Back</a>
                </h3>
                <form action="gallery.php?action=add" method="post" class="mt-3" enctype="multipart/form-data" name="form1" id="form1" onSubmit="return check();">

                  <div class="form-group">
                    <label class="control-label" for="typeahead">Enter Image Title: </label>
                    <input name="title" type="text" class="form-control" size="60" placeholder="Enter image title" />

                  </div>
                  <div class="form-group">
                    <label class="control-label" for="typeahead">Enter Description: </label>
                    <textarea name="description" type="text" class="form-control" rows="4" cols="30" placeholder="Image Description"></textarea>
                  </div>

                  <div class="form-group">
                    <label class="control-label" for="typeahead"> Image Path: </label>
                    <input name="file" type="file" size="60" id="img1" />

                  </div>
                  <div>
                    <div class="form-group">
                      <button type="submit" class="btn btn-primary"> Add </button>
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

          <div class="row">
            <?PHP
            if (isset($_GET['mode']) && ($_GET['mode'] == 'edit')) {
              ?>
              <div class="col-md-6 mx-auto">
                <h3>
                  <a class="btn btn-info" href="./gallery.php?mode=show"><i class="fas fa-angle-left"></i> Back</a>
                </h3>
                <form action="gallery.php?action=edit&id=<?PHP echo $_GET['id']; ?>" method="post" class="form-horizontal" enctype="multipart/form-data" name="form1" id="form1" onSubmit="return check();">

                  <?PHP
                  $about = mysqli_query($con, "select * from gallery where id=" . $_GET['id']);
                  $about_data = mysqli_fetch_array($about);
                  ?>
                  <div class="form-group">
                    <label class="control-label">Enter Title: </label>
                    <input name="title" type="text" class="form-control" size="60" value="<?PHP echo $about_data['title']; ?>" />
                  </div>

                  <div class="form-group">
                    <label class="control-label">Enter Description: </label>
                    <textarea name="description" type="text" class="form-control" rows="5" cols="30"><?PHP echo $about_data['description']; ?></textarea>
                  </div>


                  <div class="form-group">
                    <label class="control-label">&nbsp; </label>
                    <img src="image/<?PHP echo $about_data['imgPath_home']; ?>" class="img-fluid rounded" style="width:350px; height:250px" />
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

</body>

</html>