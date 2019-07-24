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
			<h5>View Projects</h5>
		</div>
		<div class="card-block">
			<table class="table table-bordered">
				<thead>
					<tr>
						<th>S.No.</th>
						<th>Name</th>
						<th>Category</th>
						<th>Stock</th>
						<th>Status</th>
						<th>Delete</th>
					</tr>
				</thead>
				<tbody>
				<?php 
				$result=$obj_m->fetch_all("products");


			
				if(isset($result)){
					$sr=1;
					foreach($result as $row){
				?>
					<tr>
						<td><?php echo $sr++?></td>
						<td><?php echo $row->title?></td>
						<td><?php echo $obj_c->get_name_where_id("categories",$row->cat_id)?></td>
						<td><?php echo $row->stock;?></td>
						
						<td>
						<?php if($row->status==1){?>
							<a href="product_change_status.php?action=ch&id=<?php echo $row->id?>&status=0" class="btn btn-success btn-sm">Enable</a>
						<?php }else{?>
							<a  href="product_change_status.php?action=ch&id=<?php echo $row->id?>&status=1" class="btn btn-danger btn-sm">Disable</a>
						<?php }?>
						</td>
						<td>
							<a  href="product_change_status.php?action=del&id=<?php echo $row->id?>" class="btn btn-danger btn-sm">Delete</a>
						</td>
					</tr>
				<?php } }else{?>
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