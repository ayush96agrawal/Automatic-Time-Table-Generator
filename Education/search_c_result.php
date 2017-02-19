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
.style31 {color: #330099}
.style32 {	font-size: 16px;
	font-weight: bold;
}
.style1 {font-family: Verdana, Arial, Helvetica, sans-serif}
.style12 {font-family: Verdana, Arial, Helvetica, sans-serif; font-size: 14px; }
.style15 {font-size: 13px; font-family: Verdana, Arial, Helvetica, sans-serif; }
-->
</style>
</head>
<?php
   include("../includes/session.php");
  require ("../includes/dbconnection.php");

			$pCourse =$_REQUEST['pCourse'];
			$pSy =$_REQUEST['pSy'];
			$psem=$_REQUEST['psem'];

			if (isset($_POST['cmdSubmit'])) 
  	{ 		
		
			 header(
			 		"Location: course_result.php?pCourse=". $pCourse
					."&pSy=". $pSy 
					."&psem=". $psem					
		 		   );				   				   
			}
?>
<body>
<div id="container">
  <div id="header">
    <img src="../images/logo copy.jpg" alt="s" width="717" height="160" />
    <div id="logo_w2"></div>
    <ul class="cssMenu cssMenum">
	<li class=" cssMenui"><a class="  cssMenui" href="index.php"><img src="../images/homepage.gif" />Home</a></li>
	<li class=" cssMenui"><a class="  cssMenui" href="#"><span>Search</span><![if gt IE 6]></a><![endif]><!--[if lte IE 6]><table><tr><td><![endif]-->
	<ul class=" cssMenum">
		<li class=" cssMenui"><a class="  cssMenui" href="search_teacher.php"><img src="../images/User (1).ico" />Teacher Schedule</a></li>
		<li class=" cssMenui"><a class="  cssMenui" href="search_course.php"><img src="../images/user-group.ico" /> Student Schedule</a></li>
		<li class=" cssMenui"><a class="  cssMenui" href="search_room.php"><img src="../images/school-icon.png" />Room Schedule</a></li>
	</ul>
	<!--[if lte IE 6]></td></tr></table></a><![endif]--></li>
	<li class=" cssMenui"><a class="  cssMenui" href="#"><span>Add entry</span><![if gt IE 6]></a><![endif]><!--[if lte IE 6]><table><tr><td><![endif]-->
	<ul class=" cssMenum">
		<li class=" cssMenui"><a class="  cssMenui" href="faculty-educ.php"><span><img src="../images/User (1).ico" />Teacher</span><![if gt IE 6]></a><![endif]><!--[if lte IE 6]><table><tr><td><![endif]-->
		<ul class=" cssMenum">
			<li class=" cssMenui"><a class="  cssMenui" href="faculty-educ.php"><img src="../images/folder-new.ico" />Add</a></li>
			<li class=" cssMenui"><a class="  cssMenui" href="facultylist-educ.php"><img src="../images/folder.ico" />View</a></li>
		</ul>
		<!--[if lte IE 6]></td></tr></table></a><![endif]--></li>
		<li class=" cssMenui"><a class="  cssMenui" href="student-educ.php"><span><img src="../images/courses.JPG" />Course</span><![if gt IE 6]></a><![endif]><!--[if lte IE 6]><table><tr><td><![endif]-->
		<ul class=" cssMenum">
			<li class=" cssMenui"><a class="  cssMenui" href="student-educ.php"><img src="../images/folder-new.ico" />Add</a></li>
			<li class=" cssMenui"><a class="  cssMenui" href="student-list-educ.php"><img src="../images/folder.ico" />View</a></li>
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
	<li class=" cssMenui"><a class="  cssMenui" href="help.php">Help</a></li>

	<li class=" cssMenui"><a class="  cssMenui" href="logout.php">Log out</a></li>
</ul>

  </div>
  <div id="content">
	
	<div id="left">
	  <form name="form1" method="post" >
	    <div align="center"><br />
	      <p align="center" ><span class="style32">Schedule of Class </span>
            <?php
				$pCourse =$_REQUEST['pCourse'];
				$result = mysql_query("SELECT * FROM course HAVING course_id='$pCourse'");
				
if (!$result) 
		{
		die("Query to show fields from table failed");
		}
			$numberOfRows = MYSQL_NUMROWS($result);
	
			If ($numberOfRows == 0) 
				{
			//echo 'Sorry No Record Found!';
				}
			else if ($numberOfRows > 0) 
				{
				$i=0;
			
			$course = MYSQL_RESULT($result,$i,"course_yrSec");
				
				
				}
				
				?>
          </p>
          <table width="630" border="0" align="center">
            <tr>
              <td height="50"><span class="style32">Course:</span></td>
              <td colspan="6"><span class="style32"><?php echo $course; ?></span></td>
            </tr>
            <tr>
              <td>Subject</td>
              <td >Teacher</td>
              <td >Room</td>
              <td>Day </td>
              <td >Starting time</td>
              <td >SY</td>
              <td >&nbsp;</td>
              <?php
		 
			$pCourse =$_REQUEST['pCourse'];
			$pSy =$_REQUEST['pSy'];
			$psem=$_REQUEST['psem'];

			$result = mysql_query("SELECT `sched`.*,`room`.`room_name` ,`course`.`course_yrSec`,`subjects`.`sub_code`,`profile`.`teacher_name` ,`timestart`.`time_s`,`day`.`day_name`,`school_yr`.`school_year` FROM `sched`,`room`,`course`,`subjects`,`profile`,`timestart`,`day`,`school_yr`  WHERE sched.room_id=room.room_id and sched.course_id=course.course_id and sched.sub_id=subjects.sub_id and sched.teacher_id=profile.teacher_id and sched.time_s_id=timestart.time_s_id and sched.day_id=day.day_id 
 and sched.year_id=school_yr.year_id HAVING course_id='$pCourse' and sem_id='$psem' and year_id='$pSy' and dept_id = 1");
			//HAVING course_id='$pCourse' and sem_id='$psem' and year_id='$pSy'
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
					$hidden_psubcat = MYSQL_RESULT($result,$i,"sub_code");
					$hidden_pt = MYSQL_RESULT($result,$i,"teacher_name");
					$hidden_proom = MYSQL_RESULT($result,$i,"room_name");
					$hidden_psy = MYSQL_RESULT($result,$i,"school_year");
					$hidden_pday = MYSQL_RESULT($result,$i,"day_name");
					$hidden_pstime = MYSQL_RESULT($result,$i,"time_s");
		?>
            </tr>
            <tr bgcolor="<?php echo $bgcolor; ?>">
              <td nowrap="nowrap" bgcolor="#F3FCC5"><?php echo $hidden_psubcat; ?>&nbsp;&nbsp;&nbsp;</td>
              <td nowrap="nowrap" bgcolor="#CCE39B"><?php echo $hidden_pt; ?>&nbsp;&nbsp;&nbsp;</td>
              <td nowrap="nowrap" bgcolor="#C5F0FA"><?php echo $hidden_proom; ?>&nbsp;&nbsp;&nbsp;</td>
              <td nowrap="nowrap" bgcolor="#F4DEF8"><?php echo $hidden_pday; ?>&nbsp;&nbsp;&nbsp;</td>
              <td nowrap="nowrap" bgcolor="#E9D0BA"><?php echo $hidden_pstime; ?>&nbsp;&nbsp;&nbsp;</td>
              <td nowrap="nowrap" bgcolor="#8CC695"><?php echo $hidden_psy ; ?>&nbsp;&nbsp;&nbsp;</td>
              <td><a href="sched_c_del.php?sched_id=<?php echo $sched_id; ?>&amp;pCourse=<?php echo $pCourse; ?>&amp;pSy=<?php echo $pSy; ?>&amp;psem=<?php echo $psem; ?>"> <img src='../images/b_drop.png' alt="delete record" width="16" height="16" border="0" onclick="return confirm('<?php echo "Are you sure you want to delete file #". $sched_id. "?"; ?>');" /></a></td>
            </tr>
            <?php 	
			
			$i++;		
			}
			}
		
	
	?>
            <?php
		 
			$pCourse =$_REQUEST['pCourse'];
			$pSy =$_REQUEST['pSy'];
			$psem=$_REQUEST['psem'];

			$result = mysql_query("SELECT `sched`.*,`room`.`room_name` ,`course`.`course_yrSec`,`subjects`.`sub_code`,`profile`.`teacher_name` ,`timestart`.`time_s`,`day`.`day_name`,`school_yr`.`school_year` FROM `sched`,`room`,`course`,`subjects`,`profile`,`timestart`,`day`,`school_yr`  WHERE sched.room_id=room.room_id and sched.course_id=course.course_id and sched.sub_id=subjects.sub_id and sched.teacher_id=profile.teacher_id and sched.time_s_id=timestart.time_s_id and sched.day_id=day.day_id 
 and sched.year_id=school_yr.year_id HAVING course_id='$pCourse' and sem_id='$psem' and year_id='$pSy' and dept_id = 3");
			//HAVING course_id='$pCourse' and sem_id='$psem' and year_id='$pSy'
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
					$hidden_psubcat = MYSQL_RESULT($result,$i,"sub_code");
					$hidden_pt = MYSQL_RESULT($result,$i,"teacher_name");
					$hidden_proom = MYSQL_RESULT($result,$i,"room_name");
					$hidden_psy = MYSQL_RESULT($result,$i,"school_year");
					$hidden_pday = MYSQL_RESULT($result,$i,"day_name");
					$hidden_pstime = MYSQL_RESULT($result,$i,"time_s");
		?>
            <tr bgcolor="<?php echo $bgcolor; ?>">
              <td nowrap="nowrap" bgcolor="#F3FCC5"><?php echo $hidden_psubcat; ?>&nbsp;&nbsp;&nbsp;</td>
              <td nowrap="nowrap" bgcolor="#CCE39B"><?php echo $hidden_pt; ?>&nbsp;&nbsp;&nbsp;</td>
              <td nowrap="nowrap" bgcolor="#C5F0FA"><?php echo $hidden_proom; ?>&nbsp;&nbsp;&nbsp;</td>
              <td nowrap="nowrap" bgcolor="#F4DEF8"><?php echo $hidden_pday; ?>&nbsp;&nbsp;&nbsp;</td>
              <td nowrap="nowrap" bgcolor="#E9D0BA"><?php echo $hidden_pstime; ?>&nbsp;&nbsp;&nbsp;</td>
              <td nowrap="nowrap" bgcolor="#8CC695"><?php echo $hidden_psy ; ?>&nbsp;&nbsp;&nbsp;</td>
            </tr>
            <?php 	
			
			$i++;		
			}
			}
		
	
	?>
            <?php
		 
			$pCourse =$_REQUEST['pCourse'];
			$pSy =$_REQUEST['pSy'];
			$psem=$_REQUEST['psem'];

			$result = mysql_query("SELECT `sched`.*,`room`.`room_name` ,`course`.`course_yrSec`,`subjects`.`sub_code`,`profile`.`teacher_name` ,`timestart`.`time_s`,`day`.`day_name`,`school_yr`.`school_year` FROM `sched`,`room`,`course`,`subjects`,`profile`,`timestart`,`day`,`school_yr`  WHERE sched.room_id=room.room_id and sched.course_id=course.course_id and sched.sub_id=subjects.sub_id and sched.teacher_id=profile.teacher_id and sched.time_s_id=timestart.time_s_id and sched.day_id=day.day_id 
 and sched.year_id=school_yr.year_id HAVING course_id='$pCourse' and sem_id='$psem' and year_id='$pSy' and dept_id = 2");
			//HAVING course_id='$pCourse' and sem_id='$psem' and year_id='$pSy'
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
					$hidden_psubcat = MYSQL_RESULT($result,$i,"sub_code");
					$hidden_pt = MYSQL_RESULT($result,$i,"teacher_name");
					$hidden_proom = MYSQL_RESULT($result,$i,"room_name");
					$hidden_psy = MYSQL_RESULT($result,$i,"school_year");
					$hidden_pday = MYSQL_RESULT($result,$i,"day_name");
					$hidden_pstime = MYSQL_RESULT($result,$i,"time_s");
		?>
            <tr bgcolor="<?php echo $bgcolor; ?>">
              <td nowrap="nowrap" bgcolor="#F3FCC5"><?php echo $hidden_psubcat; ?>&nbsp;&nbsp;&nbsp;</td>
              <td nowrap="nowrap" bgcolor="#CCE39B"><?php echo $hidden_pt; ?>&nbsp;&nbsp;&nbsp;</td>
              <td nowrap="nowrap" bgcolor="#C5F0FA"><?php echo $hidden_proom; ?>&nbsp;&nbsp;&nbsp;</td>
              <td nowrap="nowrap" bgcolor="#F4DEF8"><?php echo $hidden_pday; ?>&nbsp;&nbsp;&nbsp;</td>
              <td nowrap="nowrap" bgcolor="#E9D0BA"><?php echo $hidden_pstime; ?>&nbsp;&nbsp;&nbsp;</td>
              <td nowrap="nowrap" bgcolor="#8CC695"><?php echo $hidden_psy ; ?>&nbsp;&nbsp;&nbsp;</td>
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
              <td></td>
            </tr>
          </table>
          <p>&nbsp;</p>
<table width="710" border="1" align="center">
  <tr>
    <td width="102"><div align="center" class="style1">TIME</div></td>
    <td width="118"><div align="center" class="style1">MONDAY</div></td>
    <td width="119"><div align="center" class="style1">TUESDAY</div></td>
    <td width="115"><div align="center" class="style1">WEDNESDAY</div></td>
    <td width="119"><div align="center" class="style1">THURSDAY</div></td>
    <td width="110"><div align="center" class="style1">FRIDAY</div></td>
  </tr>
  <tr>
    <td><div align="center" class="style15">7:30 - 8:30 <br />
      &nbsp;&nbsp; </div></td>
    <td><div align="center" class="style12">
      <?php
			$pCourse =$_REQUEST['pCourse'];
			$pSy =$_REQUEST['pSy'];
			$psem=$_REQUEST['psem'];

			$result = mysql_query("SELECT `sched`.*,`room`.`room_name` ,`course`.`course_yrSec`,`subjects`.`sub_code`,`profile`.`teacher_name`,`school_yr`.`school_year` FROM `sched`,`room`,`course`,`subjects`,`profile` ,`school_yr`  WHERE sched.room_id=room.room_id and sched.course_id=course.course_id and sched.sub_id=subjects.sub_id and sched.teacher_id=profile.teacher_id
 and sched.year_id=school_yr.year_id HAVING course_id='$pCourse' and sem_id='$psem' and year_id='$pSy'
  			");
			//HAVING course_id='$pCourse' and sem_id='$psem' and year_id='$pSy'
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

					$hidden_psubcat = MYSQL_RESULT($result,$i,"sub_code");
					$hidden_pcourse = MYSQL_RESULT($result,$i,"course_yrSec");
					$hidden_proom = MYSQL_RESULT($result,$i,"room_name");
					$hidden_pt = MYSQL_RESULT($result,$i,"teacher_name");
					$hidden_pday = MYSQL_RESULT($result,$i,"day_id");
					$hidden_pstime = MYSQL_RESULT($result,$i,"time_s_id");
			 
			 if ($hidden_pday == 1 && $hidden_pstime == 1){	
			  		echo $hidden_psubcat . '<br>'.$hidden_pt . '<br>'.$hidden_proom;
					end;
						}
						
	$i++;	 
			}
			} ?>
    </div></td>
    <td><div align="center" class="style12">
      <?php
			$pCourse =$_REQUEST['pCourse'];
			$pSy =$_REQUEST['pSy'];
			$psem=$_REQUEST['psem'];

			$result = mysql_query("SELECT `sched`.*,`room`.`room_name` ,`course`.`course_yrSec`,`subjects`.`sub_code`,`profile`.`teacher_name`,`school_yr`.`school_year` FROM `sched`,`room`,`course`,`subjects`,`profile` ,`school_yr`  WHERE sched.room_id=room.room_id and sched.course_id=course.course_id and sched.sub_id=subjects.sub_id and sched.teacher_id=profile.teacher_id
 and sched.year_id=school_yr.year_id HAVING course_id='$pCourse' and sem_id='$psem' and year_id='$pSy'
  			");
			//HAVING course_id='$pCourse' and sem_id='$psem' and year_id='$pSy'
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

					$hidden_psubcat = MYSQL_RESULT($result,$i,"sub_code");
					$hidden_pcourse = MYSQL_RESULT($result,$i,"course_yrSec");
					$hidden_proom = MYSQL_RESULT($result,$i,"room_name");
					$hidden_pt = MYSQL_RESULT($result,$i,"teacher_name");
					$hidden_pday = MYSQL_RESULT($result,$i,"day_id");
					$hidden_pstime = MYSQL_RESULT($result,$i,"time_s_id");
			 
			 if ($hidden_pday == 2 && $hidden_pstime == 1){	
			  		echo $hidden_psubcat . '<br>'.$hidden_pt . '<br>'.$hidden_proom;
					end;
						}
						
	$i++;	 
			}
			} ?>
    </div></td>
    <td><div align="center" class="style12">
      <?php
			$pCourse =$_REQUEST['pCourse'];
			$pSy =$_REQUEST['pSy'];
			$psem=$_REQUEST['psem'];

			$result = mysql_query("SELECT `sched`.*,`room`.`room_name` ,`course`.`course_yrSec`,`subjects`.`sub_code`,`profile`.`teacher_name`,`school_yr`.`school_year` FROM `sched`,`room`,`course`,`subjects`,`profile` ,`school_yr`  WHERE sched.room_id=room.room_id and sched.course_id=course.course_id and sched.sub_id=subjects.sub_id and sched.teacher_id=profile.teacher_id
 and sched.year_id=school_yr.year_id HAVING course_id='$pCourse' and sem_id='$psem' and year_id='$pSy'
  			");
			//HAVING course_id='$pCourse' and sem_id='$psem' and year_id='$pSy'
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

					$hidden_psubcat = MYSQL_RESULT($result,$i,"sub_code");
					$hidden_pcourse = MYSQL_RESULT($result,$i,"course_yrSec");
					$hidden_proom = MYSQL_RESULT($result,$i,"room_name");
					$hidden_pt = MYSQL_RESULT($result,$i,"teacher_name");
					$hidden_pday = MYSQL_RESULT($result,$i,"day_id");
					$hidden_pstime = MYSQL_RESULT($result,$i,"time_s_id");
			 
			 if ($hidden_pday == 3 && $hidden_pstime == 1){	
			  		echo $hidden_psubcat . '<br>'.$hidden_pt . '<br>'.$hidden_proom;
					end;
						}
						
	$i++;	 
			}
			} ?>
    </div></td>
    <td><div align="center" class="style12">
      <?php
			$pCourse =$_REQUEST['pCourse'];
			$pSy =$_REQUEST['pSy'];
			$psem=$_REQUEST['psem'];

			$result = mysql_query("SELECT `sched`.*,`room`.`room_name` ,`course`.`course_yrSec`,`subjects`.`sub_code`,`profile`.`teacher_name`,`school_yr`.`school_year` FROM `sched`,`room`,`course`,`subjects`,`profile` ,`school_yr`  WHERE sched.room_id=room.room_id and sched.course_id=course.course_id and sched.sub_id=subjects.sub_id and sched.teacher_id=profile.teacher_id
 and sched.year_id=school_yr.year_id HAVING course_id='$pCourse' and sem_id='$psem' and year_id='$pSy'
  			");
			//HAVING course_id='$pCourse' and sem_id='$psem' and year_id='$pSy'
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

					$hidden_psubcat = MYSQL_RESULT($result,$i,"sub_code");
					$hidden_pcourse = MYSQL_RESULT($result,$i,"course_yrSec");
					$hidden_proom = MYSQL_RESULT($result,$i,"room_name");
					$hidden_pt = MYSQL_RESULT($result,$i,"teacher_name");
					$hidden_pday = MYSQL_RESULT($result,$i,"day_id");
					$hidden_pstime = MYSQL_RESULT($result,$i,"time_s_id");
			 
			 if ($hidden_pday == 4 && $hidden_pstime == 1){	
			  		echo $hidden_psubcat . '<br>'.$hidden_pt . '<br>'.$hidden_proom;
					end;
						}
						
	$i++;	 
			}
			} ?>
    </div></td>
    <td><div align="center" class="style12">
      <?php
			$pCourse =$_REQUEST['pCourse'];
			$pSy =$_REQUEST['pSy'];
			$psem=$_REQUEST['psem'];

			$result = mysql_query("SELECT `sched`.*,`room`.`room_name` ,`course`.`course_yrSec`,`subjects`.`sub_code`,`profile`.`teacher_name`,`school_yr`.`school_year` FROM `sched`,`room`,`course`,`subjects`,`profile` ,`school_yr`  WHERE sched.room_id=room.room_id and sched.course_id=course.course_id and sched.sub_id=subjects.sub_id and sched.teacher_id=profile.teacher_id
 and sched.year_id=school_yr.year_id HAVING course_id='$pCourse' and sem_id='$psem' and year_id='$pSy'
  			");
			//HAVING course_id='$pCourse' and sem_id='$psem' and year_id='$pSy'
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

					$hidden_psubcat = MYSQL_RESULT($result,$i,"sub_code");
					$hidden_pcourse = MYSQL_RESULT($result,$i,"course_yrSec");
					$hidden_proom = MYSQL_RESULT($result,$i,"room_name");
					$hidden_pt = MYSQL_RESULT($result,$i,"teacher_name");
					$hidden_pday = MYSQL_RESULT($result,$i,"day_id");
					$hidden_pstime = MYSQL_RESULT($result,$i,"time_s_id");
			 
			 if ($hidden_pday == 5 && $hidden_pstime == 1){	
			  		echo $hidden_psubcat . '<br>'.$hidden_pt . '<br>'.$hidden_proom;
					end;
						}
						
	$i++;	 
			}
			} ?>
    </div></td>
  </tr>
  <tr>
    <td><div align="center" class="style15">8:30 - 9:30 <br />
      &nbsp;&nbsp; </div></td>
    <td><div align="center" class="style12">
      <?php
			$pCourse =$_REQUEST['pCourse'];
			$pSy =$_REQUEST['pSy'];
			$psem=$_REQUEST['psem'];

			$result = mysql_query("SELECT `sched`.*,`room`.`room_name` ,`course`.`course_yrSec`,`subjects`.`sub_code`,`profile`.`teacher_name`,`school_yr`.`school_year` FROM `sched`,`room`,`course`,`subjects`,`profile` ,`school_yr`  WHERE sched.room_id=room.room_id and sched.course_id=course.course_id and sched.sub_id=subjects.sub_id and sched.teacher_id=profile.teacher_id
 and sched.year_id=school_yr.year_id HAVING course_id='$pCourse' and sem_id='$psem' and year_id='$pSy'
  			");
			//HAVING course_id='$pCourse' and sem_id='$psem' and year_id='$pSy'
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

					$hidden_psubcat = MYSQL_RESULT($result,$i,"sub_code");
					$hidden_pcourse = MYSQL_RESULT($result,$i,"course_yrSec");
					$hidden_proom = MYSQL_RESULT($result,$i,"room_name");
					$hidden_pt = MYSQL_RESULT($result,$i,"teacher_name");
					$hidden_pday = MYSQL_RESULT($result,$i,"day_id");
					$hidden_pstime = MYSQL_RESULT($result,$i,"time_s_id");
			 
			 if ($hidden_pday == 1 && $hidden_pstime == 3){	
			  		echo $hidden_psubcat . '<br>'.$hidden_pt . '<br>'.$hidden_proom;
					end;
						}
						
	$i++;	 
			}
			} ?>
      &nbsp;</div></td>
    <td><div align="center" class="style12">
      <?php
			$pCourse =$_REQUEST['pCourse'];
			$pSy =$_REQUEST['pSy'];
			$psem=$_REQUEST['psem'];

			$result = mysql_query("SELECT `sched`.*,`room`.`room_name` ,`course`.`course_yrSec`,`subjects`.`sub_code`,`profile`.`teacher_name`,`school_yr`.`school_year` FROM `sched`,`room`,`course`,`subjects`,`profile` ,`school_yr`  WHERE sched.room_id=room.room_id and sched.course_id=course.course_id and sched.sub_id=subjects.sub_id and sched.teacher_id=profile.teacher_id
 and sched.year_id=school_yr.year_id HAVING course_id='$pCourse' and sem_id='$psem' and year_id='$pSy'
  			");
			//HAVING course_id='$pCourse' and sem_id='$psem' and year_id='$pSy'
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

					$hidden_psubcat = MYSQL_RESULT($result,$i,"sub_code");
					$hidden_pcourse = MYSQL_RESULT($result,$i,"course_yrSec");
					$hidden_proom = MYSQL_RESULT($result,$i,"room_name");
					$hidden_pt = MYSQL_RESULT($result,$i,"teacher_name");
					$hidden_pday = MYSQL_RESULT($result,$i,"day_id");
					$hidden_pstime = MYSQL_RESULT($result,$i,"time_s_id");
			 
			 if ($hidden_pday ==2 && $hidden_pstime == 3){	
			  		echo $hidden_psubcat . '<br>'.$hidden_pt . '<br>'.$hidden_proom;
					end;
						}
						
	$i++;	 
			}
			} ?>
    </div></td>
    <td><div align="center" class="style12">
      <?php
			$pCourse =$_REQUEST['pCourse'];
			$pSy =$_REQUEST['pSy'];
			$psem=$_REQUEST['psem'];

			$result = mysql_query("SELECT `sched`.*,`room`.`room_name` ,`course`.`course_yrSec`,`subjects`.`sub_code`,`profile`.`teacher_name`,`school_yr`.`school_year` FROM `sched`,`room`,`course`,`subjects`,`profile` ,`school_yr`  WHERE sched.room_id=room.room_id and sched.course_id=course.course_id and sched.sub_id=subjects.sub_id and sched.teacher_id=profile.teacher_id
 and sched.year_id=school_yr.year_id HAVING course_id='$pCourse' and sem_id='$psem' and year_id='$pSy'
  			");
			//HAVING course_id='$pCourse' and sem_id='$psem' and year_id='$pSy'
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

					$hidden_psubcat = MYSQL_RESULT($result,$i,"sub_code");
					$hidden_pcourse = MYSQL_RESULT($result,$i,"course_yrSec");
					$hidden_proom = MYSQL_RESULT($result,$i,"room_name");
					$hidden_pt = MYSQL_RESULT($result,$i,"teacher_name");
					$hidden_pday = MYSQL_RESULT($result,$i,"day_id");
					$hidden_pstime = MYSQL_RESULT($result,$i,"time_s_id");
			 
			 if ($hidden_pday == 3 && $hidden_pstime == 3){	
			  		echo $hidden_psubcat . '<br>'.$hidden_pt . '<br>'.$hidden_proom;
					end;
						}
						
	$i++;	 
			}
			} ?>
    </div></td>
    <td><div align="center" class="style12">
      <?php
			$pCourse =$_REQUEST['pCourse'];
			$pSy =$_REQUEST['pSy'];
			$psem=$_REQUEST['psem'];

			$result = mysql_query("SELECT `sched`.*,`room`.`room_name` ,`course`.`course_yrSec`,`subjects`.`sub_code`,`profile`.`teacher_name`,`school_yr`.`school_year` FROM `sched`,`room`,`course`,`subjects`,`profile` ,`school_yr`  WHERE sched.room_id=room.room_id and sched.course_id=course.course_id and sched.sub_id=subjects.sub_id and sched.teacher_id=profile.teacher_id
 and sched.year_id=school_yr.year_id HAVING course_id='$pCourse' and sem_id='$psem' and year_id='$pSy'
  			");
			//HAVING course_id='$pCourse' and sem_id='$psem' and year_id='$pSy'
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

					$hidden_psubcat = MYSQL_RESULT($result,$i,"sub_code");
					$hidden_pcourse = MYSQL_RESULT($result,$i,"course_yrSec");
					$hidden_proom = MYSQL_RESULT($result,$i,"room_name");
					$hidden_pt = MYSQL_RESULT($result,$i,"teacher_name");
					$hidden_pday = MYSQL_RESULT($result,$i,"day_id");
					$hidden_pstime = MYSQL_RESULT($result,$i,"time_s_id");
			 
			 if ($hidden_pday == 4 && $hidden_pstime == 3){	
			  		echo $hidden_psubcat . '<br>'.$hidden_pt . '<br>'.$hidden_proom;
					end;
						}
						
	$i++;	 
			}
			} ?>
    </div></td>
    <td><div align="center" class="style12">
      <?php
			 $pCourse =$_REQUEST['pCourse'];
			$pSy =$_REQUEST['pSy'];
			$psem=$_REQUEST['psem'];

			$result = mysql_query("SELECT `sched`.*,`room`.`room_name` ,`course`.`course_yrSec`,`subjects`.`sub_code`,`profile`.`teacher_name`,`school_yr`.`school_year` FROM `sched`,`room`,`course`,`subjects`,`profile` ,`school_yr`  WHERE sched.room_id=room.room_id and sched.course_id=course.course_id and sched.sub_id=subjects.sub_id and sched.teacher_id=profile.teacher_id
 and sched.year_id=school_yr.year_id HAVING course_id='$pCourse' and sem_id='$psem' and year_id='$pSy'
  			");
			//HAVING course_id='$pCourse' and sem_id='$psem' and year_id='$pSy'
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

					$hidden_psubcat = MYSQL_RESULT($result,$i,"sub_code");
					$hidden_pcourse = MYSQL_RESULT($result,$i,"course_yrSec");
					$hidden_proom = MYSQL_RESULT($result,$i,"room_name");
					$hidden_pt = MYSQL_RESULT($result,$i,"teacher_name");
					$hidden_pday = MYSQL_RESULT($result,$i,"day_id");
					$hidden_pstime = MYSQL_RESULT($result,$i,"time_s_id");
			 
			 if ($hidden_pday == 5 && $hidden_pstime == 3){	
			  		echo $hidden_psubcat . '<br>'.$hidden_pt . '<br>'.$hidden_proom;
					end;
						}
						
	$i++;	 
			}
			} ?>
    </div></td>
  </tr>
  <tr>
    <td><div align="center" class="style15">9:30 - 10:30 <br />
      &nbsp;&nbsp; </div></td>
    <td><div align="center" class="style12">
      <?php
			$pCourse =$_REQUEST['pCourse'];
			$pSy =$_REQUEST['pSy'];
			$psem=$_REQUEST['psem'];

			$result = mysql_query("SELECT `sched`.*,`room`.`room_name` ,`course`.`course_yrSec`,`subjects`.`sub_code`,`profile`.`teacher_name`,`school_yr`.`school_year` FROM `sched`,`room`,`course`,`subjects`,`profile` ,`school_yr`  WHERE sched.room_id=room.room_id and sched.course_id=course.course_id and sched.sub_id=subjects.sub_id and sched.teacher_id=profile.teacher_id
 and sched.year_id=school_yr.year_id HAVING course_id='$pCourse' and sem_id='$psem' and year_id='$pSy'
  			");
			//HAVING course_id='$pCourse' and sem_id='$psem' and year_id='$pSy'
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

					$hidden_psubcat = MYSQL_RESULT($result,$i,"sub_code");
					$hidden_pcourse = MYSQL_RESULT($result,$i,"course_yrSec");
					$hidden_proom = MYSQL_RESULT($result,$i,"room_name");
					$hidden_pt = MYSQL_RESULT($result,$i,"teacher_name");
					$hidden_pday = MYSQL_RESULT($result,$i,"day_id");
					$hidden_pstime = MYSQL_RESULT($result,$i,"time_s_id");
			 
			 if ($hidden_pday == 1 && $hidden_pstime == 5){	
			  		echo $hidden_psubcat . '<br>'.$hidden_pt . '<br>'.$hidden_proom;
					end;
						}
						
	$i++;	 
			}
			} ?>
    </div></td>
    <td><div align="center" class="style12">
      <?php
			$pCourse =$_REQUEST['pCourse'];
			$pSy =$_REQUEST['pSy'];
			$psem=$_REQUEST['psem'];

			$result = mysql_query("SELECT `sched`.*,`room`.`room_name` ,`course`.`course_yrSec`,`subjects`.`sub_code`,`profile`.`teacher_name`,`school_yr`.`school_year` FROM `sched`,`room`,`course`,`subjects`,`profile` ,`school_yr`  WHERE sched.room_id=room.room_id and sched.course_id=course.course_id and sched.sub_id=subjects.sub_id and sched.teacher_id=profile.teacher_id
 and sched.year_id=school_yr.year_id HAVING course_id='$pCourse' and sem_id='$psem' and year_id='$pSy'
  			");
			//HAVING course_id='$pCourse' and sem_id='$psem' and year_id='$pSy'
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

					$hidden_psubcat = MYSQL_RESULT($result,$i,"sub_code");
					$hidden_pcourse = MYSQL_RESULT($result,$i,"course_yrSec");
					$hidden_proom = MYSQL_RESULT($result,$i,"room_name");
					$hidden_pt = MYSQL_RESULT($result,$i,"teacher_name");
					$hidden_pday = MYSQL_RESULT($result,$i,"day_id");
					$hidden_pstime = MYSQL_RESULT($result,$i,"time_s_id");
			 
			 if ($hidden_pday == 2 && $hidden_pstime == 5){	
			  		echo $hidden_psubcat . '<br>'.$hidden_pt . '<br>'.$hidden_proom;
					end;
						}
						
	$i++;	 
			}
			} ?>
    </div></td>
    <td><div align="center" class="style12">
      <?php
			$pCourse =$_REQUEST['pCourse'];
			$pSy =$_REQUEST['pSy'];
			$psem=$_REQUEST['psem'];

			$result = mysql_query("SELECT `sched`.*,`room`.`room_name` ,`course`.`course_yrSec`,`subjects`.`sub_code`,`profile`.`teacher_name`,`school_yr`.`school_year` FROM `sched`,`room`,`course`,`subjects`,`profile` ,`school_yr`  WHERE sched.room_id=room.room_id and sched.course_id=course.course_id and sched.sub_id=subjects.sub_id and sched.teacher_id=profile.teacher_id
 and sched.year_id=school_yr.year_id HAVING course_id='$pCourse' and sem_id='$psem' and year_id='$pSy'
  			");
			//HAVING course_id='$pCourse' and sem_id='$psem' and year_id='$pSy'
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

					$hidden_psubcat = MYSQL_RESULT($result,$i,"sub_code");
					$hidden_pcourse = MYSQL_RESULT($result,$i,"course_yrSec");
					$hidden_proom = MYSQL_RESULT($result,$i,"room_name");
					$hidden_pt = MYSQL_RESULT($result,$i,"teacher_name");
					$hidden_pday = MYSQL_RESULT($result,$i,"day_id");
					$hidden_pstime = MYSQL_RESULT($result,$i,"time_s_id");
			 
			 if ($hidden_pday == 3 && $hidden_pstime == 5){	
			  		echo $hidden_psubcat . '<br>'.$hidden_pt . '<br>'.$hidden_proom;
					end;
						}
						
	$i++;	 
			}
			} ?>
    </div></td>
    <td><div align="center" class="style12">
      <?php
			$pCourse =$_REQUEST['pCourse'];
			$pSy =$_REQUEST['pSy'];
			$psem=$_REQUEST['psem'];

			$result = mysql_query("SELECT `sched`.*,`room`.`room_name` ,`course`.`course_yrSec`,`subjects`.`sub_code`,`profile`.`teacher_name`,`school_yr`.`school_year` FROM `sched`,`room`,`course`,`subjects`,`profile` ,`school_yr`  WHERE sched.room_id=room.room_id and sched.course_id=course.course_id and sched.sub_id=subjects.sub_id and sched.teacher_id=profile.teacher_id
 and sched.year_id=school_yr.year_id HAVING course_id='$pCourse' and sem_id='$psem' and year_id='$pSy'
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

					$hidden_psubcat = MYSQL_RESULT($result,$i,"sub_code");
					$hidden_pcourse = MYSQL_RESULT($result,$i,"course_yrSec");
					$hidden_proom = MYSQL_RESULT($result,$i,"room_name");
					$hidden_pt = MYSQL_RESULT($result,$i,"teacher_name");
					$hidden_pday = MYSQL_RESULT($result,$i,"day_id");
					$hidden_pstime = MYSQL_RESULT($result,$i,"time_s_id");
			 
			 if ($hidden_pday == 4 && $hidden_pstime == 5){	
			  		echo $hidden_psubcat . '<br>'.$hidden_pt . '<br>'.$hidden_proom;
					end;
						}
						
	$i++;	 
			}
			} ?>
    </div></td>
    <td><div align="center" class="style12">
      <?php
			$pCourse =$_REQUEST['pCourse'];
			$pSy =$_REQUEST['pSy'];
			$psem=$_REQUEST['psem'];

			$result = mysql_query("SELECT `sched`.*,`room`.`room_name` ,`course`.`course_yrSec`,`subjects`.`sub_code`,`profile`.`teacher_name`,`school_yr`.`school_year` FROM `sched`,`room`,`course`,`subjects`,`profile` ,`school_yr`  WHERE sched.room_id=room.room_id and sched.course_id=course.course_id and sched.sub_id=subjects.sub_id and sched.teacher_id=profile.teacher_id
 and sched.year_id=school_yr.year_id HAVING course_id='$pCourse' and sem_id='$psem' and year_id='$pSy'
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

					$hidden_psubcat = MYSQL_RESULT($result,$i,"sub_code");
					$hidden_pcourse = MYSQL_RESULT($result,$i,"course_yrSec");
					$hidden_proom = MYSQL_RESULT($result,$i,"room_name");
					$hidden_pt = MYSQL_RESULT($result,$i,"teacher_name");
					$hidden_pday = MYSQL_RESULT($result,$i,"day_id");
					$hidden_pstime = MYSQL_RESULT($result,$i,"time_s_id");
			 
			 if ($hidden_pday == 5 && $hidden_pstime == 5){	
			  		echo $hidden_psubcat . '<br>'.$hidden_pt . '<br>'.$hidden_proom;
					end;
						}
						
	$i++;	 
			}
			} ?>
    </div></td>
  </tr>
  <tr>
    <td><div align="center" class="style15">10:30 - 11:30 <br />
      &nbsp;&nbsp;</div></td>
    <td><div align="center" class="style12">
      <?php
			$pCourse =$_REQUEST['pCourse'];
			$pSy =$_REQUEST['pSy'];
			$psem=$_REQUEST['psem'];

			$result = mysql_query("SELECT `sched`.*,`room`.`room_name` ,`course`.`course_yrSec`,`subjects`.`sub_code`,`profile`.`teacher_name`,`school_yr`.`school_year` FROM `sched`,`room`,`course`,`subjects`,`profile` ,`school_yr`  WHERE sched.room_id=room.room_id and sched.course_id=course.course_id and sched.sub_id=subjects.sub_id and sched.teacher_id=profile.teacher_id
 and sched.year_id=school_yr.year_id HAVING course_id='$pCourse' and sem_id='$psem' and year_id='$pSy'
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

					$hidden_psubcat = MYSQL_RESULT($result,$i,"sub_code");
					$hidden_pcourse = MYSQL_RESULT($result,$i,"course_yrSec");
					$hidden_proom = MYSQL_RESULT($result,$i,"room_name");
					$hidden_pt = MYSQL_RESULT($result,$i,"teacher_name");
					$hidden_pday = MYSQL_RESULT($result,$i,"day_id");
					$hidden_pstime = MYSQL_RESULT($result,$i,"time_s_id");
			 
			 if ($hidden_pday == 1 && $hidden_pstime == 7){	
			  		echo $hidden_psubcat . '<br>'.$hidden_pt . '<br>'.$hidden_proom;
					end;
						}
						
	$i++;	 
			}
			} ?>
    </div></td>
    <td><div align="center" class="style12">
      <?php
			$pCourse =$_REQUEST['pCourse'];
			$pSy =$_REQUEST['pSy'];
			$psem=$_REQUEST['psem'];

			$result = mysql_query("SELECT `sched`.*,`room`.`room_name` ,`course`.`course_yrSec`,`subjects`.`sub_code`,`profile`.`teacher_name`,`school_yr`.`school_year` FROM `sched`,`room`,`course`,`subjects`,`profile` ,`school_yr`  WHERE sched.room_id=room.room_id and sched.course_id=course.course_id and sched.sub_id=subjects.sub_id and sched.teacher_id=profile.teacher_id
 and sched.year_id=school_yr.year_id HAVING course_id='$pCourse' and sem_id='$psem' and year_id='$pSy'
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

					$hidden_psubcat = MYSQL_RESULT($result,$i,"sub_code");
					$hidden_pcourse = MYSQL_RESULT($result,$i,"course_yrSec");
					$hidden_proom = MYSQL_RESULT($result,$i,"room_name");
					$hidden_pt = MYSQL_RESULT($result,$i,"teacher_name");
					$hidden_pday = MYSQL_RESULT($result,$i,"day_id");
					$hidden_pstime = MYSQL_RESULT($result,$i,"time_s_id");
			 
			 if ($hidden_pday == 2 && $hidden_pstime == 7){	
			  		echo $hidden_psubcat . '<br>'.$hidden_pt . '<br>'.$hidden_proom;
					end;
						}
						
	$i++;	 
			}
			} ?>
    </div></td>
    <td><div align="center" class="style12">
      <?php
			$pCourse =$_REQUEST['pCourse'];
			$pSy =$_REQUEST['pSy'];
			$psem=$_REQUEST['psem'];

			$result = mysql_query("SELECT `sched`.*,`room`.`room_name` ,`course`.`course_yrSec`,`subjects`.`sub_code`,`profile`.`teacher_name`,`school_yr`.`school_year` FROM `sched`,`room`,`course`,`subjects`,`profile` ,`school_yr`  WHERE sched.room_id=room.room_id and sched.course_id=course.course_id and sched.sub_id=subjects.sub_id and sched.teacher_id=profile.teacher_id
 and sched.year_id=school_yr.year_id HAVING course_id='$pCourse' and sem_id='$psem' and year_id='$pSy'
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

					$hidden_psubcat = MYSQL_RESULT($result,$i,"sub_code");
					$hidden_pcourse = MYSQL_RESULT($result,$i,"course_yrSec");
					$hidden_proom = MYSQL_RESULT($result,$i,"room_name");
					$hidden_pt = MYSQL_RESULT($result,$i,"teacher_name");
					$hidden_pday = MYSQL_RESULT($result,$i,"day_id");
					$hidden_pstime = MYSQL_RESULT($result,$i,"time_s_id");
			 
			 if ($hidden_pday == 3 && $hidden_pstime == 7){	
			  		echo $hidden_psubcat . '<br>'.$hidden_pt . '<br>'.$hidden_proom;
					end;
						}
						
	$i++;	 
			}
			} ?>
    </div></td>
    <td><div align="center" class="style12">
      <?php
			$pCourse =$_REQUEST['pCourse'];
			$pSy =$_REQUEST['pSy'];
			$psem=$_REQUEST['psem'];

			$result = mysql_query("SELECT `sched`.*,`room`.`room_name` ,`course`.`course_yrSec`,`subjects`.`sub_code`,`profile`.`teacher_name`,`school_yr`.`school_year` FROM `sched`,`room`,`course`,`subjects`,`profile` ,`school_yr`  WHERE sched.room_id=room.room_id and sched.course_id=course.course_id and sched.sub_id=subjects.sub_id and sched.teacher_id=profile.teacher_id
 and sched.year_id=school_yr.year_id HAVING course_id='$pCourse' and sem_id='$psem' and year_id='$pSy'
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

					$hidden_psubcat = MYSQL_RESULT($result,$i,"sub_code");
					$hidden_pcourse = MYSQL_RESULT($result,$i,"course_yrSec");
					$hidden_proom = MYSQL_RESULT($result,$i,"room_name");
					$hidden_pt = MYSQL_RESULT($result,$i,"teacher_name");
					$hidden_pday = MYSQL_RESULT($result,$i,"day_id");
					$hidden_pstime = MYSQL_RESULT($result,$i,"time_s_id");
			 
			 if ($hidden_pday == 4 && $hidden_pstime == 7){	
			  		echo $hidden_psubcat . '<br>'.$hidden_pt . '<br>'.$hidden_proom;
					end;
						}
						
	$i++;	 
			}
			} ?>
    </div></td>
    <td><div align="center" class="style12">
      <?php
			$pCourse =$_REQUEST['pCourse'];
			$pSy =$_REQUEST['pSy'];
			$psem=$_REQUEST['psem'];

			$result = mysql_query("SELECT `sched`.*,`room`.`room_name` ,`course`.`course_yrSec`,`subjects`.`sub_code`,`profile`.`teacher_name`,`school_yr`.`school_year` FROM `sched`,`room`,`course`,`subjects`,`profile` ,`school_yr`  WHERE sched.room_id=room.room_id and sched.course_id=course.course_id and sched.sub_id=subjects.sub_id and sched.teacher_id=profile.teacher_id
 and sched.year_id=school_yr.year_id HAVING course_id='$pCourse' and sem_id='$psem' and year_id='$pSy'
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

					$hidden_psubcat = MYSQL_RESULT($result,$i,"sub_code");
					$hidden_pcourse = MYSQL_RESULT($result,$i,"course_yrSec");
					$hidden_proom = MYSQL_RESULT($result,$i,"room_name");
					$hidden_pt = MYSQL_RESULT($result,$i,"teacher_name");
					$hidden_pday = MYSQL_RESULT($result,$i,"day_id");
					$hidden_pstime = MYSQL_RESULT($result,$i,"time_s_id");
			 
			 if ($hidden_pday == 5 && $hidden_pstime == 7){	
			  		echo $hidden_psubcat . '<br>'.$hidden_pt . '<br>'.$hidden_proom;
					end;
						}
						
	$i++;	 
			}
			} ?>
    </div></td>
  </tr>
  <tr>
    <td><div align="center" class="style15">11:30 - 12:30 <br />
      &nbsp;&nbsp;</div></td>
    <td><div align="center" class="style12">
      <?php
			$pCourse =$_REQUEST['pCourse'];
			$pSy =$_REQUEST['pSy'];
			$psem=$_REQUEST['psem'];

			$result = mysql_query("SELECT `sched`.*,`room`.`room_name` ,`course`.`course_yrSec`,`subjects`.`sub_code`,`profile`.`teacher_name`,`school_yr`.`school_year` FROM `sched`,`room`,`course`,`subjects`,`profile` ,`school_yr`  WHERE sched.room_id=room.room_id and sched.course_id=course.course_id and sched.sub_id=subjects.sub_id and sched.teacher_id=profile.teacher_id
 and sched.year_id=school_yr.year_id HAVING course_id='$pCourse' and sem_id='$psem' and year_id='$pSy'
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

					$hidden_psubcat = MYSQL_RESULT($result,$i,"sub_code");
					$hidden_pcourse = MYSQL_RESULT($result,$i,"course_yrSec");
					$hidden_proom = MYSQL_RESULT($result,$i,"room_name");
					$hidden_pt = MYSQL_RESULT($result,$i,"teacher_name");
					$hidden_pday = MYSQL_RESULT($result,$i,"day_id");
					$hidden_pstime = MYSQL_RESULT($result,$i,"time_s_id");
			 
			 if ($hidden_pday == 1 && $hidden_pstime == 9){	
			  		echo $hidden_psubcat . '<br>'.$hidden_pt . '<br>'.$hidden_proom;
					end;
						}
						
	$i++;	 
			}
			} ?>
    </div></td>
    <td><div align="center" class="style12">
      <?php
			$pCourse =$_REQUEST['pCourse'];
			$pSy =$_REQUEST['pSy'];
			$psem=$_REQUEST['psem'];

			$result = mysql_query("SELECT `sched`.*,`room`.`room_name` ,`course`.`course_yrSec`,`subjects`.`sub_code`,`profile`.`teacher_name`,`school_yr`.`school_year` FROM `sched`,`room`,`course`,`subjects`,`profile` ,`school_yr`  WHERE sched.room_id=room.room_id and sched.course_id=course.course_id and sched.sub_id=subjects.sub_id and sched.teacher_id=profile.teacher_id
 and sched.year_id=school_yr.year_id HAVING course_id='$pCourse' and sem_id='$psem' and year_id='$pSy'
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

					$hidden_psubcat = MYSQL_RESULT($result,$i,"sub_code");
					$hidden_pcourse = MYSQL_RESULT($result,$i,"course_yrSec");
					$hidden_proom = MYSQL_RESULT($result,$i,"room_name");
					$hidden_pt = MYSQL_RESULT($result,$i,"teacher_name");
					$hidden_pday = MYSQL_RESULT($result,$i,"day_id");
					$hidden_pstime = MYSQL_RESULT($result,$i,"time_s_id");
			 
			 if ($hidden_pday == 2 && $hidden_pstime == 9){	
			  		echo $hidden_psubcat . '<br>'.$hidden_pt . '<br>'.$hidden_proom;
					end;
						}
						
	$i++;	 
			}
			} ?>
    </div></td>
    <td><div align="center" class="style12">
      <?php
			$pCourse =$_REQUEST['pCourse'];
			$pSy =$_REQUEST['pSy'];
			$psem=$_REQUEST['psem'];

			$result = mysql_query("SELECT `sched`.*,`room`.`room_name` ,`course`.`course_yrSec`,`subjects`.`sub_code`,`profile`.`teacher_name`,`school_yr`.`school_year` FROM `sched`,`room`,`course`,`subjects`,`profile` ,`school_yr`  WHERE sched.room_id=room.room_id and sched.course_id=course.course_id and sched.sub_id=subjects.sub_id and sched.teacher_id=profile.teacher_id
 and sched.year_id=school_yr.year_id HAVING course_id='$pCourse' and sem_id='$psem' and year_id='$pSy'
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

					$hidden_psubcat = MYSQL_RESULT($result,$i,"sub_code");
					$hidden_pcourse = MYSQL_RESULT($result,$i,"course_yrSec");
					$hidden_proom = MYSQL_RESULT($result,$i,"room_name");
					$hidden_pt = MYSQL_RESULT($result,$i,"teacher_name");
					$hidden_pday = MYSQL_RESULT($result,$i,"day_id");
					$hidden_pstime = MYSQL_RESULT($result,$i,"time_s_id");
			 
			 if ($hidden_pday == 3 && $hidden_pstime == 9){	
			  		echo $hidden_psubcat . '<br>'.$hidden_pt . '<br>'.$hidden_proom;
					end;
						}
						
	$i++;	 
			}
			} ?>
    </div></td>
    <td><div align="center" class="style12">
      <?php
			$pCourse =$_REQUEST['pCourse'];
			$pSy =$_REQUEST['pSy'];
			$psem=$_REQUEST['psem'];

			$result = mysql_query("SELECT `sched`.*,`room`.`room_name` ,`course`.`course_yrSec`,`subjects`.`sub_code`,`profile`.`teacher_name`,`school_yr`.`school_year` FROM `sched`,`room`,`course`,`subjects`,`profile` ,`school_yr`  WHERE sched.room_id=room.room_id and sched.course_id=course.course_id and sched.sub_id=subjects.sub_id and sched.teacher_id=profile.teacher_id
 and sched.year_id=school_yr.year_id HAVING course_id='$pCourse' and sem_id='$psem' and year_id='$pSy'
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

					$hidden_psubcat = MYSQL_RESULT($result,$i,"sub_code");
					$hidden_pcourse = MYSQL_RESULT($result,$i,"course_yrSec");
					$hidden_proom = MYSQL_RESULT($result,$i,"room_name");
					$hidden_pt = MYSQL_RESULT($result,$i,"teacher_name");
					$hidden_pday = MYSQL_RESULT($result,$i,"day_id");
					$hidden_pstime = MYSQL_RESULT($result,$i,"time_s_id");
			 
			 if ($hidden_pday == 4 && $hidden_pstime == 9){	
			  		echo $hidden_psubcat . '<br>'.$hidden_pt . '<br>'.$hidden_proom;
					end;
						}
						
	$i++;	 
			}
			} ?>
    </div></td>
    <td><div align="center" class="style12">
      <?php
			$pCourse =$_REQUEST['pCourse'];
			$pSy =$_REQUEST['pSy'];
			$psem=$_REQUEST['psem'];

			$result = mysql_query("SELECT `sched`.*,`room`.`room_name` ,`course`.`course_yrSec`,`subjects`.`sub_code`,`profile`.`teacher_name`,`school_yr`.`school_year` FROM `sched`,`room`,`course`,`subjects`,`profile` ,`school_yr`  WHERE sched.room_id=room.room_id and sched.course_id=course.course_id and sched.sub_id=subjects.sub_id and sched.teacher_id=profile.teacher_id
 and sched.year_id=school_yr.year_id HAVING course_id='$pCourse' and sem_id='$psem' and year_id='$pSy'
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

					$hidden_psubcat = MYSQL_RESULT($result,$i,"sub_code");
					$hidden_pcourse = MYSQL_RESULT($result,$i,"course_yrSec");
					$hidden_proom = MYSQL_RESULT($result,$i,"room_name");
					$hidden_pt = MYSQL_RESULT($result,$i,"teacher_name");
					$hidden_pday = MYSQL_RESULT($result,$i,"day_id");
					$hidden_pstime = MYSQL_RESULT($result,$i,"time_s_id");
			 
			 if ($hidden_pday == 5 && $hidden_pstime == 9){	
			  		echo $hidden_psubcat . '<br>'.$hidden_pt . '<br>'.$hidden_proom;
					end;
						}
						
	$i++;	 
			}
			} ?>
    </div></td>
  </tr>
  <tr>
    <td><div align="center" class="style15">12:30 - 1:30 <br />
      &nbsp;&nbsp;</div></td>
    <td><div align="center" class="style12">
      <?php
			$pCourse =$_REQUEST['pCourse'];
			$pSy =$_REQUEST['pSy'];
			$psem=$_REQUEST['psem'];

			$result = mysql_query("SELECT `sched`.*,`room`.`room_name` ,`course`.`course_yrSec`,`subjects`.`sub_code`,`profile`.`teacher_name`,`school_yr`.`school_year` FROM `sched`,`room`,`course`,`subjects`,`profile` ,`school_yr`  WHERE sched.room_id=room.room_id and sched.course_id=course.course_id and sched.sub_id=subjects.sub_id and sched.teacher_id=profile.teacher_id
 and sched.year_id=school_yr.year_id HAVING course_id='$pCourse' and sem_id='$psem' and year_id='$pSy'
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

					$hidden_psubcat = MYSQL_RESULT($result,$i,"sub_code");
					$hidden_pcourse = MYSQL_RESULT($result,$i,"course_yrSec");
					$hidden_proom = MYSQL_RESULT($result,$i,"room_name");
					$hidden_pt = MYSQL_RESULT($result,$i,"teacher_name");
					$hidden_pday = MYSQL_RESULT($result,$i,"day_id");
					$hidden_pstime = MYSQL_RESULT($result,$i,"time_s_id");
			 
			 if ($hidden_pday == 1 && $hidden_pstime == 11){	
			  		echo $hidden_psubcat . '<br>'.$hidden_pt . '<br>'.$hidden_proom;
					end;
						}
						
	$i++;	 
			}
			} ?>
    </div></td>
    <td><div align="center" class="style12">
      <?php
			$pCourse =$_REQUEST['pCourse'];
			$pSy =$_REQUEST['pSy'];
			$psem=$_REQUEST['psem'];

			$result = mysql_query("SELECT `sched`.*,`room`.`room_name` ,`course`.`course_yrSec`,`subjects`.`sub_code`,`profile`.`teacher_name`,`school_yr`.`school_year` FROM `sched`,`room`,`course`,`subjects`,`profile` ,`school_yr`  WHERE sched.room_id=room.room_id and sched.course_id=course.course_id and sched.sub_id=subjects.sub_id and sched.teacher_id=profile.teacher_id
 and sched.year_id=school_yr.year_id HAVING course_id='$pCourse' and sem_id='$psem' and year_id='$pSy'
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

					$hidden_psubcat = MYSQL_RESULT($result,$i,"sub_code");
					$hidden_pcourse = MYSQL_RESULT($result,$i,"course_yrSec");
					$hidden_proom = MYSQL_RESULT($result,$i,"room_name");
					$hidden_pt = MYSQL_RESULT($result,$i,"teacher_name");
					$hidden_pday = MYSQL_RESULT($result,$i,"day_id");
					$hidden_pstime = MYSQL_RESULT($result,$i,"time_s_id");
			 
			 if ($hidden_pday == 2 && $hidden_pstime == 11){	
			  		echo $hidden_psubcat . '<br>'.$hidden_pt . '<br>'.$hidden_proom;
					end;
						}
						
	$i++;	 
			}
			} ?>
    </div></td>
    <td><div align="center" class="style12">
      <?php
			$pCourse =$_REQUEST['pCourse'];
			$pSy =$_REQUEST['pSy'];
			$psem=$_REQUEST['psem'];

			$result = mysql_query("SELECT `sched`.*,`room`.`room_name` ,`course`.`course_yrSec`,`subjects`.`sub_code`,`profile`.`teacher_name`,`school_yr`.`school_year` FROM `sched`,`room`,`course`,`subjects`,`profile` ,`school_yr`  WHERE sched.room_id=room.room_id and sched.course_id=course.course_id and sched.sub_id=subjects.sub_id and sched.teacher_id=profile.teacher_id
 and sched.year_id=school_yr.year_id HAVING course_id='$pCourse' and sem_id='$psem' and year_id='$pSy'
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

					$hidden_psubcat = MYSQL_RESULT($result,$i,"sub_code");
					$hidden_pcourse = MYSQL_RESULT($result,$i,"course_yrSec");
					$hidden_proom = MYSQL_RESULT($result,$i,"room_name");
					$hidden_pt = MYSQL_RESULT($result,$i,"teacher_name");
					$hidden_pday = MYSQL_RESULT($result,$i,"day_id");
					$hidden_pstime = MYSQL_RESULT($result,$i,"time_s_id");
			 
			 if ($hidden_pday == 3 && $hidden_pstime == 11){	
			  		echo $hidden_psubcat . '<br>'.$hidden_pt . '<br>'.$hidden_proom;
					end;
						}
						
	$i++;	 
			}
			} ?>
    </div></td>
    <td><div align="center" class="style12">
      <?php
			$pCourse =$_REQUEST['pCourse'];
			$pSy =$_REQUEST['pSy'];
			$psem=$_REQUEST['psem'];

			$result = mysql_query("SELECT `sched`.*,`room`.`room_name` ,`course`.`course_yrSec`,`subjects`.`sub_code`,`profile`.`teacher_name`,`school_yr`.`school_year` FROM `sched`,`room`,`course`,`subjects`,`profile` ,`school_yr`  WHERE sched.room_id=room.room_id and sched.course_id=course.course_id and sched.sub_id=subjects.sub_id and sched.teacher_id=profile.teacher_id
 and sched.year_id=school_yr.year_id HAVING course_id='$pCourse' and sem_id='$psem' and year_id='$pSy'
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

					$hidden_psubcat = MYSQL_RESULT($result,$i,"sub_code");
					$hidden_pcourse = MYSQL_RESULT($result,$i,"course_yrSec");
					$hidden_proom = MYSQL_RESULT($result,$i,"room_name");
					$hidden_pt = MYSQL_RESULT($result,$i,"teacher_name");
					$hidden_pday = MYSQL_RESULT($result,$i,"day_id");
					$hidden_pstime = MYSQL_RESULT($result,$i,"time_s_id");
			 
			 if ($hidden_pday == 4 && $hidden_pstime == 11){	
			  		echo $hidden_psubcat . '<br>'.$hidden_pt . '<br>'.$hidden_proom;
					end;
						}
						
	$i++;	 
			}
			} ?>
    </div></td>
    <td><div align="center" class="style12">
      <?php
			$pCourse =$_REQUEST['pCourse'];
			$pSy =$_REQUEST['pSy'];
			$psem=$_REQUEST['psem'];

			$result = mysql_query("SELECT `sched`.*,`room`.`room_name` ,`course`.`course_yrSec`,`subjects`.`sub_code`,`profile`.`teacher_name`,`school_yr`.`school_year` FROM `sched`,`room`,`course`,`subjects`,`profile` ,`school_yr`  WHERE sched.room_id=room.room_id and sched.course_id=course.course_id and sched.sub_id=subjects.sub_id and sched.teacher_id=profile.teacher_id
 and sched.year_id=school_yr.year_id HAVING course_id='$pCourse' and sem_id='$psem' and year_id='$pSy'
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

					$hidden_psubcat = MYSQL_RESULT($result,$i,"sub_code");
					$hidden_pcourse = MYSQL_RESULT($result,$i,"course_yrSec");
					$hidden_proom = MYSQL_RESULT($result,$i,"room_name");
					$hidden_pt = MYSQL_RESULT($result,$i,"teacher_name");
					$hidden_pday = MYSQL_RESULT($result,$i,"day_id");
					$hidden_pstime = MYSQL_RESULT($result,$i,"time_s_id");
			 
			 if ($hidden_pday == 5 && $hidden_pstime == 11){	
			  		echo $hidden_psubcat . '<br>'.$hidden_pt . '<br>'.$hidden_proom;
					end;
						}
						
	$i++;	 
			}
			} ?>
    </div></td>
  </tr>
  <tr>
    <td><div align="center" class="style15">1:30 - 2:30 <br />
      &nbsp;&nbsp;</div></td>
    <td><div align="center" class="style12">
      <?php
			$pCourse =$_REQUEST['pCourse'];
			$pSy =$_REQUEST['pSy'];
			$psem=$_REQUEST['psem'];

			$result = mysql_query("SELECT `sched`.*,`room`.`room_name` ,`course`.`course_yrSec`,`subjects`.`sub_code`,`profile`.`teacher_name`,`school_yr`.`school_year` FROM `sched`,`room`,`course`,`subjects`,`profile` ,`school_yr`  WHERE sched.room_id=room.room_id and sched.course_id=course.course_id and sched.sub_id=subjects.sub_id and sched.teacher_id=profile.teacher_id
 and sched.year_id=school_yr.year_id HAVING course_id='$pCourse' and sem_id='$psem' and year_id='$pSy'
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

					$hidden_psubcat = MYSQL_RESULT($result,$i,"sub_code");
					$hidden_pcourse = MYSQL_RESULT($result,$i,"course_yrSec");
					$hidden_proom = MYSQL_RESULT($result,$i,"room_name");
					$hidden_pt = MYSQL_RESULT($result,$i,"teacher_name");
					$hidden_pday = MYSQL_RESULT($result,$i,"day_id");
					$hidden_pstime = MYSQL_RESULT($result,$i,"time_s_id");
			 
			 if ($hidden_pday == 1 && $hidden_pstime == 13){	
			  		echo $hidden_psubcat . '<br>'.$hidden_pt . '<br>'.$hidden_proom;
					end;
						}
						
	$i++;	 
			}
			} ?>
    </div></td>
    <td><div align="center" class="style12">
      <?php
			$pCourse =$_REQUEST['pCourse'];
			$pSy =$_REQUEST['pSy'];
			$psem=$_REQUEST['psem'];

			$result = mysql_query("SELECT `sched`.*,`room`.`room_name` ,`course`.`course_yrSec`,`subjects`.`sub_code`,`profile`.`teacher_name`,`school_yr`.`school_year` FROM `sched`,`room`,`course`,`subjects`,`profile` ,`school_yr`  WHERE sched.room_id=room.room_id and sched.course_id=course.course_id and sched.sub_id=subjects.sub_id and sched.teacher_id=profile.teacher_id
 and sched.year_id=school_yr.year_id HAVING course_id='$pCourse' and sem_id='$psem' and year_id='$pSy'
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

					$hidden_psubcat = MYSQL_RESULT($result,$i,"sub_code");
					$hidden_pcourse = MYSQL_RESULT($result,$i,"course_yrSec");
					$hidden_proom = MYSQL_RESULT($result,$i,"room_name");
					$hidden_pt = MYSQL_RESULT($result,$i,"teacher_name");
					$hidden_pday = MYSQL_RESULT($result,$i,"day_id");
					$hidden_pstime = MYSQL_RESULT($result,$i,"time_s_id");
			 
			 if ($hidden_pday == 2 && $hidden_pstime == 13){	
			  		echo $hidden_psubcat . '<br>'.$hidden_pt . '<br>'.$hidden_proom;
					end;
						}
						
	$i++;	 
			}
			} ?>
    </div></td>
    <td><div align="center" class="style12">
      <?php
			$pCourse =$_REQUEST['pCourse'];
			$pSy =$_REQUEST['pSy'];
			$psem=$_REQUEST['psem'];

			$result = mysql_query("SELECT `sched`.*,`room`.`room_name` ,`course`.`course_yrSec`,`subjects`.`sub_code`,`profile`.`teacher_name`,`school_yr`.`school_year` FROM `sched`,`room`,`course`,`subjects`,`profile` ,`school_yr`  WHERE sched.room_id=room.room_id and sched.course_id=course.course_id and sched.sub_id=subjects.sub_id and sched.teacher_id=profile.teacher_id
 and sched.year_id=school_yr.year_id HAVING course_id='$pCourse' and sem_id='$psem' and year_id='$pSy'
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

					$hidden_psubcat = MYSQL_RESULT($result,$i,"sub_code");
					$hidden_pcourse = MYSQL_RESULT($result,$i,"course_yrSec");
					$hidden_proom = MYSQL_RESULT($result,$i,"room_name");
					$hidden_pt = MYSQL_RESULT($result,$i,"teacher_name");
					$hidden_pday = MYSQL_RESULT($result,$i,"day_id");
					$hidden_pstime = MYSQL_RESULT($result,$i,"time_s_id");
			 
			 if ($hidden_pday == 3 && $hidden_pstime == 13){	
			  		echo $hidden_psubcat . '<br>'.$hidden_pt . '<br>'.$hidden_proom;
					end;
						}
						
	$i++;	 
			}
			} ?>
    </div></td>
    <td><div align="center" class="style12">
      <?php
			$pCourse =$_REQUEST['pCourse'];
			$pSy =$_REQUEST['pSy'];
			$psem=$_REQUEST['psem'];

			$result = mysql_query("SELECT `sched`.*,`room`.`room_name` ,`course`.`course_yrSec`,`subjects`.`sub_code`,`profile`.`teacher_name`,`school_yr`.`school_year` FROM `sched`,`room`,`course`,`subjects`,`profile` ,`school_yr`  WHERE sched.room_id=room.room_id and sched.course_id=course.course_id and sched.sub_id=subjects.sub_id and sched.teacher_id=profile.teacher_id
 and sched.year_id=school_yr.year_id HAVING course_id='$pCourse' and sem_id='$psem' and year_id='$pSy'
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

					$hidden_psubcat = MYSQL_RESULT($result,$i,"sub_code");
					$hidden_pcourse = MYSQL_RESULT($result,$i,"course_yrSec");
					$hidden_proom = MYSQL_RESULT($result,$i,"room_name");
					$hidden_pt = MYSQL_RESULT($result,$i,"teacher_name");
					$hidden_pday = MYSQL_RESULT($result,$i,"day_id");
					$hidden_pstime = MYSQL_RESULT($result,$i,"time_s_id");
			 
			 if ($hidden_pday == 4 && $hidden_pstime == 13){	
			  		echo $hidden_psubcat . '<br>'.$hidden_pt . '<br>'.$hidden_proom;
					end;
						}
						
	$i++;	 
			}
			} ?>
    </div></td>
    <td><div align="center" class="style12">
      <?php
			$pCourse =$_REQUEST['pCourse'];
			$pSy =$_REQUEST['pSy'];
			$psem=$_REQUEST['psem'];

			$result = mysql_query("SELECT `sched`.*,`room`.`room_name` ,`course`.`course_yrSec`,`subjects`.`sub_code`,`profile`.`teacher_name`,`school_yr`.`school_year` FROM `sched`,`room`,`course`,`subjects`,`profile` ,`school_yr`  WHERE sched.room_id=room.room_id and sched.course_id=course.course_id and sched.sub_id=subjects.sub_id and sched.teacher_id=profile.teacher_id
 and sched.year_id=school_yr.year_id HAVING course_id='$pCourse' and sem_id='$psem' and year_id='$pSy'
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

					$hidden_psubcat = MYSQL_RESULT($result,$i,"sub_code");
					$hidden_pcourse = MYSQL_RESULT($result,$i,"course_yrSec");
					$hidden_proom = MYSQL_RESULT($result,$i,"room_name");
					$hidden_pt = MYSQL_RESULT($result,$i,"teacher_name");
					$hidden_pday = MYSQL_RESULT($result,$i,"day_id");
					$hidden_pstime = MYSQL_RESULT($result,$i,"time_s_id");
			 
			 if ($hidden_pday == 5 && $hidden_pstime == 13){	
			  		echo $hidden_psubcat . '<br>'.$hidden_pt . '<br>'.$hidden_proom;
					end;
						}
						
	$i++;	 
			}
			} ?>
    </div></td>
  </tr>
  <tr>
    <td><div align="center" class="style15">2:30 - 3:30 <br />
      &nbsp;&nbsp;</div></td>
    <td><div align="center" class="style12">
      <?php
			$pCourse =$_REQUEST['pCourse'];
			$pSy =$_REQUEST['pSy'];
			$psem=$_REQUEST['psem'];

			$result = mysql_query("SELECT `sched`.*,`room`.`room_name` ,`course`.`course_yrSec`,`subjects`.`sub_code`,`profile`.`teacher_name`,`school_yr`.`school_year` FROM `sched`,`room`,`course`,`subjects`,`profile` ,`school_yr`  WHERE sched.room_id=room.room_id and sched.course_id=course.course_id and sched.sub_id=subjects.sub_id and sched.teacher_id=profile.teacher_id
 and sched.year_id=school_yr.year_id HAVING course_id='$pCourse' and sem_id='$psem' and year_id='$pSy'
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

					$hidden_psubcat = MYSQL_RESULT($result,$i,"sub_code");
					$hidden_pcourse = MYSQL_RESULT($result,$i,"course_yrSec");
					$hidden_proom = MYSQL_RESULT($result,$i,"room_name");
					$hidden_pt = MYSQL_RESULT($result,$i,"teacher_name");
					$hidden_pday = MYSQL_RESULT($result,$i,"day_id");
					$hidden_pstime = MYSQL_RESULT($result,$i,"time_s_id");
			 
			 if ($hidden_pday == 1 && $hidden_pstime == 15){	
			  		echo $hidden_psubcat . '<br>'.$hidden_pt . '<br>'.$hidden_proom;
					end;
						}
						
	$i++;	 
			}
			} ?>
    </div></td>
    <td><div align="center" class="style12">
      <?php
			$pCourse =$_REQUEST['pCourse'];
			$pSy =$_REQUEST['pSy'];
			$psem=$_REQUEST['psem'];

			$result = mysql_query("SELECT `sched`.*,`room`.`room_name` ,`course`.`course_yrSec`,`subjects`.`sub_code`,`profile`.`teacher_name`,`school_yr`.`school_year` FROM `sched`,`room`,`course`,`subjects`,`profile` ,`school_yr`  WHERE sched.room_id=room.room_id and sched.course_id=course.course_id and sched.sub_id=subjects.sub_id and sched.teacher_id=profile.teacher_id
 and sched.year_id=school_yr.year_id HAVING course_id='$pCourse' and sem_id='$psem' and year_id='$pSy'
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

					$hidden_psubcat = MYSQL_RESULT($result,$i,"sub_code");
					$hidden_pcourse = MYSQL_RESULT($result,$i,"course_yrSec");
					$hidden_proom = MYSQL_RESULT($result,$i,"room_name");
					$hidden_pt = MYSQL_RESULT($result,$i,"teacher_name");
					$hidden_pday = MYSQL_RESULT($result,$i,"day_id");
					$hidden_pstime = MYSQL_RESULT($result,$i,"time_s_id");
			 
			 if ($hidden_pday == 2 && $hidden_pstime == 15){	
			  		echo $hidden_psubcat . '<br>'.$hidden_pt . '<br>'.$hidden_proom;
					end;
						}
						
	$i++;	 
			}
			} ?>
    </div></td>
    <td><div align="center" class="style12">
      <?php
			$pCourse =$_REQUEST['pCourse'];
			$pSy =$_REQUEST['pSy'];
			$psem=$_REQUEST['psem'];

			$result = mysql_query("SELECT `sched`.*,`room`.`room_name` ,`course`.`course_yrSec`,`subjects`.`sub_code`,`profile`.`teacher_name`,`school_yr`.`school_year` FROM `sched`,`room`,`course`,`subjects`,`profile` ,`school_yr`  WHERE sched.room_id=room.room_id and sched.course_id=course.course_id and sched.sub_id=subjects.sub_id and sched.teacher_id=profile.teacher_id
 and sched.year_id=school_yr.year_id HAVING course_id='$pCourse' and sem_id='$psem' and year_id='$pSy'
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

					$hidden_psubcat = MYSQL_RESULT($result,$i,"sub_code");
					$hidden_pcourse = MYSQL_RESULT($result,$i,"course_yrSec");
					$hidden_proom = MYSQL_RESULT($result,$i,"room_name");
					$hidden_pt = MYSQL_RESULT($result,$i,"teacher_name");
					$hidden_pday = MYSQL_RESULT($result,$i,"day_id");
					$hidden_pstime = MYSQL_RESULT($result,$i,"time_s_id");
			 
			 if ($hidden_pday == 3 && $hidden_pstime == 15){	
			  		echo $hidden_psubcat . '<br>'.$hidden_pt . '<br>'.$hidden_proom;
					end;
						}
						
	$i++;	 
			}
			} ?>
    </div></td>
    <td><div align="center" class="style12">
      <?php
			$pCourse =$_REQUEST['pCourse'];
			$pSy =$_REQUEST['pSy'];
			$psem=$_REQUEST['psem'];

			$result = mysql_query("SELECT `sched`.*,`room`.`room_name` ,`course`.`course_yrSec`,`subjects`.`sub_code`,`profile`.`teacher_name`,`school_yr`.`school_year` FROM `sched`,`room`,`course`,`subjects`,`profile` ,`school_yr`  WHERE sched.room_id=room.room_id and sched.course_id=course.course_id and sched.sub_id=subjects.sub_id and sched.teacher_id=profile.teacher_id
 and sched.year_id=school_yr.year_id HAVING course_id='$pCourse' and sem_id='$psem' and year_id='$pSy'
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

					$hidden_psubcat = MYSQL_RESULT($result,$i,"sub_code");
					$hidden_pcourse = MYSQL_RESULT($result,$i,"course_yrSec");
					$hidden_proom = MYSQL_RESULT($result,$i,"room_name");
					$hidden_pt = MYSQL_RESULT($result,$i,"teacher_name");
					$hidden_pday = MYSQL_RESULT($result,$i,"day_id");
					$hidden_pstime = MYSQL_RESULT($result,$i,"time_s_id");
			 
			 if ($hidden_pday == 4 && $hidden_pstime == 15){	
			  		echo $hidden_psubcat . '<br>'.$hidden_pt . '<br>'.$hidden_proom;
					end;
						}
						
	$i++;	 
			}
			} ?>
    </div></td>
    <td><div align="center" class="style12">
      <?php
			$pCourse =$_REQUEST['pCourse'];
			$pSy =$_REQUEST['pSy'];
			$psem=$_REQUEST['psem'];

			$result = mysql_query("SELECT `sched`.*,`room`.`room_name` ,`course`.`course_yrSec`,`subjects`.`sub_code`,`profile`.`teacher_name`,`school_yr`.`school_year` FROM `sched`,`room`,`course`,`subjects`,`profile` ,`school_yr`  WHERE sched.room_id=room.room_id and sched.course_id=course.course_id and sched.sub_id=subjects.sub_id and sched.teacher_id=profile.teacher_id
 and sched.year_id=school_yr.year_id HAVING course_id='$pCourse' and sem_id='$psem' and year_id='$pSy'
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

					$hidden_psubcat = MYSQL_RESULT($result,$i,"sub_code");
					$hidden_pcourse = MYSQL_RESULT($result,$i,"course_yrSec");
					$hidden_proom = MYSQL_RESULT($result,$i,"room_name");
					$hidden_pt = MYSQL_RESULT($result,$i,"teacher_name");
					$hidden_pday = MYSQL_RESULT($result,$i,"day_id");
					$hidden_pstime = MYSQL_RESULT($result,$i,"time_s_id");
			 
			 if ($hidden_pday == 5 && $hidden_pstime == 15){	
			  		echo $hidden_psubcat . '<br>'.$hidden_pt . '<br>'.$hidden_proom;
					end;
						}
						
	$i++;	 
			}
			} ?>
    </div></td>
  </tr>
  <tr>
    <td><div align="center" class="style15">3:30 - 4:30 <br />
      &nbsp;&nbsp;</div></td>
    <td><div align="center" class="style12">
      <?php
			$pCourse =$_REQUEST['pCourse'];
			$pSy =$_REQUEST['pSy'];
			$psem=$_REQUEST['psem'];

			$result = mysql_query("SELECT `sched`.*,`room`.`room_name` ,`course`.`course_yrSec`,`subjects`.`sub_code`,`profile`.`teacher_name`,`school_yr`.`school_year` FROM `sched`,`room`,`course`,`subjects`,`profile` ,`school_yr`  WHERE sched.room_id=room.room_id and sched.course_id=course.course_id and sched.sub_id=subjects.sub_id and sched.teacher_id=profile.teacher_id
 and sched.year_id=school_yr.year_id HAVING course_id='$pCourse' and sem_id='$psem' and year_id='$pSy'
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

					$hidden_psubcat = MYSQL_RESULT($result,$i,"sub_code");
					$hidden_pcourse = MYSQL_RESULT($result,$i,"course_yrSec");
					$hidden_proom = MYSQL_RESULT($result,$i,"room_name");
					$hidden_pt = MYSQL_RESULT($result,$i,"teacher_name");
					$hidden_pday = MYSQL_RESULT($result,$i,"day_id");
					$hidden_pstime = MYSQL_RESULT($result,$i,"time_s_id");
			 
			 if ($hidden_pday == 1 && $hidden_pstime == 17){	
			  		echo $hidden_psubcat . '<br>'.$hidden_pt . '<br>'.$hidden_proom;
					end;
						}
						
	$i++;	 
			}
			} ?>
    </div></td>
    <td><div align="center" class="style12">
      <?php
			$pCourse =$_REQUEST['pCourse'];
			$pSy =$_REQUEST['pSy'];
			$psem=$_REQUEST['psem'];

			$result = mysql_query("SELECT `sched`.*,`room`.`room_name` ,`course`.`course_yrSec`,`subjects`.`sub_code`,`profile`.`teacher_name`,`school_yr`.`school_year` FROM `sched`,`room`,`course`,`subjects`,`profile` ,`school_yr`  WHERE sched.room_id=room.room_id and sched.course_id=course.course_id and sched.sub_id=subjects.sub_id and sched.teacher_id=profile.teacher_id
 and sched.year_id=school_yr.year_id HAVING course_id='$pCourse' and sem_id='$psem' and year_id='$pSy'
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

					$hidden_psubcat = MYSQL_RESULT($result,$i,"sub_code");
					$hidden_pcourse = MYSQL_RESULT($result,$i,"course_yrSec");
					$hidden_proom = MYSQL_RESULT($result,$i,"room_name");
					$hidden_pt = MYSQL_RESULT($result,$i,"teacher_name");
					$hidden_pday = MYSQL_RESULT($result,$i,"day_id");
					$hidden_pstime = MYSQL_RESULT($result,$i,"time_s_id");
			 
			 if ($hidden_pday == 2 && $hidden_pstime == 17){	
			  		echo $hidden_psubcat . '<br>'.$hidden_pt . '<br>'.$hidden_proom;
					end;
						}
						
	$i++;	 
			}
			} ?>
    </div></td>
    <td><div align="center" class="style12">
      <?php
			$pCourse =$_REQUEST['pCourse'];
			$pSy =$_REQUEST['pSy'];
			$psem=$_REQUEST['psem'];

			$result = mysql_query("SELECT `sched`.*,`room`.`room_name` ,`course`.`course_yrSec`,`subjects`.`sub_code`,`profile`.`teacher_name`,`school_yr`.`school_year` FROM `sched`,`room`,`course`,`subjects`,`profile` ,`school_yr`  WHERE sched.room_id=room.room_id and sched.course_id=course.course_id and sched.sub_id=subjects.sub_id and sched.teacher_id=profile.teacher_id
 and sched.year_id=school_yr.year_id HAVING course_id='$pCourse' and sem_id='$psem' and year_id='$pSy'
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

					$hidden_psubcat = MYSQL_RESULT($result,$i,"sub_code");
					$hidden_pcourse = MYSQL_RESULT($result,$i,"course_yrSec");
					$hidden_proom = MYSQL_RESULT($result,$i,"room_name");
					$hidden_pt = MYSQL_RESULT($result,$i,"teacher_name");
					$hidden_pday = MYSQL_RESULT($result,$i,"day_id");
					$hidden_pstime = MYSQL_RESULT($result,$i,"time_s_id");
			 
			 if ($hidden_pday == 3 && $hidden_pstime == 17){	
			  		echo $hidden_psubcat . '<br>'.$hidden_pt . '<br>'.$hidden_proom;
					end;
						}
						
	$i++;	 
			}
			} ?>
    </div></td>
    <td><div align="center" class="style12">
      <?php
			$pCourse =$_REQUEST['pCourse'];
			$pSy =$_REQUEST['pSy'];
			$psem=$_REQUEST['psem'];

			$result = mysql_query("SELECT `sched`.*,`room`.`room_name` ,`course`.`course_yrSec`,`subjects`.`sub_code`,`profile`.`teacher_name`,`school_yr`.`school_year` FROM `sched`,`room`,`course`,`subjects`,`profile` ,`school_yr`  WHERE sched.room_id=room.room_id and sched.course_id=course.course_id and sched.sub_id=subjects.sub_id and sched.teacher_id=profile.teacher_id
 and sched.year_id=school_yr.year_id HAVING course_id='$pCourse' and sem_id='$psem' and year_id='$pSy'
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

					$hidden_psubcat = MYSQL_RESULT($result,$i,"sub_code");
					$hidden_pcourse = MYSQL_RESULT($result,$i,"course_yrSec");
					$hidden_proom = MYSQL_RESULT($result,$i,"room_name");
					$hidden_pt = MYSQL_RESULT($result,$i,"teacher_name");
					$hidden_pday = MYSQL_RESULT($result,$i,"day_id");
					$hidden_pstime = MYSQL_RESULT($result,$i,"time_s_id");
			 
			 if ($hidden_pday == 4 && $hidden_pstime == 17){	
			  		echo $hidden_psubcat . '<br>'.$hidden_pt . '<br>'.$hidden_proom;
					end;
						}
						
	$i++;	 
			}
			} ?>
    </div></td>
    <td><div align="center" class="style12">
      <?php
			$pCourse =$_REQUEST['pCourse'];
			$pSy =$_REQUEST['pSy'];
			$psem=$_REQUEST['psem'];

			$result = mysql_query("SELECT `sched`.*,`room`.`room_name` ,`course`.`course_yrSec`,`subjects`.`sub_code`,`profile`.`teacher_name`,`school_yr`.`school_year` FROM `sched`,`room`,`course`,`subjects`,`profile` ,`school_yr`  WHERE sched.room_id=room.room_id and sched.course_id=course.course_id and sched.sub_id=subjects.sub_id and sched.teacher_id=profile.teacher_id
 and sched.year_id=school_yr.year_id HAVING course_id='$pCourse' and sem_id='$psem' and year_id='$pSy'
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

					$hidden_psubcat = MYSQL_RESULT($result,$i,"sub_code");
					$hidden_pcourse = MYSQL_RESULT($result,$i,"course_yrSec");
					$hidden_proom = MYSQL_RESULT($result,$i,"room_name");
					$hidden_pt = MYSQL_RESULT($result,$i,"teacher_name");
					$hidden_pday = MYSQL_RESULT($result,$i,"day_id");
					$hidden_pstime = MYSQL_RESULT($result,$i,"time_s_id");
			 
			 if ($hidden_pday == 5 && $hidden_pstime == 17){	
			  		echo $hidden_psubcat . '<br>'.$hidden_pt . '<br>'.$hidden_proom;
					end;
						}
						
	$i++;	 
			}
			} ?>
    </div></td>
  </tr>
  <tr>
    <td><div align="center" class="style15">4:30 - 5:30 <br />
      &nbsp;&nbsp;</div></td>
    <td><div align="center" class="style12">
      <?php
			$pCourse =$_REQUEST['pCourse'];
			$pSy =$_REQUEST['pSy'];
			$psem=$_REQUEST['psem'];

			$result = mysql_query("SELECT `sched`.*,`room`.`room_name` ,`course`.`course_yrSec`,`subjects`.`sub_code`,`profile`.`teacher_name`,`school_yr`.`school_year` FROM `sched`,`room`,`course`,`subjects`,`profile` ,`school_yr`  WHERE sched.room_id=room.room_id and sched.course_id=course.course_id and sched.sub_id=subjects.sub_id and sched.teacher_id=profile.teacher_id
 and sched.year_id=school_yr.year_id HAVING course_id='$pCourse' and sem_id='$psem' and year_id='$pSy'
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

					$hidden_psubcat = MYSQL_RESULT($result,$i,"sub_code");
					$hidden_pcourse = MYSQL_RESULT($result,$i,"course_yrSec");
					$hidden_proom = MYSQL_RESULT($result,$i,"room_name");
					$hidden_pt = MYSQL_RESULT($result,$i,"teacher_name");
					$hidden_pday = MYSQL_RESULT($result,$i,"day_id");
					$hidden_pstime = MYSQL_RESULT($result,$i,"time_s_id");
			 
			 if ($hidden_pday == 1 && $hidden_pstime == 19){	
			  		echo $hidden_psubcat . '<br>'.$hidden_pt . '<br>'.$hidden_proom;
					end;
						}
						
	$i++;	 
			}
			} ?>
    </div></td>
    <td><div align="center" class="style12">
      <?php
			$pCourse =$_REQUEST['pCourse'];
			$pSy =$_REQUEST['pSy'];
			$psem=$_REQUEST['psem'];

			$result = mysql_query("SELECT `sched`.*,`room`.`room_name` ,`course`.`course_yrSec`,`subjects`.`sub_code`,`profile`.`teacher_name`,`school_yr`.`school_year` FROM `sched`,`room`,`course`,`subjects`,`profile` ,`school_yr`  WHERE sched.room_id=room.room_id and sched.course_id=course.course_id and sched.sub_id=subjects.sub_id and sched.teacher_id=profile.teacher_id
 and sched.year_id=school_yr.year_id HAVING course_id='$pCourse' and sem_id='$psem' and year_id='$pSy'
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

					$hidden_psubcat = MYSQL_RESULT($result,$i,"sub_code");
					$hidden_pcourse = MYSQL_RESULT($result,$i,"course_yrSec");
					$hidden_proom = MYSQL_RESULT($result,$i,"room_name");
					$hidden_pt = MYSQL_RESULT($result,$i,"teacher_name");
					$hidden_pday = MYSQL_RESULT($result,$i,"day_id");
					$hidden_pstime = MYSQL_RESULT($result,$i,"time_s_id");
			 
			 if ($hidden_pday == 2 && $hidden_pstime == 19){	
			  		echo $hidden_psubcat . '<br>'.$hidden_pt . '<br>'.$hidden_proom;
					end;
						}
						
	$i++;	 
			}
			} ?>
    </div></td>
    <td><div align="center" class="style12">
      <?php
			$pCourse =$_REQUEST['pCourse'];
			$pSy =$_REQUEST['pSy'];
			$psem=$_REQUEST['psem'];

			$result = mysql_query("SELECT `sched`.*,`room`.`room_name` ,`course`.`course_yrSec`,`subjects`.`sub_code`,`profile`.`teacher_name`,`school_yr`.`school_year` FROM `sched`,`room`,`course`,`subjects`,`profile` ,`school_yr`  WHERE sched.room_id=room.room_id and sched.course_id=course.course_id and sched.sub_id=subjects.sub_id and sched.teacher_id=profile.teacher_id
 and sched.year_id=school_yr.year_id HAVING course_id='$pCourse' and sem_id='$psem' and year_id='$pSy'
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

					$hidden_psubcat = MYSQL_RESULT($result,$i,"sub_code");
					$hidden_pcourse = MYSQL_RESULT($result,$i,"course_yrSec");
					$hidden_proom = MYSQL_RESULT($result,$i,"room_name");
					$hidden_pt = MYSQL_RESULT($result,$i,"teacher_name");
					$hidden_pday = MYSQL_RESULT($result,$i,"day_id");
					$hidden_pstime = MYSQL_RESULT($result,$i,"time_s_id");
			 
			 if ($hidden_pday == 3 && $hidden_pstime == 19){	
			  		echo $hidden_psubcat . '<br>'.$hidden_pt . '<br>'.$hidden_proom;
					end;
						}
						
	$i++;	 
			}
			} ?>
    </div></td>
    <td><div align="center" class="style12">
      <?php
			$pCourse =$_REQUEST['pCourse'];
			$pSy =$_REQUEST['pSy'];
			$psem=$_REQUEST['psem'];

			$result = mysql_query("SELECT `sched`.*,`room`.`room_name` ,`course`.`course_yrSec`,`subjects`.`sub_code`,`profile`.`teacher_name`,`school_yr`.`school_year` FROM `sched`,`room`,`course`,`subjects`,`profile` ,`school_yr`  WHERE sched.room_id=room.room_id and sched.course_id=course.course_id and sched.sub_id=subjects.sub_id and sched.teacher_id=profile.teacher_id
 and sched.year_id=school_yr.year_id HAVING course_id='$pCourse' and sem_id='$psem' and year_id='$pSy'
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

					$hidden_psubcat = MYSQL_RESULT($result,$i,"sub_code");
					$hidden_pcourse = MYSQL_RESULT($result,$i,"course_yrSec");
					$hidden_proom = MYSQL_RESULT($result,$i,"room_name");
					$hidden_pt = MYSQL_RESULT($result,$i,"teacher_name");
					$hidden_pday = MYSQL_RESULT($result,$i,"day_id");
					$hidden_pstime = MYSQL_RESULT($result,$i,"time_s_id");
			 
			 if ($hidden_pday == 4 && $hidden_pstime == 19){	
			  		echo $hidden_psubcat . '<br>'.$hidden_pt . '<br>'.$hidden_proom;
					end;
						}
						
	$i++;	 
			}
			} ?>
    </div></td>
    <td><div align="center" class="style12">
      <?php
			$pCourse =$_REQUEST['pCourse'];
			$pSy =$_REQUEST['pSy'];
			$psem=$_REQUEST['psem'];

			$result = mysql_query("SELECT `sched`.*,`room`.`room_name` ,`course`.`course_yrSec`,`subjects`.`sub_code`,`profile`.`teacher_name`,`school_yr`.`school_year` FROM `sched`,`room`,`course`,`subjects`,`profile` ,`school_yr`  WHERE sched.room_id=room.room_id and sched.course_id=course.course_id and sched.sub_id=subjects.sub_id and sched.teacher_id=profile.teacher_id
 and sched.year_id=school_yr.year_id HAVING course_id='$pCourse' and sem_id='$psem' and year_id='$pSy'
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

					$hidden_psubcat = MYSQL_RESULT($result,$i,"sub_code");
					$hidden_pcourse = MYSQL_RESULT($result,$i,"course_yrSec");
					$hidden_proom = MYSQL_RESULT($result,$i,"room_name");
					$hidden_pt = MYSQL_RESULT($result,$i,"teacher_name");
					$hidden_pday = MYSQL_RESULT($result,$i,"day_id");
					$hidden_pstime = MYSQL_RESULT($result,$i,"time_s_id");
			 
			 if ($hidden_pday == 5 && $hidden_pstime == 19){	
			  		echo $hidden_psubcat . '<br>'.$hidden_pt . '<br>'.$hidden_proom;
					end;
						}
						
	$i++;	 
			}
			} ?>
    </div></td>
  </tr>
  <tr>
    <td><div align="center" class="style15">5:30 - 6:30 <br />
      &nbsp;&nbsp;</div></td>
    <td><div align="center" class="style12">
      <?php
			$pCourse =$_REQUEST['pCourse'];
			$pSy =$_REQUEST['pSy'];
			$psem=$_REQUEST['psem'];

			$result = mysql_query("SELECT `sched`.*,`room`.`room_name` ,`course`.`course_yrSec`,`subjects`.`sub_code`,`profile`.`teacher_name`,`school_yr`.`school_year` FROM `sched`,`room`,`course`,`subjects`,`profile` ,`school_yr`  WHERE sched.room_id=room.room_id and sched.course_id=course.course_id and sched.sub_id=subjects.sub_id and sched.teacher_id=profile.teacher_id
 and sched.year_id=school_yr.year_id HAVING course_id='$pCourse' and sem_id='$psem' and year_id='$pSy'
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

					$hidden_psubcat = MYSQL_RESULT($result,$i,"sub_code");
					$hidden_pcourse = MYSQL_RESULT($result,$i,"course_yrSec");
					$hidden_proom = MYSQL_RESULT($result,$i,"room_name");
					$hidden_pt = MYSQL_RESULT($result,$i,"teacher_name");
					$hidden_pday = MYSQL_RESULT($result,$i,"day_id");
					$hidden_pstime = MYSQL_RESULT($result,$i,"time_s_id");
			 
			 if ($hidden_pday == 1 && $hidden_pstime == 21){	
			  		echo $hidden_psubcat . '<br>'.$hidden_pt . '<br>'.$hidden_proom;
					end;
						}
						
	$i++;	 
			}
			} ?>
    </div></td>
    <td><div align="center" class="style12">
      <?php
			$pCourse =$_REQUEST['pCourse'];
			$pSy =$_REQUEST['pSy'];
			$psem=$_REQUEST['psem'];

			$result = mysql_query("SELECT `sched`.*,`room`.`room_name` ,`course`.`course_yrSec`,`subjects`.`sub_code`,`profile`.`teacher_name`,`school_yr`.`school_year` FROM `sched`,`room`,`course`,`subjects`,`profile` ,`school_yr`  WHERE sched.room_id=room.room_id and sched.course_id=course.course_id and sched.sub_id=subjects.sub_id and sched.teacher_id=profile.teacher_id
 and sched.year_id=school_yr.year_id HAVING course_id='$pCourse' and sem_id='$psem' and year_id='$pSy'
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

					$hidden_psubcat = MYSQL_RESULT($result,$i,"sub_code");
					$hidden_pcourse = MYSQL_RESULT($result,$i,"course_yrSec");
					$hidden_proom = MYSQL_RESULT($result,$i,"room_name");
					$hidden_pt = MYSQL_RESULT($result,$i,"teacher_name");
					$hidden_pday = MYSQL_RESULT($result,$i,"day_id");
					$hidden_pstime = MYSQL_RESULT($result,$i,"time_s_id");
			 
			 if ($hidden_pday == 2 && $hidden_pstime == 21){	
			  		echo $hidden_psubcat . '<br>'.$hidden_pt . '<br>'.$hidden_proom;
					end;
						}
						
	$i++;	 
			}
			} ?>
    </div></td>
    <td><div align="center" class="style12">
      <?php
			$pCourse =$_REQUEST['pCourse'];
			$pSy =$_REQUEST['pSy'];
			$psem=$_REQUEST['psem'];

			$result = mysql_query("SELECT `sched`.*,`room`.`room_name` ,`course`.`course_yrSec`,`subjects`.`sub_code`,`profile`.`teacher_name`,`school_yr`.`school_year` FROM `sched`,`room`,`course`,`subjects`,`profile` ,`school_yr`  WHERE sched.room_id=room.room_id and sched.course_id=course.course_id and sched.sub_id=subjects.sub_id and sched.teacher_id=profile.teacher_id
 and sched.year_id=school_yr.year_id HAVING course_id='$pCourse' and sem_id='$psem' and year_id='$pSy'
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

					$hidden_psubcat = MYSQL_RESULT($result,$i,"sub_code");
					$hidden_pcourse = MYSQL_RESULT($result,$i,"course_yrSec");
					$hidden_proom = MYSQL_RESULT($result,$i,"room_name");
					$hidden_pt = MYSQL_RESULT($result,$i,"teacher_name");
					$hidden_pday = MYSQL_RESULT($result,$i,"day_id");
					$hidden_pstime = MYSQL_RESULT($result,$i,"time_s_id");
			 
			 if ($hidden_pday == 3 && $hidden_pstime == 21){	
			  		echo $hidden_psubcat . '<br>'.$hidden_pt . '<br>'.$hidden_proom;
					end;
						}
						
	$i++;	 
			}
			} ?>
    </div></td>
    <td><div align="center" class="style12">
      <?php
			$pCourse =$_REQUEST['pCourse'];
			$pSy =$_REQUEST['pSy'];
			$psem=$_REQUEST['psem'];

			$result = mysql_query("SELECT `sched`.*,`room`.`room_name` ,`course`.`course_yrSec`,`subjects`.`sub_code`,`profile`.`teacher_name`,`school_yr`.`school_year` FROM `sched`,`room`,`course`,`subjects`,`profile` ,`school_yr`  WHERE sched.room_id=room.room_id and sched.course_id=course.course_id and sched.sub_id=subjects.sub_id and sched.teacher_id=profile.teacher_id
 and sched.year_id=school_yr.year_id HAVING course_id='$pCourse' and sem_id='$psem' and year_id='$pSy'
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

					$hidden_psubcat = MYSQL_RESULT($result,$i,"sub_code");
					$hidden_pcourse = MYSQL_RESULT($result,$i,"course_yrSec");
					$hidden_proom = MYSQL_RESULT($result,$i,"room_name");
					$hidden_pt = MYSQL_RESULT($result,$i,"teacher_name");
					$hidden_pday = MYSQL_RESULT($result,$i,"day_id");
					$hidden_pstime = MYSQL_RESULT($result,$i,"time_s_id");
			 
			 if ($hidden_pday == 4 && $hidden_pstime == 21){	
			  		echo $hidden_psubcat . '<br>'.$hidden_pt . '<br>'.$hidden_proom;
					end;
						}
						
	$i++;	 
			}
			} ?>
    </div></td>
    <td><div align="center" class="style12">
      <?php
			$pCourse =$_REQUEST['pCourse'];
			$pSy =$_REQUEST['pSy'];
			$psem=$_REQUEST['psem'];

			$result = mysql_query("SELECT `sched`.*,`room`.`room_name` ,`course`.`course_yrSec`,`subjects`.`sub_code`,`profile`.`teacher_name`,`school_yr`.`school_year` FROM `sched`,`room`,`course`,`subjects`,`profile` ,`school_yr`  WHERE sched.room_id=room.room_id and sched.course_id=course.course_id and sched.sub_id=subjects.sub_id and sched.teacher_id=profile.teacher_id
 and sched.year_id=school_yr.year_id HAVING course_id='$pCourse' and sem_id='$psem' and year_id='$pSy'
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

					$hidden_psubcat = MYSQL_RESULT($result,$i,"sub_code");
					$hidden_pcourse = MYSQL_RESULT($result,$i,"course_yrSec");
					$hidden_proom = MYSQL_RESULT($result,$i,"room_name");
					$hidden_pt = MYSQL_RESULT($result,$i,"teacher_name");
					$hidden_pday = MYSQL_RESULT($result,$i,"day_id");
					$hidden_pstime = MYSQL_RESULT($result,$i,"time_s_id");
			 
			 if ($hidden_pday == 5 && $hidden_pstime == 21){	
			  		echo $hidden_psubcat . '<br>'.$hidden_pt . '<br>'.$hidden_proom;
					end;
						}
						
	$i++;	 
			}
			} ?>
    </div></td>
  </tr>
  <tr>
    <td><div align="center" class="style15">6:30 - 7:30 <br />
      &nbsp;&nbsp;</div></td>
    <td><div align="center" class="style12">
      <?php
			$pCourse =$_REQUEST['pCourse'];
			$pSy =$_REQUEST['pSy'];
			$psem=$_REQUEST['psem'];

			$result = mysql_query("SELECT `sched`.*,`room`.`room_name` ,`course`.`course_yrSec`,`subjects`.`sub_code`,`profile`.`teacher_name`,`school_yr`.`school_year` FROM `sched`,`room`,`course`,`subjects`,`profile` ,`school_yr`  WHERE sched.room_id=room.room_id and sched.course_id=course.course_id and sched.sub_id=subjects.sub_id and sched.teacher_id=profile.teacher_id
 and sched.year_id=school_yr.year_id HAVING course_id='$pCourse' and sem_id='$psem' and year_id='$pSy'
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

					$hidden_psubcat = MYSQL_RESULT($result,$i,"sub_code");
					$hidden_pcourse = MYSQL_RESULT($result,$i,"course_yrSec");
					$hidden_proom = MYSQL_RESULT($result,$i,"room_name");
					$hidden_pt = MYSQL_RESULT($result,$i,"teacher_name");
					$hidden_pday = MYSQL_RESULT($result,$i,"day_id");
					$hidden_pstime = MYSQL_RESULT($result,$i,"time_s_id");
			 
			 if ($hidden_pday == 1 && $hidden_pstime == 23){	
			  		echo $hidden_psubcat . '<br>'.$hidden_pt . '<br>'.$hidden_proom;
					end;
						}
						
	$i++;	 
			}
			} ?>
    </div></td>
    <td><div align="center" class="style12">
      <?php
			$pCourse =$_REQUEST['pCourse'];
			$pSy =$_REQUEST['pSy'];
			$psem=$_REQUEST['psem'];

			$result = mysql_query("SELECT `sched`.*,`room`.`room_name` ,`course`.`course_yrSec`,`subjects`.`sub_code`,`profile`.`teacher_name`,`school_yr`.`school_year` FROM `sched`,`room`,`course`,`subjects`,`profile` ,`school_yr`  WHERE sched.room_id=room.room_id and sched.course_id=course.course_id and sched.sub_id=subjects.sub_id and sched.teacher_id=profile.teacher_id
 and sched.year_id=school_yr.year_id HAVING course_id='$pCourse' and sem_id='$psem' and year_id='$pSy'
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

					$hidden_psubcat = MYSQL_RESULT($result,$i,"sub_code");
					$hidden_pcourse = MYSQL_RESULT($result,$i,"course_yrSec");
					$hidden_proom = MYSQL_RESULT($result,$i,"room_name");
					$hidden_pt = MYSQL_RESULT($result,$i,"teacher_name");
					$hidden_pday = MYSQL_RESULT($result,$i,"day_id");
					$hidden_pstime = MYSQL_RESULT($result,$i,"time_s_id");
			 
			 if ($hidden_pday == 2 && $hidden_pstime == 23){	
			  		echo $hidden_psubcat . '<br>'.$hidden_pt . '<br>'.$hidden_proom;
					end;
						}
						
	$i++;	 
			}
			} ?>
    </div></td>
    <td><div align="center" class="style12">
      <?php
			$pCourse =$_REQUEST['pCourse'];
			$pSy =$_REQUEST['pSy'];
			$psem=$_REQUEST['psem'];

			$result = mysql_query("SELECT `sched`.*,`room`.`room_name` ,`course`.`course_yrSec`,`subjects`.`sub_code`,`profile`.`teacher_name`,`school_yr`.`school_year` FROM `sched`,`room`,`course`,`subjects`,`profile` ,`school_yr`  WHERE sched.room_id=room.room_id and sched.course_id=course.course_id and sched.sub_id=subjects.sub_id and sched.teacher_id=profile.teacher_id
 and sched.year_id=school_yr.year_id HAVING course_id='$pCourse' and sem_id='$psem' and year_id='$pSy'
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

					$hidden_psubcat = MYSQL_RESULT($result,$i,"sub_code");
					$hidden_pcourse = MYSQL_RESULT($result,$i,"course_yrSec");
					$hidden_proom = MYSQL_RESULT($result,$i,"room_name");
					$hidden_pt = MYSQL_RESULT($result,$i,"teacher_name");
					$hidden_pday = MYSQL_RESULT($result,$i,"day_id");
					$hidden_pstime = MYSQL_RESULT($result,$i,"time_s_id");
			 
			 if ($hidden_pday == 3 && $hidden_pstime == 23){	
			  		echo $hidden_psubcat . '<br>'.$hidden_pt . '<br>'.$hidden_proom;
					end;
						}
						
	$i++;	 
			}
			} ?>
    </div></td>
    <td><div align="center" class="style12">
      <?php
			$pCourse =$_REQUEST['pCourse'];
			$pSy =$_REQUEST['pSy'];
			$psem=$_REQUEST['psem'];

			$result = mysql_query("SELECT `sched`.*,`room`.`room_name` ,`course`.`course_yrSec`,`subjects`.`sub_code`,`profile`.`teacher_name`,`school_yr`.`school_year` FROM `sched`,`room`,`course`,`subjects`,`profile` ,`school_yr`  WHERE sched.room_id=room.room_id and sched.course_id=course.course_id and sched.sub_id=subjects.sub_id and sched.teacher_id=profile.teacher_id
 and sched.year_id=school_yr.year_id HAVING course_id='$pCourse' and sem_id='$psem' and year_id='$pSy'
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

					$hidden_psubcat = MYSQL_RESULT($result,$i,"sub_code");
					$hidden_pcourse = MYSQL_RESULT($result,$i,"course_yrSec");
					$hidden_proom = MYSQL_RESULT($result,$i,"room_name");
					$hidden_pt = MYSQL_RESULT($result,$i,"teacher_name");
					$hidden_pday = MYSQL_RESULT($result,$i,"day_id");
					$hidden_pstime = MYSQL_RESULT($result,$i,"time_s_id");
			 
			 if ($hidden_pday == 4 && $hidden_pstime == 23){	
			  		echo $hidden_psubcat . '<br>'.$hidden_pt . '<br>'.$hidden_proom;
					end;
						}
						
	$i++;	 
			}
			} ?>
    </div></td>
    <td><div align="center" class="style12">
      <?php
			$pCourse =$_REQUEST['pCourse'];
			$pSy =$_REQUEST['pSy'];
			$psem=$_REQUEST['psem'];

			$result = mysql_query("SELECT `sched`.*,`room`.`room_name` ,`course`.`course_yrSec`,`subjects`.`sub_code`,`profile`.`teacher_name`,`school_yr`.`school_year` FROM `sched`,`room`,`course`,`subjects`,`profile` ,`school_yr`  WHERE sched.room_id=room.room_id and sched.course_id=course.course_id and sched.sub_id=subjects.sub_id and sched.teacher_id=profile.teacher_id
 and sched.year_id=school_yr.year_id HAVING course_id='$pCourse' and sem_id='$psem' and year_id='$pSy'
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

					$hidden_psubcat = MYSQL_RESULT($result,$i,"sub_code");
					$hidden_pcourse = MYSQL_RESULT($result,$i,"course_yrSec");
					$hidden_proom = MYSQL_RESULT($result,$i,"room_name");
					$hidden_pt = MYSQL_RESULT($result,$i,"teacher_name");
					$hidden_pday = MYSQL_RESULT($result,$i,"day_id");
					$hidden_pstime = MYSQL_RESULT($result,$i,"time_s_id");
			 
			 if ($hidden_pday == 5 && $hidden_pstime == 23){	
			  		echo $hidden_psubcat . '<br>'.$hidden_pt . '<br>'.$hidden_proom;
					end;
						}
						
	$i++;	 
			}
			} ?>
    </div></td>
  </tr>
  <tr>
    <td><div align="center" class="style15">7:30 - 8:30 <br />
      &nbsp;&nbsp;</div></td>
    <td><div align="center" class="style12">
      <?php
			$pCourse =$_REQUEST['pCourse'];
			$pSy =$_REQUEST['pSy'];
			$psem=$_REQUEST['psem'];

			$result = mysql_query("SELECT `sched`.*,`room`.`room_name` ,`course`.`course_yrSec`,`subjects`.`sub_code`,`profile`.`teacher_name`,`school_yr`.`school_year` FROM `sched`,`room`,`course`,`subjects`,`profile` ,`school_yr`  WHERE sched.room_id=room.room_id and sched.course_id=course.course_id and sched.sub_id=subjects.sub_id and sched.teacher_id=profile.teacher_id
 and sched.year_id=school_yr.year_id HAVING course_id='$pCourse' and sem_id='$psem' and year_id='$pSy'
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

					$hidden_psubcat = MYSQL_RESULT($result,$i,"sub_code");
					$hidden_pcourse = MYSQL_RESULT($result,$i,"course_yrSec");
					$hidden_proom = MYSQL_RESULT($result,$i,"room_name");
					$hidden_pt = MYSQL_RESULT($result,$i,"teacher_name");
					$hidden_pday = MYSQL_RESULT($result,$i,"day_id");
					$hidden_pstime = MYSQL_RESULT($result,$i,"time_s_id");
			 
			 if ($hidden_pday == 1 && $hidden_pstime == 25){	
			  		echo $hidden_psubcat . '<br>'.$hidden_pt . '<br>'.$hidden_proom;
					end;
						}
						
	$i++;	 
			}
			} ?>
    </div></td>
    <td><div align="center" class="style12">
      <?php
			$pCourse =$_REQUEST['pCourse'];
			$pSy =$_REQUEST['pSy'];
			$psem=$_REQUEST['psem'];

			$result = mysql_query("SELECT `sched`.*,`room`.`room_name` ,`course`.`course_yrSec`,`subjects`.`sub_code`,`profile`.`teacher_name`,`school_yr`.`school_year` FROM `sched`,`room`,`course`,`subjects`,`profile` ,`school_yr`  WHERE sched.room_id=room.room_id and sched.course_id=course.course_id and sched.sub_id=subjects.sub_id and sched.teacher_id=profile.teacher_id
 and sched.year_id=school_yr.year_id HAVING course_id='$pCourse' and sem_id='$psem' and year_id='$pSy'
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

					$hidden_psubcat = MYSQL_RESULT($result,$i,"sub_code");
					$hidden_pcourse = MYSQL_RESULT($result,$i,"course_yrSec");
					$hidden_proom = MYSQL_RESULT($result,$i,"room_name");
					$hidden_pt = MYSQL_RESULT($result,$i,"teacher_name");
					$hidden_pday = MYSQL_RESULT($result,$i,"day_id");
					$hidden_pstime = MYSQL_RESULT($result,$i,"time_s_id");
			 
			 if ($hidden_pday == 2 && $hidden_pstime == 25){	
			  		echo $hidden_psubcat . '<br>'.$hidden_pt . '<br>'.$hidden_proom;
					end;
						}
						
	$i++;	 
			}
			} ?>
    </div></td>
    <td><div align="center" class="style12">
      <?php
			$pCourse =$_REQUEST['pCourse'];
			$pSy =$_REQUEST['pSy'];
			$psem=$_REQUEST['psem'];

			$result = mysql_query("SELECT `sched`.*,`room`.`room_name` ,`course`.`course_yrSec`,`subjects`.`sub_code`,`profile`.`teacher_name`,`school_yr`.`school_year` FROM `sched`,`room`,`course`,`subjects`,`profile` ,`school_yr`  WHERE sched.room_id=room.room_id and sched.course_id=course.course_id and sched.sub_id=subjects.sub_id and sched.teacher_id=profile.teacher_id
 and sched.year_id=school_yr.year_id HAVING course_id='$pCourse' and sem_id='$psem' and year_id='$pSy'
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

					$hidden_psubcat = MYSQL_RESULT($result,$i,"sub_code");
					$hidden_pcourse = MYSQL_RESULT($result,$i,"course_yrSec");
					$hidden_proom = MYSQL_RESULT($result,$i,"room_name");
					$hidden_pt = MYSQL_RESULT($result,$i,"teacher_name");
					$hidden_pday = MYSQL_RESULT($result,$i,"day_id");
					$hidden_pstime = MYSQL_RESULT($result,$i,"time_s_id");
			 
			 if ($hidden_pday == 3 && $hidden_pstime == 25){	
			  		echo $hidden_psubcat . '<br>'.$hidden_pt . '<br>'.$hidden_proom;
					end;
						}
						
	$i++;	 
			}
			} ?>
    </div></td>
    <td><div align="center" class="style12">
      <?php
			$pCourse =$_REQUEST['pCourse'];
			$pSy =$_REQUEST['pSy'];
			$psem=$_REQUEST['psem'];

			$result = mysql_query("SELECT `sched`.*,`room`.`room_name` ,`course`.`course_yrSec`,`subjects`.`sub_code`,`profile`.`teacher_name`,`school_yr`.`school_year` FROM `sched`,`room`,`course`,`subjects`,`profile` ,`school_yr`  WHERE sched.room_id=room.room_id and sched.course_id=course.course_id and sched.sub_id=subjects.sub_id and sched.teacher_id=profile.teacher_id
 and sched.year_id=school_yr.year_id HAVING course_id='$pCourse' and sem_id='$psem' and year_id='$pSy'
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

					$hidden_psubcat = MYSQL_RESULT($result,$i,"sub_code");
					$hidden_pcourse = MYSQL_RESULT($result,$i,"course_yrSec");
					$hidden_proom = MYSQL_RESULT($result,$i,"room_name");
					$hidden_pt = MYSQL_RESULT($result,$i,"teacher_name");
					$hidden_pday = MYSQL_RESULT($result,$i,"day_id");
					$hidden_pstime = MYSQL_RESULT($result,$i,"time_s_id");
			 
			 if ($hidden_pday == 4 && $hidden_pstime == 25){	
			  		echo $hidden_psubcat . '<br>'.$hidden_pt . '<br>'.$hidden_proom;
					end;
						}
						
	$i++;	 
			}
			} ?>
    </div></td>
    <td><div align="center" class="style12">
      <?php
			$pCourse =$_REQUEST['pCourse'];
			$pSy =$_REQUEST['pSy'];
			$psem=$_REQUEST['psem'];

			$result = mysql_query("SELECT `sched`.*,`room`.`room_name` ,`course`.`course_yrSec`,`subjects`.`sub_code`,`profile`.`teacher_name`,`school_yr`.`school_year` FROM `sched`,`room`,`course`,`subjects`,`profile` ,`school_yr`  WHERE sched.room_id=room.room_id and sched.course_id=course.course_id and sched.sub_id=subjects.sub_id and sched.teacher_id=profile.teacher_id
 and sched.year_id=school_yr.year_id HAVING course_id='$pCourse' and sem_id='$psem' and year_id='$pSy'
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

					$hidden_psubcat = MYSQL_RESULT($result,$i,"sub_code");
					$hidden_pcourse = MYSQL_RESULT($result,$i,"course_yrSec");
					$hidden_proom = MYSQL_RESULT($result,$i,"room_name");
					$hidden_pt = MYSQL_RESULT($result,$i,"teacher_name");
					$hidden_pday = MYSQL_RESULT($result,$i,"day_id");
					$hidden_pstime = MYSQL_RESULT($result,$i,"time_s_id");
			 
			 if ($hidden_pday == 5 && $hidden_pstime == 25){	
			  		echo $hidden_psubcat . '<br>'.$hidden_pt . '<br>'.$hidden_proom;
					end;
						}
						
	$i++;	 
			}
			} ?>
    </div></td>
  </tr>
</table>
<p>&nbsp;</p>
		    <p>
		      <input type="submit" name="cmdSubmit" value="Report" />
		      <br />		  
	          <br />
          </p>
	    </div>
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
		  <p align="center"><span class="style4"><a href="help.php">Help</a> | <a href="about_dev.php">Developer</a>| <a href="about_sched.php">Scheduling System</a>| <a href="contact.php">Contact Us</a>| <a href="www.chmsc.edu.ph">CHMSC </a></span></p>
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
		
		
		
</script>	

<script language="javascript" >
	var form = document.forms[0];
	//purpose?: to retrieve what users last input on the field..
	form.pcourse.value = ("<?PHP echo $_POST['hidden_pcourse']; ?>");
	form.psy.value = ("<?PHP echo $_POST['hidden_psem']; ?>");
	form.psem.value = ("<?PHP echo $_POST['hidden_psem']; ?>");
	//alert (form.pCityM.value);				
</script>