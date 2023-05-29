<?php

session_start();//se activa la sesion


if(isset($_SESSION['rol'])){

if($_SESSION['rol'] == "U"){
    header('Location: ./usuario/menu.php');
}else if ($_SESSION['rol'] == "A"){
    header('Location: ./administrador/paginaPrincipal.php');
}else if ($_SESSION['rol'] == "P"){
    header('Location: ./personal/paginaPersonal.php');
}
}else{
    header('Location: ../index.php');
}

?>