<?php 
include("../autoload.php");
$db=new Db;
$obj_m=new Model($db);
$obj_c=new Controller($obj_m);
?>
<?php include("header.php");?>
<?php  include("navbar.php");?>


  <!-- Bread Crumb STRAT -->
  <div class="banner inner-banner1 ">
    <div class="container">
      <section class="banner-detail center-xs">
        <h1 class="banner-title">Shopping Cart</h1>
        <div class="bread-crumb right-side float-none-xs">
          <ul>
            <li><a href="index.php">Home</a>/</li>
            <li><span>Shopping Cart</span></li>
          </ul>
        </div>
      </section>
    </div>
  </div>
  <!-- Bread Crumb END -->


<?php
//get product id
if(isset($_POST["p_id"]) && isset($_POST["qty"]) && isset($_POST["color"])){
    $pid=$obj_c->cleaner($_POST["p_id"]); 
	$qty=$obj_c->cleaner($_POST["qty"]); 
	$color=$obj_c->cleaner($_POST["color"]); 
	$size=$obj_c->cleaner($_POST["size"]); 

	
}


//get customer is login or not
if(!isset($_COOKIE['customer_token'])){
	//header("Location:customer-login.php?pid=".$pid."&qty=".$qty."&color=".$color."&size=".$size);
	
	$cid=isset($_COOKIE['id'])?$_COOKIE['id']:null;
	if(!empty($_POST["p_id"]) && !empty($_POST["qty"]) && !empty($_POST["color"])){
		$obj_c->addInCart($pid,$cid,$color,$size,$qty);
	}
}
else{
	
}
?>


<div class="container">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<br>
			<table class="table table-bordered">
				<thead>
					<tr>
						<th>Image</th>
						<th>Product Name</th>
						<th>Product Price</th>
						<th>Qunantity</th>
						<th>Total</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
					<?php 
					$items=$obj_m->fetch_where("cart",["p_id","quantity","size","color"],["c_id"=>$cid]);
					print_r($items);
					$prices=[];
					if(isset($items)){
					foreach ($items as $row) {
						$pid=$row->p_id;
						$quantity=$row->quantity;
						$size=$row->size;
						$color=$row->color;
					
					$p_info=$obj_m->fetch_where("products",["title","sale_price","price"],["id"=>$pid]);
					?>
						<tr>
							<?php foreach ($p_info as $p) {?>
							<td><img src="<?php echo $obj_c->get_pro_front_img($pid)?>" width="70"></td>
							<td><?php echo $p->title?></td>
							<td><?php echo $p->sale_price?></td>
							<td><?php echo $row->quantity?></td>
							<td>
								<?php 
								echo ($row->quantity*$p->sale_price);
								$prices[]=($row->quantity*$p->sale_price);
								?>
							</td>
							<td>
								<a href="cart-product-remove.php?pid=<?php echo $pid ?>&cid=<?php echo $cid ?>" class="btn btn-danger btn-sm">delete</a>
							</td>
							<?php } ?>
						</tr>
					<?php } ?>
						<tr>
							<td colspan="2"><strong>Grand Total</strong></td>
							<td colspan="4" align="right"><h4><i class="fa fa-rupee"></i>&nbsp;<?php echo array_sum($prices)?>/-</h4></td>
						</tr>
						<tr>
							<td colspan="7" align="right">
								<a href="checkout.php" class="btn btn-primary btn-lg">ORDER NOW</a>
							</td>
						</tr>
					<?php }else{?>	
						<tr>
							<td colspan="7" align="center">Product not in cart</td>
						</tr>
					<?php }?>
				</tbody>
			</table>
		</div>
	</div>
</div>
  <?php include("footer.php");?>