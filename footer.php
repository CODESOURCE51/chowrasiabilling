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
        <p class="col-md-9 col-sm-9 col-xs-12 copyright">&copy; <a href="" target="_blank">Chaurasia Travel</a> <?php echo date('Y') ?></p>

        <p class="col-md-3 col-sm-3 col-xs-12 powered-by">Powered by: <a
                href="">PROJUKTI</a></p>
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
function validate_other_charges() {
 //ShowExitPopup = false;
                                isExit=false;
                                internal = 1;
                                var isErrors = false;
                                var phonefilter = /^([0-9\-\+\(\)]{8,22})+$/;
                                var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
                var errors = new Array();
                                var txt = '';
                                //txt += 'The following fields contain input errors:<br><br> <ul> ';
                               if ($('.bank_ch').val() == '') {
                                    errors.push('Please Enter Bank Charges.'); 
                                    
                                }
                                if ($('.oth_ch').val() == '') {
                                    errors.push('Please Enter Other Charges.'); 
                                    
                                }
                                if ($('.acc_date').val() == '') {
                                    errors.push('Please Select a Date.'); 
                                    
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
function validate_handling_charges() {
 //ShowExitPopup = false;
                                isExit=false;
                                internal = 1;
                                var isErrors = false;
                                var phonefilter = /^([0-9\-\+\(\)]{8,22})+$/;
                                var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
                var errors = new Array();
                                var txt = '';
                                //txt += 'The following fields contain input errors:<br><br> <ul> ';
                               if ($('.service_charge').val() == '') {
                                    errors.push('Please Enter Service Charge.'); 
                                    
                                }
                                if ($('.handling').val() == '') {
                                    errors.push('Please Enter Handling / Service Charge.'); 
                                    
                                }
                                if ($('.delvry_sc').val() == '') {
                                    errors.push('Please Enter Delivery Service Charge.'); 
                                    
                                }
                                
                                if ($('.aservice_charge').val() == '') {
                                    errors.push('Please Enter Airlines Service Charge.'); 
                                    
                                }
                                if ($('.ahandling').val() == '') {
                                    errors.push('Please Enter Airlines Handling / Service Charge.'); 
                                    
                                }
                                if ($('.adelvry_sc').val() == '') {
                                    errors.push('Please Enter Airlines Delivery Service Charge.'); 
                                    
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
                                    errors.push('Please Enter Refund Amount.'); 
                                    
                                }
                                 if ($('.onlchrg_irctc').val() == '') {
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
                                    errors.push('Please Enter Customer Address.'); 
                                    
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
                                if ($('#cust_credit3').val() == 0) {
                                     if ($('.train_name').val() == '') {
                                    errors.push('Please Enter Train Name.'); 
                                    
                                }
                                if ($('.datepicker').val() == '') {
                                    errors.push('Please Enter Journey Date.'); 
                                    
                                }
                                if ($('.customer_name').val() == '') {
                                    errors.push('Please Enter Customer Name.'); 
                                    
                                }
                                if ($('.ticket_no').val() == '') {
                                    errors.push('Please Enter Ticket Number.'); 
                                    
                                }
                                if ($('.pnr_no').val() == '') {
                                    errors.push('Please Enter PNR number.'); 
                                    
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
                                   
                                }
                                else {
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
                                if ($('.rticket_no').val() == '') {
                                    errors.push('Please Enter return Ticket Number.'); 
                                    
                                }
                                if ($('.rpnr_no').val() == '') {
                                    errors.push('Please Enter return PNR Number.'); 
                                    
                                }
                                if ($('.train_name1').val() == '') {
                                    errors.push('Please Enter Return Train Name.'); 
                                    
                                }
                                if ($('.datepicker1').val() == '') {
                                    errors.push('Please Enter Return Journey Date.'); 
                                    
                                } 
                                 if ($('.journey_from1').val() == '') {
                                    errors.push('Please Enter Return Boarding Place.'); 
                                    
                                }
                                if ($('.journey_to1').val() == '') {
                                    errors.push('Please Enter return Destination.'); 
                                    
                                }
                                if ($('.t_number1').val() == '') {
                                    errors.push('Please Enter Total Returning Amount.'); 
                                    
                                }
                                if ($('.r_amount').val() == '') {
                                    errors.push('Please Enter return Amount.'); 
                                    
                                }
                                if ($('.hand_chrg1').val() == '') {
                                    errors.push('Please Enter return Handling Charge.'); 
                                    
                                }
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

            } 
            // else if( res[0]=='deny' ) {
            //   $('#loading-indicator').css('display','none');
            //      swal({
            //   title: "Error!",
            //   text: "Dear Admin You Do Not Have Sufficient Ballance for This Bill. Please Update Amount of the Particular Bank Account then Proceed",
            //   type: "error",
            //   confirmButtonText: "OK",
            // });

            //      return false;
                 // window.location.href = 'view_bank_details.php'; 
                 //window.location.href="billing.php?b_id"+res[1];

            //}
             else {
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
<script src="js/jquery.easy-confirm-dialog.js"></script>
<script type="text/javascript">
function head_number() {
  var head = $('.t_number').val();
  $('#head_count').val(head);
  //alert(head);
  $.ajax({
    type:'POST',
    url:'head_count_page.php',
    data:'head_id='+head,
    success: function(data){
      $('.head_rows').css('display','table-row');
      $('.head_rows').html(data);
    }

});
}
function head_number1() {
  var head1 = $('.t_number1').val();
  $('#head_count1').val(head1);
  //alert(head);
  $.ajax({
    type:'POST',
    url:'head_count_page1.php',
    data:'head_ids='+head1,
    success: function(data){
      $('.head_rows1').css('display','table-row');
      $('.head_rows1').html(data);
    }

});
}
function return_Pprice() {
    var rprice = $('.r_amount').val();
    $('#txt_rp_amount').val(rprice);
}
function calculate_rsprice(rstax) {
     var purchase_amount1 = $('.r_amount').val();
   var handling_charge1 = rstax;
    var sgst = $('.txt_sgst1').val();
   var cgst = $('.txt_cgst1').val();
   var igst = $('.txt_igst1').val();
   alert(sgst);
   alert(cgst);
   alert(igst);
   var total_head1 = $('#head_count1').val();
 var errors = new Array();
  var txt = '';
  if ( purchase_amount1 == '') {
   swal({
              title: "Success !!",
              text: "You have not entered Return Purchase Amount. Please fill this first",
              type: "error",
              confirmButtonText: "Close"
            });
   
   $('.hand_chrg1').attr('checked', false);
                 return false;
 
  } else {
    var rgovt_tax = '<?php echo $tax_data["tax"];?>';
	 var govt_payment_cgst1 = ((+handling_charge1 * +cgst) / 100) * total_head1;
   var govt_payment_sgst1 = ((+handling_charge1 * +sgst) / 100) * total_head1;
   var govt_payment_igst1 = ((+handling_charge1 * +igst) / 100) * total_head1;
  alert(govt_payment_cgst1);
  alert(govt_payment_sgst1);
  alert(govt_payment_igst1); 
   var govt_payment1 = +govt_payment_cgst1 + +govt_payment_sgst1 + +govt_payment_igst1;
   alert(govt_payment1);
   var total_amount1 = (+purchase_amount1+ + +govt_payment1)+ + (+handling_charge1 * total_head1);
    $('#txt_rservice_tax').val(rstax);
    
    $('.rgovt_pay').val(govt_payment1);
    $('.rtrn_price').val(total_amount1);
	 $('#txt_cgst_amt1').val(govt_payment_cgst1);
   $('#txt_sgst_amt1').val(govt_payment_sgst1);
   $('#txt_igst_amt1').val(govt_payment_igst1);
   $('#cgst_amt1').text('Rs. '+govt_payment_cgst1);
   $('#sgst_amt1').text('Rs. '+govt_payment_sgst1);
   $('#igst_amt1').text('Rs. '+govt_payment_igst1);
}
}
 function calculate_price(hprice) {
   var purchase_amount = $('.p_amount').val();
   var sgst = $('.txt_sgst').val();
   var cgst = $('.txt_cgst').val();
   var igst = $('.txt_igst').val();
   var handling_charge = hprice;
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
   
   $('.hand_chrg').attr('checked', false);
                 return false;
 
  } else {
   
   
   var govt_tax = '<?php echo $tax_data["tax"];?>';

   var govt_payment_cgst = ((+handling_charge * +cgst) / 100) * total_head;
   var govt_payment_sgst = ((+handling_charge * +sgst) / 100) * total_head;
   var govt_payment_igst = ((+handling_charge * +igst) / 100) * total_head;
  
   
   var govt_payment = +govt_payment_cgst + +govt_payment_sgst + +govt_payment_igst;
   
   var total_amount = (+purchase_amount+ + +govt_payment)+ + (+handling_charge * total_head)  + +$('.rtrn_price').val();
   var profit = +handling_charge * +total_head;
   $('.sell_price').val(total_amount);
   $('.govt_pay').val(govt_payment);
   $('#profit').css('display','block');
   $('#profit_amnt').html(profit);
   $('#txt_total_profit').val(profit);
   $('#txt_cgst_amt').val(govt_payment_cgst);
   $('#txt_sgst_amt').val(govt_payment_sgst);
   $('#txt_igst_amt').val(govt_payment_igst);
   $('#cgst_amt').text('Rs. '+govt_payment_cgst);
   $('#sgst_amt').text('Rs. '+govt_payment_sgst);
   $('#igst_amt').text('Rs. '+govt_payment_igst);
 }
  }
</script>
<script type="text/javascript">     
        function print_copy() {    
           var divContents = $("#print_report").html();
            var printWindow = window.open('', '', 'height=700,width=800');
            printWindow.document.write('<html><head><title>Chaurasia Travels</title>');
            printWindow.document.write('</head><body >');
            printWindow.document.write(divContents);
            printWindow.document.write('</body></html>');
            printWindow.document.close();
            printWindow.print();
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
      var res = data.split("-"); 
      //alert(res[5]); 
      $('.customer_name').val(res[0]);
      $('.customer_phn').val(res[1]);
      $('.customer_proof').val(res[2]);
      $('#customer_wallet_amount').val(res[3]);
      $('#existing_cust_id').val(res[5]);
      $('.p_amount').val('');
      $('#credit2').css('display','none');
    $('#credit1').css('display','block');

    }

});
}
}
function get_number() {
  var customer_phn = $('.txt_cust_phn_no').val();
  if ( customer_phn == 'null') {
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
    url:'search_customer_phn.php',
    data:'cust_phn='+customer_phn,
    success: function(data){
      var res = data.split("/"); 
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

function cancel_confirm(cdtaf) {
if ( cdtaf != 1 ) {
    $('.txt_not_confirm').val(1);
  } else {
    $('.txt_not_confirm').val(0);
    $('.txt_not_confirm').prop('checked', false);
  }
}
  function credit_click() {

    var credit_check = $('#cust_credit').val();
    if ( credit_check != 1 ) {
    $('#cust_credit').val(1);
  } else {
    $('#cust_credit').val(0);
    customer_wallet();
  }
  }

  function return_ticket() {

    var credit_check1 = $('#cust_credit3').val();
    if ( credit_check1 != 1 ) {
    $('#cust_credit3').val(1);
    $('.ret_train').css('display','table-row');
  } else {
    $('#cust_credit3').val(0);
   $('.ret_train').css('display','none');
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
<script>
  $(function() {
    $( "#datepicker" ).datepicker({
      showOn: "button",
      buttonImage: "images/calendar.gif",
      buttonImageOnly: true,
      buttonText: "Select date"
    });
  });
  </script> 
  <script>
  $(function() {
    $( "#datepicker2" ).datepicker({
      showOn: "button",
      buttonImage: "images/calendar.gif",
      buttonImageOnly: true,
      buttonText: "Select date"
    });
  });
  $(".confirm").easyconfirm();
    function getCheckedCheckboxesFor() {
   var checkboxes = document.getElementsByName('employee');
var selected = [];
for (var i=0; i<checkboxes.length; i++) {
    if (checkboxes[i].checked) {
        selected.push(checkboxes[i].value);
    }
}
 if(selected == '') {
    alert('You didn"t Select Any Customer');
 } else {
    //alert(selected);
    //window.location.href = 'billing_multiple.php?bill_id='+selected;
    window.open('billing_multiple.php?bill_id='+selected,'_blank');
 }
}

  </script>     

</body>
</html>
