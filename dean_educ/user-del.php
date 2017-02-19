<?php
  require ("../includes/DBConnection.php");  
?>  
	
<?php
	$user_id =$_REQUEST['user_id'];
	
	// sending query
	mysql_query("DELETE FROM user WHERE user_id = '$user_id'")
	or die(mysql_error());  	
	
	header("Location: userlist.php");
?>