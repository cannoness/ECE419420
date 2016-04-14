<!DOCTYPE html>
<html>
<body>
	<p> Search </p>
	<form name = "form1" method="post" >
		<input name="search" type="text" size="40" maxlength ="50" />
		<input type="submit" name="Submit" value="Search" />
	</form>

	<form action = "csv.php">
	<input type="submit" value="Download CSV"/>
	</form>

	<?php

	$servername = "localhost";
	$username = "root";
	$password = "root";
	$dbname = "Example";

	// Create connection
	$conn = new mysqli($servername, $username, $password, $dbname);
	// Check connection
	if ($conn->connect_error) 
	{
    	die("Connection failed: " . $conn->connect_error);
	} 

	// example2 = table name; username is column; description is another column;
	$sql = "SELECT * FROM example2 WHERE username LIKE '%".$_POST['search']."%' OR description LIKE '%".$_POST['search']."%'";
	// query $sql
	$result = $conn->query($sql);

	if ($result->num_rows > 0) 
	{
    	// output data of each row
    	while($row = $result->fetch_assoc()) 
    	{
        	echo "<br> id: ". $row["userID"]. " - User Name: ". $row["username"]. " " . $row["description"] . "<br>";
     	}
	}
	else 
	{
    	echo "No results!";
	}

	function csv()
	{ 
		$sql2 = "SELECT * FROM example2";
		// query $sql
		$result2 = $conn->query($sql2);
		$num_fields = $result2->num_fields;  
		$headers = array(); 

		for ($i = 0; $i < $num_fields; $i++)   
		{	             
			$headers[] = $result2->field_name(i); 
		}   
		$fp = fopen('php://output', 'w'); 
		if ($fp && $result2)   
		{             
 			header('Content-Type: text/csv');        
 			header('Content-Disposition: attachment; filename="export.csv"'); 
 			header('Pragma: no-cache'); 
 			header('Expires: 0');  
 			fputcsv($fp, $headers);  
			while ($row2 = $result2->fetch_assoc()) 
			{  
				fputcsv($fp, array_values($row2));  
			} 
			die; 
		}  
	}

	$conn->close();
	?>  
</body>
</html>