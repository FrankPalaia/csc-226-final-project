<!DOCTYPE html>
<html>
<body>
<?php include("includes/headerdatabase2.html");?>
<?php
session_start();
if(isset($_POST['Login'])){	
define('DB_USER', 'palaia');
define('DB_PASSWORD', 'frank2371');
define('DB_HOST', 'localhost');
define('DB_NAME', 'palaia_info');
	
$dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME) OR die('Could not connect to MySQL: ' . mysqli_connect_error() );
$email = $_POST['email'];
$password = $_POST['password'];
$result=mysqli_query($dbc,'SELECT email, password FROM `users` where email="'.$email.'" AND password="'.$password.'"');
if(mysqli_num_rows($result)==1){
	$_SESSION['email']=$email;
	header("Location: index.php");
}
else
	echo "Account is invalid";
}
if(isset($_GET['logout'])){
	session_unregister('email');
}
?>

<p>Login Form</p>

<form method="post">
<div>
    <label for="email">Enter Email:</label>
    <input type="text" name="email">
</div>

<div>
    <label for="password">Enter Password :</label>
    <input type="password" name="password"
          
</div>
<div>
  <input type="submit" name="Login" value="Login">
  </div>
  </form>
</form>
<?php include ("includes/footerdatabase.html");?>
</body>
</html>
