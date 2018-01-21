<div id="account_middle_container">
	<div id="add_items_area">
		<form id="form_automobiles" action="addproducts.php" method="post" enctype="multipart/form-data">
			<div class="add_items_form_labels">Product Category</div>
			<select required name='product_category' class="add_items_form_box">
				<option value="Automobiles" <?php if(isset($_POST['product_category'])&&$_POST['product_category']=="Automobiles") echo'selected="selected"';?>>
					Automobiles
				</option>
				<option value="Construction" <?php if(isset($_POST['product_category'])&&$_POST['product_category']=="Construction") echo'selected="selected"';?>>
					Construction
				</option>
			</select>
			<div class="add_items_form_labels">Item Name</div>
			<input required name='product_name' value="<?php if(isset($_POST['product_name'])) echo $_POST['product_name'];?>" class="add_items_form_box" type='text' placeholder='item name'>
			<div class="add_items_form_labels">Price</div>
			<input required name='product_price' value="<?php if(isset($_POST['product_price'])) echo $_POST['product_price'];?>" class="add_items_form_box" type='text' placeholder='price'>
			<div class="add_items_form_labels">Year</div>
			<input required name='product_year' value="<?php if(isset($_POST['product_year'])) echo $_POST['product_year'];?>" class="add_items_form_box" type='text' placeholder='year'>
			<div class="add_items_form_labels">Make/Model</div>
			<input required name='product_make' value="<?php if(isset($_POST['product_make'])) echo $_POST['product_make'];?>" class="add_items_form_box" type='text' placeholder='make/model'>
			<div class="add_items_form_labels">Body Type</div>
			<select required name='product_bType' class="add_items_form_box">
				<option value="Convertible" <?php if(isset($_POST['product_bType'])&&$_POST['product_bType']=="Convertible") echo'selected="selected"';?>>
					Convertible
				</option>
				<option value="Hatchback" <?php if(isset($_POST['product_bType'])&&$_POST['product_bType']=="Hatchback") echo'selected="selected"';?>>
					Hatchback
				</option>
				<option value="Minivan" <?php if(isset($_POST['product_bType'])&&$_POST['product_bType']=="Minivan") echo'selected="selected"';?>>
					Minivan
				</option>
				<option value="Sedan" <?php if(isset($_POST['product_bType'])&&$_POST['product_bType']=="Sedan") echo'selected="selected"';?>>
					Sedan
				</option>
				<option value="SportsCars" <?php if(isset($_POST['product_bType'])&&$_POST['product_bType']=="SportsCars") echo'selected="selected"';?>>
					Sports Cars
				</option>
				<option value="SUV" <?php if(isset($_POST['product_bType'])&&$_POST['product_bType']=="SUV") echo'selected="selected"';?>>
					SUV
				</option>
				<option value="Van" <?php if(isset($_POST['product_bType'])&&$_POST['product_bType']=="Van") echo'selected="selected"';?>>
					Van
				</option>
				<option value="Wagon" <?php if(isset($_POST['product_bType'])&&$_POST['product_bType']=="Wagon") echo'selected="selected"';?>>
					Wagon
				</option>
				<option value="Pick-up" <?php if(isset($_POST['product_bType'])&&$_POST['product_bType']=="Pick-up") echo'selected="selected"';?>>
					Pick-up
				</option>
				<option value="Wrecker" <?php if(isset($_POST['product_bType'])&&$_POST['product_bType']=="Wrecker") echo'selected="selected"';?>>
					Wrecker
				</option>
				<option value="Bus" <?php if(isset($_POST['product_bType'])&&$_POST['product_bType']=="Bus") echo'selected="selected"';?>>
					Bus
				</option>
				<option value="Truck" <?php if(isset($_POST['product_bType'])&&$_POST['product_bType']=="Truck") echo'selected="selected"';?>>
					Truck
				</option>
				<option value="Motorcycle" <?php if(isset($_POST['product_bType'])&&$_POST['product_bType']=="Motorcycle") echo'selected="selected"';?>>
					Motorcycle
				</option>
				<option value="Tractor" <?php if(isset($_POST['product_bType'])&&$_POST['product_bType']=="Tractor") echo'selected="selected"';?>>
					Tractor
				</option>
				<option value="Machinery" <?php if(isset($_POST['product_bType'])&&$_POST['product_bType']=="Machinery") echo'selected="selected"';?>>
					Machinery
				</option>
			</select>
			<div class="add_items_form_labels">Transmission</div>
			<select required name='product_trans' class="add_items_form_box">
				<option value="Automatic" <?php if(isset($_POST['product_trans'])&&$_POST['product_trans']=="Automatic") echo'selected="selected"';?>>
					Automatic
				</option>
				<option value="Manual" <?php if(isset($_POST['product_trans'])&&$_POST['product_trans']=="Manual") echo'selected="selected"';?>>
					Manual
				</option>
				<option value="Tiptronic" <?php if(isset($_POST['product_trans'])&&$_POST['product_trans']=="Tiptronic") echo'selected="selected"';?>>
					Tiptronic
				</option>
			</select>
			<div class="add_items_form_labels">Mileage</div>
			<input required name='product_mileage' value="<?php if(isset($_POST['product_mileage'])) echo $_POST['product_mileage'];?>" class="add_items_form_box" type='text' placeholder='mileage'>
			<div class="add_items_form_labels">Product tag-line(max 30 characters)</div>
			<input required name='product_overlay' value="<?php if(isset($_POST['product_overlay'])) echo $_POST['product_overlay'];?>" class="add_items_form_box" type='text' placeholder='my fancy automobile'>
			<div id="add_product_button_holder"><input id="add_product_button" name='add_items' type='submit' value='Add item'></div>
			<div id="add_items_form_img">
				<img id="product_preview" alt="your product picture" src="#" height="100%" width="100%">
				<div id="add_items_form_img_btn">
					<input type='file' name="product_imagery" accept="image/JPEG" onchange="read_product_img(this);" required>
				</div>
			</div>
		</form>
		<?php include("itemadder.php");?>
	</div>
</div>