<!DOCTYPE html>
<html>
	<?php
		if(isset($_POST['try'])){
			if(isset($_POST['file_input'])){
				echo "hey";
			}
			else{
				echo "no";
			}
		}
	?>
	<body>
		<form action="new.php" method="post">
			<input name="file_input" type="file" required>
			<input name="try" type="submit" value="try">
		</form>
	</body>
</html>