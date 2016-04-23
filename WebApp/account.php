<?php include_once "common/header.php"; ?>

<div id="main">

   <noscript>This site just doesn't work, period, without JavaScript</noscript>

<?php include("auth.php"); //include auth.php file on all secure pages ?>

<div class="form">
<p>This is a secured page.</p>
Hello <?php echo $_SESSION['username']?>!
<?php 
$email = "";
$query = "select user_email from `users` where user_name='".$_SESSION['username']."'";
$result = $link->query($query);
if($result){
$emailtag = mysqli_fetch_assoc($result);
$email = $emailtag['user_email'];}
else
	throw new Exception(mysqli_error($link)."[ $result]");
?>
<p>
</p>

<form id="account" type="text">
<p>Update Email Address</p>
<input id="email-address" type ="text" value=<?=$email?>>


<p> Change Password</p>

<input id="change-pass" type ="text" value="">

<p> Confirm Password Change </p>

<input id="confirm-pass" type ="text" value="">
<p>

<input value="submit" type = "submit">
</form>
</div>


<?php include_once "common/sidebar.php"; ?>
<?php include_once "common/footer.php"; ?> 