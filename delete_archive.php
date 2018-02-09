<?php
include('connection.php');
$sql = 'DELETE FROM td_blog WHERE blog_id='.$_GET["blog_id"];
$query = mysql_query($sql, $con) or die(mysql_error());
header('Location: view_blog.php');
?>