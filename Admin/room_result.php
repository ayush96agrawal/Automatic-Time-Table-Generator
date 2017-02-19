<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>
<style type="text/css">
<!--
.style13 {font-family: Verdana, Arial, Helvetica, sans-serif}
.style17 {font-weight: bold; font-size: 14px;}
.style18 {font-size: 14px; font-family: Verdana, Arial, Helvetica, sans-serif; }
.style19 {font-family: Verdana, Arial, Helvetica, sans-serif; font-size: 13px; }
-->
</style>
</head>

<body>
  <p align="center"><span class="style32"><span class="style13"> <br />
      <strong> </strong><br /> 
    </span><br />
    <span class="style13"><br />
    <span class="style17">Room Utilization </span></span><span class="style18"> <br />
    <?php 	
		require ("../includes/dbconnection.php");
		
		function mysql_result($result, $row, $field = 0) {
 			   // Adjust the result pointer to that specific row
    			$result->data_seek($row);
 			   // Fetch result array
 			   $data = $result->fetch_array();
 
 			   return $data[$field];
				}	
		
		$pSy =$_REQUEST['pSy'];				
				$result = mysqli_query($conn,"SELECT * FROM school_yr HAVING year_id='$pSy'");
				
if (!$result) 
		{
		die("Query to show fields from table failed");
		}
			$numberOfRows = MYSQLi_NUM_ROWS($result);
	
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
				$result = mysqli_query($conn,"SELECT * FROM sem HAVING sem_id='$psem'");
				
if (!$result) 
		{
		die("Query to show fields from table failed");
		}
			$numberOfRows = MYSQLi_NUM_ROWS($result);
	
			If ($numberOfRows == 0) 
				{
				}
			else if ($numberOfRows > 0) 
				{
				$i=0;
			
			$sem = MYSQL_RESULT($result,$i,"semester");
				}
				echo $sem.', '. $sy;?>
    </span> </span>
      <span class="style13">
      <?php

function mysql_result($result, $row, $field = 0) {
 			   // Adjust the result pointer to that specific row
    			$result->data_seek($row);
 			   // Fetch result array
 			   $data = $result->fetch_array();
 
 			   return $data[$field];
				}	
			$pRoom =$_REQUEST['pRoom'];
			$pSy =$_REQUEST['pSy'];
			$psem=$_REQUEST['psem'];
			
				$result = mysqli_query($conn,"SELECT * FROM room HAVING room_id='$pRoom'");
				
if (!$result) 
		{
		die("Query to show fields from table failed");
		}
			$numberOfRows = MYSQLi_NUM_ROWS($result);
	
			If ($numberOfRows == 0) 
				{
			//echo 'Sorry No Record Found!';
				}
			else if ($numberOfRows > 0) 
				{
				$i=0;
			
			$room = MYSQL_RESULT($result,$i,"room_name");
				
				
				}
				
				?>
    </span></p>
</div>
<table width="724" border="0" align="center" >
<tr>
                <td width="89" height="54" class="style13"><span class="style32">Room:</span></td>
    <td colspan = "3" align="left" class="style13"><span class="style32" ><strong><?php echo $room ?></strong></span></td>
				<td colspan="3" class="style13">&nbsp;</td>
  </tr>
				<tr>
				<td class="style13">&nbsp;</td>
				<td width="239" class="style13">&nbsp;</td>
				<td width="24" class="style13">&nbsp;&nbsp;&nbsp;&nbsp;</td>
				<td width="18" class="style13">&nbsp;</td>
				<td width="8" class="style13">&nbsp;</td>
				<td width="320" class="style13">&nbsp;</td>
</table>
<table width="728" border="1" align="center">
  <tr>
    <td width="97"><div align="center" class="style13">TIME</div></td>
    <td width="123"><div align="center" class="style13">MONDAY</div></td>
    <td width="112"><div align="center" class="style13">TUESDAY</div></td>
    <td width="117"><div align="center" class="style13">WEDNESDAY</div></td>
    <td width="116"><div align="center" class="style13">THURSDAY</div></td>
    <td width="123"><div align="center" class="style13">FRIDAY</div></td>
  </tr>
  <tr>
    <td><div align="center" class="style19">7:30 - 8:30 <br />
      &nbsp;&nbsp; </div></td>
    <td><div align="center" class="style18">
      <?php
			$pRoom =$_REQUEST['pRoom'];
			$pSy =$_REQUEST['pSy'];
			$psem=$_REQUEST['psem'];
			
			function mysql_result($result, $row, $field = 0) {
 			   // Adjust the result pointer to that specific row
    			$result->data_seek($row);
 			   // Fetch result array
 			   $data = $result->fetch_array();
 
 			   return $data[$field];
				}	
			
						$result = mysqli_query($conn,"SELECT `sched`.*,`room`.`room_name` ,`course`.`course_yrSec`,`subjects`.`sub_code`,`profile`.`teacher_name` ,`timestart`.`time_s`,`day`.`day_name`,`school_yr`.`school_year` FROM `sched`,`room`,`course`,`subjects`,`profile`,`timestart` ,`day`,`school_yr`  WHERE sched.room_id=room.room_id and sched.course_id=course.course_id and sched.sub_id=subjects.sub_id and sched.teacher_id=profile.teacher_id and sched.time_s_id=timestart.time_s_id and sched.day_id=day.day_id 
 and sched.year_id=school_yr.year_id HAVING room_id='$pRoom' and sem_id='$psem' and year_id='$pSy'
  			");
			//HAVING course_id='$pCourse' and sem_id='$psem' and year_id='$pSy'
		if (!$result) 
			{
			die("Query to show fields from table failed");
			}
		$numberOfRows = MYSQLi_NUM_ROWS($result);
		
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
			  		echo $hidden_psubcat . '<br>'.$hidden_pcourse . '<br>'.$hidden_pt;
					end;
						}
						
	$i++;	 
			}
			} ?>
    </div></td>
    <td><div align="center" class="style18">
      <?php
			$pRoom =$_REQUEST['pRoom'];
			$pSy =$_REQUEST['pSy'];
			$psem=$_REQUEST['psem'];
			
			
			function mysql_result($result, $row, $field = 0) {
 			   // Adjust the result pointer to that specific row
    			$result->data_seek($row);
 			   // Fetch result array
 			   $data = $result->fetch_array();
 
 			   return $data[$field];
				}	
						$result = mysqli_query($conn,"SELECT `sched`.*,`room`.`room_name` ,`course`.`course_yrSec`,`subjects`.`sub_code`,`profile`.`teacher_name` ,`timestart`.`time_s`,`day`.`day_name`,`school_yr`.`school_year` FROM `sched`,`room`,`course`,`subjects`,`profile`,`timestart` ,`day`,`school_yr`  WHERE sched.room_id=room.room_id and sched.course_id=course.course_id and sched.sub_id=subjects.sub_id and sched.teacher_id=profile.teacher_id and sched.time_s_id=timestart.time_s_id and sched.day_id=day.day_id 
 and sched.year_id=school_yr.year_id HAVING room_id='$pRoom' and sem_id='$psem' and year_id='$pSy'
  			");
			//HAVING course_id='$pCourse' and sem_id='$psem' and year_id='$pSy'
		if (!$result) 
			{
			die("Query to show fields from table failed");
			}
		$numberOfRows = MYSQLi_NUM_ROWS($result);
		
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
			  		echo $hidden_psubcat . '<br>'.$hidden_pcourse . '<br>'.$hidden_pt;
					end;
						}
						
	$i++;	 
			}
			} ?>
    </div></td>
    <td><div align="center" class="style18">
      <?php
			$pRoom =$_REQUEST['pRoom'];
			$pSy =$_REQUEST['pSy'];
			$psem=$_REQUEST['psem'];
			
			function mysql_result($result, $row, $field = 0) {
 			   // Adjust the result pointer to that specific row
    			$result->data_seek($row);
 			   // Fetch result array
 			   $data = $result->fetch_array();
 
 			   return $data[$field];
				}	
			
						$result = mysqli_query($conn,"SELECT `sched`.*,`room`.`room_name` ,`course`.`course_yrSec`,`subjects`.`sub_code`,`profile`.`teacher_name` ,`timestart`.`time_s`,`day`.`day_name`,`school_yr`.`school_year` FROM `sched`,`room`,`course`,`subjects`,`profile`,`timestart` ,`day`,`school_yr`  WHERE sched.room_id=room.room_id and sched.course_id=course.course_id and sched.sub_id=subjects.sub_id and sched.teacher_id=profile.teacher_id and sched.time_s_id=timestart.time_s_id and sched.day_id=day.day_id 
 and sched.year_id=school_yr.year_id HAVING room_id='$pRoom' and sem_id='$psem' and year_id='$pSy'
  			");
			//HAVING course_id='$pCourse' and sem_id='$psem' and year_id='$pSy'
		if (!$result) 
			{
			die("Query to show fields from table failed");
			}
		$numberOfRows = MYSQLi_NUM_ROWS($result);
		
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
			  		echo $hidden_psubcat . '<br>'.$hidden_pcourse . '<br>'.$hidden_pt;
					end;
						}
						
	$i++;	 
			}
			} ?>
    </div></td>
    <td><div align="center" class="style18">
      <?php
			$pRoom =$_REQUEST['pRoom'];
			$pSy =$_REQUEST['pSy'];
			$psem=$_REQUEST['psem'];
			
			function mysql_result($result, $row, $field = 0) {
 			   // Adjust the result pointer to that specific row
    			$result->data_seek($row);
 			   // Fetch result array
 			   $data = $result->fetch_array();
 
 			   return $data[$field];
				}	
			
						$result = mysqli_query($conn,"SELECT `sched`.*,`room`.`room_name` ,`course`.`course_yrSec`,`subjects`.`sub_code`,`profile`.`teacher_name` ,`timestart`.`time_s`,`day`.`day_name`,`school_yr`.`school_year` FROM `sched`,`room`,`course`,`subjects`,`profile`,`timestart` ,`day`,`school_yr`  WHERE sched.room_id=room.room_id and sched.course_id=course.course_id and sched.sub_id=subjects.sub_id and sched.teacher_id=profile.teacher_id and sched.time_s_id=timestart.time_s_id and sched.day_id=day.day_id 
 and sched.year_id=school_yr.year_id HAVING room_id='$pRoom' and sem_id='$psem' and year_id='$pSy'
  			");
			//HAVING course_id='$pCourse' and sem_id='$psem' and year_id='$pSy'
		if (!$result) 
			{
			die("Query to show fields from table failed");
			}
		$numberOfRows = MYSQLi_NUM_ROWS($result);
		
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
			  		echo $hidden_psubcat . '<br>'.$hidden_pcourse . '<br>'.$hidden_pt;
					end;
						}
						
	$i++;	 
			}
			} ?>
    </div></td>
    <td><div align="center" class="style18">
      <?php
			$pRoom =$_REQUEST['pRoom'];
			$pSy =$_REQUEST['pSy'];
			$psem=$_REQUEST['psem'];
			
			
			function mysql_result($result, $row, $field = 0) {
 			   // Adjust the result pointer to that specific row
    			$result->data_seek($row);
 			   // Fetch result array
 			   $data = $result->fetch_array();
 
 			   return $data[$field];
				}	
						$result = mysqli_query($conn,"SELECT `sched`.*,`room`.`room_name` ,`course`.`course_yrSec`,`subjects`.`sub_code`,`profile`.`teacher_name` ,`timestart`.`time_s`,`day`.`day_name`,`school_yr`.`school_year` FROM `sched`,`room`,`course`,`subjects`,`profile`,`timestart` ,`day`,`school_yr`  WHERE sched.room_id=room.room_id and sched.course_id=course.course_id and sched.sub_id=subjects.sub_id and sched.teacher_id=profile.teacher_id and sched.time_s_id=timestart.time_s_id and sched.day_id=day.day_id 
 and sched.year_id=school_yr.year_id HAVING room_id='$pRoom' and sem_id='$psem' and year_id='$pSy'
  			");
			//HAVING course_id='$pCourse' and sem_id='$psem' and year_id='$pSy'
		if (!$result) 
			{
			die("Query to show fields from table failed");
			}
		$numberOfRows = MYSQLi_NUM_ROWS($result);
		
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
			  		echo $hidden_psubcat . '<br>'.$hidden_pcourse . '<br>'.$hidden_pt;
					end;
						}
						
	$i++;	 
			}
			} ?>
    </div></td>
  </tr>
  <tr>
    <td><div align="center" class="style19">8:30 - 9:30 <br />
      &nbsp;&nbsp; </div></td>
    <td><div align="center" class="style18">
      <?php
			$pRoom =$_REQUEST['pRoom'];
			$pSy =$_REQUEST['pSy'];
			$psem=$_REQUEST['psem'];
			
			function mysql_result($result, $row, $field = 0) {
 			   // Adjust the result pointer to that specific row
    			$result->data_seek($row);
 			   // Fetch result array
 			   $data = $result->fetch_array();
 
 			   return $data[$field];
				}	
			
						$result = mysqli_query($conn,"SELECT `sched`.*,`room`.`room_name` ,`course`.`course_yrSec`,`subjects`.`sub_code`,`profile`.`teacher_name` ,`timestart`.`time_s`,`day`.`day_name`,`school_yr`.`school_year` FROM `sched`,`room`,`course`,`subjects`,`profile`,`timestart` ,`day`,`school_yr`  WHERE sched.room_id=room.room_id and sched.course_id=course.course_id and sched.sub_id=subjects.sub_id and sched.teacher_id=profile.teacher_id and sched.time_s_id=timestart.time_s_id and sched.day_id=day.day_id 
 and sched.year_id=school_yr.year_id HAVING room_id='$pRoom' and sem_id='$psem' and year_id='$pSy'
  			");
			//HAVING course_id='$pCourse' and sem_id='$psem' and year_id='$pSy'
		if (!$result) 
			{
			die("Query to show fields from table failed");
			}
		$numberOfRows = MYSQLi_NUM_ROWS($result);
		
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
			  		echo $hidden_psubcat . '<br>'.$hidden_pcourse . '<br>'.$hidden_pt;
					end;
						}
						
	$i++;	 
			}
			} ?>
    </div></td>
    <td><div align="center" class="style18">
      <?php
			$pRoom =$_REQUEST['pRoom'];
			$pSy =$_REQUEST['pSy'];
			$psem=$_REQUEST['psem'];
			
			function mysql_result($result, $row, $field = 0) {
 			   // Adjust the result pointer to that specific row
    			$result->data_seek($row);
 			   // Fetch result array
 			   $data = $result->fetch_array();
 
 			   return $data[$field];
				}	
			
						$result = mysqli_query($conn,"SELECT `sched`.*,`room`.`room_name` ,`course`.`course_yrSec`,`subjects`.`sub_code`,`profile`.`teacher_name` ,`timestart`.`time_s`,`day`.`day_name`,`school_yr`.`school_year` FROM `sched`,`room`,`course`,`subjects`,`profile`,`timestart` ,`day`,`school_yr`  WHERE sched.room_id=room.room_id and sched.course_id=course.course_id and sched.sub_id=subjects.sub_id and sched.teacher_id=profile.teacher_id and sched.time_s_id=timestart.time_s_id and sched.day_id=day.day_id 
 and sched.year_id=school_yr.year_id HAVING room_id='$pRoom' and sem_id='$psem' and year_id='$pSy'
  			");
			//HAVING course_id='$pCourse' and sem_id='$psem' and year_id='$pSy'
		if (!$result) 
			{
			die("Query to show fields from table failed");
			}
		$numberOfRows = MYSQLi_NUM_ROWS($result);
		
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
			 
			 if ($hidden_pday == 2 && $hidden_pstime == 3){	
			  		echo $hidden_psubcat . '<br>'.$hidden_pcourse . '<br>'.$hidden_pt;
					end;
						}
						
	$i++;	 
			}
			} ?>
    </div></td>
    <td><div align="center" class="style18">
      <?php
			$pRoom =$_REQUEST['pRoom'];
			$pSy =$_REQUEST['pSy'];
			$psem=$_REQUEST['psem'];
			
			function mysql_result($result, $row, $field = 0) {
 			   // Adjust the result pointer to that specific row
    			$result->data_seek($row);
 			   // Fetch result array
 			   $data = $result->fetch_array();
 
 			   return $data[$field];
				}	
			
						$result = mysqli_query($conn,"SELECT `sched`.*,`room`.`room_name` ,`course`.`course_yrSec`,`subjects`.`sub_code`,`profile`.`teacher_name` ,`timestart`.`time_s`,`day`.`day_name`,`school_yr`.`school_year` FROM `sched`,`room`,`course`,`subjects`,`profile`,`timestart` ,`day`,`school_yr`  WHERE sched.room_id=room.room_id and sched.course_id=course.course_id and sched.sub_id=subjects.sub_id and sched.teacher_id=profile.teacher_id and sched.time_s_id=timestart.time_s_id and sched.day_id=day.day_id 
 and sched.year_id=school_yr.year_id HAVING room_id='$pRoom' and sem_id='$psem' and year_id='$pSy'
  			");
			//HAVING course_id='$pCourse' and sem_id='$psem' and year_id='$pSy'
		if (!$result) 
			{
			die("Query to show fields from table failed");
			}
		$numberOfRows = MYSQLi_NUM_ROWS($result);
		
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
			  		echo $hidden_psubcat . '<br>'.$hidden_pcourse . '<br>'.$hidden_pt;
					end;
						}
						
	$i++;	 
			}
			} ?>
    </div></td>
    <td><div align="center" class="style18">
      <?php
			$pRoom =$_REQUEST['pRoom'];
			$pSy =$_REQUEST['pSy'];
			$psem=$_REQUEST['psem'];
			
			function mysql_result($result, $row, $field = 0) {
 			   // Adjust the result pointer to that specific row
    			$result->data_seek($row);
 			   // Fetch result array
 			   $data = $result->fetch_array();
 
 			   return $data[$field];
				}	
			
						$result = mysqli_query($conn,"SELECT `sched`.*,`room`.`room_name` ,`course`.`course_yrSec`,`subjects`.`sub_code`,`profile`.`teacher_name` ,`timestart`.`time_s`,`day`.`day_name`,`school_yr`.`school_year` FROM `sched`,`room`,`course`,`subjects`,`profile`,`timestart` ,`day`,`school_yr`  WHERE sched.room_id=room.room_id and sched.course_id=course.course_id and sched.sub_id=subjects.sub_id and sched.teacher_id=profile.teacher_id and sched.time_s_id=timestart.time_s_id and sched.day_id=day.day_id 
 and sched.year_id=school_yr.year_id HAVING room_id='$pRoom' and sem_id='$psem' and year_id='$pSy'
  			");
			//HAVING course_id='$pCourse' and sem_id='$psem' and year_id='$pSy'
		if (!$result) 
			{
			die("Query to show fields from table failed");
			}
		$numberOfRows = MYSQLi_NUM_ROWS($result);
		
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
			  		echo $hidden_psubcat . '<br>'.$hidden_pcourse . '<br>'.$hidden_pt;
					end;
						}
						
	$i++;	 
			}
			} ?>
    </div></td>
    <td><div align="center" class="style18">
      <?php
			$pRoom =$_REQUEST['pRoom'];
			$pSy =$_REQUEST['pSy'];
			$psem=$_REQUEST['psem'];
			
						$result = mysqli_query($conn,"SELECT `sched`.*,`room`.`room_name` ,`course`.`course_yrSec`,`subjects`.`sub_code`,`profile`.`teacher_name` ,`timestart`.`time_s`,`day`.`day_name`,`school_yr`.`school_year` FROM `sched`,`room`,`course`,`subjects`,`profile`,`timestart` ,`day`,`school_yr`  WHERE sched.room_id=room.room_id and sched.course_id=course.course_id and sched.sub_id=subjects.sub_id and sched.teacher_id=profile.teacher_id and sched.time_s_id=timestart.time_s_id and sched.day_id=day.day_id 
 and sched.year_id=school_yr.year_id HAVING room_id='$pRoom' and sem_id='$psem' and year_id='$pSy'
  			");
			//HAVING course_id='$pCourse' and sem_id='$psem' and year_id='$pSy'
		if (!$result) 
			{
			die("Query to show fields from table failed");
			}
		$numberOfRows = MYSQLi_NUM_ROWS($result);
		
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
			  		echo $hidden_psubcat . '<br>'.$hidden_pcourse . '<br>'.$hidden_pt;
					end;
						}
						
	$i++;	 
			}
			} ?>
    </div></td>
  </tr>
  <tr>
    <td><div align="center" class="style19">9:30 - 10:30 <br />
      &nbsp;&nbsp; </div></td>
    <td><div align="center" class="style18">
      <?php
			$pRoom =$_REQUEST['pRoom'];
			$pSy =$_REQUEST['pSy'];
			$psem=$_REQUEST['psem'];
			
						$result = mysqli_query($conn,"SELECT `sched`.*,`room`.`room_name` ,`course`.`course_yrSec`,`subjects`.`sub_code`,`profile`.`teacher_name` ,`timestart`.`time_s`,`day`.`day_name`,`school_yr`.`school_year` FROM `sched`,`room`,`course`,`subjects`,`profile`,`timestart` ,`day`,`school_yr`  WHERE sched.room_id=room.room_id and sched.course_id=course.course_id and sched.sub_id=subjects.sub_id and sched.teacher_id=profile.teacher_id and sched.time_s_id=timestart.time_s_id and sched.day_id=day.day_id 
 and sched.year_id=school_yr.year_id HAVING room_id='$pRoom' and sem_id='$psem' and year_id='$pSy'
  			");
			//HAVING course_id='$pCourse' and sem_id='$psem' and year_id='$pSy'
		if (!$result) 
			{
			die("Query to show fields from table failed");
			}
		$numberOfRows = MYSQLi_NUM_ROWS($result);
		
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
			  		echo $hidden_psubcat . '<br>'.$hidden_pcourse . '<br>'.$hidden_pt;
					end;
						}
						
	$i++;	 
			}
			} ?>
    </div></td>
    <td><div align="center" class="style18">
      <?php
			$pRoom =$_REQUEST['pRoom'];
			$pSy =$_REQUEST['pSy'];
			$psem=$_REQUEST['psem'];
			
						$result = mysqli_query($conn,"SELECT `sched`.*,`room`.`room_name` ,`course`.`course_yrSec`,`subjects`.`sub_code`,`profile`.`teacher_name` ,`timestart`.`time_s`,`day`.`day_name`,`school_yr`.`school_year` FROM `sched`,`room`,`course`,`subjects`,`profile`,`timestart` ,`day`,`school_yr`  WHERE sched.room_id=room.room_id and sched.course_id=course.course_id and sched.sub_id=subjects.sub_id and sched.teacher_id=profile.teacher_id and sched.time_s_id=timestart.time_s_id and sched.day_id=day.day_id 
 and sched.year_id=school_yr.year_id HAVING room_id='$pRoom' and sem_id='$psem' and year_id='$pSy'
  			");
			//HAVING course_id='$pCourse' and sem_id='$psem' and year_id='$pSy'
		if (!$result) 
			{
			die("Query to show fields from table failed");
			}
		$numberOfRows = MYSQLi_NUM_ROWS($result);
		
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
			  		echo $hidden_psubcat . '<br>'.$hidden_pcourse . '<br>'.$hidden_pt;
					end;
						}
						
	$i++;	 
			}
			} ?>
    </div></td>
    <td><div align="center" class="style18">
      <?php
			$pRoom =$_REQUEST['pRoom'];
			$pSy =$_REQUEST['pSy'];
			$psem=$_REQUEST['psem'];
			
						$result = mysqli_query($conn,"SELECT `sched`.*,`room`.`room_name` ,`course`.`course_yrSec`,`subjects`.`sub_code`,`profile`.`teacher_name` ,`timestart`.`time_s`,`day`.`day_name`,`school_yr`.`school_year` FROM `sched`,`room`,`course`,`subjects`,`profile`,`timestart` ,`day`,`school_yr`  WHERE sched.room_id=room.room_id and sched.course_id=course.course_id and sched.sub_id=subjects.sub_id and sched.teacher_id=profile.teacher_id and sched.time_s_id=timestart.time_s_id and sched.day_id=day.day_id 
 and sched.year_id=school_yr.year_id HAVING room_id='$pRoom' and sem_id='$psem' and year_id='$pSy'
  			");
			//HAVING course_id='$pCourse' and sem_id='$psem' and year_id='$pSy'
		if (!$result) 
			{
			die("Query to show fields from table failed");
			}
		$numberOfRows = MYSQLi_NUM_ROWS($result);
		
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
			  		echo $hidden_psubcat . '<br>'.$hidden_pcourse . '<br>'.$hidden_pt;
					end;
						}
						
	$i++;	 
			}
			} ?>
    </div></td>
    <td><div align="center" class="style18">
      <?php
			$pRoom =$_REQUEST['pRoom'];
			$pSy =$_REQUEST['pSy'];
			$psem=$_REQUEST['psem'];
			
						$result = mysqli_query($conn,"SELECT `sched`.*,`room`.`room_name` ,`course`.`course_yrSec`,`subjects`.`sub_code`,`profile`.`teacher_name` ,`timestart`.`time_s`,`day`.`day_name`,`school_yr`.`school_year` FROM `sched`,`room`,`course`,`subjects`,`profile`,`timestart` ,`day`,`school_yr`  WHERE sched.room_id=room.room_id and sched.course_id=course.course_id and sched.sub_id=subjects.sub_id and sched.teacher_id=profile.teacher_id and sched.time_s_id=timestart.time_s_id and sched.day_id=day.day_id 
 and sched.year_id=school_yr.year_id HAVING room_id='$pRoom' and sem_id='$psem' and year_id='$pSy'
  			");
			//HAVING course_id='$pCourse' and sem_id='$psem' and year_id='$pSy'
		if (!$result) 
			{
			die("Query to show fields from table failed");
			}
		$numberOfRows = MYSQLi_NUM_ROWS($result);
		
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
			  		echo $hidden_psubcat . '<br>'.$hidden_pcourse . '<br>'.$hidden_pt;
					end;
						}
						
	$i++;	 
			}
			} ?>
    </div></td>
    <td><div align="center" class="style18">
      <?php
			$pRoom =$_REQUEST['pRoom'];
			$pSy =$_REQUEST['pSy'];
			$psem=$_REQUEST['psem'];
			
						$result = mysqli_query($conn,"SELECT `sched`.*,`room`.`room_name` ,`course`.`course_yrSec`,`subjects`.`sub_code`,`profile`.`teacher_name` ,`timestart`.`time_s`,`day`.`day_name`,`school_yr`.`school_year` FROM `sched`,`room`,`course`,`subjects`,`profile`,`timestart` ,`day`,`school_yr`  WHERE sched.room_id=room.room_id and sched.course_id=course.course_id and sched.sub_id=subjects.sub_id and sched.teacher_id=profile.teacher_id and sched.time_s_id=timestart.time_s_id and sched.day_id=day.day_id 
 and sched.year_id=school_yr.year_id HAVING room_id='$pRoom' and sem_id='$psem' and year_id='$pSy'
  			");
			//HAVING course_id='$pCourse' and sem_id='$psem' and year_id='$pSy'
		if (!$result) 
			{
			die("Query to show fields from table failed");
			}
		$numberOfRows = MYSQLi_NUM_ROWS($result);
		
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
			  		echo $hidden_psubcat . '<br>'.$hidden_pcourse . '<br>'.$hidden_pt;
					end;
						}
						
	$i++;	 
			}
			} ?>
    </div></td>
  </tr>
  <tr>
    <td><div align="center" class="style19">10:30 - 11:30 <br />
      &nbsp;&nbsp;</div></td>
    <td><div align="center" class="style18">
      <?php
			$pRoom =$_REQUEST['pRoom'];
			$pSy =$_REQUEST['pSy'];
			$psem=$_REQUEST['psem'];
			
						$result = mysqli_query($conn,"SELECT `sched`.*,`room`.`room_name` ,`course`.`course_yrSec`,`subjects`.`sub_code`,`profile`.`teacher_name` ,`timestart`.`time_s`,`day`.`day_name`,`school_yr`.`school_year` FROM `sched`,`room`,`course`,`subjects`,`profile`,`timestart` ,`day`,`school_yr`  WHERE sched.room_id=room.room_id and sched.course_id=course.course_id and sched.sub_id=subjects.sub_id and sched.teacher_id=profile.teacher_id and sched.time_s_id=timestart.time_s_id and sched.day_id=day.day_id 
 and sched.year_id=school_yr.year_id HAVING room_id='$pRoom' and sem_id='$psem' and year_id='$pSy'
  			");
			//HAVING course_id='$pCourse' and sem_id='$psem' and year_id='$pSy'
		if (!$result) 
			{
			die("Query to show fields from table failed");
			}
		$numberOfRows = MYSQLi_NUM_ROWS($result);
		
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
			  		echo $hidden_psubcat . '<br>'.$hidden_pcourse . '<br>'.$hidden_pt;
					end;
						}
						
	$i++;	 
			}
			} ?>
    </div></td>
    <td><div align="center" class="style18">
      <?php
			$pRoom =$_REQUEST['pRoom'];
			$pSy =$_REQUEST['pSy'];
			$psem=$_REQUEST['psem'];
			
						$result = mysqli_query($conn,"SELECT `sched`.*,`room`.`room_name` ,`course`.`course_yrSec`,`subjects`.`sub_code`,`profile`.`teacher_name` ,`timestart`.`time_s`,`day`.`day_name`,`school_yr`.`school_year` FROM `sched`,`room`,`course`,`subjects`,`profile`,`timestart` ,`day`,`school_yr`  WHERE sched.room_id=room.room_id and sched.course_id=course.course_id and sched.sub_id=subjects.sub_id and sched.teacher_id=profile.teacher_id and sched.time_s_id=timestart.time_s_id and sched.day_id=day.day_id 
 and sched.year_id=school_yr.year_id HAVING room_id='$pRoom' and sem_id='$psem' and year_id='$pSy'
  			");
			//HAVING course_id='$pCourse' and sem_id='$psem' and year_id='$pSy'
		if (!$result) 
			{
			die("Query to show fields from table failed");
			}
		$numberOfRows = MYSQLi_NUM_ROWS($result);
		
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
			 
			 if ($hidden_pday == 2&& $hidden_pstime == 7){	
			  		echo $hidden_psubcat . '<br>'.$hidden_pcourse . '<br>'.$hidden_pt;
					end;
						}
						
	$i++;	 
			}
			} ?>
    </div></td>
    <td><div align="center" class="style18">
      <?php
			$pRoom =$_REQUEST['pRoom'];
			$pSy =$_REQUEST['pSy'];
			$psem=$_REQUEST['psem'];
			
						$result = mysqli_query($conn,"SELECT `sched`.*,`room`.`room_name` ,`course`.`course_yrSec`,`subjects`.`sub_code`,`profile`.`teacher_name` ,`timestart`.`time_s`,`day`.`day_name`,`school_yr`.`school_year` FROM `sched`,`room`,`course`,`subjects`,`profile`,`timestart` ,`day`,`school_yr`  WHERE sched.room_id=room.room_id and sched.course_id=course.course_id and sched.sub_id=subjects.sub_id and sched.teacher_id=profile.teacher_id and sched.time_s_id=timestart.time_s_id and sched.day_id=day.day_id 
 and sched.year_id=school_yr.year_id HAVING room_id='$pRoom' and sem_id='$psem' and year_id='$pSy'
  			");
			//HAVING course_id='$pCourse' and sem_id='$psem' and year_id='$pSy'
		if (!$result) 
			{
			die("Query to show fields from table failed");
			}
		$numberOfRows = MYSQLi_NUM_ROWS($result);
		
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
			  		echo $hidden_psubcat . '<br>'.$hidden_pcourse . '<br>'.$hidden_pt;
					end;
						}
						
	$i++;	 
			}
			} ?>
    </div></td>
    <td><div align="center" class="style18">
      <?php
			$pRoom =$_REQUEST['pRoom'];
			$pSy =$_REQUEST['pSy'];
			$psem=$_REQUEST['psem'];
			
						$result = mysqli_query($conn,"SELECT `sched`.*,`room`.`room_name` ,`course`.`course_yrSec`,`subjects`.`sub_code`,`profile`.`teacher_name` ,`timestart`.`time_s`,`day`.`day_name`,`school_yr`.`school_year` FROM `sched`,`room`,`course`,`subjects`,`profile`,`timestart` ,`day`,`school_yr`  WHERE sched.room_id=room.room_id and sched.course_id=course.course_id and sched.sub_id=subjects.sub_id and sched.teacher_id=profile.teacher_id and sched.time_s_id=timestart.time_s_id and sched.day_id=day.day_id 
 and sched.year_id=school_yr.year_id HAVING room_id='$pRoom' and sem_id='$psem' and year_id='$pSy'
  			");
			//HAVING course_id='$pCourse' and sem_id='$psem' and year_id='$pSy'
		if (!$result) 
			{
			die("Query to show fields from table failed");
			}
		$numberOfRows = MYSQLi_NUM_ROWS($result);
		
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
			  		echo $hidden_psubcat . '<br>'.$hidden_pcourse . '<br>'.$hidden_pt;
					end;
						}
						
	$i++;	 
			}
			} ?>
    </div></td>
    <td><div align="center" class="style18">
      <?php
			$pRoom =$_REQUEST['pRoom'];
			$pSy =$_REQUEST['pSy'];
			$psem=$_REQUEST['psem'];
			
						$result = mysqli_query($conn,"SELECT `sched`.*,`room`.`room_name` ,`course`.`course_yrSec`,`subjects`.`sub_code`,`profile`.`teacher_name` ,`timestart`.`time_s`,`day`.`day_name`,`school_yr`.`school_year` FROM `sched`,`room`,`course`,`subjects`,`profile`,`timestart` ,`day`,`school_yr`  WHERE sched.room_id=room.room_id and sched.course_id=course.course_id and sched.sub_id=subjects.sub_id and sched.teacher_id=profile.teacher_id and sched.time_s_id=timestart.time_s_id and sched.day_id=day.day_id 
 and sched.year_id=school_yr.year_id HAVING room_id='$pRoom' and sem_id='$psem' and year_id='$pSy'
  			");
			//HAVING course_id='$pCourse' and sem_id='$psem' and year_id='$pSy'
		if (!$result) 
			{
			die("Query to show fields from table failed");
			}
		$numberOfRows = MYSQLi_NUM_ROWS($result);
		
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
			  		echo $hidden_psubcat . '<br>'.$hidden_pcourse . '<br>'.$hidden_pt;
					end;
						}
						
	$i++;	 
			}
			} ?>
    </div></td>
  </tr>
  <tr>
    <td><div align="center" class="style19">11:30 - 12:30 <br />
      &nbsp;&nbsp;</div></td>
    <td><div align="center" class="style18">
      <?php
			$pRoom =$_REQUEST['pRoom'];
			$pSy =$_REQUEST['pSy'];
			$psem=$_REQUEST['psem'];
			
						$result = mysqli_query($conn,"SELECT `sched`.*,`room`.`room_name` ,`course`.`course_yrSec`,`subjects`.`sub_code`,`profile`.`teacher_name` ,`timestart`.`time_s`,`day`.`day_name`,`school_yr`.`school_year` FROM `sched`,`room`,`course`,`subjects`,`profile`,`timestart` ,`day`,`school_yr`  WHERE sched.room_id=room.room_id and sched.course_id=course.course_id and sched.sub_id=subjects.sub_id and sched.teacher_id=profile.teacher_id and sched.time_s_id=timestart.time_s_id and sched.day_id=day.day_id 
 and sched.year_id=school_yr.year_id HAVING room_id='$pRoom' and sem_id='$psem' and year_id='$pSy'
  			");
			//HAVING course_id='$pCourse' and sem_id='$psem' and year_id='$pSy'
		if (!$result) 
			{
			die("Query to show fields from table failed");
			}
		$numberOfRows = MYSQLi_NUM_ROWS($result);
		
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
			  		echo $hidden_psubcat . '<br>'.$hidden_pcourse . '<br>'.$hidden_pt;
					end;
						}
						
	$i++;	 
			}
			} ?>
    </div></td>
    <td><div align="center" class="style18">
      <?php
			$pRoom =$_REQUEST['pRoom'];
			$pSy =$_REQUEST['pSy'];
			$psem=$_REQUEST['psem'];
			
						$result = mysqli_query($conn,"SELECT `sched`.*,`room`.`room_name` ,`course`.`course_yrSec`,`subjects`.`sub_code`,`profile`.`teacher_name` ,`timestart`.`time_s`,`day`.`day_name`,`school_yr`.`school_year` FROM `sched`,`room`,`course`,`subjects`,`profile`,`timestart` ,`day`,`school_yr`  WHERE sched.room_id=room.room_id and sched.course_id=course.course_id and sched.sub_id=subjects.sub_id and sched.teacher_id=profile.teacher_id and sched.time_s_id=timestart.time_s_id and sched.day_id=day.day_id 
 and sched.year_id=school_yr.year_id HAVING room_id='$pRoom' and sem_id='$psem' and year_id='$pSy'
  			");
			//HAVING course_id='$pCourse' and sem_id='$psem' and year_id='$pSy'
		if (!$result) 
			{
			die("Query to show fields from table failed");
			}
		$numberOfRows = MYSQLi_NUM_ROWS($result);
		
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
			  		echo $hidden_psubcat . '<br>'.$hidden_pcourse . '<br>'.$hidden_pt;
					end;
						}
						
	$i++;	 
			}
			} ?>
    </div></td>
    <td><div align="center" class="style18">
      <?php
			$pRoom =$_REQUEST['pRoom'];
			$pSy =$_REQUEST['pSy'];
			$psem=$_REQUEST['psem'];
			
						$result = mysqli_query($conn,"SELECT `sched`.*,`room`.`room_name` ,`course`.`course_yrSec`,`subjects`.`sub_code`,`profile`.`teacher_name` ,`timestart`.`time_s`,`day`.`day_name`,`school_yr`.`school_year` FROM `sched`,`room`,`course`,`subjects`,`profile`,`timestart` ,`day`,`school_yr`  WHERE sched.room_id=room.room_id and sched.course_id=course.course_id and sched.sub_id=subjects.sub_id and sched.teacher_id=profile.teacher_id and sched.time_s_id=timestart.time_s_id and sched.day_id=day.day_id 
 and sched.year_id=school_yr.year_id HAVING room_id='$pRoom' and sem_id='$psem' and year_id='$pSy'
  			");
			//HAVING course_id='$pCourse' and sem_id='$psem' and year_id='$pSy'
		if (!$result) 
			{
			die("Query to show fields from table failed");
			}
		$numberOfRows = MYSQLi_NUM_ROWS($result);
		
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
			  		echo $hidden_psubcat . '<br>'.$hidden_pcourse . '<br>'.$hidden_pt;
					end;
						}
						
	$i++;	 
			}
			} ?>
    </div></td>
    <td><div align="center" class="style18">
      <?php
			$pRoom =$_REQUEST['pRoom'];
			$pSy =$_REQUEST['pSy'];
			$psem=$_REQUEST['psem'];
			
						$result = mysqli_query($conn,"SELECT `sched`.*,`room`.`room_name` ,`course`.`course_yrSec`,`subjects`.`sub_code`,`profile`.`teacher_name` ,`timestart`.`time_s`,`day`.`day_name`,`school_yr`.`school_year` FROM `sched`,`room`,`course`,`subjects`,`profile`,`timestart` ,`day`,`school_yr`  WHERE sched.room_id=room.room_id and sched.course_id=course.course_id and sched.sub_id=subjects.sub_id and sched.teacher_id=profile.teacher_id and sched.time_s_id=timestart.time_s_id and sched.day_id=day.day_id 
 and sched.year_id=school_yr.year_id HAVING room_id='$pRoom' and sem_id='$psem' and year_id='$pSy'
  			");
			//HAVING course_id='$pCourse' and sem_id='$psem' and year_id='$pSy'
		if (!$result) 
			{
			die("Query to show fields from table failed");
			}
		$numberOfRows = MYSQLi_NUM_ROWS($result);
		
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
			  		echo $hidden_psubcat . '<br>'.$hidden_pcourse . '<br>'.$hidden_pt;
					end;
						}
						
	$i++;	 
			}
			} ?>
    </div></td>
    <td><div align="center" class="style18">
      <?php
			$pRoom =$_REQUEST['pRoom'];
			$pSy =$_REQUEST['pSy'];
			$psem=$_REQUEST['psem'];
			
						$result = mysqli_query($conn,"SELECT `sched`.*,`room`.`room_name` ,`course`.`course_yrSec`,`subjects`.`sub_code`,`profile`.`teacher_name` ,`timestart`.`time_s`,`day`.`day_name`,`school_yr`.`school_year` FROM `sched`,`room`,`course`,`subjects`,`profile`,`timestart` ,`day`,`school_yr`  WHERE sched.room_id=room.room_id and sched.course_id=course.course_id and sched.sub_id=subjects.sub_id and sched.teacher_id=profile.teacher_id and sched.time_s_id=timestart.time_s_id and sched.day_id=day.day_id 
 and sched.year_id=school_yr.year_id HAVING room_id='$pRoom' and sem_id='$psem' and year_id='$pSy'
  			");
			//HAVING course_id='$pCourse' and sem_id='$psem' and year_id='$pSy'
		if (!$result) 
			{
			die("Query to show fields from table failed");
			}
		$numberOfRows = MYSQLi_NUM_ROWS($result);
		
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
			  		echo $hidden_psubcat . '<br>'.$hidden_pcourse . '<br>'.$hidden_pt;
					end;
						}
						
	$i++;	 
			}
			} ?>
    </div></td>
  </tr>
  <tr>
    <td><div align="center" class="style19">12:30 - 1:30 <br />
      &nbsp;&nbsp;</div></td>
    <td><div align="center" class="style18">
      <?php
			$pRoom =$_REQUEST['pRoom'];
			$pSy =$_REQUEST['pSy'];
			$psem=$_REQUEST['psem'];
			
						$result = mysqli_query($conn,"SELECT `sched`.*,`room`.`room_name` ,`course`.`course_yrSec`,`subjects`.`sub_code`,`profile`.`teacher_name` ,`timestart`.`time_s`,`day`.`day_name`,`school_yr`.`school_year` FROM `sched`,`room`,`course`,`subjects`,`profile`,`timestart` ,`day`,`school_yr`  WHERE sched.room_id=room.room_id and sched.course_id=course.course_id and sched.sub_id=subjects.sub_id and sched.teacher_id=profile.teacher_id and sched.time_s_id=timestart.time_s_id and sched.day_id=day.day_id 
 and sched.year_id=school_yr.year_id HAVING room_id='$pRoom' and sem_id='$psem' and year_id='$pSy'
  			");
			//HAVING course_id='$pCourse' and sem_id='$psem' and year_id='$pSy'
		if (!$result) 
			{
			die("Query to show fields from table failed");
			}
		$numberOfRows = MYSQLi_NUM_ROWS($result);
		
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
			  		echo $hidden_psubcat . '<br>'.$hidden_pcourse . '<br>'.$hidden_pt;
					end;
						}
						
	$i++;	 
			}
			} ?>
    </div></td>
    <td><div align="center" class="style18">
      <?php
			$pRoom =$_REQUEST['pRoom'];
			$pSy =$_REQUEST['pSy'];
			$psem=$_REQUEST['psem'];
			
						$result = mysqli_query($conn,"SELECT `sched`.*,`room`.`room_name` ,`course`.`course_yrSec`,`subjects`.`sub_code`,`profile`.`teacher_name` ,`timestart`.`time_s`,`day`.`day_name`,`school_yr`.`school_year` FROM `sched`,`room`,`course`,`subjects`,`profile`,`timestart` ,`day`,`school_yr`  WHERE sched.room_id=room.room_id and sched.course_id=course.course_id and sched.sub_id=subjects.sub_id and sched.teacher_id=profile.teacher_id and sched.time_s_id=timestart.time_s_id and sched.day_id=day.day_id 
 and sched.year_id=school_yr.year_id HAVING room_id='$pRoom' and sem_id='$psem' and year_id='$pSy'
  			");
			//HAVING course_id='$pCourse' and sem_id='$psem' and year_id='$pSy'
		if (!$result) 
			{
			die("Query to show fields from table failed");
			}
		$numberOfRows = MYSQLi_NUM_ROWS($result);
		
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
			  		echo $hidden_psubcat . '<br>'.$hidden_pcourse . '<br>'.$hidden_pt;
					end;
						}
						
	$i++;	 
			}
			} ?>
    </div></td>
    <td><div align="center" class="style18">
      <?php
			$pRoom =$_REQUEST['pRoom'];
			$pSy =$_REQUEST['pSy'];
			$psem=$_REQUEST['psem'];
			
						$result = mysqli_query($conn,"SELECT `sched`.*,`room`.`room_name` ,`course`.`course_yrSec`,`subjects`.`sub_code`,`profile`.`teacher_name` ,`timestart`.`time_s`,`day`.`day_name`,`school_yr`.`school_year` FROM `sched`,`room`,`course`,`subjects`,`profile`,`timestart` ,`day`,`school_yr`  WHERE sched.room_id=room.room_id and sched.course_id=course.course_id and sched.sub_id=subjects.sub_id and sched.teacher_id=profile.teacher_id and sched.time_s_id=timestart.time_s_id and sched.day_id=day.day_id 
 and sched.year_id=school_yr.year_id HAVING room_id='$pRoom' and sem_id='$psem' and year_id='$pSy'
  			");
			//HAVING course_id='$pCourse' and sem_id='$psem' and year_id='$pSy'
		if (!$result) 
			{
			die("Query to show fields from table failed");
			}
		$numberOfRows = MYSQLi_NUM_ROWS($result);
		
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
			  		echo $hidden_psubcat . '<br>'.$hidden_pcourse . '<br>'.$hidden_pt;
					end;
						}
						
	$i++;	 
			}
			} ?>
    </div></td>
    <td><div align="center" class="style18">
      <?php
			$pRoom =$_REQUEST['pRoom'];
			$pSy =$_REQUEST['pSy'];
			$psem=$_REQUEST['psem'];
			
						$result = mysqli_query($conn,"SELECT `sched`.*,`room`.`room_name` ,`course`.`course_yrSec`,`subjects`.`sub_code`,`profile`.`teacher_name` ,`timestart`.`time_s`,`day`.`day_name`,`school_yr`.`school_year` FROM `sched`,`room`,`course`,`subjects`,`profile`,`timestart` ,`day`,`school_yr`  WHERE sched.room_id=room.room_id and sched.course_id=course.course_id and sched.sub_id=subjects.sub_id and sched.teacher_id=profile.teacher_id and sched.time_s_id=timestart.time_s_id and sched.day_id=day.day_id 
 and sched.year_id=school_yr.year_id HAVING room_id='$pRoom' and sem_id='$psem' and year_id='$pSy'
  			");
			//HAVING course_id='$pCourse' and sem_id='$psem' and year_id='$pSy'
		if (!$result) 
			{
			die("Query to show fields from table failed");
			}
		$numberOfRows = MYSQLi_NUM_ROWS($result);
		
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
			  		echo $hidden_psubcat . '<br>'.$hidden_pcourse . '<br>'.$hidden_pt;
					end;
						}
						
	$i++;	 
			}
			} ?>
    </div></td>
    <td><div align="center" class="style18">
      <?php
			$pRoom =$_REQUEST['pRoom'];
			$pSy =$_REQUEST['pSy'];
			$psem=$_REQUEST['psem'];
			
						$result = mysqli_query($conn,"SELECT `sched`.*,`room`.`room_name` ,`course`.`course_yrSec`,`subjects`.`sub_code`,`profile`.`teacher_name` ,`timestart`.`time_s`,`day`.`day_name`,`school_yr`.`school_year` FROM `sched`,`room`,`course`,`subjects`,`profile`,`timestart` ,`day`,`school_yr`  WHERE sched.room_id=room.room_id and sched.course_id=course.course_id and sched.sub_id=subjects.sub_id and sched.teacher_id=profile.teacher_id and sched.time_s_id=timestart.time_s_id and sched.day_id=day.day_id 
 and sched.year_id=school_yr.year_id HAVING room_id='$pRoom' and sem_id='$psem' and year_id='$pSy'
  			");
			//HAVING course_id='$pCourse' and sem_id='$psem' and year_id='$pSy'
		if (!$result) 
			{
			die("Query to show fields from table failed");
			}
		$numberOfRows = MYSQLi_NUM_ROWS($result);
		
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
			  		echo $hidden_psubcat . '<br>'.$hidden_pcourse . '<br>'.$hidden_pt;
					end;
						}
						
	$i++;	 
			}
			} ?>
    </div></td>
  </tr>
  <tr>
    <td><div align="center" class="style19">1:30 - 2:30 <br />
      &nbsp;&nbsp;</div></td>
    <td><div align="center" class="style18">
      <?php
			$pRoom =$_REQUEST['pRoom'];
			$pSy =$_REQUEST['pSy'];
			$psem=$_REQUEST['psem'];
			
						$result = mysqli_query($conn,"SELECT `sched`.*,`room`.`room_name` ,`course`.`course_yrSec`,`subjects`.`sub_code`,`profile`.`teacher_name` ,`timestart`.`time_s`,`day`.`day_name`,`school_yr`.`school_year` FROM `sched`,`room`,`course`,`subjects`,`profile`,`timestart` ,`day`,`school_yr`  WHERE sched.room_id=room.room_id and sched.course_id=course.course_id and sched.sub_id=subjects.sub_id and sched.teacher_id=profile.teacher_id and sched.time_s_id=timestart.time_s_id and sched.day_id=day.day_id 
 and sched.year_id=school_yr.year_id HAVING room_id='$pRoom' and sem_id='$psem' and year_id='$pSy'
  			");
			//HAVING course_id='$pCourse' and sem_id='$psem' and year_id='$pSy'
		if (!$result) 
			{
			die("Query to show fields from table failed");
			}
		$numberOfRows = MYSQLi_NUM_ROWS($result);
		
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
			  		echo $hidden_psubcat . '<br>'.$hidden_pcourse . '<br>'.$hidden_pt;
					end;
						}
						
	$i++;	 
			}
			} ?>
    </div></td>
    <td><div align="center" class="style18">
      <?php
			$pRoom =$_REQUEST['pRoom'];
			$pSy =$_REQUEST['pSy'];
			$psem=$_REQUEST['psem'];
			
						$result = mysqli_query($conn,"SELECT `sched`.*,`room`.`room_name` ,`course`.`course_yrSec`,`subjects`.`sub_code`,`profile`.`teacher_name` ,`timestart`.`time_s`,`day`.`day_name`,`school_yr`.`school_year` FROM `sched`,`room`,`course`,`subjects`,`profile`,`timestart` ,`day`,`school_yr`  WHERE sched.room_id=room.room_id and sched.course_id=course.course_id and sched.sub_id=subjects.sub_id and sched.teacher_id=profile.teacher_id and sched.time_s_id=timestart.time_s_id and sched.day_id=day.day_id 
 and sched.year_id=school_yr.year_id HAVING room_id='$pRoom' and sem_id='$psem' and year_id='$pSy'
  			");
			//HAVING course_id='$pCourse' and sem_id='$psem' and year_id='$pSy'
		if (!$result) 
			{
			die("Query to show fields from table failed");
			}
		$numberOfRows = MYSQLi_NUM_ROWS($result);
		
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
			  		echo $hidden_psubcat . '<br>'.$hidden_pcourse . '<br>'.$hidden_pt;
					end;
						}
						
	$i++;	 
			}
			} ?>
    </div></td>
    <td><div align="center" class="style18">
      <?php
			$pRoom =$_REQUEST['pRoom'];
			$pSy =$_REQUEST['pSy'];
			$psem=$_REQUEST['psem'];
			
						$result = mysqli_query($conn,"SELECT `sched`.*,`room`.`room_name` ,`course`.`course_yrSec`,`subjects`.`sub_code`,`profile`.`teacher_name` ,`timestart`.`time_s`,`day`.`day_name`,`school_yr`.`school_year` FROM `sched`,`room`,`course`,`subjects`,`profile`,`timestart` ,`day`,`school_yr`  WHERE sched.room_id=room.room_id and sched.course_id=course.course_id and sched.sub_id=subjects.sub_id and sched.teacher_id=profile.teacher_id and sched.time_s_id=timestart.time_s_id and sched.day_id=day.day_id 
 and sched.year_id=school_yr.year_id HAVING room_id='$pRoom' and sem_id='$psem' and year_id='$pSy'
  			");
			//HAVING course_id='$pCourse' and sem_id='$psem' and year_id='$pSy'
		if (!$result) 
			{
			die("Query to show fields from table failed");
			}
		$numberOfRows = MYSQLi_NUM_ROWS($result);
		
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
			  		echo $hidden_psubcat . '<br>'.$hidden_pcourse . '<br>'.$hidden_pt;
					end;
						}
						
	$i++;	 
			}
			} ?>
    </div></td>
    <td><div align="center" class="style18">
      <?php
			$pRoom =$_REQUEST['pRoom'];
			$pSy =$_REQUEST['pSy'];
			$psem=$_REQUEST['psem'];
			
						$result = mysqli_query($conn,"SELECT `sched`.*,`room`.`room_name` ,`course`.`course_yrSec`,`subjects`.`sub_code`,`profile`.`teacher_name` ,`timestart`.`time_s`,`day`.`day_name`,`school_yr`.`school_year` FROM `sched`,`room`,`course`,`subjects`,`profile`,`timestart` ,`day`,`school_yr`  WHERE sched.room_id=room.room_id and sched.course_id=course.course_id and sched.sub_id=subjects.sub_id and sched.teacher_id=profile.teacher_id and sched.time_s_id=timestart.time_s_id and sched.day_id=day.day_id 
 and sched.year_id=school_yr.year_id HAVING room_id='$pRoom' and sem_id='$psem' and year_id='$pSy'
  			");
			//HAVING course_id='$pCourse' and sem_id='$psem' and year_id='$pSy'
		if (!$result) 
			{
			die("Query to show fields from table failed");
			}
		$numberOfRows = MYSQLi_NUM_ROWS($result);
		
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
			  		echo $hidden_psubcat . '<br>'.$hidden_pcourse . '<br>'.$hidden_pt;
					end;
						}
						
	$i++;	 
			}
			} ?>
    </div></td>
    <td><div align="center" class="style18">
      <?php
			$pRoom =$_REQUEST['pRoom'];
			$pSy =$_REQUEST['pSy'];
			$psem=$_REQUEST['psem'];
			
						$result = mysqli_query($conn,"SELECT `sched`.*,`room`.`room_name` ,`course`.`course_yrSec`,`subjects`.`sub_code`,`profile`.`teacher_name` ,`timestart`.`time_s`,`day`.`day_name`,`school_yr`.`school_year` FROM `sched`,`room`,`course`,`subjects`,`profile`,`timestart` ,`day`,`school_yr`  WHERE sched.room_id=room.room_id and sched.course_id=course.course_id and sched.sub_id=subjects.sub_id and sched.teacher_id=profile.teacher_id and sched.time_s_id=timestart.time_s_id and sched.day_id=day.day_id 
 and sched.year_id=school_yr.year_id HAVING room_id='$pRoom' and sem_id='$psem' and year_id='$pSy'
  			");
			//HAVING course_id='$pCourse' and sem_id='$psem' and year_id='$pSy'
		if (!$result) 
			{
			die("Query to show fields from table failed");
			}
		$numberOfRows = MYSQLi_NUM_ROWS($result);
		
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
			  		echo $hidden_psubcat . '<br>'.$hidden_pcourse . '<br>'.$hidden_pt;
					end;
						}
						
	$i++;	 
			}
			} ?>
    </div></td>
  </tr>
  <tr>
    <td><div align="center" class="style19">2:30 - 3:30 <br />
      &nbsp;&nbsp;</div></td>
    <td><div align="center" class="style18">
      <?php
			$pRoom =$_REQUEST['pRoom'];
			$pSy =$_REQUEST['pSy'];
			$psem=$_REQUEST['psem'];
			
						$result = mysqli_query($conn,"SELECT `sched`.*,`room`.`room_name` ,`course`.`course_yrSec`,`subjects`.`sub_code`,`profile`.`teacher_name` ,`timestart`.`time_s`,`day`.`day_name`,`school_yr`.`school_year` FROM `sched`,`room`,`course`,`subjects`,`profile`,`timestart` ,`day`,`school_yr`  WHERE sched.room_id=room.room_id and sched.course_id=course.course_id and sched.sub_id=subjects.sub_id and sched.teacher_id=profile.teacher_id and sched.time_s_id=timestart.time_s_id and sched.day_id=day.day_id 
 and sched.year_id=school_yr.year_id HAVING room_id='$pRoom' and sem_id='$psem' and year_id='$pSy'
  			");
			//HAVING course_id='$pCourse' and sem_id='$psem' and year_id='$pSy'
		if (!$result) 
			{
			die("Query to show fields from table failed");
			}
		$numberOfRows = MYSQLi_NUM_ROWS($result);
		
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
			  		echo $hidden_psubcat . '<br>'.$hidden_pcourse . '<br>'.$hidden_pt;
					end;
						}
						
	$i++;	 
			}
			} ?>
    </div></td>
    <td><div align="center" class="style18">
      <?php
			$pRoom =$_REQUEST['pRoom'];
			$pSy =$_REQUEST['pSy'];
			$psem=$_REQUEST['psem'];
			
						$result = mysqli_query($conn,"SELECT `sched`.*,`room`.`room_name` ,`course`.`course_yrSec`,`subjects`.`sub_code`,`profile`.`teacher_name` ,`timestart`.`time_s`,`day`.`day_name`,`school_yr`.`school_year` FROM `sched`,`room`,`course`,`subjects`,`profile`,`timestart` ,`day`,`school_yr`  WHERE sched.room_id=room.room_id and sched.course_id=course.course_id and sched.sub_id=subjects.sub_id and sched.teacher_id=profile.teacher_id and sched.time_s_id=timestart.time_s_id and sched.day_id=day.day_id 
 and sched.year_id=school_yr.year_id HAVING room_id='$pRoom' and sem_id='$psem' and year_id='$pSy'
  			");
			//HAVING course_id='$pCourse' and sem_id='$psem' and year_id='$pSy'
		if (!$result) 
			{
			die("Query to show fields from table failed");
			}
		$numberOfRows = MYSQLi_NUM_ROWS($result);
		
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
			  		echo $hidden_psubcat . '<br>'.$hidden_pcourse . '<br>'.$hidden_pt;
					end;
						}
						
	$i++;	 
			}
			} ?>
    </div></td>
    <td><div align="center" class="style18">
      <?php
			$pRoom =$_REQUEST['pRoom'];
			$pSy =$_REQUEST['pSy'];
			$psem=$_REQUEST['psem'];
			
						$result = mysqli_query($conn,"SELECT `sched`.*,`room`.`room_name` ,`course`.`course_yrSec`,`subjects`.`sub_code`,`profile`.`teacher_name` ,`timestart`.`time_s`,`day`.`day_name`,`school_yr`.`school_year` FROM `sched`,`room`,`course`,`subjects`,`profile`,`timestart` ,`day`,`school_yr`  WHERE sched.room_id=room.room_id and sched.course_id=course.course_id and sched.sub_id=subjects.sub_id and sched.teacher_id=profile.teacher_id and sched.time_s_id=timestart.time_s_id and sched.day_id=day.day_id 
 and sched.year_id=school_yr.year_id HAVING room_id='$pRoom' and sem_id='$psem' and year_id='$pSy'
  			");
			//HAVING course_id='$pCourse' and sem_id='$psem' and year_id='$pSy'
		if (!$result) 
			{
			die("Query to show fields from table failed");
			}
		$numberOfRows = MYSQLi_NUM_ROWS($result);
		
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
			  		echo $hidden_psubcat . '<br>'.$hidden_pcourse . '<br>'.$hidden_pt;
					end;
						}
						
	$i++;	 
			}
			} ?>
    </div></td>
    <td><div align="center" class="style18">
      <?php
			$pRoom =$_REQUEST['pRoom'];
			$pSy =$_REQUEST['pSy'];
			$psem=$_REQUEST['psem'];
			
						$result = mysqli_query($conn,"SELECT `sched`.*,`room`.`room_name` ,`course`.`course_yrSec`,`subjects`.`sub_code`,`profile`.`teacher_name` ,`timestart`.`time_s`,`day`.`day_name`,`school_yr`.`school_year` FROM `sched`,`room`,`course`,`subjects`,`profile`,`timestart` ,`day`,`school_yr`  WHERE sched.room_id=room.room_id and sched.course_id=course.course_id and sched.sub_id=subjects.sub_id and sched.teacher_id=profile.teacher_id and sched.time_s_id=timestart.time_s_id and sched.day_id=day.day_id 
 and sched.year_id=school_yr.year_id HAVING room_id='$pRoom' and sem_id='$psem' and year_id='$pSy'
  			");
			//HAVING course_id='$pCourse' and sem_id='$psem' and year_id='$pSy'
		if (!$result) 
			{
			die("Query to show fields from table failed");
			}
		$numberOfRows = MYSQLi_NUM_ROWS($result);
		
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
			  		echo $hidden_psubcat . '<br>'.$hidden_pcourse . '<br>'.$hidden_pt;
					end;
						}
						
	$i++;	 
			}
			} ?>
    </div></td>
    <td><div align="center" class="style18">
      <?php
			$pRoom =$_REQUEST['pRoom'];
			$pSy =$_REQUEST['pSy'];
			$psem=$_REQUEST['psem'];
			
						$result = mysqli_query($conn,"SELECT `sched`.*,`room`.`room_name` ,`course`.`course_yrSec`,`subjects`.`sub_code`,`profile`.`teacher_name` ,`timestart`.`time_s`,`day`.`day_name`,`school_yr`.`school_year` FROM `sched`,`room`,`course`,`subjects`,`profile`,`timestart` ,`day`,`school_yr`  WHERE sched.room_id=room.room_id and sched.course_id=course.course_id and sched.sub_id=subjects.sub_id and sched.teacher_id=profile.teacher_id and sched.time_s_id=timestart.time_s_id and sched.day_id=day.day_id 
 and sched.year_id=school_yr.year_id HAVING room_id='$pRoom' and sem_id='$psem' and year_id='$pSy'
  			");
			//HAVING course_id='$pCourse' and sem_id='$psem' and year_id='$pSy'
		if (!$result) 
			{
			die("Query to show fields from table failed");
			}
		$numberOfRows = MYSQLi_NUM_ROWS($result);
		
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
			  		echo $hidden_psubcat . '<br>'.$hidden_pcourse . '<br>'.$hidden_pt;
					end;
						}
						
	$i++;	 
			}
			} ?>
    </div></td>
  </tr>
  <tr>
    <td><div align="center" class="style19">3:30 - 4:30 <br />
      &nbsp;&nbsp;</div></td>
    <td><div align="center" class="style18">
      <?php
			$pRoom =$_REQUEST['pRoom'];
			$pSy =$_REQUEST['pSy'];
			$psem=$_REQUEST['psem'];
			
						$result = mysqli_query($conn,"SELECT `sched`.*,`room`.`room_name` ,`course`.`course_yrSec`,`subjects`.`sub_code`,`profile`.`teacher_name` ,`timestart`.`time_s`,`day`.`day_name`,`school_yr`.`school_year` FROM `sched`,`room`,`course`,`subjects`,`profile`,`timestart` ,`day`,`school_yr`  WHERE sched.room_id=room.room_id and sched.course_id=course.course_id and sched.sub_id=subjects.sub_id and sched.teacher_id=profile.teacher_id and sched.time_s_id=timestart.time_s_id and sched.day_id=day.day_id 
 and sched.year_id=school_yr.year_id HAVING room_id='$pRoom' and sem_id='$psem' and year_id='$pSy'
  			");
			//HAVING course_id='$pCourse' and sem_id='$psem' and year_id='$pSy'
		if (!$result) 
			{
			die("Query to show fields from table failed");
			}
		$numberOfRows = MYSQLi_NUM_ROWS($result);
		
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
			  		echo $hidden_psubcat . '<br>'.$hidden_pcourse . '<br>'.$hidden_pt;
					end;
						}
						
	$i++;	 
			}
			} ?>
    </div></td>
    <td><div align="center" class="style18">
      <?php
			$pRoom =$_REQUEST['pRoom'];
			$pSy =$_REQUEST['pSy'];
			$psem=$_REQUEST['psem'];
			
						$result = mysqli_query($conn,"SELECT `sched`.*,`room`.`room_name` ,`course`.`course_yrSec`,`subjects`.`sub_code`,`profile`.`teacher_name` ,`timestart`.`time_s`,`day`.`day_name`,`school_yr`.`school_year` FROM `sched`,`room`,`course`,`subjects`,`profile`,`timestart` ,`day`,`school_yr`  WHERE sched.room_id=room.room_id and sched.course_id=course.course_id and sched.sub_id=subjects.sub_id and sched.teacher_id=profile.teacher_id and sched.time_s_id=timestart.time_s_id and sched.day_id=day.day_id 
 and sched.year_id=school_yr.year_id HAVING room_id='$pRoom' and sem_id='$psem' and year_id='$pSy'
  			");
			//HAVING course_id='$pCourse' and sem_id='$psem' and year_id='$pSy'
		if (!$result) 
			{
			die("Query to show fields from table failed");
			}
		$numberOfRows = MYSQLi_NUM_ROWS($result);
		
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
			  		echo $hidden_psubcat . '<br>'.$hidden_pcourse . '<br>'.$hidden_pt;
					end;
						}
						
	$i++;	 
			}
			} ?>
    </div></td>
    <td><div align="center" class="style18">
      <?php
			$pRoom =$_REQUEST['pRoom'];
			$pSy =$_REQUEST['pSy'];
			$psem=$_REQUEST['psem'];
			
						$result = mysqli_query($conn,"SELECT `sched`.*,`room`.`room_name` ,`course`.`course_yrSec`,`subjects`.`sub_code`,`profile`.`teacher_name` ,`timestart`.`time_s`,`day`.`day_name`,`school_yr`.`school_year` FROM `sched`,`room`,`course`,`subjects`,`profile`,`timestart` ,`day`,`school_yr`  WHERE sched.room_id=room.room_id and sched.course_id=course.course_id and sched.sub_id=subjects.sub_id and sched.teacher_id=profile.teacher_id and sched.time_s_id=timestart.time_s_id and sched.day_id=day.day_id 
 and sched.year_id=school_yr.year_id HAVING room_id='$pRoom' and sem_id='$psem' and year_id='$pSy'
  			");
			//HAVING course_id='$pCourse' and sem_id='$psem' and year_id='$pSy'
		if (!$result) 
			{
			die("Query to show fields from table failed");
			}
		$numberOfRows = MYSQLi_NUM_ROWS($result);
		
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
			  		echo $hidden_psubcat . '<br>'.$hidden_pcourse . '<br>'.$hidden_pt;
					end;
						}
						
	$i++;	 
			}
			} ?>
    </div></td>
    <td><div align="center" class="style18">
      <?php
			$pRoom =$_REQUEST['pRoom'];
			$pSy =$_REQUEST['pSy'];
			$psem=$_REQUEST['psem'];
			
						$result = mysqli_query($conn,"SELECT `sched`.*,`room`.`room_name` ,`course`.`course_yrSec`,`subjects`.`sub_code`,`profile`.`teacher_name` ,`timestart`.`time_s`,`day`.`day_name`,`school_yr`.`school_year` FROM `sched`,`room`,`course`,`subjects`,`profile`,`timestart` ,`day`,`school_yr`  WHERE sched.room_id=room.room_id and sched.course_id=course.course_id and sched.sub_id=subjects.sub_id and sched.teacher_id=profile.teacher_id and sched.time_s_id=timestart.time_s_id and sched.day_id=day.day_id 
 and sched.year_id=school_yr.year_id HAVING room_id='$pRoom' and sem_id='$psem' and year_id='$pSy'
  			");
			//HAVING course_id='$pCourse' and sem_id='$psem' and year_id='$pSy'
		if (!$result) 
			{
			die("Query to show fields from table failed");
			}
		$numberOfRows = MYSQLi_NUM_ROWS($result);
		
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
			  		echo $hidden_psubcat . '<br>'.$hidden_pcourse . '<br>'.$hidden_pt;
					end;
						}
						
	$i++;	 
			}
			} ?>
    </div></td>
    <td><div align="center" class="style18">
      <?php
			$pRoom =$_REQUEST['pRoom'];
			$pSy =$_REQUEST['pSy'];
			$psem=$_REQUEST['psem'];
			
						$result = mysqli_query($conn,"SELECT `sched`.*,`room`.`room_name` ,`course`.`course_yrSec`,`subjects`.`sub_code`,`profile`.`teacher_name` ,`timestart`.`time_s`,`day`.`day_name`,`school_yr`.`school_year` FROM `sched`,`room`,`course`,`subjects`,`profile`,`timestart` ,`day`,`school_yr`  WHERE sched.room_id=room.room_id and sched.course_id=course.course_id and sched.sub_id=subjects.sub_id and sched.teacher_id=profile.teacher_id and sched.time_s_id=timestart.time_s_id and sched.day_id=day.day_id 
 and sched.year_id=school_yr.year_id HAVING room_id='$pRoom' and sem_id='$psem' and year_id='$pSy'
  			");
			//HAVING course_id='$pCourse' and sem_id='$psem' and year_id='$pSy'
		if (!$result) 
			{
			die("Query to show fields from table failed");
			}
		$numberOfRows = MYSQLi_NUM_ROWS($result);
		
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
			  		echo $hidden_psubcat . '<br>'.$hidden_pcourse . '<br>'.$hidden_pt;
					end;
						}
						
	$i++;	 
			}
			} ?>
    </div></td>
  </tr>
  <tr>
    <td><div align="center" class="style19">4:30 - 5:30 <br />
      &nbsp;&nbsp;</div></td>
    <td><div align="center" class="style18">
      <?php
			$pRoom =$_REQUEST['pRoom'];
			$pSy =$_REQUEST['pSy'];
			$psem=$_REQUEST['psem'];
			
						$result = mysqli_query($conn,"SELECT `sched`.*,`room`.`room_name` ,`course`.`course_yrSec`,`subjects`.`sub_code`,`profile`.`teacher_name` ,`timestart`.`time_s`,`day`.`day_name`,`school_yr`.`school_year` FROM `sched`,`room`,`course`,`subjects`,`profile`,`timestart` ,`day`,`school_yr`  WHERE sched.room_id=room.room_id and sched.course_id=course.course_id and sched.sub_id=subjects.sub_id and sched.teacher_id=profile.teacher_id and sched.time_s_id=timestart.time_s_id and sched.day_id=day.day_id 
 and sched.year_id=school_yr.year_id HAVING room_id='$pRoom' and sem_id='$psem' and year_id='$pSy'
  			");
			//HAVING course_id='$pCourse' and sem_id='$psem' and year_id='$pSy'
		if (!$result) 
			{
			die("Query to show fields from table failed");
			}
		$numberOfRows = MYSQLi_NUM_ROWS($result);
		
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
			  		echo $hidden_psubcat . '<br>'.$hidden_pcourse . '<br>'.$hidden_pt;
					end;
						}
						
	$i++;	 
			}
			} ?>
    </div></td>
    <td><div align="center" class="style18">
      <?php
			$pRoom =$_REQUEST['pRoom'];
			$pSy =$_REQUEST['pSy'];
			$psem=$_REQUEST['psem'];
			
						$result = mysqli_query($conn,"SELECT `sched`.*,`room`.`room_name` ,`course`.`course_yrSec`,`subjects`.`sub_code`,`profile`.`teacher_name` ,`timestart`.`time_s`,`day`.`day_name`,`school_yr`.`school_year` FROM `sched`,`room`,`course`,`subjects`,`profile`,`timestart` ,`day`,`school_yr`  WHERE sched.room_id=room.room_id and sched.course_id=course.course_id and sched.sub_id=subjects.sub_id and sched.teacher_id=profile.teacher_id and sched.time_s_id=timestart.time_s_id and sched.day_id=day.day_id 
 and sched.year_id=school_yr.year_id HAVING room_id='$pRoom' and sem_id='$psem' and year_id='$pSy'
  			");
			//HAVING course_id='$pCourse' and sem_id='$psem' and year_id='$pSy'
		if (!$result) 
			{
			die("Query to show fields from table failed");
			}
		$numberOfRows = MYSQLi_NUM_ROWS($result);
		
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
			  		echo $hidden_psubcat . '<br>'.$hidden_pcourse . '<br>'.$hidden_pt;
					end;
						}
						
	$i++;	 
			}
			} ?>
    </div></td>
    <td><div align="center" class="style18">
      <?php
			$pRoom =$_REQUEST['pRoom'];
			$pSy =$_REQUEST['pSy'];
			$psem=$_REQUEST['psem'];
			
						$result = mysqli_query($conn,"SELECT `sched`.*,`room`.`room_name` ,`course`.`course_yrSec`,`subjects`.`sub_code`,`profile`.`teacher_name` ,`timestart`.`time_s`,`day`.`day_name`,`school_yr`.`school_year` FROM `sched`,`room`,`course`,`subjects`,`profile`,`timestart` ,`day`,`school_yr`  WHERE sched.room_id=room.room_id and sched.course_id=course.course_id and sched.sub_id=subjects.sub_id and sched.teacher_id=profile.teacher_id and sched.time_s_id=timestart.time_s_id and sched.day_id=day.day_id 
 and sched.year_id=school_yr.year_id HAVING room_id='$pRoom' and sem_id='$psem' and year_id='$pSy'
  			");
			//HAVING course_id='$pCourse' and sem_id='$psem' and year_id='$pSy'
		if (!$result) 
			{
			die("Query to show fields from table failed");
			}
		$numberOfRows = MYSQLi_NUM_ROWS($result);
		
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
			  		echo $hidden_psubcat . '<br>'.$hidden_pcourse . '<br>'.$hidden_pt;
					end;
						}
						
	$i++;	 
			}
			} ?>
    </div></td>
    <td><div align="center" class="style18">
      <?php
			$pRoom =$_REQUEST['pRoom'];
			$pSy =$_REQUEST['pSy'];
			$psem=$_REQUEST['psem'];
			
						$result = mysqli_query($conn,"SELECT `sched`.*,`room`.`room_name` ,`course`.`course_yrSec`,`subjects`.`sub_code`,`profile`.`teacher_name` ,`timestart`.`time_s`,`day`.`day_name`,`school_yr`.`school_year` FROM `sched`,`room`,`course`,`subjects`,`profile`,`timestart` ,`day`,`school_yr`  WHERE sched.room_id=room.room_id and sched.course_id=course.course_id and sched.sub_id=subjects.sub_id and sched.teacher_id=profile.teacher_id and sched.time_s_id=timestart.time_s_id and sched.day_id=day.day_id 
 and sched.year_id=school_yr.year_id HAVING room_id='$pRoom' and sem_id='$psem' and year_id='$pSy'
  			");
			//HAVING course_id='$pCourse' and sem_id='$psem' and year_id='$pSy'
		if (!$result) 
			{
			die("Query to show fields from table failed");
			}
		$numberOfRows = MYSQLi_NUM_ROWS($result);
		
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
			  		echo $hidden_psubcat . '<br>'.$hidden_pcourse . '<br>'.$hidden_pt;
					end;
						}
						
	$i++;	 
			}
			} ?>
    </div></td>
    <td><div align="center" class="style18">
      <?php
			$pRoom =$_REQUEST['pRoom'];
			$pSy =$_REQUEST['pSy'];
			$psem=$_REQUEST['psem'];
			
						$result = mysqli_query($conn,"SELECT `sched`.*,`room`.`room_name` ,`course`.`course_yrSec`,`subjects`.`sub_code`,`profile`.`teacher_name` ,`timestart`.`time_s`,`day`.`day_name`,`school_yr`.`school_year` FROM `sched`,`room`,`course`,`subjects`,`profile`,`timestart` ,`day`,`school_yr`  WHERE sched.room_id=room.room_id and sched.course_id=course.course_id and sched.sub_id=subjects.sub_id and sched.teacher_id=profile.teacher_id and sched.time_s_id=timestart.time_s_id and sched.day_id=day.day_id 
 and sched.year_id=school_yr.year_id HAVING room_id='$pRoom' and sem_id='$psem' and year_id='$pSy'
  			");
			//HAVING course_id='$pCourse' and sem_id='$psem' and year_id='$pSy'
		if (!$result) 
			{
			die("Query to show fields from table failed");
			}
		$numberOfRows = MYSQLi_NUM_ROWS($result);
		
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
			  		echo $hidden_psubcat . '<br>'.$hidden_pcourse . '<br>'.$hidden_pt;
					end;
						}
						
	$i++;	 
			}
			} ?>
    </div></td>
  </tr>
  <tr>
    <td><div align="center" class="style19">5:30 - 6:30 <br />
      &nbsp;&nbsp;</div></td>
    <td><div align="center" class="style18">
      <?php
			$pRoom =$_REQUEST['pRoom'];
			$pSy =$_REQUEST['pSy'];
			$psem=$_REQUEST['psem'];
			
						$result = mysqli_query($conn,"SELECT `sched`.*,`room`.`room_name` ,`course`.`course_yrSec`,`subjects`.`sub_code`,`profile`.`teacher_name` ,`timestart`.`time_s`,`day`.`day_name`,`school_yr`.`school_year` FROM `sched`,`room`,`course`,`subjects`,`profile`,`timestart` ,`day`,`school_yr`  WHERE sched.room_id=room.room_id and sched.course_id=course.course_id and sched.sub_id=subjects.sub_id and sched.teacher_id=profile.teacher_id and sched.time_s_id=timestart.time_s_id and sched.day_id=day.day_id 
 and sched.year_id=school_yr.year_id HAVING room_id='$pRoom' and sem_id='$psem' and year_id='$pSy'
  			");
			//HAVING course_id='$pCourse' and sem_id='$psem' and year_id='$pSy'
		if (!$result) 
			{
			die("Query to show fields from table failed");
			}
		$numberOfRows = MYSQLi_NUM_ROWS($result);
		
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
			  		echo $hidden_psubcat . '<br>'.$hidden_pcourse . '<br>'.$hidden_pt;
					end;
						}
						
	$i++;	 
			}
			} ?>
    </div></td>
    <td><div align="center" class="style18">
      <?php
			$pRoom =$_REQUEST['pRoom'];
			$pSy =$_REQUEST['pSy'];
			$psem=$_REQUEST['psem'];
			
						$result = mysqli_query($conn,"SELECT `sched`.*,`room`.`room_name` ,`course`.`course_yrSec`,`subjects`.`sub_code`,`profile`.`teacher_name` ,`timestart`.`time_s`,`day`.`day_name`,`school_yr`.`school_year` FROM `sched`,`room`,`course`,`subjects`,`profile`,`timestart` ,`day`,`school_yr`  WHERE sched.room_id=room.room_id and sched.course_id=course.course_id and sched.sub_id=subjects.sub_id and sched.teacher_id=profile.teacher_id and sched.time_s_id=timestart.time_s_id and sched.day_id=day.day_id 
 and sched.year_id=school_yr.year_id HAVING room_id='$pRoom' and sem_id='$psem' and year_id='$pSy'
  			");
			//HAVING course_id='$pCourse' and sem_id='$psem' and year_id='$pSy'
		if (!$result) 
			{
			die("Query to show fields from table failed");
			}
		$numberOfRows = MYSQLi_NUM_ROWS($result);
		
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
			  		echo $hidden_psubcat . '<br>'.$hidden_pcourse . '<br>'.$hidden_pt;
					end;
						}
						
	$i++;	 
			}
			} ?>
    </div></td>
    <td><div align="center" class="style18">
      <?php
			$pRoom =$_REQUEST['pRoom'];
			$pSy =$_REQUEST['pSy'];
			$psem=$_REQUEST['psem'];
			
						$result = mysqli_query($conn,"SELECT `sched`.*,`room`.`room_name` ,`course`.`course_yrSec`,`subjects`.`sub_code`,`profile`.`teacher_name` ,`timestart`.`time_s`,`day`.`day_name`,`school_yr`.`school_year` FROM `sched`,`room`,`course`,`subjects`,`profile`,`timestart` ,`day`,`school_yr`  WHERE sched.room_id=room.room_id and sched.course_id=course.course_id and sched.sub_id=subjects.sub_id and sched.teacher_id=profile.teacher_id and sched.time_s_id=timestart.time_s_id and sched.day_id=day.day_id 
 and sched.year_id=school_yr.year_id HAVING room_id='$pRoom' and sem_id='$psem' and year_id='$pSy'
  			");
			//HAVING course_id='$pCourse' and sem_id='$psem' and year_id='$pSy'
		if (!$result) 
			{
			die("Query to show fields from table failed");
			}
		$numberOfRows = MYSQLi_NUM_ROWS($result);
		
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
			  		echo $hidden_psubcat . '<br>'.$hidden_pcourse . '<br>'.$hidden_pt;
					end;
						}
						
	$i++;	 
			}
			} ?>
    </div></td>
    <td><div align="center" class="style18">
      <?php
			$pRoom =$_REQUEST['pRoom'];
			$pSy =$_REQUEST['pSy'];
			$psem=$_REQUEST['psem'];
			
						$result = mysqli_query($conn,"SELECT `sched`.*,`room`.`room_name` ,`course`.`course_yrSec`,`subjects`.`sub_code`,`profile`.`teacher_name` ,`timestart`.`time_s`,`day`.`day_name`,`school_yr`.`school_year` FROM `sched`,`room`,`course`,`subjects`,`profile`,`timestart` ,`day`,`school_yr`  WHERE sched.room_id=room.room_id and sched.course_id=course.course_id and sched.sub_id=subjects.sub_id and sched.teacher_id=profile.teacher_id and sched.time_s_id=timestart.time_s_id and sched.day_id=day.day_id 
 and sched.year_id=school_yr.year_id HAVING room_id='$pRoom' and sem_id='$psem' and year_id='$pSy'
  			");
			//HAVING course_id='$pCourse' and sem_id='$psem' and year_id='$pSy'
		if (!$result) 
			{
			die("Query to show fields from table failed");
			}
		$numberOfRows = MYSQLi_NUM_ROWS($result);
		
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
			  		echo $hidden_psubcat . '<br>'.$hidden_pcourse . '<br>'.$hidden_pt;
					end;
						}
						
	$i++;	 
			}
			} ?>
    </div></td>
    <td><div align="center" class="style18">
      <?php
			$pRoom =$_REQUEST['pRoom'];
			$pSy =$_REQUEST['pSy'];
			$psem=$_REQUEST['psem'];
			
						$result = mysqli_query($conn,"SELECT `sched`.*,`room`.`room_name` ,`course`.`course_yrSec`,`subjects`.`sub_code`,`profile`.`teacher_name` ,`timestart`.`time_s`,`day`.`day_name`,`school_yr`.`school_year` FROM `sched`,`room`,`course`,`subjects`,`profile`,`timestart` ,`day`,`school_yr`  WHERE sched.room_id=room.room_id and sched.course_id=course.course_id and sched.sub_id=subjects.sub_id and sched.teacher_id=profile.teacher_id and sched.time_s_id=timestart.time_s_id and sched.day_id=day.day_id 
 and sched.year_id=school_yr.year_id HAVING room_id='$pRoom' and sem_id='$psem' and year_id='$pSy'
  			");
			//HAVING course_id='$pCourse' and sem_id='$psem' and year_id='$pSy'
		if (!$result) 
			{
			die("Query to show fields from table failed");
			}
		$numberOfRows = MYSQLi_NUM_ROWS($result);
		
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
			  		echo $hidden_psubcat . '<br>'.$hidden_pcourse . '<br>'.$hidden_pt;
					end;
						}
						
	$i++;	 
			}
			} ?>
    </div></td>
  </tr>
  <tr>
    <td><div align="center" class="style19">6:30 - 7:30 <br />
      &nbsp;&nbsp;</div></td>
    <td><div align="center" class="style18">
      <?php
			$pRoom =$_REQUEST['pRoom'];
			$pSy =$_REQUEST['pSy'];
			$psem=$_REQUEST['psem'];
			
						$result = mysqli_query($conn,"SELECT `sched`.*,`room`.`room_name` ,`course`.`course_yrSec`,`subjects`.`sub_code`,`profile`.`teacher_name` ,`timestart`.`time_s`,`day`.`day_name`,`school_yr`.`school_year` FROM `sched`,`room`,`course`,`subjects`,`profile`,`timestart` ,`day`,`school_yr`  WHERE sched.room_id=room.room_id and sched.course_id=course.course_id and sched.sub_id=subjects.sub_id and sched.teacher_id=profile.teacher_id and sched.time_s_id=timestart.time_s_id and sched.day_id=day.day_id 
 and sched.year_id=school_yr.year_id HAVING room_id='$pRoom' and sem_id='$psem' and year_id='$pSy'
  			");
			//HAVING course_id='$pCourse' and sem_id='$psem' and year_id='$pSy'
		if (!$result) 
			{
			die("Query to show fields from table failed");
			}
		$numberOfRows = MYSQLi_NUM_ROWS($result);
		
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
			  		echo $hidden_psubcat . '<br>'.$hidden_pcourse . '<br>'.$hidden_pt;
					end;
						}
						
	$i++;	 
			}
			} ?>
    </div></td>
    <td><div align="center" class="style18">
      <?php
			$pRoom =$_REQUEST['pRoom'];
			$pSy =$_REQUEST['pSy'];
			$psem=$_REQUEST['psem'];
			
						$result = mysqli_query($conn,"SELECT `sched`.*,`room`.`room_name` ,`course`.`course_yrSec`,`subjects`.`sub_code`,`profile`.`teacher_name` ,`timestart`.`time_s`,`day`.`day_name`,`school_yr`.`school_year` FROM `sched`,`room`,`course`,`subjects`,`profile`,`timestart` ,`day`,`school_yr`  WHERE sched.room_id=room.room_id and sched.course_id=course.course_id and sched.sub_id=subjects.sub_id and sched.teacher_id=profile.teacher_id and sched.time_s_id=timestart.time_s_id and sched.day_id=day.day_id 
 and sched.year_id=school_yr.year_id HAVING room_id='$pRoom' and sem_id='$psem' and year_id='$pSy'
  			");
			//HAVING course_id='$pCourse' and sem_id='$psem' and year_id='$pSy'
		if (!$result) 
			{
			die("Query to show fields from table failed");
			}
		$numberOfRows = MYSQLi_NUM_ROWS($result);
		
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
			  		echo $hidden_psubcat . '<br>'.$hidden_pcourse . '<br>'.$hidden_pt;
					end;
						}
						
	$i++;	 
			}
			} ?>
    </div></td>
    <td><div align="center" class="style18">
      <?php
			$pRoom =$_REQUEST['pRoom'];
			$pSy =$_REQUEST['pSy'];
			$psem=$_REQUEST['psem'];
			
						$result = mysqli_query($conn,"SELECT `sched`.*,`room`.`room_name` ,`course`.`course_yrSec`,`subjects`.`sub_code`,`profile`.`teacher_name` ,`timestart`.`time_s`,`day`.`day_name`,`school_yr`.`school_year` FROM `sched`,`room`,`course`,`subjects`,`profile`,`timestart` ,`day`,`school_yr`  WHERE sched.room_id=room.room_id and sched.course_id=course.course_id and sched.sub_id=subjects.sub_id and sched.teacher_id=profile.teacher_id and sched.time_s_id=timestart.time_s_id and sched.day_id=day.day_id 
 and sched.year_id=school_yr.year_id HAVING room_id='$pRoom' and sem_id='$psem' and year_id='$pSy'
  			");
			//HAVING course_id='$pCourse' and sem_id='$psem' and year_id='$pSy'
		if (!$result) 
			{
			die("Query to show fields from table failed");
			}
		$numberOfRows = MYSQLi_NUM_ROWS($result);
		
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
			  		echo $hidden_psubcat . '<br>'.$hidden_pcourse . '<br>'.$hidden_pt;
					end;
						}
						
	$i++;	 
			}
			} ?>
    </div></td>
    <td><div align="center" class="style18">
      <?php
			$pRoom =$_REQUEST['pRoom'];
			$pSy =$_REQUEST['pSy'];
			$psem=$_REQUEST['psem'];
			
						$result = mysqli_query($conn,"SELECT `sched`.*,`room`.`room_name` ,`course`.`course_yrSec`,`subjects`.`sub_code`,`profile`.`teacher_name` ,`timestart`.`time_s`,`day`.`day_name`,`school_yr`.`school_year` FROM `sched`,`room`,`course`,`subjects`,`profile`,`timestart` ,`day`,`school_yr`  WHERE sched.room_id=room.room_id and sched.course_id=course.course_id and sched.sub_id=subjects.sub_id and sched.teacher_id=profile.teacher_id and sched.time_s_id=timestart.time_s_id and sched.day_id=day.day_id 
 and sched.year_id=school_yr.year_id HAVING room_id='$pRoom' and sem_id='$psem' and year_id='$pSy'
  			");
			//HAVING course_id='$pCourse' and sem_id='$psem' and year_id='$pSy'
		if (!$result) 
			{
			die("Query to show fields from table failed");
			}
		$numberOfRows = MYSQLi_NUM_ROWS($result);
		
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
			  		echo $hidden_psubcat . '<br>'.$hidden_pcourse . '<br>'.$hidden_pt;
					end;
						}
						
	$i++;	 
			}
			} ?>
    </div></td>
    <td><div align="center" class="style18">
      <?php
			$pRoom =$_REQUEST['pRoom'];
			$pSy =$_REQUEST['pSy'];
			$psem=$_REQUEST['psem'];
			
						$result = mysqli_query($conn,"SELECT `sched`.*,`room`.`room_name` ,`course`.`course_yrSec`,`subjects`.`sub_code`,`profile`.`teacher_name` ,`timestart`.`time_s`,`day`.`day_name`,`school_yr`.`school_year` FROM `sched`,`room`,`course`,`subjects`,`profile`,`timestart` ,`day`,`school_yr`  WHERE sched.room_id=room.room_id and sched.course_id=course.course_id and sched.sub_id=subjects.sub_id and sched.teacher_id=profile.teacher_id and sched.time_s_id=timestart.time_s_id and sched.day_id=day.day_id 
 and sched.year_id=school_yr.year_id HAVING room_id='$pRoom' and sem_id='$psem' and year_id='$pSy'
  			");
			//HAVING course_id='$pCourse' and sem_id='$psem' and year_id='$pSy'
		if (!$result) 
			{
			die("Query to show fields from table failed");
			}
		$numberOfRows = MYSQLi_NUM_ROWS($result);
		
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
			  		echo $hidden_psubcat . '<br>'.$hidden_pcourse . '<br>'.$hidden_pt;
					end;
						}
						
	$i++;	 
			}
			} ?>
    </div></td>
  </tr>
  <tr>
    <td><div align="center" class="style19">7:30 - 8:30 <br />
      &nbsp;&nbsp;</div></td>
    <td><div align="center" class="style18">
      <?php
			$pRoom =$_REQUEST['pRoom'];
			$pSy =$_REQUEST['pSy'];
			$psem=$_REQUEST['psem'];
			
						$result = mysqli_query($conn,"SELECT `sched`.*,`room`.`room_name` ,`course`.`course_yrSec`,`subjects`.`sub_code`,`profile`.`teacher_name` ,`timestart`.`time_s`,`day`.`day_name`,`school_yr`.`school_year` FROM `sched`,`room`,`course`,`subjects`,`profile`,`timestart` ,`day`,`school_yr`  WHERE sched.room_id=room.room_id and sched.course_id=course.course_id and sched.sub_id=subjects.sub_id and sched.teacher_id=profile.teacher_id and sched.time_s_id=timestart.time_s_id and sched.day_id=day.day_id 
 and sched.year_id=school_yr.year_id HAVING room_id='$pRoom' and sem_id='$psem' and year_id='$pSy'
  			");
			//HAVING course_id='$pCourse' and sem_id='$psem' and year_id='$pSy'
		if (!$result) 
			{
			die("Query to show fields from table failed");
			}
		$numberOfRows = MYSQLi_NUM_ROWS($result);
		
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
			  		echo $hidden_psubcat . '<br>'.$hidden_pcourse . '<br>'.$hidden_pt;
					end;
						}
						
	$i++;	 
			}
			} ?>
    </div></td>
    <td><div align="center" class="style18">
      <?php
			$pRoom =$_REQUEST['pRoom'];
			$pSy =$_REQUEST['pSy'];
			$psem=$_REQUEST['psem'];
			
						$result = mysqli_query($conn,"SELECT `sched`.*,`room`.`room_name` ,`course`.`course_yrSec`,`subjects`.`sub_code`,`profile`.`teacher_name` ,`timestart`.`time_s`,`day`.`day_name`,`school_yr`.`school_year` FROM `sched`,`room`,`course`,`subjects`,`profile`,`timestart` ,`day`,`school_yr`  WHERE sched.room_id=room.room_id and sched.course_id=course.course_id and sched.sub_id=subjects.sub_id and sched.teacher_id=profile.teacher_id and sched.time_s_id=timestart.time_s_id and sched.day_id=day.day_id 
 and sched.year_id=school_yr.year_id HAVING room_id='$pRoom' and sem_id='$psem' and year_id='$pSy'
  			");
			//HAVING course_id='$pCourse' and sem_id='$psem' and year_id='$pSy'
		if (!$result) 
			{
			die("Query to show fields from table failed");
			}
		$numberOfRows = MYSQLi_NUM_ROWS($result);
		
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
			  		echo $hidden_psubcat . '<br>'.$hidden_pcourse . '<br>'.$hidden_pt;
					end;
						}
						
	$i++;	 
			}
			} ?>
    </div></td>
    <td><div align="center" class="style18">
      <?php
			$pRoom =$_REQUEST['pRoom'];
			$pSy =$_REQUEST['pSy'];
			$psem=$_REQUEST['psem'];
			
						$result = mysqli_query($conn,"SELECT `sched`.*,`room`.`room_name` ,`course`.`course_yrSec`,`subjects`.`sub_code`,`profile`.`teacher_name` ,`timestart`.`time_s`,`day`.`day_name`,`school_yr`.`school_year` FROM `sched`,`room`,`course`,`subjects`,`profile`,`timestart` ,`day`,`school_yr`  WHERE sched.room_id=room.room_id and sched.course_id=course.course_id and sched.sub_id=subjects.sub_id and sched.teacher_id=profile.teacher_id and sched.time_s_id=timestart.time_s_id and sched.day_id=day.day_id 
 and sched.year_id=school_yr.year_id HAVING room_id='$pRoom' and sem_id='$psem' and year_id='$pSy'
  			");
			//HAVING course_id='$pCourse' and sem_id='$psem' and year_id='$pSy'
		if (!$result) 
			{
			die("Query to show fields from table failed");
			}
		$numberOfRows = MYSQLi_NUM_ROWS($result);
		
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
			  		echo $hidden_psubcat . '<br>'.$hidden_pcourse . '<br>'.$hidden_pt;
					end;
						}
						
	$i++;	 
			}
			} ?>
    </div></td>
    <td><div align="center" class="style18">
      <?php
			$pRoom =$_REQUEST['pRoom'];
			$pSy =$_REQUEST['pSy'];
			$psem=$_REQUEST['psem'];
			
						$result = mysqli_query($conn,"SELECT `sched`.*,`room`.`room_name` ,`course`.`course_yrSec`,`subjects`.`sub_code`,`profile`.`teacher_name` ,`timestart`.`time_s`,`day`.`day_name`,`school_yr`.`school_year` FROM `sched`,`room`,`course`,`subjects`,`profile`,`timestart` ,`day`,`school_yr`  WHERE sched.room_id=room.room_id and sched.course_id=course.course_id and sched.sub_id=subjects.sub_id and sched.teacher_id=profile.teacher_id and sched.time_s_id=timestart.time_s_id and sched.day_id=day.day_id 
 and sched.year_id=school_yr.year_id HAVING room_id='$pRoom' and sem_id='$psem' and year_id='$pSy'
  			");
			//HAVING course_id='$pCourse' and sem_id='$psem' and year_id='$pSy'
		if (!$result) 
			{
			die("Query to show fields from table failed");
			}
		$numberOfRows = MYSQLi_NUM_ROWS($result);
		
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
			  		echo $hidden_psubcat . '<br>'.$hidden_pcourse . '<br>'.$hidden_pt;
					end;
						}
						
	$i++;	 
			}
			} ?>
    </div></td>
    <td><div align="center" class="style18">
      <?php
			$pRoom =$_REQUEST['pRoom'];
			$pSy =$_REQUEST['pSy'];
			$psem=$_REQUEST['psem'];
			
						$result = mysqli_query($conn,"SELECT `sched`.*,`room`.`room_name` ,`course`.`course_yrSec`,`subjects`.`sub_code`,`profile`.`teacher_name` ,`timestart`.`time_s`,`day`.`day_name`,`school_yr`.`school_year` FROM `sched`,`room`,`course`,`subjects`,`profile`,`timestart` ,`day`,`school_yr`  WHERE sched.room_id=room.room_id and sched.course_id=course.course_id and sched.sub_id=subjects.sub_id and sched.teacher_id=profile.teacher_id and sched.time_s_id=timestart.time_s_id and sched.day_id=day.day_id 
 and sched.year_id=school_yr.year_id HAVING room_id='$pRoom' and sem_id='$psem' and year_id='$pSy'
  			");
			//HAVING course_id='$pCourse' and sem_id='$psem' and year_id='$pSy'
		if (!$result) 
			{
			die("Query to show fields from table failed");
			}
		$numberOfRows = MYSQLi_NUM_ROWS($result);
		
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
			  		echo $hidden_psubcat . '<br>'.$hidden_pcourse . '<br>'.$hidden_pt;
					end;
						}
						
	$i++;	 
			}
			} ?>
    </div></td>
  </tr>
</table>
<p>&nbsp;</p>
</body>
</html>
