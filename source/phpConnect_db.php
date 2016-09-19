<?php  
	$host="localhost";
	$user="root";
	$pass="1234";
	$db="myjoinway";
	$connect = mysql_connect($host,$user,$pass);
	mysql_select_db($db) ;
	mysql_db_query($db,"SET NAMES 'utf8'");
	mysql_query("SET NAMES 'utf8'");
?>