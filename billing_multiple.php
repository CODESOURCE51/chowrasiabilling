<?php
include('connection.php');
$bill = 'SELECT * FROM td_purchase WHERE purchase_id IN ('.$_REQUEST["bill_id"].')';
$bill_query = mysql_query($bill, $con) or die(mysql_error());
$bill_data = mysql_fetch_assoc($bill_query);

$bill1 = 'SELECT * FROM td_purchase WHERE purchase_id IN ('.$_REQUEST["bill_id"].')';
$bill_query1 = mysql_query($bill1, $con) or die(mysql_error());
$bill_data1 = mysql_fetch_assoc($bill_query1);

$billM = 'SELECT SUM(sell_price) AS MPrice FROM td_purchase WHERE purchase_id IN ('.$_REQUEST["bill_id"].')';
$billM_query = mysql_query($billM, $con) or die(mysql_error());
$billM_data = mysql_fetch_assoc($billM_query);
mysql_free_result($billM_data);
mysql_free_result($bill_data);
$number = $billM_data['MPrice'];
   $no = round($number);
   $point = round($number - $no, 2) * 100;
   $hundred = null;
   $digits_1 = strlen($no);
   $i = 0;
   $str = array();
   $words = array('0' => '', '1' => 'one', '2' => 'two',
    '3' => 'three', '4' => 'four', '5' => 'five', '6' => 'six',
    '7' => 'seven', '8' => 'eight', '9' => 'nine',
    '10' => 'ten', '11' => 'eleven', '12' => 'twelve',
    '13' => 'thirteen', '14' => 'fourteen',
    '15' => 'fifteen', '16' => 'sixteen', '17' => 'seventeen',
    '18' => 'eighteen', '19' =>'nineteen', '20' => 'twenty',
    '30' => 'thirty', '40' => 'forty', '50' => 'fifty',
    '60' => 'sixty', '70' => 'seventy',
    '80' => 'eighty', '90' => 'ninety');
   $digits = array('', 'hundred', 'thousand', 'lakh', 'crore');
   while ($i < $digits_1) {
     $divider = ($i == 2) ? 10 : 100;
     $number = floor($no % $divider);
     $no = floor($no / $divider);
     $i += ($divider == 10) ? 1 : 2;
     if ($number) {
        $plural = (($counter = count($str)) && $number > 9) ? 's' : null;
        $hundred = ($counter == 1 && $str[0]) ? ' and ' : null;
        $str [] = ($number < 21) ? $words[$number] .
            " " . $digits[$counter] . $plural . " " . $hundred
            :
            $words[floor($number / 10) * 10]
            . " " . $words[$number % 10] . " "
            . $digits[$counter] . $plural . " " . $hundred;
     } else $str[] = null;
  }
  $str = array_reverse($str);
  $result = implode('', $str);
  $points = ($point) ?
    "." . $words[$point / 10] . " " . 
          $words[$point = $point % 10] : '';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title></title>
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
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
</head>
<body>
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
                                            <td><?php echo $bill_data['customer_name'];?><br/><?php echo $bill_data['customer_proof'];?></td>
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
                    <td class="left">Pax Name</td>
                    <td class="left">Destination</td>
                    <td class="left"><?php if($bill_data['ticket_type'] == 'Railway') { echo 'Train' ; } else { echo 'Flight';}?> Details</td>
                    <td class="right">Basic</td>
                    <td class="right">Service <br/><input type="text" value="Charge" style="width:30px; font-size:9px; " /></td>
                    <td class="right">Handling Charge</td>
                    <td class="right">Total Amount</td>
                </tr>
                <?php do { ?>
                <tr class="countthis">
                    <td height="30px">
                        <table>
                            <tr>
                                <td><?php echo $bill_data['ticket_no'];?></td>
                            </tr>
                           
                        </table></td>
                    <td>
                        <table>
                            <tr>
                                <td><?php echo $bill_data['customer_name'];?></td>
                            </tr>
                            
                        </table></td>
                    <td>
                        <table>
                            <tr>
                                <td><?php echo $bill_data['j_to'];?></td>
                            </tr>
                            
                        </table></td>
                    <td>
                        <table>
                            <tr>
                                <td><?php echo $bill_data['train_name'];?></td>
                            </tr>
                            
                        </table></td>
                    <td class="right">
                        <table>
                            <tr>
                                <td>Rs. <?php echo $bill_data['p_amount'];?></td>
                            </tr>
                            
                        </table></td>
                    <td class="right">
                        <table>
                            <tr>
                                <td>Rs. <?php echo $bill_data['govt_price'];?></td>
                            </tr>
                            
                        </table></td>
                        <td class="right">
                        <table>
                            <tr>
                                <td>Rs. <?php echo $bill_data['handling_charge'] * $bill_data['head_number'];?> (for <?php echo $bill_data['head_number'];?> Person<?php if($bill_data['head_number'] > 1) echo 's)';?></td>
                            </tr>
                            
                        </table></td>
                    <td class="right">
                        <table>
                            <tr>
                                <td>Rs. <?php echo $bill_data['sell_price'];?></td>
                            </tr>
                            
                        </table></td>
                </tr>
                <?php } while($bill_data = mysql_fetch_assoc($bill_query));?>
                
                <tr>
                    <td colspan="7">INR <?php  echo $result . "Rupees  ";?></td>
                    <td class="right">Rs. <?php echo $billM_data['MPrice'];?></td>
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
                                            <td><?php echo $bill_data['customer_name'];?><br/><?php echo $bill_data['customer_proof'];?></td>
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
                    <td class="left">Pax Name</td>
                    <td class="left">Destination</td>
                    <td class="left"><?php if($bill_data1['ticket_type'] == 'Railway') { echo 'Train' ; } else { echo 'Flight';}?> Details</td>
                    <td class="right">Basic</td>
                    <td class="right">Service<br/><input type="text" value="Charge" style="width:30px; font-size:9px; " /></td>
                    <td class="right">Handling Charge</td>
                    <td class="right">Total Amount</td>
                </tr>
                <?php do { ?>
                <tr class="countthis">
                    <td height="30px">
                        <table>
                            <tr>
                                <td><?php echo $bill_data1['ticket_no'];?></td>
                            </tr>
                           
                        </table></td>
                    <td>
                        <table>
                            <tr>
                                <td><?php echo $bill_data1['customer_name'];?></td>
                            </tr>
                            
                        </table></td>
                    <td>
                        <table>
                            <tr>
                                <td><?php echo $bill_data1['j_to'];?></td>
                            </tr>
                            
                        </table></td>
                    <td>
                        <table>
                            <tr>
                                <td><?php echo $bill_data1['train_name'];?></td>
                            </tr>
                            
                        </table></td>
                    <td class="right">
                        <table>
                            <tr>
                                <td>Rs. <?php echo $bill_data1['p_amount'];?></td>
                            </tr>
                            
                        </table></td>
                    <td class="right">
                        <table>
                            <tr>
                                <td>Rs. <?php echo $bill_data1['govt_price'];?></td>
                            </tr>
                            
                        </table></td>
                        <td class="right">
                        <table>
                            <tr>
                                <td>Rs. <?php echo $bill_data1['handling_charge'] * $bill_data1['head_number'];?> (for <?php echo $bill_data1['head_number'];?> Person<?php if($bill_data1['head_number'] > 1) echo 's)';?></td>
                            </tr>
                            
                        </table></td>
                    <td class="right">
                        <table>
                            <tr>
                                <td>Rs. <?php echo $bill_data1['sell_price'];?></td>
                            </tr>
                            
                        </table></td>
                </tr>
                <?php } while($bill_data1 = mysql_fetch_assoc($bill_query1));?>
                
                <tr>
                    <td colspan="7">INR <?php  echo $result . "Rupees  ";?></td>
                    <td class="right">Rs. <?php echo $billM_data['MPrice'];?></td>
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
    $hfix = 100 - (16 * $countthis);
    $('#dummy-hfix').height($hfix);
</script>
</body>
</html>