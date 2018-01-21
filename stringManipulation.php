<!DOCTYPE>
<html>
	<head>
		<title>
			stringManipulation
		</title>
		<style type="text/css">
			body{background-color:#aaaaaa;}
			hr{width:30%;float:left;}
			h2{color:#3d3d3d;}
		</style>
	</head>
	<header>
		<h1><center><u>stringManipulation</center></u></h1>
	</header>
	<body>
		<?php 
			function validCCN($x){
				$noSpaceDash=preg_replace('/\s+|-/','',$x);
				echo (is_Numeric($noSpaceDash)) ? "Valid credit card number!<br>" : "Invalid credit card number!<br>";
			}//end validCCN
			
			function validEmail($x){
				echo (preg_match("/^([a-zA-z]+|[a-zA-z]+\.[a-zA-z]+)@(mail.cptr304.org|cptr304.org)$/",$x)) ? "Valid e-mail address<br>" : "Invalid e-mail address<br>";
			}//end validEmail
			
			function validPword(&$Passwords){
				foreach($Passwords as $x){
					if(preg_match("/(?=.+[0-9])(?=.+[a-z])(?=.{2,}[A-Z])(?!.*\\s)(?=.+[!@#$%&_])(^.{8,16}$)/",$x))
						echo "<br>\"$x\" is a strong password<br>";
					else{
						$noSpacedX=preg_replace('/\s+/','',$x);
						echo "<br>\"$x\" is not a strong password <br>";
						if(strlen($x)<8)
							echo "The length of \"$x\" is too short<br>";
						if(strlen($x)>16)
							echo "The length of \"$x\" is too long<br>";
						if(preg_match("/\s+/",$x))
							echo "\"$x\" must contain no space(s)<br>";
						if(!preg_match("/[0-9]+/",$noSpacedX))
							echo "\"$x\" must contain at least one number <br>";
						if(!preg_match("/[a-z]+/",$noSpacedX))
							echo "\"$x\" must contain at least one lowercase letter <br>";
						if(!preg_match("/[A-Z]{2,}/",$noSpacedX))
							echo "\"$x\" must contain at least two uppercase letters <br>";
						if(!preg_match("/[!@#$%&_]+/",$noSpacedX))
							echo "\"$x\" must contain at least one symbol <br>";
						echo "<hr>";
					}//end else							
				}//end foreach	
			}//end validPword
			
			echo "<h2>validCreditCardNumber Function</h2>";
			validCCn("8910-1234-5678-6543");
			validCCn("AOOO-9123-4567-0123");
			echo "<hr>";
			
			echo"<h2>validEmail Function</h2>";
			validEmail("damion.mitchell@cptr304.org"); 
			validEmail("dmitchell@mail.cptr304.org"); 
			validEmail("dmitchell@gmail.com");
			echo "<hr>";
			
			$pwdTrial=array("H ","as1@idS Before","asISaidBefore","as12aid3efore","12IS345B12345","as_@aid!efore","12asISaid_efore","Ds12ISas5dBefor@","a!I12SaidBefore","_sIS&idBefore12");//password array with 10 elements
			
			echo "<h2>validPassword Function</h2>";
			validPword($pwdTrial);
			echo "<hr>";
			
			function revNumber($x){
				for($i=$x; $i>=0; $i--)
					echo "$i<br>";
			}//end revNumber
			
			$x="woodworking project";
			echo "<br>";
			echo substr($x,4)."<br>";
			echo substr($x,4,7)."<br>";
			echo substr($x,0,8)."<br>";
			echo substr($x,-7)."<br>";
			echo substr($x,-12,4)."<br>";
			echo substr($x,-12,-4)."<br>";
			echo strchr($x,"w")."<br>";
			revNumber(10);
		?>
		<!--Baker 		Demarey 50120321
			Osbourne 	Akeem 	26120288-->
	</body>
</html>