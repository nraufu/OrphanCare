<?PHP
$today=date('Y-m-d ');
session_start();
include ('include/connect.php');
$sql=mysqli_query($con,"insert into logbook (name,category,task,userType) values('".$_SESSION['member']."','logout','".$_SESSION['member']." logged out','Member')");
session_destroy();
header("Location:../essay.php");
?>