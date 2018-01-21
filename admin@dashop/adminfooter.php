<div id="admin_footer">
	<p>&copy 2015 <a href="index.php" target="_blank">daShop.</a> All rights reserved.</p>
	<?php
		if(isset($_SESSION['adminlogin'])){
			if($_SESSION['adminlogin']){
				echo '<div id="footer_nav">';
				echo '<a href="admin@admin.php">Home</a> | <a href="adminsignout.php">Logout</a>';
				echo '</div>';
			}
		}
	?>
</div>