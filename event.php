<?php include_once('include/config.php');?>
<?php include_once('include/header.php');?>

<script type="text/javascript">

	function insert()
	{
            // this is test
	/*var name=$('#name').val();
	var total_tickets=$('#total_tickets').val();
	var available_tickets=$('#available_tickets').val();
	var image=$('#image').val();*/

	 var formData = new FormData($('#frm_event')[0]);

	 console.log(formData);
	alert(image);
	$.ajax({
		method:"POST",
		url:"event_insert.php",
		datatype:"json",
		//data:{name:name,total_tickets:total_tickets,available_tickets:available_tickets,image:image},
		data:formData,
		processData:false,
		contentType:false,
		success:function(data)
		{
			console.log("");
		}
	})
}
</script>
<form method="POST" enctype="multipart/form-data" id="frm_event">
	Name:<input type="text" name="name" id="name" value="">
	Total Tickets:<input type="text" name="total_tickets" id="total_tickets" value="">
	Image:<input type="file" name="image" id="image" value="">
	<input type="button" name="submit" value="submit" onclick="insert()">
</form>