<?php
session_start();
session_unset();
session_destroy();

header("location:index.php");

include('includes/headerdatabase.html');
// Print a customized message:
echo "<h1>Logged Out!</h1>
<p>You are now logged out!</p>";
include('includes/footerdatabase.html');
exit();
?>