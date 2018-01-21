<div id="profile_header">
	<div id="profilePhoto">
		<img <?php if(isset($_SESSION['uProfPic'])){echo 'src="'.$_SESSION['uProfPic'].'"';}?>height="100%" width="100%" alt="user profile picture">
	</div>
	<div id="name">
		<?php if(isset($_SESSION['uFName'])&&isset($_SESSION['uLName'])) echo $_SESSION['uFName']." ".$_SESSION['uLName'];?>
	</div>
	<div id="member_since">
		<?php if(isset($_SESSION['uRegDate'])) echo 'Member since: <b>'.$_SESSION['uRegDate'].'</b>';?>
	</div>
	<div id="edit_profile">
		<a href="editprofile.php"><button id="edit_profile_button" type="button">Edit profile</button></a>
		<a href="killprofile.php"><button id="kill_profile_button" type="button">Delete profile</button></a>
	</div>
</div>