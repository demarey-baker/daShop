<div id="account_middle_container">
	<?php include("profileheader.php");?>
	<div class="profile_elements">
		<p>Items for sale (<a 
			title="You currently have <?php 
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
	</div>
	<div class="profile_elements">
		<p>Items purchased (<a href="myitems.php"><?php
		if(isset($_SESSION['cart_items'])&&isset($_SESSION['mypurchase']))
			echo ($_SESSION['mypurchase']+count($_SESSION['cart_items']));
		else if(isset($_SESSION['cart_items']))
			echo count($_SESSION['cart_items']);
		else if(isset($_SESSION['mypurchase']))
			echo $_SESSION['mypurchase'];
		else echo '0';
		?></a>)</p>
	</div>
	<br>
</div>