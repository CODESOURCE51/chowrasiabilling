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
$c_id = $_REQUEST['pay_id'];
$cust = "SELECT * FROM td_customer WHERE cus_id=".$_GET['pay_id'];
$cust_query = mysql_query($cust,$con) or die(mysql_error());
$cust_data = mysql_fetch_assoc($cust_query);

if(isset($_POST['b_submit']) && $_POST['b_submit'] == 'submit') {
$credit = $_POST['txt_cust_credit'];
$payment = $_POST['txt_payment'];
$credit1 = $credit - $payment;
$date = date('d-m-Y');
$s = 'UPDATE td_customer SET credit_bal="'.$credit1.'" WHERE cus_id='.$_GET['pay_id'];
$q = mysql_query($s, $con) or die(mysql_error());
$sql = 'INSERT INTO td_customer_payment(c_id,pay_amount,pdate) VALUES("'.$_GET['pay_id'].'","'.$payment.'","'.$date.'")';
$query = mysql_query($sql,$con) or die(mysql_error());
$s = 'UPDATE td_purchase SET credit_taken="'.$credit1.'" WHERE customer_id="'.$cust_data['cust_id'].'" AND purchase_id='.$_GET['pchase_id'] ;
$q = mysql_query($s, $con) or die(mysql_error());

exit('<script>location.replace("view_customer_details.php")</script>');
}
?>
<div>
    <ul class="breadcrumb">
        <li>
            <a href="#">Home</a>
        </li>
        <li>
            <a href="#">Payment</a>
        </li>
    </ul>
</div>

<div class="row">
    <div class="box col-md-12">
	<div class="box-inner">
            <div class="box-header well" data-original-title="">
                <h2><?php echo $bill_data['ticket_type'];?> Ticket Cancel details &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </h2>

                <div class="box-icon">
                    <a href="#" class="btn btn-setting btn-round btn-default"><i
                            class="glyphicon glyphicon-cog"></i></a>
                    <a href="#" class="btn btn-minimize btn-round btn-default"><i
                            class="glyphicon glyphicon-chevron-up"></i></a>
                    <a href="#" class="btn btn-close btn-round btn-default"><i
                            class="glyphicon glyphicon-remove"></i></a>
                </div>
            </div>
           
    </div>
        <div class="box-inner">
            <div class="box-header well" data-original-title="">
                <h2><i class="glyphicon glyphicon-edit"></i>Insert Payment details</h2>

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
        <td>Customer Name</td>
        <td class="center"> <div class="form-group has-success col-md-4">
                    
                    <input type="text" name="txt_cust_name" class="form-control onlchrg" id="inputSuccess1" value="<?php echo $cust_data['cust_name'];?>" readonly>
                </div></td>
       
       
    </tr>
      <tr>
        <td>Payment Due</td>
        <td class="center"> <div class="form-group has-success col-md-4">
                    
                    <input type="text" name="txt_cust_credit" class="form-control onlchrg" value="<?php echo $cust_data['credit_bal'];?>" id="inputSuccess1" readonly>
                </div></td>
       
       
    </tr>
    
    <tr>
        <td>Payment Amount</td>
        <td class="center"> <div class="form-group has-success col-md-4">
                    
                    <input type="text" name="txt_payment" class="form-control onlchrg" id="inputSuccess1">
                </div></td>
       
       
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

