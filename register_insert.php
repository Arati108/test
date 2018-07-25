<?php include_once('include/config.php'); ?>
<?php

	$return=array();
	extract($_POST);
	$select=mysqli_query($con,"select * from register where email='$email' OR username='$username'");
	
	$fetch=mysqli_fetch_array($select);
	
	/*if(count($fetch['email'])>0)
	{
		$return['message']='email already exist';
		echo json_encode($return);
		exit();
		
	}
	elseif(count($fetch['username'])>0)
	{
		$return['message']='username already exist';
		echo json_encode($return);
		exit();
	}*/
	if(isset($_POST["captcha"])&&$_POST["captcha"]!=""&&$_SESSION["code"]!=$_POST["captcha"])
	{
		$return['message']='please enter  valid captcha';
		$return['success']=0;
			echo json_encode($return);
			exit();	
	}
	if($pswd != $cnfrm_pswd)
		{
			$return['message']='password and confirm password must be same';
			$return['success']=0;
			echo json_encode($return);
			exit();
		}
	/*if($captcha != $_POST['captcha'])
	{
		$return['message']='please enter valid captcha';
		echo json_encode($return);
		exit();
	}*/

	elseif(count($fetch)>0)
	{
		if($fetch['username']==$_POST['username'])
		{
			$return['message']='username already exist';
			$return['success']=0;
			echo json_encode($return);
			exit();
		}
		elseif($fetch['email']==$_POST['email'])
		{
			$return['message']='email already exist';
			$return['success']=0;
			echo json_encode($return);
			exit();
		}
	}
	else
	{
		$ins=mysqli_query($con,"insert into register (username,name,email,ph_no,pswd,captcha) values ('$username','$name','$email','$ph_no','$pswd','$captcha')");
		$return['message']='successfully register';
		$return['success']=1;

	}
	echo json_encode($return);
	exit();
?>