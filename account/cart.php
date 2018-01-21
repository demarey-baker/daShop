<div id="account_middle_container">
	<div id="add_elements">
		<p>My cart (<a href="#"><?php if(isset($_SESSION['cart_items']))echo count($_SESSION['cart_items']);else echo '0';?></a>)</p>
	</div>
	<div id="my_cart_middle_container">
		<?php include("account/mycart.php");?>
	</div>
</div>