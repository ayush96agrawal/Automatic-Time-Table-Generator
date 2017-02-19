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
.style31 {font-size: 14px}
-->
</style>
</head>
<?php
include("../includes/session.php");
 require ("../includes/dbconnection.php");

	$sched_id =$_REQUEST['sched_id'];
	$pT =$_REQUEST['pT'];
	$pSy =$_REQUEST['pSy'];
	$psem=$_REQUEST['psem'];
	
	$result =  mysql_query("SELECT * FROM sched WHERE sched_id = '$sched_id'");
	
/* $result = mysql_query("SELECT `sched`.*, `day`.`day_name`, `course`.`course_yrSec`, `room`.`room_name`,
 `timestart`.`time_s`, `subjects`.`sub_code`,`school_yr`.`school_year`, `profile`.`teacher_name`, sem.semester FROM `sched`,`room`,`course`,`subjects`,`profile`,`timestart` ,`day`,`school_yr`, sem  WHERE sched.room_id=room.room_id and sched.course_id=course.course_id and sched.sub_id=subjects.sub_id and sched.teacher_id=profile.teacher_id and sched.time_s_id=timestart.time_s_id and sched.day_id=day.day_id 
 and sched.year_id=school_yr.year_id and sched.sem_id=sem.sem_id and sched_id = '$sched_id' 
  			");
			*/
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
		
			$hidden_pcourse = MYSQL_RESULT($result,$i,"course_id");
			$hidden_psubcat = MYSQL_RESULT($result,$i,"sub_id");
			$hidden_pt = MYSQL_RESULT($result,$i,"teacher_id");
			$hidden_proom = MYSQL_RESULT($result,$i,"room_id");
			$hidden_psem = MYSQL_RESULT($result,$i,"sem_id");
			$hidden_psy = MYSQL_RESULT($result,$i,"year_id");
			$hidden_pday = MYSQL_RESULT($result,$i,"day_id");
			$hidden_pstime = MYSQL_RESULT($result,$i,"time_s_id");
			
			}
			
?>
<?php 
   if (isset($_POST['cmdSubmit'])) 
  	{ 		
		
		
		 	$hidden_pcoursea= $_POST['pcourse'];
			$hidden_psubcata= $_POST['psub'];
			$hidden_pta= $_POST['pteacher'];
			$hidden_prooma= $_POST['proom'];
			$hidden_psema= $_POST['psem'];
			$hidden_psya= $_POST['psy'];
			$hidden_pdaya = $_POST['pday'];
			$hidden_pstimea = $_POST['pstime'];
			

			$result = mysql_query ("SELECT * FROM sched")or die(mysql_error());
 
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
			
						$sched_id = MYSQL_RESULT($result,$i,"sched_id");
						$course = MYSQL_RESULT($result,$i,"course_id");
						$subcat = MYSQL_RESULT($result,$i,"sub_id");
						$teacher = MYSQL_RESULT($result,$i,"teacher_id");
						$room = MYSQL_RESULT($result,$i,"room_id");
						$sem = MYSQL_RESULT($result,$i,"sem_id");
						$sy = MYSQL_RESULT($result,$i,"year_id");
						$day = MYSQL_RESULT($result,$i,"day_id");
						$stime = MYSQL_RESULT($result,$i,"time_s_id");
		
					
					if (( $teacher == $hidden_pta or $room == $hidden_prooma or $course == $hidden_pcoursea) && ($day == $hidden_pdaya and  $stime == $hidden_pstimea and $sy == $hidden_psya and  $sem == $hidden_psema)){
			
			   $result = mysql_query("SELECT `sched`.*, `day`.`day_name`, `course`.`course_yrSec`, `room`.`room_name`,
 `timestart`.`time_s`, `subjects`.`sub_code`, `school_yr`.`school_year`, `profile`.`teacher_name` FROM `sched`,`room`,`course`,`subjects`,`profile`,`timestart` ,`day`,`school_yr`  WHERE sched.room_id=room.room_id and sched.course_id=course.course_id and sched.sub_id=subjects.sub_id and sched.teacher_id=profile.teacher_id and sched.time_s_id=timestart.time_s_id and sched.day_id=day.day_id 
 and sched.year_id=school_yr.year_id having sched_id = '$sched_id'
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
			
			$note = "* There is a conflict with the schedule of  $ateacher, <br> $acourse  at $aroom, $aday ,$astime with the subject $asubcat<br><br> ";
			$conflict = true;
			end;
			}
	$i++;	 
			}
			}

if ($conflict != true){ 
	
mysql_query ("UPDATE sched SET course_id = '$hidden_pcoursea', sub_id = '$hidden_psubcata', teacher_id = '$hidden_pta', room_id = '$hidden_prooma', sem_id = '$hidden_psema', year_id = '$hidden_psya', day_id = '$hidden_pdaya', time_s_id = '$hidden_pstimea' WHERE sched_id = '$sched_id'")
					 or die(mysql_error()); 
			 header(
			 		"Location: search_t_result.php?pT=". $pT
					."&pSy=". $pSy 
					."&psem=". $psem					
		 		   );	
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
		<form name="form1" method="post" >
		  <div align="center"><br />
		    <strong>Edit Schedule</strong><br />
		    <br />		  
		    <div id="layer">
              <div align="justify" class="style31">
                <div align="center"><?php echo $note;?></div>
              </div>
		      <div align="center"></div>
	        </div>
		    <br />
		    <table border="0" align="center">
              <tr  >
                <td colspan="4" ><div align="center" class="style2">
                    <div align="center" class="style5"></div>
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
				$result = mysql_query("SELECT * FROM course ORDER BY course_yrSec ");			  	
				do {  ?>
                    <option value="<?php echo $row['course_id'];?>"><?php echo $row['course_yrSec'];?> </option>
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
				$result = mysql_query("SELECT * FROM subjects ORDER BY sub_code ");			  	
				do {  ?>
                    <option value="<?php echo $row['sub_id'];?>"><?php echo $row['sub_code'];?> </option>
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
				$result = mysql_query("SELECT * FROM profile ORDER BY teacher_name ");			  	
				do {  ?>
                    <option value="<?php echo $row['teacher_id'];?>"><?php echo $row['teacher_name'];?> </option>
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
                    <option value="<?php echo $row['room_id'];?>"><?php echo $row['room_name'];?> </option>
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
                    <option value="<?php echo $row['sem_id'];?>"><?php echo $row['semester'];?> </option>
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
                    <option value="<?php echo $row['year_id'];?>"><?php echo $row['school_year'];?> </option>
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
                  <label><!-- 
			Setting up the correct combo box width alignment to table
			source: http://www.eskimo.com/~bloo/indexdot/html/topics/selectwidth.htm
		-->
                  <select name="pday"  id="pday" style="width: 267px" onchange="javascript: return optionList8_SelectedIndex()">
                    <?php // source 1: http://www.dmxzone.com/showDetail.asp?NewsId=5102&TypeId=25
			  	// source 2: http://localhost/phpmyadmin/index.php?db=mydbase&token=651c0063e511c381c9c82ce1fe9b6854
				$result = mysql_query("SELECT * FROM day ORDER BY day_id");			  	
				do {  ?>
                    <option value="<?php echo $row['day_id'];?>"><?php echo $row['day_name'];?> </option>
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
                    <option value="<?php echo $row['time_s_id'];?>"><?php echo $row['time_s'];?> </option>
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
                  <input type="submit" name="cmdSubmit" value="Submit" > 
                  &nbsp;
                  <input type="submit" name="cmdClear" value="Clear" />
                </span></div></td>
                <td>&nbsp;</td>
              </tr>
              <tr>
                <td colspan="4"><div align="center"></div></td>
              </tr>
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
		  <p align="center"><span class="style4"><a href="help.html">Help</a> |<a href="developer.html"> Developer</a>| <a href="scheduling_system.html">Scheduling System</a>| <a href="contact.html">Contact Us</a>| <a href="www.chmsc.edu.ph">CHMSC </a></span></p>
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
	form.pcourse.value = ("<?php echo $hidden_pcourse; ?>");
	form.psub.value = ("<?php echo $hidden_psubcat ; ?>");
	form.pteacher.value = ("<?php echo $hidden_pt; ?>");
	form.proom.value = ("<?php echo $hidden_proom; ?>");
	form.psem.value = ("<?php echo $hidden_psem; ?>");
	form.psy.value = ("<?php echo $hidden_psy ; ?>");
	form.pday.value = ("<?php echo $hidden_pday; ?>");
	form.pstime.value = ("<?php echo $hidden_pstime; ?>");
	
	//alert (form.pCityM.value);				
</script>