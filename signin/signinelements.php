<?php include("signincheck.php");?>
<div id="signin_area">	
	<div class="col col-lg-6">
		<div id="left_area">
			<p>Sign in</p>
			<form action="signin.php" method='post' enctype="multipart/form-data">
				<input type='email' id="emailHolder" placeholder='email@dashop.com' name='userEmail' value="<?php if(isset($_POST['userEmail'])) echo $_POST['userEmail']; if(isset($_SESSION['newUser'])) echo $_SESSION['newUser'];?>" required>
				<input type='password' id="pwordHolder" placeholder='password' name='userPword' required>
				<?php echo "<br>";?>
				<input type='checkbox' id="rmbrMe" name='rememberMe'><div id="rmbrMeP">Remember me</div>
				<input id='buttonHolder' type='submit' name='signin' value='Sign in'>
			</form>
			<?php
				if(isset($_SESSION['entryError'])){
					if($_SESSION['entryError']){
						echo '<div id="forgot"><font style="color:red;">Wrong credentials, or user doesn\'t exist!</font><br><a href="forgotPword.php">Forgot password?</a></div>';
					}
				}
			?>
			<div id="signup">Don't have a daShop account?<a href="register.php"> Sign up here</a></div>
		</div>
	</div>
	<div class="col col-lg-6">
		<div id="right_area">
			<div id="signin_pic">
				<img src="images/signin.jpg" alt="sign in" height="100%" width="100%">
			</div>
			<div id="signin_text">
				<h2><center>Sign in to daShop</center></h2>
				<h5>Signing in gives you privileges to do e-commerce transactions securely.</h5>
				<h5>For help & assistants. Visit our <a href="support.php">support</a> area.</h5>
			</div>
		</div>
	</div>
</div>