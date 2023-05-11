<?php
    //se hace una conexion a la base de datos por medio de mysqli_connect
    $conexi = mysqli_connect("localhost","id20540950_eltioessus","R^oY=SP33fs?Yr~9","id20540950_coffeeshop"); 

    //declaramos todas las variables para el alta de usuario y las declaramos como $_post que es para recibir los datos
    $expresion = "/   ?/i";
    $expass = "/[1? 2? 3? 4? 5? 6? 7? 8? 9? 0? $? #? &? :? ;? ,? .? !? ]/";
    
    
    $email = $_POST['email'];
    $passwor=$_POST['password'];
    //se encripta la contraseña
    $password=base64_encode($passwor);
    $nombre = $_POST['nombre'];
    $apPaterno = $_POST['apPaterno'];
    $apMaterno = $_POST['apMaterno'];
    $fechaNacimiento = $_POST['fechaNacimiento'];
    $continente_id = $_POST['continente_id'];
    $pais_id = $_POST['pais_id'];
    $ciudad_id = $_POST['ciudad_id'];
    $telefono = $_POST['telefono'];
    $rol = $_POST['rol'];
    
    if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        header("location: ../../views/administrador/adminstrarUsuarios/altaeror.php");
            return false;

        }
        //validacion para la contraseña
    if(!preg_match($expass,$password)){
        header("location: ../../views/administrador/adminstrarUsuarios/altaerror.php");
            return false;
            }
    
    //aqui se insertan los datos en la base de datos para eso es el INSERT en la tabla users
    $insertar = "INSERT INTO users (email,password, nombre, apPaterno, apMaterno, fechaNacimiento, continente_id, pais_id, ciudad_id, telefono, rol, status)VALUES 
    ('$email', '$password', '$nombre', '$apPaterno', '$apMaterno', '$fechaNacimiento', '$continente_id', '$pais_id', '$ciudad_id', '$telefono', '$rol','1' )";
    $ejecutar = mysqli_query($conexi, $insertar);

    //una condicion que si los datos se insertaron correctamente te lleve a la pagina de visualizar usuarios.
    if($ejecutar){
        header("location: ../../views/administrador/adminstrarUsuarios/visualizarUsuario.php");
    }else{
        //si no te aparezca que no se pudieron insertar
        echo("No se pudieron insertar los datos");
    }
    

    
    
?>