<?php
  require ("../includes/DBConnection.php");  
?>  
	
<?php
	$room_id =$_REQUEST['Room'];
	
	// sending query
	mysqli_query($conn,"DELETE FROM room WHERE room_id = '$room_id'")
	or die(mysqli_error());  	
	
	header("Location: roomlist-a.php");
?>