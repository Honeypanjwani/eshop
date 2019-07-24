<?php
include("../autoload.php");
$db=new Db;
$obj_m=new Model($db);
$obj_c=new Controller($obj_m);
 ?><?php include("header.php");   ?>
 <?php  include("sidebar.php"); ?>
 <div class="col-md-9">
   <div class="card">
      <div class="card-header">
        <h4>View Contact Us</h4>
      </div>
	  <div class="card-block">
	   <table class="table table-bordered">
	     <thead>
		  <tr>
		    <th>S.no</th>
			<th>Contact Number</th>
			<th>Address</th>
			<th>City</th>
			<th>Pincode</th>
			<th>State</th>
			<th>Country</th>
			<th>Delete</th>
             </tr>
			</thead>
   <tbody>
		 <?php
		 $result= $obj_m->fetch_all("address");
		 if(isset($result)){
		   $sr=1;
            foreach($result as $row){  ?>
		  
		       <tr>
                 <td><?php echo $sr++; ?></td>
		         <td><?php echo $row->number; ?></td>
				<td><?php echo $row->address; ?></td>
				<td><?php echo $row->city; ?></td>
				<td><?php echo $row->pincode; ?></td>
				<td><?php echo $row->state; ?></td>
				<td><?php echo $row->Country; ?></td>
				<td><a href="address_change_status.php?action=del&id=<?php echo $row->id;?>" class="btn btn-danger btn-sm">Delete</a></td>
             </tr>
				<?php } }else{?>
				<tr>
					<td colspan="3">Data not found</td>
				</tr>
				<?php }?>
      </tbody> 
     </div>
   </div>
 </table> 
 <?php include("footer.php"); ?>




  