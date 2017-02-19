<?php
  require ("../includes/DBConnection.php");  
?>  
	
<?php
	$year_id =$_REQUEST['year_id'];
	
	// sending query
	mysqli_query($conn,"DELETE FROM school_yr WHERE year_id = '$year_id'")
	or die(mysqli_error());  	
	
	header("Location: yearlist-a.php");
?>