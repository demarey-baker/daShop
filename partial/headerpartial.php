<div id="partial_top_container">
	<div id="header_area">
		<div id="logo">
			<a href="index.php"><img src="images/logo.png" alt="daShop logo" width="90%" height="90%"></a>
		</div>
		<div id="header_row">
			<?php 
				if(isset($_SESSION['uFName'])){
					echo "Hey <b><a href='myaccount.php'>".$_SESSION['uFName']."!</a></b>";
					echo ' | <a id="sign_out" href="signout.php">Sign out</a>';
				}
				else{
					echo '<a href="signin.php">Sign in</a> |';
					echo '<a href="register.php">Register</a>';
				}
			?>
		</div>
	</div>
</div>