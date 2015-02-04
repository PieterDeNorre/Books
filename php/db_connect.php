<?php
$connect=mysql_connect($dbhost,$dbuser,$dbpass) or die("Error connecting to Database!");
mysql_select_db($database,$connect) or die("Cannot select database!");
?>
