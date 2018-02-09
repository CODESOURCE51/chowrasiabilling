<?php require('header.php'); ?>
<?php 
if(empty($_SESSION['user']) && empty($_SESSION['password'])) {
	
	header('Location: index.php');
} 

$query = 'SELECT * FROM td_blog ORDER BY blog_id ASC';
$query_run = mysql_query($query, $con) or die(mysql_error());
$data = mysql_fetch_assoc($query_run);
$totalRows_rsData = mysql_num_rows($query_run);
$file = $data['blog_pic'] ;

if(isset($_POST['b_submit']) && $_POST['b_submit'] == 'submit') {
	
	//print_r($_POST['page']);
	$b_name = $_POST['bname'];
	$b_desc = $_POST['bdesc'];
	$date = date('M').','.date('d').date('Y');
	$image_name = $_FILES['image_files']['name'];
	$image_tmp = $_FILES['image_files']['tmp_name'];
	$img = explode('.',$image_name);
		$fileName = $img[0].time().'.'.$img[1];
	$pathAndName = "blog/".$fileName;
	$sql = 'UPDATE td_blog SET blog_title="'.$b_name.'",blog_desc="'.$b_desc.'",blog_pic="'.$fileName.'"WHERE blog_id="'.$_GET['blog_id'].'"';
	$query = mysql_query($sql,$con) or die(mysql_error());
// Run the move_uploaded_file() function here
if($query) { 
	move_uploaded_file($image_tmp, $pathAndName);
     header('Location: view_blog.php');
	}
}
?>
<div>
    <ul class="breadcrumb">
        <li>
            <a href="#">Home</a>
        </li>
        <li>
            <a href="#">Forms</a>
        </li>
    </ul>
</div>

<div class="row">
    <div class="box col-md-12">
        <div class="box-inner">
            <div class="box-header well" data-original-title="">
                <h2><i class="glyphicon glyphicon-edit"></i>Post a Blog</h2>

                <div class="box-icon">
                    <a href="#" class="btn btn-setting btn-round btn-default"><i
                            class="glyphicon glyphicon-cog"></i></a>
                    <a href="#" class="btn btn-minimize btn-round btn-default"><i
                            class="glyphicon glyphicon-chevron-up"></i></a>
                    <a href="#" class="btn btn-close btn-round btn-default"><i
                            class="glyphicon glyphicon-remove"></i></a>
                </div>
            </div>
             <div class="row">
    <div class="box col-md-12">
    <div class="box-inner">
   <form action="" method="post" name="form1" enctype="multipart/form-data" onSubmit="return validate_blog()">
    <div class="box-content">
   
    <table class="table table-striped table-bordered bootstrap-datatable responsive">
    <thead>
   
    </thead>
    <tbody>
    <tr>
        <td>Image Name</td>
        <td class="center"> <div class="form-group has-success col-md-4">
                    
                    <input type="text" name="bname" class="form-control bname" id="inputSuccess1" value="<?php echo $data['blog_title'];?>">
                </div></td>
       
       
    </tr>
     <tr>
        <td>Image Description</td>
        <td class="center"> 
                    <textarea name="bdesc" id="inputSuccess1"><?php echo $data['blog_desc'];?></textarea>
                   
                </td>
       
       
    </tr>
     <tr>
        <td>Uploaded Image</td>
        <td class="center"> <div class="form-group">
                        <label for="exampleInputFile">Uploaded Image </label>
                       <img src="blog/<?php echo $data['blog_pic'];?>" height="130" width="140" />
                    </div></td>
       
       
    </tr>
      <tr>
        <td>Image Name</td>
        <td class="center"> <div class="form-group">
                        <label for="exampleInputFile">Select Image </label>
                        <input type="file" name="image_files" id="exampleInputFile">
                    </div></td>
       
       
    </tr>
     <tr>
        <td></td>
        <td class="center"><input type="hidden" name="b_submit" value="submit"/>
              <button type="submit" class="btn btn-default">Submit</button></td>
       
       
    </tr>
   <tr>
        <td></td>
        <td class="center"><a href="view_blog.php" class="btn btn-warning">View Blog</a></td>
       
       
    </tr>
   
    </tbody>
    </table>
    </div>
    </div>
    </div>
    <!--/span-->

    </div>
            
            </form>
        </div>
    </div>
    <!--/span-->

</div><!--/row-->



<?php require('footer.php'); ?>

