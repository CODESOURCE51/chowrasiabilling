<?php
include('connection.php');



$cust_id = $_REQUEST['cust_phn'];
$bnk_sql = 'SELECT * FROM td_customer WHERE cust_phn='.$cust_id;
$q_bank = mysql_query($bnk_sql, $con) or die(mysql_error());
$f_bnk = mysql_fetch_assoc($q_bank);

echo $f_bnk['cust_name'].'/'.$f_bnk['cust_phn'].'/'.$f_bnk['cust_proof'].'/'.$f_bnk['cust_wallet'].'/'.$f_bnk['cust_id'];

?>