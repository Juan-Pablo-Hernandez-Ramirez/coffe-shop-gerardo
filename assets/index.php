<?php

session_start();//se activa la sesion


if(isset($_SESSION['rol'])){

if($_SESSION['rol'] == "U"){
    header('Location: ./views/usuario/menu.php');
}else if ($_SESSION['rol'] == "A"){
    header('Location: ./views/administrador/paginaPrincipal.php');
}else if ($_SESSION['rol'] == "P"){
    header('Location: ./views/personal/paginaPersonal.php');
}
}else{
    header('Location: ../index.php');
}

?>