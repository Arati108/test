<?php
	include_once("include/config.php");
	include_once("include/header.php");

	$mode = "add";
	if($_POST)
	{
		extract($_POST);
		if($id=='')
		{
		$ins=mysqli_query($con,"insert into category (cat_name,cat_desk,status,created_date)values('$cat_name','$cat_desk','$status','".date('Y-m-d')."')");
		if($ins)
		{
			echo "inserted";
		}
		else
		{
			echo "unable to insert";
		}
	}
	else
	{
		$update=mysqli_query($con,"UPDATE category SET cat_name='$cat_name',cat_desk='$cat_desk',status='$status' where id=$id");
		if($update)
		{
			echo "updated";
		}
		else
		{
			echo "unable to update";
		}
	}
	}
	
	if(isset($_GET['edit_id']))
	{
		$edit_select=mysqli_query($con,"SELECT * FROM category where id=".$_GET['edit_id']);
		$fetch=mysqli_fetch_array($edit_select);
		$mode = "edit";
	}
	if(isset($_GET['del_id']))
	{
		$delete=mysqli_query($con,"DELETE FROM category WHERE id=".$_GET['del_id']);
		if($delete)
		{
			echo "deleted";
		}
		else
		{
			echo "unable to delete";
		}
	}
?>

	<form method="POST" onsubmit="return cat_validation();">
		<div class="constrols">
			<label for="cat_name">Category name</label>
			<input type="hidden" name="id" value="<?php echo $mode=='edit'? $fetch['id']:'';?>">
		<input type="text" name="cat_name" id="cat_name" value="<?php echo $mode == 'edit' ? $fetch['cat_name'] : "";?>">
		</div>
		<div class="constrols">
			<label for="cat_desk">Category Description</label>
		<textarea name="cat_desk" id="cat_desk"><?php echo $mode == 'edit' ? $fetch['cat_desk']:'';?></textarea>
		</div>
		<div class="constrols">
			<label for="status">Status</label>
		<input type="radio" name="status" value="active" <?php echo $mode=='edit'? $fetch['status'] == 'active' ? "checked" : "":'checked' ?>>Active
		<input type="radio" name="status" value="inactive" <?php echo $mode=='edit'? $fetch['status'] == 'inactive' ? "checked" : "":'' ?>>Inactive
		</div>
		<div class="constrol">
			<input type="submit" name="submit" value="submit">
		</div>
	</form>
	<table>
		<thead>
			<tr>
				<th>Cat Name</th>
				<th>Cat Description</th>
				<th>Status</th>
				<th>Action</th>
			</tr>
		</thead>
		<tbody>
			<?php
				$query=mysqli_query($con,"SELECT * FROM category");
				while($fetch=mysqli_fetch_array($query))
				{
			?>
			<tr>
				<td><?php echo $fetch['cat_name'];?></td>
				<td><?php echo $fetch['cat_desk'];?></td>
				<td><?php echo $fetch['status'];?></td>
				<td>
					<a href="category.php?edit_id=<?php echo $fetch['id'];?>">Edit</a>
					<a href="category.php?del_id=<?php echo $fetch['id'];?>">Delete</a>
				</td>
			</tr>
			<?php } ?>
		</tbody>


	</table>
<?php include_once("include/footer.php"); ?>