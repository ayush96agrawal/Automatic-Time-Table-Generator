

<?php
$conn = mysqli_connect('localhost', 'root', 'root','scheduling');
	 if (!$conn)
    {
	 die('Could not connect: ' . mysql_error());
	}
	echo 'Connected successfully' . 'iancuello<br/>';
	mysqli_select_db( $conn,"scheduling");
	
	
	
	
//Retrieving data from the table	
	$sql = "SELECT * FROM day";
	$result = mysqli_query($conn, $sql);

  $rows =mysqli_num_rows($result);
	if ($rows > 0) {
    // output data of each row
    		while($row = mysqli_fetch_assoc($result)) {
        	echo "day_id: " . $row["id"]. " - Name: " . $row["day_name"]. "<br>";
			}
		} else {
    	echo "0 results";
}

mysqli_close($conn);
?>


