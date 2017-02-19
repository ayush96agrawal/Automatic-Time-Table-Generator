<?php
error_reporting();
//Avoiding Notice error from echoing
error_reporting( error_reporting() & ~E_NOTICE );

if (empty($_SESSION['is']['username'])) {
require('index.php');
exit;
}
$user =  $_SESSION['is']['username'];
if (!$user) { 
require('index.php');
exit;
}
?>