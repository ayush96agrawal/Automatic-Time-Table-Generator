<?php
  require ("../includes/DBConnection.php");  
?>  
	
<?php
	$sub_id =$_REQUEST['sub_id'];
	
	// sending query
	mysqli_query($conn,"DELETE FROM subjects WHERE sub_id = '$sub_id'")
	or die(mysqli_error());  	
	
	header("Location: subjectlist-a.php");
?>