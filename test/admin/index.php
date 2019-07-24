<?php 
include("../autoload.php");
$db=new Db;
$model=new Model($db);
$obj_c=new Controller($model);
?>
<?php 
$email_err=$pwd_err=$msg="";
if($_SERVER['REQUEST_METHOD']=="POST"){
	$email=$obj_c->cleaner($_POST["email"]);
	$pwd=$obj_c->cleaner($_POST["pwd"]);	

	if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
		$email_err="Enter correct email-Id format";
	}
	
	if(empty($pwd)){
		$pwd_err="Password filed should not empty";
	}
		
	if(empty($email_err) && empty($pwd_err)){
		$res=$obj_c->login("users",$email,$pwd,"dashboard.php");
		if($res===false){
			$msg="Username or password doesn't match";
		}
	}
}
?>
<!doctype html>
<html>
	<head>
		<title>Login</title>
		<link href="../resource/css/bootstrap.min.css" rel="stylesheet">
	</head>
	<body>
		<div class="container">
			<div class="row">
				<div class="col-md-6 offset-3">
					<div class="card">
						<div class="card-header">
							<h4>Login Account</h4>
						</div>
						<div class="card-block">
							<?php if(!empty($msg)){?>
							<div class="alert alert-danger">
								<span><?php echo $msg?></span>
							</div>
							<?php }?>
							<form action="<?php htmlspecialchars($_SERVER['PHP_SELF'])?>" method="post">
							<div class="form-group">
								<label>Email</label>
								<input type="text" name="email" class="form-control">
								<span class="text-danger"><?=$email_err?></span>
							</div>
							<div class="form-group">
								<label>Password</label>
								<input type="password" name="pwd" class="form-control">
								<span class="text-danger"><?=$pwd_err?></span>
							</div>
							<div class="form-group">
								<input type="submit" value="
								Login" class="btn btn-primary">
							</div>
							<!--<a href="register.php">Register Account</a>-->
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</body>
</html>
