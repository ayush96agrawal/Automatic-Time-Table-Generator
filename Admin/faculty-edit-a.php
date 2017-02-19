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
  
	$profile_no =$_REQUEST['profile_no'];

		$result =  mysqli_query($conn,"SELECT * FROM profile WHERE teacher_id  = '$profile_no'");
				function mysqli_result($result, $row, $field = 0) {
    // Adjust the result pointer to that specific row
    $result->data_seek($row);
    // Fetch result array
    $data = $result->fetch_array();
 
    return $data[$field];
}
if (!$result) 
		{
		die("Query to show fields from table failed");
		}
			$numberOfRows = mysqli_num_rows($result);
	
			If ($numberOfRows == 0) 
				{
			//echo 'Sorry No Record Found!';
				}
			else if ($numberOfRows > 0) 
				{
				$i=0;
			
			$faculty_name = mysqli_result($result,$i,"teacher_name");
			$acad_rank = mysqli_result($result,$i,"acad_rank");
			$des = mysqli_result($result,$i,"designation");
			$Dept = mysqli_result($result,$i,"dept_id");
				
				
				}
?>
<?php 


   if (isset($_POST['cmdSubmit'])) 
  	{ 		

			
		 	$faculty_name_a= $_POST['txtuser'];
			$Dept_a= $_POST['pdept'];
			$acad= $_POST['txtacad'];
			$desgntn= $_POST['txtd'];
		

			mysqli_query ($conn,"UPDATE profile SET teacher_name = '$faculty_name_a', acad_rank = '$acad', designation = '$desgntn', dept_id = '$Dept_a' WHERE teacher_id = '$profile_no'")
					 or die(mysqli_error()); 
					echo "Your file has been saved in the database..";
									header(
					"Location: facultylist-a.php");
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
		  <div id="div">
		    <form method="post" name="form1" id="form1" >
		      <div align="center">
		        <p><strong>Edit Faculty </strong></p>
		        <p>&nbsp;</p>
		        <table border="0" align="center" >
                  <tr >
                    <td width="111" ><div align="right" class="style3">Faculty Name </div></td>
                    <td width="301"  ><div align="left">
                    <input type="text" name="txtuser" id="txtuser" value="<?php echo $faculty_name; ?>" /></td>
                    <td width="1"  ><span class="style20">&nbsp;</span></td>
                    <td width="4" >&nbsp;</td>
                  </tr>         
				  <tr >
                    <td ><div align="right" class="style3">Academic Rank </div></td>
                    <td ><div align="left">
                      <input type="text" name="txtacad" id="txtacad" value="<?php echo $acad_rank; ?>" /></td>
                    <td  ><span class="style20">&nbsp;</span></td>
                    <td >&nbsp;</td>
                  </tr>
				           <tr >
                    <td ><div align="right" class="style3">Designation </div></td>
                    <td ><div align="left">
                      <input type="text" name="txtd" id="txtd" value="<?php echo $des; ?>" /></td>
                    <td  ><span class="style20">&nbsp;</span></td>
                    <td >&nbsp;</td>
                  </tr>
				  
                  <tr>
                    <td ><div align="right" class="style3">Department </div></td>
                    <td><label></label>
                        <label>
                         <select name="pdept"  id="pdept" style="width: 267px" onchange="javascript: return optionList_SelectedIndex()" >
                          <?php // source 1: http://www.dmxzone.com/showDetail.asp?NewsId=5102&TypeId=25
			  	// source 2: http://localhost/phpmyadmin/index.php?db=mydbase&token=651c0063e511c381c9c82ce1fe9b6854
				$result = mysqli_query($conn,"SELECT * FROM dept ORDER BY dept_id ");			  	
				do {  ?>
                          <option value="<?php echo $row['dept_id'];?>"><?php echo $row['department'];?> </option>
                          <?php } while ($row = mysqli_fetch_assoc($result)); ?>
                        </select>
                        <!-- 
			Setting up the correct combo box width alignment to table
			source: http://www.eskimo.com/~bloo/indexdot/html/topics/selectwidth.htm
		-->
                        <input type="hidden" id="hidden_dept_id" name="hidden_dept_id"  value="<?PHP echo trim($_POST['hidden_dept_id']); ?>" />
                        <input type="hidden" id="hidden_dept" name="hidden_dept" value="<?PHP echo trim($_POST['hidden_dept']); ?>"/>
                      </label></td>
                    <td  ><span class="style20">&nbsp;</span></td>
                    <td >&nbsp;</td>
                  </tr>
                  <tr >
                    <td height="15" colspan="4">&nbsp;</td>
                  </tr>
                  <tr>
                    <td colspan="3" ><div align="center"><span class="style30">
                        <input type="submit" name="cmdSubmit" value="Submit" />
                    </span></div></td>
                    <td>&nbsp;</td>
                  </tr>
                </table>
		        <p>&nbsp;</p>
	          </div>
	        </form>
      </div>
    </div>
		<p>&nbsp;</p>
		<p>&nbsp;</p>
		<div id="program"></div>
	<div id="right"></div>
		<div id="footerline">
	    <p align="center"><span class="style4"><a href="help.php">Help</a> | <a href="about_dev.php">Developer</a>| <a href="about_sched.php">Scheduling System</a>| <a href="contact.html">Contact Us</a>| <a href="www.chmsc.edu.ph">CHMSC </a></span></p>
    </div>
  </div>
	
	<div id="footer">Four Dark Riders </div>	
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

			var selObj = document.getElementById('pdept');
			//var txtIndexObj = document.getElementById('txtIndex');
			var hidden_dept_id_ValueObj = document.getElementById('hidden_dept_id');
			var hidden_dept_TextObj = document.getElementById('hidden_dept');
			
			var selIndex = selObj.selectedIndex;
			//txtIndexObj.value = selIndex;
			hidden_dept_id_ValueObj.value = selObj.options[selIndex].value;
			hidden_dept_TextObj.value = selObj.options[selIndex].text;
		
			//var form = document.forms[0]; --> Option B
			<!-- //Passing the data from the databse residence [ID] to hidden field
			//Source: http://www.trans4mind.com/personal_development/JavaScript2/select.htm /-- -->			
			//----------------------------------------------------------------------------------------------------------
		}
		
	
</script>	

<script language="javascript" >
	var form = document.forms[0];
	//purpose?: to retrieve what users last input on the field..
	form.pdept.value = ("<?PHP echo $Dept; ?>");
	
	//alert (form.pCityM.value);				
</script>