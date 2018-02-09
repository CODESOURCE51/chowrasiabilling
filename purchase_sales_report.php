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
$query = 'SELECT * FROM td_purchase WHERE refund = 1 ORDER BY purchase_id ASC';
$query_run = mysql_query($query, $con) or die(mysql_error());
$data = mysql_fetch_assoc($query_run);
$totalRows_rsData = mysql_num_rows($query_run);
$bank = 'SELECT * FROM td_bank_details ORDER BY bnk_id ASC';
$query_bank = mysql_query($bank, $con) or die(mysql_error());
$bank_data = mysql_fetch_assoc($query_bank);
$totalRows_rsBank = mysql_num_rows($query_bank);
$bank2 = 'SELECT * FROM td_bank_details ORDER BY bnk_id ASC';
$query_bank2 = mysql_query($bank2, $con) or die(mysql_error());
$bank_data2 = mysql_fetch_assoc($query_bank2);
$totalRows_rsBank2 = mysql_num_rows($query_bank2);
if(isset($_POST['search_one']) && $_POST['search_one'] == 1) {
    $date = date('d/m/y');
    $bank = $_POST['txt_bank1'];

$sql1 = 'SELECT SUM(p_amount) AS Samount, SUM(sell_price) AS Sprice, SUM(handling_charge) AS Shandling, SUM(govt_price) AS Sgovt, SUM(profit) AS Sprofit FROM td_purchase WHERE p_date="'.$date.'" AND bank_name="'.$bank.'"'; 
$query = mysql_query($sql1, $con) or die(mysql_error());  
$fetch_data = mysql_fetch_assoc($query); 
$total_today = mysql_num_rows($query);

$sql2 = 'SELECT SUM(rf_charge) AS Scancellation, SUM(refund_amount) AS Srefund, SUM(refund_handling_charge) AS Srefhand, SUM(gtax) AS Sgtax, SUM(hand_profit) AS Shand_profit FROM td_refund WHERE return_date="'.$date.'" AND bank_id="'.$bank.'"'; 
$query2 = mysql_query($sql2, $con) or die(mysql_error());  
$fetch_data2 = mysql_fetch_assoc($query2); 
$total_today2 = mysql_num_rows($query2);
}
if(isset($_POST['search_two']) && $_POST['search_two'] == 2) {
    $date1 = date('d/m/y',strtotime($_POST['txt_date1'])).'<br/>';
    $date2 = date('d/m/y',strtotime($_POST['txt_date2']));
    $bank = $_POST['txt_bank2'];

$sql1 = 'SELECT SUM(p_amount) AS Samount, SUM(sell_price) AS Sprice, SUM(handling_charge) AS Shandling, SUM(govt_price) AS Sgovt, SUM(profit) AS Sprofit FROM td_purchase WHERE p_date BETWEEN "'.$date1.'" AND "'.$date2.'" AND bank_name="'.$bank.'"'; 
$query = mysql_query($sql1, $con) or die(mysql_error());  
$fetch_data = mysql_fetch_assoc($query); 
$total_today = mysql_num_rows($query);

$sql2 = 'SELECT SUM(rf_charge) AS Scancellation, SUM(refund_amount) AS Srefund, SUM(refund_handling_charge) AS Srefhand, SUM(gtax) AS Sgtax, SUM(hand_profit) AS Shand_profit FROM td_refund WHERE return_date BETWEEN "'.$date1.'" AND "'.$date2.'" AND bank_id="'.$bank.'"'; 
$query2 = mysql_query($sql2, $con) or die(mysql_error());  
$fetch_data2 = mysql_fetch_assoc($query2); 
$total_today2 = mysql_num_rows($query2);
}
?>
    <div>
        <ul class="breadcrumb">
            <li>
                <a href="#">Home</a>
            </li>
            <li>
                <a href="#">Total Purchase & Sales Report</a>
            </li>
           <div style="float:right;"> <i class="glyphicon glyphicon-print"></i><a href="javascript:void(0);" onclick="print_copy()">Print Here</a></div>
        </ul>
    </div>
    <form name="first_search" action="" method="post" enctype="multipart/form-data">
 <div class="row">
    
   
    <table class="table table-striped table-bordered responsive">
    <thead>
    <tr>
       
        <th><div class="control-group">
                    <div class="control-group">
                    

                    <div class="controls">
                     <select id="selectError" data-rel="chosen" name="txt_bank1">
                     <?php do { ?>
                            <option value="<?php echo $bank_data['bnk_id'];?>"><?php echo $bank_data['bank_name'];?></option>
                     <?php } while($bank_data = mysql_fetch_assoc($query_bank));?>
                           
                        </select>
                       
                    </div>
                </div>
                    </div>
                </th>
                 <th><span class="label-success label label-default">Today</span></th>
                <th><input type="hidden" name="search_one" value="1"><button class="btn btn-default" type="submit">Search Details</button></th>
       
    </tr>
    </thead>
   
    </table>
    
    <!--/span-->

    </div>
    </form>
    <form name="first_search" action="" method="post" enctype="multipart/form-data">
    <div class="row">
    
   
    <table class="table table-striped table-bordered responsive">
    <thead>
    <tr>
       
        <th><div class="control-group">
                    <div class="control-group">
                    

                    <div class="controls">
                     <select id="selectError" data-rel="chosen" name="txt_bank2">
                     
                            <?php do { ?>
                            <option value="<?php echo $bank_data2['bnk_id'];?>"><?php echo $bank_data2['bank_name'];?></option>
                     <?php } while($bank_data2 = mysql_fetch_assoc($query_bank2));?>
                        </select>
                       
                    </div>
                </div>
                    </div>
                </th>
                 <th>From Date : <input type="text" id="datepicker" name="txt_date1"></th>
        <th>To Date : <input type="text" id="datepicker2" name="txt_date2"></th>
       
        
        <th><input type="hidden" name="search_two" value="2"><button class="btn btn-default" type="submit">Search Details</button></th>
    </tr>
    </thead>
   
    </table>
    
    <!--/span-->

    </div>
    </form>
    <div id="print_report">
   <div class="row">
        <div class="box col-md-6">
        <?php if(!empty($total_today)) { ?>
            <div class="box-inner">
                <div data-original-title="" class="box-header well">
                    <h2><i class="glyphicon glyphicon-th"></i> Purchase Details</h2>

                    <div class="box-icon">
                        
                        <a class="btn btn-minimize btn-round btn-default" href="#"><i class="glyphicon glyphicon-chevron-up"></i></a>
                        <a class="btn btn-close btn-round btn-default" href="#"><i class="glyphicon glyphicon-remove"></i></a>
                    </div>
                </div>
                <div class="box-content">
                    <div class="row">
                        <div class="col-md-4"><h6>Total Purchase</h6></div>
                        <div class="col-md-4"><h6></h6></div>
                        <div class="col-md-4"><h6>Rs. <?php if(!empty($fetch_data['Samount'])) echo $fetch_data['Samount']; else echo ' 0';?></h6></div>
                    </div>
                    <div class="row">
                        <div class="col-md-4"><h6>Total Service Tax</h6></div>
                        <div class="col-md-4"><h6></h6></div>
                        <div class="col-md-4"><h6>Rs. <?php if(!empty($fetch_data['Sgovt'])) echo $fetch_data['Sgovt']; else echo ' 0';?></h6></div>
                    </div>
                    <div class="row">
                        <div class="col-md-4"><h6>Total Handling Charge</h6></div>
                        <div class="col-md-4"><h6></h6></div>
                        <div class="col-md-4"><h6>Rs. <?php if(!empty($fetch_data['Shandling'])) echo $fetch_data['Shandling']; else echo ' 0';?></h6></div>
                    </div>
                    <div class="row">
                        <div class="col-md-4"><h6>Total Profit</h6></div>
                        <div class="col-md-4"><h6></h6></div>
                        <div class="col-md-4"><h6>Rs. <?php if(!empty($fetch_data['Sprofit'])) echo $fetch_data['Sprofit']; else echo ' 0';?></h6></div>
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
                        
                        <a class="btn btn-minimize btn-round btn-default" href="#"><i class="glyphicon glyphicon-chevron-up"></i></a>
                        <a class="btn btn-close btn-round btn-default" href="#"><i class="glyphicon glyphicon-remove"></i></a>
                    </div>
                </div>
               <div class="box-content">
                    <div class="row">
                        <div class="col-md-4"><h6>Total Sales Price</h6></div>
                        <div class="col-md-4"><h6></h6></div>
                        <div class="col-md-4"><h6>Rs. <?php if(!empty($fetch_data['Sprice'])) echo $fetch_data['Sprice']; else echo ' 0';?></h6></div>
                    </div>
                    <div class="row">
                        <div class="col-md-4"><h6>Total Refund Amount</h6></div>
                        <div class="col-md-4"><h6></h6></div>
                        <div class="col-md-4"><h6>Rs. <?php if(!empty($fetch_data2['Srefund'])) echo $fetch_data2['Srefund']; else echo ' 0';?></h6></div>
                    </div>
                    <div class="row">
                        <div class="col-md-4"><h6>Total Cancellation Charge</h6></div>
                        <div class="col-md-4"><h6></h6></div>
                        <div class="col-md-4"><h6>Rs. <?php if(!empty($fetch_data2['Scancellation'])) echo $fetch_data2['Scancellation']; else echo ' 0';?></h6></div>
                    </div>
                    <div class="row">
                        <div class="col-md-4"><h6>Total Cancellation Govt. Tax</h6></div>
                        <div class="col-md-4"><h6></h6></div>
                        <div class="col-md-4"><h6>Rs. <?php if(!empty($fetch_data2['Sgtax'])) echo round($fetch_data2['Sgtax'],2); else echo ' 0';?></h6></div>
                    </div>

                     <div class="row">
                        <div class="col-md-4"><h6>Total Refund Handling Charge</h6></div>
                        <div class="col-md-4"><h6></h6></div>
                        <div class="col-md-4"><h6>Rs. <?php if(!empty($fetch_data2['Srefhand'])) echo $fetch_data2['Srefhand']; else echo ' 0';?></h6></div>
                    </div>
                    <div class="row">
                        <div class="col-md-4"><h6>Total Profit From Refund</h6></div>
                        <div class="col-md-4"><h6></h6></div>
                        <div class="col-md-4"><h6>Rs. <?php if(!empty($fetch_data2['Shand_profit'])) echo $fetch_data2['Shand_profit']; else echo ' 0';?></h6></div>
                    </div>
                    
                </div>
            </div>
        </div>
        <div class="box col-md-6 col-md-offset-6">

            <div class="box-inner">
                <div data-original-title="" class="box-header well">
                    <h2><i class="glyphicon glyphicon-th"></i> Net Profit Calculation</h2>

                    <div class="box-icon">
                        
                        <a class="btn btn-minimize btn-round btn-default" href="#"><i class="glyphicon glyphicon-chevron-up"></i></a>
                        <a class="btn btn-close btn-round btn-default" href="#"><i class="glyphicon glyphicon-remove"></i></a>
                    </div>
                </div>
                <div class="box-content">
                    <div class="row">
                        <div class="col-md-4"><h6>Gross Profit Done</h6></div>
                        <div class="col-md-4"><h6></h6></div>
                        <div class="col-md-4"><h6>Rs. <?php if(!empty($fetch_data['Sprofit']) || !empty($fetch_data2['Shand_profit'])) echo $fetch_data['Sprofit'] + $fetch_data2['Shand_profit']; else echo ' 0';?></h6></div>
                    </div>
                    
                </div>
            </div>
        </div>
        <?php } else echo 'No Data Found';?>
        <!--/span-->

    </div>
</div>

<?php require('footer.php'); ?>