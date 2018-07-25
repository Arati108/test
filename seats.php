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
		<td><input type="checkbox" value="<?php echo $alphabet[$i].$j;?>"><?php echo $alphabet[$i].$j;?></td>
	<?php
		
		}
	?>
	</tr>
<?php } ?>

