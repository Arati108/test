<?php include_once('include/config.php'); ?>
<?php
	if(isset($_POST["submit"]))
	{
	extract($_POST);
	$select=mysqli_query($con,"select * from register where email='$email' AND pswd='$pswd' ");
	$fetch=mysqli_fetch_array($select);

	if(count($fetch)>0)
	{
		$_SESSION['user_id']=$fetch['id'];
		$_SESSION['username']=$fetch['username'];
		header('location:index.php');
	}
	else
	{
		echo 'wrong username and password';

		//header('location:login.php');
	}
}
?>
<form method="POST">
	
	Email<input type="text" name="email" value=""><br>
	Password<input type="password" name="pswd" value="">
	<input type="submit" name="submit" value="submit">
</form>
<a href="logout.php">Logout</a>