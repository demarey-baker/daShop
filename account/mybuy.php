<?php
	$daShopConn=@mysqli_connect("localhost","root","","dashop");

	if($daShopConn){
			echo '<table class="table">';
			echo '<tr>';
			echo '<th>Item number</th>';
			echo '<th>Item name</th>';
			echo '<th>Item price</th>';
			echo '<th>Seller\'s name</th>';
			echo '<th></th>';
			echo '</tr>';

			$uID=$_SESSION['uID'];

			$get_my_purchase_items="SELECT ItemCode,ItemName,Price,ProductSellerID from purchase where Buyer='$uID'";
			$run_get_my_purchase_items=@mysqli_query($daShopConn,$get_my_purchase_items);

			while($rows=@mysqli_fetch_assoc($run_get_my_purchase_items)){
				$total_price=0.0;
				$item_number=1;
				$_SESSION['mypurchase']=$item_number;
				echo '<tr>';
				echo '<td>'.$item_number.'</td>';
				echo '<td>';
				echo $rows['ItemName'];
				echo '</td>';
				echo '<td>'.$rows['Price'].'</td>';
				$total_price+=preg_replace('/\s+|-+|\$+|,+/','',$rows['Price']);
				echo '<td>'.$rows['ProductSellerID'].'</td>';
				echo '</tr>';
				$item_number++;
			}//end while

		echo '</table>';

		echo '<div id="total_price">';
		echo '<p>';
		echo 'Total: $'.$total_price.'';
		echo '</p>';
		echo '</div>';
	
	}
	mysqli_close($daShopConn);
?>