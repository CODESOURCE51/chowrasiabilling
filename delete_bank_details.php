<?php
include('connection.php');
$sql = 'DELETE FROM td_bank_details WHERE bnk_id='.$_GET["bank_id"];
$query = mysql_query($sql, $con) or die(mysql_error());
header('Location: view_bank_details.php');
?>