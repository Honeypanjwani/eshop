<?php include("../autoload.php");
$db=new Db;
$obj_m=new Model($db);
$obj_c=new Controller($obj_m);

$obj_c->security_guard();
?>
<?php 
$err_msg=$success="";
if($_SERVER['REQUEST_METHOD']=="POST"){
	$cat_name=$obj_c->cleaner($_POST["cat_name"]);
	if(empty($cat_name)){
		$err_msg="Category field is required";
	}
	if(empty($err_msg)){
		$data=["name"=>$cat_name];
		$result=$obj_m->insert("categories",$data);
		If($result==00000){
			$success="category insert successfully done";
		}
		if($result==23000){
			$err_msg="Category already exits";
		}
	}
}
?>
<?php include("header.php")?>
<?php include("sidebar.php")?>
<div class="col-md-9">
	<?php if(!empty($success)){?>
		<div class="alert alert-success">
		<?php echo $success;?>
		</div>
		<?php } ?>
	<div class="card">
		<div class="card-header">
			<h5>Add Category</h5>
		</div>
		<div class="card-block">
			<form action="<?php htmlspecialchars($_SERVER["PHP_SELF"])?>" method="POST">
				<div class="form-group">
					<label>Write your category</label>
					<input type="text" class="form-control" name="cat_name">
					<span class='text-danger'><?php echo $err_msg?></span>
				</div>
				<div class="form-group">
					<button type="submit" class="btn btn-primary">Save</button>
				</div>
			</form>
		</div>
	</div>
<div>
<?php include("footer.php")?>