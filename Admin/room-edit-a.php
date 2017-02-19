<?php session_start(); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<link href="../includes/style_prac2.css" rel="stylesheet" type="text/css" />
<title>Scheduling System</title>
<style type="text/css">
<!--
.style3 {font-family: Georgia, "Times New Roman", Times, serif}
.style20 {font-family: Georgia, "Times New Roman", Times, serif; font-size: x-small; }
.style30 {font-family: "Courier New", Courier, monospace}
.style4 {font-size: 11px;
	font-family: Verdana, Arial, Helvetica, sans-serif;
}
-->
</style>
</head>
<?php
include("../includes/session.php");
  require ("../includes/dbconnection.php");
  
  function mysqli_result($result, $row, $field = 0) {
    // Adjust the result pointer to that specific row
    $result->data_seek($row);
    // Fetch result array
    $data = $result->fetch_array();
 
    return $data[$field];
}
  
  function mysql_result($result, $row, $field = 0) {
    // Adjust the result pointer to that specific row
    $result->data_seek($row);
    // Fetch result array
    $data = $result->fetch_array();
 
    return $data[$field];
}
  
  
	$room_id =$_REQUEST['Room'];
	
		$result =  mysqli_query($conn,"SELECT * FROM room WHERE room_id  = '$room_id'");
				
if (!$result) 
		{
		die("Query to show fields from table failed");
		}
			$numberOfRows = mysqli_num_rows($result);
	
			If ($numberOfRows == 0) 
				{
			//echo 'Sorry No Record Found!';
				}
			else if ($numberOfRows > 0) 
				{
				$i=0;
				
		 	$room= MYSQL_RESULT($result,$i,"room_name");
			$desc= MYSQL_RESULT($result,$i,"room_desc");
			$isNKN= mysqli_result($result,$i,"room_isNKN");
			$room_size= mysqli_result($result,$i,"room_size");
				
				}
				?>
				<?php 


   if (isset($_POST['cmdSubmit'])) 
  	{ 		

			
		 	$room_a= $_POST['txtroom'];
			$desc_a= $_POST['txtdesc'];
			$isNKN_a=$_POST['txtIsNKN'];
			$room_size=$_POST['txtRoomSize'];

			mysqli_query ($conn,"UPDATE room SET room_name = '$room_a',  room_desc = '$desc_a' ,room_isNKN='$isNKN_a',room_size='$room_size' WHERE room_id  = '$room_id'")
					 or die(mysqli_error($result)); 
					echo "Your file has been saved in the database..";
							header(
			 "Location: roomlist-a.php");
				}


				
	
?>
<body>
<div id="container">
  <div id="header">
    <div id="logo_w2"><img src="../images/logo copy.jpg" alt="s" width="717" height="160" /></div>
    <ul class="cssMenu cssMenum">
	<li class=" cssMenui"><a class="  cssMenui" href="admin.php"><img src="../images/homepage.gif" />Home</a></li>
	<li class=" cssMenui"><a class="  cssMenui" href="#"><span>Search</span><![if gt IE 6]></a><![endif]><!--[if lte IE 6]><table><tr><td><![endif]-->
	<ul class=" cssMenum">
		<li class=" cssMenui"><a class="  cssMenui" href="search_teacher.php"><img src="../images/User (1).ico" />Teacher Schedule</a></li>
		<li class=" cssMenui"><a class="  cssMenui" href="search_course.php"><img src="../images/user-group.ico" /> Student Schedule</a></li>
		<li class=" cssMenui"><a class="  cssMenui" href="search_room.php"><img src="../images/school-icon.png" />Room Schedule</a></li>
	</ul>
	<!--[if lte IE 6]></td></tr></table></a><![endif]--></li>
	<li class=" cssMenui"><a class="  cssMenui" href="#"><span>Add entry</span><![if gt IE 6]></a><![endif]><!--[if lte IE 6]><table><tr><td><![endif]-->
	<ul class=" cssMenum">
		<li class=" cssMenui"><a class="  cssMenui" href="user.php"><span><img src="../images/user.ico" />User</span><![if gt IE 6]></a><![endif]><!--[if lte IE 6]><table><tr><td><![endif]-->
		<ul class=" cssMenum">
			<li class=" cssMenui"><a class="  cssMenui" href="user.php"><img src="../images/folder-new.ico" />Add</a></li>

			<li class=" cssMenui"><a class="  cssMenui" href="userlist.php"><img src="../images/folder.ico" />View</a></li>
		</ul>
		<!--[if lte IE 6]></td></tr></table></a><![endif]--></li>
		<li class=" cssMenui"><a class="  cssMenui" href="faculty-a.php"><span><img src="../images/User (1).ico" />Teacher</span><![if gt IE 6]></a><![endif]><!--[if lte IE 6]><table><tr><td><![endif]-->
		<ul class=" cssMenum">
			<li class=" cssMenui"><a class="  cssMenui" href="faculty-a.php"><img src="../images/folder-new.ico" />Add</a></li>
			<li class=" cssMenui"><a class="  cssMenui" href="facultylist-a.php"><img src="../images/folder.ico" />View</a></li>
		</ul>
		<!--[if lte IE 6]></td></tr></table></a><![endif]--></li>
		<li class=" cssMenui"><a class="  cssMenui" href="student-a.php"><span><img src="../images/courses.JPG" />Course</span><![if gt IE 6]></a><![endif]><!--[if lte IE 6]><table><tr><td><![endif]-->
		<ul class=" cssMenum">
			<li class=" cssMenui"><a class="  cssMenui" href="student-a.php"><img src="../images/folder-new.ico" />Add</a></li>
			<li class=" cssMenui"><a class="  cssMenui" href="student-list-a.php"><img src="../images/folder.ico" />View</a></li>
		</ul>

		<!--[if lte IE 6]></td></tr></table></a><![endif]--></li>
		<li class=" cssMenui"><a class="  cssMenui" href="subject-a.php"><span><img src="../images/Summer-user.ico" />Subject</span><![if gt IE 6]></a><![endif]><!--[if lte IE 6]><table><tr><td><![endif]-->
		<ul class=" cssMenum">
			<li class=" cssMenui"><a class="  cssMenui" href="subject-a.php"><img src="../images/folder-new.ico" />Add</a></li>
			<li class=" cssMenui"><a class="  cssMenui" href="subjectlist-a.php"><img src="../images/folder.ico" />View</a></li>
		</ul>
		<!--[if lte IE 6]></td></tr></table></a><![endif]--></li>

		<li class=" cssMenui"><a class="  cssMenui" href="room-a.php"><span><img src="../images/school-icon.png" />Room</span><![if gt IE 6]></a><![endif]><!--[if lte IE 6]><table><tr><td><![endif]-->
		<ul class=" cssMenum">
			<li class=" cssMenui"><a class="  cssMenui" href="room-a.php"><img src="../images/folder-new.ico" />Add</a></li>
			<li class=" cssMenui"><a class="  cssMenui" href="roomlist-a.php"><img src="../images/folder.ico" />View</a></li>
		</ul>
		<!--[if lte IE 6]></td></tr></table></a><![endif]--></li>
		<li class=" cssMenui"><a class="  cssMenui" href="dept-a.php"><span><img src="../images/dept.jpg" />Department</span><![if gt IE 6]></a><![endif]><!--[if lte IE 6]><table><tr><td><![endif]-->

		<ul class=" cssMenum">
			<li class=" cssMenui"><a class="  cssMenui" href="dept-a.php"><img src="../images/folder-new.ico" />Add</a></li>
			<li class=" cssMenui"><a class="  cssMenui" href="deptlist-a.php"><img src="../images/folder.ico" />View</a></li>
		</ul>
		<!--[if lte IE 6]></td></tr></table></a><![endif]--></li>
<<<<<<< HEAD
		<!-- Add School Year -->
=======
		<li class=" cssMenui"><a class="  cssMenui" href="year-a.php"><span><img src="../images/sy .jpg" /> </span><![if gt IE 6]></a><![endif]><!--[if lte IE 6]><table><tr><td><![endif]-->
>>>>>>> refs/remotes/pganeshGapps/master
		<ul class=" cssMenum">

			<li class=" cssMenui"><a class="  cssMenui" href="year-a.php "><img src="../images/folder-new.ico" />Add</a></li>
			<li class=" cssMenui"><a class="  cssMenui" href="yearlist-a.php"><img src="../images/folder.ico" />View</a></li>
		</ul>
		<!--[if lte IE 6]></td></tr></table></a><![endif]--></li>
	</ul>
	<!--[if lte IE 6]></td></tr></table></a><![endif]--></li>
	 

	<li class=" cssMenui"><a class="  cssMenui" href="#"><span>About us</span><![if gt IE 6]></a><![endif]><!--[if lte IE 6]><table><tr><td><![endif]-->
	<ul class=" cssMenum">
		<li class=" cssMenui"><a class="  cssMenui" href="about_sched.php"><img src="../images/scheduling.png" />Scheduling System</a></li>
		<li class=" cssMenui"><a class="  cssMenui" href="about_dev.php"><img src="../images/dev.png" />Developer</a></li>
	</ul>
	<!--[if lte IE 6]></td></tr></table></a><![endif]--></li>
	<li class=" cssMenui"><a class="  cssMenui" href="User Manual.pdf">Help</a></li>

	<li class=" cssMenui"><a class="  cssMenui" href="logout.php">Log out</a></li>
</ul>

  </div>
	<div id="content">
	
	  <div id="left">
		<form name="form1" method="post" >
		  <div align="center">
		    <p><br />
	        </p>
		    <p><strong>Edit Room</strong></p>
		    <table border="0" align="center" >
              <tr >
                <td width="111" height="34"  ><div align="right" class="style3">Room </div></td>
                <td width="177" ><input type="text" name="txtroom" id="txtroom" value="<?php echo $room; ?>" /></td>
                <td width="109">&nbsp;</td>
                <td width="5">&nbsp;</td>
              </tr>
              
               <tr >
                <td width="111" height="34"  ><div align="right" class="style3">isNKN? </div></td>
                <td width="177" ><input type="text" name="txtIsNKN" id="txtIsNKN" value="<?php echo $isNKN; ?>" /></td>
                <td width="109">&nbsp;</td>
                <td width="5">&nbsp;</td>
              </tr>
              
               <tr >
                <td width="111" height="34"  ><div align="right" class="style3">Capacity</div></td>
                <td width="177" ><input type="text" name="txtRoomSize" id="txtRoomSize" value="<?php echo $room_size; ?>" /></td>
                <td width="109">&nbsp;</td>
                <td width="5">&nbsp;</td>
              </tr>
              
              <tr >
                <td height="35"><div align="right" class="style3">Description </div></td>
                <td><label></label>
                    <label>
                    <input type="text" name="txtdesc" id="txtdesc" value= "<?php echo $desc; ?>"/>
                  </label></td>
                <td><span class="style20">&nbsp;</span></td>
                <td>&nbsp;</td>
              </tr>
              
              
              
              <tr>
                <td height="19" colspan="4">&nbsp;</td>
              </tr>
              <tr>
                <td colspan="3"><div align="center"><span class="style30">
                  <input type="submit" name="cmdSubmit" value="Submit" />
                  &nbsp;</span></div></td>
                <td >&nbsp;</td>
              </tr>
            </table>
		    <p>&nbsp;</p>
		    <p>&nbsp;</p>
		  </div>
	    </form>
	  </div>
		<div id="program"></div>
		<div id="right">
		  <p>&nbsp;</p>
	  </div>
		<div id="footerline">
		  <p align="center"><span class="style4"><a href="help.php">Help</a> | <a href="about_sched.php">Scheduling 	                                System</a>
                            </span>
          </p>
	  </div>
	</div>
	
	<div id="footer">Four Dark Riders</div>		
</div>	
</body>
</html>

