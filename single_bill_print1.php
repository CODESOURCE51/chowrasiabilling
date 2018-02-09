<?php
include('connection.php');
include('convert2.php');
$bill = 'SELECT * FROM td_purchase WHERE purchase_id='.$_REQUEST['bill_id'];
$bill_query = mysql_query($bill, $con) or die(mysql_error());
$bill_data = mysql_fetch_assoc($bill_query);
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
    <style>
        body {font-size: 11px; font-family: sans-serif}
        table {border-collapse: collapse}
        .center {text-align: center}
        .left {text-align: left}
        .right {text-align: right}
        .bold {font-weight: 600}
        .big {font-size: 13px; font-family: Rockwell, serif}
        .big.bold {font-size: 15px}
        .bb {border-bottom: 1px solid}
        .bt {border-top: 1px solid}
        .bbd {border-bottom: 1px double}
        .btd {border-top: 1px double}
        .outline {outline: 1px solid deeppink}
        .billblock>tbody>tr>td {border-right: 1px solid; padding: 2px}
        .billblock>tbody>tr>td:last-child {border-right: none}
        .billblock>tbody> tr:first-child >td {border-top: 1px solid; border-bottom: 1px solid}
        .billblock>tbody> tr:last-child >td {border-bottom: 1px solid}
        .billblock table {width: 100%}
        .billblock td {vertical-align: top}
        .billblock>tbody>tr:nth-last-child(1)>td {border-top: 1px solid}
    </style>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script> <!-- 33 KB -->
</head>
<body>
<table width="648" style="max-height: 432px;">
    <tr>
        <td>
            <table width="90%" style="display: table; margin: 0 auto">
                <tr>
                    <td class="center big bold" style="position: relative;">CHAURASIA TRAVELS <span style="position: absolute; right:0; font-weight:300; font-family:serif">OFFICE COPY</span></td>
                </tr>
                <tr>
                    <td class="center">2, CHURCH LANE, GROUND FLOOR, ROOM NO.1B, KOLKATA -700144</td>
                </tr>
                <tr>
                    <td class="center">TEL : 4005 6361/4005 6024/93310 02070&nbsp;&nbsp;&nbsp;&nbsp;cttravels2001@gmail.com</td>
                </tr>
                <tr>
                    <td>PAN: {pan no here}</td>
                </tr>
                <tr>
                    <td class="center big">INVOICE</td>
                </tr>
                <tr>
                    <td>
                        <table width="100%">
                            <tr>
                                <td width="50%">
                                    <table>
                                        <tr>
                                            <td>To M/s.</td>
                                            <td>:</td>
                                            <td><?php echo $bill_data['customer_proof'];?></td>
                                        </tr>
                                        
                                    </table>
                                </td>
                                <td width="50%" style="vertical-align: top">
                                    <table width="100%">
                                        <tr>
                                            <td class="right">Inv. No.</td>
                                            <td class="center">:</td>
                                            <td class="left"><?php echo $bill_data['purchase_id'];?></td>
                                            <td class="right">Date</td>
                                            <td class="center">:</td>
                                            <td class="left"><?php echo $bill_data['p_date'];?></td>
                                        </tr>
                                        
                                        <tr>
                                            <td class="right">Booking For</td>
                                            <td class="center">:</td>
                                            <td class="left"><?php echo $bill_data['ticket_type'];?></td>
                                            <td class="right">Journey Date</td>
                                            <td class="center">:</td>
                                            <td class="left"><?php echo $bill_data['journey_date'];?></td>
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
                    <td class="left" width="110">Pax Name</td>
                    <td class="left">Destination</td>
                    <td class="left"><?php if($bill_data['ticket_type'] == 'Railway') { echo 'Train' ; } else { echo 'Flight';}?> Details</td>
                    <td class="right">Basic</td>
                    <td class="right">Service Taxes</td>
                    <td class="right">Handling Charge</td>
                    <td class="right">Total Amount</td>
                </tr>

                <tr class="countthis">
                    <td>
                        <?php echo $bill_data['ticket_no'];?>
                    </td>
                    <td>
                        <?php echo $bill_data['customer_name'];?>
                    </td>
                    <td>
                        <?php echo $bill_data['j_to'];?>
                    </td>
                    <td>
                        <?php echo $bill_data['train_name'];?>
                    </td>
                    <td class="right">
                        <?php echo $bill_data['p_amount']/$bill_data['head_number'];?>
                    </td>
                    <td class="right">
                        <?php echo $bill_data['govt_price']/$bill_data['head_number'];?>
                    </td>
                    <td class="right">
                        <?php echo $bill_data['handling_charge'];?>
                    </td>
                    <td class="right">
                        <?php echo ($bill_data['p_amount']/$bill_data['head_number']) + ($bill_data['govt_price']/$bill_data['head_number']) + $bill_data['handling_charge'];?>
                    </td>
                </tr>
                <?php if($bill_data['head_number'] > 1) { 

                        $sql_c = 'SELECT * FROM td_p_customer WHERE pid='.$bill_data['purchase_id'];
                        $c_q = mysql_query($sql_c, $con) or die(mysql_error());
                        $c_data = mysql_fetch_assoc($c_q);
                        do {
                    ?>
                    <tr class="countthis">
                    <td>
                        <?php echo $bill_data['ticket_no'];?></td>
                    </td>
                    <td>
                        <?php echo $c_data['c_name'];?></td>
                    </td>
                    <td>
                        <?php echo $bill_data['j_to'];?></td>
                    </td>
                    <td>
                        <?php echo $bill_data['train_name'];?></td>
                    </td>
                    <td class="right">
                        <?php echo $bill_data['p_amount']/$bill_data['head_number'];?></td>
                    </td>
                    <td class="right">
                        <?php echo $bill_data['govt_price']/$bill_data['head_number'];?></td>
                    </td>
                    <td class="right">
                        <?php echo $bill_data['handling_charge'];?></td>
                    </td>
                    <td class="right">
                        <?php echo ($bill_data['p_amount']/$bill_data['head_number']) + ($bill_data['govt_price']/$bill_data['head_number']) + $bill_data['handling_charge'];?></td>
                    </td>
                </tr>
                <?php } while($c_data = mysql_fetch_assoc($c_q));}?>
                
                <tr>
                    <td class="dummy-hfix"></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td>
                </tr>
                <tr>
                   <td colspan="7"><?php echo no_to_words($bill_data['sell_price']);?> Only</td>
                   <!--  <td colspan="7">INR <?php  echo $result . "Rupees  ";?></td> -->
                    <td class="right">Rs. <?php echo round($bill_data['sell_price'],1);?></td>
                </tr>
            </table>
        </td>
    </tr>
    <tr>
        <td>
            <table width="90%" style="display: table; margin: 0 auto">
                <tr>
                    <td width="70%">Service Tax No. : SEPPC2936CST001</td>
                    <td width="30%"></td>
                </tr>
                <tr>
                    <td class="big">E.& O.E.</td>
                    <td class="right big">For CHAURASIA TRAVELS</td>
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


<table width="648" style="max-height: 432px; margin-top:130px;">
    <tr>
        <td>
            <table width="90%" style="display: table; margin: 0 auto">
                <tr>
                    <td class="center big bold" style="position: relative;">CHAURASIA TRAVELS <span style="position: absolute; right:0; font-weight:300; font-family:serif">CUSTOMER COPY</span></td>
                </tr>
                <tr>
                    <td class="center">2, CHURCH LANE, GROUND FLOOR, ROOM NO.1B, KOLKATA -700144</td>
                </tr>
                <tr>
                    <td class="center">TEL : 4005 6361/4005 6024/93310 02070&nbsp;&nbsp;&nbsp;&nbsp;cttravels2001@gmail.com</td>
                </tr>
                <tr>
                    <td>PAN: {pan no here}</td>
                </tr>
                <tr>
                    <td class="center big">INVOICE</td>
                </tr>
                <tr>
                    <td>
                        <table width="100%">
                            <tr>
                                <td width="50%">
                                    <table>
                                        <tr>
                                            <td>To M/s.</td>
                                            <td>:</td>
                                            <td><?php echo $bill_data['customer_proof'];?></td>
                                        </tr>
                                        
                                    </table>
                                </td>
                                <td width="50%" style="vertical-align: top">
                                    <table width="100%">
                                        <tr>
                                            <td class="right">Inv. No.</td>
                                            <td class="center">:</td>
                                            <td class="left"><?php echo $bill_data['purchase_id'];?></td>
                                            <td class="right">Date</td>
                                            <td class="center">:</td>
                                            <td class="left"><?php echo $bill_data['p_date'];?></td>
                                        </tr>
                                        
                                        <tr>
                                            <td class="right">Booking For</td>
                                            <td class="center">:</td>
                                            <td class="left"><?php echo $bill_data['ticket_type'];?></td>
                                            <td class="right">Journey Date</td>
                                            <td class="center">:</td>
                                            <td class="left"><?php echo $bill_data['journey_date'];?></td>
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
                    <td class="left" width="110">Pax Name</td>
                    <td class="left">Destination</td>
                    <td class="left"><?php if($bill_data['ticket_type'] == 'Railway') { echo 'Train' ; } else { echo 'Flight';}?> Details</td>
                    <td class="right">Basic</td>
                    <td class="right">Service Taxes</td>
                    <td class="right">Handling Charge</td>
                    <td class="right">Total Amount</td>
                </tr>

                <tr class="countthis">
                    <td>
                        <?php echo $bill_data['ticket_no'];?>
                    </td>
                    <td>
                        <?php echo $bill_data['customer_name'];?>
                    </td>
                    <td>
                        <?php echo $bill_data['j_to'];?>
                    </td>
                    <td>
                        <?php echo $bill_data['train_name'];?>
                    </td>
                    <td class="right">
                        <?php echo $bill_data['p_amount']/$bill_data['head_number'];?>
                    </td>
                    <td class="right">
                        <?php echo $bill_data['govt_price']/$bill_data['head_number'];?>
                    </td>
                    <td class="right">
                        <?php echo $bill_data['handling_charge'];?>
                    </td>
                    <td class="right">
                        <?php echo ($bill_data['p_amount']/$bill_data['head_number']) + ($bill_data['govt_price']/$bill_data['head_number']) + $bill_data['handling_charge'];?>
                    </td>
                </tr>
                <?php if($bill_data['head_number'] > 1) { 

                        $sql_c = 'SELECT * FROM td_p_customer WHERE pid='.$bill_data['purchase_id'];
                        $c_q = mysql_query($sql_c, $con) or die(mysql_error());
                        $c_data = mysql_fetch_assoc($c_q);
                        do {
                    ?>
                    <tr class="countthis1">
                    <td>
                        <?php echo $bill_data['ticket_no'];?></td>
                    </td>
                    <td>
                        <?php echo $c_data['c_name'];?></td>
                    </td>
                    <td>
                        <?php echo $bill_data['j_to'];?></td>
                    </td>
                    <td>
                        <?php echo $bill_data['train_name'];?></td>
                    </td>
                    <td class="right">
                        <?php echo $bill_data['p_amount']/$bill_data['head_number'];?></td>
                    </td>
                    <td class="right">
                        <?php echo $bill_data['govt_price']/$bill_data['head_number'];?></td>
                    </td>
                    <td class="right">
                        <?php echo $bill_data['handling_charge'];?></td>
                    </td>
                    <td class="right">
                        <?php echo ($bill_data['p_amount']/$bill_data['head_number']) + ($bill_data['govt_price']/$bill_data['head_number']) + $bill_data['handling_charge'];?></td>
                    </td>
                </tr>
                <?php } while($c_data = mysql_fetch_assoc($c_q));}?>
                
                <tr>
                    <td class="dummy-hfix"></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td>
                </tr>
                <tr>
                    <td colspan="7"><?php echo no_to_words($bill_data['sell_price']);?> Only</td>
                   <!--  <td colspan="7">INR <?php  echo $result . "Rupees  ";?></td> -->
                    <td class="right">Rs. <?php echo round($bill_data['sell_price'],1);?></td>
                </tr>
            </table>
        </td>
    </tr>
    <tr>
        <td>
            <table width="90%" style="display: table; margin: 0 auto">
                <tr>
                    <td width="70%">Service Tax No. : SEPPC2936CST001</td>
                    <td width="30%"></td>
                </tr>
                <tr>
                    <td class="big">E.& O.E.</td>
                    <td class="right big">For CHAURASIA TRAVELS</td>
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
    $('.countthis').each(function(){$countthis++;});
    $hfix = 116 - (16 * $countthis);
    $('.dummy-hfix').height($hfix);
</script>
</body>
</html>