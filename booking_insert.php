<?php
	include_once('include/config.php');
	extract($_POST);
	$a=serialize($_POST['seats']);
	$select=mysqli_query($con,"select * from event where id=13");
	$fetch=mysqli_fetch_array($select);
	$return_arr = array();
	if($total_tickets>$fetch['available_tickets'])
	{
		$return_arr['success']= false;
		$return_arr['message']="no enough tickets available";
		echo json_encode($return_arr);
		exit();	
	}
	$ins=mysqli_query($con,"insert into booking (total_tickets,total,seats) values ('$total_tickets','$total','$a')");
	$update=mysqli_query($con,"update event set available_tickets=available_tickets-$total_tickets where id=13");
	//$fetch=mysqli_fetch_array($ins,$con);
	
	if($ins){
		$return_arr['success']= true;
	} else{
		$return_arr['success']= false;
	}
	$insert=json_encode($return_arr);
	echo $insert;
	exit();
?>