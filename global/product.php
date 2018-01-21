<?php 
	$daShopConn=mysqli_connect("localhost","root","","dashop");
			
	if($daShopConn){
		$autoItems="SELECT AutoNum_ID, ItemName, Price, Product_Img, ProductOverlay, DateAdded, ItemStatus, ProductSellerID from automobiles ORDER BY AutoNum_ID DESC";
		$selectAutoItems=mysqli_query($daShopConn,$autoItems);

		if($selectAutoItems){
			if(mysqli_num_rows($selectAutoItems)>0){
				while($row=mysqli_fetch_assoc($selectAutoItems)){
					echo '<div id="product_item">';
					echo '<div id="product_img">';
					echo '<div id="product_img_img"><img src="'.$row['Product_Img'].'" height="100%" width="100%"></div>';
					echo '<div id="product_overlay">';
					echo ''.$row['ProductOverlay'].'';
					echo '</div>';
					echo '</div>';
					echo '<div id="product_name_holder">';
					echo '<b>Item name:</b> '.$row['ItemName'].'';
					echo '</div>';
					echo '<div id="product_price_holder">';
					echo '<b>Price:</b> '.$row['Price'].'';
					echo '</div>';
					echo '<div id="product_seller_holder">';
					echo '<b>Seller\'s name:</b> '.$row['ProductSellerID'].'';
					echo '</div>';
					echo '<div id="product_status_holder">';
					echo '<b>Item\'s status:</b> '.$row['ItemStatus'].'';
					echo '</div>';
					echo '<div id="product_cart_button_holder">';
					echo '<button type="button" id="add_cart_button">Add to cart</button>';
					echo '</div>';
					echo '</div>';
				}//end while
			}//end if
		}//end if
		mysqli_close($daShopConn);
	}//end if
	else{
		echo '<script>alert("Error connecting, please try again");</script>';
	}
?>