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
$bill = 'SELECT * FROM td_purchase WHERE purchase_id='.$_REQUEST['b_id'];
$bill_query = mysql_query($bill,$con) or die(mysql_error());
$bill_data = mysql_fetch_assoc($bill_query);

// Get Customer Details
$cust = 'SELECT * FROM td_customer WHERE cust_id="'.$bill_data['customer_id'].'"';
$cust_query = mysql_query($cust,$con) or die(mysql_error());
$cust_data = mysql_fetch_assoc($cust_query);
$total = mysql_num_rows($cust_query);


?>
 
<div id="loading-indicator" style="display:none;">Processing...</div>
<div id="lazy_load" style="display:none;">You Will be redirected to the bill page</div>
<div>
    <ul class="breadcrumb">
        <li>
            <a href="#">Home</a>
        </li>
        <li>
            <a href="#"><?php echo $bill_data['customer_name'];?>'s Ticket Booking Details</a>
        </li>
    </ul>
</div>

<div class="row">
    <div class="box col-md-12">
        <div class="box-inner">
            <div class="box-header well" data-original-title="">
                <h2><?php echo $bill_data['ticket_type'];?> Ticket Booking details &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Customer Id : <?php echo $bill_data['customer_id'];?> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i class="glyphicon glyphicon-print"></i> <a href="single_bill_print.php?bill_id=<?php echo $_REQUEST['b_id'];?>" target="_blank">Print Here</a></h2>

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

<div class="box col-md-6 col-md-offset-6">

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
                        <div class="col-md-4"><h6>UP Ticket Price</h6></div>
                        <div class="col-md-4"><h6></h6></div>
                        <div class="col-md-4"><h6><?php echo $bill_data['p_amount'];?></h6></div>
                    </div>
                     <div class="row">
                        <div class="col-md-4"><h6> DOWN Ticket Price</h6></div>
                        <div class="col-md-4"><h6></h6></div>
                        <div class="col-md-4"><h6><?php echo $bill_data['return_amount'];?></h6></div>
                    </div>
                    <div class="row">
                        <div class="col-md-4"><h6>UP Handling Charge</h6></div>
                        <div class="col-md-4"><h6></h6></div>
                        <div class="col-md-4"><h6><?php echo $bill_data['handling_charge']* $bill_data['head_number'];?> (for <?php echo $bill_data['head_number'];?> Person<?php if($bill_data['head_number'] > 1) echo 's)';?></h6></div>
                    </div>
                    <div class="row">
                        <div class="col-md-4"><h6>DOWN Handling Charge</h6></div>
                        <div class="col-md-4"><h6></h6></div>
                        <div class="col-md-4"><h6><?php echo $bill_data['return_handling_charge']* $bill_data['return_persons'];?> (for <?php echo $bill_data['return_persons'];?> Person<?php if($bill_data['return_persons'] > 1) echo 's)';?></h6></div>
                    </div>
                     <div class="row">
                        <div class="col-md-4"><h6>Credit Taken</h6></div>
                        <div class="col-md-4"><h6></h6></div>
                        <div class="col-md-4"><h6><?php echo $bill_data['credit_allowed'];?></h6></div>
                    </div>
                    <?php if ($total > 0) { ?>
                    <div class="row">
                        <div class="col-md-4"><h6>Wallet Amount</h6></div>
                        <div class="col-md-4"><h6></h6></div>
                        <div class="col-md-4"><h6><?php echo $cust_data['cust_wallet'];?></h6></div>
                    </div>
                    <?php } ?>
                     <div class="row">
                        <div class="col-md-4"><h6>Credit Amount</h6></div>
                        <div class="col-md-4"><h6></h6></div>
                        <div class="col-md-4"><h6><?php echo $bill_data['credit_taken'];?></h6></div>
                    </div>
                    <div class="row">
                        <div class="col-md-4"><h6>UP GST Amt</h6></div>
                        <div class="col-md-4"><h6></h6></div>
                        <div class="col-md-4"><h6><?php echo $bill_data['govt_price'];?></h6></div>
                    </div>
                    <div class="row">
                        <div class="col-md-4"><h6>DOWN GST Amt</h6></div>
                        <div class="col-md-4"><h6></h6></div>
                        <div class="col-md-4"><h6><?php echo $bill_data['return_s_tax'];?></h6></div>
                    </div>
                    <div class="row">
                        <div class="col-md-4"><h6>Total Price</h6></div>
                        <div class="col-md-4"><h6></h6></div>
                        <div class="col-md-4"><h6><?php echo $bill_data['sell_price'];?></h6></div>
                    </div>
                    <hr/>
                     <div class="row">
                        <div class="col-md-4"><h6>Net Price (To Pay)</h6></div>
                        <div class="col-md-4"><h6></h6></div>
                        <div class="col-md-4"><h6><?php if($bill_data['payment_stat'] == 'yes') { echo 'Rs 0 ( Payment is Done )'; } elseif($bill_data['payment_stat'] == 'no') { echo 'Rs '. $bill_data['credit_taken'] ; } else {echo $bill_data['sell_price'];}?></h6><br/><h6>Remaining Wallet Ballance is = <?php echo $cust_data['cust_wallet'];?></h6></div>
                    </div>
                </div>
            </div>
        </div>
        </div>
</div><!--/row-->



<?php require('footer.php'); ?>

