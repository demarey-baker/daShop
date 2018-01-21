<div id="account_middle_container">
	<div id="add_elements">
		<div id="cart_">My cart (<a href="mycart.php"><?php if(isset($_SESSION['cart_items']))echo count($_SESSION['cart_items']);else echo '0';?></a>)</div>
		<div id="purchased_">What i've purchased (<a href="itemspurchased.php"><?php if(isset($_SESSION['mypurchase']))echo $_SESSION['mypurchase'];else echo '0';?></a>)</div>
	</div>
	<div id="items_purchase_middle_container">
		<?php include("account/mypurchase.php")?>
	</div>
</div>