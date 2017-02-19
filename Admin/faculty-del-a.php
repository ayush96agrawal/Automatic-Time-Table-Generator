<?php
  require ("../includes/DBConnection.php");  
?>  
	
<?php
	$profile_no =$_REQUEST['profile_no'];
	
	// sending query
	mysqli_query($conn,"DELETE FROM profile WHERE teacher_id = '$profile_no'")
	or die(mysqli_error());  	
	
	header("Location: facultylist-a.php");
?>