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
$query = 'SELECT * FROM td_handling_charge ORDER BY hc_id ASC';
$query_run = mysql_query($query, $con) or die(mysql_error());
$data = mysql_fetch_assoc($query_run);
$totalRows_rsData = mysql_num_rows($query_run);
?>
    <div>
        <ul class="breadcrumb">
            <li>
                <a href="#">Home</a>
            </li>
            <li>
                <a href="#">Handling Charges Details</a>
            </li>
        </ul>
    </div>

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
        <th>Service Charges</th>
        <th>Handling / SC</th>
        <th>Delivery / SC</th>
        <th>Airlines Service Charges</th>
        <th>Airlines Handling / SC</th>
        <th>Airlines Delivery / SC</th>
        <?php if($_SESSION['user_type'] == 'Super') {?>
        <th>Actions</th>
        <?php } ?>
    </tr>
    </thead>
    <tbody>
    <?php if($totalRows_rsData > 0) { ?>
    <?php do { ?>
    <tr>
        <td>Rs. <?php echo $data['sc_charge'];?></td>
        <td class="center">Rs. <?php echo $data['handling_sc'];?></td>
        <td class="center">Rs. <?php echo $data['dlvry_sc'];?></td>
        <td>Rs. <?php echo $data['air_sc_charge'];?></td>
        <td class="center">Rs. <?php echo $data['air_handling_sc'];?></td>
        <td class="center">Rs. <?php echo $data['air_dlvry_sc'];?></td>
       <?php if($_SESSION['user_type'] == 'Super') {?>
        <td class="center">
            
            <a class="btn btn-info" href="edit_handling_charge.php?hc_id=<?php echo $data['hc_id'];?>">
                <i class="glyphicon glyphicon-edit icon-white"></i>
                Edit
            </a>
            <a class="btn btn-danger confirm" href="delete_handling_charge.php?hc_id=<?php echo $data['hc_id'];?>">
                <i class="glyphicon glyphicon-trash icon-white"></i>
                Delete
            </a>
        </td>
        <?php } ?>
    </tr>
    <?php } while($data = mysql_fetch_assoc($query_run)); }?>
    
    </tbody>
    </table>
    </div>
    </div>
    </div>
    <!--/span-->

    </div><!--/row-->


<?php require('footer.php'); ?>