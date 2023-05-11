<?php
//conecta a conexion.php
include "../Controllers/Conexion.php";
$db=connects();
// se conecta a la base de datos de estados
$query=$db->query("select * from estados");
$states = array();
//Variable que permite seleccionar cada
while($r=$query->fetch_object()){ $states[]=$r; }
if(count($states)>0){
print "<option value=''>-- SELECCIONE --</option>";
foreach ($states as $s) {
	print "<option value='$s->id'>$s->estado</option>";
}
}else{
print "<option value=''>-- NO HAY DATOS --</option>";
}
?>

