<?php session_start(); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Login Page</title>
<style type="text/css">
<!--
#Layer1 {
	position:absolute;
	width:372px;
	height:48px;
	z-index:1;
	left: 309px;
	top: 31px;
}
.style2 {
	font-size: 50px;
	font-family: "Courier New", Courier, monospace;
}
#Layer2 {
	position:absolute;
	width:243px;
	height:56px;
	z-index:1;
	left: -24px;
	top: 342px;
}
#Layer3 {
	position:absolute;
	width:372px;
	height:53px;
	z-index:2;
	left: 311px;
	top: 50px;
}
#Layer4 {
	position:absolute;
	width:394px;
	height:40px;
	z-index:3;
	left: 394px;
	top: 867px;
}
.style3 {font-size: 25px}
#Layer5 {
	position:absolute;
	width:314px;
	height:50px;
	z-index:4;
	left: 17px;
	top: 151px;
}
#Layer6 {
	position:absolute;
	width:484px;
	height:100px;
	z-index:5;
	left: 244px;
	top: 195px;
}
#Layer7 {
	position:absolute;
	width:300px;
	height:110px;
	z-index:5;
	left: 298px;
	top: 182px;
}
-->
</style>
</head>

<body bgcolor="#66FFFF">
 <?php
// ******************************************
// **  Copyright POGS 2008                 **
// **  pogsnet@gmail.com ym:pogsnet        **
// ******************************************
// httP://pogs.host.sk
  require ("includes/dbconnection.php");
$error = "";


if (isset($_GET["action"]) && ($_GET["action"] == "login")) {

$user_id = $_POST['username'];
$password = $_POST['pass'];


if (empty($user_id)) { $error = "Error: No userid entered"; }
if (empty($password)) { $error = "Error: No password"; }

if (empty($error) ) {
$query = "SELECT username, userpass FROM user WHERE username='$user_id' AND userpass='$password'";
$result =  @mysql_query($query) or die('Error, insert query failed');
//if (empty($result)) { $error = "User not found!"; }
$row = mysql_fetch_array ($result, MYSQL_NUM);
}
if (!$row) { $error = "UserID and Password did not match or not found in the database"; }
if ($row) { 

		session_register('is');
		$_SESSION['is']['login']    = TRUE;
		$_SESSION['is']['user_id'] = $_POST['user_id'];
	$session = "1";	

require('education/educ_main.php'); exit; }





}
?>
</p>
<p>
  
  
</p>
<p>
  
	
<div id="Layer7">
  <form id="form1" name="form1" method="post" action="login.php?action=login">
    <label>
    <div align="center"><strong>LOG-IN</strong><br />
      <br />
    User ID: 
    <input name="user_id" type="text" id="user_id" />
    <br />
    <p>Password:
      <input name="password" type="password" id="password" />
    </p>
    <p align="center">
      <input type="submit" name="Submit" value="Submit" /> 
      <a href="signup.php">Register</a></p>
    </div>
    </label>
    <p>&nbsp;</p>
  </form>
</div>

<p class="style3">&nbsp;</p>
<div id="Layer3">
  <div id="layer">
    <div id="layer2"></div>
    <div align="center"><span class="style2">SuperFriend</span></div>
  </div>
</div>
<p>&nbsp;</p>
<p align="center">&nbsp;</p>
<p>&nbsp;</p>
<div id="Layer5"><?php echo $error; ?></div>
<p><a href="login.php"></a></p>
<p>&nbsp;</p>
<p align="center"><a href="sign_up1.php"></a></p>
</body>
</html>
