<?php 
include("../autoload.php");
$db=new Db;
$obj_m=new Model($db);
$obj_c=new Controller($obj_m);
?>
<?php include("header.php"); ?>
<?php  include("sidebar.php");?>
<div class="col-md-9">
   <div class="card">
      <div class="card-header">
        <h4>Slider Management</h4>
      </div>
	  <div class="card-block">
	   <table class="table table-bordered">
	     <thead>
		  <tr>
		    <th>S.no</th>
			<th>Image</th>
			<th>Title</th>
			<th>Update</th>
			<th>Status</th>
			<th>Delete</th>
             </tr>
			</thead>
   <tbody>
    <?php
		 $result= $obj_m->fetch_all("slider");
		   $sr=1;
		   if(isset($result)){
            foreach($result as $row){  ?>
		  
		     <tr>
                <td><?php echo $sr++; ?></td>
		        <td><img src="<?php echo $row->path;?>" height="50px"width="50px"></td>
				<td><?php  echo $row->title;?></td>
				<td><a href="update.php?id=<?php echo $row->id?>">update</a></td>
				<td><a href="status.php?status=<?php echo $row->status;?>&&id=<?php echo $row->id;?>"><?php 
				if($row->status == 1){
					echo "Active";
				} 
                      else{
						  echo "Not Active";
					  }				?></a></td>
			   <td><a href="slider_change_status.php?action=del&id=<?php echo $row->id?>" class="btn btn-danger btn-sm">Delete</a>
			   </td>
             </tr>
		   <?php } } else{ ?>
		   <tr>
		   <td colspan="3">Data Not found</td></tr>
		   <?php }?>
		   
      </tbody> 
     </div>
   </div>
 </table> 
 <?php include("footer.php"); ?>