<?PHP
session_start();
include("include/connect.php");

if (!isset($_SESSION['member'])) {
    header("Location: ../essay.php");
}

$today = date('Y-m-d');
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
                    <h1 class="h3 mb-0 text-gray-800"><i class="fas fa-user"></i> Edit Profile</h1>

                    <div class="row">
                        <?php
                        $about = mysqli_query($con, "select * from member where id=" . $_SESSION['memberid']);
                        $about_data = mysqli_fetch_array($about);
                        ?>
                        <div class="col-md-6 mx-auto">
                            <form action="edit_det.php?action=save" method="post" class="form-horizontal" enctype="multipart/form-data" name="form1" id="form1" onSubmit="return check();">

                                <div class="form-group">
                                    <label class="form-label" for="typeahead">Name </label>
                                    <input name="title" type="text" class="form-control" size="60" value="<?PHP echo $about_data['name']; ?>" />

                                </div>

                                <div class="form-group">
                                    <label class="form-label" for="typeahead">Address </label>
                                    <input name="address" type="text" class="form-control" size="60" value="<?PHP echo $about_data['address']; ?>" />

                                </div>

                                <div class="form-group">
                                    <label class="form-label" for="typeahead">Country </label>
                                    <input name="city" type="text" class="form-control" size="60" value="<?PHP echo $about_data['country']; ?>" />

                                </div>

                                <div class="form-group">
                                    <label class="form-label" for="typeahead">E-Mail ID </label>
                                    <input name="email" type="text" class="form-control" size="60" value="<?PHP echo $about_data['email']; ?>" />

                                </div>
                                <div class="form-group">
                                    <label class="form-label" for="typeahead">Phone </label>
                                    <input name="phone" type="text" class="form-control" size="60" value="<?PHP echo $about_data['phone']; ?>" />

                                </div>
                                <div class="form-group">
                                    <label class="form-label" for="typeahead">Year of Birth </label>
                                    <input name="totalexp" readonly="true" type="text" class="form-control" size="60" value="<?PHP echo $about_data['date']; ?>" />

                                </div>

                                <div class="form-group">
                                    <label class="control-label">&nbsp; </label>
                                    <img src="image/<?PHP echo $about_data['imgPath']; ?>" class="img-fluid rounded" style="width:350px; height:250px" />
                                    <input type="hidden" name="file" value="<?PHP echo $about_data['imgPath_home']; ?>" />
                                </div>
                                <div class="form-group">
                                    <label class="form-label" for="typeahead">Profile Image Path: </label>
                                    <input name="file" type="file" size="60" id="img1" />

                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary">Save Changes</button>
                                </div>

                                <?php
                                $take = mysqli_query($con, "select * from member where id=" . $_SESSION['memberid']);
                                $re = mysqli_fetch_array($take);
                                ?>


                            </form>

                        </div>
                        <?php
                        if (isset($_GET['action']) && ($_GET['action'] == 'save')) {
                            $targetfolder = "image/";
                            $targetfolder = $targetfolder . basename($_FILES['file']['name']);
                            $ok = 1;
                            $file_type = $_FILES['file']['type'];
                            move_uploaded_file($_FILES['file']['tmp_name'], $targetfolder);
                            $sql = "update member set name='" . $_POST['title'] . "', email='" . $_POST['email'] . "', address='" . $_POST['address'] . "', phone='" . $_POST['phone'] . "', city='" . $_POST['city'] . "',imgPath='" . basename($_FILES['file']['name']) . "' where id=" . $_SESSION['memberid'];
                            mysqli_query($con, $sql);
                            header("Location: edit_det.php?Saved");
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