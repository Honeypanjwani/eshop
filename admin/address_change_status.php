<?php include("../autoload.php");
$db=new Db;
$obj_m=new Model($db);
$obj_c=new Controller($obj_m);
$obj_c->security_guard();
/*product id*/
$p_id=$_GET["id"];
/*delete product*/
if(isset($_GET["action"]) && $_GET["action"]=="del"){

	$res2=$obj_m->delete("address",array("id"=>$p_id));
}
/*change status*/
if(isset($_GET["action"]) && $_GET["action"]=="ch"){
	$status=$_GET["status"];
	if($status==1){

		$res2=$obj_m->update("address",array("status"=>1),array("id"=>$p_id));
	}else{

		$res2=$obj_m->update("address",array("status"=>0),array("id"=>$p_id));

	}
}	


if($res2){
	header("Location:view_contact_us.php");
	
}


?>