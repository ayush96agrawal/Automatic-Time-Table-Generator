<?php
  require ("../includes/DBConnection.php");  
?>  
	
<?php
	$sched_id =$_REQUEST['sched_id'];
	$pT =$_REQUEST['pT'];
	$pSy =$_REQUEST['pSy'];
	$psem=$_REQUEST['psem'];
	
	// sending query
	mysql_query("DELETE FROM sched WHERE sched_id = '$sched_id'")
	or die(mysql_error());  	
	
	 header(
			 		"Location: search_t_result.php?pT=". $pT
					."&pSy=". $pSy 
					."&psem=". $psem					
		 		   );	
?>