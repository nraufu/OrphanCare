<?php
include("admin/include/connect.php");

?>

<!DOCTYPE html>
<html lang="en">

<head>

    <?php
    $pagetitle = "Allelluya Orphan Care";
    include('./include/libraries.php');
    ?>

</head>

<body>
    <!--navbar -->
    <?php
    $index = "active";
    include('./include/navbar.php') ?>
    <!--end of navbar -->

    <!-- Start landing page section-->
    <div class="row">
        <div class="col">
            <div class="landing mb-2">
                <div class="home-wrap">
                    <div class="home-inner">

                    </div>
                </div>
            </div>

            <div class="caption text-center text-uppercase">
                <h1>Allelluya Care Centre</h1>
                <h3>help turn tears to smiles</h3>
                <h3>let's us make the world a better place together</h3>

            </div>
        </div>
    </div>

    <!-- end landing section-->
    <div class="container-fluid mt-4">
        <!--new section-->
        <div class="jumbotron jumbotron-fluid mb-0">
            <div class="col-12 narrow text-center mb-2">
                <p class="lead">Alleluya orphan care center is a non-profit and non-governmental institution which aims at helping orphans and vulnerable children in Mangochi, Malawi.</p>
                <a class="btn btn-light btn-outline-info" href="./about_us.html">
                    <h5>Want to know more?</h5>
                </a>
            </div>

            <div class="narrow text-center">

                <div class="row text-center">
                    <div class="col-md-4">
                        <div class="feature">
                            <i class="fas fa-people-carry fa-4x"></i>
                            <h3>Your part</h3>
                            <p>you also can help one children to realize his/her dream</p>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="feature">
                            <i class="fas fa-bullseye fa-4x"></i>
                            <h3> Our Mission</h3>
                            <p>improve the lives of orphaned and Help them have a great future</p>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="feature">
                            <i class="fas fa-fast-forward fa-4x"></i>
                            <h3>The future</h3>
                            <p>we look to improve and give the orphan opportunity for the future careers</p>
                        </div>
                    </div>
                </div>

            </div>
            <hr>
        </div>

        <!--end of new section-->

        <!--new section-->
        <div class="jumbotron rounded-0">
            <div class="col-12 text-center">
                <h3 class="heading">Quotes</h3>
                <div class="heading-underline"></div>
            </div>
            <div class="row mt-5 mb-0">
                <div class="col-md-6 quotes mb-5">
                    <div class="row">
                        <div class="col-md-4 mb-3">
                            <img src="./images/kate diCamillo.jpg" alt="quote1">
                        </div>
                        <div class="col-md-8">
                            <blockquote>
                                <i class="fas fa-quote-left"></i>
                                There," she said. She rocked him back and forth. "There, you foolish, beautiful boy who wants to change the world. There, there. And who could keep from loving you? Who could keep from loving a boy so brave and true?
                                <hr class="clients-hr">
                                <cite>&#8212;Kate DiCamillo, The Magician's Elephant </cite>
                            </blockquote>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 quotes">
                    <div class="row">
                        <div class="col-md-4 mb-3">
                            <img src="./images/victor hugo.jpg" alt="quote2">
                        </div>
                        <div class="col-md-8">
                            <blockquote>
                                <i class="fas fa-quote-left"></i>
                                The women laughed and wept; the crowd stamped their feet enthusiastically, for at that moment Quasimodo was really beautiful. He was handsome — this orphan, this foundling, this outcast.
                                <hr class="clients-hr">
                                <cite>&#8212; Victor Hugo, The Hunchback Of Notre Dame </cite>
                            </blockquote>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <!--new section-->

    <!--footer -->
    <?php include('./include/footer.php'); ?>
    <!--end of footer -->

    <script src="./js/jquery.slim.min.js"></script>
    <script src="./js/popper.min.js"></script>
    <script src="./js/bootstrap.min.js"></script>
</body>

</html>