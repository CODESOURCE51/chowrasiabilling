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
                  
}
else
{
 exit('You can not directly access this page<script>location.replace("index.php")</script>');
}

?>
<style type="text/css">
    
    #popup_holder1 {
    background: #ffffff;
    border-radius: 10px;
    box-shadow: 0 0 12px #000000;
    left: 50%;
    margin: -250px 0 0 -274px;
    padding: 16px;
    position: fixed;
    top: 50%;
    width: 584px;
    z-index: 1000;
}
#hover {
    background: #313131;
    
    height: 100%;
    left: 0;
    opacity: 0.8;
    position: fixed;
    top: 0;
    width: 100%;
    z-index: 999;
}
</style>
<div>
    <ul class="breadcrumb">
        <li>
            <a href="#">Home</a>
        </li>
        <li>
            <a href="#">Create Admin</a>
        </li>
    </ul>
</div>

<div class="row">
    <div class="box col-md-12">
        <div class="box-inner">
            <div class="box-header well" data-original-title="">
                <h2><i class="glyphicon glyphicon-edit"></i>Create Sub admin</h2>

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
   <form action="" method="post" id="create_admin" name="form1" enctype="multipart/form-data" onSubmit="return create_admin_valid()">
   <input type="hidden" name="SubAdmin" value="SubAdmin" />
    <div class="box-content">
   
    <table class="table table-striped table-bordered bootstrap-datatable responsive">
    <thead>
   
    </thead>
    <tbody>
    <tr>
        <td>User Name</td>
        <td class="center"> <div class="form-group has-success col-md-4">
                    
                    <input type="text" name="bname" class="form-control bname" id="inputSuccess1">
                </div></td>
       
       
    </tr>
     <tr>
        <td>Password</td>
        <td class="center"> <div class="form-group has-success col-md-4">
                  <input type="text" name="bpass" class="form-control bpass" id="inputSuccess1">
                 </div>   
                </td>
       
       
    </tr>
     
     <tr>
        <td></td>
        <td class="center">
              <button type="submit" class="btn btn-default">Submit</button></td>
       
       
    </tr>
   <tr>
        <td></td>
        <td class="center"><a href="view_admin.php" class="btn btn-warning">View Admin</a></td>
       
       
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
<div id="hover" style="display: none;"></div>

<div id="popup_holder1" style="display: none;">
<input type="hidden" value="1" id="add_status">
<input type="hidden" value="#opt_in_form" id="form_submited">
<a id="close" class="close_btn001" href="Javascript:void(0);" onclick="StayForm12()"><img alt="" src="images/close_btn.png"></a>
  <div class="popup_section">
      <div class="popup_cont">
          <p id="msg">There is problem with the address provided, please correct your address. </p>
            <div class="suggestspan"><a onclick="change_address_field();" style="cursor:pointer;">Click here to change your address </a></div>
            <small><span id="continuelink"><a onclick="SubmitForm();" style="cursor:pointer;">Continue with the address I entered</a></span></small>
            <small><a id="closebttn" href="Javascript:void(0);" onclick="StayForm12()">Close</a></small>
        </div>
    </div>
</div>
<?php require('footer.php'); ?>

