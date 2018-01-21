<div id="account-div">
	<fieldset id="profileField">
		<legend>Your account details
			<a href="" onclick="return false;" id="edit" class="account_txt" > Edit</a>
		</legend>
		
		<?php
			if(isset($_SESSION['adminlogin'])){
				include("settings.php");					
			}
		?>	
	</fieldset>

	<div id="editPro">
		<legend>Your account details
			<a href="" onclick="return false;" id="cancel" class="account_txt" > Cancel</a>
		</legend>
		<form method="post">
			<table>
				<tr>				
					<td >Email</td>						
					<td><input type="email" name="emaild" value="<?php if(isset($email)) echo $email;?>" placeholder="Email" class="signupbox"  required></td>			
				</tr>			
			</table>
		</form>
	</div>

	<br><br>

	<fieldset>
		<legend>Password
			<a id="change_password" href="" onclick="return false;" style="float:right;color:#000; font-size:14px;"> Change Password</a>
		</legend>
		<div id="passwordSlide">
			<form action="admin@settings.php" method="post">
		 	    <table>
		   		 	 <tr>
				  	  	<td>Old Password</td>
					  	<td><input type="password" class="signupbox" name="curPword" required/></td>
					  	<td><?php //echo $ermsg; ?></td>
				  	</tr>
				  	<tr>
				  	  	<td>New Password</td>
					  	<td><input type="password" class="signupbox" name="newPword" required/></td>
				  	</tr>
				  	<tr>
				  	  	<td>Confirm New Password</td>
					  	<td><input type="password" class="signupbox" name="newPwordConf" required/></td>
					  	<td><?php //echo $ermsg1; ?></td>
				  	</tr>
				  	<tr>
				  	  	<td></td>
					  	<td><div id="change_password"><input type='submit' name="pwordUpdate" id="change_password_button" value="Change password"></div></td>
				  	</tr>
				</table>
			</form>
			<?php include("pwordupdate.php");?>
		</div>
	</fieldset>	
</div>