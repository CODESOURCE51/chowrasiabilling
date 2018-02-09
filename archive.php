<?php require('header.php'); ?>
<?php 
if(empty($_SESSION['user']) && empty($_SESSION['password'])) {
	
	header('Location: index.php');
} 
if(isset($_POST['b_submit']) && $_POST['b_submit'] == 'submit') {
	
	//print_r($_POST['page']);
	$b_name = $_POST['bname'];
	$b_desc = mysql_real_escape_string($_POST['bdesc']);
	$date = date('M').','.date('d').','.date('Y');
	$image_name = $_FILES['image_files']['name'];
	$image_tmp = $_FILES['image_files']['tmp_name'];
	$img = explode('.',$image_name);
		$fileName = $img[0].time().'.'.$img[1];
	$pathAndName = "blog/".$fileName;
	$sql = 'INSERT INTO td_blog(blog_title,blog_desc,blog_pic,blog_date) VALUES("'.$b_name.'","'.$b_desc.'","'.$fileName.'","'.$date.'")';
	$query = mysql_query($sql,$con) or die(mysql_error());
// Run the move_uploaded_file() function here
if($query) { 
	move_uploaded_file($image_tmp, $pathAndName);
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
                    
                    <input type="text" name="bname" class="form-control bname" id="inputSuccess1">
                </div></td>
       
       
    </tr>
     <tr>
        <td>Image Description</td>
        <td class="center"> 
                    <textarea name="bdesc" id="inputSuccess1"></textarea>
                   
                </td>
       
       
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
        <td class="center"><a href="view_blog.php" class="btn btn-warning">View Blogs</a></td>
       
       
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

