<?php
//conexion a la base de datos por el metodo PDO
    $user = "id20540950_eltioessus";//usuario
    $password = "R^oY=SP33fs?Yr~9";//contraseña
    try{
        //se hace la conexion
        //PDO ATTR_ERRMODE es un reporte de errores
        //PDO::ERRMODE_EXCEPTION señalara el error
        $connection = new PDO('mysql:host=localhost;dbname=id20540950_coffeeshop', $user, $password);
        $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }catch(PDOException $e){

    }

?>
