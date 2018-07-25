<?php include_once('include/config.php');?>
<?php include_once('include/header.php');?>
<?php
	$mode='add';
	if($_POST)
	{
		extract($_POST);
		if($_FILES['image']['name']!='')
		{
			if(!is_dir("upload/"))
			{
				mkdir("upload",0777);
			}
			copy($_FILES['image']['tmp_name'],"upload/".$_FILES['image']['name']);
			$image="upload/".$_FILES['image']['name'];
		}
		if($id == '')
		{

		$ins=mysqli_query($con,"INSERT INTO product (cat_id,product_name,product_desc,image,created_date,status)values('$cat_id','$product_name','$product_desc','$image','".date('Y-m-d')."','$status')");
		if($ins)
		{
			echo "inserted";
		}
		else
		{
			echo "unale o insert";
		}
	}
	else
	{
		$img=mysqli_query($con,"SELECT * FROM product where id=$id");
		$fetch_img=mysqli_fetch_array($img);

		unlink($fetch_img['image']);
		$update=mysqli_query($con,"UPDATE product SET cat_id='$cat_id',product_name='$product_name',product_desc='$product_desc',status='$status',image='$image' WHERE  id=$id");
		if($update)
		{
			
			echo "updated";
		}
		else
		{
			echo "sorry!";
		}
	}
	}
	if(isset($_GET['edit_id']))
	{
		$mode='edit';
		$select=mysqli_query($con,"SELECT * FROM product WHERE id=".$_GET['edit_id']);
		$fetch=mysqli_fetch_array($select);


	}
	if(isset($_GET['delete_id']))
	{
		$img=mysqli_query($con,"SELECT * FROM product where id=".$_GET['delete_id']);
		$fetch_img=mysqli_fetch_array($img);

		unlink($fetch_img['image']);
		$delete=mysqli_query($con,"DELETE FROM product where id=".$_GET['delete_id']);
			if($delete)
			{
				echo 'deleted';
			}
			else
			{
				echo 'unable to delete';
			}
	}
?>
<form method="POST" id="frm_product" enctype="multipart/form-data">
	<input type="hidden" name="id"  value="<?php echo $mode=='edit'? $fetch['id']:'';?>">
	<div class="constrol">
		<select name="cat_id" id="cat_id">
			<option value="">select</option>
			<?php
				$select=mysqli_query($con,"SELECT * FROM category");

				while($data=mysqli_fetch_array($select))
				{
			?>
			<option value="<?php echo $data['id'];?>" <?php echo $mode=='edit' && $data['id']==$fetch['cat_id']? 'checked':'' ?>><?php echo $data['cat_name'];?></option>
			<?php } ?>
		</select>
	</div>
	<div class="controls">
		<label for="product_name">Product Name</label>
		<input type="text" name="product_name" id="product_name" value="<?php echo $mode=='edit'?$fetch['product_name']:'';?>">
	</div>
	<div class="controls">
		<label for="product_desc">Product Description</label>
		<input type="text" name="product_desc" id="product_desc" value="<?php echo $mode=='edit'?$fetch['product_desc']:'';?>">
	</div>
	<div class="controls">
		<label for="image">Image</label>
		<input type="file" name="image" value=""><br>
		<?php if($mode=='edit' && $fetch['image']!='')
		{?>
			<img src="<?php echo $fetch['image'];?>" width="100">

		 <?php } ?>
	</div>
	<div class="controls">
		<label for="status">Status</label>
		<input type="radio" name="status" <?php echo $mode=='edit' && $fetch['status']=='active'?'checked':'checked'?> value="active">Active
		<input type="radio" name="status" <?php echo $mode=='edit' && $fetch['status']=='inactive'?'checked':''?> value="inactive">InActive
	</div>
	<div class="controls">
		<input type="submit" name="submit" value="submit">
	</div>
</form>
<table>
	<thead>
		<tr>
			<th>Product Name</th>
			<th>Product Description</th>
	
			<th>Status</th>
			<th>Action</th>
		</tr>
	</thead>
	<tbody>
		<?php
			$select=mysqli_query($con,"SELECT * FROM product");
			while($fetch=mysqli_fetch_array($select))
			{
		?>
		<tr>
			<td><?php echo $fetch['product_name'];?></td>
			<td><?php echo $fetch['product_desc'];?></td>
			<td><?php echo $fetch['status'];?></td>
			<td>
				<a href="product.php?edit_id=<?php echo $fetch['id'];?>">Edit</a>
				<a href="product.php?delete_id=<?php echo $fetch['id'];?>">delete</a>
			</td>
			
		</tr>
		<?php } ?>
	</tbody>
</table>
<?php include_once('include/footer.php');?>