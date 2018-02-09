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
$query = 'UPDATE td_purchase SET payment_stat = "yes" WHERE purchase_id='.$_REQUEST['due_id'];
$query_run = mysql_query($query, $con) or die(mysql_error());
exit('<script>location.replace("view_purchase_details.php")</script>');
?>


