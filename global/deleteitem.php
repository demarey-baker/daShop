<?php
	session_start();

	$daShopConn=@mysqli_connect("localhost","root","","dashop");

	if($daShopConn){
		if(isset($_GET['autonum'])&&isset($_GET['name'])){
			$name=filter_var($_GET['name'], FILTER_SANITIZE_STRING);
			$autonum=filter_var($_GET['autonum'], FILTER_SANITIZE_STRING);
			$current_url=base64_decode($_GET['return_url']);

			$delete_item="DELETE from automobiles where AutoNum_ID='$autonum'";
			$run_delete_item=@mysqli_query($daShopConn,$delete_item);

			if($run_delete_item){
				if(isset($_SESSION['uID'])){
					$uID=$_SESSION['uID'];
				}//end if
				else{
					$uID='Admin';
				}//end else
				$other_activity_log="INSERT into activitylogs(User_ID,OtherActivity,TimeDate) values('".$uID."','User deletes item ".$name."','".date("l, F j, Y, g:i A")."')";
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