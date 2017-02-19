<?php
   session_start();
   echo 'You have been logged out!!';
   header('Refresh: 2; URL = ../index.php');
?>