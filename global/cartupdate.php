<?php
	session_start();

	$daShopConn=@mysqli_connect("localhost","root","","dashop");

	if($daShopConn){
		if(isset($_GET['transaction'])&&$_GET['transaction']=='add'){
			$autonum=filter_var($_GET['autonum'], FILTER_SANITIZE_STRING);
			$current_url=base64_decode($_GET['return_url']);

			$get_item="SELECT ProductOverlay, ItemName, Price, DateAdded, ProductSellerID from automobiles where AutoNum_ID='$autonum'";
			$run_get_item=@mysqli_query($daShopConn,$get_item);

			if($run_get_item){
				$rows=@mysqli_fetch_assoc($run_get_item);

				$new_cart_item=array(array('itemcode'=>$autonum,'itemoverlay'=>$rows['ProductOverlay'],
					'itemname'=>$rows['ItemName'],'itemprice'=>$rows['Price'],
					'itemdate'=>date("l, F j, Y, g:i A"),'itemseller'=>$rows['ProductSellerID']));

				$other_activity_log="INSERT into activitylogs(User_ID,OtherActivity,TimeDate) values('".$_SESSION['uID']."','User added item to cart','".date("l, F j, Y, g:i A")."')";
				$run_other_activity_log=@mysqli_query($daShopConn,$other_activity_log);	

				if(isset($_SESSION['cart_items'])){
					$item_exists=false;

					foreach($_SESSION['cart_items'] as $x){
						if($x['itemcode']==$autonum){
							$item_exists=true;

							$product[]=array('itemcode'=>$autonum,'itemoverlay'=>$x['itemoverlay'],
								'itemname'=>$x['itemname'],'itemprice'=>$x['itemprice'],
								'itemdate'=>date("l, F j, Y, g:i A"),'itemseller'=>$x['itemseller']);
						}//end if
						else{
							$product[]=array('itemcode'=>$x['itemcode'],'itemoverlay'=>$x['itemoverlay'],
								'itemname'=>$x['itemname'],'itemprice'=>$x['itemprice'],
								'itemdate'=>date("l, F j, Y, g:i A"),'itemseller'=>$x['itemseller']);
						}//end else
					}//end foreach

					if($item_exists==false){
						$_SESSION['cart_items']=array_merge($product,$new_cart_item);
					}//end if item doesn't exists
					else{
						$_SESSION['cart_items']=$product;
					}//end else

				}//end if
				else{
					$_SESSION['cart_items']=$new_cart_item;
				}//end else
			}//end if
			header('Location:'.$current_url);
		}//end if transaction is add item
		
		if(isset($_GET['transaction'])&&$_GET['transaction']=='kill'&&isset($_SESSION['cart_items'])){
			$autonum=filter_var($_GET['autonum'], FILTER_SANITIZE_STRING);
			$current_url=base64_decode($_GET['return_url']);

			foreach($_SESSION['cart_items'] as $x){
				if($x['itemcode']!=$autonum){
					$product[]=array('itemcode'=>$x['itemcode'],'itemoverlay'=>$x['itemoverlay'],
								'itemname'=>$x['itemname'],'itemprice'=>$x['itemprice'],
								'itemdate'=>$x['itemdate'],'itemseller'=>$x['itemseller']);
				}//end if

				$_SESSION['cart_items']=$product;
			}//end foreach
			
			$other_activity_log="INSERT into activitylogs(User_ID,OtherActivity,TimeDate) values('".$_SESSION['uID']."','User removed item from cart','".date("l, F j, Y, g:i A")."')";
			$run_other_activity_log=@mysqli_query($daShopConn,$other_activity_log);	

			header('Location:'.$current_url);
		}//end if transaction is remove product

		if(isset($_GET['transaction'])&&$_GET['transaction']=='killcart'&&isset($_SESSION['cart_items'])){
			unset($_SESSION['cart_items']);
			$current_url=base64_decode($_GET['return_url']);

			$other_activity_log="INSERT into activitylogs(User_ID,OtherActivity,TimeDate) values('".$_SESSION['uID']."','User emptied shopping cart','".date("l, F j, Y, g:i A")."')";
			$run_other_activity_log=@mysqli_query($daShopConn,$other_activity_log);	

			header('Location:'.$current_url);
		}//end if
	}
	mysqli_close($daShopConn);
?>