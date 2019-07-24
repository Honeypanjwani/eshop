<?php include("../autoload.php");
$db=new Db;
$obj_m=new Model($db);
$obj_c=new Controller($obj_m);
$obj_c->security_guard();
?>
<?php 

?>
<?php include("header.php")?>
<?php include("sidebar.php")?>
<div class="col-md-9">
	<div class="card">
		<div class="card-header">
			<h5>Dashboard</h5>
		</div>
		<div class="card-block">
			
        <div class="content mt-3">
            <div class="animated fadeIn">
                <div class="row">


                    <div class="col-md-6 col-lg-3" >
                        <div class="card text-white">
                            <div class="card-body pb-0">
                             <div id="piechart"></div>
                        </div>

                    </div>
                </div>
                <!--/.col-->
				
				
                    <!--<div class="col-md-6 col-lg-3 ml-5" style="background-color:#007bff; height:135px; border-radius:10px;">
                        <div class="card text-white">
                            <div class="card-body pb-0">
                               
                        </div>

                    </div>
                </div>-->
                <!--/.col-->
				
				
                    <!--<div class="col-md-6 col-lg-3 ml-5" style="background-color:#007bff; height:135px; border-radius:10px;">
                        <div class="card text-white">
                            <div class="card-body pb-0">
                               
                        </div>

                    </div>
                </div>-->
                <!--/.col-->
	
		</div>
	</div>
</div>
<?php include("footer.php")?>