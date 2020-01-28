<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta name="description" content="">
<meta name="author" content="">

<title><?php echo $pagetitle ?></title>

<!-- Custom fonts for this template-->
<link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
<link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

<!-- Custom styles for this template-->
<link href="css/sb-admin-2.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css">

<script type="text/javascript">
  function val() {
    if (updateform.ureq.value == "" && updateform.event.value == "") {
      alert("Atleast one of the feild should be non-empty");
      return false;
    } else
      return true;
  }

  function valdate() {
    // Create date from input value
    var inputDate = new Date(updateform.date.value);

    // Get today's date
    var todaysDate = new Date();

    // call setHours to take the time out of the comparison
    if (inputDate.setHours(0, 0, 0, 0) < todaysDate.setHours(0, 0, 0, 0)) {
      alert("Invalid date");
      updateform.date.focus();
      return false;
    } else
      return true;
  }
</script>