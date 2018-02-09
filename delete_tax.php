<?php
include('connection.php');
$sql = 'DELETE FROM td_tax WHERE tax_id='.$_GET["tax_id"];
$query = mysql_query($sql, $con) or die(mysql_error());
header('Location: view_tax.php');
?>