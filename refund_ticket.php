<?php require('header.php'); ?>
<?php 
if (isset($_SESSION['user']))
{ 
                
                $query_rsUsers = "SELECT * FROM td_admin where admin_user='$_SESSION[user]' and admin_pass='$_SESSION[password]'";
                $rsUsers = mysql_query($query_rsUsers, $con) or die(mysql_error());
                $row_rsUsers = mysql_fetch_assoc($rsUsers);
                $totalRows_rsUsers = mysql_num_rows($rsUsers);
                if ($totalRows_rsUsers==0)
                  {
                  exit('<H1>Invalid user/ password</H1><script>location.replace("index.php")</script>');
                  }
                else 
                  {
                 $_SESSION['user_type'] = $row_rsUsers['admin_type'];
                  }  
                  
}
else
{
 exit('You can not directly access this page<script>location.replace("index.php")</script>');
}
// Tax Amount
$tax = 'SELECT * FROM td_tax';
$tax_query = mysql_query($tax,$con) or die(mysql_error());
$tax_data = mysql_fetch_assoc($tax_query);
// Get Bill Details
$bill = 'SELECT * FROM td_purchase WHERE purchase_id='.$_REQUEST['customer_id'];
$bill_query = mysql_query($bill,$con) or die(mysql_error());
$bill_data = mysql_fetch_assoc($bill_query);

$bank = 'SELECT * FROM td_bank_details WHERE bnk_id='.$bill_data['bank_name'];
$bank_query = mysql_query($bank,$con) or die(mysql_error());
$bank_data = mysql_fetch_assoc($bank_query);
if(isset($_POST['b_submit']) && $_POST['b_submit'] == 'submit') {
  $confirm_cancel = $_POST['txt_not_confirm'];  

if($_POST['txt_can_type'] == 'go') {
    $canc_go = 'no';
    $canc_come = 'yes';
    $canc_both = 'yes';
    $last_price = $bill_data['p_amount'] - ($_POST['txt_onlchrg']+$_POST['txt_onlchrg_irctc']);
    $last_sprice = $bill_data['sell_price'] - ($_POST['txt_onlchrg']+$_POST['txt_onlchrg_irctc']);
} elseif($_POST['txt_can_type'] == 'come') {
    $canc_come = 'no';
    $canc_both = 'yes';
    $canc_go = 'yes';
    $last_price = $bill_data['return_amount'] - ($_POST['txt_onlchrg']+$_POST['txt_onlchrg_irctc']);
    $last_sprice = $bill_data['sell_price'] - ($_POST['txt_onlchrg']+$_POST['txt_onlchrg_irctc']);
} elseif($_POST['txt_can_type'] == 'both') {
   
    $canc_come = 'no';
    $canc_go = 'no';
}
	//print_r($_POST['page']);
    $date = date('d/m/y');
    $confirm_cancel = $_POST['txt_not_confirm']; 
    
    $wrtrn = $_POST['txt_wallet'];
    if($confirm_cancel == 0) {
    $amount = $_POST['txt_onlchrg'];
    $rf_hnd_chg = $bill_data['return_handling_charge'];
} else {
     $amount = $_POST['txt_onlchrg'] + $bill_data['return_handling_charge'];
      $rf_hnd_chg = 0;
}
    $rfnd_handl_chrg = $_POST['txt_hndlngchrg'];
    $rfnd_onln_chrg = $_POST['txt_onlchrg_irctc'];
    $govt_tax = ($tax_data['tax'] * $rfnd_handl_chrg)/100;

    $handling_profit = $rfnd_handl_chrg;

    $bank_id_add = $bill_data['bank_name'];

    $rf_amount1 = $amount;
	$rf_amount = $amount - ($rfnd_handl_chrg + $govt_tax);
	$avail_bank_bal = $rf_amount1 + $bank_data['available_bal'];

    $refund_total_amount = $amount + $rfnd_onln_chrg;
    $customer_name = $_POST['txt_cust_name'];
    $exp = explode(',',$customer_name);
    $persons = count(explode(',',$customer_name));
    
	$sql = 'INSERT INTO td_refund(pid,cuid,refund_amount,wallet_return,rf_charge,refund_handling_charge,bank_id,gtax,hand_profit,return_date,irctc_charge,c_name) VALUES("'.$bill_data["purchase_id"].'","'.$bill_data["customer_id"].'","'.$amount.'","'.$wrtrn.'","'.$rf_amount.'","'.$rfnd_handl_chrg.'","'.$bank_id_add.'","'.$govt_tax.'","'.$handling_profit.'","'.$date.'","'.$rfnd_onln_chrg.'","'.$customer_name.'")';
	$query = mysql_query($sql,$con) or die(mysql_error());
	$in_id = mysql_insert_id();
    for($i=1 ; $i<=$persons; $i++){
    $csmp = $exp[$i];
    $sql12 = 'INSERT INTO td_refund_persons(refund_id, refund_customer_name) VALUES("'.$in_id.'","'.$csmp.'")';
    $query12 = mysql_query($sql12,$con) or die(mysql_error());
    }
    if($_POST['txt_can_type'] == 'go') {
	$ticket_update = 'UPDATE td_purchase SET refund = "yes",go_journey="'.$canc_go.'",return_journey="'.$canc_come.'",refund_id="'.$in_id.'",p_amount="'.$last_price.'",sell_price="'.$last_sprice.'" WHERE purchase_id='.$_REQUEST['customer_id'];
	} else {
      $ticket_update = 'UPDATE td_purchase SET refund = "yes",go_journey="'.$canc_go.'",return_journey="'.$canc_come.'",refund_id="'.$in_id.'",return_amount="'.$last_price.'",sell_price="'.$last_sprice.'" ,return_handling_charge="'.$last_sprice.'" WHERE purchase_id='.$_REQUEST['customer_id'];  
    }
    $ticket_query = mysql_query($ticket_update, $con) or die(mysql_error());
	$bank_update = 'UPDATE td_bank_details SET amount = '.$avail_bank_bal.',available_bal='.$avail_bank_bal.' WHERE bnk_id="'.$bill_data["bank_name"].'"';
	$bank_update_query = mysql_query($bank_update, $con) or die(mysql_error());
	// Run the move_uploaded_file() function here
	if(isset($wrtrn) && $wrtrn == 1) {
	$customer_details = 'SELECT * FROM td_customer WHERE cust_id="'.$bill_data["customer_id"].'"';
	$customer_details_query = mysql_query($customer_details,$con) or die(mysql_error());
	$customer_details_data = mysql_fetch_assoc($customer_details_query);
	$t_wallet = ($rf_amount + $customer_details_data['cust_wallet']);	
	$wallet_update = 'UPDATE td_customer SET cust_wallet='.$t_wallet.',avail_bal='.$t_wallet.' WHERE cust_id="'.$bill_data["customer_id"].'"';
	$wallet_query = mysql_query($wallet_update, $con) or die(mysql_error());
	}
	header('Location: refund_billing.php?b_id='.$in_id);
}
?>
<div>
    <ul class="breadcrumb">
        <li>
            <a href="#">Home</a>
        </li>
        <li>
            <a href="#">Credit Note</a>
        </li>
    </ul>
</div>

<div class="row">
    <div class="box col-md-12">
	<div class="box-inner">
            <div class="box-header well" data-original-title="">
                <h2><?php echo $bill_data['ticket_type'];?> Ticket Cancel details &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Customer Id : <?php echo $bill_data['customer_id'];?> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</h2>

                <div class="box-icon">
                    <a href="#" class="btn btn-setting btn-round btn-default"><i
                            class="glyphicon glyphicon-cog"></i></a>
                    <a href="#" class="btn btn-minimize btn-round btn-default"><i
                            class="glyphicon glyphicon-chevron-up"></i></a>
                    <a href="#" class="btn btn-close btn-round btn-default"><i
                            class="glyphicon glyphicon-remove"></i></a>
                </div>
            </div>
            <div id="divToPrint">
             <div class="row">
    <div class="box col-md-12">
    <div class="box-inner">
   
    <div class="box-content">
   
    <table class="table table-striped table-bordered bootstrap-datatable responsive">
    <thead>
   
    </thead>
    <tbody>
     
   <tr>
        <td>UP PNR Number</td>
        <td class="center"> 
                   <div class="form-group has-success col-md-4">
                    
                    <?php echo $bill_data['pnr_no'];?>
                </div>
                   
                </td>
       
       
    </tr>
     <tr>
        <td>Down PNR Number</td>
        <td class="center"> 
                   <div class="form-group has-success col-md-4">
                    
                    <?php echo $bill_data['return_pnr_no'];?>
                </div>
                   
                </td>
       
       
    </tr>
     <tr>
        <td>UP Ticket Number</td>
        <td class="center"> 
                   <div class="form-group has-success col-md-4">
                    
                    <?php echo $bill_data['ticket_no'];?>
                </div>
                   
                </td>
       
       
    </tr>
     <tr>
        <td>Down Ticket Number</td>
        <td class="center"> 
                   <div class="form-group has-success col-md-4">
                    
                    <?php echo $bill_data['return_ticket_number'];?>
                </div>
                   
                </td>
       
       
    </tr>
     <tr>
        <td>Train Name / No / Flight Name</td>
        <td class="center"> 
                   <div class="form-group has-success col-md-4">
                    
                    <?php echo $bill_data['train_name'];?>
                </div>
                   
                </td>
       
       
    </tr>
   
    <tr>
        <td>Journey Date</td>
        <td class="center"> 
                   <div class="form-group has-success col-md-4">
                   
                    <?php echo $bill_data['journey_date'];?>
                </div>
                   
                </td>
       
       
    </tr>
    <tr>
        <td>Journey From</td>
        <td class="center"> 
                   <div class="form-group has-success col-md-4">
                    
                   <?php echo $bill_data['j_from'];?>
                </div>
                   
                </td>
       
       
    </tr>
     <tr>
        <td>Destination</td>
        <td class="center"> 
                   <div class="form-group has-success col-md-4">
                    
                   <?php echo $bill_data['j_to'];?>
                </div>
                   
                </td>
       
       
    </tr>
<?php if($bill_data['return_journey'] == 'yes') { ?>
    <tr>
        <td>Return Train Name / No / Flight Name</td>
        <td class="center"> 
                   <div class="form-group has-success col-md-4">
                    
                    <?php echo $bill_data['return_vehicle'];?>
                </div>
                   
                </td>
       
       
    </tr>
   
    <tr>
        <td>Return Date</td>
        <td class="center"> 
                   <div class="form-group has-success col-md-4">
                   
                    <?php echo $bill_data['return_date'];?>
                </div>
                   
                </td>
       
       
    </tr>
    <tr>
        <td>Returning From</td>
        <td class="center"> 
                   <div class="form-group has-success col-md-4">
                    
                   <?php echo $bill_data['return_from'];?>
                </div>
                   
                </td>
       
       
    </tr>
     <tr>
        <td>Returning Destination</td>
        <td class="center"> 
                   <div class="form-group has-success col-md-4">
                    
                   <?php echo $bill_data['return_to'];?>
                </div>
                   
                </td>
       
       
    </tr>
    <?php } ?>
     <tr>
        <td>Customer Name</td>
        <td class="center"> 
                   <div class="form-group has-success col-md-4">
                    
                    <?php echo $bill_data['customer_name'];?>
                </div>
                   
                </td>
       
       
    </tr>
    <tr>
        <td>Customer Contact No</td>
        <td class="center"> 
                   <div class="form-group has-success col-md-4">
                    
                   <?php echo $bill_data['customer_phn'];?>
                </div>
                   
                </td>
       
       
    </tr>
       <tr>
        <td>Customer Address</td>
        <td class="center"> 
                   <div class="form-group has-success col-md-4">
                    
                    <?php echo $bill_data['customer_proof'];?>
                </div>
                   
                </td>
       
       
    </tr>
    <tr>
        <td>Booking Date</td>
        <td class="center"> 
                   <div class="form-group has-success col-md-4">
                    
                    <?php echo $bill_data['p_date'];?>
                </div>
                   
                </td>
       
       
    </tr>
     <tr>
        <td>Total Persons</td>
        <td class="center"> 
                   <div class="form-group has-success col-md-4">
                    
                    <?php echo $bill_data['head_number'];?>
                </div>
                   
                </td>
       
       
    </tr>
   
       
	 <tr>
        <td>UP Ticket Purchase Amount</td>
        <td class="center"> 
                   <div class="form-group has-success col-md-4">
                    
                   <span style="color:red;">Rs <?php echo $bill_data['p_amount'];?> /-</span>
                </div>
                   
                </td>
       
       
    </tr>
     <tr>
        <td>DOWN Ticket Purchase Amount</td>
        <td class="center"> 
                   <div class="form-group has-success col-md-4">
                    
                   <span style="color:red;">Rs <?php echo $bill_data['return_amount'];?> /-</span>
                </div>
                   
                </td>
       
       
    </tr>

    </tbody>
    </table>
    </div>
    </div>
    </div>
    <!--/span-->

    </div>
            
           
        </div>
    </div>
        <div class="box-inner">
            <div class="box-header well" data-original-title="">
                <h2><i class="glyphicon glyphicon-edit"></i>Insert Refund details</h2>

                <div class="box-icon">
                    <a href="#" class="btn btn-setting btn-round btn-default"><i
                            class="glyphicon glyphicon-cog"></i></a>
                    <a href="#" class="btn btn-minimize btn-round btn-default"><i
                            class="glyphicon glyphicon-chevron-up"></i></a>
                    <a href="#" class="btn btn-close btn-round btn-default"><i
                            class="glyphicon glyphicon-remove"></i></a>
                </div>
            </div>
             <div class="row">
    <div class="box col-md-12">
    <div class="box-inner">
   <form action="" method="post" name="form1" enctype="multipart/form-data" onSubmit="return validate_cancel()">
    <div class="box-content">
   
    <table class="table table-striped table-bordered bootstrap-datatable responsive">
    <thead>
   
    </thead>
    <tbody>
      <tr>
        <td>Cancellation Type</td>
        <td class="center"> <div class="form-group has-success col-md-4">
                    
                    <label class="radio-inline">
                    <input type="radio" value="go" class="hand_chrg" id="inlineRadio1" name="txt_can_type" > Departing &nbsp;&nbsp;&nbsp;&nbsp;
                    <input type="radio" value="come" class="hand_chrg" id="inlineRadio1" name="txt_can_type" > Return &nbsp;&nbsp;
                    <input type="radio" value="both" class="hand_chrg" id="inlineRadio1" name="txt_can_type" > Both &nbsp;&nbsp;
                </label>
                </div></td>
       
       
    </tr>
     <tr>
        <td>Customer Name</td>
        <td class="center"> <div class="form-group has-success col-md-4">
                    
                    <input type="text" name="txt_cust_name" class="form-control onlchrg" id="inputSuccess1">
                </div></td>
       
       
    </tr>
    <tr>
        <td>Refund Amount</td>
        <td class="center"> <div class="form-group has-success col-md-4">
                    
                    <input type="text" name="txt_onlchrg" class="form-control onlchrg" id="inputSuccess1">
                </div></td>
       
       
    </tr>
    <tr>
        <td>IRCTC charge</td>
        <td class="center"> <div class="form-group has-success col-md-4">
                    
                    <input type="text" name="txt_onlchrg_irctc" class="form-control onlchrg_irctc" id="inputSuccess1">
                </div></td>
       
       
    </tr>
    <tr>
        <td>Handling charge / SC</td>
        <td class="center"> <div class="form-group has-success col-md-4">
                    
                    <input type="text" name="txt_hndlngchrg" class="form-control hndlngchrg" id="inputSuccess1">
                </div></td>
       
       
    </tr>
    <tr>
        <td>Not Confirmed</td>
        <td class="center"> <div class="form-group has-success col-md-4">
                    
                    <label class="radio-inline">
                    <input type="radio" value="0" class="txt_not_confirm" id="inlineRadio1" name="txt_not_confirm" onclick="return cancel_confirm(this.value)"> Not Confirmed 
                </label>
                </div></td>
       
       
    </tr>
     <tr>
        <td>Send to Wallet</td>
        <td class="center"> 
                   <div class="checkbox">
                    <label>
                        <input type="checkbox" value="0" name="txt_wallet" id="wallet_credit" onclick="wallet_add();">
                       
                    </label>
                </div>
                   
                </td>
       
       
    </tr>
       
     <tr>
        <td></td>
        <td class="center"><input type="hidden" name="b_submit" value="submit"/>
              <button type="submit" class="btn btn-default">Submit</button></td>
       
       
    </tr>
   
   
    </tbody>
    </table>
    </div>
    </div>
    </div>
    <!--/span-->

    </div>
            
            </form>
        </div>
    </div>
    <!--/span-->

</div><!--/row-->



<?php require('footer.php'); ?>

