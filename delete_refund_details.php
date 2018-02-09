<?php
include('connection.php');
$sql = 'DELETE FROM td_refund WHERE rid='.$_GET["refund_id"];
$query = mysql_query($sql, $con) or die(mysql_error());
header('Location: view_refund_details.php');
?>