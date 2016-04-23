<?php include_once "common/header.php"; ?>



   <noscript>This site just doesn't work, period, without JavaScript</noscript>

<?php include("auth.php"); //include auth.php file on all secure pages 
?>
	<p> Search </p>
	<form name = "form1" action="query.php" method="post" >
		<input name="search" type="text" size="40" maxlength ="50" />
		<input type="submit" name="submit" value="search" />
	</form>

	<form method="post" action = "csv.php">
	<input type="submit" name="download" value="Download CSV"/>
	<input type="hidden" name="sql" value="<?php echo $_POST['search']; ?>">
	</form>
	
	
	<?php
	if(!empty($_POST['search'])){
		$user = $_SESSION['username'];
	$sql = "SELECT * FROM annotations WHERE annotation_text LIKE '%".$_POST['search']."%' and user_name='$user'";
	// query $sql
	$result = mysqli_query($link,$sql);
	

	if ($result->num_rows > 0) 
	{
    	// output data of each row
    	while($row = $result->fetch_assoc()) 
    	{

        	echo "<br> Annotation Text: ". $row["annotation_text"]. " - Start Time: ". $row["annotation_start_time"]. " , End Time:" . $row["annotation_end_time"] . " in video <br>";
     	}
	}
	
	else 
	{
    	echo "No results!";
	}
	}
	else{
		echo 'please input';
	
	}
	
	

		?>  