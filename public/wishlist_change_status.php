<?php include("../autoload.php");
$db=new Db;
$obj_m=new Model($db);
$obj_c=new Controller($obj_m);
$obj_c->security_guard();
/*product id*/
$p_id=$_GET["id"];
/*delete product*/
if(isset($_GET["action"]) && $_GET["action"]=="del"){

	//$res3=$obj_m->delete("categories",array("id"=>$p_id));
	$res3=$obj_m->delete("wishlist",array("product_id"=>$p_id),["customer_id"=>$customer_id]);
}
/*change status*/
if(isset($_GET["action"]) && $_GET["action"]=="ch"){
	$status=$_GET["status"];
	if($status==1){

		$res3=$obj_m->update("wishlist",array("status"=>1),array("product_id"=>$p_id));
	}else{
		$res3=$obj_m->update("wishlist",array("status"=>0),array("product_id"=>$p_id));

	}
}	


if($res3){
	header("Location:wishlist1.php");
	
}



?>