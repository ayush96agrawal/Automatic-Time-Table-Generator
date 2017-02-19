<?php session_start(); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<link href="../includes/style_prac2.css" rel="stylesheet" type="text/css" />
<title>Scheduling System</title>
<style type="text/css">
<!--
.style4 {font-size: 11px;
	font-family: Verdana, Arial, Helvetica, sans-serif;
}
.style25 {color: #330099; font-weight: bold; }
-->
</style>
</head>
<?php
include("../includes/session.php");
require ("../includes/dbconnection.php");
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
		<li class=" cssMenui"><a class="  cssMenui" href="year-a.php"><span><img src="../images/sy .jpg" /> </span><![if gt IE 6]></a><![endif]><!--[if lte IE 6]><table><tr><td><![endif]-->
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
		<form action="<?php echo $_SERVER[PHP_SELF] ?>" name="form1" method="post" >
		  <div align="center">
		    <p><br />
	        </p>
		    <p><strong>List of  Subjects</strong></p>
		    <p>&nbsp;</p>
		    <table width="682" border="0" align="center" cellpadding="2">
              <tr>
                <td width="90" nowrap="nowrap" bgcolor="#CCCCCC"><span class="style25">Course Code|</span></td>
                <td width="344" nowrap="nowrap" bgcolor="#CCCCCC"><span class="style25">Course Name </span></td>
                <td width="50" nowrap="nowrap" bgcolor="#CCCCCC"><span class="style25">Lec hrs</span></td>
                <!--<td width="28" nowrap="nowrap" bgcolor="#CCCCCC"><span class="style25">|Unit|</span></td>
                <td width="98" nowrap="nowrap" bgcolor="#CCCCCC"><span class="style25">Pre Req </span></td>    -->
				
                <td width="12" nowrap="nowrap" bgcolor="#CCCCCC"><span class="style25">Instructor</span></td>
                <?php 
				
				function mysql_result($result, $row, $field = 0) {
 			   // Adjust the result pointer to that specific row
    			$result->data_seek($row);
 			   // Fetch result array
 			   $data = $result->fetch_array();
 
 			   return $data[$field];
				}	

// sending query
$result = mysqli_query($conn,"SELECT * FROM subjects ");
if (!$result) 
	{
    die("Query to show fields from table failed");
	}
$numberOfRows = MYSQLI_NUM_ROWS($result);

If ($numberOfRows == 0) 
	{
	echo 'Sorry No Record Found!';
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
			$sub_id = MYSQL_RESULT($result,$i,"sub_id");	
			$sub_code = MYSQL_RESULT($result,$i,"sub_code");
			$sub_name = MYSQL_RESULT($result,$i,"sub_name");
			$sub_lechrsprday = MYSQL_RESULT($result,$i,"sub_lechrsprday");
			$sub_labhrsprday = MYSQL_RESULT($result,$i,"sub_labhrsprday");
			$sub_instructor_id= MYSQL_RESULT($result,$i,"instructor");
				$result2=mysqli_query($conn,"SELECT teacher_name from profile WHERE teacher_id = '$sub_instructor_id' ");
				$row2 = mysqli_fetch_array($result2);
				$sub_instr_name= $row2['teacher_name'];
			
			$prereq = MYSQL_RESULT($result,$i,"prereq");
			
			
?>
              </tr>
              <tr bgcolor="<?php echo $bgcolor; ?>">
                <td nowrap="nowrap"><?php echo $sub_code; ?></td>
                <td nowrap="nowrap"><?php echo $sub_name; ?></td>
                <td nowrap="nowrap"><?php echo $sub_lechrsprday; ?></td>
                <td nowrap="nowrap"><?php echo $sub_instr_name; ?></td>
                <td><a href="subject-edit-a.php?sub_id=<?php echo $sub_id; ?>"> <img src='../images/b_edit.png' alt="edit record" width="16" height="16" /></a></td>
                <td><a href="subject-del-a.php?sub_id=<?php echo $sub_id; ?>"> <img src='../images/b_drop.png' alt="delete record" width="16" height="16" onclick="return confirm(' <?php echo "Are you sure you want to delete " . $sub_code. "?";?>');" /></a></td>
              </tr>
              <?php 	
		$i++;		
		}
	}	
?>
            </table>
		    <p>&nbsp; </p>
		  </div>
	    </form>
	  </div>
		<div id="program"></div>
	  <div id="right">
			<h2>&nbsp;</h2>
	  </div>
		<p>&nbsp;</p>
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

