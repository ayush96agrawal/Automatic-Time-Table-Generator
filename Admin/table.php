		<form action="<?php echo $_SERVER[PHP_SELF] ?>" name="form1" method="post" >
		  <div align="center"><br />
		    <p align="center"><span class="style32">Schedule of Class </span>
                <?php
					$pRoom =$_REQUEST['pRoom'];
				$result = mysql_query("SELECT * FROM room HAVING room_id='$pRoom'");
				
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
			
			$room = MYSQL_RESULT($result,$i,"room_name");
				
				
				}
				
				?>
	        </p>
		    <table border="0" align="center">
              <tr>
                <td height="43"><span class="style32">Room:</span></td>
                <td colspan="6"><span class="style32"><?php echo $room; ?></span></td>
              </tr>
              <tr>
                <td>Room</td>
                <td >Subject</td>
                <td >Teacher</span></td>
                <td>Day </span></td>
                <td >Starting time</span></td>
                <td class="style31">Ending Time </td>
                <td >SY</span></td>
                <td >&nbsp;</td>
                <td >&nbsp;</td>
                <?php

 		 require ("../includes/dbconnection.php");
		 
			$pRoom =$_REQUEST['pRoom'];
			$pSy =$_REQUEST['pSy'];
			$psem=$_REQUEST['psem'];

			$result = mysql_query("SELECT `sched`.*,`room`.`room_name` ,`course`.`course_yrSec`,`subjects`.`sub_code`,`profile`.`teacher_name` ,`timestart`.`time_s`,`timeend`.`time_e`,`day`.`day_name`,`school_yr`.`school_year` FROM `sched`,`room`,`course`,`subjects`,`profile`,`timestart`,`timeend` ,`day`,`school_yr`  WHERE sched.room_id=room.room_id and sched.course_id=course.course_id and sched.sub_id=subjects.sub_id and sched.teacher_id=profile.teacher_id and sched.time_s_id=timestart.time_s_id and sched.time_e_id=timeend.time_e_id and sched.day_id=day.day_id 
 and sched.year_id=school_yr.year_id HAVING room_id='$pRoom' and sem_id='$psem' and year_id='$pSy'
  			");
			//HAVING course_id='$pCourse' and sem_id='$psem' and year_id='$pSy'
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
			
			/*SELECT * FROM `sched` WHERE 1`sched_id``room_id``course_id``sub_id``teacher_id``time_s_id``time_e_id``day_id``sem_id``year_id``sched_desc` */
					$sched_id = MYSQL_RESULT($result,$i,"sched_id");
					$hidden_psubcat = MYSQL_RESULT($result,$i,"sub_code");
					$hidden_pt = MYSQL_RESULT($result,$i,"teacher_name");
					$hidden_pcourse = MYSQL_RESULT($result,$i,"course_yrSec");
					$hidden_psy = MYSQL_RESULT($result,$i,"school_year");
					$hidden_pday = MYSQL_RESULT($result,$i,"day_name");
					$hidden_pstime = MYSQL_RESULT($result,$i,"time_s");
					$hidden_petime= MYSQL_RESULT($result,$i,"time_e");
					
					
		?>
              </tr>
              <tr bgcolor="<?php echo $bgcolor; ?>">
			   <td nowrap="nowrap" bgcolor="#BEED9E"><?php if($hidden_pday = "Monday" and  $hidden_pstime = "08:00:00" and $hidden_petime = "09:00:00") { echo $hidden_pt.'<br>'. $hidden_psubcat.'<br>'. $hidden_pcourse; }
			   else{ echo "";}
			   ?>&nbsp;&nbsp;&nbsp;</td>
                <td nowrap="nowrap" bgcolor="#F3FCC5"><?php echo $hidden_psubcat; ?>&nbsp;&nbsp;&nbsp;</td>
                <td nowrap="nowrap" bgcolor="#CCE39B"><?php echo $hidden_pt; ?>&nbsp;&nbsp;&nbsp;</td>
               
                <td nowrap="nowrap" bgcolor="#F4DEF8"><?php echo $hidden_pday; ?>&nbsp;&nbsp;&nbsp;</td>
                <td nowrap="nowrap" bgcolor="#E9D0BA"><?php echo $hidden_pstime; ?>&nbsp;&nbsp;&nbsp;</td>
                <td nowrap="nowrap" bgcolor="#E1C0B5"><?php echo $hidden_petime; ?>&nbsp;&nbsp;&nbsp;</td>
                <td nowrap="nowrap" bgcolor="#8CC695"><?php echo $hidden_psy ; ?>&nbsp;&nbsp;&nbsp;</td>
                <td><a href="../sched_edit.php?sched_id=<?php echo $sched_id; ?>"> <img src='../images/b_edit.png' alt="edit record" width="16" height="16" border="0" /></a></td>
                <td><a href="../sched_del.php?sched_id=<?php echo $sched_id; ?>"> <img src='../images/b_drop.png' alt="delete record" width="16" height="16" border="0" onClick="return confirm('<?php echo "Are you sure you want to delete file #". $sched_id. "?"; ?>');" /></a></td>
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
                <td></tr></td>
              </tr>
            </table>
		    <br />
		    <br />		  
		    <br />
	      </div>
		  <p>&nbsp;</p>
		  <p align="center">&nbsp;</p>
		  <p>&nbsp;</p>
		</form>