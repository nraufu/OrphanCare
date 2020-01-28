<?php
include('connect.php');
?>
<title>
	<?php echo $pagetitle; ?>
</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<link rel="title icon" type="image/png" href="./images/logo.gif">
<script type="text/javascript" src="js/jquery-1.5.2.js"></script>
<script type="text/javascript" src="js/cufon-yui.js"></script>
<script type="text/javascript" src="js/cufon-replace.js"></script>
<script type="text/javascript" src="js/Molengo_400.font.js"></script>
<script type="text/javascript" src="js/Expletus_Sans_400.font.js"></script>
<script type="text/javascript" src="jss/jquery-1.6.min.js"></script>
<script src="jss/cufon-yui.js" type="text/javascript"></script>
<script src="jss/cufon-replace.js" type="text/javascript"></script>
<script src="jss/Open_Sans_400.font.js" type="text/javascript"></script>
<script src="jss/Open_Sans_Light_300.font.js" type="text/javascript"></script>
<script src="jss/Open_Sans_Semibold_600.font.js" type="text/javascript"></script>
<script src="jss/FF-cash.js" type="text/javascript"></script>
<script type="text/javascript" src="jss/jquery.min.js"></script>
<link rel="stylesheet" href="css/slimbox2.css" type="text/css" media="screen" />
<script type="text/javascript" src="https://code.jquery.com/jquery-1.9.1.min.js"></script>
<script type="text/JavaScript" src="jss/slimbox2.js"></script>
<script type="application/x-javascript">
	addEventListener("load", function() {
		setTimeout(hideURLbar, 0);
	}, false);

	function hideURLbar() {
		window.scrollTo(0, 1);
	}
</script>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Payment Form Widget Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<script type="application/x-javascript">
	addEventListener("load", function() {
		setTimeout(hideURLbar, 0);
	}, false);

	function hideURLbar() {
		window.scrollTo(0, 1);
	}
</script>
<link rel="stylesheet" href="./css/bootstrap.min.css">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css">
<link rel="stylesheet" href="./css/style.css">

<script type="text/javascript">
	function phone(elem, helpMsg) {
		if (elem.value.length == 10) {
			return true;
		}

		alert(helpMsg);
		elem.focus();
		return false;
	}

	function isAlphabat(elem, helpMsg) {
		var alphaExp = /^[a-zA-Z]+$/;

		if (elem.value.match(alphaExp)) {
			return true;
		} else {
			alert(helpMsg);
			elem.value = "";
			elem.focus();
			return false;
		}

	}

	function emailValidator(elem, helpMsg) {
		var emailExp = /^[\w\-\.\+]+\@[a-zA-Z0-9\.\-]+\.[a-zA-Z0-9]{2,4}$/;
		if (elem.value.match(emailExp)) {
			return true;
		} else {
			alert(helpMsg);
			elem.value = "";
			elem.focus();
			return false;
		}
	}

	function length_val(elem, len, helpMsg) {
		if (elem.value.length < len) {
			alert(helpMsg);
			elem.focus();
			return false;
		} else
			return true;
	}

	function val_pword(elem1, elem2, helpMsg) {
		if (elem1.value == elem2.value)
			return true;
		else {
			alert(helpMsg);
			elem2.focus();
			return false;
		}
	}



	function validateform() {
		if (!isAlphabat(user_reg.First_Name, "Enter valid First Name"))
			return false;
		if (!isAlphabat(user_reg.Last_Name, "Enter valid Last Name"))
			return false;
		if (!emailValidator(user_reg.Email_id, "Enter valid Email"))
			return false;
		if (!phone(user_reg.phone, "Enter valid phone number"))
			return false;
		if (!exEmail(user_reg.Email_id, "Email already exist"))
			return false;
		alert("Successfully Registered");
		return true;
	}
</script>

<script type="text/javascript">
	function validateform() {
		if (donate.amount.value < 50) {
			alert("Minimum amount is 50$");
			donate.amount.focus();
			return false;
		} else
			return true;
	}
</script>
<script type="text/javascript">
	function notEmpty(elem, helpMsg) {
		if (elem.value.length == 0) {

			alert(helpMsg);
			elem.focus();
			return false;
		}
		return true;
	}

	function phone(elem, helpMsg) {
		if (elem.value.length == 10) {
			return true;

		}

		alert(helpMsg);
		elem.focus();
		return false;
	}


	function isAlphabat(elem, helpMsg) {
		var alphaExp = /^[a-zA-Z]+$/;
		var alphaExp2 = /^[a-zA-Z-,]+(\s{0,1}[a-zA-Z-, ])*$/;

		if (elem.value.match(alphaExp) || elem.value.match(alphaExp2)) {
			return true;
		} else {
			alert(helpMsg);
			elem.value = "";
			elem.focus();
			return false;
		}

	}


	function validateform() {
		if (!isAlphabat(orp_reg.name, "Enter valid First Name"))
			return false;
		if (!phone(orp_reg.Phone, "Enter valid phone number"))
			return false;

		if (!validate())
			return false;
		return true;
	}
</script>

<script>
	function validate() {
		var filename = document.getElementById('file').value;
		var extension = filename.substr(filename.lastIndexOf('.') + 1).toLowerCase();
		//alert(extension);
		if (extension == 'doc' || extension == 'docx' || extension == 'pdf') {
			return true;
		} else {
			alert('Please Upload doc/docx/pdf File');
			return false;
		}
	}
</script>