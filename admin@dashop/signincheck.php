<?php
	if(isset($_POST['submit'])){
		$error_message=null;
		if(isset($_POST['admin_email'])){
			$entry=true;
		}
		else{
			$error_message.="Please specify an E-mail\\n";
			$entry=false;
		}

		if(isset($_POST['admin_pword'])){
			$entry1=true;
		}
		else{
			$error_message.="Please specify a password\\n";
			$entry1=false;
		}

		if($entry1&&$entry){
			$daShopConn=mysqli_connect("localhost","root","","dashop");

			if($daShopConn){
				$login_attempt="SELECT AdminEmail, Password from admin";
				$login_attempt_run=mysqli_query($daShopConn,$login_attempt);

				$usr=$_POST['admin_email'];
				$pwd=md5($_POST['admin_pword']);
				$login_result=false;

				while($rows=mysqli_fetch_assoc($login_attempt_run)){
					if($rows['AdminEmail']==$usr&&$rows['Password']==$pwd){
						$login_result=true;
						$_SESSION['adminemail']=$rows['AdminEmail'];
						$_SESSION['admin_in']=date("l, F j, Y, g:i A");
					}//end if
				}//end while

				if($login_result){
					$_SESSION['adminlogin']=true;
					header("Location:admin@admin.php");
				}
				else{
					echo '<script>alert("Wrong credentials or user doesn\'t exist");</script>';
				}

			}//if there is no error connecting
			else{
				die("Connection error! ".mysqli_error());
			}
			mysqli_close($daShopConn);
		}
		else{
			echo '<script>alert("'.$error_message.'");</script>';
		}
	}
?>