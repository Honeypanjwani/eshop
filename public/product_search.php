<?php 
include("../autoload.php");
$db=new Db;
$obj_m=new Model($db);
$obj_c=new Controller($obj_m);
?>
<?php
$term=$_GET["term"];
	$data=$obj_m->query("select title from products where title LIKE '%".$term."%'");
	foreach($data as $row){
		$data[]=$row["title"];
		}
    //return json data
    echo json_encode($data);
?>