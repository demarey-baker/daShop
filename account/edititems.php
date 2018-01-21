<?php
	$daShopConn=mysqli_connect("localhost","root","","dashop");

	if($daShopConn){
		if(isset($_GET['autonum'])&&isset($_SESSION['uID'])){
			$availableInfos="SELECT * from automobiles where AutoNum_ID=".$_GET['autonum']." AND ProductSellerID=".$_SESSION['uID']."";
			$runAvailableInfos=mysqli_query($daShopConn,$availableInfos);

			if(mysqli_num_rows($runAvailableInfos)>0){
				while($row=@mysqli_fetch_assoc($runAvailableInfos)){
					echo '<div id="account_middle_container">';
					echo '<div id="edit_items_area">';
					echo '<form id="form_automobiles" action="edititem.php" method="post" enctype="multipart/form-data">';
					echo '<div class="edit_items_form_labels">Item Name</div>';
					echo '<input required name=\'product_name\' value="'.$row['ItemName'].'" class="edit_items_form_box" type=\'text\' placeholder=\'item name\'>';
					echo '<div class="edit_items_form_labels">Price</div>';
					echo '<input required name=\'product_price\' value="'.$row['Price'].'" class="edit_items_form_box" type=\'text\' placeholder=\'price\'>';
					echo '<div class="edit_items_form_labels">Year</div>';
					echo '<input required name=\'product_year\' value="'.$row['Year'].'" class="edit_items_form_box" type=\'text\' placeholder=\'year\'>';
					echo '<div class="edit_items_form_labels">Make/Model</div>';
					echo '<input required name=\'product_make\' value="'.$row['Make'].'" class="edit_items_form_box" type=\'text\' placeholder=\'make/model\'>';
					echo '<div class="edit_items_form_labels">Body Type</div>';
					echo '<select required name=\'product_bType\' class="edit_items_form_box">';

					echo '<option value="Convertible"';
					 if($row['BodyType']=="Convertible") echo "selected";
					echo '>';
					echo 'Convertible';
					echo '</option>';

					echo '<option value="Hatchback"';
					 if($row['BodyType']=="Hatchback") echo "selected";
					echo '>';
					echo 'Hatchback';
					echo '</option>';

					echo '<option value="Minivan"';
					 if($row['BodyType']=="Minivan") echo "selected";
					echo '>';
					echo 'Minivan';
					echo '</option>';

					echo '<option value="Sedan"';
					 if($row['BodyType']=="Sedan") echo "selected";
					echo '>';
					echo 'Sedan';
					echo '</option>';

					echo '<option value="SportsCars"';
					 if($row['BodyType']=="Convertible") echo "selected";
					echo '>';
					echo 'Sports Cars';
					echo '</option>';

					echo '<option value="SUV"';
					 if($row['BodyType']=="SUV") echo "selected";
					echo '>';
					echo 'SUV';
					echo '</option>';

					echo '<option value="Van"';
					 if($row['BodyType']=="Van") echo "selected";
					echo '>';
					echo 'Van';
					echo '</option>';

					echo '<option value="Wagon"';
					 if($row['BodyType']=="W") echo "selected";
					echo '>';
					echo 'Wagon';
					echo '</option>';

					echo '<option value="Pick-up"';
					 if($row['BodyType']=="Pick-up") echo "selected";
					echo '>';
					echo 'Pick-up';
					echo '</option>';

					echo '<option value="Wrecker"';
					 if($row['BodyType']=="Wrecker") echo "selected";
					echo '>';
					echo 'Wrecker';
					echo '</option>';

					echo '<option value="Bus"';
					 if($row['BodyType']=="Bus") echo "selected";
					echo '>';
					echo 'Bus';
					echo '</option>';

					echo '<option value="Truck"';
					 if($row['BodyType']=="Truck") echo "selected";
					echo '>';
					echo 'Truck';
					echo '</option>';

					echo '<option value="Motorcycle"';
					 if($row['BodyType']=="Motorcycle") echo "selected";
					echo '>';
					echo 'Motorcycle';
					echo '</option>';

					echo '<option value="Tractor"';
					 if($row['BodyType']=="Tractor") echo "selected";
					echo '>';
					echo 'Tractor';
					echo '</option>';

					echo '<option value="Machinery"';
					 if($row['BodyType']=="Machinery") echo "selected";
					echo '>';
					echo 'Machinery';
					echo '</option>';

					echo '</select>';
					echo '<div class="edit_items_form_labels">Transmission</div>';	
					echo '<select required name=\'product_trans\' class="edit_items_form_box">';
					echo '<option value="Automatic"';
					 if($row['Transmission']=="Automatic") echo "selected";
					echo '>';
					echo 'Automatic';
					echo '</option>';
					echo '<option value="Manual"';
					 if($row['Transmission']=="Manual") echo "selected";
					echo '>';
					echo 'Manual';
					echo '</option>';
					echo '<option value="Tiptronic"';
					 if($row['Transmission']=="Tiptronic") echo "selected";
					echo '>';
					echo 'Tiptronic';
					echo '</option>';
					echo '</select>';
					echo '<div class="edit_items_form_labels">Mileage</div>';
					echo '<input required name=\'product_mileage\' value="'.$row['Mileage'].'" class="edit_items_form_box" type=\'text\' placeholder=\'mileage\'>';
					echo '<div class="edit_items_form_labels">Product tag-line(max 30 characters)</div>';
					echo '<input required name=\'product_overlay\' value="'.$row['ProductOverlay'].'" class="edit_items_form_box" type=\'text\' placeholder=\'my fancy automobile\'>';
					echo '<div id="edit_product_button_holder"><input id="edit_product_button" name=\'edit_items\' type=\'submit\' value=\'Update item\'></div>';
					echo '<div id="edit_items_form_img">';
					echo '<img id="product_preview" alt="your product picture" src="'.$row['Product_Img'].'" height="100%" width="100%">';
					echo '<div id="edit_items_form_img_btn">';
					echo '<input type=\'file\' name="product_imagery" accept="image/JPEG" onchange="read_edit_product_img(this);" required>';
					echo '</div>';
					echo '</div>';
					echo '</form>';
					echo '</div>';
					echo '</div>';
				}//end while
			}//end if
			else{
				header('Location:index.php');
			}
		}//end if
		else{
				header('Location:index.php');
			}
		mysqli_close($daShopConn);
	}//end if
	else{
		echo '<script>alert("Error connecting, please try again");</script>';
	}
?>