<?php
  require ("../includes/DBConnection.php");  
?>  
	
<?php
	$dept_id =$_REQUEST['Dept'];
	
	// sending query
	mysqli_query($conn,"DELETE FROM dept WHERE dept_id = '$dept_id'")
	or die(mysqli_error($conn));  	
	
	header("Location: deptlist-a.php");
?>