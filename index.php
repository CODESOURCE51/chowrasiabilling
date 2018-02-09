<?php
$no_visible_elements = true;
include('header.php'); ?>
<?php 
if(isset($_POST['login']) && $_POST['login'] == 'user_login') {
 $_SESSION['user']=$_POST['txtuser'];
 $_SESSION['password']=$_POST['txtpassword'];
 exit('<script>location.replace("dashboard.php")</script>');
 //header('Location: dashboard.php');
}
?>

    <div class="row">
        <div class="col-md-12 center login-header">
            <h2>Welcome to Chaurasia</h2>
        </div>
        <!--/span-->
    </div><!--/row-->

    <div class="row">
        <div class="well col-md-5 center login-box">
            <div class="alert alert-info">
                Please login with your Username and Password.
            </div>
            <form class="form-horizontal" action="" method="post" name="form2" enctype="multipart/form-data" onsubmit="return validate_login()">
                <fieldset>
                    <div class="input-group input-group-lg">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-user red"></i></span>
                        <input type="text" name="txtuser" id="user_name" class="form-control" placeholder="Username">
                    </div>
                    <div class="clearfix"></div><br>

                    <div class="input-group input-group-lg">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-lock red"></i></span>
                        <input type="password" name="txtpassword" id="user_pass" class="form-control" placeholder="Password">
                    </div>
                    <div class="clearfix"></div>

                    <div class="clearfix"></div>

                    <p class="center col-md-5">
                    <input type="hidden" name="login" value="user_login" />
                        <button type="submit" class="btn btn-primary">Login</button>
                    </p>
                     <!-- <div class="alert alert-info">
                Forgot your password ? <a herf="forgot_password.php" onclick="window.location.href ='forgot_password.php'" style="cursor:pointer;">Click Here</a>
            </div> -->
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