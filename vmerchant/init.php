<?php
header('content-type: application/json; charset=utf-8');
header("access-control-allow-origin: *");
/*
$api_key    = $_REQUEST['key'];
$order_id   = $_REQUEST['txnid'];
$amount     = $_REQUEST['amount'];
$surl       = $_REQUEST['surl'];
$furl       = $_REQUEST['furl'];
$curl       = $_REQUEST['curl'];
*/

require_once('../libs/auth.php');
require_once('../libs/transactions.php');
require_once('../libs/tokenizer.php');

$data = file_get_contents('php://input');
$obj = json_decode($data);

$r = array();

if(auth_vmerchant($obj->api_key)){
	$r['response']='1';
	$id_transaction = beginTransaction($obj->api_key,$obj->amount,$obj->order_id);
	$token = tokenize($id_transaction);
	$r['token']=$token;
} else{
	$r['response']='0';
}

echo json_encode($r);

?>