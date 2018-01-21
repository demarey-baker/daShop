<?php
	if(isset($_POST['signin'])){
		if(isset($_POST['userEmail'])){
			$email=true;
		}
		else
			$email=false;

		if(isset($_POST['userPword'])){
			$pWord=true;
		}
		else
			$pWord=false;

		if($email&&$pWord){
			$daShopConn=@mysqli_connect("localhost","root","","dashop");

			if($daShopConn){
				$user=$_POST['userEmail'];
				$pin=md5($_POST['userPword']);

				$login="select User_ID, User_Profile_Pic, User_fName, User_lName, Gender, PhoneNumber, Address, Parish, EmailAddress, Password, RegistrationDate, Activated from users";
				$loginAttempt=@mysqli_query($daShopConn,$login);
				$loginResult=false;

				if(@mysqli_num_rows($loginAttempt)>0){
					while($row=mysqli_fetch_assoc($loginAttempt)){
						if($pin==$row['Password']&&$user==$row['EmailAddress']){
							if($row['Activated']=='1'){
								$_SESSION['uID']=$row['User_ID'];
								$_SESSION['uProfPic']=$row['User_Profile_Pic'];
								$_SESSION['uFName']=$row['User_fName'];
								$_SESSION['uLName']=$row['User_lName'];
								$_SESSION['uGender']=$row['Gender'];
								$_SESSION['uPhoneNum']=$row['PhoneNumber'];
								$_SESSION['uAddress']=$row['Address'];
								$_SESSION['uParish']=$row['Parish'];
								$_SESSION['uEmail']=$row['EmailAddress'];
								$_SESSION['uRegDate']=$row['RegistrationDate'];
								$loginResult=true;
								$_SESSION['login']=true;
								$_SESSION['user_in']=date("l, F j, Y, g:i A");

								$other_activity_log="INSERT into activitylogs(User_ID,OtherActivity,TimeDate) values('".$_SESSION['uID']."','User '".$row['User_fName']."' just logged in','".date("l, F j, Y, g:i A")."')";
								$run_other_activity_log=@mysqli_query($daShopConn,$other_activity_log);	

							}//end if
							else{
								$_SESSION['activate_needed']=true;
								$md5_usr_id=md5($row['User_ID']);
								$_SESSION['activate_link']="activateaccount.php?new_user_name=".$md5_usr_id;
								header('Location: ' . "activateaccount.php");
							}
						}//end if
					}//end while
						if(!$loginResult){
							$_SESSION['entryError']=true;
						}
						else 
							header("Location:index.php");
				}
				else{
					$_SESSION['entryError']=true;
				}
				mysqli_close($daShopConn);
			}
		}
	}
?>