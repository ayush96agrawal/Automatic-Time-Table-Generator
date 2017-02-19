<?php
  require ("../includes/DBConnection.php");  
?>  
	
<?php
	$Course_ID =$_REQUEST['Course_ID'];
	
	// sending query
	mysqli_query($conn,"DELETE FROM course WHERE course_id = '$Course_ID'")
	or die(mysqli_error());  	
	
	header("Location: student-list-a.php");
?>