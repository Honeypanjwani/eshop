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
			echo "<div class='col-md-6'>
            <div class='mt-30'> 
              <a href='index.php' class='btn btn-color'>
                <span><i class='fa fa-angle-left'></i></span>
                Continue Shopping
              </a> 
            </div>
          </div>";
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
  <section class="ptb-70">
    <div class="container">
      <div class="row">
        <div class="col-12">
          <div class="cart-item-table commun-table">


<?php
if(isset($_SESSION['cart_item']))
{
	$item_total = 0;
		echo '
			

		';
		
foreach($_SESSION['cart_item'] as $item)
{?>
<!--------------------------------------------->
                <div class="table-responsive">
			<?php echo $message; ?>
			
			<div align="right">
            <a href="addtocart.php?action=empty">
			<b>Clear Cart</b>
			</a>
			</div>
   
              <table class="table">
                


                 <thead>
                <tr>
               <th>Product</th>
               <th>Product Name</th>
               <th>Price</th>
                <th>Quantity</th>
                <th>Sub Total</th>
                <th>Action</th>
                  </tr>
            </thead>

			
                <tbody>
					<tr>
                    <td>
                      <a href="product-page.html">
                        <div class="product-image">
              <img src="<?php echo $obj_c->get_front_image($item['id'])?>" width="100">				
						
                        </div>
                      </a>
                    </td>
                    <td>
                      <div class="product-title"> 
					  
                        <a href="#"><?= $item['name'];?></a> 
                      </div>
                    </td>
                    <td>
                      <ul>
                        <li>
                          <div class="base-price price-box"> 
                            <span class="price"><?= $item['price'];?></span> 
                          </div>
                        </li>
                      </ul>
                    </td>
					<form action="addtocart.php?action=update&code=<?= $item['code']?>" method="post">
					 <td>
                      <div class="input-box">
                        

						  <input data-id="100" class="quantity_cart " size="2" type="text" value="<?= $item['quantity'];?>" name="quan" size="2">
                         <input type="submit" value="save">
                        
                      </div>
                    </td>
                        <td>
                      <div class="total-price price-box"> 
                        <span class="price"><?= $item['quantity']*$item['price'];?></span> 
                      </div>
                    </td>
					
                    <td>

					  <a href="addtocart.php?action=remove&code=<?= $item["code"]; ?>">
					  <i title="Remove Item From Cart" data-id="100" class="fa fa-trash cart-remove-item"></i>
					  </a>
                    </td>
                   </form>


                  </tr>
                </tbody>
                   
				   
		   <!------------------------tr end------------------------------>
				  
				   
				 
				   
			
				<!-----------------------testing2---------------------------------------------->
				
              </table>
            </div>
	</table>
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
				  <?php 
	$item_total += ($item["price"]*$item["quantity"]); 
	
	?>

                  <tbody>
                    <tr>
                      <td>Item(s) Subtotal</td>
                      <td>
                        <div class="price-box"> 
                          <span class="price">Rs:- <?= $item_total ?></span> 
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
                          <span class="price"><b>Rs:- <?= $item_total ?></b></span> 
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
<?php }}
   else{?>
	<table>
		<tr>
    <td>Product Not Found</td>
    </tr>
	</table>

   <?php } ?>

<!------------------------------------------------------------------------------>
<!---------------------------------------------------------------------------------->
<?php $message="";?>
  <!-- CONTAIN START -->

          </div>
        </div>
      </div>
      <div class="mb-30">
        <div class="row">
          <div class="col-md-6">
            <div class="mt-30"> 
              <a href="index.php" class="btn btn-color">
                <span><i class="fa fa-angle-left"></i></span>
                Continue Shopping
              </a> 
            </div>
          </div>
          <div class="col-md-6">
            <div class="mt-30 right-side float-none-xs"> 
			                <a href="checkout.php" class="btn btn-color">Proceed to checkout
                <span><i class="fa fa-angle-right"></i></span>
              </a> 
            </div>

          </div>
        </div>
      </div>
      
      <!--<div class="mt-30">
        <div class="row">
          <div class="col-12">
            <div class="right-side float-none-xs"> 

              <a href="checkout.php" class="btn btn-color">Proceed to checkout
                <span><i class="fa fa-angle-right"></i></span>
              </a> 
            </div>
          </div>
        </div>
      </div>-->
    </div>
  </section>
  <!-- CONTAINER END --> 
  <!-------------------------->
  <?php include("footer.php");?>