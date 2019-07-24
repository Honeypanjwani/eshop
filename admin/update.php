<?php 
include("../autoload.php");
$db=new Db;
$obj_m=new Model($db);
$obj_c=new Controller($obj_m);
?>
<?php 
     if(!isset($_GET['id']) &&  empty($_GET['id'])){
		 
		 echo "some internal error";
	 }
	 else{
		 $id = $_GET['id'];
	 }
  ?>
<?php
$err_title=$err_slider="";
$title=$slider="";
if($_SERVER['REQUEST_METHOD']=="POST"){
   
   $title = $obj_c->cleaner($_POST["title"]);
   $title1=$obj_c->cleaner($_POST["title1"]);
   $title2=$obj_c->cleaner($_POST["title2"]);
   
  if(empty($title)){
		$err_title="field is required";
	}
	if(empty($err_slider)){
		$err_slider="field is required";
	}
	 if(empty($err_cat_id) && empty($err_sub_cat_id) && empty($err_type) && empty($err_color)){
	  $images=$obj_c->multiple_upload("media",array("jpeg","jpg"),"../upload/slide/");
	if(isset($images)){
		  for($i=0;$i<count($images);$i++){
				if($obj_c->get_dot($images[$i])){
					$obj_m->update("slider",array("path"=>$images[$i],"title"=>$title,"title1"=>$title1,"title2"=>$title2));
					
			     	}
				}
           }
	 }
	 header("location:banner.php");
}
?>

<?php include("header.php"); ?>
<div class="col-md-12">
  <div class="container">
     <div class="card">
         <div class="card-header">
            <h4 class="text-center">Update Slider</h4>
        </div>
		<div class="card-block">
		   <form action="<?php htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="post" enctype="multipart/form-data">	
	                <div class="form-group">
				     <label>Title</label>
					     <input type="text" class="form-control" name="title">
					      <span class='text-danger'><?php echo $err_title?></span>
				       </div>
					   <div class="form-group">
				     <label>Title1</label>
					     <input type="text" class="form-control" name="title1">
					      <span class='text-danger'><?php echo $err_title?></span>
				       </div>
					   <div class="form-group">
				     <label>Title2</label>
					     <input type="text" class="form-control" name="title2">
					      <span class='text-danger'><?php echo $err_title?></span>
				       </div>
				      <div class="col-md-4">
						<div class="from-group">
							<label>Choose your Images</label>
							<input type="file" name="media[]" class="form-control" multiple>

						</div>
					</div>
                   <br>
				<div class="form-group">
					<button type="submit" class="btn btn-primary ml-3">Update</button>
				</div>
			</form>
		</div>
	</div>
<div>
<?php include("footer.php")?>
		  
