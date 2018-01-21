<footer>
	<div id="footer_area">
		<table id="footer_links">
			<tr>
				<th>My Account</th>
				<th>Stay Connected</th>
				<th>Help & Contact</th>
				<th>Categories</th>
			</tr>
			<tr>
				<?php if(isset($_SESSION['uFName'])) echo '<td><a href="myaccount.php">Account info</a></td>'; else echo '<td><a href="signin.php">Login</a></td>';?>
				<td><a href="https://facebook.com/dashop" target="_blank">Facebook</a></td>
				<td><a href="support.php">Support</a></td>
				<td><a href="electronics.php">Electronics</a></td>
			</tr>
			<tr>
				<?php if(isset($_SESSION['uFName'])) echo '<td>Purchase invoice</td>'; else echo '<td><a href="register.php">Registration</a></td>';?>
				<td><a href="https://twitter.com/dashop" target="_blank">Twitter</a></td>
				<td><a href="contact.php">Contact us</a></td>
				<td><a href="automobiles.php">Automobiles</a></td>
			</tr>
			<tr>
				<?php if(isset($_SESSION['uFName'])) echo '<td>Sales invoice</td>'; else echo '<td></td>';?>
				<td></td>
				<td><a href="about.php">About</a></td>
				<td><a href="clothing.php">Clothing</a></td>
			</tr>
			<tr>
				<?php if(isset($_SESSION['uFName'])) echo '<td>Transaction history</td>'; else echo '<td></td>';?>
				<td></td>
				<td><a href="#">Site map</a></td>
				<td><a href="gardening.php">Gardening</a></td>
			</tr>
			<tr>
				<td></td>
				<td></td>
				<td></td>
				<td><a href="construction.php">Construction</a></td>
			</tr>
			<tr>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
			</tr>
		</table>
		<div id="logo">
			<a href="index.php"><img src="images/logo.png" alt="daShop logo" width="90%" height="90%"></a>
		</div>
	</div>
	<div id="footer_text">
		<p>&copy 2015 <a href="index.php">daShop</a></p>
	</div>
</footer>