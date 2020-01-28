<?php
include("admin/include/connect.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
<?php
$pagetitle="Events";
include('./include/libraries.php');
?>
</head>
<body>
<div id="wrapper">
<?php
$involvement = "active";
session_start();
include("include/navbar.php");
?>
<div class="container">
        <!--banner -->
        <?php 
        $icon="fa fa-calendar";
        $title="Events";
        $tdescription="Join Us";

        include ('./include/banner.php');
        ?>
        <!--end of banner -->
    

<table class="table table-striped table-dark rounded my-5">
  <thead>
  <tr>
  <th>Event</th>
  <th>Venue</th>
  <th>Date</th>
  <th>Time</th>
  </tr>
  </thead>
  <tbody>
  <?php
  $ev_ar=mysqli_query($con,"select name,venue,date,time from event where post_event=1 order by date asc");
  while($fetch=mysqli_fetch_array($ev_ar))
  {
  ?>
  <tr>
  <td><?php echo $fetch['name']; ?></td>
  <td><?php echo $fetch['venue']; ?></td>
  <td><?php echo $fetch['date']; ?></td>
  <td><?php echo $fetch['time']; ?></td>
  </tr>
<?php
}
?>
  </tbody>
</table>
</div>
<?php
include("include/footer.php");
?>
</div>

<script src="./js/jquery.slim.min.js"></script>
<script src="./js/popper.min.js"></script>
<script src="./js/bootstrap.min.js"></script>
</body>
</html>