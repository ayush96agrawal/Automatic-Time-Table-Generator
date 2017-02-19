<?php
  require ("../includes/DBConnection.php");  
?>  
	
<?php
	$user_id =$_REQUEST['user_id'];
	
	// sending query
	mysqli_query($conn,"DELETE FROM user WHERE user_id = '$user_id'")
	or die(mysqli_error());  	
	
	header("Location: userlist.php");
?>