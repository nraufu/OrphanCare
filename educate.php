<?php
include("include/connect.php");
session_start();
if(!isset($_SESSION['user']))
	header("location: user_login.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
<link rel="shortcut icon" href="images/logo.png" type="image/png"/>
<title>Stepping Stones</title>
<meta charset="utf-8">
<link rel="stylesheet" href="style.css" type="text/css" media="all">
<link rel="stylesheet" href="othercss.css" type="text/css" media="all">
<script type="text/javascript" src="js/jquery-1.5.2.js" ></script>
<script type="text/javascript" src="js/cufon-yui.js"></script>
<script type="text/javascript" src="js/cufon-replace.js"></script>
<script type="text/javascript" src="js/Molengo_400.font.js"></script>
<script type="text/javascript" src="js/Expletus_Sans_400.font.js"></script>
<style type="text/css">
  .tbl
  {
    background: white;
    border-collapse: collapse;
    margin-left: auto;
    margin-right: auto;
    padding: 10px;
    border: 1px solid black;
    color: black;
  }
</style>
</head>
<body>
<div id="wrapper">
<?php
include("include/header.php");
?>
<div id="slider">
<!-- <img src="images/bg_top_img3.jpg" /> -->
</div>
<!--end of slider-->
<div id="matter">
<div id="content" style="background-color:#FFFFFF;">
<article class="col1" style="margin-left: 120px;width:700px; float:left;">
						
		<form action="educate.php?mode=view_students" enctype="multipart/form-data" onSubmit="return validateform();" method="post">
		<br /><br />
		<h2>Educate a child</h2><br><br />
				<table width="100%" align="center">

<tr><td class="tex_td">Schooling type</td>
<td>
	<select class="text_box2" name="school_type" required>
		<option>--select--</option>
		<option value="School">School</option>
		<option value="UG">Under Graduate</option>
		<option value="PG">Post Graduate</option>
	</select>
</td></tr>


</table>
<br />
<div style="text-align:center;">


<input name="Submit" type="submit" value="View" class="myButton"/>
<br>
<br /><br />
									
								</form>
					</article>

	<?php
	$req=isset($_REQUEST['mode']) ? $_REQUEST['mode'] :'';
	if($req=='view_students')
	{
		?>
		<div>
<table class="tbl">
<tr>
<th class="tbl">Name</th>
<th class="tbl">Age</th>
<th class="tbl">Orphanage</th>
<th class="tbl">Gender</th>
<th class="tbl">Grade</th>
<th class="tbl">Institution</th>
<th class="tbl">Approximate fees</th>
<th class="tbl"></th>
</tr>
		<?php
		$sql= mysql_query("select a.s_id as s_id, a.name as name, b.name as orpname, a.age as age, a.gender as gender, a.grade as grade, a.institution as institution, a.approx_fees as fees from inmates_details as a inner join o_details as b on a.id=b.id where stud_type='".$_POST['school_type']."'");
		if(mysql_affected_rows()==0)
		{
			?>
			<tr>
				<td class="tbl" colspan=8 style="height: 40px;"><center>No record found...</center></td>
			</tr>
			<?php
		}
		while($fetch=mysql_fetch_array($sql))
		{
			?>
			<tr>
			<td class="tbl"><?php echo $fetch['name']; ?></td>
			<td class="tbl"><?php echo $fetch['age']; ?></td>
			<td class="tbl"><?php echo $fetch['orpname']; ?></td>
			<td class="tbl"><?php echo $fetch['gender']; ?></td>
			<td class="tbl"><?php echo $fetch['grade']; ?></td>
			<td class="tbl"><?php echo $fetch['institution']; ?></td>
			<td class="tbl"><?php echo $fetch['fees']; ?></td>
			<td class="tbl"><a href="pay2educate.php?sid=<?php echo $fetch['s_id']; ?>&amp;amount=<?php echo $fetch['fees']; ?>">Donate</a></td>
			</tr>
			<?php
		}
		?>
		</table><br><br><br><br>
		</div>
		<?php
	}
	?>

</div>
<!--end of content-->
</div>
<!--end of matter-->
<?php
include("include/footer.php");
?>
</div>
<!--end of wrapper-->
<script type="text/javascript"> Cufon.now(); </script>
</body>
</html>
