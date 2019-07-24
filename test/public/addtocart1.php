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

  <!----------------------------------------------------------------------------------------------------------->
  
<!----------------------------------------------------------------------------------------->
<?php
$message='';
$item_data="";
$total="";
$code="";


 if(isset($_POST["add_to_cart"])){
	 // 2nd condition
	 
	 if(isset($_COOKIE["shopping_cart"])){
		  
		  $cookie_data = stripslashes($_COOKIE['shopping_cart']);
		  
		  $cart_data= json_decode($cookie_data,true);
	 }
	 else{
		 
		 $cart_data = array();
	 }
	 $item_id_list=array_column($cart_data,'item_id');
	 if(in_array($_POST["hidden_id"], $item_id_list)){
		 
		 foreach($cart_data as $keys=>$values){
			 
			 if($cart_data[$keys]["item_id"]== $_POST["hidden_id"]){
				 
				 $cart_data[$keys]["item_quantity"] = $cart_data[$keys]["item_quantity"] + $_POST["quantity"];
			 }//
		 }
		 
	 }
	 else{
		 	$item_array = array(
			'item_id'			=>	$_POST["hidden_id"],
			'item_name'			=>	$_POST["hidden_name"],
			'item_price'		=>	$_POST["hidden_price"],
			'item_quantity'		=>	$_POST["quantity"],
			'item_size'		    =>	$_POST["size"],
			'item_color'		=>	$_POST["color"]
		); 
		foreach($item_array as $k=>$v){
	       $value[] = $v;	  
		}
		$check  = $value[0];
		/*echo $check ;
		exit;
		print_r($value);
		  exit;
           for($i=0; $i<1; $i++){
			  $id2 = implode("," , $value);  
		   }
		  // echo $id2;
		 //  exit;
		     $id3  = ltrim(strchr($id2 , ",") , ",");
		   echo $id3;
		   exit; */
		$cart_data[]=$item_array;
		$item_data=json_encode($cart_data);
	
	}
	 

	    setcookie('shopping_cart', $item_data, time() + (86400 * 30));
		header("location:addtocart.php?success=1");

		}
		
		
if(isset($_GET["action"])){
	if($_GET["action"] == "delete"){
		$cookie_data = stripslashes($_COOKIE['shopping_cart']);
		$cart_data = json_decode($cookie_data,true);
		foreach($cart_data as $keys => $values){
			
			if($cart_data[$keys]['item_id'] == $_GET["id"]){
             unset($cart_data[$keys]);
            $item_data= json_encode($cart_data);
            setcookie('shopping_cart',$item_data, time() + (86400 * 30));
				header("location:addtocart.php?remove=1");
				
			}
			
		}
		
	}
	
	
	if($_GET["action"] == "clear"){
		setcookie("shopping_cart", "" ,time() - 3600);
		header("location:addtocart.php?clearall=1");
		
		
	}
}
		
if(isset($_GET["success"])){
	
	$message = '
	<div class="alert alert-success alert-dismissible">
	  	<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
	  	Item Added into Cart
	</div>
	';
	
}
if(isset($_GET["remove"])){
	
	$message = '
	<div class="alert alert-success alert-dismissible">
	<a href="#" class="close" data-dismiss="alert" aria-label="close">&times</a>
	Item Remove form Cart
	</div>
	';
	
}
if(isset($_GET["clearall"])){
	$message='
	
	<div class="alert alert-success alert-dismissible">
	<a href="#" class="close" data-dismiss="alert" aria-label="close">&times</a>
	Shopping cart has been clear.......
	</div>
	
	';
	
}


?>



<!----------------------------------------------------------/-////////////////////////----->

  <!----------------------------------------------------------------------------------------------------------->


  <!-- CONTAIN START -->
  <section class="ptb-70">
    <div class="container">
      <div class="row">
        <div class="col-12">
          <div class="cart-item-table commun-table">
            <div class="table-responsive">
			<?php echo $message; ?>
			<div align="right">
			<a href="addtocart.php?action=clear">
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
				<!---------------------testting1------------------------------------------------>
				   <?php 
			   if(isset($_COOKIE["shopping_cart"])){
				   
				   $total=0;
				   
				   $cookie_data = stripslashes($_COOKIE['shopping_cart']);
				   $cart_data= json_decode($cookie_data,true);
				   
		
				   foreach($cart_data as $keys =>$values){ 
				   
				   /******************************************/
				   
				   /******************************************/
				   			
				   ?>
				   
				   <!------------------------tr start------------------------------>
				   
                <tbody>
					<tr>
                    <td>
                      <a href="product-page.html">
                        <div class="product-image">
						
						<?php
						$res = $obj_m->fetch_where("media",array('*'),array("id"=>$values["item_id"]));
						if(isset($res)){	
							foreach ($res as $images){
						  
						?>
                          <img alt="Stylexpo" src="<?php echo $obj_c->get_front_image($values["item_id"]); ?>" >
						<?php }}?>
                        </div>
                      </a>
                    </td>
                    <td>
                      <div class="product-title"> 
                        <a href="product-page.html"><?php echo $values["item_name"];?></a> 
                      </div>
                    </td>
                    <td>
                      <ul>
                        <li>
                          <div class="base-price price-box"> 
                            <span class="price"><?php echo $values["item_price"];?></span> 
                          </div>
                        </li>
                      </ul>
                    </td>
                    <td>
                      <div class="input-box select-dropdown">
                        <fieldset>
                          <select data-id="100" class="quantity_cart option-drop" name="quantity_cart">
                            <option><?php echo $values["item_quantity"];?></option>
                            
                          </select>
                        </fieldset>
                      </div>
                    </td>
                    <td>
                      <div class="total-price price-box"> 
                        <span class="price"><?php echo number_format($values["item_quantity"] * $values["item_price"], 2); ?></span> 
                      </div>
                    </td>
                    <td>

					  <a href="addtocart.php?action=delete&id=<?php echo $values["item_id"];?>">
					  <i title="Remove Item From Cart" data-id="100" class="fa fa-trash cart-remove-item"></i>
					  </a>
                    </td>
                  </tr>
                </tbody>
				   
				   
				   				   <!------------------------tr end------------------------------>
				   <?php 

				         $total=$total +($values["item_quantity"] * $values["item_price"]); // total of shopping cart
						 
				   }
				   
				   ?>
				     <!--  <tr>
					    <td colspan="4" align="right">Total</td>
						<td align="right"> Rs:- <?php //echo number_format($total, 2)?></td>
						<td></td>
					   </tr>-->
				   
				   <?php
				   
			   }
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
				   
			
				<!-----------------------testing2---------------------------------------------->
				
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
           <!-- <div class="estimate">
              <div class="heading-part mb-20">
                <h3 class="sub-heading">Estimate shipping and tax</h3>
              </div>
              <form class="full">
                <div class="row">
                  <div class="col-md-12">
                    <div class="input-box select-dropdown mb-20">
                      <fieldset>
                        <select id="country_id" class="option-drop">
                          <option selected="" value="">Select Country</option>
                          <option value="1">India</option>
                          <option value="2">China</option>
                          <option value="3">Pakistan</option>
                        </select>
                      </fieldset>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="input-box select-dropdown mb-20">
                      <fieldset>
                        <select id="state_id" class="option-drop">
                          <option selected="" value="1">Select State/Province</option>
                          <option value="2">---</option>
                        </select>
                      </fieldset>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="input-box select-dropdown mb-20">
                      <fieldset>
                        <select id="city_id" class="option-drop">
                          <option selected="" value="1">Select City</option>
                          <option value="2">---</option>
                        </select>
                      </fieldset>
                    </div>
                  </div>
                </div>
              </form>
            </div>-->
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
    </div>
  </section>
  <!-- CONTAINER END --> 
  
  <?php //echo $_SESSION['id'];
  //echo $id=$_GET["p_id"];
  						  //$product_size = $obj_m->fetch_where_2("size",array("*"),array("id"=>$values["item_id"]));
   //print_r($product_size);
   //echo $product_sizes->size;
   //foreach($product_size as $product_sizes){
	   //echo $product_sizes->size;
	   
  // }
   						//$res = $obj_m->fetch_where("media",array('*'),array("id"=>$values["item_id"]));
   // print_r($res);
				//$item_id=$values["item_id"];
				//$item_name=$values["item_name"];
				//$item_price=$values["item_price"];
				//$item_quantity=$values["item_quantity"];
				//$item_size=$values["size"];
				//$item_color=$values["color"];

				
				   			//  echo "p_id ".$item_id."<br>.......... pname".$item_name."<br>..........p_price".$item_price.".<br>.........pqty".$item_quantity.".<br>.........coustomerid".$cid.""; 
  ?>
  <?php include("footer.php");?>