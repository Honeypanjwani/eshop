<?php
include("../autoload.php");
$db=new Db;
$obj_m=new Model($db);
$obj_c=new Controller($obj_m);
 ?>
 
 
 <?php  
 $err_msg=$success=$number=$address=$city=$pincode=$email=$country=$state=$data="";
if($_SERVER['REQUEST_METHOD'] == "POST"){
	$number = $_POST['contact'];
	$address = $_POST['address'];
	$city = $_POST['city'];
	$pincode = $_POST['pincode'];
	$email=$_POST['email'];
	$state = $_POST['state'];
	$country = $_POST['country'];

  /**********************/
  
	if(empty($err_msg)){
	$data = array("number"=>$number, "address"=>$address, "city"=>$city, "pincode"=>$pincode, "state"=>$state,"country"=>$country,"email"=>$email);
	
		$result=$obj_m->insert("address",$data);
		
		//print_r($result);
		if($result==00000){
			$success="Address insert successfully done";
		} 
		if($result==23000){
			$err_msg="Address name already exits";
		}
	}
  /********************/
}
 ?>
 <?php include("header.php");   ?>
 <?php  include("sidebar.php"); ?>
 <div class="col-md-9">
    	<?php if(!empty($success)){?>
		<div class="alert alert-success">
		<?php echo $success;?>hello
		</div>
		<?php } ?>
   <div class="card">
      <div class="card-header">
        <h4>Add Contact Us</h4>
      </div>
	  <div class="card-block">
	      <form action="<?php htmlspecialchars($_SERVER['PHP_SELF'])?>" method="post">
		    <div class="form-group">
			  <h4>Contact Number</h4>
			  <input type="text" name="contact" class="form-control">
			</div>
			<div class="form-group">
			<h4>Email</h4>
			<input type="email" name="email" class="form-control">
			</div>
			<div class="form-group">
			  <h4>Address</h4>
			  <input type="textarea" name="address" class="form-control">
		   </div>

		     <div class="form-group">
			  <h4>city</h4>
			  <select name="city" class="form-control">
			     <option value="Delhi">Delhi</option>
				 <option value="New Delhi">New Delhi</option>
			     <option value="Mumbai">Mumbai</option>
			     <option value="Noida">Noida</option> 
			  </select> 
		     </div>
		     <div class="form-group">
			 <h4>Pincode</h4>
			  <input type="text" name="pincode"  class="form-control">
		      </div> 
	             <div class="form-group">
			 <h4>State</h4>
			  <select name="state" class="form-control">
			     <option value="UP">UP</option>
				 <option value="Delhi">Delhi</option>
			     <option value="punjab">Punjab</option>
			     <option value="Rajasthan">Rajasthan</option>
			  </select>  
		   </div>
		    <div class="form-group">
			 <h4>Country</h4>
			  <select name="country" class="form-control">
			     <option value="India">India</option>
			     <option value="america">America</option>
			     <option value="dubai">Dubai</option>
			  </select>  
		   </div>
		          
		   <div class="form-group">
              <input type="submit" value="Submit" class="btn btn-primary">
		   </div>
		   </form>
	  </div>
	</div>
  </div>	        
<?php include("footer.php"); ?>