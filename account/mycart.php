<?php
	if(isset($_SESSION['current_url'])){
		$current_url=($_SESSION['current_url']);
	}

	$daShopConn=@mysqli_connect("localhost","root","","dashop");

	if($daShopConn){
		if(isset($_SESSION['cart_items'])){

				echo '<table class="table">';
				echo '<tr>';
				echo '<th>Item number</th>';
				echo '<th>Item name</th>';
				echo '<th>Item price</th>';
				echo '<th>Date added</th>';
				echo '<th>Seller\'s name</th>';
				echo '<th></th>';
				echo '</tr>';

				$item_number=1;
				$total_price=0.0;

			foreach($_SESSION['cart_items'] as $x){		
				$code=$x['itemcode'];
				$get_my_cart_items="SELECT AutoNum_ID,Product_Img,ProductOverlay,ItemName,Price,ProductSellerID from automobiles where AutoNum_ID='$code'";
				$run_get_my_cart_items=@mysqli_query($daShopConn,$get_my_cart_items);

				while($rows=@mysqli_fetch_assoc($run_get_my_cart_items)){
					echo '<tr>';
					echo '<td>'.$item_number.'</td>';
					echo '<td>';
					echo '<a href="search.php?q='.$rows['ItemName'].'">';
					echo $rows['ItemName'];
					echo '</a></td>';
					echo '<td>'.$rows['Price'].'</td>';
					$total_price+=preg_replace('/\s+|-+|\$+|,+/','',$rows['Price']);
					echo '<td>'.$x['itemdate'].'</td>';
					echo '<td>'.$rows['ProductSellerID'].'</td>';
					echo '<td>';
					echo '<a href="global/cartupdate.php?autonum='.$rows['AutoNum_ID'].'&&return_url='.$current_url.'&&transaction=kill" title="Remove '.$rows['ItemName'].' from your cart"><button  type="button" id="remove_cart_button_list">';
					echo '<span class="glyphicon glyphicon-remove" aria-hidden="true">';
					echo '</span>';
					echo '</button></a>';
					echo '</td>';

					/*
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
					*/

					echo '</tr>';
				}//end while

				$item_number++;
			}//end foreach

			echo '</table>';

			echo '<div id="total_price">';
			echo '<p>';
			echo 'Total: $'.$total_price.'';
			echo '</p>';
			echo '<div id="checkout_"><a href="global/checkout.php?transaction=checkout&&return_url='.$current_url.'"><button id="checkout_button" type="button">Checkout products</button></a></div>';
			echo '<div id="empty_"><a href="global/cartupdate.php?return_url='.$current_url.'&&transaction=killcart"><button id="empty_button" type="button">Empty cart</button></a></div>';
			echo '</div>';
		}
	}
	mysqli_close($daShopConn);
?>