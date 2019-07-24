<?php 
include("../autoload.php");
$db=new Db;
$obj_m=new Model($db);
$obj_c=new Controller($obj_m);
?>
<?php 
//get customer is login or not
if(!isset($_SESSION["customer_token"])){
   // echo 0;
   // exit;


	header("Location:customer-login.php");
}
else{
	$customer_id=isset($_SESSION["id"])?$_SESSION["id"]:null;
}

?>
<?php 
/*$a= $_GET["action"];
	switch($a)
	{
		case "remove":
		echo "hello";
case "remove":
if(!empty($_SESSION["cart_item"])) {
	foreach($_SESSION["cart_item"] as $k => $v) {
		if($_GET["code"] == $k)
		{
			unset($_SESSION["cart_item"][$k]);				
		}
		if(empty($_SESSION["cart_item"][$k]))
		{
			echo "<a href='index.php'>Go to Shopping</a>";
		}
	}
}

break;
case "empty":
unset($_SESSION["cart_item"]);
echo "<a href='index.php'>Go to Shopping</a>";
	
break;
	}*/
	?>
	<?php include("header.php");?>
<?php include("navbar.php");?>
<?php 
$pid=$customer_id="";
//if customer is login
$customer_id=$_SESSION["id"];
$pid=$_POST["pid"];

?>

  <!-- Bread Crumb STRAT -->
  <div class="banner inner-banner1 ">
    <div class="container">
      <section class="banner-detail center-xs">
        <h1 class="banner-title">Wishlist</h1>
        <div class="bread-crumb right-side float-none-xs">
          <ul>
            <li><a href="index-2.html">Home</a>/</li>
            <li><span>Wishlist</span></li>
          </ul>
        </div>
      </section>
    </div>
  </div>
   <!--Bread Crumb END -->
  
  <!-- CONTAIN START -->
  <section class="ptb-70">
    <div class="container">
      <div class="row">
        <div class="col-12 ">
          <div class="cart-item-table commun-table">
            <div class="table-responsive">
              <table class="table">
                <thead>
                  <tr>
                    <th>Product</th>
                    <th>Descriotion</th>
                    <th>Price</th>
                    <!--<th>Quantity</th>-->
                    <th>Stock Status</th>
                    <th>Action</th>
                  </tr>
                </thead>
                
                  
				  <?php $wishlists=$obj_m->get_wishlist_product($customer_id);
				  //$w=$obj_m->fetch_where("wishlist",["*"],["customer_id"=>$customer_id]);
				  //print_r($wishlist);
				  if(isset($wishlists)){
					foreach($wishlists as $wishlist){
						print_r($wishlist);
					
				  ?>
				  <tbody>
				  <tr>
                    <td>
                      <a href="product-page.html">
                      <div class="product-image"><img alt="Stylexpo" <img src="<?php echo $obj_c->get_front_image($wishlist->id)?>" width="50" style="padding:10px 10px;"></div>
                      </a>
                    </td>
                    <td>
                      <div class="product-title"> 
                        <a href="product-page.html"><?php echo $wishlist->title;?></a>
                        <div class="size-text">SIZE:large  <br> <span>PRODUCT ID:0088746</span></div> 
                      </div>
                    </td>
                    <td>
                      <ul>
                        <li>
                          <div class="base-price price-box"> <span class="price"><?php echo $wishlist->sale_price;?></span> </div>
                        </li>
                      </ul>
                    </td>
                   <!-- <td>
                      <div class="input-box select-dropdown">
                        <fieldset>
                          <select data-id="100" class="quantity_cart option-drop" name="quantity_cart">
                            <option selected="" value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                          </select>
                        </fieldset>
                      </div>
                    </td>-->
                    <td>
                      <div class="total-price price-box"> 
					  <?php if("status"==1){?>
						  
						  <?php echo "hello world"?>
					 <?php  }else{
						 echo "good morning";
					 }?>
                        <span class="price">In Stock <?php echo $wishlist->status;?></span> 
                      </div>
                    </td>
                    <td>
                      <!--<a href="cart.html">
                        <i title="Shopping Cart" class="fa fa-shopping-cart" aria-hidden="true"></i>
                      </a>--> 

                <?php 
/*if($products){
	$products=$obj_m->deletes("wishlist",["*"],["customer_id"=>$customer_id]);
}*/
	//
	//if($products){
		//foreach($products as $product){
		//print_r($products);	
	?>				  
	<a href="wishlist_change_status.php?action=del&id=<?php echo $wishlist->id;?>" class="btn btn-danger btn-sm">
	<i title="Remove Item From Cart" data-id="100" class="fa fa-trash cart-remove-item"></i>
	Delete</a>
					 
	<?php// }
	//}?>
				   </td>
                  </tr>
				  
				  
				  
                </tbody>
				  <?php }}?>
              </table>
            </div>
          </div>
        </div>
      </div>
      <div class="mb-30">
        <div class="row">
          <div class="col-md-6">
            <div class="mt-30"> 
              <a href="index.php" class="btn btn-color">
                <span><i class="fa fa-angle-left"></i></span>Continue Shopping
              </a> 
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- CONTAINER END --> 

<?php include("footer.php");?>