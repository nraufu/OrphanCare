<?PHP

include("admin/include/connect.php");
if (isset($_SESSION['member'])) {
	header("Location:member/home.php");
} else if (isset($_SESSION['admin'])) {

	header("location:admin/home.php");
} else if (isset($_SESSION['sponsor'])) {

	header("location:index.php");
} else {
	$error = '';
	$offset = 5 * 60 * 60 + 1800;
	$dateFormat = "d/m/Y H:i";
	$timeNdate = gmdate($dateFormat, time() + $offset);
	date_default_timezone_set("Asia/Kolkata");
	$today = date('Y-m-d ');
	
	if (isset($_POST['user']) && ($_POST['user'] != '') && ($_POST['userType'] == 'member')) {
		$query = mysqli_query($con, "select * from member where email='" . $_POST['user'] . "' and orpPass='" . $_POST['pass'] . "' and approved='1'");
		$rows = mysqli_num_rows($query);
		if ($rows == 0) {
			$error = 'Username or Password is incorrect !!';
		} else {
			$fetch = mysqli_fetch_array($query);
			if ($fetch['orpPass'] == $_POST['pass']) {
				$_SESSION['member'] = $fetch['name'];
				$_SESSION['memberid'] = $fetch['id'];

				header('Location:member/home.php');
				$sql=mysqli_query($con,"insert into logbook (name,category,task,userType) values('".$_SESSION['member']."','login','".$_SESSION['member']." logged in','Member ')");
			} else {
				$error = 'Username or Password is incorrect !!';
			}
		}
	} else if (isset($_POST['user']) && ($_POST['user'] != '') && ($_POST['userType'] == 'admin')) {
		$query = mysqli_query($con, "select * from admin where designation='" . $_POST['user'] . "' and adminPass='" . $_POST['pass'] . "'");
		$rows = mysqli_num_rows($query);
		if ($rows == 0) {
			$error = 'Username or Password is incorrect !!';
		} else {
			$fetch = mysqli_fetch_array($query);
			if ($fetch['adminPass'] == $_POST['pass']) {
				$_SESSION['admin'] = $fetch['name'];
				$_SESSION['adminid'] = $fetch['id'];
				header('Location:admin/home.php?mode=show');
				$sql=mysqli_query($con,"insert into logbook (name,category,task,userType) values('".$_SESSION['admin']."','login','".$_SESSION['admin']." logged in','Admin')");
			} else {
				$error = 'Username or Password is incorrect !!';
			}
		}
	} else if (isset($_POST['user']) && ($_POST['user'] != '') && ($_POST['userType'] == 'sponsor')) {
		$query = mysqli_query($con, "select * from sponsor where email='" . $_POST['user'] . "' and orpPass='" . $_POST['pass'] . "'");
		$rows = mysqli_num_rows($query);
		if ($rows == 0) {
			$error = 'Username or Password is incorrect !!';
		} else {
			$fetch = mysqli_fetch_array($query);
			if ($fetch['orpPass'] == $_POST['pass']) {
				$_SESSION['sponsor'] = $fetch['f_name'];
				$_SESSION['sponsorid'] = $fetch['s_id'];
				header('Location:index.php');
				$sql=mysqli_query($con,"insert into logbook (name,category,task,userType) values('".$_SESSION['sponsor']."','login','".$_SESSION['sponsor']." logged in','Sponsor')");
			} else {
				$error = 'Username or Password is incorrect !!';
			}
		}
	}
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>Login Form</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<style>
		body {
			background: #EEE;

			.card {
				box-shadow: 0 10px 20px rgba(0, 0, 0, 0.19), 0 6px 6px rgba(0, 0, 0, 0.23);
			}
		}
	</style>

</head>

<body>
	<h1 class="text-center mt-5 text-info">Login</h1>
	<div class="container pt-3">
		<div class="row justify-content-sm-center">
			<div class="col-sm-10 col-md-6">
				<div class="card border-info">
					<div class="card-header">Sign in to continue</div>
					<div class="card-body">
						<div class="row">
							<div class="col-md-4 text-center">
								<img src="./images/logo.gif">
								<h4 class="text-center">Alleluya Orphancare Centre</h4>
							</div>
							<div class="col-md-8">
								<form class="form-signin" method="post">
									<div class="form-group">
										<input type="text" class="form-control mb-2" name="user" placeholder="Username" required autofocus>
									</div>
									<div class="form-group">
										<input type="password" class="form-control mb-2" name="pass" placeholder="Password" required>
									</div>

									<div class="form-group">
										<label for="userType">I'm a: </label>
										<input type="radio" name="userType" value="sponsor" class="custom-radio" required>&nbsp;Sponsor
										<input type="radio" name="userType" value="member" class="custom-radio" required>&nbsp;Member
										<input type="radio" name="userType" value="admin" class="custom-radio" required>&nbsp;Admin
									</div>

									<button class="btn btn-lg btn-info btn-block mb-1" type="submit" name="signin">Sign in</button>

									<h5 class="text-danger"><?php echo $error ?></h5>
								</form>
							</div>
						</div>

					</div>
				</div>
				<a href="./index.php" class="float-left"> Go Back </a>
				<a href="./forgot.php" class="float-right"> Forgot Password? </a>
			</div>
		</div>
	</div>

	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>