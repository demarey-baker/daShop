<?php
	session_start();

	$daShopConn=@mysqli_connect("localhost","root","","dashop");

	if($daShopConn){
		if(isset($_GET['User_ID'])&&isset($_GET['fname'])){
			$name=filter_var($_GET['fname'], FILTER_SANITIZE_STRING);
			$usernum=filter_var($_GET['User_ID'], FILTER_SANITIZE_STRING);
			$current_url=base64_decode($_GET['return_url']);

			$delete_user="DELETE from users where User_ID='$usernum'";
			$run_delete_user=@mysqli_query($daShopConn,$delete_user);

			if($run_delete_user){
				$uID='Admin';

				$other_activity_log="INSERT into activitylogs(User_ID,OtherActivity,TimeDate) values('".$uID."','Admin deletes ".$name."','".date("l, F j, Y, g:i A")."')";
				$run_other_activity_log=@mysqli_query($daShopConn,$other_activity_log);	

				header('Location:'.$current_url);
			}//end if
		}//end if transaction is add item
		else{
			if(isset($_GET['return_url'])){
				$current_url=base64_decode($_GET['return_url']);
				header('Location:'.$current_url);
			}//end if
			else{
				header("Location:index.php");
			}//end if
		}//end else
	}
	mysqli_close($daShopConn);
?>