<?PHP
	$host="localhost";
	$user="root";
	$password="";
	$con=mysqli_connect($host,$user,$password);
	mysqli_select_db($con,'orphandb');
	if(!$con)
		{
		 die('Could not connect: ' . mysql_error());
		}
?>
