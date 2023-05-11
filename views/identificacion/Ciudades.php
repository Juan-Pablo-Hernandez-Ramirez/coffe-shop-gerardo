<?php
//LLama la coneccion principal
include "../../controllers/conexiones/conexionMain.php";
$db=connects();
//Selecciona el municipio depende el estado
$query=$db->query("SELECT m.id,m.municipio FROM municipios m LEFT JOIN estados_municipios em ON m.id = em.municipios_id WHERE em.estados_id=$_GET[pais_id]");
$states = array();
//Muestra una lista de los municipios depende el estado
while($r=$query->fetch_object()){ $states[]=$r; }
if(count($states)>0){
print "<option value='null'>-- SELECCIONE --</option>";
foreach ($states as $s) {
	// Muestra municipios
	print "<option value='$s->id'>$s->municipio</option>";
}
}else{
	//Muestra este mensaje si no hay municipios en la base de datos y/o en el estado
print "<option value=''>-- NO HAY DATOS --</option>";
}
?>