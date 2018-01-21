<?php
	if(isset($_SESSION['current_url'])){
		$current_url=($_SESSION['current_url']);
	}

	$daShopConn=@mysqli_connect("localhost","root","","dashop");
			
	if($daShopConn){
		$myItems="SELECT AutoNum_ID, ItemName, Price, Product_Img, ProductOverlay, DateAdded, ItemStatus, ProductSellerID from automobiles where ProductSellerID=".$_SESSION['uID']." ORDER BY AutoNum_ID DESC";
		$selectMyItems=@mysqli_query($daShopConn,$myItems);
		$_SESSION['numberItems']=@mysqli_num_rows($selectMyItems);

		if($selectMyItems){
			if(mysqli_num_rows($selectMyItems)>0){
				while($row=@mysqli_fetch_assoc($selectMyItems)){
					echo '<div id="my_items">';
					echo '<div id="my_items_img">';
					echo '<div id="my_items_img_img"><img src="'.$row['Product_Img'].'" height="100%" width="100%"></div>';
					echo '<div id="my_items_img_overlay">';
					echo ''.$row['ProductOverlay'].'';
					echo '</div>';
					echo '</div>';
					echo '<div id="my_items_name_holder">';
					echo '<b>Item name:</b> '.$row['ItemName'].'';
					echo '</div>';
					echo '<div id="my_items_price_holder">';
					echo '<b>Price:</b> '.$row['Price'].'';
					echo '</div>';
					echo '<div id="my_items_date_added_holder">';
					echo '<b>Date added:</b> '.$row['DateAdded'].'';
					echo '</div>';
					echo '<div id="my_items_status_holder">';
					echo '<b>Item\'s status:</b> '.$row['ItemStatus'].'';
					echo '</div>';
					echo '<div id="my_items_button_holder">';
					echo '<a title="Feel free to edit your product" href="edititem.php?autonum='.$row['AutoNum_ID'].'&&product='.$row['ItemName'].'"><button type="button" id="my_items_edit_button">Edit item</button></a>';
					echo '<a href="global/deleteitem.php?autonum='.$row['AutoNum_ID'].'&&return_url='.$current_url.'&&name='.$row['ItemName'].'"><button onclick="return confirm(\'Are you sure you want to remove '.$row['ItemName'].'?\');" title="Click to remove item from your listing" id="remove_items_button" type="button">Remove item</button></a>';
					echo '</div>';
					echo '</div>';
				}
			}
			else{

			}
		}
		else{
			echo '<script>alert("Database error, please try again");</script>';
		}
		mysqli_close($daShopConn);
	}
	else{
		echo '<script>alert("Error connecting, please try again");</script>';
	}
?>