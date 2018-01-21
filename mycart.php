<?php 
	session_start();

	if(isset($_SESSION['current_url'])){
		unset($_SESSION['current_url']);
	}
	$_SESSION['current_url'] = base64_encode($url="".$_SERVER['REQUEST_URI']);
	
	if(!isset($_SESSION['login'])){
		header("Location:signin.php");
	}
?>
<!DOCTYPE html>
<html>
	<head>
		<title>daShop|My cart</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link href="_/css/bootstrap.css" rel="stylesheet" media="screen">
		<link href="_/css/mystyle.css" rel="stylesheet" media="screen">
		<link rel="shortcut icon" href="images/icons/logo.ico">
	<head>
	<body id="mycart">
		<?php include("global/header.php");?>
		
		<section class="middle_container"
			<div class="content row">
				<div id="breadcrumbs_area">
					<ol class="breadcrumb">
					  <li><a href="index.php">Home</a></li>
					  <li><a href="myaccount.php">My account</a></li>
					  <li><a href="myitems.php">Items purchased</a></li>
					  <li class="active">My shopping cart</li>
					</ol>
				</div>
				<?php include("account/cart.php")?>
			</div>
		</section>

		<?php include("global/footer.php");?>

		<script src="_/js/bootstrap.js"></script>
		<script src="_/js/myscript.js"></script>
	</body>
</html>