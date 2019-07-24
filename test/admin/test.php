<?php include("../autoload.php");
$db=new Db;
$obj_m=new Model($db);
$obj_c=new Controller($obj_m);
?>
<?php 
var_dump($obj_m->update("test",array("name"=>"mohan"),array("id"=>1)));
?>