<?php session_start(); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<link href="../includes/style_prac2.css" rel="stylesheet" type="text/css" />
<title>Scheduling System</title>
<style type="text/css">
<!--
.style25 {color: #330099; font-weight: bold; }
.style4 {font-size: 11px;
	font-family: Verdana, Arial, Helvetica, sans-serif;
}
-->
</style>
</head>
    <?php
include("../session.php");
  require ("../includes/DBConnection.php");
  
// sending query
//$result = mysql_query("SELECT * FROM Student");
//if (!$result) {
//    die("Query to show fields from table failed");
//}
//
//$fields_num = mysql_num_fields($result);
//
//	echo "<h1>Table: Student</h1>";
//	echo "<table border='2'><tr>";
//	// printing table headers
//	echo "<td COLSPAN=2 ALIGN=CENTER></td>"; //Added by Ian
//	//echo "<td></td>"; //Added by Ian
//	for($i=0; $i<$fields_num; $i++)
//	{
//		$field = mysql_fetch_field($res
?>
<body>
<div id="container">
	<div id="header"><img src="../images/logo copy.jpg" alt="s" width="717" height="160" />
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
		<li class=" cssMenui"><a class="  cssMenui" href="faculty-sas.php"><span><img src="../images/User (1).ico" />Teacher</span><![if gt IE 6]></a><![endif]><!--[if lte IE 6]><table><tr><td><![endif]-->
		<ul class=" cssMenum">
			<li class=" cssMenui"><a class="  cssMenui" href="faculty-sas.php"><img src="../images/folder-new.ico" />Add</a></li>
			<li class=" cssMenui"><a class="  cssMenui" href="facultylist-sas.php"><img src="../images/folder.ico" />View</a></li>
		</ul>
		<!--[if lte IE 6]></td></tr></table></a><![endif]--></li>
		<li class=" cssMenui"><a class="  cssMenui" href="student-sas.php"><span><img src="../images/courses.JPG" />Course</span><![if gt IE 6]></a><![endif]><!--[if lte IE 6]><table><tr><td><![endif]-->
		<ul class=" cssMenum">
			<li class=" cssMenui"><a class="  cssMenui" href="student-sas.php"><img src="../images/folder-new.ico" />Add</a></li>
			<li class=" cssMenui"><a class="  cssMenui" href="student-list-sas.php"><img src="../images/folder.ico" />View</a></li>
		</ul>

		<!--[if lte IE 6]></td></tr></table></a><![endif]--></li>
		</ul>
	<!--[if lte IE 6]></td></tr></table></a><![endif]--></li>
	<li class=" cssMenui"><a class="  cssMenui" href="sched_sas.php">Schedule</a></li>

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
		  <form action="<?php echo $_SERVER[PHP_SELF] ?>" name="form1" method="post" >
            <div align="center">
              <p align="center"><strong>College of Arts and Sciences <br />
                            </strong></p>
              <p align="center"><strong>List of  Courses</strong></p>
              <p align="center">&nbsp;</p>
              <p align="center">&nbsp;</p>
              <p align="center"><strong>College of Arts and Sciences  </strong></p>
              
              <div align="center">
                <table width="520" border="0" align="center" cellpadding="2">
                  <tr>
                    <td width="156" height="28"><span class="style25">Course </span></td>
                    <td width="311"><span class="style25">Major </span></td>
                    <td width="13">&nbsp;</td>
                    <td width="14" >&nbsp;</td>
                    <?php 

// sending query
$result = mysql_query("SELECT * from course where dept_id= '3'");
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
			$Course_ID = MYSQL_RESULT($result,$i,"course_id");
			$course_yrSec = MYSQL_RESULT($result,$i,"course_yrSec");
			$major = MYSQL_RESULT($result,$i,"major");
			
?>
                  </tr>
                  <tr bgcolor="<?php echo $bgcolor; ?>">
                    <td nowrap="nowrap"><?php echo $course_yrSec; ?></td>
                    <td nowrap="nowrap"><?php echo $major; ?></td>
                    <td><a href="student-edit-sas.php?Course_ID=<?php echo $Course_ID; ?>"> <img src='../images/b_edit.png' alt="edit record" width="16" height="16" /></a></td>
                    <td><a href="student-del-sas.php?Course_ID=<?php echo $Course_ID; ?>"> <img src='../images/b_drop.png' alt="delete record" width="16" height="16" onclick="return confirm('<?php echo "Are you sure you want to delete ". $course_yrSec. "?"; ?>');" /></a></td>
                  </tr>
                  <?php 	
		$i++;		
		}
	}	
?>
                </table>
              </div>
              <p align="center">&nbsp;</p>
              <p align="center"><strong>College of Education</strong></p>
              <p align="center">&nbsp;</p>
              <table width="520" border="0" align="center" cellpadding="2">
                <tr>
                  <td width="156" height="28"><span class="style25">Course </span></td>
                  <td width="311"><span class="style25">Major </span></td>

                  <?php 

// sending query
$result = mysql_query("SELECT * from course where dept_id= '1'");
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
			$Course_ID = MYSQL_RESULT($result,$i,"course_id");
			$course_yrSec = MYSQL_RESULT($result,$i,"course_yrSec");
			$major = MYSQL_RESULT($result,$i,"major");
			
?>
                </tr>
                <tr bgcolor="<?php echo $bgcolor; ?>">
                  <td nowrap="nowrap"><?php echo $course_yrSec; ?></td>
                  <td nowrap="nowrap"><?php echo $major; ?></td>
                 
                </tr>
                <?php 	
		$i++;		
		}
	}	
?>
              </table>
              <p>&nbsp;</p>
              <p><strong>College of Industrial Technology  </strong></p>
              <p>&nbsp;</p>
              <table width="520" border="0" align="center" cellpadding="2">
                <tr>
                  <td width="156" height="28"><span class="style25">Course </span></td>
                  <td width="311"><span class="style25">Major </span></td>
                  <?php 

// sending query
$result = mysql_query("SELECT * from course where dept_id= '2'");
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
			$Course_ID = MYSQL_RESULT($result,$i,"course_id");
			$course_yrSec = MYSQL_RESULT($result,$i,"course_yrSec");
			$major = MYSQL_RESULT($result,$i,"major");
			
?>
                </tr>
                <tr bgcolor="<?php echo $bgcolor; ?>">
                  <td nowrap="nowrap"><?php echo $course_yrSec; ?></td>
                  <td nowrap="nowrap"><?php echo $major; ?></td>
                </tr>
                <?php 	
		$i++;		
		}
	}	
?>
              </table>
              <p>&nbsp;</p>
              <p>&nbsp;</p>
              <p>&nbsp;</p>
            </div>
        </form>
      </div>
		<div id="program"></div>
		<div id="right">
		  <p>&nbsp;</p>
			<p>&nbsp;</p>
			<p>&nbsp;</p>
			<p>&nbsp;</p>
			<p>&nbsp;</p>
			<p>&nbsp;</p>
			<p>&nbsp;</p>
			<p><a href="yearsem-a.php"></a></p>
			<p>&nbsp;</p>
			<p>&nbsp;</p>
			<p>&nbsp;</p>
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
	
	//alert (form.pCityM.value);				
</script>