<?php  
	$conn = mysqli_connect('localhost', 'root', '','last1');
	 if (!$conn)
    {
	 die('Could not connect: ' . mysqli_error());
	}
	//echo 'Connected successfully' . 'iancuello';
	mysqli_select_db( $conn,"last1");
?>