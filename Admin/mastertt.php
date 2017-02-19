<?php session_start(); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<link href="../includes/style_prac2.css" rel="stylesheet" type="text/css" />
<title>Scheduling System</title>
</head>
<?php
   include("../includes/session.php");
  require ("../includes/dbconnection.php");

			
?>
<body>
<div id="container">
  <div id="header">
    <img src="../images/logo copy.jpg" alt="s" width="717" height="160" />
    <div id="logo_w2"></div>
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
		<!-- Add School Year -->
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
	<li class=" cssMenui"><a class="  cssMenui" href="a.pdf">Help</a></li>

	<li class=" cssMenui"><a class="  cssMenui" href="logout.php">Log out</a></li>
</ul>

  </div>
  <div id="content">
	
		<div id="left">
		
		<form  name="form1" method="post" >
		  <div align="center"><br />

              <tr>
                <?php


		If ($numberOfRows == 0) 
			{
			echo '';
			}
		else if ($numberOfRows > 0) 
			{
			$i=0;
			while ($i<$numberOfRows)
				{		
					if(($i%2)==0) 
						{
							$bgcolor ='#FFFFFF';
						}
					else
						{
							$bgcolor ='@C0C0C0';
						}
		?>
              </tr>
              <tr bgcolor="<?php echo $bgcolor; ?>">
              </tr>
              <?php 	
			$i++;		
			}
		}	
		
	?>
             
            </table>
		    <br />
		    <br />		  
		    <br />
	      </div>
				<?php

            		$result = mysqli_query($conn, "SELECT * FROM sched ORDER BY room_id,time_s_id,day_id");
            		if (!$result) 
					{
					die("Query to show fields from table failed");
					}
            	?>
		   <table width="700" border="1" >
            <tr>
              <td width="99"><div align="center">ROOM</div></td>
              <td width="99"><div align="center">TIME</div></td>
              <td width="113"><div align="center">MONDAY</div></td>
              <td width="115"><div align="center">TUESDAY</div></td>
              <td width="109"><div align="center">WEDNESDAY</div></td>
              <td width="117"><div align="center">THURSDAY</div></td>
              <td width="115"><div align="center">FRIDAY</div></td>
            </tr>
            <?php
            function mysql_result($result, $row, $field = 0) {
 			   // Adjust the result pointer to that specific row
    			$result->data_seek($row);
 			   // Fetch result array
 			   $data = $result->fetch_array();
 
 			   return $data[$field];
				}
            $i = 0;
            $slot_num = mysqli_query($conn,"SELECT COUNT(*) FROM table_name");
           
            while ($row = mysqli_fetch_assoc($result))
            {

            echo '<tr>
            <td><div align ="center">';
            $room_id = mysql_result($result,$i,"room_id");
            $row2 = mysqli_fetch_array(mysqli_query($conn, "SELECT room_name FROM room where room_id = $room_id"));
            $room = $row2['room_name'];
            echo $room.'</td>
            	<td><div align="center">' ;
            		$temp = mysql_result($result,$i,"time_s_id");
            		$temp2 = mysql_result($result,$i,"time_e_id");
            		$t1 = mysqli_fetch_array(mysqli_query($conn, "SELECT * FROM timestart where time_s_id = $temp"));
            		$t2 = mysqli_fetch_array(mysqli_query($conn, "SELECT * FROM timestart where time_s_id = $temp2")); 
            		$time1 = $t1["time_s"];
            		$time2 = $t2["time_s"]; 
            	echo $time1." - ".$time2.' <br />
  &nbsp;&nbsp; </div></td>
              <td><div align="center">';
                
                 $sub_id = mysql_result($result,$i,"sub_id");
                 if($sub_id != -1)
                 {
                 $subtemp = mysqli_fetch_array(mysqli_query($conn, "SELECT sub_name FROM subjects where sub_id = $sub_id"));
                 $sub = $subtemp['sub_name'];
             	 }
             	 else
             	 	$sub = "";
             	 $prof_id = mysql_result($result,$i,"teacher_id");
                 if($teacher_id != -1)
                 {
                 $proftemp = mysqli_fetch_array(mysqli_query($conn, "SELECT teacher_name FROM profile where teacher_id = $prof_id"));
                 $prof = $proftemp['teacher_name'];
             	 }
             	 else
             	 	$prof = "";
             	 echo $sub."<br>".$prof;
             	 $i = $i +1;

              echo '</div></td>
              <td><div align="center">';
                $row = mysqli_fetch_assoc($result);
                $sub_id = mysql_result($result,$i,"sub_id");
                 if($sub_id != -1)
                 {
                 $subtemp = mysqli_fetch_array(mysqli_query($conn, "SELECT sub_name FROM subjects where sub_id = $sub_id"));
                 $sub = $subtemp['sub_name'];
             	 }
             	 else
             	 	$sub = "";
             	 $prof_id = mysql_result($result,$i,"teacher_id");
                 if($teacher_id != -1)
                 {
                 $proftemp = mysqli_fetch_array(mysqli_query($conn, "SELECT teacher_name FROM profile where teacher_id = $prof_id"));
                 $prof = $proftemp['teacher_name'];
             	 }
             	 else
             	 	$prof = "";
             	 echo $sub."<br>".$prof;
                $i = $i +1;
                echo '                 
              </div></td>
              <td><div align="center">';
                $row = mysqli_fetch_assoc($result);
                $sub_id = mysql_result($result,$i,"sub_id");
                 if($sub_id != -1)
                 {
                 $subtemp = mysqli_fetch_array(mysqli_query($conn, "SELECT sub_name FROM subjects where sub_id = $sub_id"));
                 $sub = $subtemp['sub_name'];
             	 }
             	 else
             	 	$sub = "";
             	 $prof_id = mysql_result($result,$i,"teacher_id");
                 if($teacher_id != -1)
                 {
                 $proftemp = mysqli_fetch_array(mysqli_query($conn, "SELECT teacher_name FROM profile where teacher_id = $prof_id"));
                 $prof = $proftemp['teacher_name'];
             	 }
             	 else
             	 	$prof = "";
             	 echo $sub."<br>".$prof;
                $i = $i +1;
                echo '                 
              </div></td>
              <td><div align="center">';
                $row = mysqli_fetch_assoc($result);
                $sub_id = mysql_result($result,$i,"sub_id");
                 if($sub_id != -1)
                 {
                 $subtemp = mysqli_fetch_array(mysqli_query($conn, "SELECT sub_name FROM subjects where sub_id = $sub_id"));
                 $sub = $subtemp['sub_name'];
             	 }
             	 else
             	 	$sub = "";
             	 $prof_id = mysql_result($result,$i,"teacher_id");
                 if($teacher_id != -1)
                 {
                 $proftemp = mysqli_fetch_array(mysqli_query($conn, "SELECT teacher_name FROM profile where teacher_id = $prof_id"));
                 $prof = $proftemp['teacher_name'];
             	 }
             	 else
             	 	$prof = "";
             	 echo $sub."<br>".$prof;
                $i = $i +1;
                echo '                 
              </div></td>
              <td><div align="center">';
                $row = mysqli_fetch_assoc($result);
                $sub_id = mysql_result($result,$i,"sub_id");
                 if($sub_id != -1)
                 {
                 $subtemp = mysqli_fetch_array(mysqli_query($conn, "SELECT sub_name FROM subjects where sub_id = $sub_id"));
                 $sub = $subtemp['sub_name'];
             	 }
             	 else
             	 	$sub = "";
             	 $prof_id = mysql_result($result,$i,"teacher_id");
                 if($teacher_id != -1)
                 {
                 $proftemp = mysqli_fetch_array(mysqli_query($conn, "SELECT teacher_name FROM profile where teacher_id = $prof_id"));
                 $prof = $proftemp['teacher_name'];
             	 }
             	 else
             	 	$prof = "";
             	 echo $sub."<br>".$prof;
                $i = $i +1;
                echo '                 
              </div></td>
            </tr>';

  			 }  ?>
   

              
          </table>
		  <p>&nbsp;</p>
		  <p align="center">
		    <label>
		    <!--<input type="submit" name="cmdSubmit" value="Report" />-->
		    </label>
		  </p>
		  <p align="center">&nbsp;</p>
		  <p>&nbsp;</p>
		</form>
		  <h1>&nbsp;</h1>
			
	</div>
		<div id="program"></div>
		<div id="right">
		  <p>&nbsp;</p>
	</div>
		<p>&nbsp;</p>
		<p>&nbsp;</p>
		<div id="footerline">
		  <p align="center"><span class="style4"><a href="help.php">Help</a> | <a href="about_dev.php">Developer</a>| <a href="about_sched.php">Scheduling System</a>| <a href="contact.html">Contact Us</a>| <a href="www.chmsc.edu.ph">CHMSC </a></span></p>
	</div>
  </div>
	
	<div id="footer">Four Dark Riders</div>	
</div>
</body>
</html>

