<?php
	$daShopConn=@mysqli_connect("localhost","root","","dashop");

	include('../global/paginatefunction.php');

	if($daShopConn){
		$get_logs="SELECT * from adminlogs";
		$run_get_logs=@mysqli_query($daShopConn,$get_logs);

		if(@mysqli_num_rows($run_get_logs)>0){
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
				$results = mysqli_query($daShopConn,"SELECT COUNT(*) FROM adminlogs");
				$get_total_rows = $results->fetch_row(); //hold total records in variable
				//break records into pages
				$total_pages = ceil($get_total_rows[0]/$item_per_page);
				
				//get starting position to fetch the records
				$page_position = (($page_number-1) * $item_per_page);
				
				//SQL query that will fetch group of records depending on starting position and item per page. See SQL LIMIT clause
				$results = mysqli_query($daShopConn,"SELECT * from adminlogs ORDER BY Log_ID DESC LIMIT $page_position, $item_per_page");
				
				//Display records fetched from database.

				echo '<ul class="contents">';

				echo '<table class="table">';
				echo '<tr>';
				echo '<th>Log ID</th>';
				echo '<th>Admin E-mail</th>';
				echo '<th>Last Logged In</th>';
				echo '<th>Logged out</th>';
				echo '</tr>';
			
				while($rows=mysqli_fetch_assoc($results)){
					echo '<tr>';
					echo '<td>'.$rows['Log_ID'].'</td>';
					echo '<td>'.$rows['AdminEmail'].'</td>';
					echo '<td>'.$rows['LastLoggedIn'].'</td>';
					echo '<td>'.$rows['LoggedOut'].'</td>';
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