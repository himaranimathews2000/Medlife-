<?php
require('top.inc.php');
$categories_id='';
$name='';
$mrp='';
$price='';
$qty='';
$image='';
$description='';
$expiry	='';
$dose='';
$mfd='';

$msg='';
$image_required='required';
if(isset($_GET['id']) && $_GET['id']!=''){
	$image_required='';
	$id=get_safe_value($con,$_GET['id']);
	$res=mysqli_query($con,"select * from product where pid='$id'");
	$check=mysqli_num_rows($res);
	if($check>0){
		$row=mysqli_fetch_assoc($res);
		$categories_id=$row['cid'];
		$name=$row['pname'];
		$mrp=$row['mrp'];
		$price=$row['price'];
		$qty=$row['qty'];
		$description=$row['des'];
		$expiry=$row['expiry'];
		$dose=$row['dose'];
		$mfd=$row['mfd'];
	}else{
		header('location:product.php');
		die();
	}
}

if(isset($_POST['submit'])){
    $categories_id=get_safe_value($con,$_POST['cid']);
		$name=get_safe_value($con,$_POST['pname']);
		$mrp=get_safe_value($con,$_POST['mrp']);
		$price=get_safe_value($con,$_POST['price']);
		$qty=get_safe_value($con,$_POST['qty']);
		$description=get_safe_value($con,$_POST['des']);
		$expiry=get_safe_value($con,$_POST['expiry']);
		$dose=get_safe_value($con,$_POST['dose']);
		$mfd=get_safe_value($con,$_POST['mfd']);
	
	$res=mysqli_query($con,"select * from product where pname='$name'");
	$check=mysqli_num_rows($res);
	if($check>0){
		if(isset($_GET['id']) && $_GET['id']!=''){
			$getData=mysqli_fetch_assoc($res);
			if($id==$getData['pid']){
			
			}else{
				$msg="Product already exist";
			}
		}else{
			$msg="Product already exist";
		}
	}
	
	
	
		if($_FILES['image']['type']!='image/png' && $_FILES['image']['type']!='image/jpg' && $_FILES['image']['type']!='image/jpeg'){
			$msg="Please select only png,jpg and jpeg image formate";
		}
	else{
		if($_FILES['image']['type']!=''){
				if($_FILES['image']['type']!='image/png' && $_FILES['image']['type']!='image/jpg' && $_FILES['image']['type']!='image/jpeg'){
				$msg="Please select only png,jpg and jpeg image formate";
			}
		}
	}
	
	if($msg==''){
		if(isset($_GET['id']) && $_GET['id']!=''){
			if($_FILES['image']['name']!=''){
				$image=rand(111111111,999999999).'_'.$_FILES['image']['name'];
				move_uploaded_file($_FILES['image']['tmp_name'],PRODUCT_IMAGE_SERVER_PATH.$image);
				$update_sql="update product set cid='$categories_id',pname='$name',mrp='$mrp',price='$price',qty='$qty',des='$description',expiry='$expiry',mfd='$mfd',dose='$dose',image='$image' where id='$id'";
			}else{
				$update_sql="update product set categories_id='$categories_id',name='$name',mrp='$mrp',price='$price',qty='$qty',short_desc='$short_desc',description='$description',meta_title='$meta_title',meta_desc='$meta_desc',meta_keyword='$meta_keyword' where id='$id'";
			}
			mysqli_query($con,$update_sql);
		}else{
			$image=rand(111111111,999999999).'_'.$_FILES['image']['name'];
			move_uploaded_file($_FILES['image']['tmp_name'],PRODUCT_IMAGE_SERVER_PATH.$image);
			mysqli_query($con,"insert into product(cid,pname,mrp,price,qty,des,image,expiry,mfd,status,dose) values('$categories_id','$name','$mrp','$price','$qty','$description','$image','$expiry','$mfd',1,'$dose')");
		}
		header('location:product.php');
		die();
	}
}
?>
<div class="content pb-0">
            <div class="animated fadeIn">
               <div class="row">
                  <div class="col-lg-12">
                     <div class="card">
                        <div class="card-header" style="background-color:#ffbdf4;color:black"><strong>Product</strong><small> Form</small></div>
                        <form method="post" enctype="multipart/form-data">
							<div class="card-body card-block">
							   <div class="form-group">
									<label for="categories" class=" form-control-label">Categories</label>
									<select class="form-control" name="cid">
										<option>Select Category</option>
										<?php
										$res=mysqli_query($con,"select id,category from category order by category asc");
										while($row=mysqli_fetch_assoc($res)){
											if($row['id']==$categories_id){
												echo "<option selected value=".$row['id'].">".$row['category']."</option>";
											}else{
												echo "<option value=".$row['id'].">".$row['category']."</option>";
											}
											
										}
										?>
									</select>
								</div>
								<div class="form-group">
									<label for="categories" class=" form-control-label">Product Name</label>
									<input type="text" name="pname" placeholder="Enter product name" class="form-control" required value="<?php echo $name?>">
								</div>
								
								<div class="form-group">
									<label for="categories" class=" form-control-label">MRP</label>
									<input type="text" name="mrp" placeholder="Enter product mrp" class="form-control" required value="<?php echo $mrp?>">
								</div>
								
								<div class="form-group">
									<label for="categories" class=" form-control-label">Price</label>
									<input type="text" name="price" placeholder="Enter product price" class="form-control" required value="<?php echo $price?>">
								</div>
								
								<div class="form-group">
									<label for="categories" class=" form-control-label">Qty</label>
									<input type="text" name="qty" placeholder="Enter qty" class="form-control" required value="<?php echo $qty?>">
								</div>
								
								<div class="form-group">
									<label for="categories" class=" form-control-label">Image</label>
									<input type="file" name="image" class="form-control" <?php echo  $image_required?>>
								</div>
								
								
								<div class="form-group">
									<label for="categories" class=" form-control-label">Description</label>
									<textarea name="des" placeholder="Enter product description" class="form-control" required><?php echo $description?></textarea>
								</div>
								
								<div class="form-group">
									<label for="categories" class=" form-control-label">Dose</label>
									<textarea name="dose" placeholder="Enter dose details" class="form-control"><?php echo $dose?></textarea>
								</div>
								
								<div class="form-group">
									<label for="categories" class=" form-control-label">Manufacture Date</label>
									<textarea name="mfd" placeholder="Enter product manufacture date" class="form-control"><?php echo $mfd?></textarea>
								</div>
								
								<div class="form-group">
									<label for="categories" class=" form-control-label">Expiry</label>
									<textarea name="expiry" placeholder="Enter product expiry date" class="form-control"><?php echo $expiry?></textarea>
								</div>
								
								
							   <button id="payment-button" name="submit" type="submit" class="btn btn-lg btn-info btn-block">
							   <span id="payment-button-amount">Submit</span>
							   </button>
							   <div class="field_error"><?php echo $msg?></div>
							</div>
						</form>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         
<?php
require('footer.inc.php');
?>