<?php include_once('include/config.php'); ?>
<?php
	if(isset($_POST["submit"]))
	{
		extract($_POST);
		$ins=mysqli_query($con,"insert into news (title,news_description,news_image,description_image,location,status) values ('$title','$news_description','$news_image','$description_image','$location','$status')");
		if($ins)
		{
			echo "success";
		}
		else
		{
			echo "failure";
		}
	}
?>
<form method="POST">
	title<input type="text" name="title"  value=""><br>
	news description<input type="text" name="news_description" value=""><br>
	news image<input type="file" name="news_image" value=""><br>
	description image<input type="file" name="description_image" value=""><br>
	location<input type="radio" name="location" value="right">Right
		<input type="radio" name="location" value="bottom">Bottom
	Status<input type="radio" name="Status" value="active">Active
		<input type="radio" name="status" value="inactive">Inactive<br>
		<input type="submit" name="submit" value="submit">

</form>