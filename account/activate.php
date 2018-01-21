<div id="activate_area">
	<div id="header_big_p">
		Registration successful
	</div>
	<div id="activate_notes">
		Start shopping by activating your account, please click the link below to activate your account.
	</div>
	<div id="activate_header">
		<?php
			if(isset($_GET['new_user_name'])){
				unset($_SESSION['activate_link']);
				unset($_SESSION['activate_needed']);

				$daShopConn=@mysqli_connect("localhost","root","","dashop");
				$temp_id=0;

				if($daShopConn){
					$user_exists="SELECT User_ID from users";
					$user_exists_run=@mysqli_query($daShopConn,$user_exists);

					while($rows=@mysqli_fetch_assoc($user_exists_run)){
						if(md5($rows['User_ID'])==$_GET['new_user_name']){
							$temp_id=$rows['User_ID'];
						}//end if
					}//end while

					if($temp_id>0){
						$activate_user="UPDATE users set Activated='1' where User_ID='$temp_id'";
						$activate_user_run=@mysqli_query($daShopConn,$activate_user);

						$other_activity_log="INSERT into activitylogs(OtherActivity,TimeDate) values('User account activated','".date("l, F j, Y, g:i A")."')";
						$run_other_activity_log=@mysqli_query($daShopConn,$other_activity_log);	

						if($activate_user_run){
							$_SESSION['activate_results']="success";
						}
						else{
							$_SESSION['activate_results']="error";
						}
					}//end if
					
				}//if there is connection
				mysqli_close($daShopConn);
			}//end if

			if(isset($_SESSION['activate_link'])){
				echo '<a target="_blank" href=';
				echo $_SESSION['activate_link'];
				echo '>';
				echo $_SESSION['activate_link'];
				echo '</a>';
			}//end if
		?>
		<div id="results2">
			<?php
				if(isset($_SESSION['activate_results'])){
					if($_SESSION['activate_results']=="success"){
						echo '<img src="images/icons/good.png" alt="Success" height="60px">';
						echo '<p>Activation successful, <a href="signin.php">click here</a> to login</p>';
					}//end if
					else if($_SESSION['activate_results']=="error"){
						echo '<img src="images/icons/bad.png" alt="Error" height="60px">';
						echo '<p>Activation error, <a href="signin.php">please try again</a></p>';
					}//end if
				}//end if
			?>
		</div>
	</div>
</div>