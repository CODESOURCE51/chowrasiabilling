<?php
include('connection.php');
$sql = 'UPDATE td_comments SET approve="yes" WHERE cid='.$_GET["comment_id"];
$query = mysql_query($sql, $con) or die(mysql_error());
header('Location: view_comments.php');
?>