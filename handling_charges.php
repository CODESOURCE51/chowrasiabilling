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
	$sc = $_POST['txt_service_charge'];
	$hsc = $_POST['txt_handling'];
    $dsc = $_POST['txt_delvry_sc'];
    $asc = $_POST['txt_aservice_charge'];
    $ahsc = $_POST['txt_ahandling'];
    $adsc = $_POST['txt_adelvry_sc'];
    
	$sql = 'INSERT INTO td_handling_charge(sc_charge,handling_sc,dlvry_sc,air_sc_charge,air_handling_sc,air_dlvry_sc) VALUES("'.$sc.'","'.$hsc.'","'.$dsc.'","'.$asc.'","'.$ahsc.'","'.$adsc.'")';
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
            <a href="#">Set Handling Charges</a>
        </li>
    </ul>
</div>

<div class="row">
    <div class="box col-md-12">
        <div class="box-inner">
            <div class="box-header well" data-original-title="">
                <h2><i class="glyphicon glyphicon-edit"></i>Set Handling Charges</h2>

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
   <form action="" method="post" name="form1" enctype="multipart/form-data" onSubmit="return validate_handling_charges()">
    <div class="box-content">
   
    <table class="table table-striped table-bordered bootstrap-datatable responsive">
    <thead>
   
    </thead>
    <tbody>
    
    <tr>
        <td>Service Charge</td>
        <td class="center"> <div class="form-group has-success col-md-4">
                    
                    <input type="text" name="txt_service_charge" class="form-control service_charge" id="inputSuccess1">
                </div></td>
       
       
    </tr>
     <tr>
        <td>Handling / SC</td>
        <td class="center"> 
                   <div class="form-group has-success col-md-4">
                    
                    <input type="text" name="txt_handling" class="form-control handling" id="inputSuccess1">
                </div>
                   
                </td>
       
       
    </tr>
       <tr>
        <td>Delivery / SC</td>
        <td class="center"> 
                   <div class="form-group has-success col-md-4">
                    
                    <input type="text" name="txt_delvry_sc" class="form-control delvry_sc" id="inputSuccess1">
                </div>
                   
                </td>
       
       
    </tr>
    <tr>
        <td>Airlines Service Charge</td>
        <td class="center"> <div class="form-group has-success col-md-4">
                    
                    <input type="text" name="txt_aservice_charge" class="form-control aservice_charge" id="inputSuccess1">
                </div></td>
       
       
    </tr>
     <tr>
        <td>Airlines Handling / SC</td>
        <td class="center"> 
                   <div class="form-group has-success col-md-4">
                    
                    <input type="text" name="txt_ahandling" class="form-control ahandling" id="inputSuccess1">
                </div>
                   
                </td>
       
       
    </tr>
       <tr>
        <td>Airlines Delivery / SC</td>
        <td class="center"> 
                   <div class="form-group has-success col-md-4">
                    
                    <input type="text" name="txt_adelvry_sc" class="form-control adelvry_sc" id="inputSuccess1">
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
        <td class="center"><a href="view_handling_charges.php" class="btn btn-warning">View Handling Charges</a></td>
       
       
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

