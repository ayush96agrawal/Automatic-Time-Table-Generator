<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<link href="../includes/style_prac2.css" rel="stylesheet" type="text/css" />
<title>Scheduling System</title>
<style type="text/css">
<!--
.style4 {font-size: 11px;
	font-family: Verdana, Arial, Helvetica, sans-serif;
}
#Layer2 {
	position:absolute;
	left:155px;
	top:436px;
	width:454px;
	height:94px;
	z-index:1;
}
.style31 {
	color: #FF0000;
	font-weight: bold;
}
-->
</style>
</head>
<?php 
  
 //Avoiding Notice error from echoing
error_reporting( error_reporting() & ~E_NOTICE );

  require ("../includes/dbconnection.php");
  
  $user =$_REQUEST['user'];

//if the login form is submitted
if (isset($_POST['submit'])) { // if form has been submitted

// makes sure they filled it in
if(!$_POST['username'] | !$_POST['pass']){
$error = 'You did not fill in a required field.';
}
// checks it against the database

if (!get_magic_quotes_gpc()) {
$_POST['email'] = addslashes($_POST['email']);
}
$check = mysqli_query($conn,"SELECT * FROM user WHERE username = '".$_POST['username']."'")or die(mysql_error());

//Gives error if user dosen't exist
$check2 = mysqli_num_rows($check);
if ($check2 == 0) {
$error ='That user does not exist. Please contact the administrator to ask for assistance.';
}
while($info = mysqli_fetch_array( $check )) 
{
$_POST['pass'] = stripslashes($_POST['pass']);
$info['userpass'] = stripslashes($info['userpass']);
$_POST['pass'] = $_POST['pass'];
$dept_id = $info['dept_id'];
//gives error if the password is wrong
if ($_POST['pass'] != $info['userpass']) {
$error ='Invalid credentials';
}
else 
{ 

// if login is ok then we add a cookie 
$_POST['username'] = stripslashes($_POST['username']); 
$hour = time() + 3600; 
setcookie(ID_my_site, $_POST['username'], $hour); 
setcookie(Key_my_site, $_POST['userpass'], $hour);	

//then redirect them to the members area 
if ($info['dept_id'] == '4'){

		$_SESSION['is'];
		$_SESSION['is']['login']    = TRUE;
		$_SESSION['is']['username'] = $_POST['username'];
		$session = "1";	

 header(
			 		"Location:admin.php"
										
		 		   );
}
elseif($info['dept_id'] <> '4'){
		
		$_SESSION['is'];
		$_SESSION['is']['login']    = TRUE;
		$_SESSION['is']['username'] = $_POST['username'];
		$session = "1";	
		$error ='Username is not registered as admin.';	
//header(
//		 		"Location:index.php?user=". $_POST['user not registered, Click Here to Register']	
								
		 		//   );
	
}
}
}
} 
else 
{	
}

?> 
<body>

<div id="container">
  <div id="header">
    <div id="logo_w2"><img src="../images/logo copy.jpg" alt="s" width="717" height="160" /></div>
    <ul class="cssMenu cssMenum">
	<!--<li class=" cssMenui"><a class="  cssMenui" href="admin.php"><img src="../images/homepage.gif" />Home</a></li>-->
	<!--<li class=" cssMenui"><a class="  cssMenui" href="#"><span>Search</span><![if gt IE 6]></a><![endif]><!--[if lte IE 6]><table><tr><td><![endif]-->
	<ul class=" cssMenum">
		<li class=" cssMenui"><a class="  cssMenui" href="search_teacher.php"><img src="../images/User (1).ico" />Teacher Schedule</a></li>
		<li class=" cssMenui"><a class="  cssMenui" href="search_course.php"><img src="../images/user-group.ico" /> Student Schedule</a></li>
		<li class=" cssMenui"><a class="  cssMenui" href="search_room.php"><img src="../images/school-icon.png" />Room Schedule</a></li>
	</ul>
	<!--[if lte IE 6]></td></tr></table></a><![endif]--></li>
	<!--<li class=" cssMenui"><a class="  cssMenui" href="#"><span>Add entry</span><![if gt IE 6]></a><![endif]><!--[if lte IE 6]><table><tr><td><![endif]-->
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
	<!-- -->

	<li class=" cssMenui"><a class="  cssMenui" href="#"><span>About us</span><![if gt IE 6]></a><![endif]><!--[if lte IE 6]><table><tr><td><![endif]-->
	<ul class=" cssMenum">
		<li class=" cssMenui"><a class="  cssMenui" href="about_sched.php"><img src="../images/scheduling.png" />Scheduling System</a></li>
		<li class=" cssMenui"><a class="  cssMenui" href="about_dev.php"><img src="../images/dev.png" />Developer</a></li>
	</ul>
	<!--[if lte IE 6]></td></tr></table></a><![endif]--></li>
	<li class=" cssMenui"><a class="  cssMenui" href="#">Help</a></li>

</ul>

  </div>
	<div id="content">
	
	  <div id="left">
		
	    <div align="center">
		    <p>Welcome to Scheduling System </p>
	      <p>
		  <div class="style31" id="Layer2"><?php echo $error;?></div>
		  </p>
	      <form action="<?php echo $_SERVER['PHP_SELF']?>" method="post">
		    <table border="0" align="center">
              <tr>
                <td colspan="2"><h1 align="center">ADMINISTRATOR'S Login</h1></td>
              </tr>
              <tr>
                <td width="68"><div align="left">Username:</div></td>
                <td width="180"><div align="left">
                  <input type="text" name="username" maxlength="50" />
                </div></td>
              </tr>
              <tr>
                <td><div align="left">Password:</div></td>
                <td><div align="left">
                  <input type="password" name="pass" maxlength="50" />                
                </div></td>
              </tr>
              <tr>
                <td colspan="2" align="center"><input type="submit" name="submit" value="Login" />                </td>
              </tr>
            </table>
	      </form>
	    </div>
	   
	  </div>
	  <div id="program"></div>
	  <div id="right">

		   <p>&nbsp;</p>
		       <p>&nbsp;</p>
		       <p>&nbsp;</p>
	  </div>
		<div id="footerline">
		 <!-- <p align="center"><span class="style4"><a href="help.php">Help</a> | <a href="about_sched.php">Scheduling 	                                System</a>-->
                            </span>
          </p>
	  </div>
	</div>
	
	<div id="footer">Four Dark Riders</div>	
</div>
</body>
</html>

