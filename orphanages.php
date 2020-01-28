<?php
include("admin/include/connect.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<link rel="shortcut icon" href="images/logo.png" type="image/png" />
	<title>Stepping Stones</title>
	<meta charset="utf-8">
	<link rel="stylesheet" href="style.css" type="text/css" media="all">
	<style type="text/css">
		.text_box2 {
			background: white;
			border: 1px double #DDD;
			border-radius: 5px;
			box-shadow: 0 0 5px #333;
			color: #666;
			float: left;
			padding: 5px 10px;
			width: 450px;
			outline: none;
			margin-top: 10px;
			width: 150px;
			margin-right: 200px;
		}

		.myButton {
			-moz-box-shadow: 2px 3px 31px 0px #1564ad;
			-webkit-box-shadow: 2px 3px 31px 0px #1564ad;
			box-shadow: 2px 3px 31px 0px #1564ad;
			background: -webkit-gradient(linear, left top, left bottom, color-stop(0.05, #79bbff), color-stop(1, #378de5));
			background: -moz-linear-gradient(top, #79bbff 5%, #378de5 100%);
			background: -webkit-linear-gradient(top, #79bbff 5%, #378de5 100%);
			background: -o-linear-gradient(top, #79bbff 5%, #378de5 100%);
			background: -ms-linear-gradient(top, #79bbff 5%, #378de5 100%);
			background: linear-gradient(to bottom, #79bbff 5%, #378de5 100%);
			filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#79bbff', endColorstr='#378de5', GradientType=0);
			background-color: #79bbff;
			-moz-border-radius: 4px;
			-webkit-border-radius: 4px;
			border-radius: 4px;
			border: 1px solid #337bc4;
			display: inline-block;
			cursor: pointer;
			color: #ffffff;
			font-family: arial;
			font-size: 17px;
			font-weight: bold;
			padding: 8px 71px;
			text-decoration: none;
			text-shadow: 40px 10px 0px #528ecc;
			margin-right: 320px;
		}
	</style>
	<script type="text/javascript" src="js/jquery-1.5.2.js"></script>
	<script type="text/javascript" src="js/cufon-yui.js"></script>
	<script type="text/javascript" src="js/cufon-replace.js"></script>
	<script type="text/javascript" src="js/Molengo_400.font.js"></script>
	<script type="text/javascript" src="js/Expletus_Sans_400.font.js"></script>
	<!--[if lt IE 9]>
<script type="text/javascript" src="js/html5.js"></script>
<style type="text/css">
	.bg, .box2 {behavior:url(js/PIE.htc)}
</style>
<![endif]-->
	<!--[if lt IE 7]>
	<div style=' clear: both; text-align:center; position: relative;'>
		<a href="http://www.microsoft.com/windows/internet-explorer/default.aspx?ocid=ie6_countdown_bannercode">
		<img src="http://www.theie6countdown.com/images/upgrade.jpg" border="0"  alt="" /></a>
	</div>
<![endif]-->
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

		<?php
		?>

		<!--end of wrapper-->
		<script type="text/javascript">
			Cufon.now();
		</script>
</body>

</html>
<?php
$req = isset($_REQUEST['mode']) ? $_REQUEST['mode'] : '';

if ($req == 'show_details') {
	$details = mysql_query("select a.name as name,a.address as address,a.city as city,a.phone as phone,(select count(gender) from inmates_details where id='" . $_REQUEST['o_id'] . "') as tc, (select count(gender) from inmates_details where gender='Male' and id='" . $_REQUEST['o_id'] . "') as mc, (select count(gender) from inmates_details where gender='Female' and id='" . $_REQUEST['o_id'] . "') as fc,(select max(age) from inmates_details where id='" . $_REQUEST['o_id'] . "'), (select max(age) from inmates_details where id='" . $_REQUEST['o_id'] . "') as maxage, (select min(age) from inmates_details where id='" . $_REQUEST['o_id'] . "') as minage from o_details as a inner join inmates_details as b on a.id=b.id where a.id='" . $_REQUEST['o_id'] . "'");
	$detail = mysql_fetch_array($details);
	?>
<div id="matter">
	<div id="content">
		<div id="left">

			<article class="col1" style="margin-left: 120px;width:700px; float:left;">

				<table width="100%">

					<tr style="margin-top:15px;">
						<td class="tex_td">Organisation Name </td>
						<td><input class="text_box2" id="nm" type="text" readonly value="<?php echo $detail['name'] ?>" />
						</td>
					</tr>
					<tr>
						<td class="tex_td">Address </td>
						<td><input name="address" class="text_box2" type="text" readonly value="<?php echo $detail['address'] ?>" /></td>
					</tr>
					<tr>
						<td class="tex_td">City </td>
						<td><input name="city" class="text_box2" type="text" readonly value="<?php echo $detail['city'] ?>" /></td>
					</tr>

					<tr>
						<td class="tex_td">Phone </td>
						<td><input name="Phone" class="text_box2" id="contno" type="text" readonly value="<?php echo $detail['phone'] ?>" /></td>
					</tr>
					<td class="tex_td">Number of boy inmates </td>
					<td><input name="Phone" class="text_box2" id="contno" type="text" readonly value="<?php echo $detail['mc'] ?>" /></td>
					</tr>
					<td class="tex_td">Number of girl inmates </td>
					<td><input name="Phone" class="text_box2" id="contno" type="text" readonly value="<?php echo $detail['fc'] ?>" /></td>
					</tr>
					<td class="tex_td">Total number of inmates </td>
					<td><input name="Phone" class="text_box2" id="contno" type="text" readonly value="<?php echo $detail['tc'] ?>" /></td>
					</tr>
					</tr>
					<td class="tex_td">Age group </td>
					<td><input name="Phone" class="text_box2" id="contno" type="text" readonly value="<?php echo $detail['minage'] . " - " . $detail['maxage']; ?>" /></td>
					</tr>
					<tr></tr>
					<tr></tr>
					<tr></tr>
					<tr></tr>
					<tr></tr>
					<tr></tr>
					<tr></tr>
					<tr>
						<td class="tex_td" colspan="2">
							<center>
								<a name="back" href="orphanages.php?mode=show_orphanages" value="Back" class="myButton">Back</a></center>
						</td>
					</tr>
				</table>
				<br />
				<div style="text-align:center;">
					<table border="0" cellpadding="0" cellspacing="0" style="text-align:center; width:300px; margin:auto;">
					</table>

			</article>
		</div>
		<!--end of left-->
	</div>
	<!--end of content-->
</div>
<?php
}
if ($req == 'show_orphanages') {
	?>
<div id="matter">
	<div id="content">
		<div id="left">
			<?php

				$query = mysql_query("select * from o_details where approved=1");
				while ($fetch = mysql_fetch_array($query)) {
					?>
			<div class="gimgnew">
				<a href="orphanages.php?o_id=<?php echo $fetch['id'] ?>&amp;mode=show_details"><img src="orphanage/image/<?php echo $fetch['imgPath'];  ?>" style="width:100px;height:100px"><br />

					<center><?php echo $fetch['name'];  ?><br>
					</center>
				</a>
			</div>
			<?php
				}
				?>
		</div>
		<!--end of left-->
		<?php
			include("include/right.php");
			?>
	</div>
	<!--end of content-->
</div>
<?php
}

include("include/footer.php");
?>
</div>