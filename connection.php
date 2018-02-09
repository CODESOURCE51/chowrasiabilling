<?php 
$host = 'localhost';
$uname = 'chauras1_bill123';
$pass = 'chaurasia@123';
$db = 'chauras1_billing';
$con = mysql_connect($host,$uname,$pass) or die(mysql_error());
mysql_select_db($db,$con) or die(mysql_error());
?>