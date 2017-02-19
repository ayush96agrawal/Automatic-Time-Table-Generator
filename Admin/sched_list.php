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
#error {
	position:absolute;
	left:175px;
	top:221px;
	width:174px;
	height:48px;
	z-index:1;
}
.style32 {	font-size: 16px;
	font-weight: bold;
}
.style34 {font-size: 14px; font-weight: bold; }
.style35 {font-size: 14px}
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
		<!-- Add School Year -->
		<ul class=" cssMenum">

			<li class=" cssMenui"><a class="  cssMenui" href="year-a.php "><img src="../images/folder-new.ico" />Add</a></li>
			<li class=" cssMenui"><a class="  cssMenui" href="yearlist-a.php"><img src="../images/folder.ico" />View</a></li>
		</ul>
		<!--[if lte IE 6]></td></tr></table></a><![endif]--></li>
	</ul>
	<!--[if lte IE 6]></td></tr></table></a><![endif]--></li>
	 

	<li class=" cssMenui"><a class="  cssMenui" href="about.php"><span>About us</span><![if gt IE 6]></a><![endif]><!--[if lte IE 6]><table><tr><td><![endif]-->
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
		  <div align="center"><br />
		    <span class="style32">Schedule</span><br />		  
		    <br />
		    <table width="661" border="0" align="center" cellpadding="2">
              <tr>
                <td width="53" height="23" ><span class="style34">Course</span></span></td>
                <td width="65"><span class="style34">Subject</span></span></td>
                <td width="127" ><span class="style34">Teacher</span></span></td>
                <td width="80" ><span class="style34">Room</span></span></td>
                <td width="54" ><span class="style34">SY</span></span></td>
                <td width="54"><span class="style34">Day </span></span></td>
                <td width="121" ><span class="style34">Starting time</span></span></td>
                <td width="12" ><span class="style35"></span></td>
                <td width="39" ><span class="style35"></span></td>
                <?php 

// sending query
   $result = mysql_query("SELECT   `sched`.*, `day`.`day_name`, `course`.`course_yrSec`, `room`.`room_name`,
 `timestart`.`time_s`, `subjects`.`sub_code`,
  `school_yr`.`school_year`, `profile`.`teacher_name` FROM `sched`,`room`,`course`,`subjects`,`profile`,`timestart` ,`day`,`school_yr`  WHERE sched.room_id=room.room_id and sched.course_id=course.course_id and sched.sub_id=subjects.sub_id and sched.teacher_id=profile.teacher_id and sched.time_s_id=timestart.time_s_id and sched.day_id=day.day_id 
 and sched.year_id=school_yr.year_id ORDER BY `sched`.`year_id` DESC;
  			");
			
if (!$result) 
	{
    die("Query to show fields from table failed");
	}
$numberOfRows = MYSQL_NUMROWS($result);

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
	
			$sched_id = MYSQL_RESULT($result,$i,"sched_id");
			$hidden_pcourse = MYSQL_RESULT($result,$i,"course_yrSec");
			$hidden_psubcat = MYSQL_RESULT($result,$i,"sub_code");
			$hidden_pt = MYSQL_RESULT($result,$i,"teacher_name");
			$hidden_proom = MYSQL_RESULT($result,$i,"room_name");
			$hidden_psy = MYSQL_RESULT($result,$i,"school_year");
			$hidden_pday = MYSQL_RESULT($result,$i,"day_name");
			$hidden_pstime = MYSQL_RESULT($result,$i,"time_s");
			$pT = MYSQL_RESULT($result,$i,"teacher_id");
			$pSy = MYSQL_RESULT($result,$i,"year_id");
			$psem = MYSQL_RESULT($result,$i,"sem_id");
			$pCourse = MYSQL_RESULT($result,$i,"course_id");
			$pRoom = MYSQL_RESULT($result,$i,"room_id");
			
			
			
?>
              </tr>
              <tr bgcolor="<?php echo $bgcolor; ?>">
                <td height="18" nowrap="nowrap"  bgcolor="#BEED9E"><a href="search_c_result.php?&pCourse=<?php echo $pCourse; ?>&pSy=<?php echo $pSy; ?>&psem=<?php echo $psem; ?>"><?php echo $hidden_pcourse; ?></a></td>
                <td nowrap="nowrap" bgcolor="#F3FCC5"><?php echo $hidden_psubcat; ?></td>
                <td nowrap="nowrap" bgcolor="#CCE39B"><a href="search_t_result.php?&pT=<?php echo $pT; ?>&pSy=<?php echo $pSy; ?>&psem=<?php echo $psem; ?>"><?php echo $hidden_pt; ?></a></td>
                <td nowrap="nowrap" bgcolor="#C5F0FA"><a href="search_r_result.php?&pRoom=<?php echo $pRoom; ?>&pSy=<?php echo $pSy; ?>&psem=<?php echo $psem; ?>"><?php echo $hidden_proom; ?></a></td>
                <td nowrap="nowrap" bgcolor="#8CC695"><?php echo $hidden_psy ; ?></td>
                <td nowrap="nowrap" bgcolor="#F4DEF8"><?php echo $hidden_pday; ?></td>
                <td nowrap="nowrap" bgcolor="#E9D0BA"><?php echo $hidden_pstime; ?></td>
                <td><a href="sched_edit.php?sched_id=<?php echo $sched_id; ?>"> <img src='../images/b_edit.png' alt="edit record" width="16" height="16" border="0" /></a></td>
                <td><a href="sched_del.php?sched_id=<?php echo $sched_id; ?>"> <img src='../images/b_drop.png' alt="delete record" width="16" height="16" border="0" onclick="return confirm('<?php echo "Are you sure you want to delete file #". $sched_id. "?"; ?>');" /></a></td>
              </tr>
              <?php 	
		$i++;		
		}
	}	
?>
              <tr>
                <td></td>
              </tr>
		      <tr>
		        <td></td></td>
	          </tr>
              <tr>
                <td></tr></td>
              <td height="2"></tr>
            </table>
		  </div>
		</form>
      </div>
		<div id="program"></div>
		<div id="right">
		  <p>&nbsp;</p>
			<p>&nbsp;</p>
	  </div>
		<div id="footerline">
		  <p align="center"><span class="style4"><a href="help.php">Help</a> | <a href="about_dev.php">Developer</a>| <a href="about_sched.php">Scheduling System</a>| <a href="contact.html">Contact Us</a>| <a href="www.chmsc.edu.ph">CHMSC </a></span></p>
	  </div>
	</div>
	
	<div id="footer">Copyright © 2009 </div>	
</div>
</body>
</html>
