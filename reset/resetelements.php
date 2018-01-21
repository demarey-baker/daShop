<div id="reset_area">
	<div id="header_big_p">
		Let us help you get back into your account
	</div>
	<div id="reset_notes">
		Get back into your account, by resetting your account and security infos. Please enter your daShop account.
	</div>
	<?php
		include("resetator.php");
	
		if(isset($_SESSION['account_exist'])){
			if($_SESSION['account_exist']){
				echo '<div id="results1">';
				echo "<br>";
				echo '<img src="images/icons/good.png" alt="Success" height="60px">';
				echo '<p>Account founded, please enter your new password.</p>';
				echo '</div>';
				
				echo "<br><br>";
				echo '<form action="forgotPword.php" method="post">';

				echo '<div id="update_password_input">';
				echo '<input type=\'password\' placeholder=\'new password\' id="new_password_box" name=\'newPword\' onkeyup="validateUpdatePword();"required>';
				echo '<div id="password_validate"></div>';
				echo '</div>';
				echo '<div id="update_password_input">';
				echo '<input type=\'password\' placeholder=\'confirm password\' id="conf_password_box" name=\'newPwordConf\' onkeyup="confirmUpdatePword();" required>';
				echo '<div id="password_confirm">Passwords don\'t match</div>';
				echo '</div>';
				echo '<div id="update_password"><input type=\'submit\' id="update_password_button" name=\'pwordUpdate\' value=\'Update password\'></div>';
				
				echo '</form>';
			}
		}//end if
		else{
			echo '<div id="account_header">';
			echo 'daShop account';
			echo '</div>';
			echo '<form action="forgotPword.php" method="get">';
			echo '<div id="account_input">';
			echo '<input type=\'email\' value="';
			if(isset($_GET['resetEmail']))
				echo $_GET['resetEmail'];
			echo '" placeholder=\'email@dashop.com.jm\' onkeyup="validateResetEmail();" id="reset_email_box" name=\'resetEmail\' required>';
			echo '</div>';
			echo '<div id="reset_"><input type=\'submit\' id="reset_button" name=\'reset\' value=\'Reset account\'></div>';
			echo '</form>';
		}//end else
	?>
</div>