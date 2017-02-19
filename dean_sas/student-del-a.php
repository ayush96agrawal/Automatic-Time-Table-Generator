<?php
  require ("../includes/DBConnection.php");  
?>  
	
<?php
	$Course_ID =$_REQUEST['Course_ID'];
	
	// sending query
	mysql_query("DELETE FROM course WHERE course_id = '$Course_ID'")
	or die(mysql_error());  	
	
	header("Location: student-list-a.php");
?>