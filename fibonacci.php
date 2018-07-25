/* 0,1,1,2,3,8,13,21,34*/

<?php
	$first=0;
	$second=1;

	for($i=0;$i<=10;$i++)
	{
		$third=$first+$second;
		echo $third;
		$first=$second;
		$second=$third;
	}
?>