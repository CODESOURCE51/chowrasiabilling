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
	
	//print_r($_POST['page']);
	$bank = $_POST['txt_bnkname'];
	$holder = $_POST['txt_acc_name'];
    $number = $_POST['txt_acc_number'];
    $amount = $_POST['txt_amnt'];
	$sql = 'INSERT INTO td_bank_details(bank_name,holder_name,acc_number,amount,available_bal) VALUES("'.$bank.'","'.$holder.'","'.$number.'","'.$amount.'","'.$amount.'")';
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
            <a href="#">Bank Details</a>
        </li>
    </ul>
</div>

<div class="row">
    <div class="box col-md-12">
        <div class="box-inner">
            <div class="box-header well" data-original-title="">
                <h2><i class="glyphicon glyphicon-edit"></i>Insert Bank details</h2>

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
   <form action="" method="post" name="form1" enctype="multipart/form-data" onSubmit="return validate_bank()">
    <div class="box-content">
   
    <table class="table table-striped table-bordered bootstrap-datatable responsive">
    <thead>
   
    </thead>
    <tbody>
     
    <tr>
        <td>Bank Name</td>
        <td class="center"> <div class="form-group has-success col-md-4">
                    
                    <input type="text" name="txt_bnkname" class="form-control bnkname" id="inputSuccess1">
                </div></td>
       
       
    </tr>
     <tr>
        <td>Account Holder Name</td>
        <td class="center"> 
                   <div class="form-group has-success col-md-4">
                    
                    <input type="text" name="txt_acc_name" class="form-control acc_name" id="inputSuccess1">
                </div>
                   
                </td>
       
       
    </tr>
       <tr>
        <td>Account Number</td>
        <td class="center"> 
                   <div class="form-group has-success col-md-4">
                    
                    <input type="text" name="txt_acc_number" class="form-control acc_number" id="inputSuccess1">
                </div>
                   
                </td>
       
       
    </tr>
    </tr>
       <tr>
        <td>Left Amount</td>
        <td class="center"> 
                   <div class="form-group has-success col-md-4">
                    
                    <input type="text" name="txt_amnt" class="form-control amnt" id="inputSuccess1">
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
        <td class="center"><a href="view_bank_details.php" class="btn btn-warning">View Bank Details</a></td>
       
       
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

