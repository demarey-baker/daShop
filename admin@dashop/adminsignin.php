<div id="signin_panel_holder">
	<div id="signin_panel">
		<form id="sign_in_form" method="post" action="admin.php">
			<p>Sign in</p>
			<input required id='admin_email_holder' type='email' name='admin_email' placeholder='Admin'>
			<input required id='admin_pword_holder' type='password' name='admin_pword' placeholder='XXXXXX'>
			<div id='admin_remember_me'><input id="tickMe" type='checkbox' name='admin_remember'><p>Remember me</p><br></div>
			<input id='admin_button_holder' type='submit' name='submit' value='Sign in'>
		</form>
		<?php include("signincheck.php");?>
	</div>
</div>