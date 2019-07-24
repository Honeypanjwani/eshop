<?php include("../autoload.php");
$db=new Db;
$obj_m=new Model($db);
$obj_c=new Controller($obj_m);

$obj_c->security_guard();
?>
<?php 
if(!isset($_POST["cat_Id"]) || empty($_POST['cat_Id'])){
	$output=["error"=>true,"message"=>"some internal error"];
	echo json_encode($output);
	exit;
}
$cat_id=$_POST["cat_Id"];
$result=$obj_m->fetch_where("sub_categories",["name","id"],["cat_id"=>$cat_id]);
if($result !== false){
	$output=["error"=>false,"message"=>$result];
	echo json_encode($output);
}
?>