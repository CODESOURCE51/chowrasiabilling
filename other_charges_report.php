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
                else 
                  {
                 $_SESSION['user_type'] = $row_rsUsers['admin_type'];
                  }  
                  
}
else
{
 exit('You can not directly access this page<script>location.replace("index.php")</script>');
}
if(isset($_POST['search_one']) && $_POST['search_one'] == 1) {
$date = date('Y-d-m',strtotime(date('d/m/y')));
    
$sql1 = 'SELECT * FROM td_other_charges WHERE date="'.$date.'"'; 
$query = mysql_query($sql1, $con) or die(mysql_error());  
$fetch_data = mysql_fetch_assoc($query); 
$total_today = mysql_num_rows($query);
$sql2 = 'SELECT SUM(bank_ch) AS Samount, SUM(other_ch) AS Sprice FROM td_other_charges WHERE date="'.$date.'"'; 
$query2 = mysql_query($sql2, $con) or die(mysql_error());  
$fetch_data2 = mysql_fetch_assoc($query2); 
$total_today2 = mysql_num_rows($query2);
}
if(isset($_POST['search_two']) && $_POST['search_two'] == 2) {
    $date1 = date('Y-m-d',strtotime($_POST['txt_date1'])).'<br/>';
    $date2 = date('Y-m-d',strtotime($_POST['txt_date2']));
    

$sql1 = 'SELECT * FROM td_other_charges WHERE date BETWEEN "'.$date1.'" AND "'.$date2.'"'; 
$query = mysql_query($sql1, $con) or die(mysql_error());  
$fetch_data = mysql_fetch_assoc($query); 
$total_today = mysql_num_rows($query);

$sql2 = 'SELECT SUM(bank_ch) AS Samount, SUM(other_ch) AS Sprice FROM td_other_charges WHERE date BETWEEN "'.$date1.'" AND "'.$date2.'"'; 
$query2 = mysql_query($sql2, $con) or die(mysql_error());  
$fetch_data2 = mysql_fetch_assoc($query2); 
$total_today2 = mysql_num_rows($query2);
}
?>
    <div>
        <ul class="breadcrumb">
            <li>
                <a href="#">Home</a>
            </li>
            <li>
                <a href="#">Other Charges Report</a>
            </li>
           <div style="float:right;"> <i class="glyphicon glyphicon-print"></i><a href="javascript:void(0);" onclick="print_copy()">Print Here</a></div>
        </ul>
    </div>
    <form name="first_search" action="" method="post" enctype="multipart/form-data">
 <div class="row">
    
   
    <table class="table table-striped table-bordered responsive">
    <thead>
    <tr>
       
                 <th><span class="label-success label label-default">Today</span></th>
                <th><input type="hidden" name="search_one" value="1"><button class="btn btn-default" type="submit">Search Details</button></th>
       
    </tr>
    </thead>
   
    </table>
    
    <!--/span-->

    </div>
    </form>
    <form name="first_search" action="" method="post" enctype="multipart/form-data">
    <div class="row">
    
   
    <table class="table table-striped table-bordered responsive">
    <thead>
    <tr>
       
        
                 <th>From Date : <input type="text" id="datepicker" name="txt_date1"></th>
        <th>To Date : <input type="text" id="datepicker2" name="txt_date2"></th>
       
        
        <th><input type="hidden" name="search_two" value="2"><button class="btn btn-default" type="submit">Search Details</button></th>
    </tr>
    </thead>
   
    </table>
    
    <!--/span-->

    </div>
    </form>
    <div id="print_report">
  <div class="row">
    <div class="box col-md-12">
    <div class="box-inner">
    <div class="box-header well" data-original-title="">
        

        <div class="box-icon">
            <a href="#" class="btn btn-setting btn-round btn-default"><i class="glyphicon glyphicon-cog"></i></a>
            <a href="#" class="btn btn-minimize btn-round btn-default"><i
                    class="glyphicon glyphicon-chevron-up"></i></a>
            <a href="#" class="btn btn-close btn-round btn-default"><i class="glyphicon glyphicon-remove"></i></a>
        </div>
    </div>
    <div class="box-content">
   
    <table class="table table-striped table-bordered bootstrap-datatable datatable responsive">
    <thead>
    <tr>
        <th>Date</th>
        <th>Bank Transaction Charges</th>
        <th>Other Charges</th>
        
    </tr>
    </thead>
    <tbody>
    <?php if($total_today > 0) { ?>
    <?php do { ?>
    <tr>
        <td><?php echo $fetch_data['date'];?></td>
        <td class="center"><?php echo $fetch_data['bank_ch'];?></td>
        <td class="center"><?php echo $fetch_data['other_ch'];?></td>
       
    </tr>
    <?php } while($fetch_data = mysql_fetch_assoc($query)); }?>
    <?php if($total_today2 > 0) { ?>
    <tr>
        <td>Total</td>
        <td class="center"><?php echo $fetch_data2['Samount'];?></td>
        <td class="center"><?php echo $fetch_data2['Sprice'];?></td>
       
    </tr>
     <?php } ?>
    </tbody>
    </table>
    </div>
    </div>
    </div>
    <!--/span-->

    </div><!--/row-->
</div>

<?php require('footer.php'); ?>