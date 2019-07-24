<?php 
if($_SERVER["REQUEST_METHOD"]=="POST"){
	$product=$_POST["product"];
	//echo $product;
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
					//print_r($product);
			?>
			<!--<div class="col-md-3">
				<div class="pro1">
					<a href="detail-page.php?p_id=<?php //echo $product->id?>"><img src="<?php //echo $obj_c->get_pro_front_img($product->id)?>" alt="" class="img-responsive"></a>
					<h2><?php //echo $product->discount;?>% Off</h2>
					<h2><i class="fa fa-rupee"></i>&nbsp;<del><?php //echo $product->price;?></del></h2>
					<h2><i class="fa fa-rupee"></i>&nbsp;<?php //echo $product->sale_price?></h2>
					<p><?php// echo $product->title?></p>
					<ul>
					<li><a class="fa fa-shopping-cart" href="#"></a></li>
					<li class="fa2"><a class="fa fa fa-heart" href="#"></a></li>
					</ul>
				</div>
			</div>-->
			
                <div class="col-md-4 col-6 item-width mb-30">
                  <div class="product-item">
                   <!-- <div class="main-label sale-label"><span>Sale</span></div>-->
					
                    <div class="product-image">
					<!------------------------------------------------->
					<?php
					  $img = $obj_c->get_front_image($product->id);
					  
					 
                   $inputwidth = 300;
                  $inputheight = 300;
                 list($width,$height) = getimagesize($img);

             if (($width/$height) > ($inputwidth/$inputheight)) {
             $outputwidth = $inputwidth;
             $outputheight = ($inputwidth * $height)/ $width;
            }
	 	
	     	 elseif (($width/$height) < ($inputwidth/$inputheight)) {
            $outputwidth = ($inputheight * $width)/ $height;
            $outputheight = $inputheight;   }
			?>
                   <center><a href="product-detail.php?p_id=<?php echo $product->id;?>"> <img src="<?php echo $img;?>" alt="Stylexpo" width="<?php echo $outputwidth ?>" height="<?php echo $outputheight  ?>"> </a></center>
					 
					 <!--<center><img  id="scream" src="<?php echo $img;?>" alt="Stylexpo" width="<?php echo $outputwidth ?>" height="<?php echo $outputheight  ?>"></center>-->
					<!------------------------------------------------->
					<!--<a href="product-detail.php?p_id=<?php echo $product->id;?>"> <img src="<?php echo $obj_c->get_front_image($product->id);?>" alt="Stylexpo"> </a>-->
					
                      <div class="product-detail-inner">
                        <div class="detail-inner-left align-center">
                          <ul>
                            <li class="pro-cart-icon">
                              <form>
                                <button title="Add to Cart"><span></span>Add to Cart</button>
                              </form>
                            </li>
                            <li class="pro-wishlist-icon "><a id="<?php echo $product->id?>" title="Wishlist"></a></li>
                            <li class="pro-compare-icon"><a href="compare.html" title="Compare"></a></li>
                          </ul>
                        </div>
                      </div>
                    </div>
                    <div class="product-item-details">
                      <div class="product-item-name"> <a href="product-detail.php?p_id=<?php echo $product->id;?>"><?php echo $product->title;?></a> </div>
                      <div class="price-box"> <span class="price">Rs:-<?php echo $product->sale_price;?></span> <del class="price old-price">Rs:-<?php echo $product->price;?></del> </div>
                    </div>
                  </div>
                </div>
			<?php } }?>
		</div>
	</div>
</div>
<?php include("footer.php");?>