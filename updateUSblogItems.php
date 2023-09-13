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
$eckohNewsItems = "SELECT * FROM newUSblogsimport WHERE cPath LIKE '/resources/blog%' ORDER BY id ASC";
$newsItems = $conn->query($eckohNewsItems);


$eckohNewsContent = array();
$eckohNewsName = array();
$eckohNewsDescription = array();
$eckohNewsCreateDate = array();
$eckohNewsModifiedDate = array();

$newsFullElements = array();



if ($newsItems->num_rows > 0) {


	while ($newsItemRow = $newsItems->fetch_assoc()){
//GET THE NEWS ITEM ROWS THEN GET THE CONTENT COLUMN DATA

		foreach ($newsItemRow as $key=>$newsItem) {

			if ($key == 'cDatePublic') {
				$newsCreatedDate = $newsItem;
				//Zoo uses this format 2018-09-06 16:18:00
				array_push($eckohNewsCreateDate, $newsItem);
			}
			if ($key == 'cDateLastIndexed') {
				$newsModifiedDate = $newsItem;
				array_push($eckohNewsModifiedDate, $newsItem);
			}


			if ($key == 'content') {
				//STORE THE NEWS CONTENT IN $eckohNewsContent
				$newsContent = $newsItem;
				array_push($eckohNewsContent, $newsItem );	
			}	
			if ($key == 'cName') {
				$newsName = $newsItem;
				array_push($eckohNewsName, $newsItem);
			}	
			if ($key == 'cDescription') {
				$newsDescription = $newsItem;
				array_push($eckohNewsDescription, $newsItem);
			}

//IF THE CATEGORY NEEDS ADDING LOOK INTO THE 
			//
				//EXCHANGE THE DOUBLE QUOTES FOR SINGLE 
			//
$newsContentFil = str_replace('"', "'", $newsContent);

//trims the tabs and new lines from the newscontent replacing with br tag
$newsContentFiltered = trim(preg_replace('/[\t\n\r]+/', '<br>', $newsContentFil));


$newsDescriptionFiltered = str_replace('"', "'", $newsDescription); 
$newsNameFiltered = str_replace('"', "'" , $newsName); 

$newsSlug = str_replace(" ", "-" , $newsNameFiltered);
$newsSlug = str_replace(":", "" , $newsSlug);
$newsSlug = strtolower(str_replace("&", "and" , $newsSlug));

	$newsFullElement = '{"2616ded9-e88b-4b77-a92c-2c4c18bb995f": { "0": { "value": "' . $newsCreatedDate . '" } }, "fc5a6788-ffae-41d9-a812-3530331fef64": { }, "08795744-c2dc-4a68-8252-4e21c4c4c774": { "0": { "value": "' . addslashes($newsDescriptionFiltered) . '" } }, "2e3c9e69-1f9e-4647-8d13-4e88094d2790": { "0": { "value": "' . addslashes($newsContentFiltered) . '" } }, "cdce6654-4e01-4a7f-9ed6-0407709d904c": { "file": "", "title": "", "link": "", "target": "0", "rel": "", "lightbox_image": "", "spotlight_effect": "", "caption": "" }, "c26feca6-b2d4-47eb-a74d-b067aaae5b90": { "file": "", "title": "", "link": "", "target": "0", "rel": "", "lightbox_image": "", "spotlight_effect": "", "caption": "" }, "0bee21e2-8f88-4f5b-83af-686cd1c7ef4b": { "url": "", "poster_image": "", "width": "", "height": "", "autoplay": "0" }, "65b7851d-199f-4ac6-95a7-409ad1bca488": { }, "fdcbebaa-e61a-462d-963e-aff74ff95499": { "0": { "value": "", "text": "", "target": "0", "custom_title": "", "rel": "" } }, "d857d939-47e9-4303-8f37-93b0cecace54": { "value": "1" } }';
		}	

		array_push($newsFullElements, $newsFullElement);
		
	$params = '{
				"metadata.title": "' . addslashes($newsNameFiltered) .'",
				"metadata.description": "' . addslashes($newsDescriptionFiltered) . '",
				"metadata.keywords": "",
				"metadata.robots": "",
				"metadata.author": "",
				"config.enable_comments": "1",
				"config.primary_category": "0"
			}';


	$newsQuery = "INSERT INTO tnvr0_zoo_item 
	(application_id, type, name, alias, created, modified, modified_by, publish_up, publish_down, priority, hits, state, access, created_by, created_by_alias, searchable, elements, params)
	VALUES('12', 'article', '" . addslashes($newsNameFiltered) . "', '" . addslashes($newsSlug) . "', '" . $newsCreatedDate . "', '" . $newsModifiedDate . "', 676, '" . $newsCreatedDate . "', '0000-00-00 00:00:00' , '0' , '0', '1', '1', '676', ' ', '1', '" . $newsFullElement . "', '" . $params . "')";


//WARNING THE FOLLOWING INSERTS INTO THE DATABASE --
	$newsQueryFil = addslashes($newsQuery);
	
		if ($conn->query($newsQuery) === TRUE){
			echo "New record Created";
		} else {
			echo "Error: " . $newsQuery . "<br>" . $conn->error;
		}
	}	
//UPDATE THE CATEGORY ID TABLE SET THE WHERE ID TO THE BLOGID PLUS ONE 
	$getNewsIds = 'SELECT id FROM tnvr0_zoo_item WHERE id >= 848';
	$newsIds = $conn->query($getNewsIds);


	if ($newsIds->num_rows > 0) {


		while ($ids = $newsIds->fetch_assoc()){
			foreach ($ids as $id) {
			$categoryTableUpdate = 'INSERT INTO tnvr0_zoo_category_item (category_id, item_id) VALUES(0, ' . $id . ')';
	//WARNING UPDATES THE CATEGORY FIELD 
				if ($conn->query($categoryTableUpdate) === TRUE){
					echo "New record Created";
				} else {
					echo "Error: " . $categoryTableUpdate . "<br>" . $conn->error;
				}
			}
		}
	}
}

//
//END OF ECKOH NEWS ITEMS
//



$conn->close();
?> 
