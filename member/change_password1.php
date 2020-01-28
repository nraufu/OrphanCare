<?PHP
include("include/connect.php");

if(!isset($_SESSION['member']))
	{
		header("Location: ../essay.php");
	}
	
$today=date('Y-m-d');	
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    $pagetitle = 'Change Password';
    include('./include/libraries.php');
    ?>
</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <?php include('./include/sidebar.php'); ?>

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <?php include('./include/header.php'); ?>

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-0 text-gray-800"><i class="fab fa-expeditedssl"></i> Edit Profile</h1>
                   

                    <div class="row">
                        <div class="col-md-8 mx-auto">

                            <?PHP
                            $req = isset($_GET['msg']) ? $_GET['msg'] : '';
                            if ($req == 'edited') {
                                ?>
                                <div class="text-success">
                                    Record Edited Successfully
                                </div>
                            <?PHP
                            }
                            ?>
                            <?PHP
                            $req = isset($_REQUEST['empty']) ? $_REQUEST['empty'] : '';
                            if ($req == "empty") {
                                ?>
                                <div class="text-warning">
                                    <strong>Please fill all fields.</strong>
                                </div>
                            <?PHP
                            }
                            ?>


                            <?PHP
                            $req = isset($_REQUEST['change']) ? $_REQUEST['change'] : '';
                            if ($req == "change") {
                                ?>
                                <div class="text-success">
                                    <strong>Password changed Successfully.</strong>
                                </div>
                            <?PHP
                            }
                            ?>
                            <?PHP
                            $req = isset($_REQUEST['notold']) ? $_REQUEST['notold'] : '';
                            if ($req == "notold") {
                                ?>
                                <div class="text-danger">
                                    <strong>Sorry!!Old Password is wrong..</strong>
                                </div>
                            <?PHP
                            }
                            ?>
                            <?PHP
                            $req = isset($_REQUEST['notmatch']) ? $_REQUEST['notmatch'] : '';
                            if ($req == "notmatch") {
                                ?>
                                <div class="text-danger">
                                    <strong>Sorry!!New/Confirm Password must be same</strong>
                                </div>
                            <?PHP
                            }
                            ?>
                            <form action="change_pass_db.php" method="post" class="mb-5" enctype="multipart/form-data" name="form1" id="form1" onSubmit="return check();">

                                <div class="form-group">
                                    <label for="typeahead">Old Password : </label>

                                    <input name="old_pass" type="password" class="form-control" />

                                    <div class="clear"></div>

                                    <div class="form-group">
                                        <label for="typeahead">New Password : </label>
                                        <input name="new_pass" type="password" class="form-control" />

                                    </div>
                                    <div class="clear"></div>

                                    <div class="form-group">
                                        <label for="typeahead">Confirm Password : </label>
                                        <input name="confirm_pass" type="password" class="form-control" />

                                    </div>

                                    <div>
                                        <div class="form-group">
                                            <button type="submit" class="btn btn-primary">Save changes</button>

                                        </div>
                                    </div>

                            </form>

                        </div>
                    </div>

                </div>

                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white mb-0">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Your Website 2019</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

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