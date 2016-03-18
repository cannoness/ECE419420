<?php include_once "common/header.php"; ?>

<div id="main">

   <noscript>This site just doesn't work, period, without JavaScript</noscript>

<?php include("auth.php"); //include auth.php file on all secure pages ?>

<div class="form">
<p>This is a secured page.</p>
<?php 
      $pid = $_GET['pid'];
  $result = mysql_query("       
    SELECT       
      src_video_location      
    FROM `videos`       
    WHERE video_data_id = $pid       
  ");
  while($row = mysql_fetch_assoc($result)){
    foreach($row as $cname => $cvalue){
   
    echo "<table><tr><td align='center'>       
      <br />       
      <video controls src=$cvalue border='0'       
         />       
      <br />       
      </video>  
      </td></tr></table";       
 }
    print "\r\n";
}?>       


</div>

<?php include_once "common/sidebar.php"; ?>

<?php include_once "common/footer.php"; ?> 