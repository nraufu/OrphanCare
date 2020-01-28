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
.text_box2{
    background: white;
    border: 1px double #DDD;
    border-radius: 5px;
    box-shadow: 0 0 5px #333;
    color: #666;
    float: left;
    padding: 5px 10px;
    width: 450px;
    outline: none;
     margin-top:10px;
     width: 70%;
}
  .tbl
  {
    background: white;
    border-collapse: collapse;
    margin-left: auto;
    margin-right: auto;
    padding: 10px;
    color: black;
    width:50%;
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
<br><br>
<form action="adopt.php?mode=search" method="post">
	<table class="tbl">
	<tr>
		<td>Age: </td>
		<td><select class="text_box2" name="age_group">
		<option value="0">Any</option>
		<option value="1">0 - 5 years</option>
		<option value="2">5 - 10 years</option>
		<option value="3">10 - 15 years</option>
		<option value="4">Above 15</option>
	</select></td>
	</tr>
	<tr>
		<td>Gender: </td>
		<td><select class="text_box2" name="gender">
		<option value="Any">Any</option>
		<option value="Male">Male</option>
		<option value="Female">Female</option>
	</select></td>
	</tr>
	</table>
<br><br>
	<table class="tbl">
	<tr>
		<td colspan="2"><center><input type="submit" name="submit" value="Search" class="myButton"></center></td>
	</tr>
	</table><br><br><br>
</form>
<?php
$req=isset($_REQUEST['mode']) ? $_REQUEST['mode'] :'';
	if($req=='search')
	{
		if($_POST['age_group']==0)
		{
			if($_POST['gender']=='Any')
			{
			?>
			<table class="tbl">
			<tr>
			<th class="tbl">Name</th>
			<th class="tbl">Age</th>
			<th class="tbl">Gender</th>
			<th class="tbl">Orphanage</th>
			<th class="tbl">Grade</th>
			</tr>
			<?php
			$sql=mysql_query("select a.name as name, b.name as orpname, a.gender as gender, a.age as age, a.grade as grade from inmates_details as a inner join o_details as b on a.id=b.id where a.isapproved=1");
			if(mysql_num_rows($sql)==0)
			{
				?>
				<tr><td class="tbl" colspan="5" rowspan="2">Sorry, No data available. Try Modifying search criteria</td></tr>
				<?php
			}
			else
			{
			while($fetch=mysql_fetch_array($sql))
			{
				?>
				<tr>
				<td class="tbl"><?php echo $fetch['name']; ?></td>
				<td class="tbl"><?php echo $fetch['age']; ?></td>
				<td class="tbl"><?php echo $fetch['gender']; ?></td>
				<td class="tbl"><?php echo $fetch['orpname']; ?></td>
				<td class="tbl"><?php echo $fetch['grade']; ?></td>
				</tr>
				<?php
			}
		}
			?>
			</table>
			<?php
			}
			else
			{
			?>
			<table class="tbl">
			<tr>
			<th class="tbl">Name</th>
			<th class="tbl">Age</th>
			<th class="tbl">Gender</th>
			<th class="tbl">Orphanage</th>
			<th class="tbl">Grade</th>
			</tr>
			<?php
			$sql=mysql_query("select a.name as name, b.name as orpname, a.gender as gender, a.age as age, a.grade as grade from inmates_details as a inner join o_details as b on a.id=b.id where a.gender='".$_POST['gender']."' and a.isapproved=1");
				if(mysql_num_rows($sql)==0)
			{
				?>
				<tr><td class="tbl" colspan="5" rowspan="2">Sorry, No data available. Try Modifying search criteria</td></tr>
				<?php
			}
			else
			{
			while($fetch=mysql_fetch_array($sql))
			{
				?>
				<tr>
				<td class="tbl"><?php echo $fetch['name']; ?></td>
				<td class="tbl"><?php echo $fetch['age']; ?></td>
				<td class="tbl"><?php echo $fetch['gender']; ?></td>
				<td class="tbl"><?php echo $fetch['orpname']; ?></td>
				<td class="tbl"><?php echo $fetch['grade']; ?></td>
				</tr>
				<?php
			}
		}
			?>
			</table>
			<?php				
			}
		}
		else if($_POST['age_group']==1)
		{
			if($_POST['gender']=='Any')
			{
			?>
			<table class="tbl">
			<tr>
			<th class="tbl">Name</th>
			<th class="tbl">Age</th>
			<th class="tbl">Gender</th>
			<th class="tbl">Orphanage</th>
			<th class="tbl">Grade</th>
			</tr>
			<?php
			$sql=mysql_query("select a.name as name, b.name as orpname, a.gender as gender, a.age as age, a.grade as grade from inmates_details as a inner join o_details as b on a.id=b.id where a.age<5 and a.isapproved=1");
				if(mysql_num_rows($sql)==0)
			{
				?>
				<tr><td class="tbl" colspan="5" rowspan="2">Sorry, No data available. Try Modifying search criteria</td></tr>
				<?php
			}
			else
			{
			while($fetch=mysql_fetch_array($sql))
			{
				?>
				<tr>
				<td class="tbl"><?php echo $fetch['name']; ?></td>
				<td class="tbl"><?php echo $fetch['age']; ?></td>
				<td class="tbl"><?php echo $fetch['gender']; ?></td>
				<td class="tbl"><?php echo $fetch['orpname']; ?></td>
				<td class="tbl"><?php echo $fetch['grade']; ?></td>
				</tr>
				<?php
			}
		}			?>
			</table>
			<?php
			}
			else
			{
			?>
			<table class="tbl">
			<tr>
			<th class="tbl">Name</th>
			<th class="tbl">Age</th>
			<th class="tbl">Gender</th>
			<th class="tbl">Orphanage</th>
			<th class="tbl">Grade</th>
			</tr>
			<?php
			$sql=mysql_query("select a.name as name, b.name as orpname, a.gender as gender, a.age as age, a.grade as grade from inmates_details as a inner join o_details as b on a.id=b.id where a.gender='".$_POST['gender']."' and a.age<5 and a.isapproved=1");
				if(mysql_num_rows($sql)==0)
			{
				?>
				<tr><td class="tbl" colspan="5" rowspan="2">Sorry, No data available. Try Modifying search criteria</td></tr>
				<?php
			}
			else
			{
			while($fetch=mysql_fetch_array($sql))
			{
				?>
				<tr>
				<td class="tbl"><?php echo $fetch['name']; ?></td>
				<td class="tbl"><?php echo $fetch['age']; ?></td>
				<td class="tbl"><?php echo $fetch['gender']; ?></td>
				<td class="tbl"><?php echo $fetch['orpname']; ?></td>
				<td class="tbl"><?php echo $fetch['grade']; ?></td>
				</tr>
				<?php
			}
		}
			?>
			</table>
			<?php				
			}
		}
		else if($_POST['age_group']==2)
		{
			if($_POST['gender']=='Any')
			{
			?>
			<table class="tbl">
			<tr>
			<th class="tbl">Name</th>
			<th class="tbl">Age</th>
			<th class="tbl">Gender</th>
			<th class="tbl">Orphanage</th>
			<th class="tbl">Grade</th>
			</tr>
			<?php
			$sql=mysql_query("select a.name as name, b.name as orpname, a.gender as gender, a.age as age, a.grade as grade from inmates_details as a inner join o_details as b on a.id=b.id where a.age>=5 and a.age<=10 and a.isapproved=1");
				if(mysql_num_rows($sql)==0)
			{
				?>
				<tr><td class="tbl" colspan="5" rowspan="2">Sorry, No data available. Try Modifying search criteria</td></tr>
				<?php
			}
			else
			{
			while($fetch=mysql_fetch_array($sql))
			{
				?>
				<tr>
				<td class="tbl"><?php echo $fetch['name']; ?></td>
				<td class="tbl"><?php echo $fetch['age']; ?></td>
				<td class="tbl"><?php echo $fetch['gender']; ?></td>
				<td class="tbl"><?php echo $fetch['orpname']; ?></td>
				<td class="tbl"><?php echo $fetch['grade']; ?></td>
				</tr>
				<?php
			}
		}
			?>
			</table>
			<?php
			}
			else
			{
			?>
			<table class="tbl">
			<tr>
			<th class="tbl">Name</th>
			<th class="tbl">Age</th>
			<th class="tbl">Gender</th>
			<th class="tbl">Orphanage</th>
			<th class="tbl">Grade</th>
			</tr>
			<?php
			$sql=mysql_query("select a.name as name, b.name as orpname, a.gender as gender, a.age as age, a.grade as grade from inmates_details as a inner join o_details as b on a.id=b.id where a.gender='".$_POST['gender']."' and a.age>=5 and a.age<=10 and a.isapproved=1");
				if(mysql_num_rows($sql)==0)
			{
				?>
				<tr><td class="tbl" colspan="5" rowspan="2">Sorry, No data available. Try Modifying search criteria</td></tr>
				<?php
			}
			else
			{
			while($fetch=mysql_fetch_array($sql))
			{
				?>
				<tr>
				<td class="tbl"><?php echo $fetch['name']; ?></td>
				<td class="tbl"><?php echo $fetch['age']; ?></td>
				<td class="tbl"><?php echo $fetch['gender']; ?></td>
				<td class="tbl"><?php echo $fetch['orpname']; ?></td>
				<td class="tbl"><?php echo $fetch['grade']; ?></td>
				</tr>
				<?php
			}
		}
			?>
			</table>
			<?php				
			}
		}
		else if($_POST['age_group']==3)
		{
			if($_POST['gender']=='Any')
			{
			?>
			<table class="tbl">
			<tr>
			<th class="tbl">Name</th>
			<th class="tbl">Age</th>
			<th class="tbl">Gender</th>
			<th class="tbl">Orphanage</th>
			<th class="tbl">Grade</th>
			</tr>
			<?php
			$sql=mysql_query("select a.name as name, b.name as orpname, a.gender as gender, a.age as age, a.grade as grade from inmates_details as a inner join o_details as b on a.id=b.id where a.age>=10 and a.age<=15 and a.isapproved=1");
				if(mysql_num_rows($sql)==0)
			{
				?>
				<tr><td class="tbl" colspan="5" rowspan="2">Sorry, No data available. Try Modifying search criteria</td></tr>
				<?php
			}
			else
			{
			while($fetch=mysql_fetch_array($sql))
			{
				?>
				<tr>
				<td class="tbl"><?php echo $fetch['name']; ?></td>
				<td class="tbl"><?php echo $fetch['age']; ?></td>
				<td class="tbl"><?php echo $fetch['gender']; ?></td>
				<td class="tbl"><?php echo $fetch['orpname']; ?></td>
				<td class="tbl"><?php echo $fetch['grade']; ?></td>
				</tr>
				<?php
			}
		}
			?>
			</table>
			<?php
			}
			else
			{
			?>
			<table class="tbl">
			<tr>
			<th class="tbl">Name</th>
			<th class="tbl">Age</th>
			<th class="tbl">Gender</th>
			<th class="tbl">Orphanage</th>
			<th class="tbl">Grade</th>
			</tr>
			<?php
			$sql=mysql_query("select a.name as name, b.name as orpname, a.gender as gender, a.age as age, a.grade as grade from inmates_details as a inner join o_details as b on a.id=b.id where a.gender='".$_POST['gender']."' and a.age>=10 and a.age<=15 and a.isapproved=1");
				if(mysql_num_rows($sql)==0)
			{
				?>
				<tr><td class="tbl" colspan="5" rowspan="2">Sorry, No data available. Try Modifying search criteria</td></tr>
				<?php
			}
			else
			{
			while($fetch=mysql_fetch_array($sql))
			{
				?>
				<tr>
				<td class="tbl"><?php echo $fetch['name']; ?></td>
				<td class="tbl"><?php echo $fetch['age']; ?></td>
				<td class="tbl"><?php echo $fetch['gender']; ?></td>
				<td class="tbl"><?php echo $fetch['orpname']; ?></td>
				<td class="tbl"><?php echo $fetch['grade']; ?></td>
				</tr>
				<?php
			}
		}
			?>
			</table>
			<?php				
			}
		}
		else if($_POST['age_group']==4)
		{
			if($_POST['gender']=='Any')
			{
			?>
			<table class="tbl">
			<tr>
			<th class="tbl">Name</th>
			<th class="tbl">Age</th>
			<th class="tbl">Gender</th>
			<th class="tbl">Orphanage</th>
			<th class="tbl">Grade</th>
			</tr>
			<?php
			$sql=mysql_query("select a.name as name, b.name as orpname, a.gender as gender, a.age as age, a.grade as grade from inmates_details as a inner join o_details as b on a.id=b.id where a.age>=15 and a.isapproved=1");
			if(mysql_num_rows($sql)==0)
			{
				?>
				<td class="tbl" colspan="5" rowspan="2">Sorry, No data available. Try Modifying search criteria</td>
				<?php
			}
			else
			{
				if(mysql_num_rows($sql)==0)
			{
				?>
				<tr><td class="tbl" colspan="5" rowspan="2">Sorry, No data available. Try Modifying search criteria</td></tr>
				<?php
			}
			else
			{
			while($fetch=mysql_fetch_array($sql))
			{
				?>
				<tr>
				<td class="tbl"><?php echo $fetch['name']; ?></td>
				<td class="tbl"><?php echo $fetch['age']; ?></td>
				<td class="tbl"><?php echo $fetch['gender']; ?></td>
				<td class="tbl"><?php echo $fetch['orpname']; ?></td>
				<td class="tbl"><?php echo $fetch['grade']; ?></td>
				</tr>
				<?php
			}
		}
		}
			?>
			</table>
			<?php
			}
			else
			{
			?>
			<table class="tbl">
			<tr>
			<th class="tbl">Name</th>
			<th class="tbl">Age</th>
			<th class="tbl">Gender</th>
			<th class="tbl">Orphanage</th>
			<th class="tbl">Grade</th>
			</tr>
			<?php
			$sql=mysql_query("select a.name as name, b.name as orpname, a.gender as gender, a.age as age, a.grade as grade from inmates_details as a inner join o_details as b on a.id=b.id where a.gender='".$_POST['gender']."' and a.age>=15 a.isapproved=1");
				if(mysql_num_rows($sql)==0)
			{
				?>
				<tr><td class="tbl" colspan="5" rowspan="2">Sorry, No data available. Try Modifying search criteria</td></tr>
				<?php
			}
			else
			{
			while($fetch=mysql_fetch_array($sql))
			{
				?>
				<tr>
				<td class="tbl"><?php echo $fetch['name']; ?></td>
				<td class="tbl"><?php echo $fetch['age']; ?></td>
				<td class="tbl"><?php echo $fetch['gender']; ?></td>
				<td class="tbl"><?php echo $fetch['orpname']; ?></td>
				<td class="tbl"><?php echo $fetch['grade']; ?></td>
				</tr>
				<?php
			}
		}
			?>
			</table><br><br>
			<?php				
			}
		}
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
