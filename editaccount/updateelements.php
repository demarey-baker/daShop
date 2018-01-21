<div id="update_area">
	<div id="update_form">
		<form action="editprofile.php" method="post" enctype="multipart/form-data">
			<div class="update_row_text">Select a profile picture(optional)</div>
			<div id="update_photo">
				<input type="file" id="update_file_input" onchange="read_update_img(this);" name="profile_img" accept="image/JPEG">
				<img id="update_preview" <?php if(isset($_SESSION['uProfPic'])) echo 'src="'.$_SESSION['uProfPic'].'"';?> height="100%" width="100%" alt="user profile picture">
			</div>
			<button type="button" onclick="choose_update_file();">Choose picture</button>
			<div id="update_fName">First name</div>
			<div id="update_lName">Last name</div>
			<input type='text' id="update_fName_box"  required placeholder='First name' name='userFName' value="<?php if(isset($_SESSION['uFName'])) echo $_SESSION['uFName'];?>">
			<input type='text' id="update_lName_box"  required placeholder='Last name' name='userLName' value="<?php if(isset($_SESSION['uLName'])) echo $_SESSION['uLName'];?>">
			<div class="update_row_text">Gender</div>
			<input type='radio' name='gender'  required value='M' <?php if(isset($_SESSION['uGender'])&&$_SESSION['uGender']=="M") echo 'checked="checked"';?>>Male
			<input type='radio' name='gender'  required value='F' <?php if(isset($_SESSION['uGender'])&&$_SESSION['uGender']=="F") echo 'checked="checked"';?>>Female
			<div class="update_row_text">Phone Number</div>
			<input type='tel' id="tele_register"  onkeyup="validateTele();" required placeholder='X-XXX-XXX-XXXX' name='userTeleNum' value="<?php if(isset($_SESSION['uPhoneNum'])) echo $_SESSION['uPhoneNum'];?>">
			<div class="update_row_text">Address</div>
			<input type='text' class="row_box"  required placeholder='address' name='userAddress' value="<?php if(isset($_SESSION['uAddress'])) echo $_SESSION['uAddress'];?>">
			<div class="update_row_text">Parish</div>
			<select class="update_row_box" name="userParish">
				<option value="Clarendon" <?php if(isset($_SESSION['uParish'])&&$_SESSION['uParish']=="Clarendon") echo'selected="selected"';?>>Clarendon
				</option>
				<option value="Manchester" <?php if(isset($_SESSION['uParish'])&&$_SESSION['uParish']=="Manchester") echo'selected="selected"';?>>Manchester
				</option>
				<option value="Hanover" <?php if(isset($_SESSION['uParish'])&&$_SESSION['uParish']=="Hanover") echo'selected="selected"';?>>Hanover
				</option>
				<option value="St. Elizabeth" <?php if(isset($_SESSION['uParish'])&&$_SESSION['uParish']=="St. Elizabeth") echo'selected="selected"';?>>St. Elizabeth
				</option>
				<option value="St. James" <?php if(isset($_SESSION['uParish'])&&$_SESSION['uParish']=="St. James") echo'selected="selected"';?>>St. James
				</option>
				<option value="Trelawny" <?php if(isset($_SESSION['uParish'])&&$_SESSION['uParish']=="Trelawny") echo'selected="selected"';?>>Trelawny
				</option>
				<option value="Westmoreland" <?php if(isset($_SESSION['uParish'])&&$_SESSION['uParish']=="Westmoreland") echo'selected="selected"';?>>Westmoreland
				</option>
				<option value="St. Ann" <?php if(isset($_SESSION['uParish'])&&$_SESSION['uParish']=="St. Ann") echo'selected="selected"';?>>St. Ann
				</option>
				<option value="St. Catherine" <?php if(isset($_SESSION['uParish'])&&$_SESSION['uParish']=="St. Catherine") echo'selected="selected"';?>>St. Catherine
				</option>
				<option value="St. Mary" <?php if(isset($_SESSION['uParish'])&&$_SESSION['uParish']=="St. Mary") echo'selected="selected"';?>>St. Mary
				</option>
				<option value="Kingston" <?php if(isset($_SESSION['uParish'])&&$_SESSION['uParish']=="Kingston") echo'selected="selected"';?>>Kingston
				</option>
				<option value="Portland" <?php if(isset($_SESSION['uParish'])&&$_SESSION['uParish']=="Portland") echo'selected="selected"';?>>Portland
				</option>
				<option value="St. Andrew" <?php if(isset($_SESSION['uParish'])&&$_SESSION['uParish']=="St. Andrew") echo'selected="selected"';?>>St. Andrew
				</option>
				<option value="St. Thomas" <?php if(isset($_SESSION['uParish'])&&$_SESSION['uParish']=="St. Thomas") echo'selected="selected"';?>>St. Thomas
				</option>
			</select>
			<div class="update_row_text">Email address</div>
			<input type='email' id="email_register" onkeyup="validateEmail();" required placeholder='email@dashop.com' name='userEmail' value="<?php if(isset($_SESSION['uEmail'])) echo $_SESSION['uEmail'];?>">
			<div id="button_row">
				<div id="change"><input type='submit' id="change_button" name='update' value='Update account'></div>
				<div id="change_password"><a href="changepword.php"><button id="change_password_button" type="button">Change password</button></a></div>
			</div>
		</form>
		<?php include("updator.php")?>
	</div>
</div>