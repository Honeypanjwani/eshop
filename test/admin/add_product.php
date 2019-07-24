<?php include("../autoload.php");
$db=new Db;
$obj_m=new Model($db);
$obj_c=new Controller($obj_m);
$obj_c->security_guard();
?>
<?php 
$err_msg9=$err_title=$err_cat_id=$err_sub_cat_id=$err_brand_id=$err_stock=$err_sale_price=$success="";
$title=$discount=$stock=$sale_price="";
if($_SERVER['REQUEST_METHOD']=="POST"){
	$title=$obj_c->cleaner($_POST["title"]);
	$spec=$obj_c->cleaner($_POST["spec"]);
	$cat_id=$obj_c->cleaner($_POST["cat_id"]);
	$sub_cat_id=$obj_c->cleaner($_POST["sub_cat_id"]);
	$brand_id=$obj_c->cleaner($_POST["brand_id"]);
	$sale_price=$obj_c->cleaner($_POST["sale_price"]);
	$discount=$obj_c->cleaner($_POST["discount"]);
	$stock=$obj_c->cleaner($_POST["stock"]);
	
	
	if(empty($title)){
		$err_title="field is required";
	}
	if(empty($cat_id)){
		$err_cat_id="field is required";
	}
	if(empty($sub_cat_id)){
		$err_sub_cat_id="Field is required";
	}
	if(empty($brand_id)){
		$err_brand_id="Field is required";
	}
	if(empty($stock)){
		$err_stock="Field is required";
	}
	if(empty($sale_price)){
		$err_sale_price="field is required";
	}
	
	/*color filed concpet*/
	if(isset($_POST["colors"])){
		if(count($_POST["colors"])>0){
			foreach($_POST["colors"] as $color){
				$color=$obj_c->cleaner($color);
				if(!empty($color)){
					$final_color[]=$color;
				}
			}
		}
	}
		/*size filed concpet*/
	if(isset($_POST["sizes"])){
		if(count($_POST["sizes"])>0){
			foreach($_POST["sizes"] as $size){
				$size=$obj_c->cleaner($size);
				if(!empty($size)){
					$final_size[]=$size;
				}
			}
		}
	}
	
	if(empty($err_title) && empty($err_cat_id) && empty($err_sub_cat_id) && empty($err_brand_id) && empty($err_stock) && empty($err_sale_price)){
		$data=["title"=>$title,"cat_id"=>$cat_id,"sub_cat_id"=>$sub_cat_id,"brand_id"=>$brand_id,"descriptions"=>$spec,"stock"=>$stock,"discount"=>$discount,"sale_price"=>$sale_price,"price"=>$obj_c->price_calc($sale_price,$discount),"product_code"=>uniqid()];
		$result=$obj_m->insert("products",$data);
		If($result==00000){
			$fail_image=[];
			$success="Product insert successfully done. ";
			$product_last_id=$obj_m->last_insert_id(); //abover insert item
			//image uploading
			$images=$obj_c->multiple_upload("media",array("jpeg","jpg","png"),"../upload/products/");
			for($i=0;$i<count($images);$i++){
				if($obj_c->get_dot($images[$i])){
					$obj_m->insert("media",array("path"=>$images[$i],"product_id"=>$product_last_id));
				}else{
					$fail_image[]=$images[$i];
				}
			}
			$success.=count($fail_image).count($fail_image)>0?" type doesn't match":'';
			
			/*color insert into colors table*/
			if(isset($final_color)){
				if(count($final_color)>0){
					for($c=0;$c<count($final_color);$c++){
						$obj_m->insert("colors",array("name"=>$final_color[$c],"product_id"=>$product_last_id));
					}
				}
			}
			
			
	/*size insert into size table*/
			if(isset($final_size)){
				if(count($final_size)>0){
					for($s=0;$s<count($final_size);$s++){
						$obj_m->insert("size",array("sizes"=>$final_size[$s],"product_id"=>$product_last_id));
					}
				}
			}
	/*size insert into size table end*/
	
		}
		if($result==23000){
			$err_msg="Product name already exits";
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
			<h5>Add Product</h5>
		</div>
		<div class="card-block">
			<?php if(!empty($err_msg)){?>
			<big class="text-danger"><?php echo $err_msg?></big>
			<?php }?>
			<form action="<?php htmlspecialchars($_SERVER["PHP_SELF"])?>" method="POST" enctype="multipart/form-data">
				<div class="form-group">
					<label>Product Title(*)</label>
					<input type="text" name="title" class="form-control" value="<?php echo $title?>">
					<span class="text-danger"><?php echo $err_title?></span>
				</div>	
				<div class="form-group">
					<label>Product Specification</label>
					<textarea name="spec" class="form-control"></textarea>
				</div>	
				
				<div class="row">
					<div class="col-md-4">
						<div class="form-group">
							<label>Cateogry(*)</label>
							<select name="cat_id" class="form-control category_change" >
								<option value="">Choose category</option>
							<?php 
							$result=$obj_m->fetch_all("categories");
							if(isset($result)){
								foreach($result as $row){
							?>
								<option value="<?php echo $row->id ?>"><?php echo $row->name?></option>
							<?php } }?>
							</select>
							<span class="text-danger"><?php echo $err_cat_id?></span>
						</div>
					</div>
					<div class="col-md-4">
						<div class="form-group">
							<label>Choose Sub Cateogry(*)</label>
							<select name="sub_cat_id" class="form-control sub_categories">
							<option value="">Choose Sub category</option>
							<!--<?php 
							$result=$obj_m->fetch_all("sub_categories");
							if(isset($result)){
								foreach($result as $row){
							?>
								<option value="<?php echo $row->id ?>"><?php echo $row->name?></option>
							<?php } }?>-->
							</select>
							<span class="text-danger"><?php echo $err_sub_cat_id?></span>
						</div>
					</div>
					<div class="col-md-4">
						<div class="form-group">
							<label>Brand(*)</label>
							<select name="brand_id" class="form-control brand_categories">
							<option value="">Choose Brand category</option>
							<?php 
							$result=$obj_m->fetch_all("brands");
							if(isset($result)){
								foreach($result as $row){
							?>
								<!--<option value="<?php echo $row->id ?>"><?php echo $row->name?></option>-->
							<?php } }?>
							</select>
							<span class="text-danger"><?php echo $err_brand_id?></span>
						</div>
					</div>
				</div>
				
				<div class="row">
					<div class="col-md-4">
						<div class="form-group">
							<label>Enter your Price(*)</label>
							<input type="text" class="form-control" name="sale_price" value="<?php echo $sale_price?>">
							<span class="text-danger"><?php echo $err_sale_price?></span>
						</div>
					</div>
					<div class="col-md-4">
						<div class="form-group">
							<label>Enter your Dicount(%)</label>
							<input type="text" class="form-control" name="discount" value="<?php echo !empty($discount)?$discount:0?>">
						
						</div>
					</div>
					<div class="col-md-4">
						<div class="form-group">
							<label>Stock(*)</label>
							<input type="text" class="form-control" name="stock" value="<?php echo !empty($stock)?$stock:1?>">
							<span class="text-danger"><?php echo $err_stock?></span>
						</div>
					</div>
				</div>
				
				<div class="row">
					<div class="col-md-5">
						<div class="from-group">
							<label>Choose your Images</label>
							<input type="file" name="media[]" class="form-control" multiple>
						</div>
					</div>
					<!--color_filed end start-->
					<div class="col-md-5">
						<label>How much color field required?Please write number in below feld</label>
						<input type="text" id="color_len" class="form-control">
					</div>
					<div class="col-md-2">
					<br><br>&nbsp;
					<button type="button" class="btn btn-primary" id="color_field_creater">Create</button>
					</div>
				</div>
				<!--color_file create dynamic-->
				<div class="row come_output"></div>
				<!--color_filed end-->
				<br>
				<!--------------------->
				<div class="row">
						<!--size_file create dynamic html start-->
					<div class="col-md-5">
						<label>How much size field required?Please write number in below field</label>
						<input type="text" id="size_len" class="form-control">
					</div>
					<div class="col-md-2">
					<br><br>&nbsp;
					<button type="button" class="btn btn-primary" id="size_field_creater">Create</button>
					</div>

				</div>
				<!--size_file create dynamic-->
				         <div class="row size_output"></div>
				
				<!--size_file create dynamic html end-->
				<!----------------------->
				<br>
				<div class="form-group">
					<button type="submit" class="btn btn-primary">Save</button>
				</div>
			</form>
		</div>
	</div>
<div>
<?php include("footer.php")?>
<script>
$(function(){
		//color work
	$("#color_field_creater").click(function(){
		var color_len=$("#color_len").val();
		if(color_len==""){
			alert("Field is required");
		}else{
			var $data="<div class='col-md-3'><div class='from-group'><lable>Enter your color name</label><input type='text' class='form-control' name='colors[]'></div></div>";
			for($i=0;$i<color_len;$i++){
				$(".come_output").append($data);
			}
		}
	});
//size work

$("#size_field_creater").click(function(){
		var size_len=$("#size_len").val();
		if(size_len==""){
			alert("Field is required");
		}else{
			var $data1="<div class='col-md-3'><div class='from-group'><lable>Enter your size name</label><input type='text' class='form-control' name='sizes[]'></div></div>";
			for($a=0;$a<size_len;$a++){
				$(".size_output").append($data1);
			}
		}
	});
	
	
	//category work
	$(".category_change").change(function(){
		var cat_id=$(this).val();
		if(cat_id!=""){
			$.ajax({
				url:"process.php",
				method:"POST",
				dataType:'json',
				data:{"catId":cat_id},
				success:function(res){
					$(".sub_categories").html('');
					if(res.error==false){
						var data=res.message;
						var count=data.length;
						for(var i=0;i<count;i++){
							var option="<option value='"+data[i].id+"'>"+data[i].name+"</option>";
							$(".sub_categories").append(option);	
						}
						
					}
				}
			});
		}	
	});
	
	
	//sub category work
	$(".sub_categories").change(function(){
		var sub_cat_id=$(this).val();
		if(sub_cat_id!=""){
			$.ajax({
				url:"process1.php",
				method:"POST",
				dataType:'json',
				data:{"sub_cat_Id":sub_cat_id},
				success:function(result1){
					$(".brand_categories").html('');
					if(result1.error==false){
						var data1=result1.message;
						var count1=data1.length;
						for(var j=0;j<count1;j++){
							var option1="<option value='"+data1[j].id+"'>"+data1[j].name+"</option>";
							$(".brand_categories").append(option1);	
						}
						
					}
				}
			});	
		}	
	});
});
</script>
