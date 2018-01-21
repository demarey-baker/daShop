<?php 
	session_start();
	if(isset($_SESSION['entryError']))
		unset($_SESSION['entryError']);
	if(isset($_SESSION['login'])){
		if($_SESSION['login'])
			header("location:index.php");
	}
	if(isset($_SESSION['activate_needed'])){
		unset($_SESSION['activate_needed']);
	}
	if(isset($_SESSION['activate_results'])){
		unset($_SESSION['activate_results']);
	}
	if(isset($_SESSION['account_exist'])){
		unset($_SESSION['account_exist']);
	}
	if(isset($_SESSION['temp_email'])){
		unset($_SESSION['temp_email']);
	}
	if(isset($_SESSION['passwordUpdated'])){
		echo $_SESSION['passwordUpdated'];
		unset($_SESSION['passwordUpdated']);
	}
?>
<!DOCTYPE html>
<html>
	<head>
		<title>daShop|Sign in</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link href="_/css/bootstrap.css" rel="stylesheet" media="screen">
		<link href="_/css/mystyle.css" rel="stylesheet" media="screen">
		<link rel="shortcut icon" href="images/icons/logo.ico">
	<head>
	<body id="signin">		
		<section id="middle_container">
			<?php include("signin/signinelements.php");?>
		</section>

		<?php include("partial/footerpartial.php");?>

		<script src="_/js/bootstrap.js"></script>
		<script src="_/js/myscript.js"></script>
	</body>
</html>