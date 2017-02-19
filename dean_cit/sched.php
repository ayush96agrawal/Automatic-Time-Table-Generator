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
.style21 {font-size: x-small}
.style22 {font-family: Geneva, Arial, Helvetica, sans-serif}
.style30 {font-family: "Courier New", Courier, monospace}
.style4 {font-size: 11px;
	font-family: Verdana, Arial, Helvetica, sans-serif;
}
.style2 {font-family: Verdana, Arial, Helvetica, sans-serif;
	font-weight: bold;
}
.style28 {color: #0000FF}
.style5 {	font-family: Verdana, Arial, Helvetica, sans-serif;
	font-weight: bold;
	color: #003399;
}
#error {
	position:absolute;
	left:175px;
	top:221px;
	width:174px;
	height:48px;
	z-index:1;
}
#Layer2 {
	position:absolute;
	left:227px;
	top:275px;
	width:618px;
	height:175px;
	z-index:1;
}
.style31 {font-size: 14px}
.style32 {color: #0F3A6A}
.style33 {
	font-size: 18px;
	font-weight: bold;
}
.style34 {
	font-size: 13px;
	font-weight: bold;
	color: #FF0000;
}
-->
</style>
</head>
<?php
include("../includes/session.php");
 require ("../includes/dbconnection.php");
 ?>
  
<?php
   if (isset($_POST['cmdSubmit'])) 
  	{ 		
		
		if (trim($_POST['hidden_pcourseid']) == ""){ $flagcourse = 'Required Field.';}	
		if (trim($_POST['hidden_psubcatid']) == ""){ $flagsub = 'Required Field.';}
		if (trim($_POST['hidden_pidt']) == "")  { $flagteacher  = 'Required Field.';}
		if (trim($_POST['hidden_proomid']) == "") { $flagroom = 'Required Field.';} 			
		if (trim($_POST['hidden_psemid']) == ""){ $flagsem = 'Required Field.';}
		if (trim($_POST['hidden_psyid']) == ""){ $flagsy= 'Required Field.';}
		if (trim($_POST['hidden_pdayid']) == ""){ $flagday = 'Required Field.';}
		if (trim($_POST['hidden_pstimeid']) == ""){ $flagstime = 'Required Field.';}

		
		

if (($flagcourse == "") &&  ($flagsub == "")  && ($flagteacher == "")
 && ($flagroom == "") && ($flagsem == "") && ($flagsy == "") && ($flagday == "")&& ($flagstime == ""))
{

				
		 	$hidden_pcourse= $_POST['pcourse'];
			$hidden_psubcat= $_POST['psub'];
			$hidden_pt= $_POST['pteacher'];
			$hidden_proom= $_POST['proom'];
			$hidden_psem= $_POST['psem'];
			$hidden_psy= $_POST['psy'];
			$hidden_pday = $_POST['pday'];
			$hidden_pstime = $_POST['pstime'];
	

 $result = mysql_query ("SELECT * FROM sched")or die(mysql_error());
 
if (!$result) 
	{
    die("Query to show fields from table failed");
	}
$numberOfRows = MYSQL_NUMROWS($result);

If ($numberOfRows == 0) 
	{
	echo '';
	}
else if ($numberOfRows > 0) 
	{
	$i=0;
	while ($i<$numberOfRows)
		{			
	
			$sched_id = MYSQL_RESULT($result,$i,"sched_id");
			$course = MYSQL_RESULT($result,$i,"course_id");
			$subcat = MYSQL_RESULT($result,$i,"sub_id");
			$teacher = MYSQL_RESULT($result,$i,"teacher_id");
			$room = MYSQL_RESULT($result,$i,"room_id");
			$sem = MYSQL_RESULT($result,$i,"sem_id");
			$sy = MYSQL_RESULT($result,$i,"year_id");
			$day = MYSQL_RESULT($result,$i,"day_id");
			$stime = MYSQL_RESULT($result,$i,"time_s_id");

			
			if (( $teacher == $hidden_pt or $room == $hidden_proom or $course == $hidden_pcourse) && ($day == $hidden_pday and  $stime == $hidden_pstime and $sy == $hidden_psy and  $sem == $hidden_psem)){
			
			   $result = mysql_query("SELECT `sched`.*, `day`.`day_name`, `course`.`course_yrSec`, `room`.`room_name`,
 `timestart`.`time_s`, `subjects`.`sub_code`,
  `school_yr`.`school_year`, `profile`.`teacher_name` FROM `sched`,`room`,`course`,`subjects`,`profile`,`timestart` ,`day`,`school_yr`  WHERE sched.room_id=room.room_id and sched.course_id=course.course_id and sched.sub_id=subjects.sub_id and sched.teacher_id=profile.teacher_id and sched.time_s_id=timestart.time_s_id and sched.day_id=day.day_id 
 and sched.year_id=school_yr.year_id having sched_id = '$sched_id'
  			");
			 if (!$result) 
	{
    die("Query to show fields from table failed");
	}
$numberOfRows = MYSQL_NUMROWS($result);

If ($numberOfRows == 0) 
	{
	echo '';
	}
else if ($numberOfRows > 0) 
	{
	$i=0;
	while ($i<$numberOfRows)
		{			
	
			$sched_id = MYSQL_RESULT($result,$i,"sched_id");
			$acourse = MYSQL_RESULT($result,$i,"course_yrSec");
			$asubcat = MYSQL_RESULT($result,$i,"sub_code");
			$ateacher = MYSQL_RESULT($result,$i,"teacher_name");
			$aroom = MYSQL_RESULT($result,$i,"room_name");
			$aday = MYSQL_RESULT($result,$i,"day_name");
			$astime = MYSQL_RESULT($result,$i,"time_s");
						
	$i++;	 
			}
			}
			
			$note = "&nbsp;&nbsp;&nbsp;&nbsp;<font face = 'Verdana, Arial, Helvetica, sans-serif', color = '#FF0000' size='2'><i><b>* There is a conflict with the schedule of  $ateacher, $acourse  at $aroom, $aday ,<br>&nbsp;&nbsp;&nbsp;&nbsp;$astime with the subject $asubcat</b></i></font><br><br> ";
			$conflict = true;
			end;
			}
	$i++;	 
			}
			}

if ($conflict != true){
			
			mysql_query ("INSERT INTO sched(course_id, sub_id, teacher_id, room_id, sem_id, year_id, day_id, time_s_id, dept_id)
					VALUES('$hidden_pcourse', '$hidden_psubcat','$hidden_pt','$hidden_proom','$hidden_psem','$hidden_psy','$hidden_pday','$hidden_pstime', 2)") or die(mysql_error()); 
			
			 $result = mysql_query("SELECT `sched`.*, `day`.`day_name`, `course`.`course_yrSec`, `room`.`room_name`,
 `timestart`.`time_s`, `subjects`.`sub_code`,
  `school_yr`.`school_year`, `profile`.`teacher_name` FROM `sched`,`room`,`course`,`subjects`,`profile`,`timestart` ,`day`,`school_yr`  WHERE sched.room_id=room.room_id and sched.course_id=course.course_id and sched.sub_id=subjects.sub_id and sched.teacher_id=profile.teacher_id and sched.time_s_id=timestart.time_s_id and sched.day_id=day.day_id 
 and sched.year_id=school_yr.year_id having sched.room_id='$hidden_proom' and sched.course_id='$hidden_pcourse' and sched.sub_id='$hidden_psubcat' and sched.teacher_id='$hidden_pt' and sched.time_s_id='$hidden_pstime' and sched.day_id='$hidden_pday'
 and sched.year_id='$hidden_psy' and sem_id = '$hidden_psem' 
  			");
			 if (!$result) 
	{
    die("Query to show fields from table failed");
	}
$numberOfRows = MYSQL_NUMROWS($result);

If ($numberOfRows == 0) 
	{
	echo '';
	}
else if ($numberOfRows > 0) 
	{
	$i=0;
	while ($i<$numberOfRows)
		{			
	
			$sched_id = MYSQL_RESULT($result,$i,"sched_id");
			$bcourse = MYSQL_RESULT($result,$i,"course_yrSec");
			$bsubcat = MYSQL_RESULT($result,$i,"sub_code");
			$bteacher = MYSQL_RESULT($result,$i,"teacher_name");
			$broom = MYSQL_RESULT($result,$i,"room_name");
			$bday = MYSQL_RESULT($result,$i,"day_name");
			$bstime = MYSQL_RESULT($result,$i,"time_s");
						
	$i++;	 
			}
			}
					$note = "&nbsp;&nbsp;&nbsp;&nbsp;<font face = 'Verdana, Arial, Helvetica, sans-serif', size='2'><b> *You have saved schedule of: Course: <font size='4'><i><a href='search_c_result.php?pCourse=$hidden_pcourse&pSy=$hidden_psy&psem=$hidden_psem'>$bcourse </a></i></font>,&nbsp; Subject: $bsubcat &nbsp;<br> Teacher: <font size='4'><i><a href='search_t_result.php?pT=$hidden_pt&pSy=$hidden_psy&psem=$hidden_psem'>$bteacher </a></i></font>&nbsp; Room: <font size='4'><i><a href='search_r_result.php?pRoom=$hidden_proom&pSy=$hidden_psy&psem=$hidden_psem'>$broom </a></i></font> at $bday,$bstime'</font>";
					//echo "Your file has been saved in the database..";
					//header(
						//	"Location: sched_list.php");
			}	
		}
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
	        <span class="style33">Add New Schedule</span></p>
            <div id="layer">
              <div align="justify" >
                <div align="center" ><?php echo $note;?></div>
              </div>
              <div align="center"></div>
            </div>
            <table border="0" align="center">
              <tr  >
                <td colspan="4" ><div align="center" class="style2">
                  <div align="center" class="style5">College of Industrial Technology </div>
                </div></td>
              </tr>
              <tr>
                <td colspan="4"  ><label></label>
                  <label></label>
                  <div align="center" class="style30"><a href="index.php"></a></div></td>
              </tr>
              <tr>
                <td colspan="4" ><label></label>
                  <label></label>
                  <div align="center">
                    <div align="right" class="style3">
                      <div align="center" class="style28"></div>
                    </div>
                  </div></td>
              </tr>
              <tr >
                <td width="118" height="34"><div align="right" class="style3">Course</div></td>
                <td width="323" ><span class="style22">
                  <label>
                    <select name="pcourse"  id="pcourse" style="width: 267px" onchange="javascript: return optionList_SelectedIndex()">
                      <?php // source 1: http://www.dmxzone.com/showDetail.asp?NewsId=5102&TypeId=25
			  	// source 2: http://localhost/phpmyadmin/index.php?db=mydbase&token=651c0063e511c381c9c82ce1fe9b6854
				$result = mysql_query("SELECT * FROM course where dept_id = 2  ORDER BY course_yrSec ");			  	
				do {  ?>
                      <option value="<?php echo $row['course_id'];?>"><?php echo $row['course_yrSec'];?></option>
                      <?php } while ($row = mysql_fetch_assoc($result)); ?>
                    </select>
                    <!-- 
			Setting up the correct combo box width alignment to table
			source: http://www.eskimo.com/~bloo/indexdot/html/topics/selectwidth.htm
		-->
                    <input type="hidden" id="hidden_pcourseid" name="hidden_pcourseid"  value="<?PHP echo trim($_POST['hidden_pcourseid']); ?>" />
                    <input type="hidden" id="hidden_pcourse" name="hidden_pcourse" value="<?PHP echo trim($_POST['hidden_pcourse']); ?>"/>
                  </label>
                </span></td>
                <td width="91" ><span class="style21"><span class="style20"><?php echo $flagcourse; ?></span></span></td>
                <td width="1" >&nbsp;</td>
              </tr>
              <tr >
                <td height="34"  ><div align="right" class="style3">Subject </div></td>
                <td ><span class="style22">
                  <label>
                    <select name="psub"  id="psub" style="width: 267px" onchange="javascript: return optionList2_SelectedIndex()">
                      <?php // source 1: http://www.dmxzone.com/showDetail.asp?NewsId=5102&TypeId=25
			  	// source 2: http://localhost/phpmyadmin/index.php?db=mydbase&token=651c0063e511c381c9c82ce1fe9b6854
				$result = mysql_query("SELECT * FROM subjects WHERE `subjects`.`dept_id` = 2 ORDER BY sub_code ");			  	
				do {  ?>
                      <option value="<?php echo $row['sub_id'];?>"><?php echo $row['sub_code'];?></option>
                      <?php } while ($row = mysql_fetch_assoc($result)); ?>
                    </select>
                    <!-- 
			Setting up the correct combo box width alignment to table
			source: http://www.eskimo.com/~bloo/indexdot/html/topics/selectwidth.htm
		-->
                    <input type="hidden" id="hidden_psubcatid" name="hidden_psubcatid"  value="<?PHP echo trim($_POST['hidden_psubcatid']); ?>" />
                    <input type="hidden" id="hidden_psubcat" name="hidden_psubcat" value="<?PHP echo trim($_POST['hidden_psubcat']); ?>"/>
                  </label>
                </span></td>
                <td ><span class="style21"><span class="style20"><?php echo $flagsub; ?></span></span></td>
                <td >&nbsp;</td>
              </tr>
              <tr >
                <td height="35" ><div align="right" class="style3">Teacher</div></td>
                <td ><span class="style22">
                  <label>
                    <select name="pteacher"  id="pteacher" style="width: 267px" onchange="javascript: return optionList3_SelectedIndex()">
                      <?php // source 1: http://www.dmxzone.com/showDetail.asp?NewsId=5102&TypeId=25
			  	// source 2: http://localhost/phpmyadmin/index.php?db=mydbase&token=651c0063e511c381c9c82ce1fe9b6854
				$result = mysql_query("SELECT * FROM profile where dept_id = 2 ORDER BY teacher_name ");			  	
				do {  ?>
                      <option value="<?php echo $row['teacher_id'];?>"><?php echo $row['teacher_name'];?></option>
                      <?php } while ($row = mysql_fetch_assoc($result)); ?>
                    </select>
                    <!-- 
			Setting up the correct combo box width alignment to table
			source: http://www.eskimo.com/~bloo/indexdot/html/topics/selectwidth.htm
		-->
                    <input type="hidden" id="hidden_pidt" name="hidden_pidt"  value="<?PHP echo trim($_POST['hidden_pidt']); ?>" />
                    <input type="hidden" id="hidden_pt" name="hidden_pt" value="<?PHP echo trim($_POST['hidden_pt']); ?>"/>
                  </label>
                </span></td>
                <td ><span class="style21"><span class="style20"><?php echo $flagteacher; ?></span></span></td>
                <td >&nbsp;</td>
              </tr>
              <tr >
                <td height="34" ><div align="right" class="style3">Room</div></td>
                <td ><span class="style22">
                  <label>
                    <select name="proom"  id="proom" style="width: 267px" onchange="javascript: return optionList4_SelectedIndex()">
                      <?php // source 1: http://www.dmxzone.com/showDetail.asp?NewsId=5102&TypeId=25
			  	// source 2: http://localhost/phpmyadmin/index.php?db=mydbase&token=651c0063e511c381c9c82ce1fe9b6854
				$result = mysql_query("SELECT * FROM room ORDER BY room_name ");			  	
				do {  ?>
                      <option value="<?php echo $row['room_id'];?>"><?php echo $row['room_name'];?></option>
                      <?php } while ($row = mysql_fetch_assoc($result)); ?>
                    </select>
                    <!-- 
			Setting up the correct combo box width alignment to table
			source: http://www.eskimo.com/~bloo/indexdot/html/topics/selectwidth.htm
		-->
                    <input type="hidden" id="hidden_proomid" name="hidden_proomid"  value="<?PHP echo trim($_POST['hidden_proomid']); ?>" />
                    <input type="hidden" id="hidden_proom" name="hidden_proom" value="<?PHP echo trim($_POST['hidden_proom']); ?>"/>
                  </label>
                </span></td>
                <td><span class="style21"><span class="style20"><?php echo $flagroom; ?></span></span></td>
                <td>&nbsp;</td>
              </tr>
              <tr>
                <td height="34"><div align="right" class="style3">Semester</div></td>
                <td ><span class="style22">
                  <label>
                    <select name="psem"  id="psem" style="width: 267px" onchange="javascript: return optionList6_SelectedIndex()">
                      <?php // source 1: http://www.dmxzone.com/showDetail.asp?NewsId=5102&TypeId=25
			  	// source 2: http://localhost/phpmyadmin/index.php?db=mydbase&token=651c0063e511c381c9c82ce1fe9b6854
				$result = mysql_query("SELECT * FROM sem ORDER BY semester ");			  	
				do {  ?>
                      <option value="<?php echo $row['sem_id'];?>"><?php echo $row['semester'];?></option>
                      <?php } while ($row = mysql_fetch_assoc($result)); ?>
                    </select>
                    <!-- 
			Setting up the correct combo box width alignment to table
			source: http://www.eskimo.com/~bloo/indexdot/html/topics/selectwidth.htm
		-->
                    <input type="hidden" id="hidden_psemid" name="hidden_psemid"  value="<?PHP echo trim($_POST['hidden_psemid']); ?>" />
                    <input type="hidden" id="hidden_psem" name="hidden_psem" value="<?PHP echo trim($_POST['hidden_psem']); ?>"/>
                  </label>
                </span></td>
                <td ><span class="style21"><span class="style20"><?php echo $flagsem; ?></span></span></td>
                <td >&nbsp;</td>
              </tr>
              <tr>
                <td height="34"><div align="right" class="style3">School Year </div></td>
                <td ><span class="style22">
                  <label>
                    <select name="psy"  id="psy" style="width: 267px" onchange="javascript: return optionList7_SelectedIndex()">
                      <?php // source 1: http://www.dmxzone.com/showDetail.asp?NewsId=5102&TypeId=25
			  	// source 2: http://localhost/phpmyadmin/index.php?db=mydbase&token=651c0063e511c381c9c82ce1fe9b6854
				$result = mysql_query("SELECT * FROM school_yr ORDER BY school_year ");			  	
				do {  ?>
                      <option value="<?php echo $row['year_id'];?>"><?php echo $row['school_year'];?></option>
                      <?php } while ($row = mysql_fetch_assoc($result)); ?>
                    </select>
                    <!-- 
			Setting up the correct combo box width alignment to table
			source: http://www.eskimo.com/~bloo/indexdot/html/topics/selectwidth.htm
		-->
                    <input type="hidden" id="hidden_psyid" name="hidden_psyid"  value="<?PHP echo trim($_POST['hidden_psyid']); ?>" />
                    <input type="hidden" id="hidden_psy" name="hidden_psy" value="<?PHP echo trim($_POST['hidden_psy']); ?>"/>
                  </label>
                </span></td>
                <td ><span class="style21"><span class="style20"><?php echo $flagsy; ?></span></span></td>
                <td >&nbsp;</td>
              </tr>
              <tr>
                <td height="34"><div align="right" class="style3">Day</div></td>
                <td ><span class="style22">
                  <label>
                    <!-- 
			Setting up the correct combo box width alignment to table
			source: http://www.eskimo.com/~bloo/indexdot/html/topics/selectwidth.htm
		-->
                    <select name="pday"  id="pday" style="width: 267px" onchange="javascript: return optionList8_SelectedIndex()">
                      <?php // source 1: http://www.dmxzone.com/showDetail.asp?NewsId=5102&TypeId=25
			  	// source 2: http://localhost/phpmyadmin/index.php?db=mydbase&token=651c0063e511c381c9c82ce1fe9b6854
				$result = mysql_query("SELECT * FROM day ORDER BY day_id");			  	
				do {  ?>
                      <option value="<?php echo $row['day_id'];?>"><?php echo $row['day_name'];?></option>
                      <?php } while ($row = mysql_fetch_assoc($result)); ?>
                    </select>
                    <input type="hidden" id="hidden_pdayid" name="hidden_pdayid"  value="<?PHP echo trim($_POST['hidden_pdayid']); ?>" />
                    <input type="hidden" id="hidden_pday" name="hidden_pday" value="<?PHP echo trim($_POST['hidden_pday']); ?>"/>
                  </label>
                </span></td>
                <td><span class="style21"><span class="style20"><?php echo $flagday; ?></span></span></td>
                <td >&nbsp;</td>
              </tr>
              <tr>
                <td height="34"><div align="right" class="style3">Starting Time </div></td>
                <td ><span class="style22">
                  <label>
                    <select name="pstime"  id="pstime" style="width: 267px" onchange="javascript: return optionList9_SelectedIndex()">
                      <?php // source 1: http://www.dmxzone.com/showDetail.asp?NewsId=5102&TypeId=25
			  	// source 2: http://localhost/phpmyadmin/index.php?db=mydbase&token=651c0063e511c381c9c82ce1fe9b6854
				$result = mysql_query("SELECT * FROM timestart ORDER BY time_s_id");			  	
				do {  ?>
                      <option value="<?php echo $row['time_s_id'];?>"><?php echo $row['time_s'];?></option>
                      <?php } while ($row = mysql_fetch_assoc($result)); ?>
                    </select>
                    <!-- 
			Setting up the correct combo box width alignment to table
			source: http://www.eskimo.com/~bloo/indexdot/html/topics/selectwidth.htm
		-->
                    <input type="hidden" id="hidden_pstimeid" name="hidden_pstimeid"  value="<?PHP echo trim($_POST['hidden_pstimeid']); ?>" />
                    <input type="hidden" id="hidden_pstime" name="hidden_pstime" value="<?PHP echo trim($_POST['hidden_pstime']); ?>"/>
                  </label>
                </span></td>
                <td><span class="style21"><span class="style20"><?php echo $flagstime; ?></span></span></td>
                <td>&nbsp;</td>
              </tr>
              <tr>
                <td height="21" colspan="4">&nbsp;</td>
              </tr>
              <tr >
                <td colspan="3"><div align="center"><span class="style30">
                  <input type="submit" name="cmdSubmit" value="Submit" />
                  &nbsp;
                  <input type="submit" name="cmdClear" value="Clear" />
                </span></div></td>
                <td>&nbsp;</td>
              </tr>
              <tr>
                <td colspan="4"><div align="center"></div></td>
              </tr>
            </table>
            <p class="style32">&nbsp;</p>
		    <p>&nbsp;</p>
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
<script language="javascript" >
/*		function SubmitForm(form)
		{			
			var form = document.forms[0];		
			if ((form.pLName.value.length <1) ||
				(form.pFName.value.length <1) ||
				(form.pMIName.value.length <1)) 
				{						
				 return false; 		
				}				 									
			else
				{	
				  return true;
				}
		}
*/		
		function optionList_SelectedIndex()
		{
			//----------------------------------------------------------------------------------------------------------
			/*HTML/JavaScript - Working with selectedIndex (select, options, selectedIndex, text, value)
			The selectedIndex number can be used to reference the selected option in the select list. 
			Note: It is case sensitive. 		
			Make sure to capitalize the "I" in selectedIndex
			* selectedIndex - The number (base 0) of the item that is selected in the select list
			* value - For an option, what's in the value attribute.
			  If the value attribute is not set, text should be returned [* refer below]
				  o val1 is the value in the following HTML example
				  o <option value="val1">sea one</option>
			* text - For an option, what's in between the option tags
				  o sea two is the text in the following HTML example
				  o <option value="val2">sea two</option>*/

			var selObj = document.getElementById('pcourse');
			//var txtIndexObj = document.getElementById('txtIndex');
			var hidden_pcourseid_ValueObj = document.getElementById('hidden_pcourseid');
			var hidden_pcourse_TextObj = document.getElementById('hidden_pcourse');
			
			var selIndex = selObj.selectedIndex;
			//txtIndexObj.value = selIndex;
			hidden_pcourseid_ValueObj.value = selObj.options[selIndex].value;
			hidden_pcourse_TextObj.value = selObj.options[selIndex].text;
		
			//var form = document.forms[0]; --> Option B
			<!-- //Passing the data from the databse residence [ID] to hidden field
			//Source: http://www.trans4mind.com/personal_development/JavaScript2/select.htm /-- -->			
			//----------------------------------------------------------------------------------------------------------
		}
		function optionList2_SelectedIndex()
		{
			//----------------------------------------------------------------------------------------------------------
			/*HTML/JavaScript - Working with selectedIndex (select, options, selectedIndex, text, value)
			The selectedIndex number can be used to reference the selected option in the select list. 
			Note: It is case sensitive. 		
			Make sure to capitalize the "I" in selectedIndex
			* selectedIndex - The number (base 0) of the item that is selected in the select list
			* value - For an option, what's in the value attribute.
			  If the value attribute is not set, text should be returned [* refer below]
				  o val1 is the value in the following HTML example
				  o <option value="val1">sea one</option>
			* text - For an option, what's in between the option tags
				  o sea two is the text in the following HTML example
				  o <option value="val2">sea two</option>*/

			var selObj = document.getElementById('psub');
			//var txtIndexObj = document.getElementById('txtIndex');
			var hidden_psubcatid_ValueObj = document.getElementById('hidden_psubcatid');
			var hidden_psubcat_TextObj = document.getElementById('hidden_psubcat');
			
			var selIndex = selObj.selectedIndex;
			//txtIndexObj.value = selIndex;
			hidden_psubcatid_ValueObj.value = selObj.options[selIndex].value;
			hidden_psubcat_TextObj.value = selObj.options[selIndex].text;
		
			//var form = document.forms[0]; --> Option B
			<!-- //Passing the data from the databse residence [ID] to hidden field
			//Source: http://www.trans4mind.com/personal_development/JavaScript2/select.htm /-- -->			
			//----------------------------------------------------------------------------------------------------------
		}
		function optionList3_SelectedIndex()
		{
			//----------------------------------------------------------------------------------------------------------
			/*HTML/JavaScript - Working with selectedIndex (select, options, selectedIndex, text, value)
			The selectedIndex number can be used to reference the selected option in the select list. 
			Note: It is case sensitive. 		
			Make sure to capitalize the "I" in selectedIndex
			* selectedIndex - The number (base 0) of the item that is selected in the select list
			* value - For an option, what's in the value attribute.
			  If the value attribute is not set, text should be returned [* refer below]
				  o val1 is the value in the following HTML example
				  o <option value="val1">sea one</option>
			* text - For an option, what's in between the option tags
				  o sea two is the text in the following HTML example
				  o <option value="val2">sea two</option>*/

			var selObj = document.getElementById('pteacher');
			//var txtIndexObj = document.getElementById('txtIndex');
			var hidden_pidt_ValueObj = document.getElementById('hidden_pidt');
			var hidden_pt_TextObj = document.getElementById('hidden_pt');
			
			var selIndex = selObj.selectedIndex;
			//txtIndexObj.value = selIndex;
			hidden_pidt_ValueObj.value = selObj.options[selIndex].value;
			hidden_pt_TextObj.value = selObj.options[selIndex].text;
		
			//var form = document.forms[0]; --> Option B
			<!-- //Passing the data from the databse residence [ID] to hidden field
			//Source: http://www.trans4mind.com/personal_development/JavaScript2/select.htm /-- -->			
			//----------------------------------------------------------------------------------------------------------
		}
		
		
		function optionList4_SelectedIndex()
		{
			//----------------------------------------------------------------------------------------------------------
			/*HTML/JavaScript - Working with selectedIndex (select, options, selectedIndex, text, value)
			The selectedIndex number can be used to reference the selected option in the select list. 
			Note: It is case sensitive. 		
			Make sure to capitalize the "I" in selectedIndex
			* selectedIndex - The number (base 0) of the item that is selected in the select list
			* value - For an option, what's in the value attribute.
			  If the value attribute is not set, text should be returned [* refer below]
				  o val1 is the value in the following HTML example
				  o <option value="val1">sea one</option>
			* text - For an option, what's in between the option tags
				  o sea two is the text in the following HTML example
				  o <option value="val2">sea two</option>*/

			var selObj = document.getElementById('proom');
			//var txtIndexObj = document.getElementById('txtIndex');
			var hidden_proomid_ValueObj = document.getElementById('hidden_proomid');
			var hidden_proom_TextObj = document.getElementById('hidden_proom');
			
			var selIndex = selObj.selectedIndex;
			//txtIndexObj.value = selIndex;
			hidden_proomid_ValueObj.value = selObj.options[selIndex].value;
			hidden_proom_TextObj.value = selObj.options[selIndex].text;
		
			//var form = document.forms[0]; --> Option B
			<!-- //Passing the data from the databse residence [ID] to hidden field
			//Source: http://www.trans4mind.com/personal_development/JavaScript2/select.htm /-- -->			
			//----------------------------------------------------------------------------------------------------------
		}
		
		
				function optionList5_SelectedIndex()
		{
			//----------------------------------------------------------------------------------------------------------
			/*HTML/JavaScript - Working with selectedIndex (select, options, selectedIndex, text, value)
			The selectedIndex number can be used to reference the selected option in the select list. 
			Note: It is case sensitive. 		
			Make sure to capitalize the "I" in selectedIndex
			* selectedIndex - The number (base 0) of the item that is selected in the select list
			* value - For an option, what's in the value attribute.
			  If the value attribute is not set, text should be returned [* refer below]
				  o val1 is the value in the following HTML example
				  o <option value="val1">sea one</option>
			* text - For an option, what's in between the option tags
				  o sea two is the text in the following HTML example
				  o <option value="val2">sea two</option>*/

			var selObj = document.getElementById('pdept');
			//var txtIndexObj = document.getElementById('txtIndex');
			var hidden_pdeptid_ValueObj = document.getElementById('hidden_pdeptid');
			var hidden_pdept_TextObj = document.getElementById('hidden_pdept');
			
			var selIndex = selObj.selectedIndex;
			//txtIndexObj.value = selIndex;
			hidden_pdeptid_ValueObj.value = selObj.options[selIndex].value;
			hidden_pdept_TextObj.value = selObj.options[selIndex].text;
		
			//var form = document.forms[0]; --> Option B
			<!-- //Passing the data from the databse residence [ID] to hidden field
			//Source: http://www.trans4mind.com/personal_development/JavaScript2/select.htm /-- -->			
			//----------------------------------------------------------------------------------------------------------
		}
		
		
						function optionList6_SelectedIndex()
		{
			//----------------------------------------------------------------------------------------------------------
			/*HTML/JavaScript - Working with selectedIndex (select, options, selectedIndex, text, value)
			The selectedIndex number can be used to reference the selected option in the select list. 
			Note: It is case sensitive. 		
			Make sure to capitalize the "I" in selectedIndex
			* selectedIndex - The number (base 0) of the item that is selected in the select list
			* value - For an option, what's in the value attribute.
			  If the value attribute is not set, text should be returned [* refer below]
				  o val1 is the value in the following HTML example
				  o <option value="val1">sea one</option>
			* text - For an option, what's in between the option tags
				  o sea two is the text in the following HTML example
				  o <option value="val2">sea two</option>*/

			var selObj = document.getElementById('psem');
			//var txtIndexObj = document.getElementById('txtIndex');
			var hidden_psemid_ValueObj = document.getElementById('hidden_psemid');
			var hidden_psem_TextObj = document.getElementById('hidden_psem');
			
			var selIndex = selObj.selectedIndex;
			//txtIndexObj.value = selIndex;
			hidden_psemid_ValueObj.value = selObj.options[selIndex].value;
			hidden_psem_TextObj.value = selObj.options[selIndex].text;
		
			//var form = document.forms[0]; --> Option B
			<!-- //Passing the data from the databse residence [ID] to hidden field
			//Source: http://www.trans4mind.com/personal_development/JavaScript2/select.htm /-- -->			
			//----------------------------------------------------------------------------------------------------------
		}
		
		
		//hidden_psyid
		
								function optionList7_SelectedIndex()
		{
			//----------------------------------------------------------------------------------------------------------
			/*HTML/JavaScript - Working with selectedIndex (select, options, selectedIndex, text, value)
			The selectedIndex number can be used to reference the selected option in the select list. 
			Note: It is case sensitive. 		
			Make sure to capitalize the "I" in selectedIndex
			* selectedIndex - The number (base 0) of the item that is selected in the select list
			* value - For an option, what's in the value attribute.
			  If the value attribute is not set, text should be returned [* refer below]
				  o val1 is the value in the following HTML example
				  o <option value="val1">sea one</option>
			* text - For an option, what's in between the option tags
				  o sea two is the text in the following HTML example
				  o <option value="val2">sea two</option>*/

			var selObj = document.getElementById('psy');
			//var txtIndexObj = document.getElementById('txtIndex');
			var hidden_psyid_ValueObj = document.getElementById('hidden_psyid');
			var hidden_psy_TextObj = document.getElementById('hidden_psy');
			
			var selIndex = selObj.selectedIndex;
			//txtIndexObj.value = selIndex;
			hidden_psyid_ValueObj.value = selObj.options[selIndex].value;
			hidden_psy_TextObj.value = selObj.options[selIndex].text;
		
			//var form = document.forms[0]; --> Option B
			<!-- //Passing the data from the databse residence [ID] to hidden field
			//Source: http://www.trans4mind.com/personal_development/JavaScript2/select.htm /-- -->			
			//----------------------------------------------------------------------------------------------------------
		}
		
										function optionList8_SelectedIndex()
		{
			//----------------------------------------------------------------------------------------------------------
			/*HTML/JavaScript - Working with selectedIndex (select, options, selectedIndex, text, value)
			The selectedIndex number can be used to reference the selected option in the select list. 
			Note: It is case sensitive. 		
			Make sure to capitalize the "I" in selectedIndex
			* selectedIndex - The number (base 0) of the item that is selected in the select list
			* value - For an option, what's in the value attribute.
			  If the value attribute is not set, text should be returned [* refer below]
				  o val1 is the value in the following HTML example
				  o <option value="val1">sea one</option>
			* text - For an option, what's in between the option tags
				  o sea two is the text in the following HTML example
				  o <option value="val2">sea two</option>*/

			var selObj = document.getElementById('pday');
			//var txtIndexObj = document.getElementById('txtIndex');
			var hidden_pdayid_ValueObj = document.getElementById('hidden_pdayid');
			var hidden_pday_TextObj = document.getElementById('hidden_pday');
			
			var selIndex = selObj.selectedIndex;
			//txtIndexObj.value = selIndex;
			hidden_pdayid_ValueObj.value = selObj.options[selIndex].value;
			hidden_pday_TextObj.value = selObj.options[selIndex].text;
		
			//var form = document.forms[0]; --> Option B
			<!-- //Passing the data from the databse residence [ID] to hidden field
			//Source: http://www.trans4mind.com/personal_development/JavaScript2/select.htm /-- -->			
			//----------------------------------------------------------------------------------------------------------
		}
		
		
												function optionList9_SelectedIndex()
		{
			//----------------------------------------------------------------------------------------------------------
			/*HTML/JavaScript - Working with selectedIndex (select, options, selectedIndex, text, value)
			The selectedIndex number can be used to reference the selected option in the select list. 
			Note: It is case sensitive. 		
			Make sure to capitalize the "I" in selectedIndex
			* selectedIndex - The number (base 0) of the item that is selected in the select list
			* value - For an option, what's in the value attribute.
			  If the value attribute is not set, text should be returned [* refer below]
				  o val1 is the value in the following HTML example
				  o <option value="val1">sea one</option>
			* text - For an option, what's in between the option tags
				  o sea two is the text in the following HTML example
				  o <option value="val2">sea two</option>*/

			var selObj = document.getElementById('pstime');
			//var txtIndexObj = document.getElementById('txtIndex');
			var hidden_pstimeid_ValueObj = document.getElementById('hidden_pstimeid');
			var hidden_pstime_TextObj = document.getElementById('hidden_pstime');
			
			var selIndex = selObj.selectedIndex;
			//txtIndexObj.value = selIndex;
			hidden_pstimeid_ValueObj.value = selObj.options[selIndex].value;
			hidden_pstime_TextObj.value = selObj.options[selIndex].text;
		
			//var form = document.forms[0]; --> Option B
			<!-- //Passing the data from the databse residence [ID] to hidden field
			//Source: http://www.trans4mind.com/personal_development/JavaScript2/select.htm /-- -->			
			//----------------------------------------------------------------------------------------------------------
		}
		
		
		function optionList10_SelectedIndex()
		{
			//----------------------------------------------------------------------------------------------------------
			/*HTML/JavaScript - Working with selectedIndex (select, options, selectedIndex, text, value)
			The selectedIndex number can be used to reference the selected option in the select list. 
			Note: It is case sensitive. 		
			Make sure to capitalize the "I" in selectedIndex
			* selectedIndex - The number (base 0) of the item that is selected in the select list
			* value - For an option, what's in the value attribute.
			  If the value attribute is not set, text should be returned [* refer below]
				  o val1 is the value in the following HTML example
				  o <option value="val1">sea one</option>
			* text - For an option, what's in between the option tags
				  o sea two is the text in the following HTML example
				  o <option value="val2">sea two</option>*/

			var selObj = document.getElementById('petime');
			//var txtIndexObj = document.getElementById('txtIndex');
			var hidden_petimeid_ValueObj = document.getElementById('hidden_petimeid');
			var hidden_petime_TextObj = document.getElementById('hidden_petime');
			
			var selIndex = selObj.selectedIndex;
			//txtIndexObj.value = selIndex;
			hidden_petimeid_ValueObj.value = selObj.options[selIndex].value;
			hidden_petime_TextObj.value = selObj.options[selIndex].text;
		
			//var form = document.forms[0]; --> Option B
			<!-- //Passing the data from the databse residence [ID] to hidden field
			//Source: http://www.trans4mind.com/personal_development/JavaScript2/select.htm /-- -->			
			//----------------------------------------------------------------------------------------------------------
		}
		
</script>	

<script language="javascript" >
	var form = document.forms[0];
	//purpose?: to retrieve what users last input on the field..
	form.psubcat.value = ("<?PHP echo $_POST['hidden_psubcat']; ?>");
	form.psem.value = ("<?PHP echo $_POST['hidden_psem']; ?>");
	
	//alert (form.pCityM.value);				
</script>