<?php
include("admin/include/connect.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
<?php
$pagetitle = "Gallery";
include './include/libraries.php';
?>
</head>
<body>

<?php
$gallery ="active";
include("include/navbar.php");
?>
<div class="container">
        
        <!--banner -->
        <?php 
        $icon="fas fa-camera-retro";
        $title="Gallery";
        $tdescription="Memories are made to last";
        include ('./include/banner.php');
        ?>

        <!--end of banner -->
<div class="row">
   <div class="col">
     <h4 class="display-4 text-center text-warning">Memories</h4>
   </div>
</div>
<div class="row">
   <?php
$query=mysqli_query($con,"select * from gallery");
while($fetch=mysqli_fetch_array($query))
{
?>
<div class="col-md-4">
<a href="member/image/<?php echo $fetch['imgPath_home'];  ?>" rel="lightbox[gallery]">
<img class="rounded m-1" src="member/image/<?php echo $fetch['imgPath_home'];  ?>" style="width:350px;height:250px"></a>
</div>
<?php
}
?>

</div>

</div>

<!--footer -->
<?php include('./include/footer.php'); ?>
     <!--end of footer -->

<script src="./js/jquery.slim.min.js"></script>
<script src="./js/popper.min.js"></script>
<script src="./js/bootstrap.min.js"></script>
</body>
</html>