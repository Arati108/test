<?php include_once('include/config.php');?>
<?php include_once('include/header.php');?>
<?php
	$mode='add';
	if($_POST)
	{
		
		extract($_POST);
		
		if($id=='')
		{
		$ins=mysqli_query($con,"INSERT INTO trial (name,email,address) values ('$name','$email','$address')");
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
		$update=mysqli_query($con,"UPDATE trial SET name='$name',email='$email',address='$address' where id=$id");
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
		$mode='edit';
		$select_edit=mysqli_query($con,"SELECT * FROM trial WHERE id=".$_GET['edit_id']);
		$data=mysqli_fetch_array($select_edit);
	}
	if(isset($_GET['delete_id']))
	{
		$delete=mysqli_query($con,"DELETE FROM trial where id=".$_GET['delete_id']);
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
<html>
<form method="POST">
	<input type="hidden" name="id" value="<?php echo $mode=='edit'? $data['id'] : ''; ?>">
	<div class="controls">
		<label for="name">Name</label>
		<input type="text" name="name" value="<?php echo $mode=='edit'? $data['name']:''; ?>">
	</div>
	<div class="controls">
		<label for="email">Email</label>
		<input type="email" name="email" value="<?php echo $mode=='edit'? $data['email']:''; ?>">
	</div>
	<div class="controls">
		<label for="address">Address</label>
		<input type="text" name="address" value="<?php echo $mode=='edit'? $data['address']:'';?>">
	</div>
	<div class="controls">
		<input type="submit" name="submit" value="submit">
	</div>
</form>
</html>
<table>
	<thead>
		<tr>
			<th>Id</th>
			<th>name</th>
			<th>email</th>
			<th>address</th>
			<th>action</th>
		</tr>
	</thead>
	<tbody>
		<?php
			$select=mysqli_query($con,"SELECT * FROM trial");
			 while($fetch=mysqli_fetch_array($select))
			 {
		?>
		<tr>
			<td><?php echo $fetch['id'];?></td>
			<td><?php echo $fetch['name'];?></td>
			<td><?php echo $fetch['email'];?></td>
			<td><?php echo $fetch['address'];?></td>
			<td>
				<a href="trial.php?edit_id=<?php echo $fetch['id'];?>">Edit</a>
				<a href="trial.php?delete_id=<?php echo $fetch['id'];?>">Delete</a>
			</td>

		</tr>
		<?php } ?>
	</tbody>
</table>
<?php include_once('include/footer.php');?>