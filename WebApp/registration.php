<?php include_once "common/header.php"; ?>
<?php
 require('/common/DBConnection/connection.php');
 //require_once "Mail.php";

 // If form submitted, insert values into the database.
 if(isset($_SESSION['error']))
 {
  echo '<p>'.$_SESSION['error']['username'].'</p>';
  echo '<p>'.$_SESSION['error']['email'].'</p>';
  echo '<p>'.$_SESSION['error']['password'].'</p>';
  unset($_SESSION['error']);
 }
 
 if (isset($_POST['username'])){
 $username = $_POST['username'];
 $email = $_POST['email'];
 $password = $_POST['password'];
 
 //make sure username is the right length
 $username = stripslashes($username);
 $username = mysqli_real_escape_string($link,$username);
 
 //make sure email isn't already used
 $email = stripslashes($email);
 $email = mysqli_real_escape_string($link, $email);
 
 //make sure password fits correct format
 $password = stripslashes($password);
 $password = mysqli_real_escape_string($link,$password);
 
 $conf_code = md5(uniqid(rand()));
 
 $query = "INSERT into `users` (user_name, user_password_hash, user_email, user_activation_hash) VALUES ('$username', '".md5($password)."', '$email','$conf_code')";
 $result = mysqli_query($link,$query);
 if($result){
	echo "<div class='form'><h3>You are registered successfully.</h3><br/></div>";
 
   $to = $email; //we'll change this to the admin's email soon
   $subject = "Confirmation from AnnotationApp to $username";
   $header = "AnnotationApp: Confirmation from AnnotationApp";
   $message = "Please click the link below to verify and activate your account. rn";
   $message .= "localhost/WebApp/confirm.php?passkey=$conf_code";

   $sentmail = mail($to,$subject,$message,$header);

   if($sentmail)
            {
   echo "Your Confirmation link has been sent to your email address.";
   }
   else
         {
    echo "Failed to send confirmation link to your email address, please alert webadmin or resend";
   }
 }
 else{
	  echo "<div class='form'><h3>There was an error with your registration.</h3><br/>Click here to <a href='registration.php'>register</a></div>";
 
		throw new Exception(mysqli_error($link)."[ $result]");
 }}
 else{
	 
?>
<div class="form">
<h1>Registration</h1>
<p>
<form name="registration" action="" method="post"></p>
<br>
<input type="text" name="username" placeholder="Username" required /></br>
<br>
<input type="email" name="email" placeholder="Email" required /></br>
<br>
<input type="password" name="password" placeholder="Password" required /></br>
<br>
<input type="submit" name="submit" value="Register" /></br>
</form>
</div>
<?php } ?>
</body>
</html>