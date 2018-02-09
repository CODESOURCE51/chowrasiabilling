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
// Get Bank Details
$bill = 'SELECT * FROM td_purchase WHERE purchase_id='.$_REQUEST['purchase_id'];
$bill_query = mysql_query($bill,$con) or die(mysql_error());
$bill_data = mysql_fetch_assoc($bill_query);

// Get Tax
$tax = 'SELECT * FROM td_bank_details WHERE bnk_id='.$bill_data['bank_name'];
$tax_query = mysql_query($tax,$con) or die(mysql_error());
$tax_data = mysql_fetch_assoc($tax_query);

// Get Customer Details
$cust = 'SELECT * FROM td_customer WHERE cust_id="'.$bill_data['customer_id'].'"';
$cust_query = mysql_query($cust,$con) or die(mysql_error());
$cust_data = mysql_fetch_assoc($cust_query);
$total = mysql_num_rows($cust_query);

// Refund Details
$cust_refund = 'SELECT * FROM td_refund WHERE cuid="'.$bill_data['customer_id'].'"';
$refund_query = mysql_query($cust_refund,$con) or die(mysql_error());
$refund_data = mysql_fetch_assoc($refund_query);
?>

<div id="loading-indicator" style="display:none;">Processing...</div>
<div id="lazy_load" style="display:none;">You Will be redirected to the bill page</div>
<div>
    <ul class="breadcrumb">
        <li>
            <a href="#">Home</a>
        </li>
        <li>
            <a href="#"><?php echo $bill_data['customer_name'];?>'s Ticket Booking Report</a>
        </li>
    </ul>
</div>

<div class="row">
    <div class="box col-md-12">
        <div class="box-inner">
            <div class="box-header well" data-original-title="">
                <h2><?php echo $bill_data['ticket_type'];?> Ticket Booking General Report &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Customer Id : <?php echo $bill_data['customer_id'];?> </span></h2>

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
        <td>Train Name / No</td>
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
        <td>Return From</td>
        <td class="center"> 
                   <div class="form-group has-success col-md-4">
                    
                   <?php echo $bill_data['return_from'];?>
                </div>
                   
                </td>
       
       
    </tr>
     <tr>
        <td>Return Destination</td>
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
   
       

    </tbody>
    </table>
    </div>
    </div>
    </div>
    <!--/span-->

    </div>
            
           
        </div>
    </div>
    <!--/span-->
<div class="row">
        <div class="box col-md-6">
            <div class="box-inner">
                <div data-original-title="" class="box-header well">
                    <h2><i class="glyphicon glyphicon-th"></i> Purchase Details</h2>

                    <div class="box-icon">
                        <a class="btn btn-setting btn-round btn-default" href="#"><i class="glyphicon glyphicon-cog"></i></a>
                        <a class="btn btn-minimize btn-round btn-default" href="#"><i class="glyphicon glyphicon-chevron-up"></i></a>
                        <a class="btn btn-close btn-round btn-default" href="#"><i class="glyphicon glyphicon-remove"></i></a>
                    </div>
                </div>
                <div class="box-content">
                    <div class="row">
                        <div class="col-md-4"><h6>Number of Ticket</h6></div>
                        <div class="col-md-4"><h6></h6></div>
                        <div class="col-md-4"><h6>1</h6></div>
                    </div>
                    <div class="row">
                        <div class="col-md-4"><h6>Number of Persons</h6></div>
                        <div class="col-md-4"><h6></h6></div>
                        <div class="col-md-4"><h6><?php echo $bill_data['head_number'];?></h6></div>
                    </div>
                    <div class="row">
                        <div class="col-md-4"><h6>Ticket Price</h6></div>
                        <div class="col-md-4"><h6></h6></div>
                        <div class="col-md-4"><h6>Rs <?php echo $bill_data['p_amount'];?></h6></div>
                    </div>
                    <div class="row">
                        <div class="col-md-4"><h6>Deducted From</h6></div>
                        <div class="col-md-4"><h6></h6></div>
                        <div class="col-md-4"><h6><?php echo $tax_data['bank_name'];?></h6></div>
                    </div>
                    <div class="row">
                        <div class="col-md-4"><h6>Remaining Account Ballance</h6></div>
                        <div class="col-md-4"><h6></h6></div>
                        <div class="col-md-4"><h6>Rs <?php echo $tax_data['available_bal'];?></h6></div>
                    </div>
                     <div class="row">
                        <div class="col-md-4"><h6>Credit Taken</h6></div>
                        <div class="col-md-4"><h6></h6></div>
                        <div class="col-md-4"><h6><?php echo $bill_data['credit_allowed'];?></h6></div>
                    </div>
                    
                     
                    <div class="row">
                        <div class="col-md-4"><h6>Total Price</h6></div>
                        <div class="col-md-4"><h6></h6></div>
                        <div class="col-md-4"><h6>Rs <?php echo $bill_data['p_amount'];?></h6></div>
                    </div>
                    <hr/>
                     <div class="row">
                        <div class="col-md-4"><h6>Payment Status</h6></div>
                        <div class="col-md-4"><h6></h6></div>
                        <div class="col-md-4"><h6><?php if($bill_data['credit_allowed'] == 'no') {echo 'Payment Done';} else {'Payment Due';}?></h6></div>
                    </div>
                </div>
            </div>
        </div>
        <!--/span-->

        <div class="box col-md-6">
            <div class="box-inner">
                <div data-original-title="" class="box-header well">
                    <h2><i class="glyphicon glyphicon-th"></i> Sales Details</h2>

                    <div class="box-icon">
                        <a class="btn btn-setting btn-round btn-default" href="#"><i class="glyphicon glyphicon-cog"></i></a>
                        <a class="btn btn-minimize btn-round btn-default" href="#"><i class="glyphicon glyphicon-chevron-up"></i></a>
                        <a class="btn btn-close btn-round btn-default" href="#"><i class="glyphicon glyphicon-remove"></i></a>
                    </div>
                </div>
               <div class="box-content">
                    <div class="row">
                        <div class="col-md-4"><h6>Number of Ticket</h6></div>
                        <div class="col-md-4"><h6></h6></div>
                        <div class="col-md-4"><h6>1</h6></div>
                    </div>
                    <div class="row">
                        <div class="col-md-4"><h6>Number of Persons</h6></div>
                        <div class="col-md-4"><h6></h6></div>
                        <div class="col-md-4"><h6><?php echo $bill_data['head_number'];?></h6></div>
                    </div>
                    <div class="row">
                        <div class="col-md-4"><h6>Ticket Price</h6></div>
                        <div class="col-md-4"><h6></h6></div>
                        <div class="col-md-4"><h6>Rs <?php echo $bill_data['p_amount'];?></h6></div>
                    </div>
                    <div class="row">
                        <div class="col-md-4"><h6>Handling Charge</h6></div>
                        <div class="col-md-4"><h6></h6></div>
                        <div class="col-md-4"><h6>Rs <?php echo $bill_data['handling_charge'] * $bill_data['head_number'];?> (For <?php echo $bill_data['head_number'];?> Person<?php if($bill_data['head_number'] > 1) echo 's';?>)</h6></div>
                    </div>

                     <div class="row">
                        <div class="col-md-4"><h6>Credit Taken</h6></div>
                        <div class="col-md-4"><h6></h6></div>
                        <div class="col-md-4"><h6><?php echo $bill_data['credit_allowed'];?></h6></div>
                    </div>
                    <div class="row">
                        <div class="col-md-4"><h6>Service Tax</h6></div>
                        <div class="col-md-4"><h6></h6></div>
                        <div class="col-md-4"><h6>Rs <?php echo $bill_data['govt_price'];?></h6></div>
                    </div>
                    <div class="row">
                        <div class="col-md-4"><h6>Total Price</h6></div>
                        <div class="col-md-4"><h6></h6></div>
                        <div class="col-md-4"><h6>Rs <?php echo $bill_data['sell_price'];?></h6></div>
                    </div>
                    <?php if($bill_data['refund'] == 'yes') { ?>
                    <hr/>
                    
                    <div class="row">
                        <div class="col-md-4"><h6>Refund Amount</h6></div>
                        <div class="col-md-4"><h6></h6></div>
                        <div class="col-md-4"><h6>Rs <?php echo $refund_data['refund_amount'];?></h6></div>
                    </div>
                    <div class="row">
                        <div class="col-md-4"><h6>Cancellation Charge</h6></div>
                        <div class="col-md-4"><h6></h6></div>
                        <div class="col-md-4"><h6>Rs <?php echo $refund_data['irctc_charge'];?></h6></div>
                    </div>
                    <div class="row">
                        <div class="col-md-4"><h6>Service Tax</h6></div>
                        <div class="col-md-4"><h6></h6></div>
                        <div class="col-md-4"><h6>Rs <?php echo $refund_data['gtax'];?></h6></div>
                    </div>
                    <div class="row">
                        <div class="col-md-4"><h6>Refund Handling Charge</h6></div>
                        <div class="col-md-4"><h6></h6></div>
                        <div class="col-md-4"><h6>Rs <?php echo $refund_data['refund_handling_charge'];?> </h6></div>
                    </div>
                    <?php } ?>
                    <hr/>
                     <div class="row">
                        <div class="col-md-4"><h6>Your Profit</h6></div>
                        <div class="col-md-4"><h6></h6></div>
                        <div class="col-md-4"><h6>Rs <?php if($bill_data['refund'] == 'yes') { echo $bill_data['profit'] + $refund_data['hand_profit']; } else {  echo $bill_data['profit'];}?></h6></div>
                    </div>
                </div>
            </div>
        </div>
        <!--/span-->
    </div>

        </div>
</div><!--/row-->



<?php require('footer.php'); ?>

