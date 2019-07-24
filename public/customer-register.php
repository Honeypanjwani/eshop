<?php 
include("../autoload.php");
$db=new Db;
$obj_m=new Model($db);
$obj_c=new Controller($obj_m);
?>
<?php include("header.php");?>
<?php include("navbar.php");?>
<?php 

$msg="";
$action="";
if($_SERVER['REQUEST_METHOD']=="POST"){
	 $fname=$email=$password=$c_password=$mobile_no="";
        $fname=$obj_c->cleaner($_POST['f-name']);
		$email=$obj_c->cleaner($_POST['email']);
		$mobile_no=$obj_c->cleaner($_POST['mobile_no']);
		$password=$obj_c->cleaner($_POST['password']);
      
	   //echo $fname;
	
if(!empty($fname) || !empty($email) || !empty($password) || !empty($c_password) || !empty($mobile_no)){
	
		$data=["email"=>$email,"name"=>$fname,"phone_no"=>$mobile_no,"password"=>sha1($password)];
		
		$res=$obj_m->insert("customers",$data);
		if($res=="23000"){
			$msg="Couster already exists";
			$action="danger";
			
		}
		elseIf($res=="00000"){
			$msg="coustomer sing up successafully done";
			$action="success";
		}
		else{
			
		}
		
		
		
	}
	
}


?>
  <!-- Bread Crumb STRAT -->
  <div class="banner inner-banner1 ">
    <div class="container">
      <section class="banner-detail center-xs">
        <h1 class="banner-title">Register</h1>
        <div class="bread-crumb right-side float-none-xs">
          <ul>
            <li><a href="index.php">Home</a>/</li>
            <li><span>Register</span></li>
          </ul>
        </div>
      </section>
    </div>
  </div>
  <!-- Bread Crumb END --> 

  <!-- CONTAIN START -->
  <section class="checkout-section ptb-70">
    <div class="container">
      <div class="row">
        <div class="col-12">
          <div class="row justify-content-center">
            <div class="col-xl-6 col-lg-8 col-md-8 ">
              <form class="main-form full" action="<?php htmlspecialchars(trim($_SERVER['PHP_SELF']))?>" method="post">
                <div class="row">
                  <div class="col-12 mb-20">
                    <div class="heading-part heading-bg">
                      <h2 class="heading">Create your account</h2>
					  
					  <?php //if(!empty($msg)){
					//echo "<p class='text-danger".$action."'>".$msg."</p>";
					
				//}?>
				<?php if(!empty($msg)){
					
					echo "<div class='alert alert-".$action." alert-dismissible'>
					<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
				".$msg."
					</div>";
					//echo "<p class='text-".$action."'>".$msg."</p>";
				}?>
					  
                    </div>
                  </div>
                  <div class="col-12">
                    <div class="input-box">
                      <label for="f-name">Full Name</label>
                      <input type="text" id="f-name" name="f-name" title="enter your name" pattern="^[a-zA-Z][a-zA-Z0-9-_\.]{1,12}$" required placeholder="First Name">
					    
								
                    </div>
                  </div>

                  <div class="col-12">
                    <div class="input-box">
                      <label for="login-email">Email address</label>
                      <input id="login-email"  type="email" name="email" required placeholder="Email Address">
                    </div>
                  </div>
				  <div class="col-12">
                    <div class="input-box">
                      <label for="login-mobile">Mobile No</label>
                      <input id="login-mobile" type="number" name="mobile_no" required placeholder="Enter your Mobile No">
                    </div>
                  </div>
                  <div class="col-12">
                    <div class="input-box">
                      <label for="login-pass">Password</label>
                      <input id="login-pass" type="password" name="password" required placeholder="Enter your Password">
                    </div>
                  </div>
                  <!--<div class="col-12">
                    <div class="input-box">
                      <label for="re-enter-pass">Re-enter Password</label>
                      <input id="re-enter-pass" type="password" name="cpassword" required placeholder="Re-enter your Password">
                    </div>
                  </div>-->
                  <div class="col-12">
                    <!--<div class="check-box left-side mb-20"> 
                      <span>
                        <input type="checkbox" name="remember_me" id="remember_me" class="checkbox">
                        <label for="remember_me">Remember Me</label>
                      </span>
                    </div>-->
                    <button name="submit" type="submit" class="btn-color right-side">Submit</button>
                  </div>
                  <div class="col-12">
                    <hr>
                    <div class="new-account align-center mt-20"> <span>Already have an account with us</span> <a class="link" title="Register with Stylexpo" href="customer-login.php">Login Here</a> </div>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- CONTAINER END --> 
<?php include("footer.php");?>