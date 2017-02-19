<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<link href="includes/style.css" rel="stylesheet" type="text/css" />
<title>Scheduling System</title>
<style type="text/css">
<!--
.style30 {
	font-family: Verdana, Arial, Helvetica, sans-serif;
	font-size: medium;
	color: #000066;
}
.style4 {font-size: 11px;
	font-family: Verdana, Arial, Helvetica, sans-serif;
}
-->
</style>
</head>
<?php
session_start();
session_destroy();
session_start();
?>
<?php 

  require ("includes/dbconnection.php");
  $user =$_REQUEST['user'];
//Checks if there is a login cookie
/* if(isset($_COOKIE['ID_my_site']))

//if there is, it logs you in and directes you to the members page
{ 
$username = $_COOKIE['ID_my_site']; 
$pass = $_COOKIE['Key_my_site'];
$check = mysqli_query("SELECT * FROM user WHERE username = '$username'")or die(mysqli_error());
while($info = mysqli_fetch_array( $check )) 
{
if ($pass != $info['userpass']) 
{
}
else
{
header("Location: cit_main.php");

}
}
}
*/
//if the login form is submitted
if (isset($_POST['submit'])) { // if form has been submitted

// makes sure they filled it in
if(!$_POST['username'] | !$_POST['pass']){
die('You did not fill in a required field.');
}
// checks it against the database

if (!get_magic_quotes_gpc()) {
$_POST['email'] = addslashes($_POST['email']);
}
$check = mysqli_query($conn,"SELECT * FROM user WHERE username = '".$_POST['username']."'")or die(mysqli_error());

//Gives error if user dosen't exist
$check2 = mysqli_num_rows($check);
if ($check2 == 0) {
die('That user does not exist in our database. <a href=add.php>Click Here to Register</a>');
}
while($info = mysqli_fetch_array( $check )) 
{
$_POST['pass'] = stripslashes($_POST['pass']);
$info['userpass'] = stripslashes($info['userpass']);
$_POST['pass'] = $_POST['pass'];
$dept_id = $info['dept_id'];
//gives error if the password is wrong
if ($_POST['pass'] != $info['userpass']) {
die('Incorrect combination, please try again.');
}
else 
{ 

// if login is ok then we add a cookie 
$_POST['username'] = stripslashes($_POST['username']); 
$hour = time() + 3600; 
setcookie(ID_my_site, $_POST['username'], $hour); 
setcookie(Key_my_site, $_POST['userpass'], $hour);	

//then redirect them to the members area 
if ($info['dept_id'] == '1'){
 header(
			 		"Location: Education/educ_main.php?username=". $_POST['username'] 
										
		 		   );
}
elseif($info['dept_id'] == '2'){

 header(
			 		"Location: CIT/cit_main.php?username=". $_POST['username'] 
										
		 		   );
				   }
	elseif($info['dept_id'] == '3'){

 header(
			 		"Location: SAS/sas_main.php?username=". $_POST['username'] 
										
		 		   );
				     }
	elseif($info['dept_id'] == '1'){

 header(
			 		"Location: log-in.php?user=". $_POST['user not registered, Click Here to Register'] 
										
		 		   );
}
}
}
} 


else 
{	
}
// if they are not logged in 
?> 
<body>
<div id="container">
  <div id="header">
    <div id="logo_w1">Scheduling System</div>
    <div id="logo_w2"></div>
    <div id="header_text">
      <p></p>
    </div>
    <ul class="cssMenu cssMenum">
	<li class=" cssMenui"><a class="  cssMenui" href="http://localhost/"><img src="images/homepage.gif" />Home</a></li>
	<li class=" cssMenui"><a class="  cssMenui" href="search.php"><span>Search</span><![if gt IE 6]></a><![endif]><!--[if lte IE 6]><table><tr><td><![endif]-->
	<ul class=" cssMenum">
		<li class=" cssMenui"><a class="  cssMenui" href="search_teacher.php"><img src="images/User (1).ico" />Teacher Schedule</a></li>
		<li class=" cssMenui"><a class="  cssMenui" href="search_course.php"><img src="images/user-group.ico" /> Student Schedule</a></li>
		<li class=" cssMenui"><a class="  cssMenui" href="search_room.php"><img src="images/school-icon.png" />Room Schedule</a></li>
	</ul>
	<!--[if lte IE 6]></td></tr></table></a><![endif]--></li>
	<li class=" cssMenui"><a class="  cssMenui" href="add_entry.php"><span>Add entry</span><![if gt IE 6]></a><![endif]><!--[if lte IE 6]><table><tr><td><![endif]-->
	<ul class=" cssMenum">
		<li class=" cssMenui"><a class="  cssMenui" href="user.php"><span><img src="images/user.ico" />User</span><![if gt IE 6]></a><![endif]><!--[if lte IE 6]><table><tr><td><![endif]-->
		<ul class=" cssMenum">
			<li class=" cssMenui"><a class="  cssMenui" href="user.php"><img src="images/folder-new.ico" />Add</a></li>

			<li class=" cssMenui"><a class="  cssMenui" href="userlist.php"><img src="images/folder.ico" />View</a></li>
		</ul>
		<!--[if lte IE 6]></td></tr></table></a><![endif]--></li>
		<li class=" cssMenui"><a class="  cssMenui" href="faculty-a.php"><span><img src="images/User (1).ico" />Teacher</span><![if gt IE 6]></a><![endif]><!--[if lte IE 6]><table><tr><td><![endif]-->
		<ul class=" cssMenum">
			<li class=" cssMenui"><a class="  cssMenui" href="faculty-a.php"><img src="images/folder-new.ico" />Add</a></li>
			<li class=" cssMenui"><a class="  cssMenui" href="facultylist-a.php"><img src="images/folder.ico" />View</a></li>
		</ul>
		<!--[if lte IE 6]></td></tr></table></a><![endif]--></li>
		<li class=" cssMenui"><a class="  cssMenui" href="student-a.php"><span><img src="images/courses.JPG" />Course</span><![if gt IE 6]></a><![endif]><!--[if lte IE 6]><table><tr><td><![endif]-->
		<ul class=" cssMenum">
			<li class=" cssMenui"><a class="  cssMenui" href="student-a.php"><img src="images/folder-new.ico" />Add</a></li>
			<li class=" cssMenui"><a class="  cssMenui" href="student-list-a.php"><img src="images/folder.ico" />View</a></li>
		</ul>

		<!--[if lte IE 6]></td></tr></table></a><![endif]--></li>
		<li class=" cssMenui"><a class="  cssMenui" href="subject-a.php"><span><img src="images/Summer-user.ico" />Subject</span><![if gt IE 6]></a><![endif]><!--[if lte IE 6]><table><tr><td><![endif]-->
		<ul class=" cssMenum">
			<li class=" cssMenui"><a class="  cssMenui" href="subject-a.php"><img src="images/folder-new.ico" />Add</a></li>
			<li class=" cssMenui"><a class="  cssMenui" href="subjectlist-a.php"><img src="images/folder.ico" />View</a></li>
		</ul>
		<!--[if lte IE 6]></td></tr></table></a><![endif]--></li>

		<li class=" cssMenui"><a class="  cssMenui" href="room-a.php"><span><img src="images/school-icon.png" />Room</span><![if gt IE 6]></a><![endif]><!--[if lte IE 6]><table><tr><td><![endif]-->
		<ul class=" cssMenum">
			<li class=" cssMenui"><a class="  cssMenui" href="room-a.php"><img src="images/folder-new.ico" />Add</a></li>
			<li class=" cssMenui"><a class="  cssMenui" href="roomlist-a.php"><img src="images/folder.ico" />View</a></li>
		</ul>
		<!--[if lte IE 6]></td></tr></table></a><![endif]--></li>
		<li class=" cssMenui"><a class="  cssMenui" href="dept-a.php"><span><img src="images/dept.jpg" />Department</span><![if gt IE 6]></a><![endif]><!--[if lte IE 6]><table><tr><td><![endif]-->

		<ul class=" cssMenum">
			<li class=" cssMenui"><a class="  cssMenui" href="dept-a.php"><img src="images/folder-new.ico" />Add</a></li>
			<li class=" cssMenui"><a class="  cssMenui" href="deptlist-a.php"><img src="images/folder.ico" />View</a></li>
		</ul>
		<!--[if lte IE 6]></td></tr></table></a><![endif]--></li>
		<li class=" cssMenui"><a class="  cssMenui" href="year-a.php"><span><img src="images/sy .jpg" />School Year</span><![if gt IE 6]></a><![endif]><!--[if lte IE 6]><table><tr><td><![endif]-->
		<ul class=" cssMenum">

			<li class=" cssMenui"><a class="  cssMenui" href="year-a.php "><img src="images/folder-new.ico" />Add</a></li>
			<li class=" cssMenui"><a class="  cssMenui" href="yearlist-a.php"><img src="images/folder.ico" />View</a></li>
		</ul>
		<!--[if lte IE 6]></td></tr></table></a><![endif]--></li>
	</ul>
	<!--[if lte IE 6]></td></tr></table></a><![endif]--></li>
	 

	<li class=" cssMenui"><a class="  cssMenui" href="about.php"><span>About us</span><![if gt IE 6]></a><![endif]><!--[if lte IE 6]><table><tr><td><![endif]-->
	<ul class=" cssMenum">
		<li class=" cssMenui"><a class="  cssMenui" href="about_sched.php"><img src="images/scheduling.png" />Scheduling System</a></li>
		<li class=" cssMenui"><a class="  cssMenui" href="about_dev.php"><img src="images/dev.png" />Developer</a></li>
	</ul>
	<!--[if lte IE 6]></td></tr></table></a><![endif]--></li>
	<li class=" cssMenui"><a class="  cssMenui" href="help.php">Help</a></li>

	<li class=" cssMenui"><a class="  cssMenui" href="logout.php">Log out</a></li>
</ul>

  </div>
  <div id="content">
	
	  <div id="program"></div>
		<div id="right"><form action="<?php echo $_SERVER['PHP_SELF']?>" method="post">
		  <table border="0" align="left">
            <tr>
              <td colspan="2"><h1>User Login</h1></td>
            </tr>
            <tr>
              <td>Username:</td>
              <td><input type="text" name="username" maxlength="40" />
              </td>
            </tr>
            <tr>
              <td>Password:</td>
              <td><input type="password" name="pass" maxlength="50" />
              </td>
            </tr>
            <tr>
              <td colspan="2" align="right"><input type="submit" name="submit" value="Login" />
              </td>
            </tr>
          </table>
		  <p>&nbsp;</p>
		  <p>&nbsp;</p>
		  <p>&nbsp;</p>
		  </form>
			<p><?php echo $user; ?>&nbsp;</p>
			<p>&nbsp;</p>
			<p>&nbsp;</p>
			<p>&nbsp;</p>
			<p>&nbsp;</p>
			<p>&nbsp;</p>
			<p>&nbsp;</p>
			<p>&nbsp;</p>
			<p>&nbsp;</p>
		</div>
		<p>&nbsp;</p>
		<p align="center" class="style30">You Must Log-in first!</p>
		<p>&nbsp;</p>
		<p>&nbsp;</p>
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
		
		//Limitng Max number on textboxes	
		//Source: http://javascript.internet.com/forms/limit-textarea.html
		function textCounter(field, countfield, maxlimit) 
		{
			if (field.value.length > maxlimit) // if too long...trim it!
				field.value = field.value.substring(0, maxlimit);
			else 
				countfield.value = maxlimit - field.value.length;
		}
	
	  //Number only on Keypress		
	  function isNumberKey(evt)
	  {
		 var charCode = (evt.which) ? evt.which : event.keyCode
		 if (charCode > 31 && (charCode < 48 || charCode > 57))
			return false;	
		 return true;
	  }	 
</script>	

<script language="javascript" >
	var form = document.forms[0];
	//purpose?: to retrieve what users last input on the field..
	form.pdept.value = ("<?PHP echo $_POST['hidden_dept_id']; ?>");
	
	//alert (form.pCityM.value);				
</script>