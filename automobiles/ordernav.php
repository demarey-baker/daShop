<div id="category_order_nav">
	<div id="number_of_items"><?php 
	$daShopConn=@mysqli_connect("localhost","root","","dashop");
	if($daShopConn){
		echo ''.@mysqli_num_rows(mysqli_query($daShopConn,"SELECT * from automobiles")).'';
		mysqli_close($daShopConn);
	}
	else 
		echo '<script>alert("Error connecting, please try again");</script>';?>
	 items were found for Automobiles</div>
</div>