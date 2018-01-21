<?php
	function paginate_function($item_per_page, $current_page, $total_records, $total_pages){
	    $pagination = '';
	    if($total_pages > 0 && $total_pages != 1 && $current_page <= $total_pages){ //verify total pages and current page number
	        $pagination .= '<ul class="pagination">';
	        
	        $right_links    = $current_page + 3; 
	        $previous       = $current_page - 3; //previous link 
	        $next           = $current_page + 1; //next link
	        $first_link     = true; //boolean var to decide our first link
	        
	        if($current_page > 1){
				$previous_link = ($previous==0)?1:$previous;
	            $pagination .= '<a href="#" data-page="1" title="First"><li class="first">&laquo;</li></a>'; //first link
	            $pagination .= '<a href="#" data-page="'.$previous_link.'" title="Previous"><li>&lt;</li></a>'; //previous link
	                for($i = ($current_page-2); $i < $current_page; $i++){ //Create left-hand side links
	                    if($i > 0){
	                        $pagination .= '<a href="#" data-page="'.$i.'" title="Page'.$i.'"><li>'.$i.'</li></a>';
	                    }
	                }   
	            $first_link = false; //set first link to false
	        }
	        
	        if($first_link){ //if current active page is first link
	            $pagination .= '<li class="first active">'.$current_page.'</li>';
	        }elseif($current_page == $total_pages){ //if it's the last active link
	            $pagination .= '<li class="last active">'.$current_page.'</li>';
	        }else{ //regular current link
	            $pagination .= '<li class="active">'.$current_page.'</li>';
	        }
	                
	        for($i = $current_page+1; $i < $right_links ; $i++){ //create right-hand side links
	            if($i<=$total_pages){
	                $pagination .= '<a href="#" data-page="'.$i.'" title="Page '.$i.'"><li>'.$i.'</li></a>';
	            }
	        }
	        if($current_page < $total_pages){ 
					$next_link = ($i > $total_pages)? $total_pages : $i;
	                $pagination .= '<a href="#" data-page="'.$next_link.'" title="Next"><li>&gt;</li></a>'; //next link
	                $pagination .= '<a href="#" data-page="'.$total_pages.'" title="Last"><li class="last">&raquo;</li></a>'; //last link
	        }
	        
	        $pagination .= '</ul>'; 
	    }//end if
	    return $pagination; //return pagination links
	}//end paginate
?>