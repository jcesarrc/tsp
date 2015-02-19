<?php  
header('Content-Type: application/json');

include "configme.php";
global $res;
$data = file_get_contents('php://input');
$obj = json_decode($data);

$sql = "select * from transaction where idtransaction = ".$obj->token;
$count=0;
$result = mysql_query($sql, $res);
	if ($row = mysql_fetch_assoc($result)) {
		$count++;
		$valor = number_format($row['amount']);
		$hora = $row['creation_date'];
		$id_merchant = $row['id_merchant'];
	}
mysql_free_result($result);


if($count==0) {
$r = array('codigo'=>'NO');
} else{
	$sql = "select * from merchant where idmerchant = ".$id_merchant;
	$result1 = mysql_query($sql, $res);
	if ($row = mysql_fetch_assoc($result1)) {
		$nombre = $row['name'];
	}
mysql_free_result($result1);

$r = array('codigo'=>'OK','valor'=>$valor,'nombre'=>$nombre);
}

echo json_encode($r);
?>