<?php include_once "common/header.php"; ?>
<div id="main">

   <noscript>This site just doesn't work, period, without JavaScript</noscript>
<?php include("auth.php"); //include auth.php file on all secure pages ?>
<body>
<div class="form">
<div id="message"></div>
<form name="upload" action = "uploadact.php" method="POST" ENCTYPE="multipart/form-data">
Select files to upload: <input type="file" name = "userfile"/>
<input type="submit" name ="upload" value="upload">
</form>
</div>

<?php include_once "common/sidebar.php"; ?>
</body>
<?php include_once "common/footer.php"; ?> 