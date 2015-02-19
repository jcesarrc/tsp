<?php
	require_once(dirname(__FILE__).'/connector/db_mysqli.php');
	
	$dbtype = "MySQL";
	$res = mysql_connect("localhost", "root", "");
	mysql_select_db("tsp");
	return $res;
	
?>