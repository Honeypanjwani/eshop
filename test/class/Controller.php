<?php 
session_start();
class Controller{
	
	private $mdl;
	
	
	public function __construct(Model $model_obj){
		$this->mdl=$model_obj;
	}
	
	public function cleaner($data){
		return htmlspecialchars(addslashes(strip_tags(trim($data))));
	}
	
	//login function
	public function login($tab,$username,$pwd,$redirect){
		$res=$this->mdl->fetch_where($tab,array("id"),array("email"=>$username,"password"=>$pwd));
		if($res!==null){
			foreach($res as $row){
				$id=$row->id;
			}
		//token genrate
		$_SESSION["id"]=$id;	
		$_SESSION["token"]=md5($_SERVER['REMOTE_ADDR'].$_SERVER['HTTP_USER_AGENT'].$id);
		header("Location:".$redirect);
		}else{
			return false;
		}
	}
	
	//token check
	public function security_guard($token="token"){
		$id=$_SESSION["id"];	
		if($_SESSION[$token]!=md5($_SERVER['REMOTE_ADDR'].$_SERVER['HTTP_USER_AGENT'].$id)){
			session_destroy();
			header("Location:index.php");
		}
	}
	

	
	public function test(){
		return $this->mdl->fetch_all("categories");
	}
	
	public function logout(){
		session_destroy();
		header("Location:index.php");
	}
	
	public function get_name_where_id($tab,$id){
		$res=$this->mdl->fetch_where($tab,array("name"),array("id"=>$id));
		if(isset($res)){
			foreach($res as $row){
				$name=$row->name;
			}
		return $name;	
		
		}
	}
	/*get actual price of any product*/
	public function price_calc($sale_price,$discount){
		$discount_price=($sale_price/(100-$discount)*10);
		$actual_price=floor($sale_price+$discount_price);
		return $actual_price;
	}
	
	//get dot is available or not
	public function get_dot($str){
		return strrpos($str,".");
	}
	
	private function get_extenstion($type){
		//return 	ltrim(strstr($type,"/",false),"/");
		$type=ltrim(strchr($type,"/"),"/");//image/jpeg
		if($type=="application/vnd.openxmlformats-officedocument.wordprocessingml.document"){
			return "docx";
		}else if($type=="application/vnd.openxmlformats-officedocument.spreadsheetml.sheet"){
			return "xls";
		}else{
			return $type;
		}
	}
	
	//single file uploading function
	public function upload($name,array $allowed_ext,$store_path="./"){
		if(!empty($name)){
			if($_FILES[$name]['error']==0){
				$type=$_FILES[$name]['type'];
				//filename
				$filename=time().".".$this->get_extenstion($type);
				$tmp_name=$_FILES[$name]['tmp_name'];
				//allowed image format
				if(in_array($this->get_extenstion($type),$allowed_ext)){
					$save_path=$store_path.$filename;
					if(move_uploaded_file($tmp_name,$save_path)){
						return $save_path;
						//store_path/time().jpeg
					}	
				}else{
					return  "file type doesn't match";
				}
			}	
		}else{
			echo "arrgument missing";
		}
	}
	
	//multiple file uploading function
	public function multiple_upload($name,array $allowed_ext,$store_path="./"){
		if(!empty($name)){
			for($i=0;$i<count($_FILES[$name]["name"]);$i++){
				if($_FILES[$name]['error'][$i]==0){
					$type=$_FILES[$name]['type'][$i];
					//filename
					$filename=time()."_".$i.".".$this->get_extenstion($type);
					$tmp_name=$_FILES[$name]['tmp_name'][$i];
					//allowed image format
					if(in_array($this->get_extenstion($type),$allowed_ext)){
						$save_path=$store_path.$filename;
						if(move_uploaded_file($tmp_name,$save_path)){
							$msg[]=$save_path;
							//store_path/time().jpeg
						}	
					}else{
						$msg[]="file type doesn't match ";
					}
				}
			}
		return $msg;
		}
	}
	
	/*get product fornt image*/
	 public function get_front_image($p_id){
		$images=$this->mdl->fetch_where_limit("media",array("path"),array("product_id"=>$p_id));
		if(isset($images)){
			foreach($images as $image){
				return $image->path;
			}
		}
	 }
	 
	 /**
	* add product into cart
	*/
	public function addInCart(int $pid,int $cid,string $color,string $size,string $quantity){
		$data=["p_id"=>$pid,"c_id"=>$cid,"color"=>$color,"size"=>$size,"quantity"=>$quantity];
		
		$isProductMatch=(array)$this->mdl->fetch_where("cart",["id"],["p_id"=>$pid,"c_id"=>$cid]);

		// var_dump($isProductMatch);
		// exit;
		if(count($isProductMatch)==0){
			$this->mdl->insert("cart",$data);
		}
	}


	
	//mail server smtp
	public function basic_mail_send($to,$sub,$altbody,$content){
		try {
			$mail = new PHPMailer(true); //New instance, with exceptions enabled

			//$body             = file_get_contents('contents.html');
			//$body             = preg_replace('/\\\\/','', $body); //Strip backslashes

			$mail->IsSMTP();                           // tell the class to use SMTP
			$mail->SMTPAuth   = true;                  // enable SMTP authentication
			$mail->Port       = 25;                    // set the SMTP server port
			$mail->Host       = "mail.codeindia.xyz"; // SMTP server
			$mail->Username   = "info@codeindia.xyz";     // SMTP server username
			$mail->Password   = "qwerty123!@#";            // SMTP server password

			//$mail->IsSendmail();  // tell the class to use Sendmail

			$mail->AddReplyTo("info@codeindia.xyz","CodeIndia");

			$mail->From       = "info@codeindia.xyz";
			$mail->FromName   = "CodeIndia";

			$mail->AddAddress($to);

			$mail->Subject  = $sub;

			$mail->AltBody    =$altbody;
			$mail->WordWrap   = 80; // set word wrap

			$mail->MsgHTML($content);

			$mail->IsHTML(true); // send as HTML

			$mail->Send();
			return true;;
		} catch (phpmailerException $e) {
			echo $e->errorMessage();
		}
	}
}//end class
?>