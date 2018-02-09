<?php
include('connection.php');
$sql = 'DELETE FROM td_admin WHERE admin_id='.$_GET["admin_id"];
$query = mysql_query($sql, $con) or die(mysql_error());
header('Location: view_admin.php');
?>