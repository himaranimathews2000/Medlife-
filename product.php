<?php
require('top.inc.php');
if(isset($_GET['type']) && $_GET['type']!=''){
	$type=get_safe_value($con,$_GET['type']);
	if($type=='status'){
		$operation=get_safe_value($con,$_GET['operation']);
		$id=get_safe_value($con,$_GET['id']);
		if($operation=='active'){
			$status='1';
		}else{
			$status='0';
		}
		$update_status_sql="update product set status='$status' where pid='$id'";
		mysqli_query($con,$update_status_sql);
	}
	if($type=='delete'){
		$id=get_safe_value($con,$_GET['id']);
		$delete_sql="delete from product where pid='$id'";
		mysqli_query($con,$delete_sql);
	}
}

$sql="select product.*,category.category from product,category where product.cid=category.id order by product.pid asc";
$res=mysqli_query($con,$sql);
?>
<div class="content pb-0">
	<div class="orders">
	   <div class="row">
		  <div class="col-xl-12">
			 <div class="card">
				<div class="card-body" style="background-color:#ffbdf4;color:black">
                           <h3 class="box-title">PRODUCTS</h3>
                            <h5  style="text-align:right;" ><a href="manage_product.php" style="color:grey" onMouseOver="this.style.color='black'" onMouseOut="this.style.color='grey'">Add Product</a></h5>
                    </div>
				<div class="card-body--">
				   <div class="table-stats order-table ov-h">
					  <table class="table ">
						 <thead>
							<tr>
							   <th class="serial">#</th>
							   <th>ID</th>
							   <th>Categories</th>
							   <th>Name</th>
							   <th>Image</th>
							   <th>Price</th>
							   
							   <th></th>
							</tr>
						 </thead>
						 <tbody>
							<?php 
							$i=1;
							while($row=mysqli_fetch_assoc($res)){?>
							<tr>
							   <td class="serial"><?php echo $i?></td>
							   <td><?php echo $row['pid']?></td>
							   <td><?php echo $row['cid']?></td>
							   <td><?php echo $row['pname']?></td>
							   <td><img src="<?php echo PRODUCT_IMAGE_SITE_PATH.$row['image']?>"/></td>
							   
							   <td><i class="fa fa-inr" aria-hidden="true"></i><?php echo $row['price']?></td>
							   
							   <td>
								<?php
								if($row['status']==1){
									echo "<span class='badge badge-complete' ><a href='?type=status&operation=deactive&id=".$row['pid']."'>Active</a></span>&nbsp;";
								}else{
									echo "<span class='badge badge-pending'><a href='?type=status&operation=active&id=".$row['pid']."'>Deactive</a></span>&nbsp;";
								}
								echo "<span class='badge badge-edit'><a href='manage_product.php?id=".$row['pid']."'>Edit</a></span>&nbsp;";
								
								echo "<span class='badge badge-delete'><a href='?type=delete&id=".$row['pid']."'>Delete</a></span>";
								
								?>
							   </td>
							</tr>
							<?php } ?>
						 </tbody>
					  </table>
				   </div>
				</div>
			 </div>
		  </div>
	   </div>
	</div>
</div>
<?php
require('footer.inc.php');
?>