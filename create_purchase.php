<?php
include('connection.php');
if(!empty($_REQUEST['existing_cust_id'])) {
	$cid = $_REQUEST['existing_cust_id'];
	$new_customer = 'no';
	$custmer_sql = 'SELECT * FROM td_customer WHERE cust_id = "'.$cid.'"';
$custmer_bank = mysql_query($custmer_sql, $con) or die(mysql_error());
$custmer_bnk = mysql_fetch_assoc($custmer_bank);
}
if(empty($_REQUEST['existing_cust_id'])) {
  function generate_random_password($length = 10) {
    $alphabets = range('A','Z');
    $numbers = range('0','9');
    $additional_characters = array('_','.');
    $final_array = array_merge($alphabets,$numbers,$additional_characters);
         
    $password = '';
  
    while($length--) {
      $key = array_rand($final_array);
      $password .= $final_array[$key];
    }
  
    return $password;
  }
$cid = generate_random_password(7) ;
$new_customer = 'yes';
}
if($_POST['txt_credit3'] == 1) {
	$go = 'yes';
	$return = 'yes';
	$return_ticket_no = $_REQUEST['txt_Rticket_no'];
	$return_pnr_no = $_REQUEST['txt_Rpnr_no'];
	$return_train = $_REQUEST['txt_train_name1'];
	$return_date = $_REQUEST['txt_journey_date1'];
	$return_from = $_REQUEST['txt_journ_from1'];
	$return_arrival = $_REQUEST['txt_journ_to1'];
	$return_person_no = $_REQUEST['txt_return_heads'];

	$ret_p_amount = $_REQUEST['txt_Rprchs_amnt'];
	$return_hCharge = $_REQUEST['txt_hndlmg_chrg1'];
	$return_s_tax = $_REQUEST['txt_rgovt_amnt'];
	$total_return_price = $_REQUEST['txt_rtrn_price']; 
	$cgst_per1 = $_REQUEST['txt_cgst1'];
$sgst_per1 = $_REQUEST['txt_sgst1'];
$igst_per1 = $_REQUEST['txt_igst1'];
$cgst_amt1 = $_REQUEST['txt_cgst_amt1'];
$sgst_amt1 = $_REQUEST['txt_sgst_amt1'];
$igst_amt1 = $_REQUEST['txt_igst_amt1'];
}
else {
	$go = 'yes';
	$return = 'no';
	$return_train = 'no';
	$return_date = 'no';
	$return_from = 'no';
	$return_arrival = 'no';
		$cgst_per1 = 0;
$sgst_per1 = 0;
$igst_per1 = 0;
$cgst_amt1 = 0;
$sgst_amt1 =0;
$igst_amt1 =0;
}
$bank = $_REQUEST['txt_bank'];
$type = $_REQUEST['txt_type'];
$train = $_REQUEST['txt_train_name'];
$pnr = $_REQUEST['txt_pnr_no'];
$jdate = $_REQUEST['txt_journey_date'];

$name = $_REQUEST['txt_cust_name'];
$proof = mysql_real_escape_string($_REQUEST['txt_cust_proof']);
$contact = $_REQUEST['txt_phn'];
$from = $_REQUEST['txt_journ_from'];
$to = $_REQUEST['txt_journ_to'];
$pamnt = $_REQUEST['txt_prchs_amnt'];
$pdate = date('d/m/y',strtotime($_REQUEST['txt_prchs_date']));
$nheads = $_REQUEST['txt_heads'];
$hcharge = $_REQUEST['txt_hndlmg_chrg'];
$sprice = $_REQUEST['txt_sell_price'];
$gprice = $_REQUEST['txt_govt_amnt'];
$nprofit = $_REQUEST['txt_total_profit'];
$t_num = $_REQUEST['txt_ticket_no'];
$credit_allow = $_REQUEST['txt_credit_count'];

$sac_code = $_REQUEST['sac_code'];
$cgst_per = $_REQUEST['txt_cgst'];
$sgst_per = $_REQUEST['txt_sgst'];
$igst_per = $_REQUEST['txt_igst'];
$cgst_amt = $_REQUEST['txt_cgst_amt'];
$sgst_amt = $_REQUEST['txt_sgst_amt'];
$igst_amt = $_REQUEST['txt_igst_amt'];


if(!empty($_REQUEST['txt_credit_count']) && $_REQUEST['txt_credit_count'] == 'yes') {
	if(!empty($_REQUEST['customer_wallet_amount'])){
		$credit_avail_bal1 = $custmer_bnk['credit_bal']+($sprice - $_REQUEST['customer_wallet_amount']);
		$credit_avail_bal = $sprice - $_REQUEST['customer_wallet_amount'];
		$wallet_price = 0;
		$payment = 'no';
	}
	else {
		$credit_avail_bal1 = $custmer_bnk['credit_bal']+$sprice;
		$credit_avail_bal = $sprice;
		$wallet_price = 0;
		$payment = 'no';
	}
}
else {
$wallet_price = $_REQUEST['customer_wallet_amount'] - $sprice;
$credit_avail_bal1 = $custmer_bnk['credit_bal'];
	$credit_avail_bal = $custmer_bnk['credit_bal'];
	$payment = 'yes';
}

$bnk_sql = 'SELECT * FROM td_bank_details WHERE bnk_id='.$bank;
$q_bank = mysql_query($bnk_sql, $con) or die(mysql_error());
$f_bnk = mysql_fetch_assoc($q_bank);



$avail_bal = $f_bnk['available_bal'] - $pamnt;
$customer_avail_bal = $f_bnk['available_bal'] - ($pamnt + $hcharge);
$sql = 'INSERT INTO td_purchase(customer_id,bank_name,ticket_type,ticket_no,pnr_no,train_name,journey_date,customer_name,customer_phn,customer_proof,j_from,j_to,p_amount,p_date,head_number,handling_charge,sell_price,govt_price,profit,credit_allowed,credit_taken,customer_type,refund,payment_stat,go_journey,return_journey,return_vehicle,return_date,return_from,return_to,return_ticket_number, return_pnr_no, return_persons, return_amount, return_s_tax, return_handling_charge, return_sell_price, cgst_per, cgst_amt, sgst_per, sgst_amt, igst_per, igst_amt, sac_code,cgst_per1, cgst_amt1, sgst_per1, sgst_amt1, igst_per1, igst_amt1) VALUES("'.$cid.'","'.$bank.'","'.$type.'","'.$t_num.'","'.$pnr.'","'.$train.'","'.$jdate.'","'.$name.'","'.$contact.'","'.$proof.'","'.$from.'","'.$to.'","'.$pamnt.'","'.$pdate.'","'.$nheads.'","'.$hcharge.'","'.$sprice.'","'.$gprice.'","'.$nprofit.'","'.$credit_allow.'","'.$credit_avail_bal.'","'.$new_customer.'",1,"'.$payment.'","'.$go.'","'.$return.'","'.$return_train.'","'.$return_date.'","'.$return_from.'","'.$return_arrival.'","'.$return_ticket_no.'","'.$return_pnr_no.'","'.$return_person_no.'","'.$ret_p_amount.'","'.$return_s_tax.'","'.$return_hCharge.'","'.$total_return_price.'","'.$cgst_per.'","'.$cgst_amt.'","'.$sgst_per.'","'.$sgst_amt.'","'.$igst_per.'","'.$igst_amt.'","'.$sac_code.'","'.$cgst_per1.'","'.$cgst_amt1.'","'.$sgst_per1.'","'.$sgst_amt1.'","'.$igst_per1.'","'.$igst_amt1.'")';
$query = mysql_query($sql,$con) or die(mysql_error());
$insert_id = mysql_insert_id();
if($nheads > 0) {
	for($i=1 ; $i<=$nheads; $i++){
		$csmp = $_REQUEST['txt_heads'.$i];
$sql = 'INSERT INTO td_p_customer(pid,c_name) VALUES("'.$insert_id.'","'.$csmp.'")';
$query = mysql_query($sql,$con) or die(mysql_error());
}
}
if($return_person_no > 0) {
	for($j=1 ; $j<=$return_person_no; $j++){
		$csmp1 = $_REQUEST['txt_rheads'.$j];
$sql11 = 'INSERT INTO td_r_customer(pr_id,rc_name) VALUES("'.$insert_id.'","'.$csmp1.'")';
$query11 = mysql_query($sql11,$con) or die(mysql_error());
}
}
if($insert_id) {
$bnk_update = 'UPDATE td_bank_details SET available_bal='.$avail_bal.',amount='.$avail_bal.' WHERE bnk_id='.$bank;
$u_bank = mysql_query($bnk_update, $con) or die(mysql_error());
if(!empty($_REQUEST['existing_cust_id'])) {
$wallet_update = 'UPDATE td_customer SET cust_wallet='.$wallet_price.',avail_bal='.$wallet_price.',credit_bal='.$credit_avail_bal1.' WHERE cust_id="'.$cid.'"';
$wallet_query = mysql_query($wallet_update, $con) or die(mysql_error());
}
if(empty($_REQUEST['existing_cust_id'])) {
$customer_add = 'INSERT INTO td_customer(cust_name,cust_phn,cust_proof,cust_wallet,cust_id,avail_bal,credit_bal) VALUES("'.$name.'","'.$contact.'","'.$proof.'",0,"'.$cid.'",0,"'.$credit_avail_bal1.'")';
$add_query = mysql_query($customer_add, $con) or die(mysql_error());
}
}
echo 'ok|'.$insert_id;






// if( $f_bnk['available_bal'] > $pamnt ) {
// $avail_bal = $f_bnk['available_bal'] - $pamnt;
// $customer_avail_bal = $f_bnk['available_bal'] - ($pamnt + $hcharge);
// $sql = 'INSERT INTO td_purchase(customer_id,bank_name,ticket_type,ticket_no,pnr_no,train_name,journey_date,customer_name,customer_phn,customer_proof,j_from,j_to,p_amount,p_date,head_number,handling_charge,sell_price,govt_price,profit,credit_allowed,credit_taken,customer_type,refund,payment_stat,go_journey,return_journey,return_vehicle,return_date,return_from,return_to) VALUES("'.$cid.'","'.$bank.'","'.$type.'","'.$t_num.'","'.$pnr.'","'.$train.'","'.$jdate.'","'.$name.'","'.$contact.'","'.$proof.'","'.$from.'","'.$to.'","'.$pamnt.'","'.$pdate.'","'.$nheads.'","'.$hcharge.'","'.$sprice.'","'.$gprice.'","'.$nprofit.'","'.$credit_allow.'","'.$credit_avail_bal.'","'.$new_customer.'",1,"'.$payment.'","'.$go.'","'.$return.'","'.$return_train.'","'.$return_date.'","'.$return_from.'","'.$return_arrival.'")';
// $query = mysql_query($sql,$con) or die(mysql_error());
// $insert_id = mysql_insert_id();
// if($nheads > 1) {
// 	for($i=2 ; $i<=$nheads; $i++){
// 		$csmp = $_REQUEST['txt_heads'.$i];
// $sql = 'INSERT INTO td_p_customer(pid,c_name) VALUES("'.$insert_id.'","'.$csmp.'")';
// $query = mysql_query($sql,$con) or die(mysql_error());
// }
// }
// if($insert_id) {
// $bnk_update = 'UPDATE td_bank_details SET available_bal='.$avail_bal.',amount='.$avail_bal.' WHERE bnk_id='.$bank;
// $u_bank = mysql_query($bnk_update, $con) or die(mysql_error());

// $wallet_update = 'UPDATE td_customer SET cust_wallet='.$wallet_price.',avail_bal='.$wallet_price.' WHERE cust_id="'.$cid.'"';
// $wallet_query = mysql_query($wallet_update, $con) or die(mysql_error());
// }
// if(empty($_REQUEST['existing_cust_id'])) {
// $customer_add = 'INSERT INTO td_customer(cust_name,cust_phn,cust_proof,cust_wallet,cust_id,avail_bal,credit_bal) VALUES("'.$name.'","'.$contact.'","'.$proof.'",0,"'.$cid.'",0,0)';
// $add_query = mysql_query($customer_add, $con) or die(mysql_error());
// }
// echo 'ok|'.$insert_id;
// } else {
// 	echo 'deny|';
// }
?>