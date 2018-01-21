<?php
	if(isset($_SESSION['current_url'])){
		$current_url=($_SESSION['current_url']);
	}

	$daShopConn=@mysqli_connect("localhost","root","","dashop");

	if($daShopConn){
		if(isset($_SESSION['cart_items'])){
			foreach($_SESSION['cart_items'] as $x){
				$code=$x['itemcode'];
				$get_my_cart_items="SELECT Product_Img,ProductOverlay,ItemName,Price,ProductSellerID from automobiles where AutoNum_ID='$code'";
				$run_get_my_cart_items=@mysqli_query($daShopConn,$get_my_cart_items);

				while($rows=@mysqli_fetch_assoc($run_get_my_cart_items)){
					echo '<div id="purchase_items">';
					echo '<div id="purchase_items_img">';
					echo '<div id="purchase_items_img_img"><img src="'.$rows['Product_Img'].'" height="100%" width="100%"></div>';
					echo '<div id="purchase_items_img_overlay">';
					echo $rows['ProductOverlay'];
					echo '</div>';
					echo '</div>';
					echo '<div id="purchase_items_name_holder">';
					echo '<b>Item name:</b> '.$rows['ItemName'].'';
					echo '</div>';
					echo '<div id="purchase_items_price_holder">';
					echo '<b>Price:</b> '.$rows['Price'].'';
					echo '</div>';
					echo '<div id="purchase_items_date_added_holder">';
					echo '<b>Date added:</b> '.$x['itemdate'].'';
					echo '</div>';	
					echo '<div id="purchase_items_owner_holder">';
					echo '<b>Seller\'s name:</b> '.$rows['ProductSellerID'].'';
					echo '</div>';
					echo '<div id="purchase_items_button_holder">';
					echo '<a href="global/cartupdate.php?autonum='.$code.'&&return_url='.$current_url.'&&transaction=kill"><button title="Remove '.$rows['ItemName'].' from your cart" type="button" id="purchase_items_remove_button">Delete from cart</button></a>';
					echo '</div>';
					echo '</div>';
				}//end while
			}//end foreach
		}
	}
	mysqli_close($daShopConn);
?>