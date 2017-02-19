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
-->
</style>
</head>
<?php
include("../includes/session.php");
  require ("../includes/dbconnection.php");


if (isset($_POST['cmdSubmit'])) 
  	{ 		
		
		if (trim($_POST['pcourse']) == ""){ $flagcourse = 'Required Field.';}	
		if (trim($_POST['psub']) == ""){ $flagsub = 'Required Field.';}
		if (trim($_POST['pteacher']) == "")  { $flagteacher  = 'Required Field.';}
		if (trim($_POST['proom']) == "") { $flagroom = 'Required Field.';} 			
		if (trim($_POST['psem']) == ""){ $flagsem = 'Required Field.';}
		if (trim($_POST['psy']) == ""){ $flagsy= 'Required Field.';}
		if (trim($_POST['pday']) == ""){ $flagday = 'Required Field.';}
		if (trim($_POST['pstime']) == ""){ $flagstime = 'Required Field.';}
		if (trim($_POST['petime']) == ""){ $flagetime = 'Required Field.';}
		
		

if (($flagcourse == "") &&  ($flagsub == "")  && ($flagteacher == "")
 && ($flagroom == "") && ($flagsem == "") && ($flagsy == "") && ($flagday == "")&& ($flagstime == "") && ($flagetime == ""))
{

			
		 	$hidden_pcourse= $_POST['pcourse'];
			$hidden_psubcat= $_POST['psub'];
			$hidden_pt= $_POST['pteacher'];
			$hidden_proom= $_POST['proom'];
			$hidden_psem= $_POST['psem'];
			$hidden_psy= $_POST['psy'];
			$hidden_pday = $_POST['pday'];
			$hidden_pstime = $_POST['pstime'];
			$hidden_petime = $_POST['petime'];
			
			 $result = mysql_query("SELECT `sched`.*,`room`.`room_name` ,`course`.`course_yrSec`,`subjects`.`sub_name`,`profile`.`faculty_name` ,`timestart`.`time_s`,`timeend`.`time_e`,`day`.`day`,`school_yr`.`school_year` FROM `sched`,`room`,`course`,`subjects`,`profile`,`timestart`,`timeend` ,`day`,`school_yr`  		   WHERE sched.room_id=room.room_id and sched.course_id=course.course_id and sched.sub_id=subjects.sub_id and sched.teacher_id=profile.profile_no and sched.time_s_id=timestart.time_s_id and sched.time_e_id=timeend.time_e_id and sched.day_id=day.day_id 
 and sched.year_id=school_yr.year_id
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
			$pcourse = MYSQL_RESULT($result,$i,"course_yrSec");
			$psubcat = MYSQL_RESULT($result,$i,"sub_name");
			$pt = MYSQL_RESULT($result,$i,"faculty_name");
			$proom = MYSQL_RESULT($result,$i,"room_name");
			$psy = MYSQL_RESULT($result,$i,"school_year");
			$pday = MYSQL_RESULT($result,$i,"day");
			$pstime = MYSQL_RESULT($result,$i,"time_s");
			$petime= MYSQL_RESULT($result,$i,"time_e");  
			
			
			if ($hidden_proom = $proom and $hidden_pt =$pt and  $hidden_pday = $pday){
				echo "there a conflict";}
				else(mysql_query ("INSERT INTO sched(course_id, sub_id, teacher_id, room_id, sem_id, year_id, day_id, time_s_id, time_e_id)
					VALUES('$hidden_pcourse', '$hidden_psubcat','$hidden_pt','$hidden_proom','$hidden_psem','$hidden_psy','$hidden_pday','$hidden_pstime', '$hidden_petime')") or die(mysql_error())); {
			echo "Your file has been saved in the database..";
									 header(
				"Location: sched_list.php");
			
		$i++;		
		}
	}	

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
		    <strong>Add New Schedule</strong><br />
		    <br />		  
		    <br />
		    <table border="0" align="center">
              <tr  >
                <td colspan="4" ><div align="center" class="style2">
                    <div align="center" class="style5">Schedule</div>
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
				$result = mysql_query("SELECT * FROM profile ORDER BY faculty_name ");			  	
				do {  ?>
                    <option value="<?php echo $row['profile_no'];?>"><?php echo $row['faculty_name'];?> </option>
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
                  <select name="pday"  id="pday" style="width: 267px" onchange="javascript: return optionList7_SelectedIndex()">
                    <?php // source 1: http://www.dmxzone.com/showDetail.asp?NewsId=5102&TypeId=25
			  	// source 2: http://localhost/phpmyadmin/index.php?db=mydbase&token=651c0063e511c381c9c82ce1fe9b6854
				$result = mysql_query("SELECT * FROM day ORDER BY day");			  	
				do {  ?>
                    <option value="<?php echo $row['day_id'];?>"><?php echo $row['day'];?> </option>
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
                <td height="34" ><div align="right" class="style3">Ending Time </div></td>
                <td ><span class="style22">
                  <label>
                  <select name="petime"  id="petime" style="width: 267px" onchange="javascript: return optionList10_SelectedIndex()">
                    <?php // source 1: http://www.dmxzone.com/showDetail.asp?NewsId=5102&TypeId=25
			  	// source 2: http://localhost/phpmyadmin/index.php?db=mydbase&token=651c0063e511c381c9c82ce1fe9b6854
				$result = mysql_query("SELECT * FROM timeend ORDER BY time_e_id ");			  	
				do {  ?>
                    <option value="<?php echo $row['time_e_id'];?>"><?php echo $row['time_e'];?> </option>
                    <?php } while ($row = mysql_fetch_assoc($result)); ?>
                  </select>
                  <!-- 
			Setting up the correct combo box width alignment to table
			source: http://www.eskimo.com/~bloo/indexdot/html/topics/selectwidth.htm
		-->
                  <input type="hidden" id="hidden_petimeid" name="hidden_petimeid"  value="<?PHP echo trim($_POST['hidden_petimeid']); ?>" />
                  <input type="hidden" id="hidden_petime" name="hidden_petime" value="<?PHP echo trim($_POST['hidden_petime']); ?>"/>
                  </label>
                </span></td>
                <td><span class="style21"><span class="style20"><?php echo $flagetime; ?></span></span></td>
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
		  </div>
		  <p>&nbsp;</p>
		  </form>
		  <h1>&nbsp;</h1>
			
	</div>
		<div id="program"></div>
		<div id="right">
			<h2>&nbsp;</h2>
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
function optionList1_SelectedIndex()
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
			hidden_pdayid_TextObj.value = selObj.options[selIndex].text;
		
			//var form = document.forms[0]; --> Option B
			<!-- //Passing the data from the databse residence [ID] to hidden field
			//Source: http://www.trans4mind.com/personal_development/JavaScript2/select.htm /-- -->			
			//----------------------------------------------------------------------------------------------------------
		}
		
		
		
</script>	

<script language="javascript" >
	var form = document.forms[0];
	//purpose?: to retrieve what users last input on the field..
	form.pcourse.value = ("<?PHP echo $_POST['hidden_psubcat']; ?>");
	form.psy.value = ("<?PHP echo $_POST['hidden_psem']; ?>");
	form.psem.value = ("<?PHP echo $_POST['hidden_psem']; ?>");
	//alert (form.pCityM.value);				
</script>