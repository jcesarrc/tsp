<?php

require_once(dirname(__FILE__).'/config.php');

function auth_customer($key){
	global $res;
	$sql = "select * from customer where imei = '".$key."'";
	$count = 0;
	$result = mysql_query($sql, $res);
	while ($row = mysql_fetch_assoc($result)) {
		$count++;
	}
	mysql_free_result($result);
	return $count!=0;
}


function auth_merchant($key){
	global $res;
	$sql = "select * from merchant where imei = '".$key."'";
	$count = 0;
	$result = mysql_query($sql, $res);
	while ($row = mysql_fetch_assoc($result)) {
		$count++;
	}
	mysql_free_result($result);
	return $count!=0;

}


function auth_vmerchant($key){
	global $res;
	$sql = "select * from vmerchant where api_key = '".$key."'";
	$count = 0;
	$result = mysql_query($sql, $res);
	while ($row = mysql_fetch_assoc($result)) {
		$v = $row['api_key'];
		$count++;
	}
	mysql_free_result($result);
	return $count!=0;

}

?>