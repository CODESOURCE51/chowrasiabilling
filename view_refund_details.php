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
$query = 'SELECT * FROM td_refund ORDER BY rid ASC';
$query_run = mysql_query($query, $con) or die(mysql_error());
$data = mysql_fetch_assoc($query_run);
$totalRows_rsData = mysql_num_rows($query_run);
?>
    <div>
        <ul class="breadcrumb">
            <li>
                <a href="#">Home</a>
            </li>
            <li>
                <a href="#">Total Refund Details</a>
            </li>
        </ul>
    </div>

    <div class="row">
    <div class="box col-md-12">
    <div class="box-inner">
    <div class="box-header well" data-original-title="">
        

        <div class="box-icon">
            <a href="#" class="btn btn-setting btn-round btn-default"><i class="glyphicon glyphicon-cog"></i></a>
            <a href="#" class="btn btn-minimize btn-round btn-default"><i
                    class="glyphicon glyphicon-chevron-up"></i></a>
            <a href="#" class="btn btn-close btn-round btn-default"><i class="glyphicon glyphicon-remove"></i></a>
        </div>
    </div>
    <div class="box-content">
   
    <table class="table table-striped table-bordered bootstrap-datatable datatable responsive">
    <thead>
    <tr>
        <th>Customer Id</th>
        <th>Cr Id</th>
        <th>Customer Name</th>
        <th>Contact Number</th>
        <th>Ticket type</th>
        <th>Bank Account</th>
        <th>Booking Amount</th>
        <th>Booking Date</th>
        <th>Sell Price</th>
         <th>Refund Price</th>
          <th>PNR No</th>
           <th>Refund PNR No</th>
          <th>Refund Date</th>
        <?php if($_SESSION['user_type'] == 'Super') {?>
        <th>Actions</th>
        <?php } ?>
    </tr>
    </thead>
    <tbody>
    <?php if($totalRows_rsData > 0) { ?>
    <?php do { 
       $purchase = 'SELECT * FROM td_purchase WHERE refund <> 1 AND purchase_id="'.$data['pid'].'" AND customer_id != ""';
        $query_purchase = mysql_query($purchase, $con) or die(mysql_error());
        $purchase_data = mysql_fetch_assoc($query_purchase);

        $bnk_name = 'SELECT * FROM td_bank_details WHERE bnk_id ='.$data['bank_id'];
        $query_bnk = mysql_query($bnk_name, $con) or die(mysql_error());
        $bnk_data = mysql_fetch_assoc($query_bnk);?>
    <tr>
        <td><a href="refund_billing.php?b_id=<?php echo $data['rid'];?>" target="_blank"><?php echo $purchase_data['customer_id'];?></a></td>
        <td class="center"><?php echo $purchase_data['rid'];?></td>
        <td class="center"><?php echo $purchase_data['customer_name'];?></td>
        <td class="center"><?php echo $purchase_data['customer_phn'];?></td>
       <td class="center"><?php echo $purchase_data['ticket_type'];?></td>
       <td><?php echo $bnk_data['bank_name'];?></td>
        <td class="center"><?php echo $purchase_data['p_amount'];?></td>
        <td class="center"><?php echo $purchase_data['p_date'];?></td>
       <td class="center"><?php echo $purchase_data['sell_price'];?></td>
       <td class="center"><?php echo $data['refund_amount'];?></td>
       <td class="center"><?php echo $purchase_data['pnr_no'];?></td>
       <td class="center"><?php echo $purchase_data['return_pnr_no'];?></td>
       <td class="center"><?php echo $data['return_date'];?></td>
       <?php if($_SESSION['user_type'] == 'Super') {?>
        <td class="center">
            
            
             <a class="btn btn-info" href="general_report.php?purchase_id=<?php echo $data['pid'];?>">
                <i class="glyphicon glyphicon-edit icon-white"></i>
                Report
            </a>
            <a class="btn btn-danger confirm" href="delete_refund_details.php?refund_id=<?php echo $data['rid'];?>">
                <i class="glyphicon glyphicon-trash icon-white"></i>
                Delete
            </a>
        </td>
        <?php } ?>
    </tr>
    <?php } while($data = mysql_fetch_assoc($query_run)); }?>
    
    </tbody>
    </table>
    </div>
    </div>
    </div>
    <!--/span-->

    </div><!--/row-->


<?php require('footer.php'); ?>