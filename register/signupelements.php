<div id="signup_area">
	<div id="signup_header">
		<div id="logo">
			<a href="index.php"><img src="images/logo.png" alt="registration" height="100%" width="100%"></a>
		</div>
		<div id="texts">
			<h2>Create account</h2>
			<h4>Start shopping by creating your daShop account</h4>
		</div>
	</div>
	<div id="signup_form">
		<form action="register.php" method="post" enctype="multipart/form-data">
			<div class="row_text">Select a profile picture(optional)</div>
			<div id="profile_photo">
				<input type="file" id="file_input" onchange="read_img(this);" name="profile_img" accept="image/JPEG">
				<img id="preview" src="/users_profile_pictures/default_prof.png" alt="your profile picture" height="100%" width="100%">
			</div>
			<button type="button" onclick="choose_file();">Choose picture</button>
			<div id="fName">First name</div>
			<div id="lName">Last name</div>
			<input type='text' id="fName_box"  required placeholder='First name' name='userFName' value="<?php if(isset($_POST['userFName'])) echo $_POST['userFName'];?>">
			<input type='text' id="lName_box"  required placeholder='Last name' name='userLName' value="<?php if(isset($_POST['userLName'])) echo $_POST['userLName'];?>">
			<div class="row_text">Gender</div>
			<input type='radio' name='gender'  required value='M' <?php if(isset($_POST['gender'])&&$_POST['gender']=="M") echo 'checked="checked"';?>>Male
			<input type='radio' name='gender'  required value='F' <?php if(isset($_POST['gender'])&&$_POST['gender']=="F") echo 'checked="checked"';?>>Female
			<div class="row_text">Phone Number</div>
			<input type='tel' id="tele_register" onkeyup="validateTele();" required placeholder='X-XXX-XXX-XXXX' name='userTeleNum' value="<?php if(isset($_POST['userTeleNum'])) echo $_POST['userTeleNum'];?>">
			<div class="row_text">Address</div>
			<input type='text' class="row_box"  required placeholder='address' name='userAddress' value="<?php if(isset($_POST['userAddress'])) echo $_POST['userAddress'];?>">
			<div class="row_text">Parish</div>
			<select class="row_box" name="userParish">
				<option value="Clarendon" <?php if(isset($_POST['userParish'])&&$_POST['userParish']=="Clarendon") echo'selected="selected"';?>>Clarendon
				</option>
				<option value="Manchester" <?php if(isset($_POST['userParish'])&&$_POST['userParish']=="Manchester") echo'selected="selected"';?>>Manchester
				</option>
				<option value="Hanover" <?php if(isset($_POST['userParish'])&&$_POST['userParish']=="Hanover") echo'selected="selected"';?>>Hanover
				</option>
				<option value="St. Elizabeth" <?php if(isset($_POST['userParish'])&&$_POST['userParish']=="St. Elizabeth") echo'selected="selected"';?>>St. Elizabeth
				</option>
				<option value="St. James" <?php if(isset($_POST['userParish'])&&$_POST['userParish']=="St. James") echo'selected="selected"';?>>St. James
				</option>
				<option value="Trelawny" <?php if(isset($_POST['userParish'])&&$_POST['userParish']=="Trelawny") echo'selected="selected"';?>>Trelawny
				</option>
				<option value="Westmoreland" <?php if(isset($_POST['userParish'])&&$_POST['userParish']=="Westmoreland") echo'selected="selected"';?>>Westmoreland
				</option>
				<option value="St. Ann" <?php if(isset($_POST['userParish'])&&$_POST['userParish']=="St. Ann") echo'selected="selected"';?>>St. Ann
				</option>
				<option value="St. Catherine" <?php if(isset($_POST['userParish'])&&$_POST['userParish']=="St. Catherine") echo'selected="selected"';?>>St. Catherine
				</option>
				<option value="St. Mary" <?php if(isset($_POST['userParish'])&&$_POST['userParish']=="St. Mary") echo'selected="selected"';?>>St. Mary
				</option>
				<option value="Kingston" <?php if(isset($_POST['userParish'])&&$_POST['userParish']=="Kingston") echo'selected="selected"';?>>Kingston
				</option>
				<option value="Portland" <?php if(isset($_POST['userParish'])&&$_POST['userParish']=="Portland") echo'selected="selected"';?>>Portland
				</option>
				<option value="St. Andrew" <?php if(isset($_POST['userParish'])&&$_POST['userParish']=="St. Andrew") echo'selected="selected"';?>>St. Andrew
				</option>
				<option value="St. Thomas" <?php if(isset($_POST['userParish'])&&$_POST['userParish']=="St. Thomas") echo'selected="selected"';?>>St. Thomas
				</option>
			</select>
			<div class="row_text">Email address</div>
			<input type='email' id="email_register" onkeyup="validateEmail();" required placeholder='email@dashop.com.jm' name='userEmail' value="<?php if(isset($_POST['userEmail'])) echo $_POST['userEmail'];?>">
			<div class="row_text">Password</div>
			<div id="password_row"><input type='password' placeholder='password' name='userPword' id="password_register" onkeyup="validatePword();" required>
			<div id="password_validate"></div></div>
			<div class="row_text">Confirm password</div>
			<input type='password' placeholder='confirm password' name='userPwordConf' id="conf_password_register" onkeyup="confirmPword();" required>
			<div id="password_confirm">Passwords don't match</div>
			<div id="eula">
				<b>By clicking "Create account" I agree that:</b>
				<ul>
					<li>I may receive communications from daShop and can change my notification preferences in My account.</li>
					<li>I am at least 18 years old.</li>
				</ul>
			</div>
			<div id="submit"><input type='submit' id="submit_button" name='signup' value='Create account'></div>
			<div id="already_reg">Already registered? <a href="signin.php">Sign in here</a></div>
		</form>
		<?php include("registrator.php")?>
	</div>
</div>