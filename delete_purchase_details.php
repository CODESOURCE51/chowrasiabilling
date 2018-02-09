<?php
include('connection.php');
$sql = 'DELETE FROM td_purchase WHERE purchase_id='.$_GET["purchase_id"];
$query = mysql_query($sql, $con) or die(mysql_error());
header('Location: view_purchase_details.php');
?>