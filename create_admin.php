<?php
include('connection.php');
  //print_r($_POST['page']);
  $b_name = $_POST['bname'];
  $b_desc = $_POST['bpass'];
  $date = date('M').','.date('d').','.date('Y');
  $q = 'SELECT * FROM td_admin WHERE admin_type = "SubAdmin"';
  $p = mysql_query($q) or die(mysql_error());
  $r = mysql_fetch_assoc($p);
  $t = mysql_num_rows($p);
  if($t > 0){
    echo 'exsits|';
  } else {
  $sql = 'INSERT INTO td_admin(admin_user,admin_pass,admin_type) VALUES("'.$b_name.'","'.$b_desc.'","SubAdmin")';
  $query = mysql_query($sql,$con) or die(mysql_error());

  // Send Mail

// $query = 'SELECT * FROM td_admin ORDER BY admin_id ASC';
// $query_run = mysql_query($query, $con) or die(mysql_error());
// $data = mysql_fetch_assoc($query_run);
//  $to="sourav.projukti@gmail.com";
//  $subject="New Sub Admin Created";

//  $message = '<table align="center" width="700" style="border:outset #B1F05E;">
//   <tr>
//     <td style="font-family:Arial, Helvetica, sans-serif; font-size:14px; text-align:left; padding:10px;">Someone Just created a Sub Admin. Below are the details : </td>
//   </tr>
//   <tr>
//     <td style="font-family:Arial, Helvetica, sans-serif; font-size:14px; text-align:left; padding:10px;"><span style="font-family:Arial, Helvetica, sans-serif; font-size:14px; color:#666666; font-weight:normal;  width:150px;"></span><span style="font-family:Arial, Helvetica, sans-serif; font-size:14px; color:#666666; font-weight:normal;  width:150px;"> User Name : '.$data['admin_user'].'</span></td>
//   </tr>
//   <tr>
//     <td style="font-family:Arial, Helvetica, sans-serif; font-size:14px; text-align:left; padding:10px;"><span style="font-family:Arial, Helvetica, sans-serif; font-size:14px; color:#666666; font-weight:normal;  width:150px;"></span><span style="font-family:Arial, Helvetica, sans-serif; font-size:14px; color:#666666; font-weight:normal;  width:150px;"> Password : '.$data['admin_pass'].'</span></td>
//   </tr>
 
//  </table>';

//  $headers = "From: No-Reply@speedpainterrabin.com\r\nReply-To: No-Reply@speedpainterrabin.com";
//  $headers .= "\r\nMIME-Version: 1.0\r\nContent-Type: text/html; charset=iso-8859-1";
//  // send email
//  mail($to, $subject, $message, $headers);
  echo 'ok|';
}
// Run the move_uploaded_file() function here

?>


