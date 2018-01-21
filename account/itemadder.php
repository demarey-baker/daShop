<?php
	if(isset($_POST['add_items'])){
		$error_message=null;
		//GLOBAL $target_file;
		
		if(isset($_FILES['product_imagery'])){
		   $extentions = pathinfo($_FILES['product_imagery']['name'],PATHINFO_EXTENSION);
	    	GLOBAL $new_product_pic_name;

	    	if(isset($_POST['product_name'])&&isset($_SESSION['uFName'])){
	    		$new_product_pic_name.=$_SESSION['uFName'];
	    		$new_product_pic_name.=preg_replace('/\s+|-/','',$_POST['product_name']);
	    		$new_product_pic_name.=time();
	    		$new_product_pic_name.=".".$extentions;
	    	}//end if

	        $target_dir = "items_pictures/automobiles/";
		    $target_file = $target_dir . $new_product_pic_name;
		    $error_free9=true;
		}
        else{
        	$error_free9=false;
        }

		if(isset($_POST['product_category'])){
			$error_free=true;
		}
		else{
			$error_free=false;
		}

		if(isset($_POST['product_name'])){
			$error_free1=true;
		}
		else{
			$error_free1=false;
		}

		if(isset($_POST['product_price'])){
			$error_free2=true;
		}
		else{
			$error_free2=false;
		}

		if(isset($_POST['product_year'])){
			$error_free3=true;
		}
		else{
			$error_free3=false;
		}

		if(isset($_POST['product_make'])){
			$error_free4=true;
		}
		else{
			$error_free4=false;
		}

		if(isset($_POST['product_bType'])){
			$error_free5=true;
		}
		else{
			$error_free5=false;
		}

		if(isset($_POST['product_trans'])){
			$error_free6=true;
		}
		else{
			$error_free6=false;
		}

		if(isset($_POST['product_mileage'])){
			$error_free7=true;
		}
		else{
			$error_free7=false;
		}

		if(isset($_POST['product_overlay'])){
			$error_free8=true;
		}
		else{
			$error_free8=false;
		}

        if($error_free&&$error_free1&&$error_free2&&$error_free3&&$error_free4&&$error_free5&&$error_free6&&$error_free7&&$error_free8&&$error_free9){
        	$daShopConn=@mysqli_connect("localhost","root","","dashop");

        	if($daShopConn){
        		$product_category=$_POST['product_category'];
        		$product_name=$_POST['product_name'];
        		$product_price=$_POST['product_price'];
        		$product_year=$_POST['product_year'];
        		$product_make=$_POST['product_make'];
        		$product_bType=$_POST['product_bType'];
        		$product_trans=$_POST['product_trans'];
        		$product_mileage=$_POST['product_mileage'];
        		$product_overlay=$_POST['product_overlay'];
        		$product_seller=$_SESSION['uID'];
				$product_pic=$target_file;
				$addDate=date("l")." ".date("Y-m-d");

				if($product_category=="Automobiles"){
					$newProduct="insert into products(ProductCategory, ProductName, ProductSellerID, ItemStatus) values('$product_category','$product_name', '$product_seller', 'Available')";
					$insertNewProduct=mysqli_query($daShopConn,$newProduct);

					$newAutomobile="insert into automobiles(ItemName, Price, Year, Make, BodyType, Transmission, Mileage, ProductOverlay, Product_Img, DateAdded, ItemStatus, ProductSellerID) values
					('$product_name','$product_price','$product_year','$product_make','$product_bType','$product_trans','$product_mileage','$product_overlay','$product_pic','$addDate', 'Available', '$product_seller')";
					$insertNewAutomobile=mysqli_query($daShopConn,$newAutomobile);

					if($insertNewAutomobile&&$insertNewProduct){
						$other_activity_log="INSERT into activitylogs(User_ID,OtherActivity,TimeDate) values('".$_SESSION['uID']."','Add item ".$product_name."','".date("l, F j, Y, g:i A")."')";
						$run_other_activity_log=@mysqli_query($daShopConn,$other_activity_log);	

						move_uploaded_file($_FILES["product_imagery"]["tmp_name"], $target_file);
						if (headers_sent()){
							echo '<script>alert("Item added successfully");</script>';
						    die('<script type="text/javascript">window.location.href="' . "myshopitems.php" . '";</script>');
						}
						else{
							echo '<script>alert("Item added successfully");</script>';
					      	header('Location: ' . "myshopitems.php");
					      	die();
					    }    
					}
					else
						echo '<script>alert("Error adding product, please try again");</script>';
				}
				else
					echo "soon sort out next part";
				mysqli_close($daShopConn);
			}//if there is no error connecting
			else{
				echo '<script>alert("Error connecting, please try again");</script>';
			}
        }//end if//the variables wasn't set
        else{
			echo '<script>alert("Error adding automobile.\\nPlease try again.");</script>';
		}
	}//end if
?>