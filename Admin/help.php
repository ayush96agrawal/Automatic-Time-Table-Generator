<?php if (empty($session)) { session_start(); } ?>
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
.style32 {font-family: Georgia, "Times New Roman", Times, serif; font-size: 14px; }
.style34 {font-family: Georgia, "Times New Roman", Times, serif; font-size: 12px; }
.style36 {
	font-family: Georgia, "Times New Roman", Times, serif;
	font-size: 18px;
	font-weight: bold;
}
#Layer2 {
	position:absolute;
	left:38px;
	top:333px;
	width:581px;
	height:137px;
	z-index:1;
}
-->
</style>
</head>
<?php
include("../includes/session.php");
	
?>
<body>

<div id="container" align = "center">
  <div id="header"><img src="../images/logo copy.jpg" alt="s" width="717" height="160" />
    <div id="logo_w2"></div>
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
		
	    <div align="center">
		    <form action="<?php echo $_SERVER['PHP_SELF']?>" method="post">
              <p><br />
              <span class="style36">User Manual </span>&nbsp;</p>
            <div id="Layer2">
  <p align="center">&nbsp;</p>
  
  <p align="center" class="style34">&nbsp;<img src ="../images/pdf/4.JPG" alt="a" width="468" height="382" /> </p>
  <div align="center" class="style34">
    <div align="justify"><br clear="all" />
      </div>
  </div>
  <p align="justify" class="style34">&nbsp;</p>
  <p align="justify" class="style34">Figure_ below  shows Teachers Link where the administrator can add or view Faculty name and its department.<br />
    To add/ view teachers, just click on the Add Entry, Teacher,  add/view.</p>
  <p align="center" class="style34"><br />
      <img src="../images/pdf/5.JPG" alt="a" width="468" height="382" /></p>
  <p align="justify" class="style34"><br />
    Figure_ below shows the Course Link where the  administrator can add or view the courses.<br />
    To add/ view courses, just click on the Add Entry,  Course, add/view.</p>
  <p align="justify" class="style34">&nbsp;</p>
  <p align="center" class="style34"><img src="../images/pdf/6.JPG" alt="a" width="468" height="382"/>&nbsp;<br />
  &nbsp;</p>
  <div align="center" class="style34">
    <div align="justify"><br clear="all" />
      </div>
  </div>
  <p align="justify" class="style34">Figure_ below shows the Subject Link where the  administrator can add or view the subjects&rsquo; information.<br />
    To add/ view subjects, just click on the Add Entry,  Subject, add/view.</p>
  <p align="justify" class="style34">&nbsp;</p>
  <p align="center" class="style34"><img src="../images/pdf/7.JPG" alt="a" width="468" height="382" /></p>
  <p align="justify" class="style34">&nbsp;</p>
  <p align="justify" class="style34">Figure_ below shows the Room Link where the administrator  can add or view the room information.<br />
    To add/view rooms, just click on the Add Entry, Room,  add/view.</p>
  <p align="justify" class="style34">&nbsp;</p>
  <p align="center" class="style34"><img src="../images/pdf/8.JPG" alt="a" width="468" height="382" /></p>
  <p align="justify" class="style34">Figure_ below shows the Department Link where the  administrator can add or view the department.<br />
    To add/view departments, just click on the Add Entry,  Department, add/view.</p>
  <p align="justify" class="style34">&nbsp;</p>
  <p align="center" class="style34"><img src="../images/pdf/9.JPG" alt="a" width="468" height="382" /></p>
  <p align="justify" class="style34"><br />
    Figure_ below shows the School Year Link where the  administrator can add or view school year.<br />
    To add/view school year, just click on the Add Entry,  Department, add/view.</p>
  <p align="justify" class="style34">&nbsp;</p>
  <p align="center" class="style34"><img src="../images/pdf/10.JPG" alt="a" width="468" height="382" /></p>
  <p align="justify" class="style34">Figure_ shows the Schedule Menu where the administrator  can add new schedules.<br />
    To add new schedules, simply fill-up the information  needed.</p>
  <p align="justify" class="style34">&nbsp;</p>
  <p align="center" class="style32"><span class="style34"><img src="../images/pdf/11.JPG" alt="q" width="468" height="382" /></span></p>
</div>
                  <div align="center" class="style32"><strong>Online Scheduling System</strong><br clear="all" />
              </div>
              <div id="program"></div>
              <div id="div"></div>
              <p>&nbsp;    </p>
	      </form>
        </div>
	  </div>
	  <p>&nbsp;</p>
	  <p>&nbsp;</p>
	  <p>&nbsp;</p>
	  <p>&nbsp;</p>
	  <p>&nbsp;</p>
	  <p>&nbsp;</p>
	  <p>&nbsp;</p>
	  <p>&nbsp;</p>
	  <p>&nbsp;</p>
	  <p>&nbsp;</p>
	  <p>&nbsp;</p>
	  <p>&nbsp;</p>
	  <p>&nbsp;</p>
	  <p>&nbsp;</p>
	  <p>&nbsp;</p>
	  <p>&nbsp;</p>
	  <p>&nbsp;</p>
	  <p>&nbsp;</p>
	  <p>&nbsp;</p>
	  <p>&nbsp;</p>
	  <p>&nbsp;</p>
	  <p>&nbsp;</p>
	  <p>&nbsp;</p>
	  <p>&nbsp;</p>
	  <p>&nbsp;</p>
	  <p>&nbsp;</p>
	  <p>&nbsp;</p>
	  <p>&nbsp;</p>
	  <p>&nbsp;</p>
	  <p>&nbsp;</p>
	  <p>&nbsp;</p>
	  <p>&nbsp;</p>
	  <p>&nbsp;</p>
	  <p>&nbsp;</p>
	  <p>&nbsp;</p>
	  <p>&nbsp;</p>
	  <p>&nbsp;</p>
	  <p>&nbsp;</p>
	  <p>&nbsp;</p>
	  <p>&nbsp;</p>
	  <p>&nbsp;</p>
	  <p>&nbsp;</p>
	  <p>&nbsp;</p>
	  <p>&nbsp;</p>
	  <p>&nbsp;</p>
	  <p>&nbsp;</p>
	  <p>&nbsp;</p>
	  <p>&nbsp;</p>
	  <p>&nbsp;</p>
	  <p>&nbsp;</p>
	  <p>&nbsp;</p>
	  <p>&nbsp;</p>
	  <p>&nbsp;</p>
	  <p>&nbsp;</p>
	  <p>&nbsp;</p>
	  <p>&nbsp;</p>
	  <p>&nbsp;</p>
	  <p>&nbsp;</p>
	  <p>&nbsp;</p>
	  <p>&nbsp;</p>
	  <p>&nbsp;</p>
	  <p>&nbsp;</p>
	  <p>&nbsp;</p>
	  <p>&nbsp;</p>
	  <p>&nbsp;</p>
	  <p>&nbsp;</p>
	  <p>&nbsp;</p>
	  <p>&nbsp;</p>
	  <p>&nbsp;</p>
	  <p>&nbsp;</p>
	  <p>&nbsp;</p>
	  <p>&nbsp;</p>
	  <p>&nbsp;</p>
	  <p>&nbsp;</p>
	  <p>&nbsp;</p>
	  <p>&nbsp;</p>
	  <p>&nbsp;</p>
	  <p>&nbsp;</p>
	  <p>&nbsp;</p>
	  <p>&nbsp;</p>
	  <p>&nbsp;</p>
	  <p>&nbsp;</p>
	  <p>&nbsp;</p>
	  <p>&nbsp;</p>
	  <p>&nbsp;</p>
	  <p>&nbsp;</p>
	  <p>&nbsp;</p>
	  <p>&nbsp;</p>
	  <p>&nbsp;</p>
	  <p>&nbsp;</p>
	  <p>&nbsp;</p>
	  <p>&nbsp;</p>
	  <p>&nbsp;</p>
	  <p>&nbsp;</p>
	  <p>&nbsp;</p>
	  <p>&nbsp;</p>
	  <p>&nbsp;</p>
	  <p>&nbsp;</p>
	  <p>&nbsp;</p>
	  <p>&nbsp;</p>
	  <p>&nbsp;</p>
	  <p>&nbsp;</p>
	  <p>&nbsp;</p>
	  <p>&nbsp;</p>
	  <p>&nbsp;</p>
	  <p>&nbsp;</p>
	  <p>&nbsp;</p>
	  <p>&nbsp;</p>
	  <p>&nbsp;</p>
	  <p>&nbsp;</p>
	  <p>&nbsp;</p>
	  <p>&nbsp;</p>
	  <p>&nbsp;</p>
	  <p>&nbsp;</p>
	  <p>&nbsp;</p>
	  <p>&nbsp;</p>
	  <p>&nbsp;</p>
	  <p>&nbsp;</p>
	  <p>&nbsp;</p>
	  <p>&nbsp;</p>
	  <p>&nbsp;</p>
	  <p>&nbsp;</p>
	  <p>&nbsp;</p>
	  <p>&nbsp;</p>
	  <p>&nbsp;</p>
	  <p>&nbsp;</p>
	  <p>&nbsp;</p>
	  <p>&nbsp;</p>
	  <p>&nbsp;</p>
	  <p>&nbsp;</p>
	  <p>&nbsp;</p>
	  <p>&nbsp;</p>
	  <p>&nbsp;</p>
	  <p>&nbsp;</p>
	  <p>&nbsp;</p>
	  <p>&nbsp;</p>
	  <p>&nbsp;</p>
	  <p>&nbsp;</p>
	  <p>&nbsp;</p>
	  <p>&nbsp;</p>
	  <p>&nbsp;</p>
	  <p>&nbsp;</p>
	  <p>&nbsp;</p>
	  <p>&nbsp;</p>
	  <p>&nbsp;</p>
	  <p>&nbsp;</p>
	  <p>&nbsp;</p>
	  <p>&nbsp;</p>
	  <p>&nbsp;</p>
	  <p>&nbsp;</p>
	  <p>&nbsp;</p>
	  <p>&nbsp;</p>
	  <p>&nbsp;</p>
	  <p>&nbsp;</p>
	  <p>&nbsp;</p>
	  <p>&nbsp;</p>
	  <p>&nbsp;</p>
	  <p>&nbsp;</p>
	  <p>&nbsp;</p>
	  <p>&nbsp;</p>
	  <p>&nbsp;</p>
	  <p>&nbsp;</p>
	  <p>&nbsp;</p>
	  <p>&nbsp;</p>
	  <p>&nbsp;</p>
	  <p>&nbsp;</p>
	  <p>&nbsp;</p>
	  <p>&nbsp;</p>
	  <p>&nbsp;</p>
	  <p>&nbsp;</p>
	  <p>&nbsp;</p>
	  <p>&nbsp;</p>
	  <p>&nbsp;</p>
	  <p>&nbsp;</p>
	  <p>&nbsp;</p>
	  <p>&nbsp;</p>
	  <p>&nbsp;</p>
	  <p>&nbsp;</p>
	  <p>&nbsp;</p>
	  <p>&nbsp;</p>
	  <p>&nbsp;</p>
	  <p>&nbsp;</p>
	  <p>&nbsp;</p>
	  <p>&nbsp;</p>
	  <p>&nbsp;</p>
	  <p>&nbsp;</p>
	  <p>&nbsp;</p>
	  <p>&nbsp;</p>
	  <p>&nbsp;</p>
	  <p>&nbsp;</p>
	  <p>&nbsp;</p>
	  <p>&nbsp;</p>
	  <p>&nbsp;</p>
	  <p>&nbsp;</p>
	  <p>&nbsp;</p>
	  <p>&nbsp;</p>
	  <p>&nbsp;</p>
	  <p>&nbsp;</p>
	  <p>&nbsp;</p>
	  <p>&nbsp;</p>
	  <p>&nbsp;</p>
	  <p>&nbsp;</p>
	  <p>&nbsp;</p>
	  <p>&nbsp;</p>
	  <p>&nbsp;</p>
	  <p>&nbsp;</p>
	  <p>&nbsp;</p>
	  <p>&nbsp;</p>
	  <p>&nbsp;</p>
	  <p>&nbsp;</p>
	  <p>&nbsp;</p>
	  <p>&nbsp;</p>
	  <p>&nbsp;</p>
	  <p>&nbsp;</p>
	  <p>&nbsp;</p>
	  <p>&nbsp;</p>
	  <p>&nbsp;</p>
	  <p>&nbsp;</p>
	  <p>&nbsp;</p>
	  <p>&nbsp;</p>
	  <p>&nbsp;</p>
	  <p>&nbsp;</p>
	  <ol class="style32">
        <li>
          <div align="justify"></div>
        </li>
      </ol>
	  <div id="footerline">
		  <p align="center"><span class="style4"><a href="help.php">Help</a> | <a href="about_dev.php">Developer</a>| <a href="about_sched.php">Scheduling System</a>| <a href="contact.html">Contact Us</a>| <a href="www.chmsc.edu.ph">CHMSC </a></span></p>
	  </div>
	</div>
	
	<div id="footer">Copyright © 2009 </div>	
</div>
</body>
</html>

