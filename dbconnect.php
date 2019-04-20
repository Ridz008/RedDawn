<?php 


$con=mysqli_connect('localhost','root','') or die("Failed to connect to MySQL: " . mysql_error()); 
$db=mysqli_select_db($con,'book_store') or die("Failed to connect to MySQL: " . mysql_error()); 
?>