<?php 
 require('/common/DBConnection/connection.php');
	$sql = "SELECT * FROM annotations WHERE annotation_text LIKE '%".$_POST['sql']."%'";
	$result = mysqli_query($link,$sql);
 
	if (!$result) die('Couldn\'t fetch records');  
	$finfo = $result->fetch_fields();
	$headers = array(); 

	foreach ($finfo as $val)   
	{	             
		$headers[] = $val->name; 
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