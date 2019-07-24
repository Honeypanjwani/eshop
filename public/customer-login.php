<?php 
include("../autoload.php");
$db=new Db;
$obj_m=new Model($db);
$obj_c=new Controller($obj_m);
?>

<?php 

	if($_SERVER['REQUEST_METHOD']=="POST"){
		
	   $login_email= $obj_c->cleaner($_POST['login_email']);
	   $login_pass= $obj_c->cleaner($_POST['login_pass']);
	   
	   if(!empty($login_email) || !empty($login_pass)){

         if(preg_match("/^[0-9]+$/",$login_email)){
			$res=$obj_m->fetch_where("customers",["id"],["phone_no"=>$login_email,"password"=>sha1($login_pass)]);
		}else{
			$res=$obj_m->fetch_where("customers",["id"],["email"=>$login_email,"password"=>sha1($login_pass)]);
		}
		 
		 // check
		 
		 if(isset($res)){
			 foreach($res as $row){
				 
				// print_r($row);
				$id1=$row->id;
			 }
			 
			 $_SESSION["id"]=$id1;
			 $_SESSION["customer_token"] = md5($_SERVER['REMOTE_ADDR'].$_SERVER['HTTP_USER_AGENT'].$id1);
			 

           // header("Location:my-account.php");
			header("Location:my-account.php");
		}
		else{
			$msg="Username or Password Incorrect";
		}
		 
		 
		   
	   }
	 
	 
}


?>
<?php include("header.php");?>
<?php include("navbar.php");?>

  <!-- Bread Crumb STRAT -->
  <div class="banner inner-banner1 ">
    <div class="container">
      <section class="banner-detail center-xs">
        <h1 class="banner-title">Login</h1>
        <div class="bread-crumb right-side float-none-xs">
          <ul>
            <li><a href="index-2.html">Home</a>/</li>
            <li><span>Login</span></li>
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
              <form class="main-form full" method="POST" action="<?php htmlspecialchars($_SERVER["PHP_SELF"])?>" >
			  	<?php 
							if(!empty($msg)){?>
								<div class="alert alert-danger alert-dismissible">
								<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
									<span><?php echo $msg?></span>
								</div>
							<?php }
							?>
                <div class="row">
                  <div class="col-12 mb-20">
                    <div class="heading-part heading-bg">
                      <h2 class="heading">Customer Login</h2>
                    </div>
                  </div>
                  <div class="col-12">
                    <div class="input-box">
                      <label for="login-email">Email address</label>
                      <input id="login-email" name="login_email" type="email" required placeholder="Email Address">
                    </div>
                  </div>
                  <div class="col-12">
                    <div class="input-box">
                      <label for="login-pass">Password</label>
                      <input id="login-pass"  name="login_pass" type="password" required placeholder="Enter your Password">
                    </div>
                  </div>
                  <div class="col-12">
                    <div class="check-box left-side"> 
                      <span>
                      <!--  <input type="checkbox" name="remember_me" id="remember_me" class="checkbox">
                        <label for="remember_me">Remember Me</label>
                      </span>-->
                    </div>
                    <button name="submit" type="submit" class="btn-color right-side">Log In</button>
                  </div>
                  <div class="col-12"> <a title="Forgot Password" class="forgot-password mtb-20" href="#">Forgot your password?</a>
                    <hr>
                  </div>
                  <div class="col-12">
                    <div class="new-account align-center mt-20"> <span>New to Stylexpo?</span> <a class="link" title="Register with Stylexpo" href="customer-register.php">Create New Account</a> </div>
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