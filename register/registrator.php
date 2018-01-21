<?php
	if(isset($_POST['signup'])){
		GLOBAL $target_file,$error_message;
	    if(isset($_FILES['profile_img'])) {
	    	$extentions = pathinfo($_FILES['profile_img']['name'],PATHINFO_EXTENSION);
	    	GLOBAL $new_user_pic_name;

	    	if(isset($_POST['userFName'])){
	    		$new_user_pic_name.=$_POST['userFName'];
	    		$new_user_pic_name.=time();
	    		$new_user_pic_name.=".".$extentions;
	    	}//end if

	        $target_dir = "users_profile_pictures/";
		    $target_file = $target_dir . $new_user_pic_name;
		    $entry10=true;
		}
        else{
        	$entry10=false;
        }

		if(isset($_POST['userFName'])){
			$entry1=true;
		}
		else{
			$entry1=false;
		}

		if(isset($_POST['userLName'])){
			$entry2=true;
		}
		else{
			$entry2=false;
		}
		
		if(isset($_POST['gender'])){
			$entry3=true;
		}
		else{
			$entry3=false;
		}
		
		if(isset($_POST['userTeleNum'])){
			if(preg_match("/^(1(-)?)?([1-9][0-9][0-9](-)?)([1-9][0-9][0-9](-)?)([0-9][0-9][0-9][0-9]$)/", $_POST['userTeleNum'])){
				$entry4=true;
			}
			else{
				$entry4=false;
				$error_message.="Telephone number pattern incorrect\\n";
			}
		}
		else{
			$entry4=false;
			$error_message.="Telephone number error\\n";
		}
		
		if(isset($_POST['userAddress'])){
			$entry5=true;
		}
		else{
			$entry5=false;
		}
		
		if(isset($_POST['userParish'])){
			$entry6=true;
		}
		else{
			$entry6=false;
		}
		
		if(isset($_POST['userEmail'])){
			if(preg_match("/^([a-zA-Z]+|[a-zA-Z]+\.[a-zA-Z0-9_]+)@(([a-z]+|[a-z]+\.[a-z]+)+)(\.[a-z]+$)/", $_POST['userEmail'])){
				$daShopConn=@mysqli_connect("localhost","root","","dashop");
				if($daShopConn){
					$select="select * from users where EmailAddress='".$_POST['userEmail']."'";
					if(@mysqli_num_rows(@mysqli_query($daShopConn,$select))>0){
						$entry9=false;
						$entry7=false;
						$error_message.="This E-mail is already registered to a daShop account, visit our support area for help\\n";
					}
					else{
						$entry7=true;
						$entry9=true;
					}
				mysqli_close($daShopConn);
				}
				else{
					$entry9=false;
					$entry7=false;
					$error_message.="Error checking account existents\\n";
				}
			}
			else{
				$entry9=false;
				$entry7=false;
				$error_message.="E-mail incorrect\\n";
			}
		}
		else{
			$entry9=false;
			$entry7=false;
			$error_message.="E-mail error\\n";
		}
		
		if(isset($_POST['userPword'])&&isset($_POST['userPwordConf'])){
			if($_POST['userPword']==$_POST['userPwordConf']){
				if(preg_match("/(?=.+[0-9])(?=.+[a-z])(?=.{2,}[A-Z])(?!.*\\s)(?=.+[!@#$%&_])(^.{8,16}$)/",$_POST['userPword'])){
					$entry8=true;
				}
				else{
					$error_message.="Password doesn't match daShop security standards\\n";
					$entry8=false;
				}
			}
			else{
				$error_message.="Passwords doesn't match\\n";
				$entry8=false;
			}
		}
		else{
			$error_message.="Password doesn't match\\n";
			$entry8=false;
		}

		if($entry1&&$entry2&&$entry3&&$entry4&&$entry5&&$entry6&&$entry7&&$entry8&&$entry9&&$entry10){
			$daShopConn=@mysqli_connect("localhost","root","","dashop");
			
			if($daShopConn){
				if($target_file=="users_profile_pictures/"){
					$target_file.="default_prof.png";
				}
				$profile_pic=$target_file;
				$uFName=$_POST['userFName'];
				$uLName=$_POST['userLName'];
				$gender=$_POST['gender'];
				$uTelNum=$_POST['userTeleNum'];
				$uAddress=$_POST['userAddress'];
				$uParish=$_POST['userParish'];
				$uEmail=$_POST['userEmail'];
				$uPword=md5($_POST['userPword']);
				$uRegDate=date("l")." ".date("Y-m-d");
				$time=date("g:i A");

				$newUser="insert into Users(User_Profile_Pic, User_fName, User_lName, Gender, PhoneNumber, Address, Parish, EmailAddress, Password, RegistrationDate, Time, Activated) values
				('$profile_pic','$uFName','$uLName','$gender','$uTelNum','$uAddress','$uParish','$uEmail','$uPword','$uRegDate','$time','0')";
				$insertNewUser=@mysqli_query($daShopConn,$newUser);

				if($insertNewUser){
					$other_activity_log="INSERT into activitylogs(OtherActivity,TimeDate) values('New user, just registered','".date("l, F j, Y, g:i A")."')";
					$run_other_activity_log=@mysqli_query($daShopConn,$other_activity_log);	

					move_uploaded_file($_FILES["profile_img"]["tmp_name"], $target_file);
					$_SESSION['newUser']=$_POST['userEmail'];
					$_SESSION['activate_needed']=true;
					if (headers_sent()){
						echo '<script>alert("Registration successful");</script>';
					   die('<script type="text/javascript">window.location.href="' . "signin.php" . '";</script>');
					}
					else{
						echo '<script>alert("Registration successful");</script>';
				      	header('Location: ' . "signin.php");
				      	die();
				    }    
				}
				else
					echo '<script>alert("Error creating account, please try again");</script>';
				mysqli_close($daShopConn);
			}//if there is no error connecting
			else{
				echo '<script>alert("Error connecting, please try again");</script>';
			}
		}//if the variables are set
		else{
			echo '<script>alert("'.$error_message.'");</script>';
		}
	}//end if
?>