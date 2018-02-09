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

if(isset($_POST['search_two']) && $_POST['search_two'] == 2) {
    $date1 = date('d/m/y',strtotime($_POST['txt_date1']));
    $date2 = date('d/m/y',strtotime($_POST['txt_date2']));
	$date11 = date('d/m/Y',strtotime($_POST['txt_date1']));
    $date22 = date('d/m/Y',strtotime($_POST['txt_date2']));

$sql1 = 'SELECT SUM(cgst_amt) AS Camount, SUM(sgst_amt) AS Sprice, SUM(igst_amt) AS iprice FROM td_purchase WHERE p_date BETWEEN "'.$date1.'" AND "'.$date2.'"'; 
$query = mysql_query($sql1, $con) or die(mysql_error());  
$fetch_data = mysql_fetch_assoc($query); 
$total_today = mysql_num_rows($query);

$sql11 = 'SELECT SUM(cgst_amt1) AS Camount, SUM(sgst_amt1) AS Sprice, SUM(igst_amt1) AS iprice FROM td_purchase WHERE return_date BETWEEN "'.$date11.'" AND "'.$date22.'"'; 
$query11 = mysql_query($sql11, $con) or die(mysql_error());  
$fetch_data11 = mysql_fetch_assoc($query11); 
$total_today11 = mysql_num_rows($query11);

$sql2 = 'SELECT * FROM td_purchase WHERE p_date BETWEEN "'.$date1.'" AND "'.$date2.'"'; 
$query2 = mysql_query($sql2, $con) or die(mysql_error());  
$fetch_data2 = mysql_fetch_assoc($query2); 
$total_today2 = mysql_num_rows($query2);

$sql3 = 'SELECT * FROM td_purchase WHERE return_date BETWEEN "'.$date11.'" AND "'.$date22.'"'; 
$query3 = mysql_query($sql3, $con) or die(mysql_error());  
$fetch_data3 = mysql_fetch_assoc($query3); 
$total_today3 = mysql_num_rows($query3);
}
?>
    <div>
        <ul class="breadcrumb">
            <li>
                <a href="#">Home</a>
            </li>
            <li>
                <a href="#">Total GST Report</a>
            </li>
           <div style="float:right;"> <i class="glyphicon glyphicon-print"></i><a href="javascript:void(0);" onclick="print_copy()">Print Here</a></div>
        </ul>
    </div>
    
    <form name="first_search" action="" method="post" enctype="multipart/form-data">
    <div class="row">
    
   
    <table class="table table-striped table-bordered responsive">
    <thead>
    <tr>
       
        
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
        <div class="box col-md-12">
        <?php if(!empty($total_today)) { ?>
            <div class="box-inner">
                <div data-original-title="" class="box-header well">
                    <h2><i class="glyphicon glyphicon-th"></i> UP Journey GST Details</h2>

                    <div class="box-icon">
                        
                        <a class="btn btn-minimize btn-round btn-default" href="#"><i class="glyphicon glyphicon-chevron-up"></i></a>
                        <a class="btn btn-close btn-round btn-default" href="#"><i class="glyphicon glyphicon-remove"></i></a>
                    </div>
                </div>
                <div class="box-content">
   
    <table class="table table-striped table-bordered bootstrap-datatable datatable responsive">
    <thead>
    <tr>
    <th>Date</th>
        <th>CGST %</th>
        <th>CGST Amount</th>
        <th>SGAT %</th>
        <th>SGST Amount</th>
        <th>IGST %</th>
        <th>IGST Account</th>
        
    </tr>
    </thead>
    <tbody>
    <?php if($total_today2 > 0) { ?>
    <?php do { ?>
    <tr>
   
       
       <td class="center"><?php echo $fetch_data2['p_date'];?></td>
       <td class="center"><?php echo $fetch_data2['cgst_per'];?></td>
       <td class="center"><?php echo $fetch_data2['cgst_amt'];?></td>
       <td class="center"><?php echo $fetch_data2['sgst_per'];?></td>
        <td class="center"><?php echo $fetch_data2['sgst_amt'];?></td>

        <td class="center"><?php echo $fetch_data2['igst_per'];?></td>
       <td class="center"><?php echo $fetch_data2['igst_amt'];?></td>
       
       
    </tr>
    <?php } while($fetch_data2 = mysql_fetch_assoc($query2)); }?>
    
    </tbody>
    </table>
    </div>
            </div>
      <h2 style="padding:5px 10px 5px 10px; border:1px solid #000000; font-size:16px; color:#FF0000;"> Total CGST Amt : Rs. <?php echo $fetch_data['Camount'];?> &nbsp;&nbsp; Total SGST Amt : Rs. <?php echo $fetch_data['Sprice'];?>  &nbsp;&nbsp; Total IGST Amt : Rs. <?php echo $fetch_data['iprice'];?> </h2>  
        </div>
        <!--/span-->

       
        <?php } else echo 'No Data Found';?>
        <!--/span-->

    </div>
    <div class="row">
        <div class="box col-md-12">
        <?php if(!empty($total_today)) { ?>
            <div class="box-inner">
                <div data-original-title="" class="box-header well">
                    <h2><i class="glyphicon glyphicon-th"></i> Down Journey GST Details</h2>

                    <div class="box-icon">
                        
                        <a class="btn btn-minimize btn-round btn-default" href="#"><i class="glyphicon glyphicon-chevron-up"></i></a>
                        <a class="btn btn-close btn-round btn-default" href="#"><i class="glyphicon glyphicon-remove"></i></a>
                    </div>
                </div>
                <div class="box-content">
   
    <table class="table table-striped table-bordered bootstrap-datatable datatable responsive">
    <thead>
    <tr>
    <th>Date</th>
        <th>CGST %</th>
        <th>CGST Amount</th>
        <th>SGAT %</th>
        <th>SGST Amount</th>
        <th>IGST %</th>
        <th>IGST Account</th>
        
    </tr>
    </thead>
    <tbody>
    <?php if($total_today2 > 0) { ?>
    <?php do { ?>
    <tr>
   
       
       <td class="center"><?php echo $fetch_data3['return_date'];?></td>
       <td class="center"><?php echo $fetch_data3['cgst_per1'];?></td>
       <td class="center"><?php echo $fetch_data3['cgst_amt1'];?></td>
       <td class="center"><?php echo $fetch_data3['sgst_per1'];?></td>
        <td class="center"><?php echo $fetch_data3['sgst_amt1'];?></td>

        <td class="center"><?php echo $fetch_data3['igst_per1'];?></td>
       <td class="center"><?php echo $fetch_data3['igst_amt1'];?></td>
       
       
    </tr>
    <?php } while($fetch_data2 = mysql_fetch_assoc($query2)); }?>
    
    </tbody>
    </table>
    </div>
            </div>
       <h2 style="padding:5px 10px 5px 10px; border:1px solid #000000; font-size:16px; color:#FF0000;"> Total CGST Amt : Rs. <?php echo $fetch_data11['Camount'];?> &nbsp;&nbsp; Total SGST Amt : Rs. <?php echo $fetch_data11['Sprice'];?>  &nbsp;&nbsp; Total IGST Amt : Rs. <?php echo $fetch_data11['iprice'];?>  </h2>   
        </div>
        <!--/span-->

       
        <?php } else echo 'No Data Found';?>
        <!--/span-->

    </div>
</div>

<?php require('footer.php'); ?>