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
		


 
?>
<?php include("header.php");?>

<?php include("navbar.php");?>


  <!-- Bread Crumb STRAT -->
  <div class="banner inner-banner1 ">
    <div class="container">
      <section class="banner-detail center-xs">
        <h1 class="banner-title">ORDER OVERVIEW</h1>
        <div class="bread-crumb right-side float-none-xs">
          <ul>
            <li><a href="index-2.html">Home</a>/</li>
            <li><a href="cart.html">Cart</a>/</li>
            <li><span>ORDER OVERVIEW</span></li>
          </ul>
        </div>
      </section>
    </div>
  </div>
  <!-- Bread Crumb END -->
  
  <!-- CONTAIN START -->
  <section class="checkout-section ptb-70">
    <div class="container">
      			<form action="pay.php" method="post">
	  <div class="row">
        <div class="col-12">
          <div class="checkout-step mb-40">
            <ul>
              <li> 
                  <a href="checkout.php">
                  <div class="step">
                    <div class="line"></div>
                    <div class="circle">1</div>
                  </div>
                  <span>Shipping</span> 
                </a> 
              </li>
              <li class="active"> 
                <a href="order-overview.html">
                  <div class="step">
                    <div class="line"></div>
                    <div class="circle">2</div>
                  </div>
                  <span>Order Overview</span> 
                </a> 
              </li>
              <li> 
                <a href="payment.html">
                  <div class="step">
                    <div class="line"></div>
                    <div class="circle">3</div>
                  </div>
                  <span>Payment</span> 
                </a> 
              </li>
              <li> 
                <a href="order-complete.html">
                  <div class="step">
                    <div class="line"></div>
                    <div class="circle">4</div>
                  </div>
                  <span>Order Complete</span> 
                </a> 
              </li>
              <li>
                <div class="step">
                  <div class="line"></div>
                </div>
              </li>
            </ul>
            <hr>
          </div>
          <div class="checkout-content">
            <div class="row">
              <div class="col-12">
                <div class="heading-part align-center">
                  <h2 class="heading">Order Overview</h2>
                </div>
              </div>
            </div>
            <div class="row">

              <div class="col-md-8 mb-sm-30">
               
			   
                  <!---------------------------------------------->
				 <div class="cart-item-table commun-table mb-30">
                  <div class="table-responsive">
			
					<!-----------start----------------->
					<?php
		if(isset($_SESSION["customer_token"])){
			$item_total = 0;
				echo '<table class="table" border="1px" class="table table-bordered">
				<!--<tr>
				<th>Image</th>
				<th>Name</th>
				<th>Code</th>
				<th>Quantity</th>
				<th>price</th>
				</tr>-->
				     <thead>
                        <tr>
                          <th>Product</th>
                          <th>Product Detail</th>
                          <th>Sub Total</th>
                          <!--<th>Action</th>-->
                        </tr>
                      </thead>
		';}
/*$wishlists=$obj_m->fetch_where("cart",["*"],["c_id"=>$cid]);
				  //print_r($wishlist);
				  if(isset($wishlists)){
					foreach($wishlists as $wishlist){
				  print_r($wishlist);}}*/
				  

	
				  /*************************************/

  $orderproducts=$obj_m->get_order_product($cid);
				  
				  if(isset($orderproducts)){
				  foreach($orderproducts as $orderproduct){ 
					  
						//print_r($orderproduct);
						
				  
				  ?>			
		
		<tbody>
			<tr>
			<td><a href="#">
                            <div class="product-image"><img src="<?php echo $obj_c->get_front_image($orderproduct->id)?>" width="100" style="padding:5px 30px; "></div>
                            </a></td>
		<td><div class="product-title"> <a href="product-page.html"><?php echo $orderproduct->title;// $item['name'];?></a>
                 <div class="product-info-stock-sku m-0">
                    <div>
                <label>Price: </label>
               <div class="price-box"> <span class="info-deta price">Rs:-<?php echo $orderproduct->sale_price//$item['price'];?></span> </div>
             </div>
            </div>
            <div class="product-info-stock-sku m-0">
             <!-- <div>
             <label>Quantity: </label>
            <span class="info-deta"><?php  //echo $quantity;// $item['quantity'];?></span> </div>-->
               </div>
            </div></td>
			   <td><div data-id="100" class="total-price price-box"> <span class="price">Rs:-<?php // $item['quantity']*$item['price'];?></span> </div></td>
             <!--<td><i class="fa fa-trash cart-remove-item" data-id="100" title="Remove Item From Cart"></i></td>-->
		
			</tr>
				 </tbody>
			<?php 
			}
			/*$item_total += ($item["price"]*$item["quantity"]);
			$item_info=$item['name']; 
			}*/
			?>
			<tr>
			<td colspan='6' align="right">
				<b>Total: Rs.<?php // $item_total ?></b> 
				<input type="hidden" name="amount" value="<?php echo $item_total ?>">
				<input type="hidden" name="p_info" value="<?php echo $item_info?>">
				<input type="hidden" name="client_id" value="<?php echo $cid?>">
				<?php 
				$customers=$obj_m->fetch_where("customers",["name","email","phone_no"],["id"=>$cid]);
				if(isset($customers)){
					foreach($customers as $cum){
						$name=!empty($cum->name)?$cum->name:"abc";
						$email=$cum->email;
						$phone_no=$cum->phone_no;
					}
				}
				?>
				<input type="hidden" name="name" value="<?php echo $name?>">
				<input type="hidden" name="email" value="<?php echo $email?>">
				<input type="hidden" name="phone_no" value="<?php echo $phone_no?>">
			</td>
			</tr>


			</table>
		<?php }else{?>
			<tr>
			<td>Product Not Found</td>
			</tr>
		<?php }
		?>

<!-----table end------->
<!----------------------------------------------------------->
	
<!---------------------------------------------------------->
                  </div>
                </div>
			
                <div class="right-side float-none-xs"> 
 
				<button type="submit" name="before_pay" class="btn btn btn-color">Next</button>
				</div>
              </div>
              <div class="col-md-4">
			<!--<div class="cart-total-table commun-table mb-30">
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
                          <td><div class="price-box"> <span class="price">Rs:- <?php // $item_total ?></span> </div></td>
                        </tr>
                        <tr>
                          <td>Shipping</td>
                          <td><div class="price-box"> <span class="price">$0.00</span> </div></td>
                        </tr>
                        <tr>
                          <td><b>Amount Payable</b></td>
                          <td><div class="price-box"> <span class="price"><b>Rs:-<?php // $item_total ?></b></span> </div></td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                </div>-->
				<div class="cart-total-table address-box commun-table mb-30">
                  <div class="table-responsive">
				  <?php 
		$billing_info=$obj_m->fetch_where("billing",['*'],['customer_id'=>$cid]);
		if(isset($billing_info)){
			foreach($billing_info as $row){
				$type=$row->biiling_addr_type;
				$home=$row->home;
				$locality=$row->locality;
				$city=$row->city;
				$pincode=$row->pincode;
				$name=$row->name;
				$phone_no=$row->phone_no;
				$landmark=$row->landmark;
				$country=$row->Country;
		?>

		<?php 
			}
		}
		?>
		
                    <table class="table">
                      <thead>
                        <tr>
                          <th>Shipping Address</th>
                        </tr>
                      </thead>
                      <tbody>
					  		
                        <tr>
                          <td>
                            <ul>
                              <li class="inner-heading"> <b><?php echo $name;?></b> </li>
                              <li>
                                <p><?php echo $home;?></p>
                              </li>
                              <li>
                                <p><?php echo $landmark." ".$city." ".$pincode."<br>".$phone_no;?></p>
                              </li>
                              <li>
                                <p><?php echo $country;?></p>
                              </li>
                            </ul>
                          </td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                </div>
               
              </div>
           
			</div>
			
          </div>
        </div>
      </div>
	  </form>
    </div>
  </section>
  <!-- CONTAINER END --> 
<!----------------------------------------------------------------------------------------->

  <?php include("footer.php");?>