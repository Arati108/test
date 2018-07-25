<?php include_once('include/config.php'); ?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.2.6/jquery.js"></script>
	<script type="text/javascript">
		function insert()
		{
			$.ajax({
				type:"POST",
				url:"register_insert.php",
				data:$('#frm_register').serialize(),
				datatype:"json",
				success:function(data)
				{
					var json=JSON.parse(data);
					if(json.success>0)
					{
						$("#frm_register")[0].reset();
					}
					alert(json.message);
					console.log(json.message);
				}
			})
		}
	</script>	
<form method="POST" id="frm_register">
	username<input type="text" name="username" id="username" value=""><br>
	Name<input type="text" name="name" id="name" value=""><br>
	Email<input type="text" name="email" id="email" value=""><br>
	Ph_no<input type="text" name="ph_no" id="ph_no" value=""><br>
	password<input type="password" name="pswd" id="pswd" value=""><br>
	confirm password<input type="password" name="cnfrm_pswd" id="cnfrm_pswd" value=""><br>
	captcha<input type="text" name="captcha" id="captcha">
<img src="captcha.php" /><br>
	<input type="submit" name="submit" value="submit">
</form>
<script src="js/jquery-2.2.4.min.js"></script>
<script src="js/jquery.validate.min.js"></script>
<script type="text/javascript">
	$(document).ready(function ()
	{
	 	$('#frm_register').validate(
    	{
        	rules:
        	{
            	username:
            	{
                	required: true
            	},
            	name:
            	{
                	required: true
                },
                email:
                {
                	required:true
                },
                Ph_no:
                {
                	required:true
                },
                pswd:
                {
                	required:true
                },
                captcha:
                {
                	required:true
                }
            },
            messages:
            {
            	username:"please enter your username",
            	name:"please enter your name",
            	email:"please enter your email",
            	ph_no:"please enter your ph no",
            	pswd:"please enter your password",
            	captcha:"please enter captcha"
            },
            submitHandler: function ()
            {
    			insert();
			}
         });
    	return false;
    });
</script>
</body>
</html>