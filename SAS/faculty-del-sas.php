<?php
  require ("../includes/DBConnection.php");  
?>  
	
<?php
	$profile_no =$_REQUEST['profile_no'];
	
	// sending query
	mysql_query("DELETE FROM profile WHERE teacher_id = '$profile_no'")
	or die(mysql_error());  	
	
	header("Location: facultylist-sas.php");
?>