<?php
	if(isset($_POST['update'])){
		GLOBAL $target_file,$error_message,$target_file;
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
				$error_message.="Telephone number pattern incorrect\n";
			}
		}
		else{
			$entry4=false;
			$error_message.="Telephone number error\n";
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
				$entry7=true;
			}
			else{
				$entry7=false;
				$error_message.="E-mail pattern incorrect\n";
			}
		}
		else{
			$entry7=false;
			$error_message.="E-mail error\n";
		}

		if($entry1&&$entry2&&$entry3&&$entry4&&$entry5&&$entry6&&$entry7&&$entry10){
			$daShopConn=mysqli_connect("localhost","root","","dashop");
			
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
				$uID=$_SESSION['uID'];

				$updateUser="UPDATE users SET User_Profile_Pic='$profile_pic', User_fName='$uFName',User_lName='$uLName',Gender='$gender',PhoneNumber='$uTelNum', Address='$uAddress', 
				Parish='$uParish', EmailAddress='$uEmail' WHERE User_ID='$uID'";
				$insertUpdateUser=mysqli_query($daShopConn,$updateUser);

				if($insertUpdateUser){
					move_uploaded_file($_FILES["profile_img"]["tmp_name"], $target_file);
					$_SESSION['uProfPic']=$profile_pic;
					$_SESSION['uFName']=$uFName;
					$_SESSION['uLName']=$uLName;
					$_SESSION['uGender']=$gender;
					$_SESSION['uPhoneNum']=$uTelNum;
					$_SESSION['uAddress']=$uAddress;
					$_SESSION['uParish']=$uParish;
					$_SESSION['uEmail']=$uEmail;

					$other_activity_log="INSERT into activitylogs(User_ID,OtherActivity,TimeDate) values('".$_SESSION['uID']."','User '".$uFName."' updated account','".date("l, F j, Y, g:i A")."')";
					$run_other_activity_log=@mysqli_query($daShopConn,$other_activity_log);	

					if (headers_sent()){
						$_SESSION['accountUpdated']='<script>alert("Account updated");</script>';
					    die('<script type="text/javascript">window.location.href="' . "myaccount.php" . '";</script>');
					}
					else{
				      	header('Location: ' . "myaccount.php");
				      	$_SESSION['accountUpdated']='<script>alert("Account updated");</script>';
				      	die();
				    }    
				}
				else
					echo '<script>alert("Error updating account, please try again");</script>';
				mysqli_close($daShopConn);
			}//if there is no error connecting
		}//if the variables are set
		else{
			echo '<script>alert("'.$error_message.'");</script>';
		}
	}//end if
?>