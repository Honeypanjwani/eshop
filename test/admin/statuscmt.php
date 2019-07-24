<?php 
include("../autoload.php");
$db=new Db;
$obj_m=new Model($db);
$obj_c=new Controller($obj_m);
?>
<?php 
 if(!isset($_GET['status'])  && empty($_GET['status'])){
	echo "some internal error";	
}
else{
	$status=$_GET['status'];
	$id= $_GET['id'];
}    
?>
<?php
if($status == 1){	
$where=array("id"=>$id);
print_r($where);
	$res = $obj_m->update("comment" , array("status"=>0), $where);
}
  else{
$where=array("id"=>$id);
	 $res = $obj_m->update("comment" , array("status"=>1) , $where);
} 

if($res){
		 header("location:viewcmt.php");  
	   } 

	  
   ?>