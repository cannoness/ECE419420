<?php include_once "common/header.php"; ?>
<?php
 require('/common/DBConnection/connection.php');
 // If form submitted, insert values into the database.
 if (isset($_POST['username'])){
 $username = $_POST['username'];
 $email = $_POST['email'];
 $password = $_POST['password'];
 $username = stripslashes($username);
 $username = mysqli_real_escape_string($link,$username);
 $email = stripslashes($email);
 $email = mysqli_real_escape_string($link, $email);
 $password = stripslashes($password);
 $password = mysqli_real_escape_string($link,$password);
 #$trn_date = date("Y-m-d H:i:s");
 $query = "INSERT into `users` (user_name, user_password_hash, user_email) VALUES ('$username', '".md5($password)."', '$email')";
 $result = mysqli_query($link,$query);
 if($result){
 echo "<div class='form'><h3>You are registered successfully.</h3><br/>Click here to <a href='login.php'>Login</a></div>";
 }
 }else{
?>
<div class="form">
<h1>Registration</h1>
<form name="registration" action="" method="post">
<input type="text" name="username" placeholder="Username" required />
<input type="email" name="email" placeholder="Email" required />
<input type="password" name="password" placeholder="Password" required />
<input type="submit" name="submit" value="Register" />
</form>
</div>
<?php } ?>
</body>
</html>