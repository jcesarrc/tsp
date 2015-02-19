<?php  include "configme.php";
global $res;
$data = file_get_contents('php://input');
$obj = json_decode($data);

$file = 'people.txt';
$sql = "INSERT INTO merchant (email, name, lastname, birth_day, birth_month, birth_year, country, city, state, address, po, telephone, imei, credit_card_number) VALUES ('$obj->email', '$obj->nombre', '$obj->apellido', '$obj->dia', '$obj->mes', '$obj->ano', '', '', '', '$obj->direccion', '$obj->postal', '$obj->telefono', '$obj->IMEI', '87063333313132')" ;
file_put_contents($file, $sql);

mysql_query($sql);
echo "OK";

	

?>