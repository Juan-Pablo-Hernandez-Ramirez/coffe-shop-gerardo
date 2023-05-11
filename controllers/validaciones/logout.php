<?php
//el cerrar sesion
//sesion start es para tener la cuenta activa
    session_start();
    
    //si cerramos la sesion entonces nos va a llevar al login
    if(session_destroy()){
        header('location: ../../index.php');
    }else{
        echo "No se pudo cerrar sesion";//si no se pudo cerrar entonces le ponemos que no
    }
?>