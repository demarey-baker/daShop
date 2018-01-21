<div id="account_middle_container">
	<div id="add_elements">
		<p>My Purchase (<a href="#"><?php if(isset($_SESSION['mypurchase']))echo $_SESSION['mypurchase'];else echo '0';?></a>)</p>
	</div>
	<div id="my_cart_middle_container">
		<?php include("account/mybuy.php");?>
	</div>
</div>