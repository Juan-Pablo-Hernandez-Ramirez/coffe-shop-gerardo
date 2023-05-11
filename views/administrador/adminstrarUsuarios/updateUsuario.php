<?php 
    //hacemos una conexion a la bd
    $con = mysqli_connect("localhost","id20540950_eltioessus","R^oY=SP33fs?Yr~9","id20540950_coffeeshop"); 
    

    //variable id
    $id = $_REQUEST['id'];

    //definimos todas las variables necesarias
    $email = $_POST['email'];
    $passwor = $_POST['password'];
    $password = base64_encode($passwor);
    $nombre = $_POST['nombre'];
    $apPaterno = $_POST['apPaterno'];
    $apMaterno = $_POST['apMaterno'];
    $fechaNacimiento = $_POST['fechaNacimiento'];
    $continente_id = $_POST['continente_id'];
    $pais_id = $_POST['pais_id'];
    $ciudad_id = $_POST['ciudad_id'];
    $telefono = $_POST['telefono'];
    $rol = $_POST['rol'];

    //hacemos un update que es para modificar datos con todos los datos
    $query = "UPDATE users SET email='$email', password='$password', nombre='$nombre', apPaterno='$apPaterno', apMaterno='$apMaterno', fechaNacimiento='$fechaNacimiento',continente_id='$continente_id', pais_id='$pais_id',ciudad_id='$ciudad_id', telefono='$telefono',rol='$rol'
    WHERE id = $id";
    //se ejecuta
    $resulatdo = $con->query($query);

    //si se edito correctamente te llevara a la tabla de usuario
    if($resulatdo){
        header('location: ../../../views/administrador/adminstrarUsuarios/visualizarUsuario.php');
    }else{
        //si no hay error
        echo $con->error;
    }

    

?>