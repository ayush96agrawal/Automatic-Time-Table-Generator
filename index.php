<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<link href="includes/style_prac2.css" rel="stylesheet" type="text/css" />
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
.style1 {font-size: 50px}
.style2 {font-size: 16px}
.style5 {font-size: 16px; font-weight: bold; }
#Layer1 {position:absolute;
	width:272px;
	height:80px;
	z-index:1;
	left: 289px;
	top: 219px;
}
.style31 {	color: #FF0000;
	font-weight: bold;
}
#Layer2 {	position:absolute;
	left:242px;
	top:415px;
	width:454px;
	height:94px;
	z-index:1;
}
-->
</style>
</head>

<?php 

//Avoiding Notice error from echoing
error_reporting( error_reporting() & ~E_NOTICE );

  require ("includes/dbconnection.php");
  if (isset($_POST['cmdSubmit1'])) 
  	{ 		
		
			 header(
			 		"Location: Admin/index.php"	
		 		   );				   				   
			}
  if (isset($_POST['cmdSubmit2'])) 
  	{ 		
		
			 header(
			 		"Location: Education/search_teacher.php"	
		 		   );				   				   
			}
   if (isset($_POST['cmdSubmit3'])) 
  	{ 		
		
			 header(
			 		"Location: index1.php"	
		 		   );				   				   
			}
  $user =$_REQUEST['username'];

//if (isset($_GET["action"]) && ($_GET["action"] == "login")) {

//if the login form is submitted
if (isset($_POST['submit'])) { // if form has been submitted

// makes sure they filled it in
if(!$_POST['username'] | !$_POST['pass']){
$error ='You did not fill in a required field.';
}
// checks it against the database

if (!get_magic_quotes_gpc()) {
$_POST['email'] = addslashes($_POST['email']);
}
$check = mysqli_query($conn,"SELECT * FROM user WHERE username = '".$_POST['username']."'")or die(mysqli_error($conn));

//Gives error if user dosen't exist
$check2 = mysqli_num_rows($check);
if ($check2 == 0) {
die('That user does not exist in our database. Please contact the administrator for assistance.');
}
while($info = mysqli_fetch_array( $check )) 
{
$_POST['pass'] = stripslashes($_POST['pass']);
$info['userpass'] = stripslashes($info['userpass']);
$_POST['pass'] = $_POST['pass'];
$dept_id = $info['dept_id'];
//gives error if the password is wrong
if ($_POST['pass'] != $info['userpass']) {
$error ='Incorrect combination, please try again.';
}
else 
{ 

// if login is ok then we add a cookie 
$_POST['username'] = stripslashes($_POST['username']); 
$hour = time() + 3600; 
setcookie(ID_my_site, $_POST['username'], $hour); 
setcookie(Key_my_site, $_POST['userpass'], $hour);	
$user_id  = $info['user_id'];
//then redirect them to the members area 
if ($info['user_type'] == 2){
		
		$_SESSION['is'] = $is;
		$_SESSION['is']['login']    = TRUE;
		$_SESSION['is']['username'] = $_POST['username'];
		$session = "1";	
	
 header(
			 		"Location: Education/index.php?username=".md5($_POST['username'])
										
		 		   );
}
elseif($info['dept_id'] == '2'){
		
		//session_register('is');
		$_SESSION['is'] = $is;
		$_SESSION['is']['login']    = TRUE;
		$_SESSION['is']['username'] = $_POST['username'];
		$session = "1";	
	

 header(
			 		"Location: CIT/index.php?username=". $_POST['username'] 
										
		 		   );
				   }
	elseif($info['dept_id'] == '3'){
	
		$_SESSION['is'] = $is;
		$_SESSION['is']['login']    = TRUE;
		$_SESSION['is']['username'] = $_POST['username'];
		$session = "1";	

 header(
			 		"Location: SAS/index.php?username=". $_POST['username'] 
										
		 		   );
				     }
					 
					 elseif($info['dept_id'] == '42'){
		
		$_SESSION['is'] = $is;
		$_SESSION['is']['login']    = TRUE;
		$_SESSION['is']['username'] = $_POST['username'];
		$session = "1";	
	

 header(
			 		"Location: dean_cit/index.php?username=". $_POST['username'] 
										
		 		   );
				   }
	elseif($dept_id == '43'){
	
		$_SESSION['is'] = $is;
		$_SESSION['is']['login']    = TRUE;
		$_SESSION['is']['username'] = $_POST['username'];
		$session = "1";	

 header(
			 		"Location: dean_sas/index.php?username=". $_POST['username'] 
										
		 		   );
				     }
		elseif($info['dept_id'] == '41'){
	
		$_SESSION['is'] = $is;
		$_SESSION['is']['login']    = TRUE;
		$_SESSION['is']['username'] = $_POST['username'];
		$session = "1";	

 header(
			 		"Location: dean_educ/index.php?username=". $_POST['username'] 
										
		 		   );
				     }
					 
	
elseif($info['dept_id'] == '4'){
	
	$_SESSION['is'] = $is;
		$_SESSION['is']['login']    = TRUE;
		$_SESSION['is']['username'] = $_POST['username'];
		$session = "1";	

 header(
			 		"Location: Admin/admin.php?username=". $_POST['username'] 
										
		 		   );
}
else{
	
	$_SESSION['is'] = $is;
		$_SESSION['is']['login']    = TRUE;
		$_SESSION['is']['username'] = $_POST['username'];
		$session = "1";	

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
  <div id="header" width="500 px">
    <div id="logo_w2" align="left"><img src="images/logo copy.jpg" /> </div>
    <ul class="cssMenu cssMenum">
	<!--<li class=" cssMenui"><a class="  cssMenui" href="index.php"><img src="images/homepage.gif" />Home</a></li>-->
	<!--<li class=" cssMenui"><a class="  cssMenui" href="index.php"><span>Search</span><![if gt IE 6]></a><![endif]><!--[if lte IE 6]><table><tr><td><![endif]-->
	<!--<ul class=" cssMenum">
		<li class=" cssMenui"><a class="  cssMenui" href="index.php"><img src="images/User (1).ico" />Teacher Schedule</a></li>
		<li class=" cssMenui"><a class="  cssMenui" href="index.php"><img src="images/user-group.ico" /> Student Schedule</a></li>
		<li class=" cssMenui"><a class="  cssMenui" href="index.php"><img src="images/school-icon.png" />Room Schedule</a></li>
	</ul>-->
	<!--[if lte IE 6]></td></tr></table></a><![endif]--></li>
	<!--<li class=" cssMenui"><a class="  cssMenui" href="index.php"><span>Add entry</span><![if gt IE 6]></a><![endif]><!--[if lte IE 6]><table><tr><td><![endif]-->
	<ul class=" cssMenum">
		<li class=" cssMenui"><a class="  cssMenui" href="index.php"><span><img src="images/user.ico" />User</span><![if gt IE 6]></a><![endif]><!--[if lte IE 6]><table><tr><td><![endif]-->
		<ul class=" cssMenum">
			<li class=" cssMenui"><a class="  cssMenui" href="index.php"><img src="images/folder-new.ico" />Add</a></li>

			<li class=" cssMenui"><a class="  cssMenui" href="admin/userlist.php"><img src="images/folder.ico" />View</a></li>
		</ul>
		<!--[if lte IE 6]></td></tr></table></a><![endif]--></li>
		<li class=" cssMenui"><a class="  cssMenui" href="admin/faculty-a.php"><span><img src="images/User (1).ico" />Teacher</span><![if gt IE 6]></a><![endif]><!--[if lte IE 6]><table><tr><td><![endif]-->
		<ul class=" cssMenum">
			<li class=" cssMenui"><a class="  cssMenui" href="admin/faculty-a.php"><img src="images/folder-new.ico" />Add</a></li>
			<li class=" cssMenui"><a class="  cssMenui" href="admin/facultylist-a.php"><img src="images/folder.ico" />View</a></li>
		</ul>
		<!--[if lte IE 6]></td></tr></table></a><![endif]--></li>
		<li class=" cssMenui"><a class="  cssMenui" href="admin/student-a.php"><span><img src="images/courses.JPG" />Course</span><![if gt IE 6]></a><![endif]><!--[if lte IE 6]><table><tr><td><![endif]-->
		<ul class=" cssMenum">
			<li class=" cssMenui"><a class="  cssMenui" href="admin/student-a.php"><img src="images/folder-new.ico" />Add</a></li>
			<li class=" cssMenui"><a class="  cssMenui" href="admin/student-list-a.php"><img src="images/folder.ico" />View</a></li>
		</ul>

		<!--[if lte IE 6]></td></tr></table></a><![endif]--></li>
		<li class=" cssMenui"><a class="  cssMenui" href="admin/subject-a.php"><span><img src="images/Summer-user.ico" />Subject</span><![if gt IE 6]></a><![endif]><!--[if lte IE 6]><table><tr><td><![endif]-->
		<ul class=" cssMenum">
			<li class=" cssMenui"><a class="  cssMenui" href="admin/subject-a.php"><img src="images/folder-new.ico" />Add</a></li>
			<li class=" cssMenui"><a class="  cssMenui" href="admin/subjectlist-a.php"><img src="images/folder.ico" />View</a></li>
		</ul>
		<!--[if lte IE 6]></td></tr></table></a><![endif]--></li>

		<li class=" cssMenui"><a class="  cssMenui" href="admin/room-a.php"><span><img src="images/school-icon.png" />Room</span><![if gt IE 6]></a><![endif]><!--[if lte IE 6]><table><tr><td><![endif]-->
		<ul class=" cssMenum">
			<li class=" cssMenui"><a class="  cssMenui" href="admin/room-a.php"><img src="images/folder-new.ico" />Add</a></li>
			<li class=" cssMenui"><a class="  cssMenui" href="admin/roomlist-a.php"><img src="images/folder.ico" />View</a></li>
		</ul>
		<!--[if lte IE 6]></td></tr></table></a><![endif]--></li>
		<li class=" cssMenui"><a class="  cssMenui" href="admin/dept-a.php"><span><img src="images/dept.jpg" />Department</span><![if gt IE 6]></a><![endif]><!--[if lte IE 6]><table><tr><td><![endif]-->

		<ul class=" cssMenum">
			<li class=" cssMenui"><a class="  cssMenui" href="admin/dept-a.php"><img src="images/folder-new.ico" />Add</a></li>
			<li class=" cssMenui"><a class="  cssMenui" href="admin/deptlist-a.php"><img src="images/folder.ico" />View</a></li>
		</ul>
		<!--[if lte IE 6]></td></tr></table></a><![endif]--></li>
		<li class=" cssMenui"><a class="  cssMenui" href="admin/year-a.php"><span><img src="images/sy .jpg" />School Year</span><![if gt IE 6]></a><![endif]><!--[if lte IE 6]><table><tr><td><![endif]-->
		<ul class=" cssMenum">

			<li class=" cssMenui"><a class="  cssMenui" href="admin/year-a.php "><img src="images/folder-new.ico" />Add</a></li>
			<li class=" cssMenui"><a class="  cssMenui" href="admin/yearlist-a.php"><img src="images/folder.ico" />View</a></li>
		</ul>
		<!--[if lte IE 6]></td></tr></table></a><![endif]--></li>
	</ul>
	<!--[if lte IE 6]></td></tr></table></a><![endif]--></li>
	<!--<li class=" cssMenui"><a class="  cssMenui" href="admin/sched.php">Schedule</a></li>-->

	<li class=" cssMenui"><a class="  cssMenui" href="#"><span>About us</span><![if gt IE 6]></a><![endif]><!--[if lte IE 6]><table><tr><td><![endif]-->
	<ul class=" cssMenum">
		<li class=" cssMenui"><a class="  cssMenui" href="admin/about_sched.php"><img src="images/scheduling.png" />Scheduling System</a></li>
		<li class=" cssMenui"><a class="  cssMenui" href="admin/about_dev.php"><img src="images/dev.png" />Developer</a></li>
	</ul>
	<!--[if lte IE 6]></td></tr></table></a><![endif]--></li>
	<li class=" cssMenui"><a class="  cssMenui" href="#">Help</a></li>
</ul>
  </div>
  <div id="content">
	
	  <div id="program"></div>
		<div id="right">
		  <center><form action="<?php echo $_SERVER['PHP_SELF']?>" method="post">
		  <p align="center">&nbsp;</p>
		  <table border="0" align="center">
            <tr>
              <td colspan="2"><h1 align="center">User Login</h1></td>
            </tr>
           <!-- <tr>
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
              <td height="48" colspan="2" align="center"><input type="submit" name="submit" value="Login" />
              </td>
            </tr>
               <tr>
              <td colspan="2" align="center">
              </td>
            </tr>-->
			<tr>
			<td><input type="submit" name="cmdSubmit1" value="Admin Login" />
			</td>
			</tr>
			<tr>
			<td><input type="submit" name="cmdSubmit3" value="Student Login" />
			</td>
			</tr>
			<tr>
			<td><input type="submit" name="cmdSubmit2" value="Faculty Login" />
			</td>
			</tr>
          </table>
		  <p>&nbsp;</p>
		  <form action="<?php echo $_SERVER[PHP_SELF] ?>" name="form11" method="post" >
			  	
			  </form>
		  <p>&nbsp;</p>
		  <form action="<?php echo $_SERVER[PHP_SELF] ?>" name="form12" method="post" >
			  	
			  </form>
		  <p>&nbsp;</p>
		  <p>&nbsp;</p>
		  <p>&nbsp;</p>
		  </form>
		  
		  </center>
			<div class="style31" id="Layer2"><?php echo $error;?></div>
			
			<p>&nbsp;</p>
	</div>
		<div id="footerline">
		<!--  <p align="center"><span class="style4"><a href="help.php">Help</a> | <a href="about_sched.php">Scheduling 	                                System</a>
                            </span>
          </p>-->
	  </div>
	</div>
	
	<div id="footer">Four Dark Riders</div>	
</div>
</body>
</html>

