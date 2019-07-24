<?php 
include("../autoload.php");
$db=new Db;
$obj_m=new Model($db);
$obj_c=new Controller($obj_m);
$chiper=new AesChieper();
?>
<?php 
date_default_timezone_set('Asia/Kolkata');
$Date = date('Y-m-d H:i:s');
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
<?php 
if(isset($_POST["pay"]) && $_POST["pay"]=="pay"){
	$c_id=$chiper->decrypt($_POST["c_id"]);
	$customers=$obj_m->fetch_where("customers",["*"],["id"=>$c_id]);
	if(isset($customers)){
		foreach($customers as $cus){
			$phone_no=$cus->phone_no;
			$email=$cus->email;
			$name=$cus->name;
		}
		
		//fetch from cart
		$title=[];
		$prices=[];
		$pIds=$obj_m->fetch_where("cart",["p_id"],["c_id"=>$c_id]);
		if(isset($pIds)){
			foreach($pIds as $pid){
				$pData=$obj_m->fetch_where("products",["title","sale_price"],["id"=>$pid->p_id]);
				if(isset($pData)){
					foreach($pData as $data){
						$prices[]=$data->sale_price;
						$titles[]=$data->title;
					}
				}
			}
		}

		//calculate amount
		if(count($prices)>0){
			$amount=array_sum($prices);
			if($amount<500){
				$amount=$amount+50;
			}
		}
		//make product info
		if(count($titles)>0){
			$p_info=implode(" ",$titles);
		}
	}else{
		die("Unauthorised entry");
	}
}	
?>
<?php
// Merchant key here as provided by Payu
$MERCHANT_KEY ="fB7m8s";

// Merchant Salt as provided by Payu
$SALT ="eRis5Chv";

// End point - change to https://secure.payu.in for LIVE mode
$PAYU_BASE_URL = "https://test.payu.in/_payment";

$action = '';

$posted = array();
if(!empty($_POST)) {
    //print_r($_POST);
  foreach($_POST as $key => $value) {    
    $posted[$key] = $value; 
	
  }
}

$formError = 0;
if(empty($posted['txnid'])) {
  // Generate random transaction id
  $txnid = substr(hash('sha256', mt_rand() . microtime()), 0, 20);
} else {
  $txnid = $posted['txnid'];
}
$hash = '';
// Hash Sequence
$hashSequence = "key|txnid|amount|productinfo|firstname|email|udf1|udf2|udf3|udf4|udf5|udf6|udf7|udf8|udf9|udf10";
if(empty($posted['hash']) && sizeof($posted) > 0) {
  if(
          empty($posted['key'])
          || empty($posted['txnid'])
          || empty($posted['amount'])
          || empty($posted['firstname'])
          || empty($posted['email'])
          || empty($posted['phone'])
          || empty($posted['productinfo'])
          || empty($posted['surl'])
          || empty($posted['furl'])
		  || empty($posted['service_provider'])
  ) {
    $formError = 1;
  } else {
	$hashVarsSeq = explode('|', $hashSequence);
    $hash_string = '';	
	foreach($hashVarsSeq as $hash_var) {
      $hash_string .= isset($posted[$hash_var]) ? $posted[$hash_var] : '';
      $hash_string .= '|';
    }
    $hash_string .= $SALT;
    $hash = strtolower(hash('sha512', $hash_string));
    $action = $PAYU_BASE_URL . '/_payment';
  }
} elseif(!empty($posted['hash'])) {
  $hash = $posted['hash'];
  $action = $PAYU_BASE_URL . '/_payment';
}
?>
<?php 
 
   for($i=0; $i<count($titles); $i++){
             $data = array("product_name"=>$titles[$i], "amount"=>$prices[$i], "customer_id"=>$c_id ,"txnid"=>$txnid , "od"=>$Date);
			$info = $obj_m->insert("order2" , $data);
			
   } 
   
?>
  <script>
    var hash = '<?php echo $hash ?>';
    function submitPayuForm() {
      if(hash == '') {
        return;
      }
      var payuForm = document.forms.payuForm;
      payuForm.submit();
    }
  </script>
  
  <body onload="submitPayuForm()">
    <h2>PayU Form</h2>
    <br/>
    <?php if($formError) { ?>
	
      <span style="color:red">Please fill all mandatory fields.</span>
      <br/>
      <br/>
    <?php } ?>
    <form action="<?php echo $action; ?>" method="post" name="payuForm">
      <input type="hidden" name="key" value="<?php echo $MERCHANT_KEY ?>" />
      <input type="hidden" name="hash" value="<?php echo $hash ?>"/>
      <input type="hidden" name="txnid" value="<?php echo $txnid ?>" />
      <table>
	  
        <tr>
          <td><b>Mandatory Parameters</b></td>
        </tr>
        <tr>
          <td>Amount: </td>
          <td><input name="amount" value="<?php echo (empty($posted['amount'])) ? $amount : $posted['amount'] ?>" /></td>
          <td>First Name: </td>
          <td><input name="firstname" id="firstname" value="<?php echo (empty($posted['firstname'])) ?$name : $posted['firstname']; ?>" /></td>
        </tr>
        <tr>
          <td>Email: </td>
          <td><input name="email" id="email" value="<?php echo (empty($posted['email'])) ? $email : $posted['email']; ?>" /></td>
          <td>Phone: </td>
          <td><input name="phone" value="<?php echo (empty($posted['phone'])) ? $phone_no : $posted['phone']; ?>" /></td>
        </tr>
        <tr>
          <td>Product Info: </td>
          <td colspan="3"><textarea name="productinfo" cols="50" rows="4"><?php echo (empty($posted['productinfo'])) ?$p_info : $posted['productinfo'] ?></textarea></td>
        </tr>
        <tr>
          <td>Success URI: </td>
          <td colspan="3"><input name="surl" type="hidden" value="<?php echo (empty($posted['surl'])) ? 'http://localhost/laxman%20new/new%20poject%20by%20laxman2%20session%20testing/public/success.php' : $posted['surl'] ?>" size="64" /></td>
        </tr>
        <tr>
          <td>Failure URI: </td>
          <td colspan="3"><input name="furl" type="hidden" value="<?php echo (empty($posted['furl'])) ? 'http://localhost/laxman%20new/new%20poject%20by%20laxman2%20session%20testing/public/failure.php' : $posted['furl'] ?>" size="64" /></td>
        </tr>

        <tr>
          <td colspan="3"><input type="hidden" name="service_provider" value="payu_paisa" size="64" /></td>
        </tr>    
        <tr>
          <?php if(!$hash) { ?>
            <td colspan="4"><input type="submit"  class="btn btn btn-color"  value="Submit" /></td>
          <?php } ?>
        </tr>
      </table>
    </form>
  </body>
<?php include("footer.php");?>