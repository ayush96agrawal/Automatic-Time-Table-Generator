<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>
<style type="text/css">
<!--
.style3 {font-family: Verdana, Arial, Helvetica, sans-serif}
.style7 {font-size: 14px}
.style10 {font-size: 16px}
.style11 {
	font-size: 14px;
	font-weight: bold;
}
.style12 {font-family: Verdana, Arial, Helvetica, sans-serif; font-size: 14px; }
.style13 {font-family: Verdana, Arial, Helvetica, sans-serif; font-size: 13px; }
-->
</style>
</head>

<body>

                <p align="center">
                  <?php

 		 require ("../includes/dbconnection.php");
?>
                 
                 <span class="style32 style3"><span class="style10">Republic of the Philippines <br />
                    <strong>Carlos Hilado Memorial State College </strong><br /> 
                    Mabini St., Talisay City </span><br />
                    <br /> 
                    <span class="style11">Individual Teacher's Program </span></span>
                    <span class="style12">
                    <br />
                    <?php 	$pSy =$_REQUEST['pSy'];				
				$result = mysql_query("SELECT * FROM school_yr HAVING year_id='$pSy'");
				
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
			
			$sy = MYSQL_RESULT($result,$i,"school_year");
				
				
				}
				$psem=$_REQUEST['psem'];
				$result = mysql_query("SELECT * FROM sem HAVING sem_id='$psem'");
				
if (!$result) 
		{
		die("Query to show fields from table failed");
		}
			$numberOfRows = MYSQL_NUMROWS($result);
	
			If ($numberOfRows == 0) 
				{
				}
			else if ($numberOfRows > 0) 
				{
				$i=0;
			
			$sem = MYSQL_RESULT($result,$i,"semester");
				}
				echo $sem.', '. $sy;?> 
                     <?php
				
			$pT =$_REQUEST['pT'];
			$pSy =$_REQUEST['pSy'];
			$psem=$_REQUEST['psem'];
		//	$t = $_REQUEST[$t];
			
				$pT =$_REQUEST['pT'];
				$result = mysql_query("SELECT * FROM profile HAVING teacher_id='$pT'");
				
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
			
			$teacher = MYSQL_RESULT($result,$i,"teacher_name");
			$acad = MYSQL_RESULT($result,$i,"acad_rank");
			$designation = MYSQL_RESULT($result,$i,"designation");
				
				
				}
				
				?>
                    </span></p>
                 
                <table width="725" border="0" align="center" >
              <tr>
                <td width="149" height="34" class="style3"><span class="style32">Name of Faculty: </span></td>
                <td colspan = "4" align="left" class="style3"><span class="style7"><strong><u><?php echo $teacher ?></u></strong></span></td>				
                <td width="290" class="style3">Total No. of Hours   :<u>&nbsp;&nbsp;<?php

			$pT =$_REQUEST['pT'];
			$pSy =$_REQUEST['pSy'];
			$psem=$_REQUEST['psem'];

			$result = mysql_query("SELECT `sched`.*,`room`.`room_name` ,`course`.`course_yrSec`,`subjects`.`sub_code`,`profile`.`teacher_name` ,`timestart`.`time_s`,`day`.`day_name`,`school_yr`.`school_year` FROM `sched`,`room`,`course`,`subjects`,`profile`,`timestart` ,`day`,`school_yr`  WHERE sched.room_id=room.room_id and sched.course_id=course.course_id and sched.sub_id=subjects.sub_id and sched.teacher_id=profile.teacher_id and sched.time_s_id=timestart.time_s_id and sched.day_id=day.day_id 
 and sched.year_id=school_yr.year_id HAVING teacher_id='$pT' and sem_id='$psem' and year_id='$pSy'
  			");
		if (!$result) 
			{
			die("Query to show fields from table failed");
			}
		$numberOfRows = MYSQL_NUMROWS($result);
		
		echo $numberOfRows;
		
	?>&nbsp;&nbsp;</u></td>
				
			  </tr>
				<tr>
				<td class="style3">Academic Rank: </td>
				<td  colspan = "4" class="style3"><u><?php echo $acad ?></u></td>
				

	</tr>
	<tr>
				<td class="style3">Designation: </td>
				<td  colspan = "4" class="style3"><u><?php echo $designation ?></u></td>
			
			</tr>
				
</table>
                <br />
                <table width="723" border="1" align="center">
                  <tr>
                    <td width="116"><div align="center" class="style3">TIME</div></td>
                    <td width="112"><div align="center" class="style3">MONDAY</div></td>
                    <td width="105"><div align="center" class="style3">TUESDAY</div></td>
                    <td width="113"><div align="center" class="style3">WEDNESDAY</div></td>
                    <td width="110"><div align="center" class="style3">THURSDAY</div></td>
                    <td width="127"><div align="center" class="style3">FRIDAY</div></td>
                  </tr>
                  <tr>
                    <td><div align="center" class="style13">7:30 - 8:30 <br />
                      &nbsp;&nbsp; </div></td>
                    <td><div align="center" class="style12">
                        <?php
			  $pT =$_REQUEST['pT'];
			$pSy =$_REQUEST['pSy'];
			$psem=$_REQUEST['psem'];

			$result = mysql_query("SELECT `sched`.*,`room`.`room_name` ,`course`.`course_yrSec`,`subjects`.`sub_code`,`profile`.`teacher_name`,`school_yr`.`school_year` FROM `sched`,`room`,`course`,`subjects`,`profile` ,`school_yr`  WHERE sched.room_id=room.room_id and sched.course_id=course.course_id and sched.sub_id=subjects.sub_id and sched.teacher_id=profile.teacher_id
 and sched.year_id=school_yr.year_id HAVING teacher_id='$pT' and sem_id='$psem' and year_id='$pSy'
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
			  		echo $hidden_pcourse . '<br>'.$hidden_psubcat . '<br>'.$hidden_proom;
					end;
						}
						
	$i++;	 
			}
			} ?>
                    </div></td>
                    <td><div align="center" class="style12">
                        <?php
			  $pT =$_REQUEST['pT'];
			$pSy =$_REQUEST['pSy'];
			$psem=$_REQUEST['psem'];

			$result = mysql_query("SELECT `sched`.*,`room`.`room_name` ,`course`.`course_yrSec`,`subjects`.`sub_code`,`profile`.`teacher_name`,`school_yr`.`school_year` FROM `sched`,`room`,`course`,`subjects`,`profile` ,`school_yr`  WHERE sched.room_id=room.room_id and sched.course_id=course.course_id and sched.sub_id=subjects.sub_id and sched.teacher_id=profile.teacher_id
 and sched.year_id=school_yr.year_id HAVING teacher_id='$pT' and sem_id='$psem' and year_id='$pSy'
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
			  		echo $hidden_pcourse . '<br>'.$hidden_psubcat . '<br>'.$hidden_proom;
					end;
						}
						
	$i++;	 
			}
			} ?>
                    </div></td>
                    <td><div align="center" class="style12">
                        <?php
			  $pT =$_REQUEST['pT'];
			$pSy =$_REQUEST['pSy'];
			$psem=$_REQUEST['psem'];

			$result = mysql_query("SELECT `sched`.*,`room`.`room_name` ,`course`.`course_yrSec`,`subjects`.`sub_code`,`profile`.`teacher_name`,`school_yr`.`school_year` FROM `sched`,`room`,`course`,`subjects`,`profile` ,`school_yr`  WHERE sched.room_id=room.room_id and sched.course_id=course.course_id and sched.sub_id=subjects.sub_id and sched.teacher_id=profile.teacher_id
 and sched.year_id=school_yr.year_id HAVING teacher_id='$pT' and sem_id='$psem' and year_id='$pSy'
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
			  		echo $hidden_pcourse . '<br>'.$hidden_psubcat . '<br>'.$hidden_proom;
					end;
						}
						
	$i++;	 
			}
			} ?>
                    </div></td>
                    <td><div align="center" class="style12">
                        <?php
			  $pT =$_REQUEST['pT'];
			$pSy =$_REQUEST['pSy'];
			$psem=$_REQUEST['psem'];

			$result = mysql_query("SELECT `sched`.*,`room`.`room_name` ,`course`.`course_yrSec`,`subjects`.`sub_code`,`profile`.`teacher_name`,`school_yr`.`school_year` FROM `sched`,`room`,`course`,`subjects`,`profile` ,`school_yr`  WHERE sched.room_id=room.room_id and sched.course_id=course.course_id and sched.sub_id=subjects.sub_id and sched.teacher_id=profile.teacher_id
 and sched.year_id=school_yr.year_id HAVING teacher_id='$pT' and sem_id='$psem' and year_id='$pSy'
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
			  		echo $hidden_pcourse . '<br>'.$hidden_psubcat . '<br>'.$hidden_proom;
					end;
						}
						
	$i++;	 
			}
			} ?>
                    </div></td>
                    <td><div align="center" class="style12">
                        <?php
			  $pT =$_REQUEST['pT'];
			$pSy =$_REQUEST['pSy'];
			$psem=$_REQUEST['psem'];

			$result = mysql_query("SELECT `sched`.*,`room`.`room_name` ,`course`.`course_yrSec`,`subjects`.`sub_code`,`profile`.`teacher_name`,`school_yr`.`school_year` FROM `sched`,`room`,`course`,`subjects`,`profile` ,`school_yr`  WHERE sched.room_id=room.room_id and sched.course_id=course.course_id and sched.sub_id=subjects.sub_id and sched.teacher_id=profile.teacher_id
 and sched.year_id=school_yr.year_id HAVING teacher_id='$pT' and sem_id='$psem' and year_id='$pSy'
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
			  		echo $hidden_pcourse . '<br>'.$hidden_psubcat . '<br>'.$hidden_proom;
					end;
						}
						
	$i++;	 
			}
			} ?>
                    </div></td>
                  </tr>
                  <tr>
                    <td><div align="center" class="style13">8:30 - 9:30 <br />
                      &nbsp;&nbsp; </div></td>
                    <td><div align="center" class="style12">
                        <?php
			  $pT =$_REQUEST['pT'];
			$pSy =$_REQUEST['pSy'];
			$psem=$_REQUEST['psem'];

			$result = mysql_query("SELECT `sched`.*,`room`.`room_name` ,`course`.`course_yrSec`,`subjects`.`sub_code`,`profile`.`teacher_name`,`school_yr`.`school_year` FROM `sched`,`room`,`course`,`subjects`,`profile` ,`school_yr`  WHERE sched.room_id=room.room_id and sched.course_id=course.course_id and sched.sub_id=subjects.sub_id and sched.teacher_id=profile.teacher_id
 and sched.year_id=school_yr.year_id HAVING teacher_id='$pT' and sem_id='$psem' and year_id='$pSy'
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
			  		echo $hidden_pcourse . '<br>'.$hidden_psubcat . '<br>'.$hidden_proom;
					end;
						}
						
	$i++;	 
			}
			} ?>
                      &nbsp;</div></td>
                    <td><div align="center" class="style12">
                        <?php
			  $pT =$_REQUEST['pT'];
			$pSy =$_REQUEST['pSy'];
			$psem=$_REQUEST['psem'];

			$result = mysql_query("SELECT `sched`.*,`room`.`room_name` ,`course`.`course_yrSec`,`subjects`.`sub_code`,`profile`.`teacher_name`,`school_yr`.`school_year` FROM `sched`,`room`,`course`,`subjects`,`profile` ,`school_yr`  WHERE sched.room_id=room.room_id and sched.course_id=course.course_id and sched.sub_id=subjects.sub_id and sched.teacher_id=profile.teacher_id
 and sched.year_id=school_yr.year_id HAVING teacher_id='$pT' and sem_id='$psem' and year_id='$pSy'
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
			  		echo $hidden_pcourse . '<br>'.$hidden_psubcat . '<br>'.$hidden_proom;
					end;
						}
						
	$i++;	 
			}
			} ?>
                    </div></td>
                    <td><div align="center" class="style12">
                        <?php
			  $pT =$_REQUEST['pT'];
			$pSy =$_REQUEST['pSy'];
			$psem=$_REQUEST['psem'];

			$result = mysql_query("SELECT `sched`.*,`room`.`room_name` ,`course`.`course_yrSec`,`subjects`.`sub_code`,`profile`.`teacher_name`,`school_yr`.`school_year` FROM `sched`,`room`,`course`,`subjects`,`profile` ,`school_yr`  WHERE sched.room_id=room.room_id and sched.course_id=course.course_id and sched.sub_id=subjects.sub_id and sched.teacher_id=profile.teacher_id
 and sched.year_id=school_yr.year_id HAVING teacher_id='$pT' and sem_id='$psem' and year_id='$pSy'
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
			  		echo $hidden_pcourse . '<br>'.$hidden_psubcat . '<br>'.$hidden_proom;
					end;
						}
						
	$i++;	 
			}
			} ?>
                    </div></td>
                    <td><div align="center" class="style12">
                        <?php
			  $pT =$_REQUEST['pT'];
			$pSy =$_REQUEST['pSy'];
			$psem=$_REQUEST['psem'];

			$result = mysql_query("SELECT `sched`.*,`room`.`room_name` ,`course`.`course_yrSec`,`subjects`.`sub_code`,`profile`.`teacher_name`,`school_yr`.`school_year` FROM `sched`,`room`,`course`,`subjects`,`profile` ,`school_yr`  WHERE sched.room_id=room.room_id and sched.course_id=course.course_id and sched.sub_id=subjects.sub_id and sched.teacher_id=profile.teacher_id
 and sched.year_id=school_yr.year_id HAVING teacher_id='$pT' and sem_id='$psem' and year_id='$pSy'
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
			  		echo $hidden_pcourse . '<br>'.$hidden_psubcat . '<br>'.$hidden_proom;
					end;
						}
						
	$i++;	 
			}
			} ?>
                    </div></td>
                    <td><div align="center" class="style12">
                        <?php
			  $pT =$_REQUEST['pT'];
			$pSy =$_REQUEST['pSy'];
			$psem=$_REQUEST['psem'];

			$result = mysql_query("SELECT `sched`.*,`room`.`room_name` ,`course`.`course_yrSec`,`subjects`.`sub_code`,`profile`.`teacher_name`,`school_yr`.`school_year` FROM `sched`,`room`,`course`,`subjects`,`profile` ,`school_yr`  WHERE sched.room_id=room.room_id and sched.course_id=course.course_id and sched.sub_id=subjects.sub_id and sched.teacher_id=profile.teacher_id
 and sched.year_id=school_yr.year_id HAVING teacher_id='$pT' and sem_id='$psem' and year_id='$pSy'
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
			  		echo $hidden_pcourse . '<br>'.$hidden_psubcat . '<br>'.$hidden_proom;
					end;
						}
						
	$i++;	 
			}
			} ?>
                    </div></td>
                  </tr>
                  <tr>
                    <td><div align="center" class="style13">9:30 - 10:30 <br />
                      &nbsp;&nbsp; </div></td>
                    <td><div align="center" class="style12">
                        <?php
			  $pT =$_REQUEST['pT'];
			$pSy =$_REQUEST['pSy'];
			$psem=$_REQUEST['psem'];

			$result = mysql_query("SELECT `sched`.*,`room`.`room_name` ,`course`.`course_yrSec`,`subjects`.`sub_code`,`profile`.`teacher_name`,`school_yr`.`school_year` FROM `sched`,`room`,`course`,`subjects`,`profile` ,`school_yr`  WHERE sched.room_id=room.room_id and sched.course_id=course.course_id and sched.sub_id=subjects.sub_id and sched.teacher_id=profile.teacher_id
 and sched.year_id=school_yr.year_id HAVING teacher_id='$pT' and sem_id='$psem' and year_id='$pSy'
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
			  		echo $hidden_pcourse . '<br>'.$hidden_psubcat . '<br>'.$hidden_proom;
					end;
						}
						
	$i++;	 
			}
			} ?>
                    </div></td>
                    <td><div align="center" class="style12">
                        <?php
			  $pT =$_REQUEST['pT'];
			$pSy =$_REQUEST['pSy'];
			$psem=$_REQUEST['psem'];

			$result = mysql_query("SELECT `sched`.*,`room`.`room_name` ,`course`.`course_yrSec`,`subjects`.`sub_code`,`profile`.`teacher_name`,`school_yr`.`school_year` FROM `sched`,`room`,`course`,`subjects`,`profile` ,`school_yr`  WHERE sched.room_id=room.room_id and sched.course_id=course.course_id and sched.sub_id=subjects.sub_id and sched.teacher_id=profile.teacher_id
 and sched.year_id=school_yr.year_id HAVING teacher_id='$pT' and sem_id='$psem' and year_id='$pSy'
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
			  		echo $hidden_pcourse . '<br>'.$hidden_psubcat . '<br>'.$hidden_proom;
					end;
						}
						
	$i++;	 
			}
			} ?>
                    </div></td>
                    <td><div align="center" class="style12">
                        <?php
			  $pT =$_REQUEST['pT'];
			$pSy =$_REQUEST['pSy'];
			$psem=$_REQUEST['psem'];

			$result = mysql_query("SELECT `sched`.*,`room`.`room_name` ,`course`.`course_yrSec`,`subjects`.`sub_code`,`profile`.`teacher_name`,`school_yr`.`school_year` FROM `sched`,`room`,`course`,`subjects`,`profile` ,`school_yr`  WHERE sched.room_id=room.room_id and sched.course_id=course.course_id and sched.sub_id=subjects.sub_id and sched.teacher_id=profile.teacher_id
 and sched.year_id=school_yr.year_id HAVING teacher_id='$pT' and sem_id='$psem' and year_id='$pSy'
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
			  		echo $hidden_pcourse . '<br>'.$hidden_psubcat . '<br>'.$hidden_proom;
					end;
						}
						
	$i++;	 
			}
			} ?>
                    </div></td>
                    <td><div align="center" class="style12">
                        <?php
			  $pT =$_REQUEST['pT'];
			$pSy =$_REQUEST['pSy'];
			$psem=$_REQUEST['psem'];

			$result = mysql_query("SELECT `sched`.*,`room`.`room_name` ,`course`.`course_yrSec`,`subjects`.`sub_code`,`profile`.`teacher_name`,`school_yr`.`school_year` FROM `sched`,`room`,`course`,`subjects`,`profile` ,`school_yr`  WHERE sched.room_id=room.room_id and sched.course_id=course.course_id and sched.sub_id=subjects.sub_id and sched.teacher_id=profile.teacher_id
 and sched.year_id=school_yr.year_id HAVING teacher_id='$pT' and sem_id='$psem' and year_id='$pSy'
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
			  		echo $hidden_pcourse . '<br>'.$hidden_psubcat . '<br>'.$hidden_proom;
					end;
						}
						
	$i++;	 
			}
			} ?>
                    </div></td>
                    <td><div align="center" class="style12">
                        <?php
			  $pT =$_REQUEST['pT'];
			$pSy =$_REQUEST['pSy'];
			$psem=$_REQUEST['psem'];

			$result = mysql_query("SELECT `sched`.*,`room`.`room_name` ,`course`.`course_yrSec`,`subjects`.`sub_code`,`profile`.`teacher_name`,`school_yr`.`school_year` FROM `sched`,`room`,`course`,`subjects`,`profile` ,`school_yr`  WHERE sched.room_id=room.room_id and sched.course_id=course.course_id and sched.sub_id=subjects.sub_id and sched.teacher_id=profile.teacher_id
 and sched.year_id=school_yr.year_id HAVING teacher_id='$pT' and sem_id='$psem' and year_id='$pSy'
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
			  		echo $hidden_pcourse . '<br>'.$hidden_psubcat . '<br>'.$hidden_proom;
					end;
						}
						
	$i++;	 
			}
			} ?>
                    </div></td>
                  </tr>
                  <tr>
                    <td><div align="center" class="style13">10:30 - 11:30 <br />
                      &nbsp;&nbsp;</div></td>
                    <td><div align="center" class="style12">
                        <?php
			  $pT =$_REQUEST['pT'];
			$pSy =$_REQUEST['pSy'];
			$psem=$_REQUEST['psem'];

			$result = mysql_query("SELECT `sched`.*,`room`.`room_name` ,`course`.`course_yrSec`,`subjects`.`sub_code`,`profile`.`teacher_name`,`school_yr`.`school_year` FROM `sched`,`room`,`course`,`subjects`,`profile` ,`school_yr`  WHERE sched.room_id=room.room_id and sched.course_id=course.course_id and sched.sub_id=subjects.sub_id and sched.teacher_id=profile.teacher_id
 and sched.year_id=school_yr.year_id HAVING teacher_id='$pT' and sem_id='$psem' and year_id='$pSy'
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
			  		echo $hidden_pcourse . '<br>'.$hidden_psubcat . '<br>'.$hidden_proom;
					end;
						}
						
	$i++;	 
			}
			} ?>
                    </div></td>
                    <td><div align="center" class="style12">
                        <?php
			  $pT =$_REQUEST['pT'];
			$pSy =$_REQUEST['pSy'];
			$psem=$_REQUEST['psem'];

			$result = mysql_query("SELECT `sched`.*,`room`.`room_name` ,`course`.`course_yrSec`,`subjects`.`sub_code`,`profile`.`teacher_name`,`school_yr`.`school_year` FROM `sched`,`room`,`course`,`subjects`,`profile` ,`school_yr`  WHERE sched.room_id=room.room_id and sched.course_id=course.course_id and sched.sub_id=subjects.sub_id and sched.teacher_id=profile.teacher_id
 and sched.year_id=school_yr.year_id HAVING teacher_id='$pT' and sem_id='$psem' and year_id='$pSy'
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
			  		echo $hidden_pcourse . '<br>'.$hidden_psubcat . '<br>'.$hidden_proom;
					end;
						}
						
	$i++;	 
			}
			} ?>
                    </div></td>
                    <td><div align="center" class="style12">
                        <?php
			  $pT =$_REQUEST['pT'];
			$pSy =$_REQUEST['pSy'];
			$psem=$_REQUEST['psem'];

			$result = mysql_query("SELECT `sched`.*,`room`.`room_name` ,`course`.`course_yrSec`,`subjects`.`sub_code`,`profile`.`teacher_name`,`school_yr`.`school_year` FROM `sched`,`room`,`course`,`subjects`,`profile` ,`school_yr`  WHERE sched.room_id=room.room_id and sched.course_id=course.course_id and sched.sub_id=subjects.sub_id and sched.teacher_id=profile.teacher_id
 and sched.year_id=school_yr.year_id HAVING teacher_id='$pT' and sem_id='$psem' and year_id='$pSy'
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
			  		echo $hidden_pcourse . '<br>'.$hidden_psubcat . '<br>'.$hidden_proom;
					end;
						}
						
	$i++;	 
			}
			} ?>
                    </div></td>
                    <td><div align="center" class="style12">
                        <?php
			  $pT =$_REQUEST['pT'];
			$pSy =$_REQUEST['pSy'];
			$psem=$_REQUEST['psem'];

			$result = mysql_query("SELECT `sched`.*,`room`.`room_name` ,`course`.`course_yrSec`,`subjects`.`sub_code`,`profile`.`teacher_name`,`school_yr`.`school_year` FROM `sched`,`room`,`course`,`subjects`,`profile` ,`school_yr`  WHERE sched.room_id=room.room_id and sched.course_id=course.course_id and sched.sub_id=subjects.sub_id and sched.teacher_id=profile.teacher_id
 and sched.year_id=school_yr.year_id HAVING teacher_id='$pT' and sem_id='$psem' and year_id='$pSy' 
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
			  		echo $hidden_pcourse . '<br>'.$hidden_psubcat . '<br>'.$hidden_proom;
					end;
						}
						
	$i++;	 
			}
			} ?>
                    </div></td>
                    <td><div align="center" class="style12">
                        <?php
			  $pT =$_REQUEST['pT'];
			$pSy =$_REQUEST['pSy'];
			$psem=$_REQUEST['psem'];

			$result = mysql_query("SELECT `sched`.*,`room`.`room_name` ,`course`.`course_yrSec`,`subjects`.`sub_code`,`profile`.`teacher_name`,`school_yr`.`school_year` FROM `sched`,`room`,`course`,`subjects`,`profile` ,`school_yr`  WHERE sched.room_id=room.room_id and sched.course_id=course.course_id and sched.sub_id=subjects.sub_id and sched.teacher_id=profile.teacher_id
 and sched.year_id=school_yr.year_id HAVING teacher_id='$pT' and sem_id='$psem' and year_id='$pSy'
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
			  		echo $hidden_pcourse . '<br>'.$hidden_psubcat . '<br>'.$hidden_proom;
					end;
						}
						
	$i++;	 
			}
			} ?>
                    </div></td>
                  </tr>
                  <tr>
                    <td><div align="center" class="style13">11:30 - 12:30 <br />
                      &nbsp;&nbsp;</div></td>
                    <td><div align="center" class="style12">
                        <?php
			  $pT =$_REQUEST['pT'];
			$pSy =$_REQUEST['pSy'];
			$psem=$_REQUEST['psem'];

			$result = mysql_query("SELECT `sched`.*,`room`.`room_name` ,`course`.`course_yrSec`,`subjects`.`sub_code`,`profile`.`teacher_name`,`school_yr`.`school_year` FROM `sched`,`room`,`course`,`subjects`,`profile` ,`school_yr`  WHERE sched.room_id=room.room_id and sched.course_id=course.course_id and sched.sub_id=subjects.sub_id and sched.teacher_id=profile.teacher_id
 and sched.year_id=school_yr.year_id HAVING teacher_id='$pT' and sem_id='$psem' and year_id='$pSy'
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
			  		echo $hidden_pcourse . '<br>'.$hidden_psubcat . '<br>'.$hidden_proom;
					end;
						}
						
	$i++;	 
			}
			} ?>
                    </div></td>
                    <td><div align="center" class="style12">
                        <?php
			  $pT =$_REQUEST['pT'];
			$pSy =$_REQUEST['pSy'];
			$psem=$_REQUEST['psem'];

			$result = mysql_query("SELECT `sched`.*,`room`.`room_name` ,`course`.`course_yrSec`,`subjects`.`sub_code`,`profile`.`teacher_name`,`school_yr`.`school_year` FROM `sched`,`room`,`course`,`subjects`,`profile` ,`school_yr`  WHERE sched.room_id=room.room_id and sched.course_id=course.course_id and sched.sub_id=subjects.sub_id and sched.teacher_id=profile.teacher_id
 and sched.year_id=school_yr.year_id HAVING teacher_id='$pT' and sem_id='$psem' and year_id='$pSy'
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
			  		echo $hidden_pcourse . '<br>'.$hidden_psubcat . '<br>'.$hidden_proom;
					end;
						}
						
	$i++;	 
			}
			} ?>
                    </div></td>
                    <td><div align="center" class="style12">
                        <?php
			  $pT =$_REQUEST['pT'];
			$pSy =$_REQUEST['pSy'];
			$psem=$_REQUEST['psem'];

			$result = mysql_query("SELECT `sched`.*,`room`.`room_name` ,`course`.`course_yrSec`,`subjects`.`sub_code`,`profile`.`teacher_name`,`school_yr`.`school_year` FROM `sched`,`room`,`course`,`subjects`,`profile` ,`school_yr`  WHERE sched.room_id=room.room_id and sched.course_id=course.course_id and sched.sub_id=subjects.sub_id and sched.teacher_id=profile.teacher_id
 and sched.year_id=school_yr.year_id HAVING teacher_id='$pT' and sem_id='$psem' and year_id='$pSy'
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
			  		echo $hidden_pcourse . '<br>'.$hidden_psubcat . '<br>'.$hidden_proom;
					end;
						}
						
	$i++;	 
			}
			} ?>
                    </div></td>
                    <td><div align="center" class="style12">
                        <?php
			  $pT =$_REQUEST['pT'];
			$pSy =$_REQUEST['pSy'];
			$psem=$_REQUEST['psem'];

			$result = mysql_query("SELECT `sched`.*,`room`.`room_name` ,`course`.`course_yrSec`,`subjects`.`sub_code`,`profile`.`teacher_name`,`school_yr`.`school_year` FROM `sched`,`room`,`course`,`subjects`,`profile` ,`school_yr`  WHERE sched.room_id=room.room_id and sched.course_id=course.course_id and sched.sub_id=subjects.sub_id and sched.teacher_id=profile.teacher_id
 and sched.year_id=school_yr.year_id HAVING teacher_id='$pT' and sem_id='$psem' and year_id='$pSy'
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
			  		echo $hidden_pcourse . '<br>'.$hidden_psubcat . '<br>'.$hidden_proom;
					end;
						}
						
	$i++;	 
			}
			} ?>
                    </div></td>
                    <td><div align="center" class="style12">
                        <?php
			  $pT =$_REQUEST['pT'];
			$pSy =$_REQUEST['pSy'];
			$psem=$_REQUEST['psem'];

			$result = mysql_query("SELECT `sched`.*,`room`.`room_name` ,`course`.`course_yrSec`,`subjects`.`sub_code`,`profile`.`teacher_name`,`school_yr`.`school_year` FROM `sched`,`room`,`course`,`subjects`,`profile` ,`school_yr`  WHERE sched.room_id=room.room_id and sched.course_id=course.course_id and sched.sub_id=subjects.sub_id and sched.teacher_id=profile.teacher_id
 and sched.year_id=school_yr.year_id HAVING teacher_id='$pT' and sem_id='$psem' and year_id='$pSy'
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
			  		echo $hidden_pcourse . '<br>'.$hidden_psubcat . '<br>'.$hidden_proom;
					end;
						}
						
	$i++;	 
			}
			} ?>
                    </div></td>
                  </tr>
                  <tr>
                    <td><div align="center" class="style13">12:30 - 1:30 <br />
                      &nbsp;&nbsp;</div></td>
                    <td><div align="center" class="style12">
                        <?php
			  $pT =$_REQUEST['pT'];
			$pSy =$_REQUEST['pSy'];
			$psem=$_REQUEST['psem'];

			$result = mysql_query("SELECT `sched`.*,`room`.`room_name` ,`course`.`course_yrSec`,`subjects`.`sub_code`,`profile`.`teacher_name`,`school_yr`.`school_year` FROM `sched`,`room`,`course`,`subjects`,`profile` ,`school_yr`  WHERE sched.room_id=room.room_id and sched.course_id=course.course_id and sched.sub_id=subjects.sub_id and sched.teacher_id=profile.teacher_id
 and sched.year_id=school_yr.year_id HAVING teacher_id='$pT' and sem_id='$psem' and year_id='$pSy'
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
			  		echo $hidden_pcourse . '<br>'.$hidden_psubcat . '<br>'.$hidden_proom;
					end;
						}
						
	$i++;	 
			}
			} ?>
                    </div></td>
                    <td><div align="center" class="style12">
                        <?php
			  $pT =$_REQUEST['pT'];
			$pSy =$_REQUEST['pSy'];
			$psem=$_REQUEST['psem'];

			$result = mysql_query("SELECT `sched`.*,`room`.`room_name` ,`course`.`course_yrSec`,`subjects`.`sub_code`,`profile`.`teacher_name`,`school_yr`.`school_year` FROM `sched`,`room`,`course`,`subjects`,`profile` ,`school_yr`  WHERE sched.room_id=room.room_id and sched.course_id=course.course_id and sched.sub_id=subjects.sub_id and sched.teacher_id=profile.teacher_id
 and sched.year_id=school_yr.year_id HAVING teacher_id='$pT' and sem_id='$psem' and year_id='$pSy'
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
			  		echo $hidden_pcourse . '<br>'.$hidden_psubcat . '<br>'.$hidden_proom;
					end;
						}
						
	$i++;	 
			}
			} ?>
                    </div></td>
                    <td><div align="center" class="style12">
                        <?php
			  $pT =$_REQUEST['pT'];
			$pSy =$_REQUEST['pSy'];
			$psem=$_REQUEST['psem'];

			$result = mysql_query("SELECT `sched`.*,`room`.`room_name` ,`course`.`course_yrSec`,`subjects`.`sub_code`,`profile`.`teacher_name`,`school_yr`.`school_year` FROM `sched`,`room`,`course`,`subjects`,`profile` ,`school_yr`  WHERE sched.room_id=room.room_id and sched.course_id=course.course_id and sched.sub_id=subjects.sub_id and sched.teacher_id=profile.teacher_id
 and sched.year_id=school_yr.year_id HAVING teacher_id='$pT' and sem_id='$psem' and year_id='$pSy'
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
			  		echo $hidden_pcourse . '<br>'.$hidden_psubcat . '<br>'.$hidden_proom;
					end;
						}
						
	$i++;	 
			}
			} ?>
                    </div></td>
                    <td><div align="center" class="style12">
                        <?php
			  $pT =$_REQUEST['pT'];
			$pSy =$_REQUEST['pSy'];
			$psem=$_REQUEST['psem'];

			$result = mysql_query("SELECT `sched`.*,`room`.`room_name` ,`course`.`course_yrSec`,`subjects`.`sub_code`,`profile`.`teacher_name`,`school_yr`.`school_year` FROM `sched`,`room`,`course`,`subjects`,`profile` ,`school_yr`  WHERE sched.room_id=room.room_id and sched.course_id=course.course_id and sched.sub_id=subjects.sub_id and sched.teacher_id=profile.teacher_id
 and sched.year_id=school_yr.year_id HAVING teacher_id='$pT' and sem_id='$psem' and year_id='$pSy'
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
			  		echo $hidden_pcourse . '<br>'.$hidden_psubcat . '<br>'.$hidden_proom;
					end;
						}
						
	$i++;	 
			}
			} ?>
                    </div></td>
                    <td><div align="center" class="style12">
                        <?php
			  $pT =$_REQUEST['pT'];
			$pSy =$_REQUEST['pSy'];
			$psem=$_REQUEST['psem'];

			$result = mysql_query("SELECT `sched`.*,`room`.`room_name` ,`course`.`course_yrSec`,`subjects`.`sub_code`,`profile`.`teacher_name`,`school_yr`.`school_year` FROM `sched`,`room`,`course`,`subjects`,`profile` ,`school_yr`  WHERE sched.room_id=room.room_id and sched.course_id=course.course_id and sched.sub_id=subjects.sub_id and sched.teacher_id=profile.teacher_id
 and sched.year_id=school_yr.year_id HAVING teacher_id='$pT' and sem_id='$psem' and year_id='$pSy'
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
			  		echo $hidden_pcourse . '<br>'.$hidden_psubcat . '<br>'.$hidden_proom;
					end;
						}
						
	$i++;	 
			}
			} ?>
                    </div></td>
                  </tr>
                  <tr>
                    <td><div align="center" class="style13">1:30 - 2:30 <br />
                      &nbsp;&nbsp;</div></td>
                    <td><div align="center" class="style12">
                        <?php
			  $pT =$_REQUEST['pT'];
			$pSy =$_REQUEST['pSy'];
			$psem=$_REQUEST['psem'];

			$result = mysql_query("SELECT `sched`.*,`room`.`room_name` ,`course`.`course_yrSec`,`subjects`.`sub_code`,`profile`.`teacher_name`,`school_yr`.`school_year` FROM `sched`,`room`,`course`,`subjects`,`profile` ,`school_yr`  WHERE sched.room_id=room.room_id and sched.course_id=course.course_id and sched.sub_id=subjects.sub_id and sched.teacher_id=profile.teacher_id
 and sched.year_id=school_yr.year_id HAVING teacher_id='$pT' and sem_id='$psem' and year_id='$pSy'
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
			  		echo $hidden_pcourse . '<br>'.$hidden_psubcat . '<br>'.$hidden_proom;
					end;
						}
						
	$i++;	 
			}
			} ?>
                    </div></td>
                    <td><div align="center" class="style12">
                        <?php
			  $pT =$_REQUEST['pT'];
			$pSy =$_REQUEST['pSy'];
			$psem=$_REQUEST['psem'];

			$result = mysql_query("SELECT `sched`.*,`room`.`room_name` ,`course`.`course_yrSec`,`subjects`.`sub_code`,`profile`.`teacher_name`,`school_yr`.`school_year` FROM `sched`,`room`,`course`,`subjects`,`profile` ,`school_yr`  WHERE sched.room_id=room.room_id and sched.course_id=course.course_id and sched.sub_id=subjects.sub_id and sched.teacher_id=profile.teacher_id
 and sched.year_id=school_yr.year_id HAVING teacher_id='$pT' and sem_id='$psem' and year_id='$pSy'
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
			  		echo $hidden_pcourse . '<br>'.$hidden_psubcat . '<br>'.$hidden_proom;
					end;
						}
						
	$i++;	 
			}
			} ?>
                    </div></td>
                    <td><div align="center" class="style12">
                        <?php
			  $pT =$_REQUEST['pT'];
			$pSy =$_REQUEST['pSy'];
			$psem=$_REQUEST['psem'];

			$result = mysql_query("SELECT `sched`.*,`room`.`room_name` ,`course`.`course_yrSec`,`subjects`.`sub_code`,`profile`.`teacher_name`,`school_yr`.`school_year` FROM `sched`,`room`,`course`,`subjects`,`profile` ,`school_yr`  WHERE sched.room_id=room.room_id and sched.course_id=course.course_id and sched.sub_id=subjects.sub_id and sched.teacher_id=profile.teacher_id
 and sched.year_id=school_yr.year_id HAVING teacher_id='$pT' and sem_id='$psem' and year_id='$pSy'
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
			  		echo $hidden_pcourse . '<br>'.$hidden_psubcat . '<br>'.$hidden_proom;
					end;
						}
						
	$i++;	 
			}
			} ?>
                    </div></td>
                    <td><div align="center" class="style12">
                        <?php
			  $pT =$_REQUEST['pT'];
			$pSy =$_REQUEST['pSy'];
			$psem=$_REQUEST['psem'];

			$result = mysql_query("SELECT `sched`.*,`room`.`room_name` ,`course`.`course_yrSec`,`subjects`.`sub_code`,`profile`.`teacher_name`,`school_yr`.`school_year` FROM `sched`,`room`,`course`,`subjects`,`profile` ,`school_yr`  WHERE sched.room_id=room.room_id and sched.course_id=course.course_id and sched.sub_id=subjects.sub_id and sched.teacher_id=profile.teacher_id
 and sched.year_id=school_yr.year_id HAVING teacher_id='$pT' and sem_id='$psem' and year_id='$pSy'
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
			  		echo $hidden_pcourse . '<br>'.$hidden_psubcat . '<br>'.$hidden_proom;
					end;
						}
						
	$i++;	 
			}
			} ?>
                    </div></td>
                    <td><div align="center" class="style12">
                        <?php
			  $pT =$_REQUEST['pT'];
			$pSy =$_REQUEST['pSy'];
			$psem=$_REQUEST['psem'];

			$result = mysql_query("SELECT `sched`.*,`room`.`room_name` ,`course`.`course_yrSec`,`subjects`.`sub_code`,`profile`.`teacher_name`,`school_yr`.`school_year` FROM `sched`,`room`,`course`,`subjects`,`profile` ,`school_yr`  WHERE sched.room_id=room.room_id and sched.course_id=course.course_id and sched.sub_id=subjects.sub_id and sched.teacher_id=profile.teacher_id
 and sched.year_id=school_yr.year_id HAVING teacher_id='$pT' and sem_id='$psem' and year_id='$pSy'
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
			  		echo $hidden_pcourse . '<br>'.$hidden_psubcat . '<br>'.$hidden_proom;
					end;
						}
						
	$i++;	 
			}
			} ?>
                    </div></td>
                  </tr>
                  <tr>
                    <td><div align="center" class="style13">2:30 - 3:30 <br />
                      &nbsp;&nbsp;</div></td>
                    <td><div align="center" class="style12">
                        <?php
			  $pT =$_REQUEST['pT'];
			$pSy =$_REQUEST['pSy'];
			$psem=$_REQUEST['psem'];

			$result = mysql_query("SELECT `sched`.*,`room`.`room_name` ,`course`.`course_yrSec`,`subjects`.`sub_code`,`profile`.`teacher_name`,`school_yr`.`school_year` FROM `sched`,`room`,`course`,`subjects`,`profile` ,`school_yr`  WHERE sched.room_id=room.room_id and sched.course_id=course.course_id and sched.sub_id=subjects.sub_id and sched.teacher_id=profile.teacher_id
 and sched.year_id=school_yr.year_id HAVING teacher_id='$pT' and sem_id='$psem' and year_id='$pSy'
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
			  		echo $hidden_pcourse . '<br>'.$hidden_psubcat . '<br>'.$hidden_proom;
					end;
						}
						
	$i++;	 
			}
			} ?>
                    </div></td>
                    <td><div align="center" class="style12">
                        <?php
			  $pT =$_REQUEST['pT'];
			$pSy =$_REQUEST['pSy'];
			$psem=$_REQUEST['psem'];

			$result = mysql_query("SELECT `sched`.*,`room`.`room_name` ,`course`.`course_yrSec`,`subjects`.`sub_code`,`profile`.`teacher_name`,`school_yr`.`school_year` FROM `sched`,`room`,`course`,`subjects`,`profile` ,`school_yr`  WHERE sched.room_id=room.room_id and sched.course_id=course.course_id and sched.sub_id=subjects.sub_id and sched.teacher_id=profile.teacher_id
 and sched.year_id=school_yr.year_id HAVING teacher_id='$pT' and sem_id='$psem' and year_id='$pSy'
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
			  		echo $hidden_pcourse . '<br>'.$hidden_psubcat . '<br>'.$hidden_proom;
					end;
						}
						
	$i++;	 
			}
			} ?>
                    </div></td>
                    <td><div align="center" class="style12">
                        <?php
			  $pT =$_REQUEST['pT'];
			$pSy =$_REQUEST['pSy'];
			$psem=$_REQUEST['psem'];

			$result = mysql_query("SELECT `sched`.*,`room`.`room_name` ,`course`.`course_yrSec`,`subjects`.`sub_code`,`profile`.`teacher_name`,`school_yr`.`school_year` FROM `sched`,`room`,`course`,`subjects`,`profile` ,`school_yr`  WHERE sched.room_id=room.room_id and sched.course_id=course.course_id and sched.sub_id=subjects.sub_id and sched.teacher_id=profile.teacher_id
 and sched.year_id=school_yr.year_id HAVING teacher_id='$pT' and sem_id='$psem' and year_id='$pSy'
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
			  		echo $hidden_pcourse . '<br>'.$hidden_psubcat . '<br>'.$hidden_proom;
					end;
						}
						
	$i++;	 
			}
			} ?>
                    </div></td>
                    <td><div align="center" class="style12">
                        <?php
			  $pT =$_REQUEST['pT'];
			$pSy =$_REQUEST['pSy'];
			$psem=$_REQUEST['psem'];

			$result = mysql_query("SELECT `sched`.*,`room`.`room_name` ,`course`.`course_yrSec`,`subjects`.`sub_code`,`profile`.`teacher_name`,`school_yr`.`school_year` FROM `sched`,`room`,`course`,`subjects`,`profile` ,`school_yr`  WHERE sched.room_id=room.room_id and sched.course_id=course.course_id and sched.sub_id=subjects.sub_id and sched.teacher_id=profile.teacher_id
 and sched.year_id=school_yr.year_id HAVING teacher_id='$pT' and sem_id='$psem' and year_id='$pSy'
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
			  		echo $hidden_pcourse . '<br>'.$hidden_psubcat . '<br>'.$hidden_proom;
					end;
						}
						
	$i++;	 
			}
			} ?>
                    </div></td>
                    <td><div align="center" class="style12">
                        <?php
			  $pT =$_REQUEST['pT'];
			$pSy =$_REQUEST['pSy'];
			$psem=$_REQUEST['psem'];

			$result = mysql_query("SELECT `sched`.*,`room`.`room_name` ,`course`.`course_yrSec`,`subjects`.`sub_code`,`profile`.`teacher_name`,`school_yr`.`school_year` FROM `sched`,`room`,`course`,`subjects`,`profile` ,`school_yr`  WHERE sched.room_id=room.room_id and sched.course_id=course.course_id and sched.sub_id=subjects.sub_id and sched.teacher_id=profile.teacher_id
 and sched.year_id=school_yr.year_id HAVING teacher_id='$pT' and sem_id='$psem' and year_id='$pSy'
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
			  		echo $hidden_pcourse . '<br>'.$hidden_psubcat . '<br>'.$hidden_proom;
					end;
						}
						
	$i++;	 
			}
			} ?>
                    </div></td>
                  </tr>
                  <tr>
                    <td><div align="center" class="style13">3:30 - 4:30 <br />
                      &nbsp;&nbsp;</div></td>
                    <td><div align="center" class="style12">
                        <?php
			  $pT =$_REQUEST['pT'];
			$pSy =$_REQUEST['pSy'];
			$psem=$_REQUEST['psem'];

			$result = mysql_query("SELECT `sched`.*,`room`.`room_name` ,`course`.`course_yrSec`,`subjects`.`sub_code`,`profile`.`teacher_name`,`school_yr`.`school_year` FROM `sched`,`room`,`course`,`subjects`,`profile` ,`school_yr`  WHERE sched.room_id=room.room_id and sched.course_id=course.course_id and sched.sub_id=subjects.sub_id and sched.teacher_id=profile.teacher_id
 and sched.year_id=school_yr.year_id HAVING teacher_id='$pT' and sem_id='$psem' and year_id='$pSy'
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
			  		echo $hidden_pcourse . '<br>'.$hidden_psubcat . '<br>'.$hidden_proom;
					end;
						}
						
	$i++;	 
			}
			} ?>
                    </div></td>
                    <td><div align="center" class="style12">
                        <?php
			  $pT =$_REQUEST['pT'];
			$pSy =$_REQUEST['pSy'];
			$psem=$_REQUEST['psem'];

			$result = mysql_query("SELECT `sched`.*,`room`.`room_name` ,`course`.`course_yrSec`,`subjects`.`sub_code`,`profile`.`teacher_name`,`school_yr`.`school_year` FROM `sched`,`room`,`course`,`subjects`,`profile` ,`school_yr`  WHERE sched.room_id=room.room_id and sched.course_id=course.course_id and sched.sub_id=subjects.sub_id and sched.teacher_id=profile.teacher_id
 and sched.year_id=school_yr.year_id HAVING teacher_id='$pT' and sem_id='$psem' and year_id='$pSy'
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
			  		echo $hidden_pcourse . '<br>'.$hidden_psubcat . '<br>'.$hidden_proom;
					end;
						}
						
	$i++;	 
			}
			} ?>
                    </div></td>
                    <td><div align="center" class="style12">
                        <?php
			  $pT =$_REQUEST['pT'];
			$pSy =$_REQUEST['pSy'];
			$psem=$_REQUEST['psem'];

			$result = mysql_query("SELECT `sched`.*,`room`.`room_name` ,`course`.`course_yrSec`,`subjects`.`sub_code`,`profile`.`teacher_name`,`school_yr`.`school_year` FROM `sched`,`room`,`course`,`subjects`,`profile` ,`school_yr`  WHERE sched.room_id=room.room_id and sched.course_id=course.course_id and sched.sub_id=subjects.sub_id and sched.teacher_id=profile.teacher_id
 and sched.year_id=school_yr.year_id HAVING teacher_id='$pT' and sem_id='$psem' and year_id='$pSy'
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
			  		echo $hidden_pcourse . '<br>'.$hidden_psubcat . '<br>'.$hidden_proom;
					end;
						}
						
	$i++;	 
			}
			} ?>
                    </div></td>
                    <td><div align="center" class="style12">
                        <?php
			  $pT =$_REQUEST['pT'];
			$pSy =$_REQUEST['pSy'];
			$psem=$_REQUEST['psem'];

			$result = mysql_query("SELECT `sched`.*,`room`.`room_name` ,`course`.`course_yrSec`,`subjects`.`sub_code`,`profile`.`teacher_name`,`school_yr`.`school_year` FROM `sched`,`room`,`course`,`subjects`,`profile` ,`school_yr`  WHERE sched.room_id=room.room_id and sched.course_id=course.course_id and sched.sub_id=subjects.sub_id and sched.teacher_id=profile.teacher_id
 and sched.year_id=school_yr.year_id HAVING teacher_id='$pT' and sem_id='$psem' and year_id='$pSy'
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
			  		echo $hidden_pcourse . '<br>'.$hidden_psubcat . '<br>'.$hidden_proom;
					end;
						}
						
	$i++;	 
			}
			} ?>
                    </div></td>
                    <td><div align="center" class="style12">
                        <?php
			  $pT =$_REQUEST['pT'];
			$pSy =$_REQUEST['pSy'];
			$psem=$_REQUEST['psem'];

			$result = mysql_query("SELECT `sched`.*,`room`.`room_name` ,`course`.`course_yrSec`,`subjects`.`sub_code`,`profile`.`teacher_name`,`school_yr`.`school_year` FROM `sched`,`room`,`course`,`subjects`,`profile` ,`school_yr`  WHERE sched.room_id=room.room_id and sched.course_id=course.course_id and sched.sub_id=subjects.sub_id and sched.teacher_id=profile.teacher_id
 and sched.year_id=school_yr.year_id HAVING teacher_id='$pT' and sem_id='$psem' and year_id='$pSy'
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
			  		echo $hidden_pcourse . '<br>'.$hidden_psubcat . '<br>'.$hidden_proom;
					end;
						}
						
	$i++;	 
			}
			} ?>
                    </div></td>
                  </tr>
                  <tr>
                    <td><div align="center" class="style13">4:30 - 5:30 <br />
                      &nbsp;&nbsp;</div></td>
                    <td><div align="center" class="style12">
                        <?php
			  $pT =$_REQUEST['pT'];
			$pSy =$_REQUEST['pSy'];
			$psem=$_REQUEST['psem'];

			$result = mysql_query("SELECT `sched`.*,`room`.`room_name` ,`course`.`course_yrSec`,`subjects`.`sub_code`,`profile`.`teacher_name`,`school_yr`.`school_year` FROM `sched`,`room`,`course`,`subjects`,`profile` ,`school_yr`  WHERE sched.room_id=room.room_id and sched.course_id=course.course_id and sched.sub_id=subjects.sub_id and sched.teacher_id=profile.teacher_id
 and sched.year_id=school_yr.year_id HAVING teacher_id='$pT' and sem_id='$psem' and year_id='$pSy'
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
			  		echo $hidden_pcourse . '<br>'.$hidden_psubcat . '<br>'.$hidden_proom;
					end;
						}
						
	$i++;	 
			}
			} ?>
                    </div></td>
                    <td><div align="center" class="style12">
                        <?php
			  $pT =$_REQUEST['pT'];
			$pSy =$_REQUEST['pSy'];
			$psem=$_REQUEST['psem'];

			$result = mysql_query("SELECT `sched`.*,`room`.`room_name` ,`course`.`course_yrSec`,`subjects`.`sub_code`,`profile`.`teacher_name`,`school_yr`.`school_year` FROM `sched`,`room`,`course`,`subjects`,`profile` ,`school_yr`  WHERE sched.room_id=room.room_id and sched.course_id=course.course_id and sched.sub_id=subjects.sub_id and sched.teacher_id=profile.teacher_id
 and sched.year_id=school_yr.year_id HAVING teacher_id='$pT' and sem_id='$psem' and year_id='$pSy'
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
			  		echo $hidden_pcourse . '<br>'.$hidden_psubcat . '<br>'.$hidden_proom;
					end;
						}
						
	$i++;	 
			}
			} ?>
                    </div></td>
                    <td><div align="center" class="style12">
                        <?php
			  $pT =$_REQUEST['pT'];
			$pSy =$_REQUEST['pSy'];
			$psem=$_REQUEST['psem'];

			$result = mysql_query("SELECT `sched`.*,`room`.`room_name` ,`course`.`course_yrSec`,`subjects`.`sub_code`,`profile`.`teacher_name`,`school_yr`.`school_year` FROM `sched`,`room`,`course`,`subjects`,`profile` ,`school_yr`  WHERE sched.room_id=room.room_id and sched.course_id=course.course_id and sched.sub_id=subjects.sub_id and sched.teacher_id=profile.teacher_id
 and sched.year_id=school_yr.year_id HAVING teacher_id='$pT' and sem_id='$psem' and year_id='$pSy'
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
			  		echo $hidden_pcourse . '<br>'.$hidden_psubcat . '<br>'.$hidden_proom;
					end;
						}
						
	$i++;	 
			}
			} ?>
                    </div></td>
                    <td><div align="center" class="style12">
                        <?php
			  $pT =$_REQUEST['pT'];
			$pSy =$_REQUEST['pSy'];
			$psem=$_REQUEST['psem'];

			$result = mysql_query("SELECT `sched`.*,`room`.`room_name` ,`course`.`course_yrSec`,`subjects`.`sub_code`,`profile`.`teacher_name`,`school_yr`.`school_year` FROM `sched`,`room`,`course`,`subjects`,`profile` ,`school_yr`  WHERE sched.room_id=room.room_id and sched.course_id=course.course_id and sched.sub_id=subjects.sub_id and sched.teacher_id=profile.teacher_id
 and sched.year_id=school_yr.year_id HAVING teacher_id='$pT' and sem_id='$psem' and year_id='$pSy'
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
			  		echo $hidden_pcourse . '<br>'.$hidden_psubcat . '<br>'.$hidden_proom;
					end;
						}
						
	$i++;	 
			}
			} ?>
                    </div></td>
                    <td><div align="center" class="style12">
                        <?php
			  $pT =$_REQUEST['pT'];
			$pSy =$_REQUEST['pSy'];
			$psem=$_REQUEST['psem'];

			$result = mysql_query("SELECT `sched`.*,`room`.`room_name` ,`course`.`course_yrSec`,`subjects`.`sub_code`,`profile`.`teacher_name`,`school_yr`.`school_year` FROM `sched`,`room`,`course`,`subjects`,`profile` ,`school_yr`  WHERE sched.room_id=room.room_id and sched.course_id=course.course_id and sched.sub_id=subjects.sub_id and sched.teacher_id=profile.teacher_id
 and sched.year_id=school_yr.year_id HAVING teacher_id='$pT' and sem_id='$psem' and year_id='$pSy'
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
			  		echo $hidden_pcourse . '<br>'.$hidden_psubcat . '<br>'.$hidden_proom;
					end;
						}
						
	$i++;	 
			}
			} ?>
                    </div></td>
                  </tr>
                  <tr>
                    <td><div align="center" class="style13">5:30 - 6:30 <br />
                      &nbsp;&nbsp;</div></td>
                    <td><div align="center" class="style12">
                        <?php
			  $pT =$_REQUEST['pT'];
			$pSy =$_REQUEST['pSy'];
			$psem=$_REQUEST['psem'];

			$result = mysql_query("SELECT `sched`.*,`room`.`room_name` ,`course`.`course_yrSec`,`subjects`.`sub_code`,`profile`.`teacher_name`,`school_yr`.`school_year` FROM `sched`,`room`,`course`,`subjects`,`profile` ,`school_yr`  WHERE sched.room_id=room.room_id and sched.course_id=course.course_id and sched.sub_id=subjects.sub_id and sched.teacher_id=profile.teacher_id
 and sched.year_id=school_yr.year_id HAVING teacher_id='$pT' and sem_id='$psem' and year_id='$pSy'
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
			  		echo $hidden_pcourse . '<br>'.$hidden_psubcat . '<br>'.$hidden_proom;
					end;
						}
						
	$i++;	 
			}
			} ?>
                    </div></td>
                    <td><div align="center" class="style12">
                        <?php
			  $pT =$_REQUEST['pT'];
			$pSy =$_REQUEST['pSy'];
			$psem=$_REQUEST['psem'];

			$result = mysql_query("SELECT `sched`.*,`room`.`room_name` ,`course`.`course_yrSec`,`subjects`.`sub_code`,`profile`.`teacher_name`,`school_yr`.`school_year` FROM `sched`,`room`,`course`,`subjects`,`profile` ,`school_yr`  WHERE sched.room_id=room.room_id and sched.course_id=course.course_id and sched.sub_id=subjects.sub_id and sched.teacher_id=profile.teacher_id
 and sched.year_id=school_yr.year_id HAVING teacher_id='$pT' and sem_id='$psem' and year_id='$pSy'
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
			  		echo $hidden_pcourse . '<br>'.$hidden_psubcat . '<br>'.$hidden_proom;
					end;
						}
						
	$i++;	 
			}
			} ?>
                    </div></td>
                    <td><div align="center" class="style12">
                        <?php
			  $pT =$_REQUEST['pT'];
			$pSy =$_REQUEST['pSy'];
			$psem=$_REQUEST['psem'];

			$result = mysql_query("SELECT `sched`.*,`room`.`room_name` ,`course`.`course_yrSec`,`subjects`.`sub_code`,`profile`.`teacher_name`,`school_yr`.`school_year` FROM `sched`,`room`,`course`,`subjects`,`profile` ,`school_yr`  WHERE sched.room_id=room.room_id and sched.course_id=course.course_id and sched.sub_id=subjects.sub_id and sched.teacher_id=profile.teacher_id
 and sched.year_id=school_yr.year_id HAVING teacher_id='$pT' and sem_id='$psem' and year_id='$pSy'
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
			  		echo $hidden_pcourse . '<br>'.$hidden_psubcat . '<br>'.$hidden_proom;
					end;
						}
						
	$i++;	 
			}
			} ?>
                    </div></td>
                    <td><div align="center" class="style12">
                        <?php
			  $pT =$_REQUEST['pT'];
			$pSy =$_REQUEST['pSy'];
			$psem=$_REQUEST['psem'];
			
$result = mysql_query("SELECT `sched`.*,`room`.`room_name` ,`course`.`course_yrSec`,`subjects`.`sub_code`,`profile`.`teacher_name`,`school_yr`.`school_year` FROM `sched`,`room`,`course`,`subjects`,`profile` ,`school_yr`  WHERE sched.room_id=room.room_id and sched.course_id=course.course_id and sched.sub_id=subjects.sub_id and sched.teacher_id=profile.teacher_id
 and sched.year_id=school_yr.year_id HAVING teacher_id='$pT' and sem_id='$psem' and year_id='$pSy'
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
			  		echo $hidden_pcourse . '<br>'.$hidden_psubcat . '<br>'.$hidden_proom;
					end;
						}
						
	$i++;	 
			}
			} ?>
                    </div></td>
                    <td><div align="center" class="style12">
                        <?php
			  $pT =$_REQUEST['pT'];
			$pSy =$_REQUEST['pSy'];
			$psem=$_REQUEST['psem'];

			$result = mysql_query("SELECT `sched`.*,`room`.`room_name` ,`course`.`course_yrSec`,`subjects`.`sub_code`,`profile`.`teacher_name`,`school_yr`.`school_year` FROM `sched`,`room`,`course`,`subjects`,`profile` ,`school_yr`  WHERE sched.room_id=room.room_id and sched.course_id=course.course_id and sched.sub_id=subjects.sub_id and sched.teacher_id=profile.teacher_id
 and sched.year_id=school_yr.year_id HAVING teacher_id='$pT' and sem_id='$psem' and year_id='$pSy'
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
			  		echo $hidden_pcourse . '<br>'.$hidden_psubcat . '<br>'.$hidden_proom;
					end;
						}
						
	$i++;	 
			}
			} ?>
                    </div></td>
                  </tr>
                  <tr>
                    <td><div align="center" class="style13">6:30 - 7:30 <br />
                      &nbsp;&nbsp;</div></td>
                    <td><div align="center" class="style12">
                        <?php
			  $pT =$_REQUEST['pT'];
			$pSy =$_REQUEST['pSy'];
			$psem=$_REQUEST['psem'];

			$result = mysql_query("SELECT `sched`.*,`room`.`room_name` ,`course`.`course_yrSec`,`subjects`.`sub_code`,`profile`.`teacher_name`,`school_yr`.`school_year` FROM `sched`,`room`,`course`,`subjects`,`profile` ,`school_yr`  WHERE sched.room_id=room.room_id and sched.course_id=course.course_id and sched.sub_id=subjects.sub_id and sched.teacher_id=profile.teacher_id
 and sched.year_id=school_yr.year_id HAVING teacher_id='$pT' and sem_id='$psem' and year_id='$pSy'
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
			  		echo $hidden_pcourse . '<br>'.$hidden_psubcat . '<br>'.$hidden_proom;
					end;
						}
						
	$i++;	 
			}
			} ?>
                    </div></td>
                    <td><div align="center" class="style12">
                        <?php
			  $pT =$_REQUEST['pT'];
			$pSy =$_REQUEST['pSy'];
			$psem=$_REQUEST['psem'];

			$result = mysql_query("SELECT `sched`.*,`room`.`room_name` ,`course`.`course_yrSec`,`subjects`.`sub_code`,`profile`.`teacher_name`,`school_yr`.`school_year` FROM `sched`,`room`,`course`,`subjects`,`profile` ,`school_yr`  WHERE sched.room_id=room.room_id and sched.course_id=course.course_id and sched.sub_id=subjects.sub_id and sched.teacher_id=profile.teacher_id
 and sched.year_id=school_yr.year_id HAVING teacher_id='$pT' and sem_id='$psem' and year_id='$pSy'
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
			  		echo $hidden_pcourse . '<br>'.$hidden_psubcat . '<br>'.$hidden_proom;
					end;
						}
						
	$i++;	 
			}
			} ?>
                    </div></td>
                    <td><div align="center" class="style12">
                        <?php
			  $pT =$_REQUEST['pT'];
			$pSy =$_REQUEST['pSy'];
			$psem=$_REQUEST['psem'];

			$result = mysql_query("SELECT `sched`.*,`room`.`room_name` ,`course`.`course_yrSec`,`subjects`.`sub_code`,`profile`.`teacher_name`,`school_yr`.`school_year` FROM `sched`,`room`,`course`,`subjects`,`profile` ,`school_yr`  WHERE sched.room_id=room.room_id and sched.course_id=course.course_id and sched.sub_id=subjects.sub_id and sched.teacher_id=profile.teacher_id
 and sched.year_id=school_yr.year_id HAVING teacher_id='$pT' and sem_id='$psem' and year_id='$pSy'
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
			  		echo $hidden_pcourse . '<br>'.$hidden_psubcat . '<br>'.$hidden_proom;
					end;
						}
						
	$i++;	 
			}
			} ?>
                    </div></td>
                    <td><div align="center" class="style12">
                        <?php
			  $pT =$_REQUEST['pT'];
			$pSy =$_REQUEST['pSy'];
			$psem=$_REQUEST['psem'];

			$result = mysql_query("SELECT `sched`.*,`room`.`room_name` ,`course`.`course_yrSec`,`subjects`.`sub_code`,`profile`.`teacher_name`,`school_yr`.`school_year` FROM `sched`,`room`,`course`,`subjects`,`profile` ,`school_yr`  WHERE sched.room_id=room.room_id and sched.course_id=course.course_id and sched.sub_id=subjects.sub_id and sched.teacher_id=profile.teacher_id
 and sched.year_id=school_yr.year_id HAVING teacher_id='$pT' and sem_id='$psem' and year_id='$pSy'
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
			  		echo $hidden_pcourse . '<br>'.$hidden_psubcat . '<br>'.$hidden_proom;
					end;
						}
						
	$i++;	 
			}
			} ?>
                    </div></td>
                    <td><div align="center" class="style12">
                        <?php
			  $pT =$_REQUEST['pT'];
			$pSy =$_REQUEST['pSy'];
			$psem=$_REQUEST['psem'];

			$result = mysql_query("SELECT `sched`.*,`room`.`room_name` ,`course`.`course_yrSec`,`subjects`.`sub_code`,`profile`.`teacher_name`,`school_yr`.`school_year` FROM `sched`,`room`,`course`,`subjects`,`profile` ,`school_yr`  WHERE sched.room_id=room.room_id and sched.course_id=course.course_id and sched.sub_id=subjects.sub_id and sched.teacher_id=profile.teacher_id
 and sched.year_id=school_yr.year_id HAVING teacher_id='$pT' and sem_id='$psem' and year_id='$pSy'
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
			  		echo $hidden_pcourse . '<br>'.$hidden_psubcat . '<br>'.$hidden_proom;
					end;
						}
						
	$i++;	 
			}
			} ?>
                    </div></td>
                  </tr>
                  <tr>
                    <td><div align="center" class="style13">7:30 - 8:30 <br />
                      &nbsp;&nbsp;</div></td>
                    <td><div align="center" class="style12">
                        <?php
			  $pT =$_REQUEST['pT'];
			$pSy =$_REQUEST['pSy'];
			$psem=$_REQUEST['psem'];

			$result = mysql_query("SELECT `sched`.*,`room`.`room_name` ,`course`.`course_yrSec`,`subjects`.`sub_code`,`profile`.`teacher_name`,`school_yr`.`school_year` FROM `sched`,`room`,`course`,`subjects`,`profile` ,`school_yr`  WHERE sched.room_id=room.room_id and sched.course_id=course.course_id and sched.sub_id=subjects.sub_id and sched.teacher_id=profile.teacher_id
 and sched.year_id=school_yr.year_id HAVING teacher_id='$pT' and sem_id='$psem' and year_id='$pSy'
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
			  		echo $hidden_pcourse . '<br>'.$hidden_psubcat . '<br>'.$hidden_proom;
					end;
						}
						
	$i++;	 
			}
			} ?>
                    </div></td>
                    <td><div align="center" class="style12">
                        <?php
			  $pT =$_REQUEST['pT'];
			$pSy =$_REQUEST['pSy'];
			$psem=$_REQUEST['psem'];
			
$result = mysql_query("SELECT `sched`.*,`room`.`room_name` ,`course`.`course_yrSec`,`subjects`.`sub_code`,`profile`.`teacher_name`,`school_yr`.`school_year` FROM `sched`,`room`,`course`,`subjects`,`profile` ,`school_yr`  WHERE sched.room_id=room.room_id and sched.course_id=course.course_id and sched.sub_id=subjects.sub_id and sched.teacher_id=profile.teacher_id
 and sched.year_id=school_yr.year_id HAVING teacher_id='$pT' and sem_id='$psem' and year_id='$pSy'
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
			  		echo $hidden_pcourse . '<br>'.$hidden_psubcat . '<br>'.$hidden_proom;
					end;
						}
						
	$i++;	 
			}
			} ?>
                    </div></td>
                    <td><div align="center" class="style12">
                        <?php
			  $pT =$_REQUEST['pT'];
			$pSy =$_REQUEST['pSy'];
			$psem=$_REQUEST['psem'];

		$result = mysql_query("SELECT `sched`.*,`room`.`room_name` ,`course`.`course_yrSec`,`subjects`.`sub_code`,`profile`.`teacher_name`,`school_yr`.`school_year` FROM `sched`,`room`,`course`,`subjects`,`profile` ,`school_yr`  WHERE sched.room_id=room.room_id and sched.course_id=course.course_id and sched.sub_id=subjects.sub_id and sched.teacher_id=profile.teacher_id
 and sched.year_id=school_yr.year_id HAVING teacher_id='$pT' and sem_id='$psem' and year_id='$pSy'
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
			  		echo $hidden_pcourse . '<br>'.$hidden_psubcat . '<br>'.$hidden_proom;
					end;
						}
						
	$i++;	 
			}
			} ?>
                    </div></td>
                    <td><div align="center" class="style12">
                        <?php
			  $pT =$_REQUEST['pT'];
			$pSy =$_REQUEST['pSy'];
			$psem=$_REQUEST['psem'];

			$result = mysql_query("SELECT `sched`.*,`room`.`room_name` ,`course`.`course_yrSec`,`subjects`.`sub_code`,`profile`.`teacher_name`,`school_yr`.`school_year` FROM `sched`,`room`,`course`,`subjects`,`profile` ,`school_yr`  WHERE sched.room_id=room.room_id and sched.course_id=course.course_id and sched.sub_id=subjects.sub_id and sched.teacher_id=profile.teacher_id
 and sched.year_id=school_yr.year_id HAVING teacher_id='$pT' and sem_id='$psem' and year_id='$pSy'
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
			  		echo $hidden_pcourse . '<br>'.$hidden_psubcat . '<br>'.$hidden_proom;
					end;
						}
						
	$i++;	 
			}
			} ?>
                    </div></td>
                    <td><div align="center" class="style12">
                        <?php
			  $pT =$_REQUEST['pT'];
			$pSy =$_REQUEST['pSy'];
			$psem=$_REQUEST['psem'];

			$result = mysql_query("SELECT `sched`.*,`room`.`room_name` ,`course`.`course_yrSec`,`subjects`.`sub_code`,`profile`.`teacher_name`,`school_yr`.`school_year` FROM `sched`,`room`,`course`,`subjects`,`profile` ,`school_yr`  WHERE sched.room_id=room.room_id and sched.course_id=course.course_id and sched.sub_id=subjects.sub_id and sched.teacher_id=profile.teacher_id
 and sched.year_id=school_yr.year_id HAVING teacher_id='$pT' and sem_id='$psem' and year_id='$pSy'
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
			  		echo $hidden_pcourse . '<br>'.$hidden_psubcat . '<br>'.$hidden_proom;
					end;
						}
						
	$i++;	 
			}
			} ?>
                    </div></td>
                  </tr>
                </table>
</body>
</html>
