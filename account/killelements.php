<div id="delete_area">
	<div id="header_big_p">
		Deleting your account will remove all your data.
	</div>
	<div id="delete_notes">
		You can always come back and create a new daShop account, or you can cancel deleting your account.
	</div>
	<div id="account_header">
		Please enter your password to proceed.
	</div>
	<form method="post" action="killprofile.php">
		<div id="password_input">
			<input type='password' placeholder='your password' id="delete_password_box" name='killaccount' required>
		</div>
		<div id="delete_"><input type='submit' id="delete_button" name='kill' value='Delete account'></div>
		<?php include("profilekiller.php");?>
	</form>
	<div id="cancel_"><a href="myaccount.php"><button type="button" id="cancel_button">Cancel</button></a></div>
</div>