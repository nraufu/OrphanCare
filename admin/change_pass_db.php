
<?PHP
include("include/connect.php");
$oldpass = $_POST['old_pass'];

$newpass = $_POST['new_pass'];

$confpass = $_POST['confirm_pass'];

if (empty($oldpass) || empty($newpass) || empty($confpass)) {
	$_REQUEST['empty'] = "empty";
	include("change_password1.php");
	exit;
}

if ($oldpass != "" && $newpass != "" && $confpass != "") {

	if ($newpass == $confpass) {
		$query = mysqli_query($con, "select name from admin where adminPass='$oldpass' and id='" . $_SESSION["adminid"] . "'");

		if (mysqli_affected_rows($con) > 0) {
			$update = mysqli_query($con, "update admin set adminPass='$newpass' where  adminPass='$oldpass' and id='" . $_SESSION["adminid"] . "'");

			if (mysqli_affected_rows($con) > 0) {
				$_REQUEST['change'] = "change";
				include("change_password1.php");
				exit;
			}
		} else {
			$_REQUEST['notold'] = "notold";
			include("change_password1.php");
			exit;
		}
	} else {
		$_REQUEST['notmatch'] = "notmatch";
		include("change_password1.php");
		exit;
	}
}

?>
