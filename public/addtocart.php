<?php 
include("../autoload.php");
$db=new Db;
$obj_m=new Model($db);
$obj_c=new Controller($obj_m);
?>
<?php 
//get customer is login or not
if(!isset($_SESSION["customer_token"])){
	header("Location:customer-login.php");
}
else{
	$cid=isset($_SESSION["id"])?$_SESSION["id"]:null;
}
	$message="";
		
?>

<?php include("header.php");?>
<?php include("navbar.php");?>

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
  <!-- CONTAIN START -->
  <section class="ptb-70">
    <div class="container">
      <div class="row">
        <div class="col-12">
			<?php echo $message; ?>
			          <div class="cart-item-table commun-table">
            <div class="table-responsive">
<?php
if(!isset($_GET["action"]))
{
	die("add to cart not done");
	}
else{
	if(isset($_GET["code"])){
		$code=$_GET["code"];
	}
	switch($_GET["action"])
	{
		case "add":
		if(isset($_POST["qty"])){
			$_POST["color"];
			$color=$_SESSION["qty"]=$_POST["qty"];
			$_SESSION["color"]=$color;
		}
		$productByCode=$obj_m->fetch_where("products",array("id","title","product_code","stock","sale_price"),array("product_code"=>$code));
		foreach($productByCode as $res){
		$itemArray = array($res->product_code=>
		array('id'=>$res->id,'name'=>$res->title, 'code'=>$res->product_code, 'quantity'=>$_SESSION["qty"], 'price'=>$res->sale_price,'color'=>$_SESSION["color"]));	
		
	//------------------------------------------------------------------//
		//session start code with array
	//----------------------------------------------------------------//
if(!empty($_SESSION["cart_item"])) {
	if(!in_array($res->product_code,$_SESSION["cart_item"])) 
	{
		$_SESSION["cart_item"] = array_merge($_SESSION["cart_item"],$itemArray);
	} 

} 
else {
	$_SESSION["cart_item"] = $itemArray;
}
	}
break;
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
echo "<div class='col-md-6'>
            <div class='mt-30'> 
              <a href='index.php' class='btn btn-color'>
                <span><i class='fa fa-angle-left'></i></span>
                Continue Shopping
              </a> 
            </div>
          </div>";
	
break;
		
case "update":
if(isset($_POST["quan"])){
			$_SESSION["qty"]=$_POST["quan"];
		}
if(!empty($_SESSION["cart_item"])) {
	foreach($_SESSION["cart_item"] as $k => $v) {
		$productByCode1=$obj_m->fetch_where("products",array("id","title","product_code","stock","sale_price"),array("product_code"=>$code));
			foreach($productByCode1 as $nrow){
				$itemArray1=array($nrow->product_code=>
				array('id'=>$nrow->id,'name'=>$nrow->title, 'code'=>$nrow->product_code, 'quantity'=>$_SESSION["qty"], 'price'=>$nrow->sale_price,'color'=>$_SESSION["color"]));	
				
				if($code == $k)	{
					$_SESSION["cart_item"] = array_merge($_SESSION["cart_item"],$itemArray1);
				}
			}							
		}
	}
break;


		}

}
?>
<?php
if(isset($_SESSION['cart_item']))
{
	$item_total = 0;
		echo '
		

		<table class="table" border="1px" cellspacing="0" cellpadding="10">
		<thead>
		<tr>
		<td colspan="6">
		<div align="right">
			<a href="addtocart.php?action=empty">
			<b>Clear Cart</b>
			</a>
			</div>
		</td>
		</tr>
		<tr>
		<th>Product</th>
		<th>Product Name</th>
		<th>Price</th>
		<th>Quantity</th>
		<th>price</th>
		<th>Action</th>
		</tr>
		</thead>
		';
		
foreach($_SESSION['cart_item'] as $item)
{?>
    <tr>
    <td><img src="<?php echo $obj_c->get_front_image($item['id'])?>" width="100" ></td>
    <td><?= $item['name'];?></td>
    <form action="addtocart.php?action=update&code=<?= $item['code']?>" method="post">
    <td><?= $item['price'];?>
    </td>
    <td><input type="text" value="<?= $item['quantity'];?>" name="quan" size="2">
    <input type="submit" value="save">
    </td>
    <td><?= $item['quantity']*$item['price'];?></td>
	         <td>
     		  <a href="addtocart.php?action=remove&code=<?= $item["code"]; ?>">
			  <i title="Remove Item From Cart" data-id="100" class="fa fa-trash cart-remove-item"></i>
			  </a>
             </td>
    </form>
    </tr>
	<?php 
	$item_total += ($item["price"]*$item["quantity"]); 
	}
	?>
	<tr>
    <td colspan='6' align="right"><b>Total: Rs.<?= $item_total ?></b> </td>
    </tr>
	<tr>
		<td colspan="6"><a href="checkout.php" class="btn btn-primary">ORDER NOW</a></td>
	</tr>
	</table>
	
<?php }
else{
				   
				   echo '
	
				   <tfoot>
				   <tr>
				   <td colspan="5" align="center">
				   No Item In Cart
				   </td>
				   </tr>
				   </tfoot>
				   ';
			   }
?>

 </div>
          </div>
        </div>
      </div>
      <!--<div class="mb-30">
        <div class="row">
          <div class="col-md-6">
            <div	 class="mt-30"> 
              <a href="index.php" class="btn btn-color">
                <span><i class="fa fa-angle-left"></i></span>
                Continue Shopping
              </a> 
            </div>
          </div>
          <div class="col-md-6">
            <div class="mt-30 right-side float-none-xs"> 
              <a class="btn btn-color">Update Cart</a> 
            </div>
          </div>
        </div>
      </div>
      <hr>
      <div class="mtb-30">
        <div class="row">
          <div class="col-md-6 mb-xs-40">
          </div>
          <div class="col-md-6">
            <div class="cart-total-table commun-table">
              <div class="table-responsive">
                <table class="table">
                  <thead>
                    <tr>
                      <th colspan="2">Cart Total</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>Item(s) Subtotal</td>
                      <td>
                        <div class="price-box"> 
                          <span class="price">Rs:- <?php echo number_format($total, 2)?></span> 
                        </div>
                      </td>
                    </tr>
                    <tr>
                      <td>Shipping</td>
                      <td>
                        <div class="price-box"> 
                          <span class="price">$0.00</span> 
                        </div>
                      </td>
                    </tr>
                    <tr>
                      <td><b>Amount Payable</b></td>
                      <td>
                        <div class="price-box"> 
                          <span class="price"><b>Rs:- <?php echo number_format($total, 2)?></b></span> 
                        </div>
                      </td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
      <hr>
      <div class="mt-30">
        <div class="row">
          <div class="col-12">
            <div class="right-side float-none-xs"> 
              <a href="checkout.php" class="btn btn-color">Proceed to checkout
                <span><i class="fa fa-angle-right"></i></span>
              </a> 
            </div>
          </div>
        </div>
      </div>
	  --------->
    </div>
  </section>
  <!-- CONTAINER END --> 
  <!-- CONTAINER END --> 
  <!-------------------------->
  <?php include("footer.php");?>