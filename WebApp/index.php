<?php include_once "common/header.php"; ?>

<div id="main">

   <noscript>This site just doesn't work, period, without JavaScript</noscript>

<?php include("auth.php"); //include auth.php file on all secure pages ?>

<div class="form">
<table border ="1" class ="index"><tr><td class="tablehead"><h2>
Hello <?php echo $_SESSION['username']; ?>!</h2></tr></td>
<?php
if($_SESSION['admin'] == true){ ?><tr>
<td class="tdl"><p><a href="account.php" class="button">Admin Control Panel</a> &nbsp;<a href="account.php" class="button">Admin Control Panel</a> </p></td>
<?php } else if ($_SESSION['admin']==false){?><tr>
<td class="tdl"><p><a href="account.php" class="button">Your Account</a> &nbsp;<a href="account.php" class="button">Account Settings</a> </p></td><?php }?>
<td class="tdr">
<p><a href="upload.php" class="button">Upload Video</a> &nbsp;<a href="upload.php" class="button">Upload Video</a> </p></td></tr>


<tr><td class="tdl">
<p><a href="query.php" class="button">Export Database</a> &nbsp;<a href="query.php" class="button">Export Database</a> </p></td>
<td class="tdr">
<p><a href="browse.php" class="button">Annotate Video</a> &nbsp;<a href="browse.php" class="button">Annotate Video</a> </p></td></tr>
<tr><td class="tdl">
<p><a href="search.php" class="button">Search Exiting</a> &nbsp;<a href="search.php" class="button">Search Existing</a> </p><br>
Search existing annotations in the database, view a list and connect to the video which contains them for further annotation.</br>
</td><td class="tdr">
<p><a href="logout.php" class="button">Log Out</a> &nbsp;<a href="logout.php" class="button">Log out</a> </p></td></tr>
</table>
</div>

<?php include_once "common/sidebar.php"; ?>

<?php include_once "common/footer.php"; ?> 