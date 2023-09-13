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





$eckohCaseStudies = "SELECT id FROM tnvr0_zoo_item WHERE application_id = '11' ORDER BY id ASC";
$caseStudies = $conn->query($eckohCaseStudies);

if ($caseStudies->num_rows > 0) {


	while ($caseStudy = $caseStudies->fetch_assoc()){
//GET THE NEWS ITEM ROWS THEN GET THE CONTENT COLUMN DATA

		foreach ($caseStudy as $key=>$study) {

			if ($key == 'id') {
				$caseID = $study;
			}
		}


		$updateZooCategoryTable = "INSERT INTO tnvr0_zoo_category_item (category_id, item_id) VALUES (0," . $caseID . ")";


if ($conn->query($updateZooCategoryTable) === TRUE){
			echo "New record Created";
		} else {
			echo "Error: " . $newsQuery . "<br>" . $conn->error;
		}
	}	
}


$conn->close();
?> 
