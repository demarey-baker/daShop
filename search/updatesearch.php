<?php
	$daShopConn=@mysqli_connect("localhost","root","","dashop");

	if($daShopConn){

		$query=@mysqli_query($daShopConn,"SELECT AutoNum_ID,ItemName from automobiles");

		if($query){

			$update_search=array();

			while($rows=@mysqli_fetch_assoc($query)){
				$update_search[]=array('0'=>$rows['AutoNum_ID'],'1'=>$rows['ItemName']);
			}//end while

			$save_xml=new DOMDocument();
			$save_xml->formatOutput = true; 
			$root=$save_xml->createElement("pages"); 
			$save_xml->appendChild($root);

			foreach($update_search as $x){
				  $trial = $save_xml->createElement("links"); 
				  $attribute=$save_xml->createAttribute("AutoNum_ID");
				  $attribute->value=$x['0'];
				  $trial->appendChild($attribute);

				  $title = $save_xml->createElement("title"); 
				  $title->appendChild( 
				  $save_xml->createTextNode($x['1']) 
				  ); 
				  $trial->appendChild($title); 
				   
				  $url = $save_xml->createElement("url"); 
				  $url->appendChild( 
				  $save_xml->createTextNode("search.php?q=".$x['1']) 
				  ); 
				  $trial->appendChild( $url);  
				   
				  $root->appendChild($trial); 
			}//end foreach

			$save_xml->save("search/searchlinks.xml");
		}//end if
		mysqli_close($daShopConn);
	}//end if 
?>