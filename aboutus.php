<?php
include("admin/include/connect.php");
?>
<!DOCTYPE html>
<html lang="en">
	<head>
	<?php
	$pagetitle = "About Us";
	include './include/libraries.php';
	?>
</head>
<body>
   <!--navbar -->
   <?php
   $about="active";
   include('./include/navbar.php') ?>
   <!--end of navbar -->

    <!--content start-->
    <div class="container">
        
        <!--banner -->
        <?php 
        $icon="fas fa-info";
        $title="About Us";
        $tdescription="Learn more about us";
        include ('./include/banner.php');
        ?>

        <!--end of banner -->
   
        <div class="row my-5">
            <div class="col">
              <p>Alleluyah Orphan Care Center is a non-profit and non-governmental institution which aims at helping orphans and vulnerable children in Mangochi, Malawi.
It was established in the late 2009 after a research by social welfare organizations which found that most of the orphans and vulnerable children live in harsh conditions and are not able to access basic needs such as food, education, and most importantly their rights.
Later the community decided to establish a care center that will look after the vulnerable children and later on an Italian Samaritan with the name of Mama Rita came to rescue and took the responsibility of finding resources for the organization.
</p>  
            </div>
        </div>
        <!--new section-->
        <h3 class="text-center">Put a Smile on Children face</h3>
        <div class="row my-3">
            
            <div class="col-md-6">
                <img class="img-fluid rounded" src="./images/kids1.jpg" alt="image">
            </div>
            <div class="col-md-6">
                <img class="img-fluid rounded" src="./images/kids2.jpg" alt="image">
            </div>
        </div>
        <!-- end ofnew section-->

        <!--new section-->
        <div class="row">
            <div class="col">
                <!--Team-->
                <section class="p-sm-5 p-2 bg-secondary" id="team">
                        <!--title-->
                        <div class="row">
                               <div class="col text-center mb-3">
                                   <h1 class="text-warning display-2">Team</h1>
                                   <p class="lead text-light"></p>
                               </div>
                           </div>
                           <!--end of title-->
                           <div class="row">
                               <div class="col-lg-4 col-sm-10 mx-auto mb-4">
                                   <div class="card">
                                       <img src="./images/personal1.jpg" class="card-img-top" style="width:100%; height:250px;">
                                       <div class="card-body">
                                           <div class="card-title">
                                               <h3 class="text-muted">Michael</h3>
                                           </div>
                                           <div class="card-subtitle">
                                               <p class="lead text-secondary">I am here to help You If needed</p>
                                           </div>
                                          
                                       </div>
                                   </div>
                               </div>
                               <div class="col-lg-4 col-sm-10 mx-auto mb-4">
                                       <div class="card">
                                               <img src="./images/personal2.jpg" class="card-img-top" style="width:100%; height:250px;">
                                               <div class="card-body">
                                                   <div class="card-title">
                                                       <h3 class="text-muted">Jack</h3>
                                                   </div>
                                                   <div class="card-subtitle">
                                                       <p class="lead text-secondary">I am here to help You If needed</p>
                                                   </div>
                                               </div>
                                           </div> 
                               </div>
                               <div class="col-lg-4 col-sm-10 mx-auto mb-4">
                                       <div class="card">
                                               <img src="./images/peresonal3.jpg" class="card-img-top" style="width:100%; height:250px;">
                                               <div class="card-body">
                                                   <div class="card-title">
                                                       <h3 class="text-muted">Ann</h3>
                                                   </div>
                                                   <div class="card-subtitle">
                                                       <p class="lead text-secondary">I am here to help You If needed</p>
                                                   </div>
                                               </div>
                                           </div>
                               </div>
                           </div>
                   </section>
   <!-- end of Team-->
   <!--Footer-->

    <!--end of Footer-->
            </div>
        </div>
        <!--end of new section-->
    </div>
    
    <!--footer -->
   <?php include('./include/footer.php'); ?>
     <!--end of footer -->

<script src="./js/jquery.slim.min.js"></script>
<script src="./js/popper.min.js"></script>
<script src="./js/bootstrap.min.js"></script>
</body>
</html>