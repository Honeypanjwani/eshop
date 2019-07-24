<?php 
include("../autoload.php");
$db=new Db;
$obj_m=new Model($db);
$obj_c=new Controller($obj_m);
?>

<?php 
if(isset($_GET["pid"]) && isset($_GET["cid"])){
	$cid=$_GET["cid"];
	$pid=$_GET["pid"];
	if($obj_m->delete("cart",["c_id"=>$cid,"p_id"=>$pid])){
		header("Location:cart.php");
	}
}
?>