<?php
require 'clsXMLParser.php';

if (isset($_POST['zipcode']) && !empty($_POST['zipcode'])) {
    
    $zipcode = $_POST['zipcode'];
   
	$data_source = "http://dev.hollywoodmoviemoney.com/theaters/xml/{$zipcode}";
	
	$newpars = new clsXMLParser($data_source, $data_source_type='url');
	
	$theater_array = $newpars->getTree();

	foreach ($theater_array as $v1) {

		foreach ($v1 as $e2 => $v2) {

			foreach ($v2 as $e3 => $v3) {

				foreach ($v3 as $e4 => $v4) {

					echo "<strong>Theater </strong>";

		        	foreach ($v4 as $e5 => $v5) {

		        		echo "<strong>".strtolower($e5).": </strong>";
		            	
		            	foreach ($v5 as $e6 => $v6) {

            				foreach ($v6 as $e7 => $v7) {
            					echo "$v7 ";
		                	}

		            	}

		        	}

				echo "<br /><br />";
		    	
		    	}
			}

	    }
	}

}
else {
	echo 'Please put in a zip code'. '<br /><br />';
}

?>

<form action="theater-finder.php" method="POST">
	What's your zip code? 
	<input type="text" name="zipcode">
	<input type="submit" value="show me the theaters that are close by">
</form>
