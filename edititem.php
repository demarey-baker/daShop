<?php 
	session_start();
	if(!isset($_SESSION['login'])||!isset($_SESSION['adminlogin'])){
		header("Location:signin.php");
	}
?>
<!DOCTYPE html>
<html>
	<head>
		<title>daShop|Edit shop items</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link href="_/css/bootstrap.css" rel="stylesheet" media="screen">
		<link href="_/css/mystyle.css" rel="stylesheet" media="screen">
		<link rel="shortcut icon" href="images/icons/logo.ico">
	<head>
	<body id="editshopitems">
		<?php include("global/header.php");?>
		
		<section class="middle_container"
			<div class="content row">
				<div id="breadcrumbs_area">
					<ol class="breadcrumb">
					  <li><a href="index.php">Home</a></li>
					  <li><a href="myaccount.php">My account</a></li>
					  <li><a href="myshopitems.php">My shop items</a></li>
					  <li class="active">Edit my shop items</li>
					</ol>
				</div>
				<?php include("account/edititems.php")?>
			</div>
		</section>

		<?php include("global/footer.php");?>

		<script src="_/js/bootstrap.js"></script>
		<script src="_/js/myscript.js"></script>
	</body>
</html>