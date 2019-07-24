<?php 
include("../autoload.php");
$db=new Db;
$obj_m=new Model($db);
$obj_c=new Controller($obj_m);
?>
<?php

$err_title=$err_detail=$err_slider="";
$title=$slider=$detail="";
if($_SERVER['REQUEST_METHOD']=="POST"){
   $title = $obj_c->cleaner($_POST["title"]);
    $detail = $obj_c->cleaner($_POST["detail"]);
  if(empty($title)){
		$err_title="field is required";
	}
	if(empty($detail)){
		$err_detail="field is required";
	}
	if(empty($err_slider)){
		$err_slider="field is required";
	}
//echo $title."<br>";
//echo $slider."<br>";
//echo $detail."<br>";



	 if(empty($err_cat_id) && empty($err_sub_cat_id) && empty($err_type) && empty($err_color)){
	  $images=$obj_c->multiple_upload("media",array("jpeg","jpg","png"),"../upload/comment/");
	if(isset($images)){
		  for($i=0;$i<count($images);$i++){
				if($obj_c->get_dot($images[$i])){
					$obj_m->insert("comment",array("path"=>$images[$i],"title"=>$title,"detail"=>$detail));
			     	}
				}
           }
	 }
}
?>

<?php include("header.php");   ?>
 <?php  include("sidebar.php"); ?>
<div class="col-md-9">
	<?php if(!empty($success)){?>
		<div class="alert alert-success">
		<?php echo $success;?>
		</div>
		<?php } ?>
	    <div class="card">
		     <div class="card-header">
                   <h5>Add comment</h5>
		     </div>
		     <div class="card-block">
			     <form action="<?php htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="post" enctype="multipart/form-data">	
	                <div class="form-group">
				     <label>Title</label>
					     <input type="text" class="form-control" name="title">
					      <span class='text-danger'><?php echo $err_title?></span>
				       </div>
					   <div class="form-group">
				     <label>Details Msg </label>
					     <input type="text" class="form-control" name="detail">
					      <span class='text-danger'><?php echo $err_detail?></span>
				       </div>
				      <div class="col-md-4">
						<div class="from-group">
							<label>Choose your Images</label>
							<input type="file" name="media[]" class="form-control" multiple>

						</div>
					</div>
                   <br>
				<div class="form-group">
					<button type="submit" class="btn btn-primary ml-3">Save</button>
				</div>
			</form>
		</div>
	</div>
<div>
<?php include("footer.php")?>