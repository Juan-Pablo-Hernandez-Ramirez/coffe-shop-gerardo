<?php
//una conexion para usuarios
//aqui llamamos a la conexion de PDO
    require('../../controllers/conexiones/conexionme.php');

//preparamos un insert a la base de datos
    $response = $connection->prepare("INSERT INTO users(email, 'password', nombre, apPaterno, apMaterno, fechaNacimiento, continente_id, pais_id, ciudad_id, telefono, rol, 'status')values(:email, :pass, :pat, :mat, :'date', :con, :pai, :ciu, :tel, :rol, :sta)");

    
    //se vincula la variable al parametro para que se ejecute
    $response->bindParam(':email', $_POST['email']);
    $response->bindParam(':pass', $_POST['password']);
    $response->bindParam(':pat', $_POST['nombre']);
    $response->bindParam(':mat', $_POST['apPaterno']);
    $response->bindParam(':date', $_POST['apMaterno']);
    $response->bindParam(':con', $_POST['fechaNacimiento']);
    $response->bindParam(':pai', $_POST['continente_id']);
    $response->bindParam(':ciu', $_POST['pais_id']);
    $response->bindParam(':tel', $_POST['ciudad_id']);
    $response->bindParam(':rol', $_POST['rol']);
    $response->bindParam(':sta', $_POST['status']);
    
    //ejecutamos
    $response->execute();

//hacemos una condicion que es si todo se inserto correcto entonces nos va a llevar a la tabla de usuarios
    if($response){
        header("Location: ../../views/administrarMenu/visualizarProductos.php");
       //si no le escribimos que no se pudieron insertar los datos
    }else{
        echo("no se pudieron insertar los datos correctamente");
    }
    
    
?>