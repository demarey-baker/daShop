<?php 
	session_start();
	if(!isset($_SESSION['adminlogin'])){
		header("Location:admin.php");
	}

	if(isset($_SESSION['current_url'])){
		unset($_SESSION['current_url']);
	}
	$_SESSION['current_url'] = base64_encode($url="".$_SERVER['REQUEST_URI']);
?>
<!DOCTYPE html>
<html>
	<head>
		<title>admin@qRide|Users</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link href="_/css/bootstrap.css" rel="stylesheet" media="screen">
		<link href="_/css/adminstyle.css" rel="stylesheet" media="screen">
		<link rel="shortcut icon" href="images/icons/logo.ico">
		<!--Pagination adopted from github-->
		<script type="text/javascript" src="_/js/jquery-1.11.2.min.js"></script>
		<script type="text/javascript">
			$(document).ready(function() {
				$("#results" ).load( "admin@dashop/users.php"); //load initial records
				
				//executes code below when user click on pagination links
				$("#results").on( "click", ".pagination a", function (e){
					e.preventDefault();
					$(".loading-div").show(); //show loading element
					$("html, body").animate({ scrollTop: 100 }, "slow");
					var page = $(this).attr("data-page"); //get page number from link
					$("#results").load("admin@dashop/users.php",{"page":page}, function(){ //get content from PHP page
						$(".loading-div").hide(); //once done, hide loading element
					});
					
				});
			});
		</script>
	<head>
	<body id="adminusers">
		<div id="main1">
			<?php include("admin@dashop/admindashboard.php");?>
			<div id="main_container">
				<?php include("admin@dashop/adminusers.php");?>
				<div class="loading-div"><img src="images/icons/ajax-loader.gif" alt="ajax loader"></div>
			</div>
			<?php include("admin@dashop/adminfooter.php");?>
		</div>
		<script src="_/js/bootstrap.js"></script>
		<script src="_/js/adminsscript.js"></script>
	</body>
</html>