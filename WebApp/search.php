<?php include_once "common/header.php"; ?>

<div id="main">

   <noscript>This site just doesn't work, period, without JavaScript</noscript>

<?php include("auth.php"); //include auth.php file on all secure pages ?>
<body>
<div>
<!DOCTYPE  HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"  "http://www.w3.org/TR/html4/loose.dtd">
<html>
  <head>
    <meta  http-equiv="Content-Type" content="text/html;  charset=iso-8859-1">
    <title>Search Annotations</title>
  </head>
  <p><body>
    <h3>Search Details</h3>
    <p>You  may search by annotation keyword</p>
    <form  method="post" action="search.php?go"  id="searchform">
      <input  type="text" name="name">
      <input  type="submit" name="submit" value="Search">
    </form>
  </body>
</html>
</p>
<?php
  if(isset($_POST['submit'])){
  if(isset($_GET['go'])){
  $name=$_POST['name'];
  
  $sql="SELECT video_id FROM annotations WHERE annotation_text LIKE '%" . $name .  "%'";
  //-run  the query against the mysql query function
  $result=mysql_query($sql);
  //-create  while loop and loop through result set
  while($row=mysql_fetch_array($result)){
          $ID  =$row['video_id'];
  //-display the result of the array
  echo "<ul>\n\n\n";
  echo "<li>" . "<a  href=annotate.php?pid=$ID>". $ID ." </a></li>\n";
  echo "</ul>";
	}
  }
  else{
  echo  "<p>Please enter a search query</p>";
  }
  
  }
?>

</div>
<?php include_once "common/sidebar.php"; ?>
</body>
<?php include_once "common/footer.php"; ?> 