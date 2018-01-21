<?php 
	session_start();
	if(!isset($_SESSION['login'])){
		header("Location:signin.php");
	}
?>
<!DOCTYPE html>
<html>
	<head>
		<title>daShop|Deactivate account</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link href="_/css/bootstrap.css" rel="stylesheet" media="screen">
		<link href="_/css/mystyle.css" rel="stylesheet" media="screen">
		<link rel="shortcut icon" href="images/icons/logo.ico">
	<head>
	<body id="killprofile">
		<?php include("partial/headerpartial.php");?>
		
		<section id="middle_container"
			<div class="content row">
				<?php include("account/killelements.php");?>
			</div>
		</section>

		<?php include("partial/footerpartial.php");?>

		<script src="_/js/bootstrap.js"></script>
		<script src="_/js/myscript.js"></script>
	</body>
</html>