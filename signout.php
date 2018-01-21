<?php
	session_start();

	$daShopConn=@mysqli_connect("localhost","root","","dashop");

	if($daShopConn){
		$user_log="INSERT into userlogs(User_ID,LastLoggedIn,LoggedOut) values('".$_SESSION['uID']."','".$_SESSION['user_in']."','".date("l, F j, Y, g:i A")."')";
		$run_user_log=@mysqli_query($daShopConn,$user_log);

		$other_activity_log="INSERT into activitylogs(User_ID,OtherActivity,TimeDate) values('".$_SESSION['uID']."','User just logged out','".date("l, F j, Y, g:i A")."')";
		$run_other_activity_log=@mysqli_query($daShopConn,$other_activity_log);	
		
		if($run_user_log){
			echo 'You\'ve successfully logged out. You will be redirected in <span id="count">2</span> seconds';
		}//end if

		mysqli_close($daShopConn);
		session_destroy();
		header("Refresh:1; url=index.php");
	}//end if
?>