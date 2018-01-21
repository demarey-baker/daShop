<?php 
	session_start();
	if(isset($_GET['q'])){
		$_SESSION['search_q']=$_GET['q'];
	}//end if
	else{
		header('Location:index.php');
	}//end else
	if(isset($_SESSION['current_url'])){
		unset($_SESSION['current_url']);
	}//end if
	$_SESSION['current_url'] = base64_encode($url="".$_SERVER['REQUEST_URI']);
?>
<!DOCTYPE html>
<html>
	<head>
		<title>daShop|Search results</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link href="_/css/bootstrap.css" rel="stylesheet" media="screen">
		<link href="_/css/mystyle.css" rel="stylesheet" media="screen">
		<link rel="shortcut icon" href="images/icons/logo.ico">
		<!--Pagination adopted from github-->
		<script type="text/javascript" src="_/js/jquery-1.11.2.min.js"></script>
		<script type="text/javascript">
			$(document).ready(function() {
				$("#results" ).load( "search/product.php"); //load initial records
				
				//executes code below when user click on pagination links
				$("#results").on( "click", ".pagination a", function (e){
					e.preventDefault();
					$(".loading-div").show(); //show loading element
					$("html, body").animate({ scrollTop: 195 }, "slow");
					var page = $(this).attr("data-page"); //get page number from link
					$("#results").load("search/product.php",{"page":page}, function(){ //get content from PHP page
						$(".loading-div").hide(); //once done, hide loading element
					});
					
				});
			});
		</script>
	<head>
	<body id="searchresults">
		<?php include("global/header.php");?>

		<?php include("global/totop.php");?>
		
		<section class="middle_container"
			<div class="content row">
				<div id="breadcrumbs_area">
					<ol class="breadcrumb">
					  <li><a href="index.php">Home</a></li>
					  <li class="active">Search results</li>
					</ol>
				</div>
			</div>

			<div id="category_items">
				<?php include("search/sidenav.php");?>
				<?php include("search/ordernav.php");?>

				<div class="loading-div"><img src="images/icons/ajax-loader.gif" alt="ajax loader"></div>
				<div id="results"></div>
			</div>
			
		</section>

		<?php include("global/footer.php");?>

		<script src="_/js/bootstrap.js"></script>
		<script src="_/js/myscript.js"></script>
		<script src="_/js/smoothscroll.js"></script>
	</body>
</html>