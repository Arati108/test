<?php include_once('include/config.php');?>
<?php include_once('include/header.php');?>
<script type="text/javascript">
	function insert()
	{
	

	$.ajax({
		method:"POST",
		url:"booking_insert.php",
		datatype:"json",
		data:$('#frm_booking').serialize(),
		success:function(data)
		{
			var json=$.parseJSON(data);
			console.log("json");
			if(json.success)
			{
			}else{
				alert(json.message);
			}
			
		}
	})
}
</script>
<?php
	$id=$_REQUEST['id'];
	$select=mysqli_query($con,"select * from event where id='$id'");
	$fetch=mysqli_fetch_array($select)
	
?>
<
<img src="<?php echo  $fetch['image'];?>" height="100" width="100">
<form method="POST" id="frm_booking">
<?php
    $alphabet = array("0" => "A","1"=>"B","2"=>"C","3"=>"D","4"=>"E","5"=>"F","6"=>"G","7"=>"H","8"=>"I","9"=>"J","10"=>"K","11"=>"L","12"=>"M","13"=>"N","14"=>"O","15"=>"P","16"=>"Q","17"=>"R","18"=>"S","19"=>"T","20"=>"U","21"=>"V","22"=>"W","23"=>"X","24"=>"Y","25"=>"Z");

    $seatper_rows=5;
    $rows=100/$seatper_rows;
    for($i=0;$i<$rows;$i++)
    {
    	echo "<br>";
?>
	<tr>
		<?php $a=$alphabet[$i]?>
		
		<td><?php echo $a;?></td>
	<?php
		for($j=1;$j<=$seatper_rows;$j++)
		{
			
	?>
		<td><input type="checkbox" name="seats[]" id="seats" value="<?php echo $alphabet[$i].$j;?>"><?php echo $alphabet[$i].$j;?></td>
	<?php
		
		}
	?>
	</tr>
<?php } ?>
<?php  echo $fetch['name'];?>
	total_tickets:<input type="text" name="total_tickets" id="total_tickets" value="">
	total:<input type="text" name="total" id="total" value="">
	
	<input type="button" name="submit" value="submit" onclick="insert()" >
</form>
<?php
	$select=mysqli_query($con,"select * from booking");
	$fetch=mysqli_fetch_array($select);

?>
<?php print_r($fetch);?>
<?php $b=unserialize($fetch['seats']);
print_r($b);?>
