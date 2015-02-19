<?php

require_once('config.php');

function beginTransaction($id_merchant,$amount,$order_id=0){
	global $res;
	$sql = "INSERT INTO transaction (amount, state, id_merchant, id_customer, order_id) VALUES ('$amount','1','$id_merchant','0','$order_id')" ;
	mysql_query($sql);
	$sql = "select * from transaction ORDER BY idtransaction DESC ";
	$id_transaction = 0;
	$result = mysql_query($sql, $res);
		if ($row = mysql_fetch_assoc($result)) {
			$c = $row['idtransaction'];
		}
	mysql_free_result($result);
	return $id_transaction;
	
}

function updateTransaction($id_transaction, $id_customer){
	global $res;
	$sql = "UPDATE transaction SET state = 2, id_customer = ".$id_customer." WHERE idtransaction = ".$id_transaction;
	mysql_query($sql);
	
}

function token2Transaction($token){
	global $res;
	$sql = "select * from transaction";
	$id = 0;
	$result = mysql_query($sql, $res);
		while ($row = mysql_fetch_assoc($result)) {
			$id_merchant = $row['idtransaction'];
			if(hash($id_merchant)==$token){
				$id = $id_merchant;	
				break;
			}
		}
	mysql_free_result($result);
	return $id;

}



?>