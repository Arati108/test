<?php	
/*
Students
    disha
        marks
            maths - 100
            science - 70
            english - 20
        behaviour
            uniform - A+
            Nails - A
            Attendance - B
            On time - C
    Aarti*/

    $arr = array("Stuent"=> array(
    	"disha" => array(
    		"marks" => array(
    			"maths"=>"100",
    			"science"=>"70",
    			"english"=>"20"
    		)
    	),
    	"arati" => array(
    		"marks"=>array(
    			"maths"=>"100",
    			"science"=>"70",
    			"english"=>"20"
    		)
    	)
    	)
	);

echo "<pre>"; print_r($arr);
?>