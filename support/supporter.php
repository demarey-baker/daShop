<?php
	if(isset($_POST['submit'])){
		Global $error_message;
		if(isset($_POST['support_name'])){
			$entry=true;
		}
		else{
			$entry=false;
		}
		if(isset($_POST['support_email'])){
			if(preg_match("/^([a-zA-Z]+|[a-zA-Z]+\.[a-zA-Z0-9_]+)@(([a-z]+|[a-z]+\.[a-z]+)+)(\.[a-z]+$)/", $_POST['support_email'])){
				$entry1=true;
			}
			else{
				$entry1=false;
				$error_message.="Invalid E-mail\\n";
			}
		}
		else{
			$entry1=false;
			$error_message.="Invalid E-mail\\n";
		}
		if(isset($_POST['support_text'])){
			$entry2=true;
		}
		else{
			$entry2=false;
		}

		if($entry&&$entry1&&$entry2){
			$daShopConn=@mysqli_connect("localhost","root","","dashop");

			if($daShopConn){
				$name=$_POST['support_name'];
				$email=$_POST['support_email'];
				$text=$_POST['support_text'];

				$add_comment="INSERT into support(Name,EmailAddress,Comments,TimeDate) values('$name','$email','$text','".date("l, F j, Y, g:i A")."')";
				$run_add_comment=mysqli_query($daShopConn,$add_comment);

				if($run_add_comment){
						if(isset($_SESSION['login'])){
							if($_SESSION['login']){
								$other_activity_log="INSERT into activitylogs(User_ID,OtherActivity,TimeDate) values('".$_SESSION['uID']."','User added comments, probably be concern or suggestions','".date("l, F j, Y, g:i A")."')";
								$run_other_activity_log=mysqli_query($daShopConn,$other_activity_log);
							}//end if
						}//end if
						else{
							$other_activity_log="INSERT into activitylogs(OtherActivity,TimeDate) values('Guest user added comments, probably be concern or suggestions','".date("l, F j, Y, g:i A")."')";
							$run_other_activity_log=mysqli_query($daShopConn,$other_activity_log);
						}
					if (headers_sent()){
						echo '<script>alert("Your comments was submitted successfully\\n");</script>';
					    die('<script type="text/javascript">window.location.href="' . "index.php" . '";</script>');
					}
					else{
						echo '<script>alert("Your comments was submitted successfully\\n");</script>';
				      	die('<script type="text/javascript">window.location.href="' . "index.php" . '";</script>');
				    }
				}
			mysqli_close($daShopConn);
			}//if there is no error connecting
			else{
				echo '<script>alert("Error connecting, please try again");</script>';
			}
		}
		else{
			echo '<script>alert("'.$error_message.'");</script>';
		}
	}//end support submit response
?>