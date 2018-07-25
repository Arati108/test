<?php
	include_once('include/config.php');
	extract($_POST);

	copy($_FILES['image']['tmp_name'],"upload/".$_FILES['image']['name']);
	$image="upload/".$_FILES['image']['name'];
	$ins=mysqli_query($con,"insert into event (name,total_tickets,available_tickets,image) values ('$name','$total_tickets','$total_tickets','$image')");
	//$fetch=mysqli_fetch_array($ins,$con);
	$return_arr = array();
	if($ins){
		$return_arr['success']= true;
	} else{
		$return_arr['success']= false;
	}
	$insert=json_encode($return_arr);
	echo $insert;
	exit();
?>