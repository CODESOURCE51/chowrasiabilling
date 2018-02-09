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
$bank = 'SELECT * FROM td_bank_details ORDER BY bnk_id ASC';
$bank_query = mysql_query($bank,$con) or die(mysql_error());
$bank_data = mysql_fetch_assoc($bank_query);

// Get Tax
$tax = 'SELECT * FROM td_tax ORDER BY tax_id ASC';
$tax_query = mysql_query($tax,$con) or die(mysql_error());
$tax_data = mysql_fetch_assoc($tax_query);

// Get Customer
$query = 'SELECT * FROM td_customer ORDER BY cus_id ASC';
$query_run = mysql_query($query, $con) or die(mysql_error());
$data = mysql_fetch_assoc($query_run);
$totalRows_rsData = mysql_num_rows($query_run);

$queryC = 'SELECT * FROM td_customer ORDER BY cus_id ASC';
$queryC_run = mysql_query($queryC, $con) or die(mysql_error());
$dataC = mysql_fetch_assoc($queryC_run);
// Get Handling Charges
$query_hc = 'SELECT * FROM td_handling_charge ORDER BY hc_id ASC';
$query_runhc = mysql_query($query_hc, $con) or die(mysql_error());
$data_hc = mysql_fetch_assoc($query_runhc);
?>
<style type="text/css">
    #loading-indicator {
    background-color: rgba(0, 0, 0, 0.5);
    bottom: 0;
    box-sizing: border-box;
    height: 100%;
    left: 0;
    margin: 0 auto;
    position: fixed;
    right: 0;
    top: 0;
    width: 100%;
    padding: 0px !important;
    margin: 0px !important;
    font-size: 1px;
    z-index: 99990;
}
#loading-indicator:before {
    background: url("images/ajax-loader.GIF") no-repeat center center;
    box-sizing: border-box;
    content: "";
    height: 70px;
    left: 50%;
    margin-left: -35px;
    margin-top: -70px;
    position: absolute;
    top: 50%;
    width: 70px;
    z-index: 99996;
}
#loading-indicator:after {
    background: #fff;
    border-radius: 5px;
    box-sizing: border-box;
    color: #000;
    content: "Processing, one moment please... ";
    font-family: arial;
    font-size: 17px;
    height: 110px;
    left: 50%;
    line-height: 98px;
    margin-left: -150px;
    margin-top: -75px;
    padding-top: 35px;
    position: absolute;
    text-align: center;
    top: 50%;
    width: 300px;
    z-index: 99995;
}
 #lazy_load {
    background-color: rgba(0, 0, 0, 0.5);
    bottom: 0;
    box-sizing: border-box;
    height: 100%;
    left: 0;
    margin: 0 auto;
    position: fixed;
    right: 0;
    top: 0;
    width: 100%;
    padding: 0px !important;
    margin: 0px !important;
    font-size: 1px;
    z-index: 99990;
}
</style>
<div id="loading-indicator" style="display:none;">Processing...</div>
<div id="lazy_load" style="display:none;">You Will be redirected to the bill page</div>
<div>
    <ul class="breadcrumb">
        <li>
            <a href="#">Home</a>
        </li>
        <li>
            <a href="#">Purchase Details</a>
        </li>
    </ul>
</div>

<div class="row">
    <div class="box col-md-12">
        <div class="box-inner">
            <div class="box-header well" data-original-title="">
                <h2><i class="glyphicon glyphicon-edit"></i>Insert Purchase details</h2>

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
   <form action="" method="post" name="create_purchase" id="create_purchase" enctype="multipart/form-data" onSubmit="return validate_purchase()">
    <div class="box-content">
   
    <table class="table table-striped table-bordered bootstrap-datatable responsive">
    <thead>
   
    </thead>
    <tbody>
     <tr>
        <td>Select Bank </td>
        <td class="center"> <div class="control-group">
                    

                    <div class="controls">
                     <select id="selectError" data-rel="chosen" name="txt_bank">
                     
                           <?php do { ?> 
                            <option value="<?php echo $bank_data['bnk_id'];?>"><?php echo $bank_data['bank_name'];?></option>
                            <?php } while($bank_data = mysql_fetch_assoc($bank_query));?>
                        </select>
                       
                    </div>
                </div></td>
       
       
    </tr>
    
    <tr>
        <td>Ticket Type</td>
        <td class="center"> <div class="control-group">
                    

                    <div class="controls">
                     <select id="selectError" data-rel="chosen" name="txt_type">
                     
                           
                            <option value="Railway">Railway Ticket</option>
                            <option value="Airways">Airways Ticket</option>
                            
                        </select>
                       
                    </div>
                </div></td>
       
       
    </tr>
     <tr>
        <td>SAC Code</td>
        <td class="center"> <div class="form-group has-success col-md-4">
                    
                    <input type="text" name="sac_code" class="form-control" id="sac_code">
                </div></td>
       
       
    </tr>
    <tr>
        <td>Ticket No</td>
        <td class="center"> <div class="form-group has-success col-md-4">
                    
                    <input type="text" name="txt_ticket_no" class="form-control ticket_no" id="inputSuccess1">
                </div></td>
       
       
    </tr>
    <tr>
        <td>PNR No</td>
        <td class="center"> <div class="form-group has-success col-md-4">
                    
                    <input type="text" name="txt_pnr_no" class="form-control pnr_no" id="inputSuccess1">
                </div></td>
       
       
    </tr>
     <tr>
        <td>Train Name / No / Flight Name</td>
        <td class="center"> 
                   <div class="form-group has-success col-md-4">
                    
                    <input type="text" name="txt_train_name" class="form-control train_name" id="inputSuccess1">
                </div>
                   
                </td>
       
       
    </tr>
   
    <tr>
        <td>Date of Journey</td>
        <td class="center"> 
                   <div class="form-group has-success col-md-4">
                   
                    <input type="text" name="txt_journey_date" class="form-control acc_name datepicker" id="inputSuccess11">
                </div>
                   
                </td>
       
       
    </tr>
    <tr>
        <td>From</td>
        <td class="center"> 
                   <div class="form-group has-success col-md-4">
                    
                    <input type="text" name="txt_journ_from" class="form-control journey_from" id="inputSuccess1">
                </div>
                   
                </td>
       
       
    </tr>
     <tr>
        <td>Arrival</td>
        <td class="center"> 
                   <div class="form-group has-success col-md-4">
                    
                    <input type="text" name="txt_journ_to" class="form-control journey_to" id="inputSuccess1">
                </div>
                   
                </td>
       
       
    </tr>
     <tr>
        <td>Check Return Ticket</td>
        <td class="center"> 
                   <div class="form-group has-success col-md-4">
                    
                    <input type="checkbox" value="0" name="txt_credit3" id="cust_credit3" onclick="return_ticket();">
                </div>
                   
                </td>
       
       
    </tr>
    
    <tr class="ret_train" style="display:none;">
        <td>Return Ticket No</td>
        <td class="center"> <div class="form-group has-success col-md-4">
                    
                    <input type="text" name="txt_Rticket_no" class="form-control rticket_no" id="inputSuccess1">
                </div></td>
       
       
    </tr>
    <tr class="ret_train" style="display:none;">
        <td>Return PNR No</td>
        <td class="center"> <div class="form-group has-success col-md-4">
                    
                    <input type="text" name="txt_Rpnr_no" class="form-control rpnr_no" id="inputSuccess1">
                </div></td>
       
       
    </tr>
  
   
    <tr class="ret_train" style="display:none;">
        <td>Return Train Name / No / Flight Name</td>
        <td class="center"> 
                   <div class="form-group has-success col-md-4">
                    
                    <input type="text" name="txt_train_name1" class="form-control train_name1" id="inputSuccess1">
                </div>
                   
                </td>
       
       
    </tr>
   
    <tr class="ret_train" style="display:none;">
        <td>Date of Return</td>
        <td class="center"> 
                   <div class="form-group has-success col-md-4">
                   
                    <input type="text" name="txt_journey_date1" class="form-control acc_name datepicker1" id="inputSuccess16">
                </div>
                   
                </td>
       
       
    </tr>
    <tr class="ret_train" style="display:none;">
        <td>From</td>
        <td class="center"> 
                   <div class="form-group has-success col-md-4">
                    
                    <input type="text" name="txt_journ_from1" class="form-control journey_from1" id="inputSuccess1">
                </div>
                   
                </td>
       
       
    </tr>
     <tr class="ret_train" style="display:none;">
        <td>Arrival</td>
        <td class="center"> 
                   <div class="form-group has-success col-md-4">
                    
                    <input type="text" name="txt_journ_to1" class="form-control journey_to1" id="inputSuccess1">
                </div>
                   
                </td>
       
       
    </tr>
    <tr>
        <td>Number of Persons</td>
        <td class="center"> 
                   <div class="form-group has-success col-md-4">
                    
                    <input type="text" name="txt_return_heads" class="form-control t_number1" id="inputSuccess1" onkeypress="return onlyNumbers(this.value);" onkeyup="head_number1();">
                </div>
                   
                </td>
       
       
    </tr>
     <tr class="head_rows1">
       
    </tr>
    <tr class="ret_train" style="display:none;">
        <td>Purchase Amount </td>
        <td class="center"> 
                   <div class="form-group has-success col-md-4">
                    
                    <input type="text" name="txt_Rprchs_amnt" class="form-control r_amount" id="inputSuccess1" onkeypress="return onlyNumbers(this.value);" onkeyup="NumToWord(this.value,'divDisplayWords1'); return_Pprice();" onblur="customer_wallet()">
                </div>
                  <div id="divDisplayWords1" style="font-size: 13; color: Teal; font-family: Arial;">
    </div>  
                
                </td>
       
       
    </tr>
      <tr class="ret_train" style="display:none;">
        <td>CGST %</td>
        <td class="center"> 
    <div class="control-group">
                    

                    <div class="controls">
                     <select class="txt_cgst1" name="txt_cgst1">
                            <option value="0">0 %</option>
                           <option value="2.5">2.5 %</option>
                           <option value="3">3 %</option>
                           <option value="6">6 %</option>
                           <option value="9">9 %</option>
                           <option value="12">12 %</option>
                        </select><span id="cgst_amt1" style="color:#FF0000; text-align:right;"></span>
                       
                    </div>
                </div> 
               
                </td>
       
       
    </tr>
    <tr class="ret_train" style="display:none;">
        <td>SGST %</td>
        <td class="center"> 
    <div class="control-group">
                    

                    <div class="controls">
                     <select class="txt_sgst1" name="txt_sgst1">
                            <option value="0">0 %</option>
                           <option value="2.5">2.5 %</option>
                           <option value="3">3 %</option>
                           <option value="6">6 %</option>
                           <option value="9">9 %</option>
                           <option value="12">12 %</option>
                        </select><span id="sgst_amt1" style="color:#FF0000; text-align:right;"></span>
                       
                    </div>
                </div> 
                
                </td>
       
       
    </tr>
    <tr class="ret_train" style="display:none;">
        <td>IGST %</td>
        <td class="center"> 
    <div class="control-group">
                    

                    <div class="controls">
                     <select class="txt_igst1" name="txt_igst1">
                            <option value="0">0 %</option>
                           <option value="2.5">2.5 %</option>
                           <option value="3">3 %</option>
                           <option value="6">6 %</option>
                           <option value="9">9 %</option>
                           <option value="18">18 %</option>
                        </select><span id="igst_amt1" style="color:#FF0000; text-align:right;"></span>
                       
                    </div>
                </div> 
                
                </td>
       
       
    </tr>
    <tr class="ret_train" style="display:none;">
        <td>Return Handling Charges</td>
        <td class="center"> 
        <div class="form-group has-success col-md-4">
                    <label class="radio-inline">
                    <input type="radio" value="<?php echo $data_hc['sc_charge'];?>" class="hand_chrg1" id="inlineRadio1" name="txt_hndlmg_chrg1" onclick="calculate_rsprice(<?php echo $data_hc['sc_charge'];?>);"> Service Tax (Rs. <?php echo $data_hc['sc_charge'];?>)<br/>
                    <input type="radio" value="<?php echo $data_hc['handling_sc'];?>" class="hand_chrg1" id="inlineRadio1" name="txt_hndlmg_chrg1" onclick="calculate_rsprice(<?php echo $data_hc['handling_sc'];?>);"> Hamdling / SC (Rs. <?php echo $data_hc['handling_sc'];?>)<br/>
                    <input type="radio" value="<?php echo $data_hc['dlvry_sc'];?>" class="hand_chrg1" id="inlineRadio1" name="txt_hndlmg_chrg1" onclick="calculate_rsprice(<?php echo $data_hc['dlvry_sc'];?>);"> Delivery / SC (Rs. <?php echo $data_hc['dlvry_sc'];?>)<br/>
                    <input type="radio" value="<?php echo $data_hc['air_sc_charge'];?>" class="hand_chrg1" id="inlineRadio1" name="txt_hndlmg_chrg1" onclick="calculate_rsprice(<?php echo $data_hc['air_sc_charge'];?>);"> Airlines Service Tax (Rs. <?php echo $data_hc['air_sc_charge'];?>)<br/>
                    <input type="radio" value="<?php echo $data_hc['air_handling_sc'];?>" class="hand_chrg1" id="inlineRadio1" name="txt_hndlmg_chrg1" onclick="calculate_rsprice(<?php echo $data_hc['air_handling_sc'];?>);"> Airlines Hamdling / SC (Rs. <?php echo $data_hc['air_handling_sc'];?>)<br/>
                    <input type="radio" value="<?php echo $data_hc['air_dlvry_sc'];?>" class="hand_chrg1" id="inlineRadio1" name="txt_hndlmg_chrg1" onclick="calculate_rsprice(<?php echo $data_hc['air_dlvry_sc'];?>);"> Airlines Delivery / SC (Rs. <?php echo $data_hc['air_dlvry_sc'];?>)
                </label>
                   
                </div>
                  
                   
                </td>
       
       
    </tr>
    <tr class="ret_train" style="display:none;">
        <td>Return GST Amt.</td>
        <td class="center"> 
                   <div class="form-group has-success col-md-4">
                    
                    <input type="text" name="txt_rgovt_amnt" class="form-control rgovt_pay" id="inputSuccess1" value="">
                </div>
                  <!-- <div id="profit" style="display:none; color:red; font-size:16px;">Your Profit : Rs <span id="profit_amnt"></span> /-</div> --> 
                </td>
       
       
    </tr>
    <tr class="ret_train" style="display:none;">
        <td>Total return Price</td>
        <td class="center"> 
                   <div class="form-group has-success col-md-4">
                    
                    <input type="text" name="txt_rtrn_price" class="form-control rtrn_price" id="inputSuccess1" value="">
                </div>
                  <!-- <div id="profit" style="display:none; color:red; font-size:16px;">Your Profit : Rs <span id="profit_amnt"></span> /-</div> --> 
                </td>
       
       
    </tr>
     <tr>
        <td>Billing Customer Name</td>
        <td class="center"> 
                   <div class="form-group has-success col-md-4">
                    
                    <input type="text" name="txt_cust_name" class="form-control customer_name" id="inputSuccess1">
                </div>
                <?php if($totalRows_rsData > 0) { ?>
                  <div class="control-group">
                    

                    <div class="controls">
                     <select id="selectError" data-rel="chosen" class="txt_cust_type" name="txt_cust_type" onchange="get_name();">
                            <option value="null">Select From Existing Customer</option>
                           <?php do { ?>
                            <option value="<?php echo $data['cus_id'];?>"><?php echo $data['cust_name'];?></option>
                            
                           <?php } while($data = mysql_fetch_assoc($query_run));?> 
                        </select>
                       
                    </div>
                </div> 
                <br/>
                <div class="control-group">

                    <div class="controls">
                     <select id="selectError" data-rel="chosen" class="txt_cust_phn_no" name="txt_cust_phn_no" onchange="get_number();">
                            <option value="null">Select From Existing Contact Number</option>
                           <?php do { ?>
                            <option value="<?php echo $dataC['cust_phn'];?>"><?php echo $dataC['cust_phn'];?></option>
                            
                           <?php } while($dataC = mysql_fetch_assoc($queryC_run));?> 
                        </select>
                       
                    </div>
                </div>
                <?php } ?>
                </td>
       
       
    </tr>
    <tr>
        <td>Customer Contact No</td>
        <td class="center"> 
                   <div class="form-group has-success col-md-4">
                    
                    <input type="text" name="txt_phn" class="form-control customer_phn" id="inputSuccess1">
                </div>
                   
                </td>
       
       
    </tr>
       <tr>
        <td>Customer Address</td>
        <td class="center"> 
                   <input type="text" name="txt_cust_proof" class="form-control customer_proof" id="inputSuccess1">
                     <!-- <textarea name="txt_cust_proof" class="customer_proof" id="inputSuccess1"></textarea> -->
                    
                   
                </td>
       
       
    </tr>
   
       
     <tr>
        <td>Purchase Amount </td>
        <td class="center"> 
                   <div class="form-group has-success col-md-4">
                    
                    <input type="text" name="txt_prchs_amnt" class="form-control p_amount" id="inputSuccess1" onkeypress="return onlyNumbers(this.value);" onkeyup="NumToWord(this.value,'divDisplayWords');" onblur="customer_wallet()">
                </div>
                  <div id="divDisplayWords" style="font-size: 13; color: Teal; font-family: Arial;">
    </div>  <div class="checkbox" id="credit1" style="display:none;">
                    <label>
                        <input type="checkbox" value="0" name="txt_credit" id="cust_credit" onclick="credit_click();">
                       Purchase on Credit
                    </label>
                </div>
                <div class="checkbox" id="credit2" style="display:block;">
                    <label>
                        <input type="checkbox" value="0" name="txt_credit2" id="cust_credit2" onclick="credit_click2();">
                       Purchase on Credit
                    </label>
                </div>
                </td>
       
       
    </tr>
     <tr>
        <td>Purchase Date</td>
        <td class="center"> 
                   <div class="form-group has-success col-md-4">
                    
                    <input type="text" name="txt_prchs_date" class="form-control p_date" id="inputSuccess12">
                </div>
                   
                </td>
       
       
    </tr>
     <tr>
        <td>Number of Heads</td>
        <td class="center"> 
                   <div class="form-group has-success col-md-4">
                    
                    <input type="text" name="txt_heads" class="form-control t_number" id="inputSuccess1" onkeypress="return onlyNumbers(this.value);" onkeyup="head_number();">
                </div>
                   
                </td>
       
       
    </tr>
     <tr class="head_rows">
       
    </tr>
     <tr>
        <td>CGST %</td>
        <td class="center"> 
    <div class="control-group">
                    

                    <div class="controls">
                     <select id="selectError" data-rel="chosen" class="txt_cgst" name="txt_cgst">
                            <option value="0">0 %</option>
                           <option value="2.5">2.5 %</option>
                           <option value="3">3 %</option>
                           <option value="6">6 %</option>
                           <option value="9">9 %</option>
                           <option value="12">12 %</option>
                        </select><span id="cgst_amt" style="color:#FF0000; text-align:right;"></span>
                       
                    </div>
                </div> 
               
                </td>
       
       
    </tr>
    <tr>
        <td>SGST %</td>
        <td class="center"> 
    <div class="control-group">
                    

                    <div class="controls">
                     <select id="selectError" data-rel="chosen" class="txt_sgst" name="txt_sgst">
                            <option value="0">0 %</option>
                           <option value="2.5">2.5 %</option>
                           <option value="3">3 %</option>
                           <option value="6">6 %</option>
                           <option value="9">9 %</option>
                           <option value="12">12 %</option>
                        </select><span id="sgst_amt" style="color:#FF0000; text-align:right;"></span>
                       
                    </div>
                </div> 
                
                </td>
       
       
    </tr>
    <tr>
        <td>IGST %</td>
        <td class="center"> 
    <div class="control-group">
                    

                    <div class="controls">
                     <select id="selectError" data-rel="chosen" class="txt_igst" name="txt_igst">
                            <option value="0">0 %</option>
                           <option value="2.5">2.5 %</option>
                           <option value="3">3 %</option>
                           <option value="6">6 %</option>
                           <option value="9">9 %</option>
                           <option value="18">18 %</option>
                        </select><span id="igst_amt" style="color:#FF0000; text-align:right;"></span>
                       
                    </div>
                </div> 
                
                </td>
       
       
    </tr>
     <tr>
        <td>Handling Charges</td>
        <td class="center"> 
        <div class="form-group has-success col-md-4">
                    <label class="radio-inline">
                    <input type="radio" value="<?php echo $data_hc['sc_charge'];?>" class="hand_chrg" id="inlineRadio1" name="txt_hndlmg_chrg" onclick="calculate_price(<?php echo $data_hc['sc_charge'];?>);"> Service Tax (Rs. <?php echo $data_hc['sc_charge'];?>)<br/>
                    <input type="radio" value="<?php echo $data_hc['handling_sc'];?>" class="hand_chrg" id="inlineRadio1" name="txt_hndlmg_chrg" onclick="calculate_price(<?php echo $data_hc['handling_sc'];?>);"> Hamdling / SC (Rs. <?php echo $data_hc['handling_sc'];?>)<br/>
                    <input type="radio" value="<?php echo $data_hc['dlvry_sc'];?>" class="hand_chrg" id="inlineRadio1" name="txt_hndlmg_chrg" onclick="calculate_price(<?php echo $data_hc['dlvry_sc'];?>);"> Delivery / SC (Rs. <?php echo $data_hc['dlvry_sc'];?>)<br/>
                    <input type="radio" value="<?php echo $data_hc['air_sc_charge'];?>" class="hand_chrg" id="inlineRadio1" name="txt_hndlmg_chrg" onclick="calculate_price(<?php echo $data_hc['air_sc_charge'];?>);"> Airlines Service Tax (Rs. <?php echo $data_hc['air_sc_charge'];?>)<br/>
                    <input type="radio" value="<?php echo $data_hc['air_handling_sc'];?>" class="hand_chrg" id="inlineRadio1" name="txt_hndlmg_chrg" onclick="calculate_price(<?php echo $data_hc['air_handling_sc'];?>);"> Airlines Hamdling / SC (Rs. <?php echo $data_hc['air_handling_sc'];?>)<br/>
                    <input type="radio" value="<?php echo $data_hc['air_dlvry_sc'];?>" class="hand_chrg" id="inlineRadio1" name="txt_hndlmg_chrg" onclick="calculate_price(<?php echo $data_hc['air_dlvry_sc'];?>);"> Airlines Delivery / SC (Rs. <?php echo $data_hc['air_dlvry_sc'];?>)
                </label>
                   
                </div>
                  
                   
                </td>
       
       
    </tr>
    
   
     <tr>
        <td>Total GST Amt.</td>
        <td class="center"> 
                   <div class="form-group has-success col-md-4">
                    
                    <input type="text" name="txt_govt_amnt" class="form-control govt_pay" id="inputSuccess1" value="">
                </div>
                  <!-- <div id="profit" style="display:none; color:red; font-size:16px;">Your Profit : Rs <span id="profit_amnt"></span> /-</div> --> 
                </td>
       
       
    </tr>
 <tr>
        <td>Selling Price</td>
        <td class="center"> 
                   <div class="form-group has-success col-md-4">
                    
                    <input type="text" name="txt_sell_price" class="form-control sell_price" id="inputSuccess1" value="">
                </div>
                   
                </td>
       
       
    </tr>
     <tr>
        <td></td>
        <td class="center">
        <input type="hidden" name="txt_head_count" id="head_count" value="">
        <input type="hidden" name="txt_head_count1" id="head_count1" value="">
        <input type="hidden" name="txt_rhead_count" id="rhead_count" value="">
        <input type="hidden" name="txt_credit_count" id="txt_credit_count" value="no">
        <input type="hidden" name="existing_cust_id" id="existing_cust_id" value="">
        <input type="hidden" name="txt_total_profit" id="txt_total_profit" value="">
        <input type="hidden" name="txt_rp_amount" id="txt_rp_amount" value="0">
        <input type="hidden" name="txt_rservice_tax" id="txt_rservice_tax" value="0">
        <input type="hidden" name="customer_wallet_amount" id="customer_wallet_amount" value="">
        <input type="hidden" name="txt_cgst_amt" id="txt_cgst_amt" value="0">
        <input type="hidden" name="txt_sgst_amt" id="txt_sgst_amt" value="0">
        <input type="hidden" name="txt_igst_amt" id="txt_igst_amt" value="0">
        <input type="hidden" name="txt_cgst_amt1" id="txt_cgst_amt1" value="0">
        <input type="hidden" name="txt_sgst_amt1" id="txt_sgst_amt1" value="0">
        <input type="hidden" name="txt_igst_amt1" id="txt_igst_amt1" value="0">
        <input type="hidden" name="b_submit" value="submit"/>
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

