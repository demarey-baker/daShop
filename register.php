<?php 
	session_start();
	if(isset($_SESSION['login'])){
		if($_SESSION['login'])
			header("location:index.php");
	}
?>
<!DOCTYPE html>
<html>
	<head>
		<title>daShop|Register</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link href="_/css/bootstrap.css" rel="stylesheet" media="screen">
		<link href="_/css/mystyle.css" rel="stylesheet" media="screen">
		<link rel="shortcut icon" href="images/icons/logo.ico">
	<head>
	<body id="signup">
		<?php //include("partial/headerpartial.php");?>
		
		<section id="middle_container">
			<?php include("register/signupelements.php");?>
		</section>

		<?php include("partial/footerpartial.php");?>

		<script src="_/js/bootstrap.js"></script>
		<script src="_/js/myscript.js"></script>
	</body>
</html>