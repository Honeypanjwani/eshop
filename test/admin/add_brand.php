<?php include("../autoload.php");
$db=new Db;
$obj_m=new Model($db);
$obj_c=new Controller($obj_m);
$obj_c->security_guard();
?>
<?php 
$err_msg=$success=$cat_id=$sub_cat_id=$brand_name="";
if($_SERVER['REQUEST_METHOD']=="POST"){
	$sub_cat_id=$obj_c->cleaner($_POST["sub_cat_id"]);
	$cat_id=$obj_c->cleaner($_POST["cat_id"]);
	$brand_name=$obj_c->cleaner($_POST["brand_name"]);
	//echo $brand_name;
	if(empty($brand_name)){
		$err_msg="Brand field is required";
	}
	if(empty($err_msg)){
		$data=["name"=>$brand_name,"sub_cat_id"=>$sub_cat_id,"cat_id"=>$cat_id];
		$result=$obj_m->insert("brands",$data);
		If($result==00000){
			$success="Brand insert successfully done";
		}
		if($result==23000){
			$err_msg="Brand name already exits";
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
			<h5>Add Brand</h5>
		</div>
		<div class="card-block">
			<form action="<?php htmlspecialchars($_SERVER["PHP_SELF"])?>" method="POST">
				<div class="form-group">
					<label>Choose Cateogry</label>
					<select name="cat_id" class="form-control categories_change">
					<option value="">--Choose category--</option>
					<?php 
					$result=$obj_m->fetch_all("categories");
					
					if(isset($result)){
						foreach($result as $row){
					?>
						<option value="<?php echo $row->id ?>"><?php echo $row->name?></option>
					<?php } }?>
					</select>
				</div>
				<div class="form-group">
					<label>Choose sub Cateogry</label>
					<select name="sub_cat_id" class="form-control subcategories_change">
					<?php 
					$result=$obj_m->fetch_all("sub_categories");
					
					if(isset($result)){
						foreach($result as $row){
					?>
						<!--<option value="<?php echo $row->id ?>"><?php echo $row->name?></option>-->
					<?php } }?>
					</select>
				</div>
				<div class="form-group">
					<label>Write your Brand</label>
					<input type="text" class="form-control brand_change" name="brand_name">
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

<script>
$(document).ready(function(){
	
	
	//category work
	$(".categories_change").change(function(){
		var cat_id=$(this).val();
		if(cat_id != ""){
		$.ajax({
			url:"dispinationprocess.php",
			method:"POST",
			dataType:"json",
			data:{"cat_Id":cat_id},
			success:function(result){
				$(".subcategories_change").html('');
			if(result.error==false){
				var data=result.message;
				var count=data.length;
				for(var i=0;i<count;i++){
					var option="<option value='"+data[i].id+"'>"+data[i].name+"</option>";
                      $(".subcategories_change").append(option);					
				}	
			}

			}	
		});
	}
	});
	
});
</script>