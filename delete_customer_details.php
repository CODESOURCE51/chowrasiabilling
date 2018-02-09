<?php
include('connection.php');
$sql = 'DELETE FROM td_customer WHERE cus_id='.$_GET["customer_id"];
$query = mysql_query($sql, $con) or die(mysql_error());
header('Location: view_customer_details.php');
?>