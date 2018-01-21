<?php
	if(isset($_POST['pwordUpdate'])){
		$error_message=null;
		
		if(isset($_POST['curPword'])){
			if(preg_match("/(?=.+[0-9])(?=.+[a-z])(?=.{2,}[A-Z])(?!.*\\s)(?=.+[!@#$%&_])(^.{8,16}$)/",$_POST['curPword'])){
					$entry1=true;
				}
			else{
				$error_message.="Invalid password\\n";
				$entry1=false;
			}
		}
		else{
			$error_message.="Password error\\n";
			$entry1=false;
		}

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

		if($entry1&&$entry8){
			$daShopConn=mysqli_connect("localhost","root","","dashop");
			
			if($daShopConn){
				$uCurPword=md5($_POST['curPword']);
				$uNewPword=md5($_POST['newPword']);	
				$uID=$_SESSION['uID'];		

				$curUser="SELECT Password from users WHERE User_ID='$uID'";
				$testCurUser=mysqli_query($daShopConn,$curUser);

				if(mysqli_num_rows($testCurUser)>0){
					while($row=mysqli_fetch_assoc($testCurUser)){
						if($uCurPword==$row['Password']){
							$pword_update="UPDATE users set Password='$uNewPword' where User_ID='$uID'";
							$run_pword_update=mysqli_query($daShopConn,$pword_update);

							$other_activity_log="INSERT into activitylogs(User_ID,OtherActivity,TimeDate) values('".$_SESSION['uID']."','User changed password','".date("l, F j, Y, g:i A")."')";
							$run_other_activity_log=@mysqli_query($daShopConn,$other_activity_log);	

							if($run_pword_update){
								if (headers_sent()){
									$_SESSION['passwordUpdated']='<script>alert("Password updated");</script>';
								    die('<script type="text/javascript">window.location.href="' . "myaccount.php" . '";</script>');
								}
								else{
							      	header('Location: ' . "myaccount.php");
							      	$_SESSION['passwordUpdated']='<script>alert("Password updated");</script>';
							      	die();
							    }
						    }
						    else{
						    	echo '<script>alert("Error updating password, please try again");</script>';
						    }   
						}//end inner if
						else{
							echo '<script>alert("Invalid password, please try again");</script>';
						}
					}//end while 
				}//end outer if
				else
					echo '<script>alert("Error updating password, please try again");</script>';
				mysqli_close($daShopConn);
			}//if there is no error connecting
		}//if the variables are set
		else{
			if(isset($error_message)){
				echo '<script>alert("'.$error_message.'");</script>';
			}
		}
	}//end if
?>