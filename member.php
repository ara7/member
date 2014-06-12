<?php
session_start();

 if(!isset($_SESSION['SignumID']))
 {
 header("Location: login1.php");

 }
?>




<!DOCTYPE html>
<html>
  <head>
    <title>Welcome</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href="css/bootstrap.min.css" rel="stylesheet" media="screen">
  </head>
  <body>
    <h2> This is your login page, welcome! </h2> <?php=$_SESSION['SignumID'];?> 
	<p> See your page! </p>
	 <a href="http://10.184.20.93/UM/USERMANAGEMENT/ch.html"> Change password </a> <br>
<a href="http://10.184.20.93/UM/USERMANAGEMENT/logout.php"> Logout </a> <br>
	<script src="http://code.jquery.com/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="http://code.jquery.com/jquery.js"></script>
  </body>
</html>
