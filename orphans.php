<?php
include("admin/include/connect.php");
?>
<!DOCTYPE html>
<html lang="en">
<?php
$pagetitle="Children";
include('./include/libraries.php');
?>
<body>

   <!--navbar -->
   <?php 
   $child="active";
   include('./include/navbar.php') ?>
   <!--end of navbar -->

    <div class="container">
        <!--banner -->
        <?php 
        $icon="fas fa-child";
        $title="Our Children";
        $tdescription="Plenty of smiles";

        include ('./include/banner.php');
        ?>
        <!--end of banner -->
    

    <!--new section-->
        
        <div class="row mt-5">
            <?php
            $query=mysqli_query($con,"select * from orphans");
            while($fetch=mysqli_fetch_array($query))
            {
            ?>
        <div class="col-sm-4 mb-3">
           <div class="card" style="width: 18rem; height:320px;">
                <img src="admin/image/<?php echo $fetch['imgPath']; ?>" class="card-img-top" alt="children" style="width:100%; height:200px;">
                <div class="card-body">
                  <h5 class="card-title"><?php echo $fetch['name'] ?></h5>
                  <p class="card-text">I was born in  <?php echo $fetch['address']?> i Study at <?php echo $fetch['school'] ?> and am one of the children who lives at Alleluya Orphancare</p>
                </div>
            </div>
        </div> 
        <?php 
            }
        ?>
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