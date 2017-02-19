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
	left:165px;
	top:671px;
	width:277px;
	height:108px;
	z-index:3;
}
#Layer6 {
	position:absolute;
	left:781px;
	top:565px;
	width:232px;
	height:201px;
	z-index:4;
}
#Layer7 {
	position:absolute;
	left:361px;
	top:368px;
	width:186px;
	height:170px;
	z-index:5;
}
#Layer8 {
	position:absolute;
	left:385px;
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



<div id="Layer6"><img src="../images/dev/may.JPG" /></div>
<div id="Layer7"><img src="../images/dev/4.JPG" alt="a" width="195" height="165" border="0" /></div>
<div id="Layer8"><img src="../images/dev/brom.JPG" alt="a" height="206" /></div>

<div id="layer8"></div>
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
              <div id="Layer2">
                <p align="left"><strong>Melanie Felizardo</strong></p>
				<p align="left">BSIM 4B</p>
				 <p align="left">Email:melay_felizardo@yahoo.com </p>
              </div>
			  <div id="Layer3">
			    <p align="left"><strong>Melanie Porquez</strong></p>
  <p align="left">BSIM 4B</p>
  <p align="left">Email: bibz_porquez@yahoo.com </p>
</div>
<div id="Layer4">
  <p align="right">&nbsp;</p>
  </div>
  <div id="Layer5">
  <p align="right"><strong>May Ann Corugda</strong></p>
  <p align="right">BSIM 4B</p>
  <p align="right">Email: corugda_mayann@yahoo.com </p>
</div>
		      <p><strong>About the Developers </strong><br />
		      </p>
          </form>
            <p>These are the Students of Carlos Hilado Memorial State College who developed the Online Scheduling System.</p>
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
		  <p align="right">&nbsp;</p>
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
		  <p>&nbsp; </p>
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

