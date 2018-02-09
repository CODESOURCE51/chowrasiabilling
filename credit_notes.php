<?php
include('connection.php');
include('convert2.php');
// Get Refund

$refund = 'SELECT * FROM td_refund WHERE rid='.$_REQUEST['credit_id'];
$refund_query = mysql_query($refund,$con) or die(mysql_error());
$refund_data = mysql_fetch_assoc($refund_query);

$refund1 = 'SELECT * FROM td_refund WHERE rid='.$_REQUEST['credit_id'];
$refund_query1 = mysql_query($refund1,$con) or die(mysql_error());
$refund_data1 = mysql_fetch_assoc($refund_query1);

$customer = 'SELECT * FROM td_customer WHERE cust_id="'.$refund_data['cuid'].'"';
$customer_query = mysql_query($customer, $con) or die(mysql_error());
$customer_data = mysql_fetch_assoc($customer_query);

$purchase = 'SELECT * FROM td_purchase WHERE purchase_id='.$refund_data['pid'];
$purchase_query = mysql_query($purchase, $con) or die(mysql_error());
$purchase_data = mysql_fetch_assoc($purchase_query);

$purchase1 = 'SELECT * FROM td_purchase WHERE purchase_id='.$refund_data1['pid'];
$purchase_query1 = mysql_query($purchase1, $con) or die(mysql_error());
$purchase_data1 = mysql_fetch_assoc($purchase_query1);

// $number = $refund_data['rf_charge'];
//    $no = round($number);
//    $point = round($number - $no, 2) * 100;
//    $hundred = null;
//    $digits_1 = strlen($no);
//    $i = 0;
//    $str = array();
//    $words = array('0' => '', '1' => 'one', '2' => 'two',
//     '3' => 'three', '4' => 'four', '5' => 'five', '6' => 'six',
//     '7' => 'seven', '8' => 'eight', '9' => 'nine',
//     '10' => 'ten', '11' => 'eleven', '12' => 'twelve',
//     '13' => 'thirteen', '14' => 'fourteen',
//     '15' => 'fifteen', '16' => 'sixteen', '17' => 'seventeen',
//     '18' => 'eighteen', '19' =>'nineteen', '20' => 'twenty',
//     '30' => 'thirty', '40' => 'forty', '50' => 'fifty',
//     '60' => 'sixty', '70' => 'seventy',
//     '80' => 'eighty', '90' => 'ninety');
//    $digits = array('', 'hundred', 'thousand', 'lakh', 'crore');
//    while ($i < $digits_1) {
//      $divider = ($i == 2) ? 10 : 100;
//      $number = floor($no % $divider);
//      $no = floor($no / $divider);
//      $i += ($divider == 10) ? 1 : 2;
//      if ($number) {
//         $plural = (($counter = count($str)) && $number > 9) ? 's' : null;
//         $hundred = ($counter == 1 && $str[0]) ? ' and ' : null;
//         $str [] = ($number < 21) ? $words[$number] .
//             " " . $digits[$counter] . $plural . " " . $hundred
//             :
//             $words[floor($number / 10) * 10]
//             . " " . $words[$number % 10] . " "
//             . $digits[$counter] . $plural . " " . $hundred;
//      } else $str[] = null;
//   }
//   $str = array_reverse($str);
//   $result = implode('', $str);
//   $points = ($point) ?
//     "." . $words[$point / 10] . " " . 
//           $words[$point = $point % 10] : '';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title></title>
    <link href='https://fonts.googleapis.com/css?family=Bitter' rel='stylesheet' type='text/css'>
    <style>
        body {font-size: 10px; font-family: sans-serif}
        table {border-collapse: collapse}
        .center {text-align: center}
        .left {text-align: left}
        .right {text-align: right}
        .bold {font-weight: 600}
        .big {font-size: 15px; font-family: 'Bitter', serif;}
        .medium {font-size: 13px; font-family: 'Bitter', serif;}
        .big.bold {font-size: 18px; position: relative}
        .bb {border-bottom: 1px solid}
        .bt {border-top: 1px solid}
        .bbd {border-bottom: 1px double}
        .btd {border-top: 1px double}
        .outline {outline: 1px solid deeppink}
        .pad-top {padding-top: 5px}
        .billblock>tbody>tr>td {border-right: 1px solid; padding: 2px}
        .billblock>tbody>tr>td:last-child {border-right: none}
        .billblock>tbody> tr:first-child >td {border-top: 1px solid; border-bottom: 1px solid}
        .billblock>tbody> tr:last-child >td {border-bottom: 1px solid}
        .billblock table {width: 100%}
        .billblock td {vertical-align: top}
        .billblock>tbody>tr:nth-last-child(1)>td {border-top: 1px solid}
    </style>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
</head>
<body>
<table width="670" style="max-height: 432px">
    <tr>
        <td>
            <table width="90%" style="display: table; margin: 0 auto">
                <tr>
                    <td class="center big bold">CHAURASIA TRAVELS <span style="position: absolute; right: 0; font-weight: 400; font-size: 14px">CUSTOMER COPY</span></td>
                </tr>
                <tr>
                    <td class="center">2, CHURCH LANE, GROUND FLOOR, ROOM NO.1B, KOLKATA -700001</td>
                </tr>
                <tr>
                    <td class="center"><span style="text-decoration: underline">TEL : 4005 6361/4005 6024/9830091167&nbsp;&nbsp;&nbsp;&nbsp;WEBSITE : chaurasiatravels.com&nbsp;&nbsp;&nbsp;&nbsp;Email : cttravels2001@gmail.com</span></td>
                </tr>
                <tr>
                    <td class="center big pad-top">CREDIT NOTE</td>
                </tr>
                <tr>
                    <td>
                        <table width="100%">
                            <tr>
                                <td width="50%">
                                    <table>
                                        <tr>
                                            <td>To M/s.</td>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td><?php echo $purchase_data['customer_name'];?><br/><?php echo $purchase_data['customer_proof'];?></td>
                                            <td><br/></td>
                                            <td></td>
                                        </tr>
                                    </table>
                                </td>
                                <td width="50%" style="vertical-align: top">
                                    <table width="100%">
                                        <tr>
                                            <td class="right"></td>
                                            <td class="center"></td>
                                            <td class="left"></td>
                                            <td class="right" style="font-size: 12px; font-weight: bold">CR. No.</td>
                                            <td class="center" style="font-size: 12px; font-weight: bold">:</td>
                                            <td class="left" style="font-size: 12px; font-weight: bold"><?php echo $refund_data['rid'];?></td>
                                        </tr>
                                        <tr>
                                            <td class="right">Booking For</td>
                                            <td class="center">:</td>
                                            <td class="left"><?php echo $purchase_data['ticket_type'];?></td>
                                            <td class="right">Billing Date</td>
                                            <td class="center">:</td>
                                            <td class="left"><?php echo date('d/m/Y');//$bill_data['p_date'];?>
                                            </td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
            </table>
        </td>
    </tr>
    <tr>
        <td>
            <table width="90%" style="display: table; margin: 0 auto" class="billblock">
                <tr>
                    <td class="left">Ticket No.</td>
                    <td class="left">PNR</td>
                    <td class="left" width="110">Pax Name</td>
                    <td class="left"><?php if($purchase_data['return_journey'] == 'no' && $purchase_data['go_journey'] == 'no') {?>Both Date<?php } elseif($purchase_data['return_journey'] == 'no') {?>Return<br/>Date<?php }elseif($purchase_data['go_journey'] == 'no') { ?>Journey<br>Date<?php }?></td>
                    <td class="left">From</td>
                    <td class="left">To</td>
                    <td class="left"><?php if($purchase_data['ticket_type'] == 'Railway') { echo 'Train' ; } else { echo 'Flight';}?><br>Details</td>
                    
                    <td class="right">Basic</td>
                    <td class="right">Service<br>Taxes</td>
                    <td class="right" width="50">Total</td>
                </tr>
               
                <tr class="countthis">
                    <td>
                       <?php echo $purchase_data['ticket_no'];?></td>
                          
                    <td>
                        <?php echo $purchase_data['pnr_no'];?>
                    </td>
                    
                       <td><?php echo $refund_data['c_name'];?></td>
                        
                    <td><?php if($purchase_data['return_journey'] == 'no' && $purchase_data['go_journey'] == 'no') {?><?php echo $purchase_data['journey_date'];?><br/><?php echo $purchase_data['return_date'];?><?php } elseif($purchase_data['return_journey'] == 'no') {?><?php echo $purchase_data['return_date'];?><?php }elseif($purchase_data['go_journey'] == 'no') { ?><?php echo $purchase_data['journey_date'];?><?php }?></td>
                            
                        <td>
                       <?php if($purchase_data['go_journey'] == 'no') echo $purchase_data['j_from']; else echo $purchase_data['return_from'];?></td>
                           
                    <td>
                        <?php if($purchase_data['go_journey'] == 'no') echo $purchase_data['j_to']; else echo $purchase_data['return_to'];?></td>
                           
                    <td>
                        <?php if($purchase_data['go_journey'] == 'no') echo $purchase_data['train_name']; else echo $purchase_data['return_vehicle'];?></td>
                           
                    <td class="right">
                        <?php echo $refund_data['refund_amount'];?></td>
                            
                    <td class="right">
                        <?php echo $refund_data['gtax'];?></td>
                    <td class="right">
                        <?php echo $refund_data['refund_amount'] - $refund_data['gtax'] ;?></td>
                </tr>
                <tr>
                    <td></td><td></td><td></td><td></td><td></td><td></td>
                    <td colspan="3" class="right">Transaction Charges</td>
                    <td class="right"><?php echo $refund_data['refund_handling_charge'];?></td>
                </tr>
                 <tr>
                    <td class="dummy-hfix"></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td>
                </tr>
                <tr>
                    <td colspan="9"><?php echo no_to_words($refund_data['rf_charge']);?> Only</td>
                    <td class="right">Rs. <?php echo $refund_data['rf_charge'];?></td>
                </tr>
            </table>
        </td>
    </tr>
    <tr>
        <td>
            <table width="90%" style="display: table; margin: 0 auto">
                <tr>
                    <td width="70%">Service Tax No. : ACPPC2936CST001</td>
                    <td class="right medium" width="30%" rowspan="3" style="vertical-align: top">For CHAURASIA TRAVELS</td>
                </tr>
                <tr>
                    <td>PAN No. : ACPPC2936C</td>
                </tr>
                <tr>
                    <td class="medium">E.& O.E.</td>
                </tr>
                <tr>
                    <td><span style="text-decoration: underline">Terms & Conditions :</span></td>
                </tr>
                <tr>
                    <td colspan="2">
                        <table width="85%">
                            <tr>
                                <td style="vertical-align: top" width="82">CASH</td>
                                <td style="vertical-align: top">:</td>
                                <td style="vertical-align: top">Payment to be made to the cashier & printed Official Reciept must be obtained.</td>
                            </tr>
                            <tr>
                                <td style="vertical-align: top">CHEQUE</td>
                                <td style="vertical-align: top">:</td>
                                <td style="vertical-align: top">All cheques / demand drafts in payment of bills must be crossed 'A/c Payee Only' and drawn in favour of CHAURASIA TRAVELS.</td>
                            </tr>
                            <tr>
                                <td style="vertical-align: top">LATE PAYMENT</td>
                                <td style="vertical-align: top">:</td>
                                <td style="vertical-align: top">Interest @ 24% per annum will be charged on all outstanding bills after due date.</td>
                            </tr>
                            <tr>
                                <td style="vertical-align: top">VERY IMP.</td>
                                <td style="vertical-align: top">:</td>
                                <td style="vertical-align: top">Kindly check all details carefully to avoid unnecessary complications.</td>
                            </tr>
                        </table>
                    </td>
                </tr>
            </table>
        </td>
    </tr>
</table>
<br/><br/><br/><br/><br/><br/><br/><br/><br/>
<hr style="margin: 40px 0; width: 648px; padding: 0">
<table width="670" style="max-height: 432px">
    <tr>
        <td>
            <table width="90%" style="display: table; margin: 0 auto">
                <tr>
                    <td class="center big bold">CHAURASIA TRAVELS <span style="position: absolute; right: 0; font-weight: 400; font-size: 14px">OFFICE COPY</span></td>
                </tr>
                <tr>
                    <td class="center">2, CHURCH LANE, GROUND FLOOR, ROOM NO.1B, KOLKATA -700001</td>
                </tr>
                <tr>
                    <td class="center"><span style="text-decoration: underline">TEL : 4005 6361/4005 6024/9830091167&nbsp;&nbsp;&nbsp;&nbsp;WEBSITE : chaurasiatravels.com&nbsp;&nbsp;&nbsp;&nbsp;Email : cttravels2001@gmail.com</span></td>
                </tr>
                <tr>
                    <td class="center big pad-top">CREDIT NOTE</td>
                </tr>
                <tr>
                    <td>
                        <table width="100%">
                            <tr>
                                <td width="50%">
                                    <table>
                                        <tr>
                                            <td>To M/s.</td>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                         <tr>
                                            <td><?php echo $purchase_data1['customer_name'];?><br/><?php echo $purchase_data1['customer_proof'];?></td>
                                            <td><br/></td>
                                            <td></td>
                                        </tr>
                                    </table>
                                </td>
                                <td width="50%" style="vertical-align: top">
                                    <table width="100%">
                                        <tr>
                                            <td class="right"></td>
                                            <td class="center"></td>
                                            <td class="left"></td>
                                            <td class="right" style="font-size: 12px; font-weight: bold">CR. No.</td>
                                            <td class="center" style="font-size: 12px; font-weight: bold">:</td>
                                            <td class="left" style="font-size: 12px; font-weight: bold"><?php echo $refund_data1['rid'];?></td>
                                        </tr>
                                        <tr>
                                            <td class="right">Booking For</td>
                                            <td class="center">:</td>
                                            <td class="left"><?php echo $purchase_data1['ticket_type'];?></td>
                                            <td class="right">Billing Date</td>
                                            <td class="center">:</td>
                                            <td class="left"><?php echo date('d/m/Y');//$bill_data['p_date'];?>
                                            </td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
            </table>
        </td>
    </tr>
    <tr>
        <td>
            <table width="90%" style="display: table; margin: 0 auto" class="billblock">
                <tr>
                    <td class="left">Ticket No.</td>
                    <td class="left">PNR</td>
                    <td class="left" width="110">Pax Name</td>
                    <td class="left"><?php if($purchase_data1['return_journey'] == 'no' && $purchase_data1['go_journey'] == 'no') {?>Both Date<?php } elseif($purchase_data1['return_journey'] == 'no') {?>Return<br/>Date<?php }elseif($purchase_data1['go_journey'] == 'no') { ?>Journey<br>Date<?php }?></td>
                    <td class="left">From</td>
                    <td class="left">To</td>
                    <td class="left"><?php if($purchase_data1['ticket_type'] == 'Railway') { echo 'Train' ; } else { echo 'Flight';}?><br>Details</td>
                    
                    <td class="right">Basic</td>
                    <td class="right">Service<br>Taxes</td>
                    <td class="right" width="50">Total</td>
                </tr>
               
                <tr class="countthis">
                    <td>
                       <?php echo $purchase_data1['ticket_no'];?></td>
                          
                    <td>
                        <?php echo $purchase_data1['pnr_no'];?>
                    </td>
                    
                       <td><?php echo $refund_data1['c_name'];?></td>
                        
                    <td><?php if($purchase_data1['return_journey'] == 'no' && $purchase_data1['go_journey'] == 'no') {?><?php echo $purchase_data1['journey_date'];?><br/><?php echo $purchase_data1['return_date'];?><?php } elseif($purchase_data1['return_journey'] == 'no') {?><?php echo $purchase_data1['return_date'];?><?php }elseif($purchase_data1['go_journey'] == 'no') { ?><?php echo $purchase_data1['journey_date'];?><?php }?></td>
                            
                        <td>
                       <?php if($purchase_data1['go_journey'] == 'no') echo $purchase_data1['j_from']; else echo $purchase_data['return_from'];?></td>
                           
                    <td>
                        <?php if($purchase_data1['go_journey'] == 'no') echo $purchase_data1['j_to']; else echo $purchase_data1['return_to'];?></td>
                           
                    <td>
                        <?php if($purchase_data1['go_journey'] == 'no') echo $purchase_data1['train_name']; else echo $purchase_data1['return_vehicle'];?></td>
                           
                    <td class="right">
                        <?php echo $refund_data1['refund_amount'];?></td>
                            
                    <td class="right">
                        <?php echo $refund_data1['gtax'];?></td>
                    <td class="right">
                        <?php echo $refund_data1['refund_amount'] - $refund_data1['gtax'] ;?></td>
                </tr>
                <tr>
                    <td></td><td></td><td></td><td></td><td></td><td></td>
                    <td colspan="3" class="right">Transaction Charges</td>
                    <td class="right"><?php echo $refund_data1['refund_handling_charge'];?></td>
                </tr>
                 <tr>
                    <td class="dummy-hfix"></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td>
                </tr>
                <tr>
                    <td colspan="9"><?php echo no_to_words($refund_data1['rf_charge']);?> Only</td>
                    <td class="right">Rs. <?php echo $refund_data1['rf_charge'];?></td>
                </tr>
            </table>
        </td>
    </tr>
    <tr>
        <td>
            <table width="90%" style="display: table; margin: 0 auto">
                <tr>
                    <td width="70%">Service Tax No. : ACPPC2936CST001</td>
                    <td class="right medium" width="30%" rowspan="3" style="vertical-align: top">For CHAURASIA TRAVELS</td>
                </tr>
                <tr>
                    <td>PAN No. : ACPPC2936C</td>
                </tr>
                <tr>
                    <td class="medium">E.& O.E.</td>
                </tr>
                <tr>
                    <td><span style="text-decoration: underline">Terms & Conditions :</span></td>
                </tr>
                <tr>
                    <td colspan="2">
                        <table width="85%">
                            <tr>
                                <td style="vertical-align: top" width="82">CASH</td>
                                <td style="vertical-align: top">:</td>
                                <td style="vertical-align: top">Payment to be made to the cashier & printed Official Reciept must be obtained.</td>
                            </tr>
                            <tr>
                                <td style="vertical-align: top">CHEQUE</td>
                                <td style="vertical-align: top">:</td>
                                <td style="vertical-align: top">All cheques / demand drafts in payment of bills must be crossed 'A/c Payee Only' and drawn in favour of CHAURASIA TRAVELS.</td>
                            </tr>
                            <tr>
                                <td style="vertical-align: top">LATE PAYMENT</td>
                                <td style="vertical-align: top">:</td>
                                <td style="vertical-align: top">Interest @ 24% per annum will be charged on all outstanding bills after due date.</td>
                            </tr>
                            <tr>
                                <td style="vertical-align: top">VERY IMP.</td>
                                <td style="vertical-align: top">:</td>
                                <td style="vertical-align: top">Kindly check all details carefully to avoid unnecessary complications.</td>
                            </tr>
                        </table>
                    </td>
                </tr>
            </table>
        </td>
    </tr>
</table>
</body>
</html>