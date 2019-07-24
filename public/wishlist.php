<?php 
include("../autoload.php");
$db=new Db;
$obj_m=new Model($db);
$obj_c=new Controller($obj_m);
?>
<?php 
//get customer is login or not
if(!isset($_SESSION["customer_token"])){
    echo 0;
    exit;
}

else{
	$customer_id=isset($_SESSION["id"])?$_SESSION["id"]:null;
	echo $customer_id;
}
?>
<?php 
//if customer is login
$customer_id=$_SESSION["id"];
$pid=$_POST["pid"];
if($obj_m->wishlist_exitance_check((int)$pid,(int)$customer_id)==0){
    $data=["product_id"=>$pid,"customer_id"=>$customer_id];
    $res=$obj_m->insert("wishlist",$data);
    if($res==00000){
        echo 1;
    }
}else{
    echo 2;
}

?>