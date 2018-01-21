<?php
	include_once("admin@dashop/initializedb.php");
	session_start();
	if(isset($_SESSION['adminlogin'])){
		header("Location:admin@admin.php");
	}
?>
<!DOCTYPE html>
<html>
	<head>
		<title>admin@daShop|Login</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link href="_/css/bootstrap.css" rel="stylesheet" media="screen">
		<link href="_/css/adminstyle.css" rel="stylesheet" media="screen">
		<link rel="shortcut icon" href="images/icons/logo.ico">
	<head>
	<body id="admin">
		<div id="main">
			<?php include("admin@dashop/adminheader.php");?>

			<?php include("admin@dashop/adminmiddle.php");?>

			<?php include("admin@dashop/adminfooter.php");?>
		</div>
		<script src="_/js/bootstrap.js"></script>
		<script src="_/js/adminsscript.js"></script>
	</body>
</html>