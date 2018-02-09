<?php
include('connection.php');
$sql = 'DELETE FROM td_admin_info WHERE info_id='.$_GET["info_id"];
$query = mysql_query($sql, $con) or die(mysql_error());
header('Location: view_admin_info.php');
?>