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
#Layer2 {
	position:absolute;
	left:285px;
	top:898px;
	width:229px;
	height:104px;
	z-index:1;
}
#Layer3 {
	position:absolute;
	left:268px;
	top:428px;
	width:245px;
	height:101px;
	z-index:2;
}
#Layer5 {
	position:absolute;
	left:200px;
	top:669px;
	width:277px;
	height:108px;
	z-index:3;
}
#Layer6 {
	position:absolute;
	left:762px;
	top:565px;
	width:232px;
	height:227px;
	z-index:4;
}
#Layer7 {
	position:absolute;
	left:324px;
	top:368px;
	width:186px;
	height:170px;
	z-index:5;
}
#Layer8 {
	position:absolute;
	left:347px;
	top:803px;
	width:175px;
	height:195px;
	z-index:5;
	}
-->
</style>
</head>
<?php
include("../includes/session.php");
	
?>
<body>



<!--<div id="Layer6"><img src="../images/sched.JPG" alt="a" width="195" height="165" border="0" /></div>
<div id="Layer7"><img src="../images/dev/4.JPG" alt="a" width="195" height="165" border="0" /></div>
<div id="Layer8"><img src="../images/dev/brom.JPG" alt="a" height="206" /></div>-->

<div id="layer8"></div>
<div id="container">
  <div id="header"><img src="../images/logo copy.jpg" alt="s" width="717" height="160" />
    <div id="logo_w2"></div>
    <ul class="cssMenu cssMenum">
	<li class=" cssMenui"><a class="  cssMenui" href="index.php"><img src="../images/homepage.gif" border="0" />Home</a></li>
	<li class=" cssMenui"><a class="  cssMenui" href="#"><span>View</span><![if gt IE 6]></a><![endif]><!--[if lte IE 6]><table><tr><td><![endif]-->
	<ul class=" cssMenum">
		<li class=" cssMenui"><a class="  cssMenui" href="search_teacher.php"><img src="../images/User (1).ico" />Faculty Schedule</a></li>
		<!--<li class=" cssMenui"><a class="  cssMenui" href="search_course.php"><img src="../images/user-group.ico" /> Student Schedule</a></li>
		<li class=" cssMenui"><a class="  cssMenui" href="search_room.php"><img src="../images/school-icon.png" />Room Schedule</a></li>-->
	</ul>
	<!--[if lte IE 6]></td></tr></table></a><![endif]--></li>
	<!--<li class=" cssMenui"><a class="  cssMenui" href="#"><span>Add entry</span><![if gt IE 6]></a><![endif]><!--[if lte IE 6]><table><tr><td><![endif]-->
	<ul class=" cssMenum">
		<li class=" cssMenui"><a class="  cssMenui" href="faculty-educ.php"><span><img src="../images/User (1).ico" />Teacher</span><![if gt IE 6]></a><![endif]><!--[if lte IE 6]><table><tr><td><![endif]-->
		<ul class=" cssMenum">
			<li class=" cssMenui"><a class="  cssMenui" href="faculty-educ.php"><img src="../images/folder-new.ico" />Add</a></li>
			<li class=" cssMenui"><a class="  cssMenui" href="facultylist-educ.php"><img src="../images/folder.ico" />View</a></li>
		</ul>
		<!--[if lte IE 6]></td></tr></table></a><![endif]--></li>
		<li class=" cssMenui"><a class="  cssMenui" href="student-educ.php"><span><img src="../images/courses.JPG" />Course</span><![if gt IE 6]></a><![endif]><!--[if lte IE 6]><table><tr><td><![endif]-->
		<ul class=" cssMenum">
			<li class=" cssMenui"><a class="  cssMenui" href="student-educ.php"><img src="../images/folder-new.ico" />Add</a></li>
			<li class=" cssMenui"><a class="  cssMenui" href="student-list-educ.php"><img src="../images/folder.ico" />View</a></li>
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
	<li class=" cssMenui"><a class="  cssMenui" href="help.php">Help</a></li>

	<li class=" cssMenui"><a class="  cssMenui" href="logout.php">Log out</a></li>
</ul>

  </div>
	<div id="content">
	    <div align="center">
	    	<br />
	    	<p><strong>About the Developers </strong><br /></p>
            <p>We are the Students of IIT Jodhpur who developed the Online Scheduling System.</p>
            <br />
            <p align="center"><strong>Ayush Agrawal</strong></p>
            <p align="center">B14CS010</p>
            <p align="center">Email: agrawal.1@iitj.ac.in </p>
            <br />
            <p align="center"><strong>Akshay Chaudhari</strong></p>
            <p align="center">B14CS013</p>
            <p align="center">Email: gajanan.1@iitj.ac.in </p>
            <br />
            <p align="center"><strong>Ganesh Patil</strong></p>
            <p align="center">B14CS017</p>
            <p align="center">Email:patil.1@iitj.ac.in </p>
            <br />
            <p align="center"><strong>Varun Kumar</strong></p>
            <p align="center">B14CS039</p>
            <p align="center">Email:kumar.2@iitj.ac.in </p>
            <br />
        </div>
		<div id="footerline">
		 <!-- <p align="center"><span class="style4"><a href="help.php">Help</a> | <a href="about_dev.php">Developer</a>| <a href="about_sched.php">Scheduling System</a>| <a href="contact.html">Contact Us</a>| <a href="www.chmsc.edu.ph">CHMSC </a></span></p>-->	  </div>
	</div>
	
	<div id="footer">Four Dark Riders </div>	
</div>
</body>
</html>

