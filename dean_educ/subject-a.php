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
-->
</style>
</head>
<?php
include("../includes/session.php");
  require ("../includes/dbconnection.php");

   if (isset($_POST['cmdSubmit'])) 
  	{ 		
		
		if (trim($_POST['txtccode']) == ""){ $flagccode = 'Required Field.';}	
		if (trim($_POST['txtcdesc']) == ""){ $flagcdesc = 'Required Field.';}
		if (trim($_POST['txtlechours']) == "")  { $flaglechours  = 'Required Field.';}
		if (trim($_POST['txtlabhours']) == "") { $flaglabhours = 'Required Field.';} 		
		if (trim($_POST['pcourse']) == "") { $flagcys = 'Required Field.';} 		
		if (trim($_POST['psubcat']) == ""){ $flagsub_cat = 'Required Field.';}
		if (trim($_POST['psy']) == ""){ $flagsem = 'Required Field.';}
		
		
		

if (($flagccode == "") &&  ($flagcdesc == "") && ($flaglechours == "") && ($flaglabhours == "") && ($flagcys == "") && ($flagsub_cat == "") && ($flagsem == ""))
{

			
		 	$txtccode= $_POST['txtccode'];
			$txtcdesc= $_POST['txtcdesc'];
			$txtlechours= $_POST['txtlechours'];
			$txtlabhours= $_POST['txtlabhours'];
			$txtprereq= $_POST['txtprereq'];
			$hidden_pcourseid= $_POST['pcourse'];
			$hidden_psubcat= $_POST['psubcat'];
			$hidden_psem = $_POST['psy'];

			mysql_query ("INSERT INTO subjects(sub_code, sub_name, sub_lechrsprday, sub_labhrsprday, subcat_id, cys, prereq, sem_id, dept_id)
					VALUES('$txtccode', '$txtcdesc','$txtlechours','$txtlabhours','$hidden_psubcat','$hidden_pcourseid','$txtprereq','$hidden_psem',1)") or die(mysql_error()); 
					echo "Your file has been saved in the database..";
								 header(
			 	"Location: subjectlist-a.php");
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
		    <p><strong>College of Education</strong></p>
		    <p><strong>Add Subject</strong></p>
		    <table border="0" align="center" >
              <tr >
                <td width="240" height="34" ><div align="right" class="style3">Course Code </div></td>
                <td width="349" ><input type="text" name="txtccode" id="txtccode" value="<?php echo $faculty_name; ?>" /></td>
                <td width="42" ><span class="style20"><?php echo $flagccode; ?>&nbsp;</span></td>
                <td width="17" >&nbsp;</td>
              </tr>
              <tr >
                <td height="34"><div align="right" class="style3">Course Description </div></td>
                <td><input type="text" name="txtcdesc" id="txtcdesc" value= "<?php echo $acad_rank; ?>"/></td>
                <td ><span class="style20"><?php echo $flagcdesc; ?>&nbsp;</span></td>
                <td >&nbsp;</td>
              </tr>
              <tr >
                <td height="35" ><div align="right" class="style3">Lecture Hours </div></td>
                <td><label></label>
                    <label>
                    <input type="text" name="txtlechours" id="txtlechours" value= "<?php echo $degree; ?>"/>
                  </label></td>
                <td><span class="style20"><?php echo $flaglechours; ?>&nbsp;</span></td>
                <td>&nbsp;</td>
              </tr>
              <tr >
                <td height="34" ><div align="right" class="style3">Laboratory Hours </div></td>
                <td ><input name="txtlabhours" type="text" id="txtlabhours" value="<?php echo $bach_deg; ?>"/></td>
                <td><span class="style20"><?php echo $flaglabhours; ?>&nbsp;</span></td>
                <td>&nbsp;</td>
              </tr>
              <tr>
                <td height="34" ><div align="right" class="style3">Prerequisite</div></td>
                <td><input name="txtprereq" type="text" id= "txtprereq" value="<?php echo $school; ?>"/></td>
                <td><span class="style20"><?php echo $flagcredit; ?>&nbsp;</span></td>
                <td>&nbsp;</td>
              </tr>
              <tr>
                <td height="34" ><div align="right" class="style3">Course Year and Section </div></td>
                <td ><span class="style22">
                  <label>
                  <select name="pcourse"  id="pcourse" style="width: 267px" onchange="javascript: return optionList1_SelectedIndex()">
                    <?php // source 1: http://www.dmxzone.com/showDetail.asp?NewsId=5102&TypeId=25
			  	// source 2: http://localhost/phpmyadmin/index.php?db=mydbase&token=651c0063e511c381c9c82ce1fe9b6854
				$result = mysql_query("SELECT * FROM course where dept_id = 2 ORDER BY course_yrSec ");			  	
				do {  ?>
                    <option value="<?php echo $row['course_id'];?>"><?php echo $row['course_yrSec'];?> </option>
                    <?php } while ($row = mysql_fetch_assoc($result)); ?>
                  </select>
                  <!-- 
		SELECT * FROM `course` WHERE 1`course_id``course_yrSec`
			Setting up the correct combo box width alignment to table
			source: http://www.eskimo.com/~bloo/indexdot/html/topics/selectwidth.htm
		-->
                  <input type="hidden" id="hidden_pcourseid" name="hidden_pcourseid"  value="<?PHP echo trim($_POST['hidden_psubcatid']); ?>" />
                  <input type="hidden" id="hidden_pcourse" name="hidden_pcourse" value="<?PHP echo trim($_POST['hidden_psubcat']); ?>"/>
                  </label>
                </span></td>
                <td ><span class="style21"><span class="style20"><?php echo $flagcys; ?></span></span></td>
                <td >&nbsp;</td>
              </tr>
              <tr  >
                <td height="34" ><div align="right" class="style3">Subject Category </div></td>
                <td><span class="style22">
                  <label>
                  <select name="psubcat"  id="psubcat" style="width: 267px" onchange="javascript: return optionList_SelectedIndex()">
                    <?php // source 1: http://www.dmxzone.com/showDetail.asp?NewsId=5102&TypeId=25
			  	// source 2: http://localhost/phpmyadmin/index.php?db=mydbase&token=651c0063e511c381c9c82ce1fe9b6854
				$result = mysql_query("SELECT * FROM sub_category ORDER BY sub_cat ");			  	
				do {  ?>
                    <option value="<?php echo $row['subcat_id'];?>"><?php echo $row['sub_cat'];?> </option>
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
                <td><span class="style21"><span class="style20"><?php echo $flagsub_cat; ?></span></span></td>
                <td>&nbsp;</td>
              </tr>
              <tr >
                <td height="34"><div align="right" class="style3">Semester</div></td>
                <td><span class="style22">
                  <label>
                  <select name="psy"  id="psy" style="width: 267px" onchange="javascript: return optionList7_SelectedIndex()">
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
                  <input type="hidden" id="hidden_psemid" name="hidden_psemid"  value="<?PHP echo trim($_POST['hidden_psubcatid']); ?>" />
                  <input type="hidden" id="hidden_psem" name="hidden_psem" value="<?PHP echo trim($_POST['hidden_psem']); ?>"/>
                  </label>
                </span></td>
                <td><span class="style21"><span class="style20"><?php echo $flagsem; ?></span></span></td>
                <td>&nbsp;</td>
              </tr>
              <tr > 
              <tr>
                <td height="18" colspan="4">&nbsp;</td>
              </tr>
              <tr>
                <td colspan="3"><div align="center"><span class="style30">
                    <input type="submit" name="cmdSubmit" value="Submit" />
                  &nbsp;
                  <input type="submit" name="cmdClear" value="Clear" />
                </span></div></td>
                <td>&nbsp;</td>
              </tr>
            </table>
	      </div>
	    </form>
	  </div>
	  <div id="program"></div>
		<div id="right">
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

			var selObj = document.getElementById('psubcat');
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

			var selObj = document.getElementById('pcourse');
			//var txtIndexObj = document.getElementById('txtIndex');
			var hidden_pcourseid_ValueObj = document.getElementById('hidden_pcourseid');
			var hidden_pcourse_TextObj = document.getElementById('hidden_pcourse');
			
			var selIndex = selObj.selectedIndex;
			//txtIndexObj.value = selIndex;
			hidden_pcourseid_ValueObj.value = selObj.options[selIndex].value;
			hidden_pcourse_TextObj.value = selObj.options[selIndex].text;
		
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

			var selObj = document.getElementById('psy');
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
		
		
		
		
</script>	

<script language="javascript" >
	var form = document.forms[0];
	//purpose?: to retrieve what users last input on the field..
	form.psubcat.value = ("<?PHP echo $_POST['hidden_psubcat']; ?>");
	form.psy.value = ("<?PHP echo $_POST['hidden_psem']; ?>");
	form.pcourse.value = ("<?PHP echo $_POST['hidden_pcourse']; ?>");
	form.pdept.value = ("<?PHP echo $_POST['hidden_dept']; ?>");
	
	//alert (form.pCityM.value);				
</script>