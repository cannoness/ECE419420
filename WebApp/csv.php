<?php 

	$servername = "localhost";
	$username = "root";
	$password = "root";
	$dbname = "Example";

	// Create connection
	$conn = new mysqli($servername, $username, $password, $dbname);
	// Check connection
	if ($conn->connect_error) {
    	die("Connection failed: " . $conn->connect_error);
	} 

	$sql = "SELECT * FROM example2";  
	$result = $conn->query($sql);
 
	if (!$result) die('Couldn\'t fetch records');  
	$num_fields = $result->num_fields;  
	$headers = array(); 

	for ($i = 0; $i < $num_fields; $i++)   
	{	             
		$headers[] = $result->field_name(i); 
	}   
	$fp = fopen('php://output', 'w'); 
	if ($fp && $result)   
	{             
 		header('Content-Type: text/csv');        
 		header('Content-Disposition: attachment; filename="export.csv"'); 
 		header('Pragma: no-cache'); 
 		header('Expires: 0');  
 		fputcsv($fp, $headers);  
		while ($row = $result->fetch_assoc()) 
		{  
			fputcsv($fp, array_values($row));  
		} 
		die; 
	}  
?>