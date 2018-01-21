<?php
	session_start();
	if(isset($_SESSION['activate_needed'])){
		if(!$_SESSION['activate_needed']){
			header("Location:signin.php");
		}
	}
	if(!isset($_SESSION['activate_needed'])){
		header("Location:signin.php");
	}
?>
<!DOCTYPE html>
<html>
	<head>
		<title>daShop|Activate account</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link href="_/css/bootstrap.css" rel="stylesheet" media="screen">
		<link href="_/css/mystyle.css" rel="stylesheet" media="screen">
		<link rel="shortcut icon" href="images/icons/logo.ico">
	<head>
	<body id="activateaccount">
		<?php include("partial/headerpartial.php");?>
		
		<section id="middle_container"
			<div class="content row">
				<?php include("account/activate.php");?>
			</div>
		</section>

		<?php include("partial/footerpartial.php");?>

		<script src="_/js/bootstrap.js"></script>
		<script src="_/js/myscript.js"></script>
	</body>
</html>