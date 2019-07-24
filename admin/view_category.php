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
			<h5>View Category</h5>
		</div>
		<div class="card-block">
			<table class="table table-bordered">
				<thead>
					<tr>
						<th>S.No.</th>
						<th>Category Name</th>
						<th>Delete</th>
					</tr>
				</thead>
				<tbody>
				<?php 
				$result=$obj_m->fetch_all("categories");
				if(isset($result)){
					$sr=1;
					foreach($result as $row){
				?>
					<tr>
						<td><?php echo $sr++?></td>
						<td><?php echo $row->name?></td>
						<td><a href="categories_change_status.php?action=del&id=<?php echo $row->id;?>" class="btn btn-danger btn-sm">Delete</a></td>
					</tr>
				<?php } } else{ ?>
				<tr>
					<td colspan="3">Data not found</td>
				</tr>
				<?php }?>				
				</tbody>
			</table>
		</div>
	</div>
<div>
<?php include("footer.php")?>