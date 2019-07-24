<?php 
include("../autoload.php");
$db=new Db;
$obj_m=new Model($db);
$obj_c=new Controller($obj_m);
$chiper=new AesChieper();
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
  
  <!----------------------------->
  

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
			<table class="table table-bordered">
				<thead>
					<tr>
						<th>Product</th>
						<th>Product Detail</th>
						<th>Subtotal</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
					<?php 
					$items=$obj_m->fetch_where("cart",["p_id","quantity","size","color"],["c_id"=>$cid]);
					//print_r($items);
					$prices=[];
					if(isset($items)){
					foreach ($items as $row) {
						$pid=$row->p_id;
						$quantity=$row->quantity;
						$size=$row->size;
						$color=$row->color;
					
					$p_info=$obj_m->fetch_where("products",["title","sale_price","price"],["id"=>$pid]);
					?>
					<!------------------->
					
					<!------------------->
						<tr>
							<?php foreach ($p_info as $p) {?>
							<!--<td><img src="<?php//echo $obj_c->get_front_image($pid)?>" width="70"></td>
							<td><?php //echo $p->title?></td>
							<td><?php //echo $p->sale_price?></td>
							<td><?php //echo $row->quantity?></td>
							<td>
								<?php 
								//echo ($row->quantity*$p->sale_price);
								//$prices[]=($row->quantity*$p->sale_price);
								?>
							</td>
							<td>
								<a href="c
								art-product-remove.php?pid=<?php //echo $pid ?>&cid=<?php //echo $cid ?>" class="btn btn-danger btn-sm">delete</a>
							</td>-->
							<td><a>
                            <div class="product-image"><img src="<?php echo $obj_c->get_front_image($pid)?>" width="20"></div>
                            </a></td>
                          <td><div class="product-title"> <a><?php echo $p->title?></a>
                              <div class="product-info-stock-sku m-0">
                                <div>
                                  <label>Price: </label>
                                  <div class="price-box"> <span class="info-deta price"><?php echo $p->sale_price?></span> </div>
                                </div>
                              </div>
                              <div class="product-info-stock-sku m-0">
                                <div>
                                  <label>Quantity: </label>
                                  <span class="info-deta"><?php echo $row->quantity?></span> </div>
                              </div>
                            </div></td>
                          <td><div data-id="100" class="total-price price-box"> <span class="price">
						  <?php 
								echo ($row->quantity*$p->sale_price);
								$prices[]=($row->quantity*$p->sale_price);
								?></span> </div></td>
                          <td>
						  <a href="cart-product-remove.php?pid=<?php echo $pid ?>&cid=<?php echo $cid ?>"><i class="fa fa-trash cart-remove-item" data-id="100" title="Remove Item From Cart"></i></a>
						  </td>
							<?php 

							} ?>
						</tr>
						<tr>
			<td colspan='6' align="right">
				<?php  $item_info= $p->title;?>
				<input type="hidden" name="amount" value="<?php echo array_sum($prices) ?>">
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
					<?php } ?>
						<!--<tr>
							<td colspan="2"><strong>Grand Total</strong></td>
							<td colspan="4" align="right"><h4><i class="fa fa-rupee"></i>&nbsp;<?php //echo array_sum($prices)?>/-</h4></td>
						</tr>-->
						<!--<tr>
							<td colspan="7" align="right">
								<a href="checkout.php" class="btn btn-primary btn-lg">ORDER NOW</a>
							</td>
						</tr>-->
					<?php }else{?>	
						<tr>
							<td colspan="7" align="center">Product not in cart</td>
						</tr>
					<?php }?>
				</tbody>
			</table>
                  </div>
                </div>
			
                <div class="right-side float-none-xs"> 
 				<input type="hidden" name="c_id" value="<?php echo $chiper->encrypt($cid)?>">
				
				<button type="submit" name="pay" value="pay" class="btn btn btn-color">Next</button>
				</div>
              </div>
              <div class="col-md-4">
			<div class="cart-total-table commun-table mb-30">
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
                          <td><div class="price-box"> <span class="price">Rs:- <?php echo array_sum($prices)?></span> </div></td>
                        </tr>
                        <tr>
                          <td>Shipping</td>
                          <td><div class="price-box"> <span class="price">Rs:-0.00</span> </div></td>
                        </tr>
                        <tr>
                          <td><b>Amount Payable</b></td>
                          <td><div class="price-box"> <span class="price"><b>Rs:-<?php echo array_sum($prices)?></b></span> </div></td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                </div>
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