<?php
include('connection.php');
include('convert2.php');
$bill = 'SELECT * FROM td_purchase WHERE purchase_id='.$_REQUEST['bill_id'];
$bill_query = mysql_query($bill, $con) or die(mysql_error());
$bill_data = mysql_fetch_assoc($bill_query);

$bill1 = 'SELECT * FROM td_customer WHERE cust_name="'.$bill_data['customer_name'].'"';
$bill_query1 = mysql_query($bill1, $con) or die(mysql_error());
$bill_data1 = mysql_fetch_assoc($bill_query1);
// Get Refund

// $number = $bill_data['sell_price'];
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
        input {border: none; outline: none; padding: 0; margin:0; background: transparent;}
    </style>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script><!-- 33 KB -->
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
                    <td class="center big pad-top">INVOICE</td>
                </tr>
                <tr>
                    <td>
                        <table width="100%">
                            <tr>
                                <td width="50%">
                                    <table>
                                        <tr>
                                            <td>To M/s.</td>
                                            <td><br/></td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td><?php echo $bill_data['customer_name'];?><br/><?php echo $bill_data['customer_proof'];?><br/><?php echo $bill_data1['cust_gst'];?></td>
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
                                            <td class="right" style="font-size: 12px; font-weight: bold">INVOICE NO.</td>
                                            <td class="center" style="font-size: 12px; font-weight: bold">:</td>
                                            <td class="left" style="font-size: 12px; font-weight: bold"><?php echo $bill_data['purchase_id'];?></td>
                                        </tr>
                                        <tr>
                                            <td class="right">Booking For</td>
                                            <td class="center">:</td>
                                            <td class="left"><?php echo $bill_data['ticket_type'];?></td>
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
                    <td class="left">Journey<br>Date</td>
                    <td class="left">From</td>
                    <td class="left">To</td>
                    <td class="left"><?php if($bill_data['ticket_type'] == 'Railway') { echo 'Train' ; } else { echo 'Flight';}?><br>Details</td>
                    
                    <td class="right">Fare</td>
                   <!--  <td class="right">Service<br>Tax</td>
                    <td class="right"><input type="text" value="Handling" style="width:34px; font-size:9px; " /><br>Charge</td> -->
                    <td class="right" width="50">Total</td>
                </tr>
                   

               <!--  <tr class="countthis">
                    <td>
                        <?php echo $bill_data['ticket_no'];?>
                    </td>
                    <td>
                        <?php echo $bill_data['pnr_no'];?>
                    </td>
                    <td>
                        <?php echo $bill_data['customer_name'];?>
                    </td>
                    <td>
                        <?php echo $bill_data['journey_date'];?>
                    </td>
                    <td>
                        <?php echo $bill_data['j_from'];?>
                    </td>
                    <td>
                        <?php echo $bill_data['j_to'];?>
                    </td>
                    <td>
                        <?php echo $bill_data['train_name'];?>
                    </td>
                    <td class="right">
                        <?php echo round(($bill_data['p_amount']/$bill_data['head_number']),2);?>
                    </td>
                    <td class="right">
                        <?php echo $bill_data['govt_price']/$bill_data['head_number'];?>
                    </td>
                    <td class="right">
                        <?php echo $bill_data['handling_charge'];?>
                    </td>
                    <td class="right">
                        <?php echo round((($bill_data['p_amount']/$bill_data['head_number']) + ($bill_data['govt_price']/$bill_data['head_number']) + $bill_data['handling_charge']),2);?>
                    </td>
                </tr> -->
                <?php 
                $neg = (($bill_data['govt_price']*($bill_data['head_number']+$bill_data['return_persons'])) +($bill_data['handling_charge']*($bill_data['head_number']+$bill_data['return_persons'])));
                if($bill_data['head_number'] > 0) { 
                		
                        $sql_c = 'SELECT * FROM td_p_customer WHERE pid='.$bill_data['purchase_id'];
                        $c_q = mysql_query($sql_c, $con) or die(mysql_error());
                        $c_data = mysql_fetch_assoc($c_q);
                         $i=1; do {
                    ?>
                    <tr class="countthis">
                    <td>
                        <?php echo $bill_data['ticket_no'];?></td>
                    </td>
                    <td>
                        <?php echo $bill_data['pnr_no'];?>
                    </td>
                    <td>
                        <?php echo $c_data['c_name'];?></td>
                    </td>
                    <td>
                        <?php echo $bill_data['journey_date'];?>
                    </td>
                    <td>
                        <?php echo $bill_data['j_from'];?>
                    </td>
                    <td>
                        <?php echo $bill_data['j_to'];?></td>
                    </td>
                    <td>
                        <?php echo $bill_data['train_name'];?></td>
                    </td>
                    <td class="right">
                        <?php if($i == 1) { echo round($bill_data['p_amount'],2);}?></td>
                    </td>
                    <!-- <td class="right">
                        <?php echo $bill_data['govt_price']/$bill_data['head_number'];?></td>
                    </td>
                    <td class="right">
                        <?php echo $bill_data['handling_charge'];?></td>
                    </td> -->
                    <td class="right">
                     &nbsp;
                        <?php //echo round((($bill_data['p_amount']/$bill_data['head_number']) + ($bill_data['govt_price']/$bill_data['head_number']) + $bill_data['handling_charge']),2);?></td>
                    </td>
                </tr>
                <?php $i++;} while($c_data = mysql_fetch_assoc($c_q));}?>
                <?php if($bill_data['return_journey'] == 'yes') { ?>
               <!--  <tr class="countthis">
                    <td>
                        <?php echo $bill_data['return_ticket_number'];?>
                    </td>
                    <td>
                        <?php echo $bill_data['return_pnr_no'];?>
                    </td>
                    <td>
                        <?php echo $bill_data['customer_name'];?>
                    </td>
                    <td>
                        <?php echo $bill_data['return_date'];?>
                    </td>
                    <td>
                        <?php echo $bill_data['return_from'];?>
                    </td>
                    <td>
                        <?php echo $bill_data['return_to'];?>
                    </td>
                    <td>
                        <?php echo $bill_data['return_vehicle'];?>
                    </td>
                    <td class="right">
                        <?php echo round(($bill_data['return_amount']/$bill_data['return_persons']),2);?>
                    </td>
                    <td class="right">
                        <?php echo $bill_data['return_s_tax']/$bill_data['return_persons'];?>
                    </td>
                    <td class="right">
                        <?php echo $bill_data['return_handling_charge'];?>
                    </td>
                    <td class="right">
                        <?php echo round((($bill_data['return_amount']/$bill_data['return_persons']) + ($bill_data['return_s_tax']/$bill_data['return_persons']) + $bill_data['return_handling_charge']),2);?>
                    </td>
                </tr> -->

                <?php 
                $neg = (($bill_data['return_s_tax']*($bill_data['return_persons']+$bill_data['head_number'])) +($bill_data['return_handling_charge']*($bill_data['return_persons']+$bill_data['head_number'])));
                if($bill_data['return_persons'] > 0) { 
                		
                        $sql_c1 = 'SELECT * FROM td_r_customer WHERE pr_id='.$bill_data['purchase_id'];
                        $c_q1 = mysql_query($sql_c1, $con) or die(mysql_error());
                        $c_data1 = mysql_fetch_assoc($c_q1);
                        $j=1; do {
                    ?>
                    <tr class="countthis">
                    <td>
                        <?php echo $bill_data['return_ticket_number'];?></td>
                    </td>
                    <td>
                        <?php echo $bill_data['return_pnr_no'];?>
                    </td>
                    <td>
                        <?php echo $c_data1['rc_name'];?></td>
                    </td>
                    <td>
                        <?php echo $bill_data['return_date'];?>
                    </td>
                    <td>
                        <?php echo $bill_data['return_from'];?>
                    </td>
                    <td>
                        <?php echo $bill_data['return_to'];?></td>
                    </td>
                    <td>
                        <?php echo $bill_data['return_vehicle'];?></td>
                    </td>
                    <td class="right">
                        <?php if($j == 1) { echo round($bill_data['return_amount'],2);}?></td>
                    </td>
                    <!-- <td class="right">
                        <?php echo round(($bill_data['return_amount']/$bill_data['return_persons']),2);?></td>
                    </td> -->
                    <!-- <td class="right">
                        <?php echo $bill_data['return_s_tax']/$bill_data['return_persons'];?></td>
                    </td>
                    <td class="right">
                        <?php echo $bill_data['return_handling_charge'];?></td>
                    </td> -->
                    <td class="right">
                     &nbsp;
                        <?php //echo round((($bill_data['return_amount']/$bill_data['return_persons']) + ($bill_data['return_s_tax']/$bill_data['return_persons']) + $bill_data['return_handling_charge']),2);?></td>
                    </td>
                </tr>
                <?php $j++; } while($c_data1 = mysql_fetch_assoc($c_q1));}?>
                <?php } ?>

                <tr>
                    <td class="dummy-hfix"></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td>
                </tr>
                <tr>
                <?php if($bill_data['return_journey'] == 'yes') { ?>
                    <td colspan="8"><?php echo no_to_words($bill_data['p_amount']+$bill_data['return_amount']);?> Only</td>
                    <td class="right">Rs. <?php echo ($bill_data['p_amount']+$bill_data['return_amount']);?></td>
                <?php } else { ?>
                <td colspan="8"><?php echo no_to_words($bill_data['p_amount']);?> Only</td>
                    <td class="right">Rs. <?php echo $bill_data['p_amount'];?></td>
                    <?php } ?>    
                    <!-- <td colspan="8"><?php echo no_to_words($bill_data['sell_price'] - $neg);?> Only</td>
                    <td class="right">Rs. <?php echo $bill_data['sell_price'] - $neg;?></td> -->
                </tr>
            </table>
        </td>
    </tr>
    <tr>
        <td>
            <table width="90%" style="display: table; margin: 0 auto">
                <tr>
                    <td width="70%">GST ID. : 19ACPPC2936C1ZQ</td>
                    <td class="right medium" width="30%" rowspan="3" style="vertical-align: top">For CHAURASIA TRAVELS</td>
                </tr>
                <tr>
                    <td>SAC Code. : <?php echo $bill_data['sac_code'];?><br>PAN No. : ACPPC2936C</td>
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
<br/>
<hr style="margin: 10px 0; width: 648px; padding: 0">
<br/>
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
                    <td class="center big pad-top">HANDLING/SERVICE CHARGE</td>
                </tr>
                <tr>
                    <td>
                        <table width="100%">
                            <tr>
                                <td width="50%">
                                    <table>
                                        <tr>
                                            <td>To M/s.</td>
                                            <td><br/></td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td><?php echo $bill_data['customer_name'];?><br/><?php echo $bill_data['customer_proof'];?><br/><?php echo $bill_data['cust_gst'];?></td>
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
                                            <td class="right" style="font-size: 12px; font-weight: bold">INVOICE NO.</td>
                                            <td class="center" style="font-size: 12px; font-weight: bold">:</td>
                                            <td class="left" style="font-size: 12px; font-weight: bold"><?php echo $bill_data['purchase_id'];?></td>
                                        </tr>
                                        <tr>
                                            <td class="right">Booking For</td>
                                            <td class="center">:</td>
                                            <td class="left"><?php echo $bill_data['ticket_type'];?></td>
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
                    <td class="left">Journey<br>Date</td>
                    <td class="left">From</td>
                    <td class="left">To</td>
                    <td class="left"><?php if($bill_data['ticket_type'] == 'Railway') { echo 'Train' ; } else { echo 'Flight';}?><br>Details</td>
                    <td class="right"><input type="text" value="Handling" style="width:34px; font-size:9px; " /><br>Charge</td>
                    <td class="right">CGST</td>
                     <td class="right">SGST</td>
                     <td class="right">IGST</td>
                    <td class="right" width="50">Total</td>
                </tr>
                   

               <!--  <tr class="countthis">
                    <td>
                        <?php echo $bill_data['ticket_no'];?>
                    </td>
                    <td>
                        <?php echo $bill_data['pnr_no'];?>
                    </td>
                    <td>
                        <?php echo $bill_data['customer_name'];?>
                    </td>
                    <td>
                        <?php echo $bill_data['journey_date'];?>
                    </td>
                    <td>
                        <?php echo $bill_data['j_from'];?>
                    </td>
                    <td>
                        <?php echo $bill_data['j_to'];?>
                    </td>
                    <td>
                        <?php echo $bill_data['train_name'];?>
                    </td>
                    <td class="right">
                        <?php echo round(($bill_data['p_amount']/$bill_data['head_number']),2);?>
                    </td>
                    <td class="right">
                        <?php echo $bill_data['govt_price']/$bill_data['head_number'];?>
                    </td>
                    <td class="right">
                        <?php echo $bill_data['handling_charge'];?>
                    </td>
                    <td class="right">
                        <?php echo round((($bill_data['p_amount']/$bill_data['head_number']) + ($bill_data['govt_price']/$bill_data['head_number']) + $bill_data['handling_charge']),2);?>
                    </td>
                </tr> -->
                <?php 
                 $neg1 = (($bill_data['govt_price']) +($bill_data['handling_charge']*$bill_data['head_number']));
                if($bill_data['head_number'] > 0) { 

                        $sql_c = 'SELECT * FROM td_p_customer WHERE pid='.$bill_data['purchase_id'];
                        $c_q = mysql_query($sql_c, $con) or die(mysql_error());
                        $c_data = mysql_fetch_assoc($c_q);
                         $i=1; do {
                    ?>
                    <tr class="countthis">
                    <td>
                        <?php echo $bill_data['ticket_no'];?></td>
                    </td>
                    <td>
                        <?php echo $bill_data['pnr_no'];?>
                    </td>
                    <td>
                        <?php echo $c_data['c_name'];?></td>
                    </td>
                    <td>
                        <?php echo $bill_data['journey_date'];?>
                    </td>
                    <td>
                        <?php echo $bill_data['j_from'];?>
                    </td>
                    <td>
                        <?php echo $bill_data['j_to'];?></td>
                    </td>
                    <td>
                        <?php echo $bill_data['train_name'];?></td>
                    </td>
                    <!-- <td class="right">
                        <?php if($i == 1) { echo round($bill_data['p_amount'],2);}?></td>
                    </td> -->
                    <td class="right">
                        <?php echo $bill_data['handling_charge'];?></td>
                    </td>
                    <td class="right">
                       <?php echo $bill_data['cgst_amt'];?>
                    </td>
                    <td class="right">
                       <?php echo $bill_data['sgst_amt'];?>
                    </td>
                     <td class="right">
                       <?php echo $bill_data['igst_amt']/$bill_data['head_number'];?>
                    </td>
                    
                    <td class="right">
                     &nbsp;
                        <?php //echo round((($bill_data['p_amount']/$bill_data['head_number']) + ($bill_data['govt_price']/$bill_data['head_number']) + $bill_data['handling_charge']),2);?></td>
                    </td>
                </tr>
                <?php $i++;} while($c_data = mysql_fetch_assoc($c_q));}?>
                <?php if($bill_data['return_journey'] == 'yes') { ?>
               <!--  <tr class="countthis">
                    <td>
                        <?php echo $bill_data['return_ticket_number'];?>
                    </td>
                    <td>
                        <?php echo $bill_data['return_pnr_no'];?>
                    </td>
                    <td>
                        <?php echo $bill_data['customer_name'];?>
                    </td>
                    <td>
                        <?php echo $bill_data['return_date'];?>
                    </td>
                    <td>
                        <?php echo $bill_data['return_from'];?>
                    </td>
                    <td>
                        <?php echo $bill_data['return_to'];?>
                    </td>
                    <td>
                        <?php echo $bill_data['return_vehicle'];?>
                    </td>
                    <td class="right">
                        <?php echo round(($bill_data['return_amount']/$bill_data['return_persons']),2);?>
                    </td>
                    <td class="right">
                        <?php echo $bill_data['return_s_tax']/$bill_data['return_persons'];?>
                    </td>
                    <td class="right">
                        <?php echo $bill_data['return_handling_charge'];?>
                    </td>
                    <td class="right">
                        <?php echo round((($bill_data['return_amount']/$bill_data['return_persons']) + ($bill_data['return_s_tax']/$bill_data['return_persons']) + $bill_data['return_handling_charge']),2);?>
                    </td>
                </tr> -->

                <?php 
                $neg12 = (($bill_data['return_s_tax']) +($bill_data['return_handling_charge']*$bill_data['return_persons']));
                if($bill_data['return_persons'] > 0) { 

                        $sql_c1 = 'SELECT * FROM td_r_customer WHERE pr_id='.$bill_data['purchase_id'];
                        $c_q1 = mysql_query($sql_c1, $con) or die(mysql_error());
                        $c_data1 = mysql_fetch_assoc($c_q1);
                        $j=1; do {
                    ?>
                    <tr class="countthis">
                    <td>
                        <?php echo $bill_data['return_ticket_number'];?></td>
                    </td>
                    <td>
                        <?php echo $bill_data['return_pnr_no'];?>
                    </td>
                    <td>
                        <?php echo $c_data1['rc_name'];?></td>
                    </td>
                    <td>
                        <?php echo $bill_data['return_date'];?>
                    </td>
                    <td>
                        <?php echo $bill_data['return_from'];?>
                    </td>
                    <td>
                        <?php echo $bill_data['return_to'];?></td>
                    </td>
                    <td>
                        <?php echo $bill_data['return_vehicle'];?></td>
                    </td>
                    <!-- <td class="right">
                        <?php if($j == 1) { echo round($bill_data['return_amount'],2);}?></td>
                    </td> -->
                    <!-- <td class="right">
                        <?php echo round(($bill_data['return_amount']/$bill_data['return_persons']),2);?></td>
                    </td> -->
                    <td class="right">
                        <?php echo $bill_data['return_handling_charge'];?></td>
                    </td>
                    <td class="right">
                       <?php echo $bill_data['cgst_amt1'];?>
                    </td>
                     <td class="right">
                       <?php echo $bill_data['sgst_amt1'];?>
                    </td>
                    <td class="right">
                       <?php echo $bill_data['igst_amt1']/$bill_data['return_persons'];?>
                    </td>
                    <td class="right">
                     &nbsp;
                        <?php //echo round((($bill_data['return_amount']/$bill_data['return_persons']) + ($bill_data['return_s_tax']/$bill_data['return_persons']) + $bill_data['return_handling_charge']),2);?></td>
                    </td>
                </tr>
                <?php $j++; } while($c_data1 = mysql_fetch_assoc($c_q1));}?>
                <?php } ?>

                <tr>
                    <td class="dummy-hfix"></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td>
                </tr>
                <tr>
                    <?php if($bill_data['return_journey'] == 'yes') { ?>
                    <td colspan="11"><?php echo no_to_words($neg1+$neg12);?> Only</td>
                    <td class="right">Rs. <?php echo ($neg1+$neg12);?></td>
                    <?php } else { ?>
                    <td colspan="11"><?php echo no_to_words($neg1);?> Only</td>
                    <td class="right">Rs. <?php echo $neg1;?></td>
                    <?php } ?>
                </tr>
            </table>
        </td>
    </tr>
    <tr>
        <td>
            <table width="90%" style="display: table; margin: 0 auto">
                <tr>
                    <td width="70%">GST ID. : 19ACPPC2936C1ZQ</td>
                    <td class="right medium" width="30%" rowspan="3" style="vertical-align: top">For CHAURASIA TRAVELS</td>
                </tr>
                <tr>
                    <td>SAC Code. : <?php echo $bill_data['sac_code'];?><br>PAN No. : ACPPC2936C</td>
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
<script>
    $countthis=0;
    $hfix = 149;
    $('.countthis').each(function(){$countthis++; $hfix = $hfix - $(this).height(); console.log($hfix)});
    $('.dummy-hfix').height($hfix);
</script>
</body>
</html>