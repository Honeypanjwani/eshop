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
$cookiecheck= $_COOKIE["shopping_cart"];
	
		
?>
<?php 
if($_SERVER['REQUEST_METHOD']=="POST"){
	$addr_type=$_POST["addr_type"];
	$home=$_POST["home"];
	$locality=$_POST["locality"];
	$city=$_POST["city"];
	$pincode=$_POST["pincode"];
	$name=$_POST["name"];
	$district=$_POST["district"];
	$phone_no=$_POST["phone_no"];
	$Country=$_POST["Country"];

	
	//validation apply
	$data=array("biiling_addr_type"=>$addr_type,"home"=>$home,"landmark"=>$locality,"city"=>$city,"pincode"=>$pincode,"name"=>$name,"district"=>$district,"phone_no"=>$phone_no,"Country"=>$Country,"customer_id"=>$cid);
	//print_r($data);
	$result=$obj_m->insert("billing",$data);
	if($result==00000){
		unset($_POST["addr_type"]);
		unset($_POST["home"]);
		unset($_POST["locality"]);
		unset($_POST["city"]);
		unset($_POST["pincode"]);
	}
}
?>
<?php include("header.php");?>

<?php include("navbar.php");?>

<?php 
//customer have a address or not
if($obj_m->tabRowCount($cid,"billing")>0){
	 $isAddress=1;
}else{
	 $isAddress=0;
}
?>

  <!-- Bread Crumb STRAT -->
  <div class="banner inner-banner1 ">
    <div class="container">
      <section class="banner-detail center-xs">
        <h1 class="banner-title">Checkout</h1>
        <div class="bread-crumb right-side float-none-xs">
          <ul>
            <li><a href="index-2.html">Home</a>/</li>
            <li><a href="cart.html">Cart</a>/</li>
            <li><span>Checkout</span></li>
          </ul>
        </div>
      </section>
    </div>
  </div>
  <!-- Bread Crumb END -->
  
  <!-- CONTAIN START -->
  <section class="checkout-section ptb-70">
    <div class="container">
      <div class="row">
        <div class="col-12">
		<div class="checkout-step mb-40">
            <ul>
              <li class="active"> 
                <a href="checkout.html">
                  <div class="step">
                    <div class="line"></div>
                    <div class="circle">1</div>
                  </div>
                  <span>Shipping</span> 
                </a> 
              </li>
              <li> 
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
          <div class="checkout-content" >
            
            <div class="row justify-content-center">
			
              <div class="col-xl-6 col-lg-8 col-md-8">
                <?php if($isAddress==0){?>
				<div class="row">
              <div class="col-12">
                <div class="heading-part align-center">
                  <h2 class="heading">Please fill up your Shipping details</h2>
                </div>
              </div>
            </div>
			<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ;?>" method="post" class="main-form full">
                  <div class="row mb-20">
                    <div class="col-12 mb-20">
                      <div class="heading-part">
                        <h3 class="sub-heading">Shipping Address</h3>
                      </div>
                      <hr>
                    </div>
                    <div class="col-md-6">
                      <div class="input-box">
                        <input type="text" required placeholder="Full Name" name="name">
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="input-box">
                        <input type="text" required placeholder="Contact Number" name="phone_no">
                      </div>
                    </div>
                    <div class="col-md-12">
                      <div class="input-box">
                        <input type="text" required placeholder="Shipping Address" name="home">
                        <span>Please provide the number and street.</span> 
                      </div>
                    </div>
                    <div class="col-md-12">
                      <div class="input-box">
                        <input type="text" required placeholder="Shipping Landmark" name="locality">
                        <span>Please include landmark (e.g : Opposite Bank) as the carrier service may find it easier to locate your address.</span> 
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="input-box select-dropdown">
                        <fieldset>
                          <select name="Country" class="option-drop" id="shippingcountryid">
                            <option selected="" value="">Select Country</option>
                            <option value="INDIA">India</option>
                          </select>
                        </fieldset>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="input-box select-dropdown">
                        <fieldset>
                          <select name="city" class="option-drop" id="shippingstateid">
                       <option value="">Select a City</option>
                       	<option value="delhi">New Delhi</option>
						<option value="mumbai">Mumbai</option>
						</select>
                        </fieldset>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="input-box">
                        <input type="text" required placeholder="Enter Locality" name="district">
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="input-box">
                        <input type="text" required placeholder="Postcode/zip" name="pincode">
                      </div>
                    </div>
					<div class="col-md-12">
                      <div class="input-box">
					<h5>Address Type:</h5>
					<label> <input type="radio" value="1" name="addr_type" checked style="width:20px; margin-top:10px !important;"><br>Home(All day delivery)</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					<label><input type="radio" value="2" name="addr_type" style="width:20px;"> <br>Office:(Delivery between 10 AM-5 PM) </label>
                      </div>
                    </div>
									<div class="form-group">
					<button type="submit" class="btn btn-primary">Save &amp; Checkout</button>
				</div>
                  </div>
                 <!-- <div class="row">
                                        <div class="col-md-12"> 
                      <a href="order-overview.html" class="btn btn-color right-side">Next</a> 
                    </div>

                  </div>-->
                </form>
		<?php }?>

              </div>
            </div>
			<!--------------------------->
			
			<!--------------------------->
          </div>
		  <!-----------------orderview----------------->
		<?php if($isAddress==1){
		//when address is available
		?>
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
				$landmark=$row->landmark;
				$country=$row->Country;
				$phone_no=$row->phone_no;
		//if($type==1){?>

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
                <div class="cart-item-table commun-table mb-30">
                  <div class="table-responsive">
				 
                    <table class="table">
                      <thead>
                        <tr>
                          <th>Product</th>
                          <th>Product Detail</th>
                          <th>Sub Total</th>
                          <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <td><a href="product-page.html">
                            <div class="product-image"><img alt="Honour" src="images/1.jpg"></div>
                            </a></td>
                          <td><div class="product-title"> <a href="product-page.html">Cross Colours Camo Print Tank half mengo</a>
                              <div class="product-info-stock-sku m-0">
                                <div>
                                  <label>Price: </label>
                                  <div class="price-box"> <span class="info-deta price">$80.00</span> </div>
                                </div>
                              </div>
                              <div class="product-info-stock-sku m-0">
                                <div>
                                  <label>Quantity: </label>
                                  <span class="info-deta">1</span> </div>
                              </div>
                            </div></td>
                          <td><div data-id="100" class="total-price price-box"> <span class="price">$80.00</span> </div></td>
                          <td><i class="fa fa-trash cart-remove-item" data-id="100" title="Remove Item From Cart"></i></td>
                        </tr>
                        
                      </tbody>
                    </table>
                  </div>
                </div>
                <div class="right-side float-none-xs"> <a href="payment.html" class="btn btn-color">Next</a> </div>
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
                          <td><div class="price-box"> <span class="price">$160.00</span> </div></td>
                        </tr>
                        <tr>
                          <td>Shipping</td>
                          <td><div class="price-box"> <span class="price">$0.00</span> </div></td>
                        </tr>
                        <tr>
                          <td><b>Amount Payable</b></td>
                          <td><div class="price-box"> <span class="price"><b>$160.00</b></span> </div></td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                </div>
				  <div class="cart-total-table address-box commun-table mb-30">
                  <div class="table-responsive">
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
                                <p>
								<?php echo $landmark." - ".$locality." , "."<br>".$city." - ".$pincode." "."<br>".$phone_no;?></p>
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
		  
		  <!--------------------------------->
		  
		<div class="col-md-6">
			<?php
	 if(isset($_COOKIE["shopping_cart"])){
			$item_total = 0;
				echo '<table border="1px" class="table table-bordered">
				<tr>
				<th>Image</th>
				<th>Name</th>
				<th>Code</th>
				<th>Quantity</th>
				<th>price</th>
				</tr>
				';
				
		foreach($cookiecheck as $item)
		{
			print_r($item);
			?>
			<tr>
			<td><img src="<?php echo $obj_c->get_pro_front_img($item['id'])?>" width="100"></td>
			<td><?= $item['name'];?></td>
			<td><?= $item['code'];?></td>
			<td><?= $item['quantity'];?></td>
			<td><?= $item['quantity']*$item['price'];?></td>
			</form>
			</tr>
			<?php 
			$item_total += ($item["price"]*$item["quantity"]);
			$item_info=$item['name']; 
			}
			?>
			<tr>
			<td colspan='6' align="right">
				<b>Total: Rs.<?= $item_total ?></b> 
				<input type="hidden" name="amount" value="<?php echo $item_total ?>">
				<input type="hidden" name="p_info" value="<?php echo $item_info?>">
				<?php 
				$customers=$obj_m->fetch_where("customers",["name","email","phone_no"],["id"=>$cid]);
				print_r($customers);
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
			<tr>
				<td colspan="6">
					<button type="submit" name="before_pay" class="btn btn-primary">PAY NOW</button>
				</td>
			</tr>
			</table>
		<?php }else{?>
			<tr>
			<td>Product Not Found</td>
			</tr>
		<?php }
		?>

		</div>
		  <!----------------------------------->
		  

		<?php// }?>

		
		  
		  <?php 
			}
		}
		?>
<?php }?>
<div class="form-group">
				<br>
				<input type="hidden" name="c_id" value="<?php //echo $chiper->encrypt($cid)?>">
				<button type="submit" name="pay" value="pay" class="btn btn-primary btn-lg">Pay</button>
			</div>
		  <!--------------------------------->
		  
        </div>
      </div>
    </div>
  </section>
  <!-- CONTAINER END --> 
 

  <?php include("footer.php");?>