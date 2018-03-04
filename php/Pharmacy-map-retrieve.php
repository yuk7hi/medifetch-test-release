<?php

	// Start output buffering
	ob_start();
	// run code in x.php file

	$host = 'localhost';
	$username = 'root';
	$password = 'getlow';
	$database = 'gmaps';
	
	function parseToXML($htmlStr) {
		$xmlStr = str_replace('<', '&lt;', $htmlStr);
		$xmlStr = str_replace('>', '&gt;', $xmlStr);
		$xmlStr = str_replace('"', '&quot;', $xmlStr);
		$xmlStr = str_replace("'", '&#39;', $xmlStr);
		$xmlStr = str_replace('&', '&amp;', $xmlStr);
		return $xmlStr;
	}
	
	// Open a connection to the local MySQL server
	$connection = mysqli_connect($host, $username, $password);
	if(!$connection) {
		//echo 'Error: Unable to connect to MySQL server.' . '<br />' . PHP_EOL;
		//echo 'Error: ' . mysqli_connect_error() . '<br />' . PHP_EOL;
		exit();
	}
	
	// Select the database containing data for the map markers
	$db_select = mysqli_select_db($connection, $database);
	if(!$db_select) {
		exit('Can\'t select database, Error: ' . mysqli_error() . '<br />' . PHP_EOL);
	}
	
	// Select the necessary rows from the table where marker records are present
	$query = "SELECT * FROM pharmacy";
	$result = mysqli_query($connection, $query);
	if(!$result) {
		exit('Invalid query, Error: ' . mysqli_error() . '<br />' . PHP_EOL);
	}
		
	header('Content-type: text/xml');
	
	// Start XML file and echo parent node (?)
	echo '<markers>';
	
	// Loop through the table rows, echo XML node for each
	while($row = mysqli_fetch_assoc($result)) {
		// Add each element on row to XML document node
		echo '<marker ';
		echo 'id="' . $row['id'] . '" ';
		echo 'name="' . parseToXML($row['name']) . '" ';
		echo 'address="' . parseToXML($row['address']) . '" ';
		echo 'lat="' . $row['lat'] . '" ';
		echo 'lng="' . $row['lng'] . '" ';
		echo '/>';
	}
	
	// End of XML file
	echo '</markers>';
	
	// saving captured output to file
	file_put_contents('mapPharmacy.xml', ob_get_contents());
	// end buffering and displaying page
	ob_end_flush();
	
?>

