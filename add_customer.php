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
if(isset($_POST['b_submit']) && $_POST['b_submit'] == 'submit') {
function generate_random_password($length = 10) {
    $alphabets = range('A','Z');
    $numbers = range('0','9');
    $additional_characters = array('_','.');
    $final_array = array_merge($alphabets,$numbers,$additional_characters);
         
    $password = '';
  
    while($length--) {
      $key = array_rand($final_array);
      $password .= $final_array[$key];
    }
  
    return $password;
  }
$cid = generate_random_password(7) ;	
	//print_r($_POST['page']);
	$bank = $_POST['txt_cusname'];
	$holder = $_POST['txt_cont'];
    $number = mysql_real_escape_string($_POST['txt_id_proof']);
    $amount = $_POST['txt_wallet'];
	$cgstno = $_POST['txt_cust_gst'];
	$sql = 'INSERT INTO td_customer(cust_name,cust_phn,cust_proof,cust_gst,cust_wallet,cust_id,avail_bal,credit_bal) VALUES("'.$bank.'","'.$holder.'","'.$number.'","'.$cgstno.'","'.$amount.'","'.$cid.'","'.$amount.'",0)';
	$query = mysql_query($sql,$con) or die(mysql_error());
// Run the move_uploaded_file() function here

}
?>
<div>
    <ul class="breadcrumb">
        <li>
            <a href="#">Home</a>
        </li>
        <li>
            <a href="#">Customer Entry</a>
        </li>
    </ul>
</div>

<div class="row">
    <div class="box col-md-12">
        <div class="box-inner">
            <div class="box-header well" data-original-title="">
                <h2><i class="glyphicon glyphicon-edit"></i>Insert Customer details</h2>

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
   <form action="" method="post" name="form1c" enctype="multipart/form-data" onSubmit="return validate_customer_details()">
    <div class="box-content">
   
    <table class="table table-striped table-bordered bootstrap-datatable responsive">
    <thead>
   
    </thead>
    <tbody>
     
    <tr>
        <td>Customer Name</td>
        <td class="center"> <div class="form-group has-success col-md-4">
                    
                    <input type="text" name="txt_cusname" class="form-control cusname" id="inputSuccess1">
                </div></td>
       
       
    </tr>
     <tr>
        <td>Contact Number</td>
        <td class="center"> 
                   <div class="form-group has-success col-md-4">
                    
                    <input type="text" name="txt_cont" class="form-control contc_num" id="inputSuccess1" onkeypress="return onlyNumbers(this.value);"> (Accepts only number)
                </div>
                   
                </td>
       
       
    </tr>
       <tr>
        <td>Customer Address</td>
        <td class="center">
        <input type="text" name="txt_id_proof" class="form-control id_proof" id="inputSuccess1">
         <!-- <textarea name="txt_id_proof" class="id_proof" id="inputSuccess12"></textarea> --> 
                   
                   
                </td>
       
       
    </tr>
    <tr>
        <td>Customer GST No</td>
        <td class="center"> 
                   <div class="form-group has-success col-md-4">
                    
                    <input type="text" name="txt_cust_gst" class="form-control wallet" id="inputSuccess13">
                </div>
                   
                </td>
       
       
    </tr>
       <tr>
        <td>Customer Wallet</td>
        <td class="center"> 
                   <div class="form-group has-success col-md-4">
                    
                    <input type="text" name="txt_wallet" class="form-control wallet" id="inputSuccess13">
                </div>
                   
                </td>
       
       
    </tr>
     <tr>
        <td></td>
        <td class="center"><input type="hidden" name="b_submit" value="submit"/>
              <button type="submit" class="btn btn-default">Submit</button></td>
       
       
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

