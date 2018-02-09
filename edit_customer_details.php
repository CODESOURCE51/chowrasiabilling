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
$query = 'SELECT * FROM td_customer WHERE cus_id='.$_REQUEST['customer_id'];
$query_run = mysql_query($query, $con) or die(mysql_error());
$data = mysql_fetch_assoc($query_run);
if(isset($_POST['b_submit']) && $_POST['b_submit'] == 'submit') {	
	//print_r($_POST['page']);
	$bank = $_POST['txt_cusname'];
	$holder = $_POST['txt_cont'];
    $number = $_POST['txt_id_proof'];
    $amount = $_POST['txt_wallet'];
	$sql = 'UPDATE td_customer SET cust_name="'.$bank.'",cust_phn="'.$holder.'",cust_proof="'.$number.'",cust_wallet="'.$amount.'",avail_bal="'.$amount.'",credit_bal=0 WHERE cus_id='.$_REQUEST['customer_id'];
	$query = mysql_query($sql,$con) or die(mysql_error());
// Run the move_uploaded_file() function here
if($query) {
    $msg = 'Updated Successfully';
}
}
?>
<div>
    <ul class="breadcrumb">
        <li>
            <a href="#">Home</a>
        </li>
        <li>
            <a href="#">Customer Edit</a>
        </li>
    </ul>
</div>

<div class="row">
    <div class="box col-md-12">
        <div class="box-inner">
            <div class="box-header well" data-original-title="">
                <h2><i class="glyphicon glyphicon-edit"></i>Edit Customer details</h2>

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
   <form action="" method="post" name="form1" enctype="multipart/form-data" onSubmit="return validate_customer_details()">
    <div class="box-content">
   
    <table class="table table-striped table-bordered bootstrap-datatable responsive">
    <thead>
   
    </thead>
    <tbody>
     
    <tr>
        <td>Customer Name</td>
        <td class="center"> <div class="form-group has-success col-md-4">
                    
                    <input type="text" name="txt_cusname" class="form-control cusname" id="inputSuccess1" value="<?php echo $data['cust_name'];?>">
                </div></td>
       
       
    </tr>
     <tr>
        <td>Contact Number</td>
        <td class="center"> 
                   <div class="form-group has-success col-md-4">
                    
                    <input type="text" name="txt_cont" class="form-control contc_num" id="inputSuccess1" value="<?php echo $data['cust_phn'];?>" onkeypress="return onlyNumbers(this.value);"> (Accepts only number)
                </div>
                   
                </td>
       
       
    </tr>
       <tr>
        <td>Identity Proof</td>
        <td class="center"> 
                   <div class="form-group has-success col-md-4">
                    
                    <input type="text" name="txt_id_proof" class="form-control id_proof" id="inputSuccess1" value="<?php echo $data['cust_proof'];?>">
                </div>
                   
                </td>
       
       
    </tr>
    </tr>
       <tr>
        <td>Customer Wallet</td>
        <td class="center"> 
                   <div class="form-group has-success col-md-4">
                    
                    <input type="text" name="txt_wallet" class="form-control wallet" id="inputSuccess1" value="<?php echo $data['cust_wallet'];?>">
                </div>
                   
                </td>
       
       
    </tr>
     <tr>
        <td></td>
        <td class="center"><input type="hidden" name="b_submit" value="submit"/>
              <button type="submit" class="btn btn-default">Submit</button><?php if(isset($msg)) { echo $msg;}?></td>
       
       
    </tr>
   <tr>
        <td></td>
        <td class="center"><a href="view_customer_details.php" class="btn btn-warning">View Customer Details</a></td>
       
       
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

