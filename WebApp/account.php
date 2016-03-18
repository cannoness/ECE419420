<?php include_once "common/header.php"; ?>

<div id="main">

   <noscript>This site just doesn't work, period, without JavaScript</noscript>

<?php include("auth.php"); //include auth.php file on all secure pages ?>

<div class="form">
<p>This is a secured page.</p>
Hello <?php echo $_SESSION['username']?>!
<p>Change Email Address</p>
<p> Change Password</p>
</div>

<?php include_once "common/sidebar.php"; ?>

<?php include_once "common/footer.php"; ?> 