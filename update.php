<?
include 'config.php';

// Check file age, and update, or create, or return nothing.
function Update($tujxml, $server)
    {
		$stat = stat($server.".xml");
		if (!$stat) {
			echo "Created file for server: ". $server ."<br />";
			copy($tujxml, $server.".xml");
		} else {
			$agecheck = time() - 86400;
			if ($stat[9] > $agecheck) { 
				echo "File for ". $server ." has been updated in the last 24 hours <br />";
			} else {
				echo $server. " has been updated due to the file being over 24 hours old <br />";
				
				copy($tujxml, $server.".xml");
				touch($server.".xml");
			}
		}
		
	}


?>
