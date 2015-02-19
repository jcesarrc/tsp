<?php  include "configme.php";

global $res;
$data = file_get_contents('php://input');
$obj = json_decode($data);


$merchant = $obj->imei;
$customer = 0;
$val = $obj->valor;

$sql = "INSERT INTO transaction (amount, state, id_merchant, id_customer) VALUES ('$val','1','$merchant','$customer')" ;
mysql_query($sql);

$sql = "select * from transaction ORDER BY idtransaction DESC ";
$c = 0;
$result = mysql_query($sql, $res);
	if ($row = mysql_fetch_assoc($result)) {
		$c = $row['idtransaction'];
	}
	mysql_free_result($result);

echo $c;

?>