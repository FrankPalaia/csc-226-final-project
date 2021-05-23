<?php include("includes/headerdatabase.html");?>
<?php
session_start();
define('DB_USER', 'palaia');
define('DB_PASSWORD', 'frank2371');
define('DB_HOST', 'localhost');
define('DB_NAME', 'palaia_info');
$dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME) OR die('Could not connect to MySQL: ' . mysqli_connect_error() );
$date = $_POST['date'];
$title = $_POST['title'];
$body = $_POST['body'];
$query="INSERT INTO post (date, title, body) VALUES ('$date','$title','$body')";
if(!mysqli_query($dbc,$query))
{
	echo "Please fill out";
}
else
{
	echo 'Post Successfully Submitted';
}
?>
<?php include ("includes/footerdatabase.html");?>
