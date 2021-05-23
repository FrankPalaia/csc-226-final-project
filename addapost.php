<!DOCTYPE html>
<html>
<body>
<?php include("includes/headerdatabase.html");?>
<?php
session_start();
 ?>
 <p>Add a Post</p>

<form action="addapost2.php" method="post">
<div>
Date:<input type="date" name="date">
<br/>
Title:<input type="text" name="title">
<br/>
Enter Post:<input type="text" name="body">
<br/>
<input type="submit" value="Add Post">
</div>
</form>
<?php include ("includes/footerdatabase.html");?>
</body>
</html>
