<?PHP
date_default_timezone_set("Asia/Kolkata");
$today=date('Y-m-d ');
session_start();
include ('./include/connect.php');
$sql=mysqli_query($con,"insert into logbook (name,category,task,userType) values('".$_SESSION['sponsor']."','logOut','".$_SESSION['sponsor']." logged Out','Sponsor ')");
session_destroy();
header("Location:index.php");
?>