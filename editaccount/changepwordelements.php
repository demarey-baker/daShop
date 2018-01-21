<div id="update_password_area">
	<div id="header_big_p">
		Let us help you update your account password.
	</div>
	<div id="update_password_notes">
		Enter your current daShop account password and a new password, or you can cancel.
	</div>
	<div id="update_password_header">
		Please enter your current password.
	</div>
	<form action="changepword.php" method="post">
		<div id="update_password_input">
			<input type='password' placeholder='current password' id="current_password_box" name='curPword' required>
		</div>
		<div id="update_password_header_1">
			Please enter your new password.
		</div>
		<div id="update_password_input">
			<input type='password' placeholder='new password' id="new_password_box" name='newPword' onkeyup="validateUpdatePword();"required>
			<div id="password_validate"></div>
		</div>
		<div id="update_password_input">
			<input type='password' placeholder='confirm password' id="conf_password_box" name='newPwordConf' onkeyup="confirmUpdatePword();" required>
			<div id="password_confirm">Passwords don't match</div>
		</div>
		<div id="update_password"><input type='submit' id="update_password_button" name='pwordUpdate' value='Update password'></div>
	</form>
	<?php include("pwordupdate.php");?>
	<div id="cancel_passowrd_update"><a href="myaccount.php"><button type="button" id="cancel_password_button">Cancel</button></a></div>
</div>