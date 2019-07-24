<?php include("../autoload.php");
$db=new Db;
$obj_m=new Model($db);
$obj_c=new Controller($obj_m);
$obj_c->security_guard();
/*product id*/
$p_id=$_GET["id"];
/*delete product*/
if(isset($_GET["action"]) && $_GET["action"]=="del"){
	$res=$obj_m->delete("comment",array("id"=>$p_id));
	$res1=$obj_m->delete("slider",array("id"=>$p_id));
	$res2=$obj_m->delete("address",array("id"=>$p_id));
	$res3=$obj_m->delete("categories",array("id"=>$p_id));
	$res4=$obj_m->delete("sub_categories",array("id"=>$p_id));
	$res5=$obj_m->delete("brands",array("id"=>$p_id));
}
/*change status*/
if(isset($_GET["action"]) && $_GET["action"]=="ch"){
	$status=$_GET["status"];
	if($status==1){
		$res=$obj_m->update("comment",array("status"=>1),array("id"=>$p_id));
		$res1=$obj_m->update("slider",array("status"=>1),array("id"=>$p_id));
		$res2=$obj_m->update("address",array("status"=>1),array("id"=>$p_id));
		$res3=$obj_m->update("categories",array("status"=>1),array("id"=>$p_id));
		$res4=$obj_m->update("sub_categories",array("status"=>1),array("id"=>$p_id));
		$res5=$obj_m->update("brands",array("status"=>1),array("id"=>$p_id));
	}else{
		$res=$obj_m->update("comment",array("status"=>0),array("id"=>$p_id));
		$res1=$obj_m->update("slider",array("status"=>0),array("id"=>$p_id));
		$res2=$obj_m->update("address",array("status"=>0),array("id"=>$p_id));
		$res3=$obj_m->update("categories",array("status"=>0),array("id"=>$p_id));
		$res4=$obj_m->update("sub_categories",array("status"=>0),array("id"=>$p_id));
		$res5=$obj_m->update("brands",array("status"=>0),array("id"=>$p_id));

	}
}	


if($res1){
	header("Location:banner.php");	
}
if($res2){
	header("Location:view_contact_us.php");
	
}
if($res3){
	header("Location:view_category.php");
	
}
if($res4){
	header("Location:view_sub_category.php");
}
if($res5){
	header("Location:view_brand.php");
}



?>