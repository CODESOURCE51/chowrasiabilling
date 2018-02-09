<?php
$no_visible_elements = true;
include('header.php'); ?>
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
if(isset($_POST['login']) && $_POST['login'] == 'user_login') {

 $_SESSION['user']=$_POST['txtuser'];
 $_SESSION['password']=$_POST['txtpassword'];
 header('Location: dashboard.php');
}
?>

    <div class="row">
        <div class="col-md-12 center login-header">
            <h2>Reset your Password</h2>
        </div>
        <!--/span-->
    </div><!--/row-->

    <div class="row">
        <div class="well col-md-5 center login-box">
            <div class="alert alert-info">
                Please input your personal details to reset the password
            </div>
            <form class="form-horizontal" action="" method="post" name="form2" enctype="multipart/form-data" onsubmit="return validate_forgot()">
                <fieldset>
                    <div class="input-group input-group-lg">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-user red"></i></span>
                        <input type="text" name="txtemail" id="user_email" class="form-control" placeholder="Email Id">
                    </div>
                    <div class="clearfix"></div><br>

                    <div class="input-group input-group-lg">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-user red"></i></span>
                        <input type="text" name="con_email" id="user_con_email" class="form-control" placeholder="Confirm Email Id">
                    </div>
                    <div class="clearfix"></div>

                    <div class="clearfix"></div>

                    <p class="center col-md-5">
                    <input type="hidden" name="login" value="user_login" />
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </p>
                     
                </fieldset>
            </form>
        </div>
        <!--/span-->
    </div><!--/row-->
    <script>
	function validate_login() {
 //ShowExitPopup = false;
                                isExit=false;
                                internal = 1;
                                var isErrors = false;
                                var phonefilter = /^([0-9\-\+\(\)]{8,22})+$/;
                                var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
								var errors = new Array();
                                var txt = '';
                                //txt += 'The following fields contain input errors:<br><br> <ul> ';
                               if ($('#user_name').val() == '') {
                                    errors.push('Please Enter a Username.'); 
                                    
                                }
                                if ($('#user_pass').val() == '') {
                                    errors.push('Please Enter your Password'); 
                                    
                                }
								
                                txt += '</ul><br>Please review your input and submit the form again!';
                                if (errors.length == 0) {
                                                                       
                                    return true;                                
                                } else {
                                   swal({
			  title: "Error!",
			  text: errors.join('\n'),
			  type: "error",
			  confirmButtonText: "Close"
			});
			return false;
                                }
}
	</script>
<?php require('footer.php'); ?>