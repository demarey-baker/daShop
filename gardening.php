<?php session_start();?>
<!DOCTYPE html>
<html>
	<head>
		<title>daShop|Gardening</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link href="_/css/bootstrap.css" rel="stylesheet" media="screen">
		<link href="_/css/mystyle.css" rel="stylesheet" media="screen">
		<link rel="shortcut icon" href="images/icons/logo.ico">
	<head>
	<body id="gardening">
		<?php include("global/header.php");?>

		<?php include("global/totop.php");?>
		
		<section class="middle_container"
			<div class="content row">

				<div id="breadcrumbs_area">
					<ol class="breadcrumb">
					  <li><a href="index.php">Home</a></li>
					  <li class="active">Gardening</li>
					</ol>
				</div>				
			</div>
			
			<div id="category_items">
				<?php include("gardening/sidenav.php");?>
				<?php include("gardening/ordernav.php");?>
			</div>

		</section>

		<?php include("global/footer.php");?>

		<script src="_/js/bootstrap.js"></script>
		<script src="_/js/myscript.js"></script>
		<script src="_/js/smoothscroll.js"></script>
	</body>
</html>