<div id="support_area">
	<div class="col col-lg-6">
		<div id="support_text">
			<div id="support_text_header">
				<p>daShop Support</p>
			</div>
			<div id="support_text_text">
				<p>How can we help today?</p>
			</div>
			<div id="support_form">
				<form action="support.php" method="post">
					<div class="row_text">Name:</div>
					<input required class="support_input_box" name="support_name" type='text' value="<?php if(isset($_SESSION['uFName'])&&isset($_SESSION['uLName'])){ echo $_SESSION['uFName']." ".$_SESSION['uLName'];}else if(isset($_POST['support_name']))echo $_POST['support_name'];?>" placeholder='name'>
					<div class="row_text">E-mail:</div>
					<input required onkeyup="validateSupportEmail()" name="support_email" id="support_email_box" type='email' value="<?php if(isset($_SESSION['uEmail'])) echo $_SESSION['uEmail'];else if(isset($_POST['support_email']))echo $_POST['support_email'];?>"placeholder='email@dashop.com'>
					<div class="row_text">Commencts:</div></td>
					<textarea type='text' id="support_textarea_box" placeholder='comments' name="support_text" required><?php if(isset($_POST['support_text']))echo $_POST['support_text'];?></textarea>
					<div id="submit_holder"><input type='submit' id="submit_button" name='submit' value='Submit'></div>
				</form>
				<?php include("supporter.php");?>
			</div>
		</div>
	</div>
	<div class="col col-lg-6">
		<div id="support_picture">
			<div id="support_picture_picture">
				<img src="images/feedback.png" height="100%" width="100%">
			</div>
		</div>
	</div>
</div>