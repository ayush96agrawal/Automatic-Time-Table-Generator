<?php
  require ("../includes/DBConnection.php");  
?>  
	
<?php
	$sched_id =$_REQUEST['sched_id'];

	$pRoom =$_REQUEST['pRoom'];
	$pSy =$_REQUEST['pSy'];
	$psem=$_REQUEST['psem'];
	
	// sending query
	mysql_query("DELETE FROM sched WHERE sched_id = '$sched_id'")
	or die(mysql_error());  	
	
	 header(
			 		"Location: search_r_result.php?pRoom=". $pRoom
					."&pSy=". $pSy 
					."&psem=". $psem					
		 		   );	
?>