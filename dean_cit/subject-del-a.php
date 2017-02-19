<?php
  require ("../includes/DBConnection.php");  
?>  
	
<?php
	$sub_id =$_REQUEST['sub_id'];
	
	// sending query
	mysql_query("DELETE FROM subjects WHERE sub_id = '$sub_id'")
	or die(mysql_error());  	
	
	header("Location: subjectlist-a.php");
?>