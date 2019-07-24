<?php
class Model{
	
	private $db;
	
	public function __construct(Db $db_obj){
		$this->db=$db_obj->obj_source;
	}
	
	public function insert($tab,array $fields){
		
		foreach($fields as $k=>$v){
			$columns[]=$k;
			$values[]=$v;
			$symbols[]='?';
		}
		$final_fields=implode(",",$columns);
		$final_symbols=implode(",",$symbols);
		
		//sql="insert into categories(name) values('men')";
		$sql="insert into ".$tab."(".$final_fields.") values(".$final_symbols.")";
		$stmt=$this->db->prepare($sql);
		@$stmt->execute($values);
		return $stmt->errorCode();
	}
	public function insert2($tab,array $fields){
		foreach($fields as $k=>$v){
			$columns[]=$k;
			$values[]=$v;
			$symbols[]='?';
		}
		$final_fields=implode(",",$columns);
		$final_symbols=implode(",",$symbols);
		
		//sql="insert into categories(name) values('men')";
		$sql="insert into ".$tab."(".$final_fields.") values(".$final_symbols.")";
		
		$stmt=$this->db->prepare($sql);
		@$stmt->execute($values);
		return $stmt->errorCode();
	}
	
	public function delete($tab,array $where,$con="and"){
		//for base
		foreach($where as $base_k=>$base_v){
			$store_base_data[]=$base_k."='".$base_v."'";
		}
		$final_base_data=implode(" ".$con." ",$store_base_data);
		
		$sql="delete from ".$tab." where ".$final_base_data;		
		$stmt=$this->db->prepare($sql);
		$stmt->execute();
		return true;
	}
	        
			public function fetch_where_2($tab,array $cols , array $where ,$cond="and"){
		$data=null;
		
			
		$final_cols_str=implode(",",$cols);
		//convert sting into where data
		foreach($where as $k=>$v){
			$store_wehre[]=$k."='".$v."'";
		}
		$final_where_str=implode(" ".$cond." ",$store_wehre);
		//email='abc@gmailc.om' and password='admin123'
		$sql="select ".$final_cols_str." from ".$tab." where ".$final_where_str;
		//echo $sql;
		//exit;
		$stmt=$this->db->prepare($sql);
	      $stmt->execute();
		if($stmt->rowCount()>0){
			while($row=$stmt->fetch(PDO::FETCH_OBJ)){
				$data[]=$row;
			}
		return $data;
		}
	}
	
	public function fetch_where($tab,array $cols , array $where ,$cond="and"){
		$data=null;
	
			
		$final_cols_str=implode(",",$cols);
		//convert sting into where data
		foreach($where as $k=>$v){
			$store_wehre[]=$k."='".$v."'";
		}
		$final_where_str=implode(" ".$cond." ",$store_wehre);
		//email='abc@gmailc.om' and password='admin123'
		$sql="select ".$final_cols_str." from ".$tab." where ".$final_where_str;
        //print_r($sql);	
		
		$stmt=$this->db->prepare($sql);
		$stmt->execute();
		if($stmt->rowCount()>0){
			while($row=$stmt->fetch(PDO::FETCH_OBJ)){
				$data[]=$row;
			}
		return $data;
		}
	}
	

	
	public function fetch_where_limit($tab,array $cols,array $where,$limit=1,$cond="and"){
		$data=null;
		$final_cols_str=implode(",",$cols);
		//convert sting into where data
		foreach($where as $k=>$v){
			$store_wehre[]=$k."='".$v."'";
		}
		$final_where_str=implode(" ".$cond." ",$store_wehre);
		//email='abc@gmailc.om' and password='admin123'
		$sql="select ".$final_cols_str." from ".$tab." where ".$final_where_str." LIMIT ".$limit;
		$stmt=$this->db->prepare($sql);
		$stmt->execute();
		if($stmt->rowCount()>0){
			while($row=$stmt->fetch(PDO::FETCH_OBJ)){
				$data[]=$row;
			}
		return $data;
		}
	}
	
	public function fetch_all($tab){
		$data=null;
		$sql="select * from ".$tab;
		$stmt=$this->db->prepare($sql);
		$stmt->execute();
		if($stmt->rowCount()>0){
			while($row=$stmt->fetch(PDO::FETCH_OBJ)){
				$data[]=$row;
			}
		return $data;
		}	
	}
	
	/*table data update*/
	public function update($tab,array $update_cols,array $baseCol,$con="and"){
		foreach($update_cols as $upd_k=>$upd_v){
			$store_upd_data[]=$upd_k."='".$upd_v."'";
			}
		$final_upd_data=implode(",",$store_upd_data);
		//for base
		foreach($baseCol as $base_k=>$base_v){
			$store_base_data[]=$base_k."='".$base_v."'";
		}
		$final_base_data=implode(" ".$con." ",$store_base_data);
		
		$sql="update ".$tab." SET ".$final_upd_data." where ".$final_base_data;		
		$stmt=$this->db->prepare($sql);
		$stmt->execute();
		return true;
	}	
	
	public function last_insert_id(){
		return $this->db->lastInsertId();
	}
	
	public function query($sql){
		$stmt=$this->db->prepare($sql);
		$stmt->execute();
		if($stmt->rowCount()>0){
			while($row=$stmt->fetch(PDO::FETCH_ASSOC)){
				$data[]=$row;
			}
		return $data;
		}	
	}
	
	//count table row
	public function tabRowCount($cus_id,$table_name){
		$sql="select id from ".$table_name." where customer_id=".$cus_id;
		$stmt=$this->db->prepare($sql);
		$stmt->execute();
		$count=$stmt->rowCount();
		return $count;
	}

	//wishlist same product same customer existance check
	public function wishlist_exitance_check(int $pid,int $cid):int{
		$data=["product_id"=>$pid,"customer_id"=>$cid];
		$res=$this->fetch_where("wishlist",["id"],$data);	
		if(isset($res)){
			return 1;
		}else{
			return 0;
		}
	}

	//get wishlist product
	public function get_wishlist_product($cus_id){
		$sql="select id,title,sale_price from products where id in(select product_id from wishlist where customer_id=".$cus_id.")";
		$stmt=$this->db->prepare($sql);
		$stmt->execute();
		if($stmt->rowCount()>0){
			while($row=$stmt->fetch(PDO::FETCH_OBJ)){
				$data[]=$row;
			}
		return $data;
		}	
		
	}
	//	
	public function fetch_where_pagination($tab,array $cols,array $where ,  $start ,$per_page , $cond="OR"){
		$data=null;
		$final_cols_str=implode(",",$cols);
		//convert sting into where data
		foreach($where as $k=>$v){
			$store_wehre[]=$k."='".$v."'";
		}
		$final_where_str=implode(" ".$cond." "  , $store_wehre);
		       
		//email='abc@gmailc.om'
		$sql="select ".$final_cols_str." from ".$tab." where ".$final_where_str." LIMIT $start,$per_page";
	   	$stmt=$this->db->prepare($sql);
		$stmt->execute();
		if($stmt->rowCount()>0){
			while($row=$stmt->fetch(PDO::FETCH_OBJ)){
				$data[]=$row;
			}	
				return $data;	
		}	
	}
	
	public function fetch_where_or($tab,array $cols,array $where,$cond="OR"){
		$data=null;
		$final_cols_str=implode(",",$cols);
		//convert sting into where data
		foreach($where as $k=>$v){
			$store_wehre[]=$k."='".$v."'";
		}
		$final_where_str=implode(" ".$cond." "  , $store_wehre);
		       
		//email='abc@gmailc.om'
		$sql="select ".$final_cols_str." from ".$tab." where ".$final_where_str;
	   	$stmt=$this->db->prepare($sql);
		$stmt->execute();
		if($stmt->rowCount()>0){
			while($row=$stmt->fetch(PDO::FETCH_OBJ)){
				$data[]=$row;
			}	
				return $data;	
		}	
	}
	
	public function page($tab){
		$sql = "select id from ".$tab;
		$stmt = $this->db->prepare($sql);
		$stmt->execute();
		if($stmt->rowcount()>0){
			$count = $stmt->rowcount();
			return $count;
		}	
	}
	public function page_where($tab,array $cols,array $where,$cond="and"){
		$data=null;
		$final_cols_str=implode(",",$cols);
		//convert sting into where data
		foreach($where as $k=>$v){
			$store_wehre[]=$k."='".$v."'";
		}
		$final_where_str=implode(" ".$cond." ",$store_wehre);
		
		//email='abc@gmailc.om'
		$sql="select ".$final_cols_str." from ".$tab." where ".$final_where_str;
	   	$stmt=$this->db->prepare($sql);
		$stmt->execute();
		if($stmt->rowCount()>0){
			$count = $stmt->rowcount();
			return $count;
		}	
	}
	
	public function page_2($tab , $start , $per_page){
		
 $sql="select * from ".$tab." LIMIT $start,$per_page";
  $stmt = $this->db->prepare($sql);
  $stmt->execute(); 
	    if($stmt->rowcount()>0){
			while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
				$data[]= $row;
			}
		return $data;
		}	
	}
	
}
?>