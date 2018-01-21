<?php
	$daShopConn=mysqli_connect("localhost","root","","dashop");

	if($daShopConn){
		$admin_=$_SESSION['adminemail'];

		$settings_attempt="SELECT AdminEmail from admin where AdminEmail='$admin_'";
		$settings_attempt_run=mysqli_query($daShopConn,$settings_attempt);

		$rows=mysqli_fetch_assoc($settings_attempt_run);

		$email=$rows['AdminEmail'];
		
	}//if there is no error connecting
	else{
		die("Connection error! ".mysqli_error());
	}
	mysqli_close($daShopConn);

	echo "<div class=\"profile\">";
	echo "<label>Email</label>";
	echo "<span class=\"ans\">$email</span>";
	echo "</div>";
?>