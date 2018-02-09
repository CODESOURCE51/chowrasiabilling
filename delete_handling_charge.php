<?php
include('connection.php');
$sql = 'DELETE FROM td_handling_charge WHERE hc_id='.$_GET["hc_id"];
$query = mysql_query($sql, $con) or die(mysql_error());
header('Location: view_handling_charges.php');
?>