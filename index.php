

<head>

<title> palaia_info database </title>

</head>
<body>
<?php session_start();
if(!isset($_SESSION['email'])) {
include("includes/headerdatabase2.html");
}else{//if session is registered
include("includes/headerdatabase.html");
}?>
<?php 

define('DB_USER', 'palaia');
define('DB_PASSWORD', 'frank2371');
define('DB_HOST', 'localhost');
define('DB_NAME', 'palaia_info');


$dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME) OR die('Could not connect to MySQL: ' . mysqli_connect_error() );
mysqli_select_db($dbc,'palaia_info');
$results_per_page=5;
$query="SELECT users.name, date, title, body FROM `post`,users where post.userid=users.userid order by date desc";
$retval=mysqli_query($dbc,$query);
$number_of_results = mysqli_num_rows($retval);
//if(! $retval ) {
  //    die('Could not get data: ' . mysql_error());
   //}
   
  //while($row = mysqli_fetch_array($retval, MYSQLI_ASSOC)) 
   //{
    //echo "Name: {$row['name']}  <br> ".
      //   "Date posted: {$row['date']} <br> ".
       // "Title: {$row['title']} <br> ".
		// "Body: {$row['body']} <br> ".
         //'<a href="readcomments.php">Read Comments</a>';
		 //echo "<br>";
   //}
   $number_of_pages=ceil($number_of_results/$results_per_page);
   if(!isset($_GET['page'])){
	   $page=1;
   }else{
	   $page=$_GET['page'];
   }
   $this_page_first_result = ($page-1)*$results_per_page;
   $query="SELECT users.name, date, title, body FROM `post`,users where post.userid=users.userid order by date desc limit " . $this_page_first_result . ',' . $results_per_page;
   $retval=mysqli_query($dbc,$query);
   if(! $retval ) {
      die('Could not get data: ' . mysql_error());
   }
   
  while($row = mysqli_fetch_array($retval, MYSQLI_ASSOC)) 
   {
    echo "Name: {$row['name']}  <br> ".
         "Date posted: {$row['date']} <br> ".
         "Title: {$row['title']} <br> ".
		 "Body: {$row['body']} <br> ".
         '<a href="readcomments.php">Read Comments</a>';
		 echo "<br>";
   }


   
   for ($page=1;$page<=$number_of_pages;$page++){
	   echo '<a href="index.php?page=' . $page . '">'. $page . '</a>';
   }
   ?>
<?php include ("includes/footerdatabase.html");?>
</body>
