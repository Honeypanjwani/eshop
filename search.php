<?php 
if($_SERVER["REQUEST_METHOD"]=="POST"){
	$product=$_POST["product"];
}
?>
<?php 
include("../autoload.php");
$db=new Db;
$obj_m=new Model($db);
$obj_c=new Controller($obj_m);
?>
<?php include("header.php");?>

<?php include("navbar.php");?>

<!-- product-tab start-->
<div class="product">
	<div class="container">
		<h3 class="tab-h"><?php //echo $obj_c->get_name_where_id("sub_categories",$id)?></h3>
		<div class="lin2">
		</div>
		<div class="row">
			<?php 
			$products=$obj_m->fetch_where("products",array("*"),array("title"=>$product));
			if($products!=null){
				foreach($products as $product){
			?>
			<div class="col-md-3">
				<div class="pro1">
					<a href="detail-page.php?p_id=<?php echo $product->id?>"><img src="<?php echo $obj_c->get_pro_front_img($product->id)?>" alt="" class="img-responsive"></a>
					<h2><?php echo $product->discount;?>% Off</h2>
					<h2><i class="fa fa-rupee"></i>&nbsp;<del><?php echo $product->price;?></del></h2>
					<h2><i class="fa fa-rupee"></i>&nbsp;<?php echo $product->sale_price?></h2>
					<p><?php echo $product->title?></p>
					<ul>
					<li><a class="fa fa-shopping-cart" href="#"></a></li>
					<li class="fa2"><a class="fa fa fa-heart" href="#"></a></li>
					</ul>
				</div>
			</div>
			<?php } }?>
		</div>
	</div>
</div>
<?php include("footer.php");?>