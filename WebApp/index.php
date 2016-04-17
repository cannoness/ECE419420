<?php include_once "common/header.php"; ?>

<div id="main">

   <noscript>This site just doesn't work, period, without JavaScript</noscript>

<?php include("auth.php"); //include auth.php file on all secure pages ?>

<div class="form">
<p>This is a secured page.</p>
Hello <?php echo $_SESSION['username']?>!

<p><a href="account.php" class="button">Your Account</a> &nbsp;<a href="account.php" class="button">Account Settings</a> </p>

<p><a href="upload.php" class="button">Upload Video</a> &nbsp;<a href="upload.php" class="button">Upload Video</a> </p>

<p><a href="query.php" class="button">Export Database</a> &nbsp;<a href="query.php" class="button">Export Database</a> </p>

<p><a href="browse.php" class="button">Annotate Video</a> &nbsp;<a href="browse.php" class="button">Annotate Video</a> </p>

<p><a href="search.php" class="button">Search Exiting</a> &nbsp;<a href="search.php" class="button">Search Existing</a> </p>

<p><a href="logout.php" class="button">Log Out</a> &nbsp;<a href="logout.php" class="button">Log out</a> </p>

</div>

<?php include_once "common/sidebar.php"; ?>

<?php include_once "common/footer.php"; ?> 