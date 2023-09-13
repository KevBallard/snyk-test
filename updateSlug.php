<?php
error_reporting(0); 

$servername = "localhost";
$username = "bfstagin_eck184";
$password = "9%VyAxP#q";
$dbname = "bfstagin_eck184_db";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


//
// --START OF ECKOH NEWS ITEMS 
//

//
	//UPDATE tnvr0_zoo_item
	//SET alias = $name
	//WHERE id = $id;
//

$investorsNewsItems = "SELECT id, alias FROM tnvr0_zoo_item WHERE application_id = 5 ORDER BY id ASC";
$newsItems = $conn->query($investorsNewsItems);


//$itemAlias = array();
//$id = array();



if ($newsItems->num_rows > 0) {


	while ($newsItemRow = $newsItems->fetch_assoc()){
//GET THE NEWS ITEM ROWS THEN GET THE CONTENT COLUMN DATA

		foreach ($newsItemRow as $key=>$newsItem) {

			if ($key == 'alias') {
				$itemAlias = $newsItem;
			}
			if ($key == 'id') {
				$id = $newsItem;
			}


		$slugRaw = preg_replace('!\s+!', ' ', $itemAlias);
		$slugRaws = str_replace(" -", "", $slugRaw);
		$slug = str_replace(" ", "-", $slugRaws);

		$filteredSlug = addslashes($slug);

		//$slugs = str_replace(" ", "-", $slugs);
		//var_dump($id, $slug);

			$updateQuery = "UPDATE tnvr0_zoo_item 
							SET alias = '" . $filteredSlug . "'
							WHERE id = " . $id;


//WARNING THE FOLLOWING INSERTS INTO THE DATABASE --
	//$newsQueryFil = addslashes($newsQuery);
	
		if ($conn->query($updateQuery) === TRUE){
			echo "New record Created";
		} else {
			echo "Error: " . $updateQuery . "<br>" . $conn->error;
		}
	}	
}
		
}


//END OF ECKOH NEWS ITEMS
//



$conn->close();
?> 
