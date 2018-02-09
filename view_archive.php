<?php require('header.php'); ?>
<?php 
$query = 'SELECT * FROM td_blog ORDER BY blog_id ASC';
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
                <a href="#">Blog</a>
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
        <th>Blog Title</th>
        <th>Blog Description</th>
        <th>Blog Image</th>
        <th>Blog Post Date</th>
        
        <th>Actions</th>
    </tr>
    </thead>
    <tbody>
    <?php if($totalRows_rsData > 0) { ?>
    <?php do { ?>
    <tr>
        <td><?php echo $data['blog_title'];?></td>
        <td class="center"><?php echo $data['blog_desc'];?></td>
        <td class="center"><img src="blog/<?php echo $data['blog_pic'];?>" height="130" width="140"/></td>
       <td class="center"><?php echo $data['blog_date'];?></td>
        <td class="center">
            
            <a class="btn btn-info" href="edit_blog.php?blog_id=<?php echo $data['blog_id'];?>">
                <i class="glyphicon glyphicon-edit icon-white"></i>
                Edit
            </a>
            <a class="btn btn-danger" href="delete_blog.php?blog_id=<?php echo $data['blog_id'];?>">
                <i class="glyphicon glyphicon-trash icon-white"></i>
                Delete
            </a>
        </td>
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