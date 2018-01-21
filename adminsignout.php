<?php
	session_start();

	$daShopConn=@mysqli_connect("localhost","root","","dashop");

	if($daShopConn){
		$user_log="INSERT into adminlogs(AdminEmail,LastLoggedIn,LoggedOut) values('".$_SESSION['adminemail']."','".$_SESSION['admin_in']."','".date("l, F j, Y, g:i A")."')";
		$run_user_log=@mysqli_query($daShopConn,$user_log);
		
		if($run_user_log){
			echo 'You\'ve successfully logged out. You will be redirected in <span id="count">2</span> seconds';
		}//end if

		mysqli_close($daShopConn);
		session_destroy();
		header("Refresh:1; url=admin.php");
	}//end if
?>