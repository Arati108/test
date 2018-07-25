<?php
	include_once('include/config.php');
	include_once('include/header.php');

	if($_POST)
	{
		extract($_POST);
		$ins=mysqli_query($con,"INSERT INTO blog (title,description,image,status) values ('$title','$description','$image','$status')");
		if($ins)
		{
			echo 'inserted';
		}
		else
		{
			echo 'unable to insert';
		}
	}
?>
<form method="POST" enctype="multipart/form-data" id="frm_blog">
	<div class="controls">
		<label for="title">Blog Name</label>
		<input type="text" name="title" id="title" value="">
	</div>
	<div class="controls">
		<label for="description">Blog Description</label>
		<input type="text" name="description" id="description" value="">
	</div>
	<div class="controls">
		<label for="image">Blog Image</label>
		<input type="file" name="image" id="image" value="">
	</div>
	<div class="controls">
		<label for="status">Status</label>
		<input type="radio" name="status" checked="" value="active">Active
		<input type="radio" name="status" value="inactive">Inactive
	</div>
	<div class="constrols">
		<input type="submit" name="submit" value="submit">
	</div>
</form>