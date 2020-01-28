<?php
include("admin/include/connect.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
<?php
$pagetitle="Help us";
include('./include/libraries.php');
?>
</head>
<body>
  <!--navbar -->
  <?php 

   $involvement="active";
   include('./include/navbar.php') 
   ?>
   <!--end of navbar -->

   <div class="container">
        <!--banner -->
        <?php 
        $icon="fas fa-hands-helping";
        $title="Help Us";
        $tdescription="Making something great together";

        include ('./include/banner.php');
        ?>
        <!--end of banner -->
    

    <!--new section-->
        <div class="row">
            <div class="col my-4">
                <p>Our home runs based on the donations that we get from different individuals and organizations. This means that you can be a great part of rebuilding the community through the donations and gifts that you can send to our children’s home.</p>
            </div>
        </div>
       <div class="row">
           <div class="col-md-4">
           <div class="card" style="width: 18rem;">
                <img src="./images/donate.jpg" class="card-img-top" alt="Donate" style="width:100%; height:150px;">
                <div class="card-body">
                  <h5 class="card-title">Donate</h5>
                  <p class="card-text">You ca donate and help us run the orphanage for the kids to have a better living experience here.</p>
                  <a href="./donate.php" class="btn btn-primary">Donate</a>
                </div>
            </div>
           </div>
           <div class="col-md-4">
           <div class="card" style="width: 18rem;">
                <img src="./images/events.jpg" class="card-img-top" alt="events" style="width:100%; height:150px;">
                <div class="card-body">
                  <h5 class="card-title">Events</h5>
                  <p class="card-text">Come join us and celebrate with us it is a great experience and get to know the children.</p>
                  <a href="./event.php" class="btn btn-primary">Attend</a>
                </div>
            </div>
           </div>
           <div class="col-md-4">
           <div class="card" style="width: 18rem;">
                <img src="./images/education.jpg" class="card-img-top" alt="educate" style="width:100%; height:150px;">
                <div class="card-body">
                  <h5 class="card-title">Member</h5>
                  <p class="card-text">Become one of us and help us make the world a better place so that we can help those children.</p>
                  <a href="./register_member.php" class="btn btn-primary">Apply</a>
                </div>
            </div>
           </div>
       </div>
    </div>
    <!--end of new section-->

    <!--footer -->
    <?php include('./include/footer.php'); ?>
     <!--end of footer -->


<script src="./js/jquery.slim.min.js"></script>
<script src="./js/popper.min.js"></script>
<script src="./js/bootstrap.min.js"></script>
</body>
</html>
