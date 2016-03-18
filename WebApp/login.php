<?php include_once "common/header.php"; ?>
<?php
 // If form submitted, insert values into the database.
 if (isset($_POST['username'])){
 $username = $_POST['username'];
 $password = $_POST['password'];
 $username = stripslashes($username);
 $username = mysql_real_escape_string($username);
 $password = stripslashes($password);
 $password = mysql_real_escape_string($password);
 //Checking is user existing in the database or not
 $query = "SELECT * FROM `users` WHERE user_name='$username' and user_password_hash='".md5($password)."'";
 $result = mysql_query($query) or die(mysql_error());
 $rows = mysql_num_rows($result);
 if($rows==1){
 $_SESSION['username'] = $username;
 $user_id = mysql_query("SELECT
  `user_id`
FROM
  users
WHERE
  user_name = '$username'");
  $useid = mysql_fetch_assoc($user_id);
  $_SESSION['user_id'] = $useid["user_id"];
 header("Location: index.php"); // Redirect user to index.php
 }else{
 echo "<div class='form'><h3>Username/password is incorrect.</h3><br/>Click here to <a href='login.php'>Login</a></div>";
 }
 }else{
?>
<div class="form">
<h1>Log In</h1>
<form action="" method="post" name="login">
<input type="text" name="username" placeholder="Username" required />
<input type="password" name="password" placeholder="Password" required />
<input name="submit" type="submit" value="Login" />
</form>
<p>Not registered yet? <a href='registration.php'>Register Here</a></p>
</div>
<?php } ?>
</body>
</html>