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
-->
</style>
</head>
<?php
include("../includes/session.php");
  require ("../includes/dbconnection.php");



	
	$pCourse =$_REQUEST['pCourse'];
	$hidden_pcourse =$_REQUEST['hidden_pcourse'];
	$pSy =$_REQUEST['pSy'];
	$psem =$_REQUEST['psem'];

   if (isset($_POST['cmdSubmit'])) 
  	{ 		
		
		if (trim($_POST['hidden_psubcatid']) == ""){ $flagsub = 'Required Field.';}
		if (trim($_POST['hidden_pidt']) == "")  { $flagteacher  = 'Required Field.';}
		if (trim($_POST['hidden_proomid']) == "") { $flagroom = 'Required Field.';} 			
		if (trim($_POST['hidden_pdayid']) == ""){ $flagday = 'Required Field.';}
		if (trim($_POST['hidden_pstimeid']) == ""){ $flagstime = 'Required Field.';}
		if (trim($_POST['hidden_petimeid']) == ""){ $flagetime = 'Required Field.';}
		
		

if (($flagsub == "")  && ($flagteacher == "")
 && ($flagroom == "") && ($flagday == "")&& ($flagstime == "") && ($flagetime == ""))
{

			$hidden_psubcat= $_POST['hidden_psubcatid'];
			$hidden_pt= $_POST['hidden_pidt'];
			$hidden_proom= $_POST['hidden_proomid'];
			$hidden_pday = $_POST['hidden_pdayid'];
			$hidden_pstime = $_POST['hidden_pstimeid'];
			$hidden_petime = $_POST['hidden_petimeid'];
			
			/*SELECT * FROM `sched` WHERE 1`sched_id``room_id``course_id``sub_id``teacher_id``time_s_id``time_e_id``day_id``sem_id``year_id``sched_desc` */

			mysql_query ("INSERT INTO sched(course_id, sub_id, profile_no, room_id, year_id, day_id, time_s_id, time_e_id)
					VALUES('$pCourse ', '$hidden_psubcat','$hidden_pt','$hidden_proom','$pSy','$hidden_pday','$hidden_pstime', '$hidden_petime')") or die(mysql_error()); 
					echo "Your file has been saved in the database..";
									 header(
				"Location: sched_list.php");
				}


				}
			
?>
<body>
<div id="container">
  <div id="header"><img src="../images/logo copy.jpg" alt="s" width="717" height="160" />
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
	<li class=" cssMenui"><a class="  cssMenui" href="User Manual.pdf">Help</a></li>

	<li class=" cssMenui"><a class="  cssMenui" href="logout.php">Log out</a></li>
</ul>

  </div>
	<div id="content">
	
		<div id="left">
		<form action="<?php echo $_SERVER[PHP_SELF] ?>" name="form1" method="post" >
		  <div align="center"><br />
		    Add New Schedule<br />
		    <br />		  
		    <br />
		  </div>
		  <table border="0" align="center" >
            <tr >
              <td colspan='3' >
                  <div align="center">Schedule
              </div></td>
            </tr>
            <tr>
              <td height="27" colspan="4" ><label></label>
                  <label></label>
                  <div align="center" class="style30">
                    <div align="left"><a href="index.php"></a>Course Year and Section:
                      <?php   
	
	echo $hidden_pcourse;		
?>
                    </div>
              </div></td>
            </tr>
            <tr>
              <td colspan="4"><label></label>
                  <label></label>
                  <div align="center">
                    <div align="right" class="style3">
                      <div align="center" class="style28"></div>
                    </div>
                  </div></td>
            </tr>
            <tr >
              <td width="99"><div align="right" class="style3">
                <div align="left">Subject </div>
              </div></td>
              <td width="293" ><span class="style22">
                <label>
                <select name="psub"  id="psub" style="width: 267px" onchange="javascript: return optionList2_SelectedIndex()">
                  <?php // source 1: http://www.dmxzone.com/showDetail.asp?NewsId=5102&TypeId=25
			  	// source 2: http://localhost/phpmyadmin/index.php?db=mydbase&token=651c0063e511c381c9c82ce1fe9b6854
				$result = mysql_query("SELECT * FROM `subjects` GROUP BY `subjects`.`cys`, `subjects`.`sub_code`, `subjects`.`SYS` HAVING `subjects`.`cys` = '$pCourse' and  `subjects`.`SYS` = '$pSy'  ORDER BY `subjects`.`sub_code`;");			  	
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
              <td width="16" ><span class="style21"><span class="style20"><?php echo $flagsub; ?></span></span></td>
              <td width="2" >&nbsp;</td>
            </tr>
            <tr>
              <td ><div align="right" class="style3">
                <div align="left">Teacher</div>
              </div></td>
              <td><span class="style22">
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
              <td><span class="style21"><span class="style20"><?php echo $flagteacher; ?></span></span></td>
              <td>&nbsp;</td>
            </tr>
            <tr >
              <td height="34"><div align="right" class="style3">
                <div align="left">Room</div>
              </div></td>
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
              <td ><span class="style21"><span class="style20"><?php echo $flagroom; ?></span></span></td>
              <td>&nbsp;</td>
            </tr>
            <tr>
              <td height="34"><div align="right" class="style3">
                <div align="left">Day</div>
              </div></td>
              <td><label>
                <input type="checkbox" name="chkM" value="checkbox" />
                M
                <input type="checkbox" name="chkT" value="checkbox" />
                T
                <input type="checkbox" name="chkW" value="checkbox" />
                W
                <input type="checkbox" name="chkTh" value="checkbox" />
                Th
                <input type="checkbox" name="chkF" value="checkbox" />
                F
                <input type="checkbox" name="chkS" value="checkbox" />
                S</label></td>
              <td><span class="style21"><span class="style20"><?php echo $flagday; ?></span></span></td>
              <td>&nbsp;</td>
            </tr>
            <tr>
              <td height="34"><div align="right" class="style3">
                <div align="left">Starting Time </div>
              </div></td>
              <td><span class="style22">
                <label>
                <select name="pstime"  id="pstime" style="width: 267px" onchange="javascript: return optionList9_SelectedIndex()">
                  <?php // source 1: http://www.dmxzone.com/showDetail.asp?NewsId=5102&TypeId=25
			  	// source 2: http://localhost/phpmyadmin/index.php?db=mydbase&token=651c0063e511c381c9c82ce1fe9b6854
				$result = mysql_query("SELECT * FROM timestart ORDER BY time_s ");			  	
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
              <td><div align="right" class="style3">
                <div align="left">Ending Time </div>
              </div></td>
              <td ><span class="style22">
                <label>
                <select name="petime"  id="petime" style="width: 267px" onchange="javascript: return optionList10_SelectedIndex()">
                  <?php // source 1: http://www.dmxzone.com/showDetail.asp?NewsId=5102&TypeId=25
			  	// source 2: http://localhost/phpmyadmin/index.php?db=mydbase&token=651c0063e511c381c9c82ce1fe9b6854
				$result = mysql_query("SELECT * FROM timeend ORDER BY time_e ");			  	
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
              <td height="40" colspan="3"><div align="center"><span class="style30">
                  <input type="submit" name="cmdSubmit" value="Submit" />
                &nbsp;
                <input type="submit" name="cmdClear" value="Clear" />
              </span></div></td>
              <td >&nbsp;</td>
            </tr>
            <tr >
              <td colspan="4"><div align="center"></div></td>
            </tr>
          </table>
		  <p>&nbsp;</p>
		  </form>
		  <h1>&nbsp;</h1>
			
	</div>
		<div id="program"></div>
		<div id="right">
			<h2>&nbsp;</h2>
			<p>&nbsp;</p>
		</div>
		<p>&nbsp;</p>
		<p>&nbsp;</p>
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
		
		
		
</script>	

<script language="javascript" >
	var form = document.forms[0];
	//purpose?: to retrieve what users last input on the field..
	form.pcourse.value = ("<?PHP echo $_POST['hidden_psubcat']; ?>");
	form.psy.value = ("<?PHP echo $_POST['hidden_psem']; ?>");
	form.psem.value = ("<?PHP echo $_POST['hidden_psem']; ?>");
	//alert (form.pCityM.value);				
</script>