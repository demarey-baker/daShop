<?php 
	session_start();
	
	$daShopConn=@mysqli_connect("localhost","root","","dashop");

	if(isset($_SESSION['current_url'])){
		$current_url=($_SESSION['current_url']);
	}

	include('../global/paginatefunction.php');
			
	if($daShopConn){
		$autoItems="SELECT AutoNum_ID, ItemName, Price, Product_Img, ProductOverlay, DateAdded, ItemStatus, ProductSellerID from automobiles ORDER BY AutoNum_ID DESC";
		$selectAutoItems=@mysqli_query($daShopConn,$autoItems);

		if($selectAutoItems){
			if(@mysqli_num_rows($selectAutoItems)>0){

				//continue only if $_POST is set and it is a Ajax request
				if(isset($_POST) && isset($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest'){
					//Get page number from Ajax POST
					if(isset($_POST["page"])){
						$page_number = filter_var($_POST["page"], FILTER_SANITIZE_NUMBER_INT, FILTER_FLAG_STRIP_HIGH); //filter number
						if(!is_numeric($page_number)){die('Invalid page number!');} //incase of invalid page number
					}else{
						$page_number = 1; //if there's no page number, set it to 1
					}
					$item_per_page=5;
					//get total number of records from database for pagination
					$results = mysqli_query($daShopConn,"SELECT COUNT(*) FROM automobiles");
					$get_total_rows = $results->fetch_row(); //hold total records in variable
					//break records into pages
					$total_pages = ceil($get_total_rows[0]/$item_per_page);
					
					//get starting position to fetch the records
					$page_position = (($page_number-1) * $item_per_page);
					
					//SQL query that will fetch group of records depending on starting position and item per page. See SQL LIMIT clause
					$results = mysqli_query($daShopConn,"SELECT AutoNum_ID, ItemName, Price, Product_Img, ProductOverlay, DateAdded, ItemStatus, ProductSellerID from automobiles where ItemStatus!='Sold' ORDER BY AutoNum_ID DESC LIMIT $page_position, $item_per_page");
					
					//Display records fetched from database.
					
					echo '<ul class="contents">';

						while($row=@mysqli_fetch_assoc($results)){
							$can_delete=false;
							$sellers_name="SELECT User_fName from users where User_ID=".$row['ProductSellerID']."";
							$productSellerName=@mysqli_fetch_assoc(@mysqli_query($daShopConn,$sellers_name));

							if(isset($_SESSION['cart_items'])){
								foreach($_SESSION['cart_items'] as $x){
									if($x['itemcode']==$row['AutoNum_ID'])
										$can_delete=true;
								}//end foreach
							}//end if

							echo '<form>';
							echo '<div id="product_item">';
							echo '<div id="product_img">';
							echo '<div id="product_img_img"><img alt="test" src="../'.$row['Product_Img'].'" height="100%" width="100%"></div>';
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
							if(isset($_SESSION['uID'])&&$row['ProductSellerID']==$_SESSION['uID']){
								echo '<b>Date added:</b> '.$row['DateAdded'].'';
							}
							else
								echo '<b>Seller\'s name:</b> '.$productSellerName['User_fName'].'';
							echo '</div>';
							echo '<div id="product_status_holder">';
							echo '<b>Item\'s status:</b> '.$row['ItemStatus'].'';
							echo '</div>';
							echo '<div id="product_cart_button_holder">';
							if(isset($_SESSION['uID'])&&$row['ProductSellerID']==$_SESSION['uID']){
								echo '<a title="Feel free to edit your product" href="edititem.php?autonum='.$row['AutoNum_ID'].'&&product='.$row['ItemName'].'"><button type="button" id="my_items_edit_button">Edit item</button></a>';
							}//end if
							else if($can_delete){
								echo '<a href="global/cartupdate.php?autonum='.$row['AutoNum_ID'].'&&return_url='.$current_url.'&&transaction=kill"><button title="Remove '.$row['ItemName'].' from your cart" type="button" id="remove_cart_button">Delete from cart</button></a>';
							}//end else if
							else{
								if(isset($_SESSION['login'])){
									echo '<a href="global/cartupdate.php?autonum='.$row['AutoNum_ID'].'&&return_url='.$current_url.'&&transaction=add"><button title="Add this '.$row['ItemName'].' to your cart" type="button" id="add_cart_button">Add to cart</button></a>';
								}//end if
								else 
									echo '<a href="signin.php"><button title="Add this '.$row['ItemName'].' to your cart" type="button" id="add_cart_button">Add to cart</button></a>';
							}//end else
							echo '</div>';
							echo '</div>';
							echo '</form>';
						}//end while  
					echo '</ul>';
					
					echo '<div align="center">';
					/* We call the pagination function here to generate Pagination link for us. 
					As you can see I have passed several parameters to the function. */
					echo paginate_function($item_per_page, $page_number, $get_total_rows[0], $total_pages);
					echo '</div>';
				}//end if
			}//end if
		}//end if
		mysqli_close($daShopConn);
	}//end if
	else{
		echo '<script>alert("Error connecting, please try again");</script>';
	}
?>