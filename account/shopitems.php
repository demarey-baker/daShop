<div id="account_middle_container">
	<?php //include("profileheader.php");?>
	<div id="add_elements">
		<p>What i'm selling (<a title="You currently have <?php 
					$daShopConn=mysqli_connect("localhost","root","","dashop");
					if($daShopConn){
						echo ''.mysqli_num_rows(mysqli_query($daShopConn,"SELECT * from automobiles
						 where ProductSellerID=".$_SESSION['uID']."")).'';
						mysqli_close($daShopConn);
					}
					else 
						echo '<script>alert("Error connecting, please try again");</script>';?> items" href="myshopitems.php"><?php 
					$daShopConn=mysqli_connect("localhost","root","","dashop");
					if($daShopConn){
						echo ''.mysqli_num_rows(mysqli_query($daShopConn,"SELECT * from automobiles
						 where ProductSellerID=".$_SESSION['uID']."")).'';
						mysqli_close($daShopConn);
					}
					else 
						echo '<script>alert("Error connecting, please try again");</script>';?></a>)</p>
		<div id="add_products"><a href="addproducts.php"><button id="add_products_button" type="button">Add products</button></a></div>
	</div>
	<div id="my_shop_items_middle_container">
		<?php include("account/myitems.php");?>
	</div>
</div>