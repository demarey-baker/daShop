<?php
	session_start();
	if(isset($_SESSION['current_url'])){
		$current_url=($_SESSION['current_url']);
	}

	$daShopConn=@mysqli_connect("localhost","root","","dashop");

	include('../global/paginatefunction.php');

	if($daShopConn){
		$get_products="SELECT * from automobiles";
		$run_get_products=@mysqli_query($daShopConn,$get_products);

		if(@mysqli_num_rows($run_get_products)>0){
			//continue only if $_POST is set and it is a Ajax request
			if(isset($_POST) && isset($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest'){
				//Get page number from Ajax POST
				if(isset($_POST["page"])){
					$page_number = filter_var($_POST["page"], FILTER_SANITIZE_NUMBER_INT, FILTER_FLAG_STRIP_HIGH); //filter number
					if(!is_numeric($page_number)){die('Invalid page number!');} //incase of invalid page number
				}else{
					$page_number = 1; //if there's no page number, set it to 1
				}
				$item_per_page=5;
				//get total number of records from database for pagination
				$results = mysqli_query($daShopConn,"SELECT COUNT(*) FROM automobiles");
				$get_total_rows = $results->fetch_row(); //hold total records in variable
				//break records into pages
				$total_pages = ceil($get_total_rows[0]/$item_per_page);
				
				//get starting position to fetch the records
				$page_position = (($page_number-1) * $item_per_page);
				
				//SQL query that will fetch group of records depending on starting position and item per page. See SQL LIMIT clause
				$results = mysqli_query($daShopConn,"SELECT * from automobiles ORDER BY ProductSellerID DESC LIMIT $page_position, $item_per_page");
				
				//Display records fetched from database.

				echo '<ul class="contents">';

				echo '<table class="table">';
				echo '<tr>';
				echo '<th>Autonum ID</th>';
				echo '<th>Item name</th>';
				echo '<th>Price</th>';
				echo '<th>Year</th>';
				echo '<th>Make</th>';
				echo '<th>Body type</th>';
				echo '<th>Transmission</th>';
				echo '<th>Mileage</th>';
				echo '<th>Product overlay</th>';
				echo '<th>Date added</th>';
				echo '<th>Item status</th>';
				echo '<th>Seller</th>';
				echo '<th></th>';
				echo '</tr>';
			
				while($rows=mysqli_fetch_assoc($results)){
					echo '<tr>';
					echo '<td>';
					echo '<a target="_blank" href="edititem.php?autonum='.$rows['AutoNum_ID'].'&&product='.$rows['ItemName'].'">';
					echo $rows['AutoNum_ID'];
					echo '</td>';
					echo '<td>'.$rows['ItemName'].'</td>';
					echo '<td>'.$rows['Price'].'</td>';
					echo '<td>'.$rows['Year'].'</td>';
					echo '<td>'.$rows['Make'].'</td>';
					echo '<td>'.$rows['BodyType'].'</td>';
					echo '<td>'.$rows['Transmission'].'</td>';
					echo '<td>'.$rows['Mileage'].'</td>';
					echo '<td>'.$rows['ProductOverlay'].'</td>';
					echo '<td>'.$rows['DateAdded'].'</td>';
					echo '<td>'.$rows['ItemStatus'].'</td>';
					echo '<td>'.$rows['ProductSellerID'].'</td>';
					echo '<td>';
					echo '<a href="global/deleteitem.php?autonum='.$rows['AutoNum_ID'].'&&return_url='.$current_url.'&&name='.$rows['ItemName'].'"><button onclick="return confirm(\'Are you sure you want to remove product '.$rows['ItemName'].'?\');" id="remove_items_button" type="button">';
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