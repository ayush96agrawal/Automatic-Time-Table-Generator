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
#Layer1 {
	position:absolute;
	left:110px;
	top:381px;
	width:459px;
	height:103px;
	z-index:1;
}
-->
</style>
</head>
<?php
include("../includes/session.php");
	
?>
<body>

<div id="container">

  <div id="header"><img src="../images/logo copy.jpg" alt="s" width="717" height="160" />
    <div id="logo_w2"></div>
    Home

Search Teacher Schedule

Student Schedule

Room Schedule





Add entry Teacher Add

View





Course Add

View









Schedule

About us Scheduling System

Developer





Help

Log out





  </div>
	<div id="content">
	
	  <div id="left">
		
	    <div align="center">
		    <form action="<?php echo $_SERVER['PHP_SELF']?>" method="post">
              <br />
		      <p><strong>Online Scheduling System for Carlos Hilado  Memorial State College</strong></p>
		      <p>&nbsp;</p>
		      <p align="center">Scheduling  plays an important role in every organization. Through efficient scheduling, an  organization will be able to achieve its goals and objectives on time which  helps a lot in the flow of business.</p>
		      <p><br />
	      </p><div id="Layer1">
	        <p align="justify"><strong>Tools Used: </strong></p>
  <p align="justify">In  developing the system, the developers used Macromedia Dreamweaver for editing  and Php and MySql language. </p>
  <p align="justify"><strong>Functionality of the system:</strong></p>
  <p align="justify">The  system is composed of 6 main forms with submenus. The Home menu is the main  page of the system. The Search Menu consists of three minor links; teacher,  student and room. The Add Entry has seven links; User, Teacher, Course,  Subject, Room and Department, School Year. The Schedule menu has Course, Year  and Section, semester and School Year, Teacher, Room, Day(s), Starting Time and  Ending Time and the Help menu.</p>
  </div>
          </form>
        </div>
	   
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
		  <p>&nbsp;</p>
		  <p>&nbsp;</p>
		  <p>&nbsp;</p>
		  <p>&nbsp;</p>
		  <p>&nbsp;</p>
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

