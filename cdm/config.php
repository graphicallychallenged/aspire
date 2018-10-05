<?php
	$hostname = "172.16.0.1";
	$username = "aspiretv";
	$password = "5Wpadh41VDAbDRBL";
	$dbname = "wp_aspiretv";
	$link = mysql_connect($hostname, $username, $password);
	mysql_select_db($dbname) or die("Unknown database!");
?>
