<?php 
	session_start();
	include_once("index/initializedb.php");
	include_once("search/updatesearch.php");
?>
<!DOCTYPE html>
<html>
	<head>
		<title>daShop|Home</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link href="_/css/bootstrap.css" rel="stylesheet" media="screen">
		<link href="_/css/mystyle.css" rel="stylesheet" media="screen">
		<link rel="shortcut icon" href="images/icons/logo.ico">
	<head>
	<body id="home">
		<?php include("global/header.php");?>

		<?php include("global/totop.php");?>
		
		<section class="middle_container"
			<div class="content row">

				<?php include("index/slider.php");?>

				<?php include("index/contactbar.php");?>

				<div id="todays_collection_area">
					 <p>Today's Collections</p>
				</div>

				<?php include("index/items.php");?>
			</div>

		</section>

		<?php include("global/footer.php");?>

		<script src="_/js/bootstrap.js"></script>
		<script src="_/js/smoothscroll.js"></script>
		<script src="_/js/myscript.js"></script>
		<script src="_/js/unslider.js"></script>
	</body>
</html>