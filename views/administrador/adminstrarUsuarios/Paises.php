<?php
include "../../../controllers/conexiones/conexionMain.php";
$db=connects();
$query=$db->query("select * from estados");
$states = array();
while($r=$query->fetch_object()){ $states[]=$r; }
if(count($states)>0){
print "<option value='null'>-- SELECCIONE --</option>";
foreach ($states as $s) {
	print "<option value='$s->id'>$s->estado</option>";
}
}else{
print "<option value=''>-- NO HAY DATOS --</option>";
}
?>