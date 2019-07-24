<?php 
include("../autoload.php");
$db=new Db;
$obj_m=new Model($db);
$obj_c=new Controller($obj_m);
?>

<?php include("header.php");?>
<?php //include("navbar.php");?>
<!----------------------------------------------------------------------------------------->
<?php
$message='';
$item_data="";
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
			'item_quantity'		=>	$_POST["quantity"]
		); 
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


			<div style="clear:both"></div>
			<br />
			<h3>Order Details</h3>
			<div class="table-responsive">
			<?php echo $message; ?>
			<div align="right">
			<a href="addtocart.php?action=clear">
			<b>Clear Cart</b>
			</a>
			</div>
			
			<div align="left">
			<a href="index.php">
			<b>Go to Shopping</b>
			</a>
			</div>
			<table class="table table-bordered">
				<tr>
				    <th width="10%">Product</th>
					<th width="30%">Item Name</th>
					<th width="10%">Quantity</th>
					<th width="20%">Price</th>
					<th width="15%">Total</th>
					<th width="5%">Action</th>
				</tr>
			   <?php 
			   if(isset($_COOKIE["shopping_cart"])){
				   
				   $total=0;
				   
				   $cookie_data = stripslashes($_COOKIE['shopping_cart']);
				   $cart_data= json_decode($cookie_data,true);
				   
				   foreach($cart_data as $keys =>$values){ ?>
				   
				   <tr>
				    <td><img src="<?php //echo $obj_c->get_pro_front_img($values['id'])?>" width="100"></td>
				   <td><?php echo $values["item_name"];?></td>
				   <td><?php echo $values["item_quantity"];?></td>
				   <td><?php echo $values["item_price"];?></td>
				   <td><?php echo number_format($values["item_quantity"] * $values["item_price"], 2); ?></td>
				   <td><a href="addtocart.php?action=delete&id=<?php echo $values["item_id"];?>"><span class="text-danger">Remove</span></a></td>
				   </tr>
				   
				   <?php 
				         $total=$total +($values["item_quantity"] * $values["item_price"]); // total of shopping cart
						 
				   }
				   
				   ?>
				       <tr>
					    <td colspan="4" align="right">Total</td>
						<td align="right"> Rs:- <?php echo number_format($total, 2)?></td>
						<td></td>
					   </tr>
				   
				   
				   <?php
				   
			   }
			   else{
				   
				   echo '
				   <tr>
				   <td colspan="5" align="center">
				   No Item In Cart
				   </td>
				   </tr>
				   
				   ';
			   }
			   
			   ?>
			
			</table>
			</div>


<!----------------------------------------------------------/-////////////////////////----->
<?php include("footer.php");?>