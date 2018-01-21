<?php
	if(isset($_GET['reset'])){

		if(isset($_GET['resetEmail'])){
			if(preg_match("/^([a-zA-Z]+|[a-zA-Z]+\.[a-zA-Z0-9_]+)@(([a-z]+|[a-z]+\.[a-z]+)+)(\.[a-z]+$)/", $_GET['resetEmail'])){
				$daShopConn=@mysqli_connect("localhost","root","","dashop");
				if($daShopConn){
					$select="select * from users where EmailAddress='".$_GET['resetEmail']."'";
					if(@mysqli_num_rows(@mysqli_query($daShopConn,$select))<=0){
						$other_activity_log="INSERT into activitylogs(OtherActivity,TimeDate) values('Attempt to reset account, account doesn\'t exist','".date("l, F j, Y, g:i A")."')";
						$run_other_activity_log=@mysqli_query($daShopConn,$other_activity_log);	
						$entry1=false;
					}
					else{
						$entry1=true;
						$rows=@mysqli_fetch_assoc(@mysqli_query($daShopConn,$select));

						$uID=$rows['User_ID'];

						$other_activity_log="INSERT into activitylogs(User_ID,OtherActivity,TimeDate) values('".$uID."','Attempt to reset account, account exits i.e. maybe forgot password or security breach','".date("l, F j, Y, g:i A")."')";
						$run_other_activity_log=@mysqli_query($daShopConn,$other_activity_log);	
					}
				mysqli_close($daShopConn);
				}
				else{
					$entry1=false;
				}
			}
			else{
				$entry1=false;
			}
		}//end email if
		else{
			$entry1=false;
		}

		if($entry1){
			$_SESSION['account_exist']=true;
			$_SESSION['temp_email']=$_GET['resetEmail'];
		}//end if
		else{
			echo '<div id="results1">';
			echo "<br>";
			echo '<img src="images/icons/bad.png" alt="Error" height="60px">';
			echo '<p>Account not founded, please try again or <a href="support.php">visit our support area</a></p>';
			echo '</div>';
		}
	}//end reset button response

	if(isset($_POST['pwordUpdate'])){
		$error_message=null;
		if(isset($_POST['newPword'])&&isset($_POST['newPwordConf'])){
			if($_POST['newPword']==$_POST['newPwordConf']){
				if(preg_match("/(?=.+[0-9])(?=.+[a-z])(?=.{2,}[A-Z])(?!.*\\s)(?=.+[!@#$%&_])(^.{8,16}$)/",$_POST['newPword'])){
					$entry8=true;
				}
				else{
					$error_message.="New password doesn't match pattern\\n";
					$entry8=false;
				}
			}
			else{
				$error_message.="New password doesn't match\\n";
				$entry8=false;
			}
		}
		else{
			$error_message.="New password doesn't match\\n";
			$entry8=false;
		}

		if($entry8){
			$daShopConn=mysqli_connect("localhost","root","","dashop");
			
			if($daShopConn){
				Global $uEmail;
				$uNewPword=md5($_POST['newPword']);	
				if(isset($_SESSION['temp_email']))
					$uEmail=$_SESSION['temp_email'];		
	
				$curUser="SELECT Password from users WHERE EmailAddress='".$uEmail."'";
			
				$testCurUser=mysqli_query($daShopConn,$curUser);

				if(mysqli_num_rows($testCurUser)>0){
					$pword_update="UPDATE users set Password='$uNewPword' where EmailAddress='$uEmail'";
					$run_pword_update=mysqli_query($daShopConn,$pword_update);

					if($run_pword_update){
						$select="select * from users where EmailAddress='".$uEmail."'";

						$rows=@mysqli_fetch_assoc(@mysqli_query($daShopConn,$select));

						$uID=$rows['User_ID'];

						$other_activity_log="INSERT into activitylogs(OtherActivity,TimeDate) values('User reseted password for account '".$uEmail."', maybe forgot password or security breach','".date("l, F j, Y, g:i A")."')";
						$run_other_activity_log=@mysqli_query($daShopConn,$other_activity_log);	

						if (headers_sent()){
							$_SESSION['passwordUpdated']='<script>alert("Password updated");</script>';
						    die('<script type="text/javascript">window.location.href="' . "signin.php" . '";</script>');
						}
						else{
					      	header('Location: ' . "signin.php");
					      	$_SESSION['passwordUpdated']='<script>alert("Password updated");</script>';
					      	die();
					    }
				    }
				    else{
				    	echo '<script>alert("Error updating password, please try again");</script>';
				    	if(isset($_SESSION['account_exist'])){
							unset($_SESSION['account_exist']);
						}
				    }    
				}//end outer if
				else{
					echo '<script>alert("Error updating password, please try again");</script>';
					if(isset($_SESSION['account_exist'])){
						unset($_SESSION['account_exist']);
					}
				}
				mysqli_close($daShopConn);
			}//if there is no error connecting
		}//if the variables are set
		else{
			if(isset($error_message)){
				echo '<script>alert("'.$error_message.'");</script>';
			}
		}
	}//end update password response
?>