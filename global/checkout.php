<?php
	session_start();

	$daShopConn=@mysqli_connect("localhost","root","","dashop");

	if($daShopConn){
		if(isset($_GET['transaction'])&&$_GET['transaction']=='checkout'){
			$autonum=filter_var($_GET['autonum'], FILTER_SANITIZE_STRING);
			$current_url=base64_decode($_GET['return_url']);

			if(isset($_SESSION['cart_items'])){
				foreach($_SESSION['cart_items'] as $x){
					$code=$x['itemcode'];
					$name=$x['itemname'];
					$price=$x['itemprice'];
					$seller=$x['itemseller'];
					$insert_purchase="INSERT into purchase(ItemCode,ItemName,Price,ProductSellerID,Buyer) values('$code','$name','$price','$seller','".$_SESSION['uID']."')";
					$run_insert_purchase=mysqli_query($daShopConn,$insert_purchase);

					$produt_sold="UPDATE automobiles set ItemStatus='Sold' where ItemName='$name' and ProductSellerID='$seller'";
					$run_produt_sold=mysqli_query($daShopConn,$produt_sold);

					$purchase_activity_log="INSERT into activitylogs(User_ID,PurchaseActivity,TimeDate) values('".$_SESSION['uID']."','User purchased items','".date("l, F j, Y, g:i A")."')";
					$run_purchase_activity_log=@mysqli_query($daShopConn,$purchase_activity_log);						
				}//end foreach
			}//end if
			unset($_SESSION['cart_items']);
			header('Location:'.$current_url);
		}//end if transaction is checkout
		
	mysqli_close($daShopConn);
	}//end if
?>