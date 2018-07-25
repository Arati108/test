<?php
	/*for($i=0;$i<=5;$i++)
	{
		for($j=1;$j<=$i;$j++)
		{
			echo "*";
		}		
		echo "<br>";			
	}*/
?>
<pre><?php

$n = $i = 5;

while ($i--)
    echo str_repeat(' ', $i).str_repeat('* ', $n - $i)."\n";

?></pre>
<?php
	
?>