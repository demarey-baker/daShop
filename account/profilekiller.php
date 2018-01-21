<?php
	if(isset($_POST['kill'])){
		if(isset($_POST['killaccount'])){
			$entry=true;
		}//end if
		else{
			$entry=false;
		}//end else

		if($entry){
			$daShopConn=mysqli_connect("localhost","root","","dashop");
			
			if($daShopConn){
				$uCurPword=md5($_POST['killaccount']);
				$uID=$_SESSION['uID'];		

				$curUser="SELECT Password from users WHERE User_ID='$uID'";
				$testCurUser=mysqli_query($daShopConn,$curUser);

				if(mysqli_num_rows($testCurUser)>0){
					$row=mysqli_fetch_assoc($testCurUser);

					if($uCurPword==$row['Password']){
						$account_kill="DELETE from  users where User_ID='$uID'";
						$run_account_kill=mysqli_query($daShopConn,$account_kill);

						$other_activity_log="INSERT into activitylogs(User_ID,OtherActivity,TimeDate) values('".$_SESSION['uID']."','User deleted account','".date("l, F j, Y, g:i A")."')";
						$run_other_activity_log=@mysqli_query($daShopConn,$other_activity_log);	

						if($run_account_kill){
							if (headers_sent()){
							    die('<script type="text/javascript">window.location.href="' . "signout.php" . '";</script>');
							}
							else{
						      	header('Location: ' . "signout.php");
						      	echo '<script>alert("Account, deleted");</script>';
						      	die();
						    }
					    }
					    else{
					    	echo '<script>alert("Error deleting account, please try again");</script>';
					    }   
					}//end inner if
					else{
						$other_activity_log="INSERT into activitylogs(User_ID,OtherActivity,TimeDate) values('".$_SESSION['uID']."','User attempted to delete account, with invalid password','".date("l, F j, Y, g:i A")."')";
						$run_other_activity_log=@mysqli_query($daShopConn,$other_activity_log);	
						echo '<script>alert("Invalid password, please try again");</script>';
					}//end else

				}//end if
				else{
					echo '<script>alert("Error deleting account, please try again");</script>';
				}//end else

				mysqli_close($daShopConn);
			}//end if
		}//end if
		else{
			echo '<script>alert("Please enter a password to proceed");</script>';
		}//end else
	}//end if
?>