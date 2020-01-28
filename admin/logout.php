<?PHP
$today=date('Y-m-d ');
session_start();
include ('include/connect.php');
$sql=mysqli_query($con,"insert into logbook (name,category,task,userType) values('".$_SESSION['admin']."','logout','".$_SESSION['admin']." logged out ','Admin')");
session_destroy();
header("Location:../essay.php");
?>