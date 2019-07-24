<?php include("../autoload.php");
$db=new Db;
$obj_m=new Model($db);
$obj_c=new Controller($obj_m);

$obj_c->security_guard();
?>


<?php 
if(!isset($_POST["sub_cat_Id"]) || empty($_POST['sub_cat_Id'])){
	$output1=["error"=>true,"message"=>"some internal error"];
	echo json_encode($output1);
	exit;
}
$sub_cat_id=$_POST["sub_cat_Id"];
$result1=$obj_m->fetch_where("brands",["name","id"],["sub_cat_id"=>$sub_cat_id]);
if($result1 !== false){
	$output1=["error"=>false,"message"=>$result1];
	echo json_encode($output1);
}
?>