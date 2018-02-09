<?php if (!isset($no_visible_elements) || !$no_visible_elements) { ?>
    <!-- content ends -->
    </div><!--/#content.col-md-0-->
<?php } ?>
</div><!--/fluid-row-->
<?php if (!isset($no_visible_elements) || !$no_visible_elements) { ?>

    <!-- Ad, you can remove it -->
 
    <!-- Ad ends -->

    <hr>

    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
         aria-hidden="true">

        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">×</button>
                    <h3>Settings</h3>
                </div>
                <div class="modal-body">
                    <p>Here settings can be configured...</p>
                </div>
                <div class="modal-footer">
                    <a href="#" class="btn btn-default" data-dismiss="modal">Close</a>
                    <a href="#" class="btn btn-primary" data-dismiss="modal">Save changes</a>
                </div>
            </div>
        </div>
    </div>

    <footer class="row">
        <p class="col-md-9 col-sm-9 col-xs-12 copyright">&copy; <a href="" target="_blank">Chawrasia Travel</a> <?php echo date('Y') ?></p>

        <p class="col-md-3 col-sm-3 col-xs-12 powered-by">Powered by: <a
                href="">Chawrasia</a></p>
    </footer>
<?php } ?>

</div><!--/.fluid-container-->

<!-- external javascript -->

<script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

<!-- library for cookie management -->
<script src="js/jquery.cookie.js"></script>
<!-- calender plugin -->
<script src='bower_components/moment/min/moment.min.js'></script>
<script src='bower_components/fullcalendar/dist/fullcalendar.min.js'></script>
<!-- data table plugin -->
<script src='js/jquery.dataTables.min.js'></script>

<!-- select or dropdown enhancer -->
<script src="bower_components/chosen/chosen.jquery.min.js"></script>
<!-- plugin for gallery image view -->
<script src="bower_components/colorbox/jquery.colorbox-min.js"></script>
<!-- notification plugin -->
<script src="js/jquery.noty.js"></script>
<!-- library for making tables responsive -->
<script src="bower_components/responsive-tables/responsive-tables.js"></script>
<!-- tour plugin -->
<script src="bower_components/bootstrap-tour/build/js/bootstrap-tour.min.js"></script>
<!-- star rating plugin -->
<script src="js/jquery.raty.min.js"></script>
<!-- for iOS style toggle switch -->
<script src="js/jquery.iphone.toggle.js"></script>
<!-- autogrowing textarea plugin -->
<script src="js/jquery.autogrow-textarea.js"></script>
<!-- multiple file upload plugin -->
<script src="js/jquery.uploadify-3.1.min.js"></script>
<!-- history.js for cross-browser state change on ajax -->
<script src="js/jquery.history.js"></script>
<!-- application script for Charisma demo -->
<script src="js/charisma.js"></script>
<script type="text/javascript" src="js/sweet-alert.min.js"></script>
<link rel="stylesheet" type="text/css" href="css/sweet-alert.css">
<script>
function create_admin_valid() {
 //ShowExitPopup = false;
                                isExit=false;
                                internal = 1;
                                var isErrors = false;
                                var phonefilter = /^([0-9\-\+\(\)]{8,22})+$/;
                                var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
                                var errors = new Array();
                                var txt = '';
                                //txt += 'The following fields contain input errors:<br><br> <ul> ';
                               if ($('.bname').val() == '') {
                                    errors.push('Please Enter the Admin User Name.'); 
                                    
                                }
                                if ($('.bpass').val() == '') {
                                    errors.push('Please Enter the Password'); 
                                    
                               }
                                
                                txt += '</ul><br>Please review your input and submit the form again!';
                                if (errors.length == 0) {
                                    $('#message_response_area').css('display','block'); 
                                    $.ajax({type:'POST', url: 'create_admin.php', data:$('#create_admin').serialize(), success: function(response) {
            var res = response.split("|"); 
            if( res[0]=='ok' ) {
                $('#message_response_area').css('display','none'); 
                $('#create_admin').find("input[type=text], input[type=email], textarea").val("");
                 swal({
              title: "Success !!",
              text: "The new Sub Admin has been successfully created",
              type: "success",
              confirmButtonText: "Close"
            });
                 return false;
            } else if( res[0]=='exsits' ) {
                $('#message_response_area').css('display','none');
                $('#buy_form').find("input[type=text], input[type=email], textarea").val("");
                 swal({
              title: "Error!",
              text: "There is already a Sub Admin exists in database . Please delete first then proceed.",
              type: "error",
              confirmButtonText: "OK",
            });
                 return false;
            } else {
                  $('#message_response_area').show();
                  $('#message_response_area').html('Sorry ! We can not process your request right now.');
            }
        }}); 
        return false;                              
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

function validate_admin_info() {
 //ShowExitPopup = false;
                                isExit=false;
                                internal = 1;
                                var isErrors = false;
                                var phonefilter = /^([0-9\-\+\(\)]{8,22})+$/;
                                var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
                var errors = new Array();
                                var txt = '';
                                //txt += 'The following fields contain input errors:<br><br> <ul> ';
                               if ($('.email').val() == '') {
                                    errors.push('Please Enter Your Email Id.'); 
                                    
                                }
                                if ($('.phn').val() == '') {
                                    errors.push('Please Enter your Contact Number'); 
                                    
                                }
                                if ($('.conphn').val() == '') {
                                    errors.push('Please Enter your Alternate Phone Number'); 
                                    
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
function edit_admin_valid() {
 //ShowExitPopup = false;
                                isExit=false;
                                internal = 1;
                                var isErrors = false;
                                var phonefilter = /^([0-9\-\+\(\)]{8,22})+$/;
                                var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
                var errors = new Array();
                                var txt = '';
                                //txt += 'The following fields contain input errors:<br><br> <ul> ';
                               if ($('.bname').val() == '') {
                                    errors.push('Please Enter Your User Name.'); 
                                    
                                }
                                if ($('.bpass').val() == '') {
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

function validate_tax() {
 //ShowExitPopup = false;
                                isExit=false;
                                internal = 1;
                                var isErrors = false;
                                var phonefilter = /^([0-9\-\+\(\)]{8,22})+$/;
                                var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
                var errors = new Array();
                                var txt = '';
                                //txt += 'The following fields contain input errors:<br><br> <ul> ';
                               if ($('#inputSuccess1').val() == '') {
                                    errors.push('Please Enter Tax Amount.'); 
                                    
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
function validate_bank() {
 //ShowExitPopup = false;
                                isExit=false;
                                internal = 1;
                                var isErrors = false;
                                var phonefilter = /^([0-9\-\+\(\)]{8,22})+$/;
                                var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
                var errors = new Array();
                                var txt = '';
                                //txt += 'The following fields contain input errors:<br><br> <ul> ';
                               if ($('.bnkname').val() == '') {
                                    errors.push('Please Enter Bank Name.'); 
                                    
                                }
                                if ($('.acc_name').val() == '') {
                                    errors.push('Please Enter Account Holder Name.'); 
                                    
                                }
                                if ($('.acc_number').val() == '') {
                                    errors.push('Please Enter Account Number.'); 
                                    
                                }
                                if ($('#inputSuccess1').val() == '') {
                                    errors.push('Please Enter Amount.'); 
                                    
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
function validate_cancel() {
 //ShowExitPopup = false;
                                isExit=false;
                                internal = 1;
                                var isErrors = false;
                                var phonefilter = /^([0-9\-\+\(\)]{8,22})+$/;
                                var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
                var errors = new Array();
                                var txt = '';
                                //txt += 'The following fields contain input errors:<br><br> <ul> ';
                               if ($('#inputSuccess1').val() == '') {
                                    errors.push('Please Enter Online Cancellation Charge.'); 
                                    
                                }
                                if ($('.hndlngchrg').val() == '') {
                                    errors.push('Please Enter Handling Charge / SC.'); 
                                    
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
function validate_customer_details() {
 //ShowExitPopup = false;
                                isExit=false;
                                internal = 1;
                                var isErrors = false;
                                var phonefilter = /^([0-9\-\+\(\)]{8,22})+$/;
                                var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
                var errors = new Array();
                                var txt = '';
                                //txt += 'The following fields contain input errors:<br><br> <ul> ';
                               if ($('.cusname').val() == '') {
                                    errors.push('Please Enter Customer Name.'); 
                                    
                                }
                                if ($('.contc_num').val() == '') {
                                    errors.push('Please Enter Customer Phone Number.'); 
                                    
                                }
                                if ($('.id_proof').val() == '') {
                                    errors.push('Please Enter Customer ID Proof.'); 
                                    
                                }
                                if ($('.wallet').val() == '') {
                                    errors.push('Please Enter Customer Wallet Amount.'); 
                                    
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

function validate_purchase() {
 //ShowExitPopup = false;
                                isExit=false;
                                internal = 1;
                                var isErrors = false;
                                var phonefilter = /^([0-9\-\+\(\)]{8,22})+$/;
                                var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
                var errors = new Array();
                                var txt = '';
                                //txt += 'The following fields contain input errors:<br><br> <ul> ';
                               if ($('.train_name').val() == '') {
                                    errors.push('Please Enter Train Name.'); 
                                    
                                }
                                if ($('.datepicker').val() == '') {
                                    errors.push('Please Enter Journey Date.'); 
                                    
                                }
                                if ($('.customer_name').val() == '') {
                                    errors.push('Please Enter Customer Name.'); 
                                    
                                }
                                 if ($('.customer_phn').val() == '') {
                                    errors.push('Please Enter Customer Contact Number.'); 
                                    
                                }
                                if ($('.customer_proof').val() == '') {
                                    errors.push('Please Enter Customer Proof.'); 
                                    
                                }
                                if ($('.journey_from').val() == '') {
                                    errors.push('Please Enter Boarding Place.'); 
                                    
                                }
                                if ($('.journey_to').val() == '') {
                                    errors.push('Please Enter Destination.'); 
                                    
                                }
                                if ($('.p_amount').val() == '') {
                                    errors.push('Please Enter Purchase Amount.'); 
                                    
                                }
                                if ($('.p_date').val() == '') {
                                    errors.push('Please Enter Purchase Date.'); 
                                    
                                }
                                if ($('.t_number').val() == '') {
                                    errors.push('Please Enter Ticket Number.'); 
                                    
                                }
                                if ($('.hand_chrg').val() == '') {
                                    errors.push('Please Enter Handling Charge.'); 
                                    
                                }
                                if ($('.sell_price').val() == '') {
                                    errors.push('Please Enter Selling Price.'); 
                                    
                                }
                                if ($('.govt_pay').val() == '') {
                                    errors.push('Please Enter Payment to Government.'); 
                                    
                                }
                
                                txt += '</ul><br>Please review your input and submit the form again!';
                                if (errors.length == 0) {
                                   $('#loading-indicator').css('display','block'); 
                                    $.ajax({type:'POST', url: 'create_purchase.php', data:$('#create_purchase').serialize(), success: function(response) {
            var res = response.split("|"); 

            if( res[0]=='ok' ) {
                 $('#loading-indicator').css('display','none');
                 window.location.href = 'billing.php?b_id='+res[1]; 
                 //window.location.href="billing.php?b_id"+res[1];

            } else if( res[0]=='deny' ) {
              $('#loading-indicator').css('display','none');
                 swal({
              title: "Error!",
              text: "Dear Admin You Do Not Have Sufficient Ballance for This Bill. Please Update Amount of the Particular Bank Account then Proceed",
              type: "error",
              confirmButtonText: "OK",
            });

                 return false;
                 // window.location.href = 'view_bank_details.php'; 
                 //window.location.href="billing.php?b_id"+res[1];

            } else {
                  $('#message_response_area').show();
                  $('#message_response_area').html('Sorry ! We can not process your request right now.');
            }
        }}); 
        return false;                                         
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
<script src="http://www.ittutorials.in/js/demo/numtoword.js" type="text/javascript"></script>
<script src="//tinymce.cachefly.net/4.2/tinymce.min.js"></script>
<script>tinymce.init({selector:'textarea'});</script>
<script type="text/javascript">
function head_number() {
  var head = $('.t_number').val();
  $('#head_count').val(head);
  //alert(head);
}

  // function calculate_price() {
  //  var purchase_amount = $('.p_amount').val();
  //  var handling_charge = $('.hand_chrg').val();
  //  var total_amount = +purchase_amount + +handling_charge;
  //  var govt_tax = '<?php echo $tax_data['tax'];?>';
  //  var govt_payment = (+handling_charge * +govt_tax) / 100;
  //  var profit = +handling_charge - +govt_payment;
  //  $('.sell_price').val(total_amount);
  //  $('.govt_pay').val(govt_payment);
  //  $('#profit').css('display','block');
  //  $('#profit_amnt').html(profit);
  // }
 //  function calculate_price() {
 //   var purchase_amount = $('.p_amount').val();
 //   var handling_charge = $('.hand_chrg').val();
 //   var total_head = $('#head_count').val();
 //  var errors = new Array();
 //  var txt = '';
 //  if ( purchase_amount == '' || total_head == '') {
 //   swal({
 //              title: "Success !!",
 //              text: "You have not entered Either Purchase Amount or Number of Persons. Please fill these first",
 //              type: "error",
 //              confirmButtonText: "Close"
 //            });
 //   $('.hand_chrg').val("");
 //   $('#divDisplayWords1').html('');
 //                 return false;
 
 //  } else {
   
 //   var total_amount = (+purchase_amount + +handling_charge) * +total_head;
 //   var govt_tax = '<?php echo $tax_data['tax'];?>';
 //   var govt_payment = ((+handling_charge * +govt_tax) / 100) * +total_head;
 //   var profit = (+handling_charge * +total_head) - +govt_payment;
 //   $('.sell_price').val(total_amount);
 //   $('.govt_pay').val(govt_payment);
 //   $('#profit').css('display','block');
 //   $('#profit_amnt').html(profit);
 //   $('#txt_total_profit').val(profit);
 // }
 //  }
 function calculate_price() {
   var purchase_amount = $('.p_amount').val();
   var handling_charge = $('.hand_chrg').val();
   var total_head = $('#head_count').val();
  var errors = new Array();
  var txt = '';
  if ( purchase_amount == '') {
   swal({
              title: "Success !!",
              text: "You have not entered Purchase Amount. Please fill this first",
              type: "error",
              confirmButtonText: "Close"
            });
   $('.hand_chrg').val("");
   $('#divDisplayWords1').html('');
                 return false;
 
  } else {
   
   var total_amount = +purchase_amount + +handling_charge;
   var govt_tax = '<?php echo $tax_data['tax'];?>';
   var govt_payment = (+handling_charge * +govt_tax) / 100;
   var profit = +handling_charge - +govt_payment;
   $('.sell_price').val(total_amount);
   $('.govt_pay').val(govt_payment);
   $('#profit').css('display','block');
   $('#profit_amnt').html(profit);
   $('#txt_total_profit').val(profit);
 }
  }
</script>
<script type="text/javascript">     
        function PrintDiv() {    
           var divToPrint = document.getElementById('print_div');
           var popupWin = window.open('', '_blank', 'width=300,height=300');
           popupWin.document.open();
           popupWin.document.write('<html><body onload="window.print()">' + divToPrint.innerHTML + '</body></html>');
            popupWin.document.close();
                }
     </script>
<script type="text/javascript">
function get_name() {
  var customer_id = $('.txt_cust_type').val();
  if ( customer_id == 'null') {
    $('.customer_name').val('');
      $('.customer_phn').val('');
      $('.customer_proof').val('');
      $('.p_amount').val('');
      $('#credit2').css('display','block');
    $('#credit1').css('display','none');
    $('#divDisplayWords1').html('');
  }
  else {
  $.ajax({
    type:'POST',
    url:'search_customer.php',
    data:'cust_id='+customer_id,
    success: function(data){
      var res = data.split(","); 
      //alert(res[1]); 
      $('.customer_name').val(res[0]);
      $('.customer_phn').val(res[1]);
      $('.customer_proof').val(res[2]);
      $('#customer_wallet_amount').val(res[3]);
      $('#existing_cust_id').val(res[4]);
      $('.p_amount').val('');
      $('#credit2').css('display','none');
    $('#credit1').css('display','block');

    }

});
}
}
</script> 
<script type="text/javascript">
$( document ).ready(function() {
    $('#credit2').css('display','block');
    $('#credit1').css('display','none');
});
  function credit_click() {

    var credit_check = $('#cust_credit').val();
    if ( credit_check != 1 ) {
    $('#cust_credit').val(1);
  } else {
    $('#cust_credit').val(0);
    customer_wallet();
  }
  }
  

  function credit_click2() {

    var credit_check = $('#cust_credit2').val();
    if ( credit_check != 1 ) {
    $('#cust_credit2').val(1);
    $('#txt_credit_count').val('yes');
  } else {
    $('#cust_credit2').val(0);
    $('#txt_credit_count').val('no');
  }
  }
 function wallet_add() {

    var credit_check = $('#wallet_credit').val();
    if ( credit_check != 1 ) {
    $('#wallet_credit').val(1);
  } else {
    $('#wallet_credit').val(0);
    customer_wallet();
  }
  }
</script>
<script type="text/javascript">
  function customer_wallet() {
var cust_wlt = parseInt($('#customer_wallet_amount').val());
var cust_wlt_amnt = parseInt($('.p_amount').val());
var credit_check = $('#cust_credit').val();
if ( cust_wlt_amnt > cust_wlt && credit_check != 1 ) {

   swal({
              title: "Error !!",
              text: "The customer Do Not Have Sufficient Wallet Ballance.If You Want to Proceed then Check on Credit Or Enter Less Price",
              type: "error",
              confirmButtonText: "Close"
            });
    //$('.p_amount').val('');
    $('#cust_credit').prop('checked', true);
    $('#cust_credit').val(1);
    $('#txt_credit_count').val('yes');
   return false;
  } else if ( cust_wlt_amnt < cust_wlt && credit_check == 1 ) {
    $('#cust_credit').prop('checked', false);
    $('#cust_credit').val(0);
    $('#txt_credit_count').val('no');
  }
}
</script>    
</body>
</html>
