<?php
//llamamos a una conexion a la base de datos
include "./Controllers/conexionMain.php";
$db=connects(); //la conectamos

//hacemos la seleccion el municipio 
$query=$db->query("SELECT m.id,m.municipio FROM municipios m LEFT JOIN estados_municipios em ON m.id = em.municipios_id WHERE em.estados_id=1$_GET[estado_id]");
$states = array();
while($r=$query->fetch_object()){ $states[]=$r; }
if(count($states)>0){
print "<option value=''>-- SELECCIONE --</option>";
foreach ($states as $s) {
	print "<option value='$s->id'>$s->municipio</option>";
}
}else{
print "<option value=''>-- NO HAY DATOS --</option>";
}
?>