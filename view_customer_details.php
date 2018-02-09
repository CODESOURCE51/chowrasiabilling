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
$query = 'SELECT * FROM td_customer ORDER BY cus_id ASC';
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
                <a href="#">Customer Details</a>
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
        <th>Customer Name</th>
        <th>Contact Number</th>
        <th>Customer Address</th>
        <th>Customer GST No</th>
        <th>Wallet Amount</th>
        <th>Credit Amount </th>
        <th>Payment Done </th>
       <?php if($_SESSION['user_type'] == 'Super') {?> 
        <th>Actions</th>
        <?php } ?>
    </tr>
    </thead>
    <tbody>
    <?php if($totalRows_rsData > 0) { ?>
    <?php do { ?>
    <?php 
    $query1 = 'SELECT * FROM td_purchase WHERE customer_id="'.$data['cust_id'].'"';
	$query_run1 = mysql_query($query1, $con) or die(mysql_error());
	$data1 = mysql_fetch_assoc($query_run1);
	$s = 'UPDATE td_customer SET credit_bal="'.$data1['credit_taken'].'" WHERE cust_id="'.$data['cust_id'].'"';
    $q = mysql_query($s, $con) or die(mysql_error());
    $query2 = 'SELECT * FROM td_customer_payment WHERE c_id='.$data['cus_id'];
	$query_run2 = mysql_query($query2, $con) or die(mysql_error());
	$data2 = mysql_fetch_assoc($query_run2);
    ?>
    <tr>
        <td><?php echo $data['cust_name'];?></td>
        <td class="center"><?php echo $data['cust_phn'];?></td>
        <td class="center"><?php echo substr($data['cust_proof'],0,10);?></td>
        <td class="center"><?php echo $data['cust_gst'];?></td>
       <td class="center"><?php echo $data['cust_wallet'];?></td>
       <td class="center"><?php echo $data['credit_bal'];?><?php if($data['credit_bal'] > 0 && $data['credit_bal'] != '') { ?><br/><a href="payment.php?pay_id=<?php echo $data['cus_id'];?>&due=<?php echo $data['credit_bal'];?>&pchase_id=<?php echo $data1['purchase_id'];?>"><span class="label label-info">Pay</span></a><?php } ?></td>
       <td class="center"><?php do { echo 'Rs. '.$data2['pay_amount'].':Date -'.$data2['pdate'].'<br/>';}while($data2 = mysql_fetch_assoc($query_run2));?></td>
       <?php if($_SESSION['user_type'] == 'Super') {?>
        <td class="center">
            
            <a class="btn btn-info" href="edit_customer_details.php?customer_id=<?php echo $data['cus_id'];?>">
                <i class="glyphicon glyphicon-edit icon-white"></i>
                Edit
            </a>
            <a class="btn btn-danger confirm" href="delete_customer_details.php?customer_id=<?php echo $data['cus_id'];?>">
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