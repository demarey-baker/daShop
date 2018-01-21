<?php 
	session_start();
	if(!isset($_SESSION['login'])){
		header("Location:signin.php");
	}
	if(isset($_SESSION['accountUpdated'])){
		echo $_SESSION['accountUpdated'];
		unset($_SESSION['accountUpdated']);
	}
	if(isset($_SESSION['passwordUpdated'])){
		echo $_SESSION['passwordUpdated'];
		unset($_SESSION['passwordUpdated']);
	}
?>
<!DOCTYPE html>
<html>
	<head>
		<title>daShop|Account</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link href="_/css/bootstrap.css" rel="stylesheet" media="screen">
		<link href="_/css/mystyle.css" rel="stylesheet" media="screen">
		<link rel="shortcut icon" href="images/icons/logo.ico">
	<head>
	<body id="myaccount">
		<?php include("global/header.php");?>
		
		<section class="middle_container"
			<div class="content row">
				<div id="breadcrumbs_area">
					<ol class="breadcrumb">
					  <li><a href="index.php">Home</a></li>
					  <li class="active">My account</li>
					</ol>
				</div>
				<?php include("account/accountelements.php")?>
			</div>
		</section>

		<?php include("global/footer.php");?>

		<script src="_/js/bootstrap.js"></script>
		<script src="_/js/myscript.js"></script>
	</body>
</html>