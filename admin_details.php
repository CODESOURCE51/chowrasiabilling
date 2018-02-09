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
	$email = $_POST['txt_email'];
	$phn = $_POST['txt_number'];
    $con_phn = $_POST['txt_conf_number'];
    $type = $_POST['type'];
	$sql = 'INSERT INTO td_admin_info(email,phn,conf_phn,type) VALUES("'.$email.'","'.$phn.'","'.$con_phn.'","'.$type.'")';
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
            <a href="#">Admin Personal Info</a>
        </li>
    </ul>
</div>

<div class="row">
    <div class="box col-md-12">
        <div class="box-inner">
            <div class="box-header well" data-original-title="">
                <h2><i class="glyphicon glyphicon-edit"></i>Insert Admin Personal Info</h2>

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
   <form action="" method="post" name="form1" enctype="multipart/form-data" onSubmit="return validate_admin_info()">
    <div class="box-content">
   
    <table class="table table-striped table-bordered bootstrap-datatable responsive">
    <thead>
   
    </thead>
    <tbody>
     <tr>
        <td>Admin Type</td>
        <td class="center"> <div class="control-group">
                    

                    <div class="controls">
                     <select id="selectError" data-rel="chosen" name="type">
                     
                            
                            <option value="Super" selected>Super Admin</option>
                            <option value="Sub">Sub Admin</option>
                            
                        </select>
                       
                    </div>
                </div></td>
       
       
    </tr>
    <tr>
        <td>Email Id</td>
        <td class="center"> <div class="form-group has-success col-md-4">
                    
                    <input type="text" name="txt_email" class="form-control email" id="inputSuccess1">
                </div></td>
       
       
    </tr>
     <tr>
        <td>Contact Number</td>
        <td class="center"> 
                   <div class="form-group has-success col-md-4">
                    
                    <input type="text" name="txt_number" class="form-control phn" id="inputSuccess1">
                </div>
                   
                </td>
       
       
    </tr>
       <tr>
        <td>Alternate Contact Number</td>
        <td class="center"> 
                   <div class="form-group has-success col-md-4">
                    
                    <input type="text" name="txt_conf_number" class="form-control conphn" id="inputSuccess1">
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
        <td class="center"><a href="view_admin_info.php" class="btn btn-warning">View Admin Info</a></td>
       
       
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

