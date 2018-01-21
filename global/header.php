<div id="top_container">
	<a name="header">
	<div id="header_area">
		<div id="header_first_row">
			<div id="logo">
				<a href="index.php"><img src="images/logo.png" alt="daShop logo" width="90%" height="90%"></a>
			</div>
			<div id="search_area">
				<div id="search_row">
					<form action="search.php" methosd="get">
					 <div class="col-lg-12">
					    <div class="input-group">
					      <input name="q" type="text" class="form-control" aria-label="..." onkeyup="showResult(this.value)" placeholder="search for...">
					      <div id="livesearch"></div>
					      <div class="input-group-btn">
					       <input class="btn btn-default" type="submit" value="Search">
					      </div><!-- /btn-group -->
					    </div><!-- /input-group -->
					  </div><!-- /.col-lg-6 -->
					</form>
				</div>
			</div>
			<div id="shop_cart">
				<?php
					if(isset($_SESSION['cart_items'])){
						echo '<a href="mycart.php">';
						echo '<button id="shop_row">';
						echo '<span class="glyphicon glyphicon-shopping-cart" aria-hidden="true">';
						echo '</span>';
						echo '</button>';
						echo '</a>';
					}//end if
					else{ 
						echo '<a style="color:#555555;" href="mycart.php">';
						echo '<button id="shop_row">';
						echo '<span class="glyphicon glyphicon-shopping-cart" aria-hidden="true">';
						echo '</span>';
						echo '</button>';
						echo '</a>';
					}//end else
				?>
			</div>
			<div id="account_area">
				<div id="account_row">
					<?php 
						if(isset($_SESSION['uFName'])){
							echo "Hey <b><a href='myaccount.php'>".$_SESSION['uFName']."!</a></b>";
							echo ' | <a id="sign_out" href="signout.php"><font style="color:#555555;">Sign out</font></a>';
						}
						else{
							echo '<a href="signin.php">Sign in</a> |';
							echo ' <a href="register.php">Register</a>';
						}
					?>
				</div>
			</div>
		</div>
		<div id="navigation_area">
			<ul class="nav nav-tabs">
			  <li><a href="automobiles.php">Automobiles</a></li>
	          <li><a href="clothing.php">Clothing</a></li>
	          <li><a href="construction.php">Construction</a></li>
	          <li><a href="electronics.php">Electronics</a></li>
	          <li><a href="gardening.php">Gardening</a></li>
			</ul>
		</div>
	</div>
</div>