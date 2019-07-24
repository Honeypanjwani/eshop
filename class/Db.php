<?php
require("config.php");
class Db{
	private $host=DB_HOST,
			$username=DB_USERNAME,
			$password=DB_PASS,
			$dbname=DB_NAME;
	
	public $obj_source;
	
	public function __construct(){
		$this->connectivity();
	}
	
	private function connectivity(){
		try{
			$this->obj_source=new PDO("mysql:host=".$this->host.";dbname=".$this->dbname,$this->username,$this->password);
			$this->obj_source->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_WARNING);
		}
		catch(PDOException $e){
			echo $e->getMessage();
		}
	}
	
	public function __destruct(){
		$this->obj_source=null;
	}
	
}
?>