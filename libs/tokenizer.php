<?php
require_once('transactions.php');

$TTL = 120; //seconds

function tokenize($id_transaction){
	return hash("md5",$id_transaction);
}

function detokenize($token){
	return token2Transaction($token);
}

function getTransaction($token){
	return queryTransaction(detokenize($token));

}

function isExpired($token){
	$t = getTransaction($token);
	return diff_time() < $TTL;
}

?>