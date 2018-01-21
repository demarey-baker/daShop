<?php
	session_start();
	if(isset($_SESSION['current_url'])){
		$current_url=($_SESSION['current_url']);
	}

	$daShopConn=@mysqli_connect("localhost","root","","dashop");

	include('../global/paginatefunction.php');

	if($daShopConn){
		$get_users="SELECT * from users";
		$run_get_users=@mysqli_query($daShopConn,$get_users);

		if(@mysqli_num_rows($run_get_users)>0){
			//continue only if $_POST is set and it is a Ajax request
			if(isset($_POST) && isset($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest'){
				//Get page number from Ajax POST
				if(isset($_POST["page"])){
					$page_number = filter_var($_POST["page"], FILTER_SANITIZE_NUMBER_INT, FILTER_FLAG_STRIP_HIGH); //filter number
					if(!is_numeric($page_number)){die('Invalid page number!');} //incase of invalid page number
				}else{
					$page_number = 1; //if there's no page number, set it to 1
				}
				$item_per_page=8;
				//get total number of records from database for pagination
				$results = mysqli_query($daShopConn,"SELECT COUNT(*) FROM users");
				$get_total_rows = $results->fetch_row(); //hold total records in variable
				//break records into pages
				$total_pages = ceil($get_total_rows[0]/$item_per_page);
				
				//get starting position to fetch the records
				$page_position = (($page_number-1) * $item_per_page);
				
				//SQL query that will fetch group of records depending on starting position and item per page. See SQL LIMIT clause
				$results = mysqli_query($daShopConn,"SELECT * from users ORDER BY User_ID DESC LIMIT $page_position, $item_per_page");
				
				//Display records fetched from database.

				echo '<ul class="contents">';

				echo '<table class="table">';
				echo '<tr>';
				echo '<th>User ID</th>';
				echo '<th>First name</th>';
				echo '<th>Last name</th>';
				echo '<th>Gender</th>';
				echo '<th>Phone</th>';
				echo '<th>Address</th>';
				echo '<th>Parish</th>';
				echo '<th>E-mail</th>';
				echo '<th>Registered</th>';
				echo '<th>Time</th>';
				echo '<th>Activated</th>';
				echo '<th></th>';
				echo '</tr>';
			
				while($rows=mysqli_fetch_assoc($results)){
					echo '<tr>';
					echo '<td>'.$rows['User_ID'].'</td>';
					echo '<td>'.$rows['User_fName'].'</td>';
					echo '<td>'.$rows['User_lName'].'</td>';
					echo '<td>'.$rows['Gender'].'</td>';
					echo '<td>'.$rows['PhoneNumber'].'</td>';
					echo '<td>'.$rows['Address'].'</td>';
					echo '<td>'.$rows['Parish'].'</td>';
					echo '<td>'.$rows['EmailAddress'].'</td>';
					echo '<td>'.$rows['RegistrationDate'].'</td>';
					echo '<td>'.$rows['Time'].'</td>';
					echo '<td>'.$rows['Activated'].'</td>';
					echo '<td>';
					echo '<a href="global/killuser.php?User_ID='.$rows['User_ID'].'&&return_url='.$current_url.'&&fname='.$rows['User_fName'].'"><button onclick="return confirm(\'Are you sure you want to remove user '.$rows['User_fName'].'?\');" id="remove_items_button" type="button">';
					echo '<span class="glyphicon glyphicon-remove" aria-hidden="true">';
					echo '</span>';
					echo '</button></a>';
					echo '</td>';
					echo '</tr>';
				}//end while
				echo '</table>';
				echo '</ul>';
				
				echo '<div align="center">';
				/* We call the pagination function here to generate Pagination link for us. 
				As you can see I have passed several parameters to the function. */
				echo paginate_function($item_per_page, $page_number, $get_total_rows[0], $total_pages);
				echo '</div>';
			}//end if
		}//end if
		mysqli_close($daShopConn);
	}//end if
	else{
		echo '<script>alert("Error connecting, please try again");</script>';
	}
?>