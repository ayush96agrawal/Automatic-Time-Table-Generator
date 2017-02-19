<?php
  require ("../includes/DBConnection.php");  
?>  
	
<?php
	$sched_id =$_REQUEST['sched_id'];
	$pT =$_REQUEST['pT'];
	$pSy =$_REQUEST['pSy'];
	$psem=$_REQUEST['psem'];
	
	// sending query
	mysqli_query($conn,"DELETE FROM sched WHERE sched_id = '$sched_id'")
	or die(mysqli_error($conn));  	
	
	 header(
			 		"Location: search_t_result.php?pT=". $pT
					."&pSy=". $pSy 
					."&psem=". $psem					
		 		   );	
?>