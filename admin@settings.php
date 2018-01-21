<?php
	session_start();
	if(!isset($_SESSION['adminlogin'])){
		header("Location:admin.php");
	}
?>
<!DOCTYPE html>
<html>
	<head>
		<title>admin@daShop|Settings</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link href="_/css/bootstrap.css" rel="stylesheet" media="screen">
		<link href="_/css/adminstyle.css" rel="stylesheet" media="screen">
		<link rel="shortcut icon" href="images/icons/logo.ico">
	<head>
	<body id="adminsettings">
		<div id="main1">
			<?php include("admin@dashop/admindashboard.php");?>
			<div id="main_container">
				<?php include("admin@dashop/adminsettings.php");?>
			</div>
			<?php include("admin@dashop/adminfooter.php");?>
		</div>
		<script src="_/js/bootstrap.js"></script>
		<script src="_/js/adminsscript.js"></script>
	</body>
</html>