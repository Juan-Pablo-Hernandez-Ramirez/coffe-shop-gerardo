<?php
//llamamos a la conexion con la base de datos
include "connee.php";


//esto funciona para hacer una validacion del registro
if (isset($_POST['registrar'])) {
    if (strlen($_POST['nombre']) >= 1 && strlen($_POST['email']) >= 1) {
        //definimos variables
        $name = trim($_POST['nombre']);
	    $email = trim($_POST['email']);
        $numero = trim($_POST['telefono']);
        $appa = trim($_POST['apPaterno']);
        $amma = trim($_POST['apMaterno']);
        $fechan = trim($_POST['fechaNacimiento']);
        $pais = trim($_POST['continente_id']);
        $estado = trim($_POST['pais_id']);
        $municipio = trim($_POST['ciudad_id']);
        $passwor = trim($_POST['password']);
        $password = base64_encode($passwor);
        $rol=trim($_POST['rol']);
        $_SESSION['email']=$email;
        
        //hacemos un insert de datos que se pusieron al registrarse
	    $consulta = "INSERT INTO users (`email`, `password`, `nombre`, `apPaterno`, `apMaterno`, `fechaNacimiento`, `continente_id`, `pais_id`, `ciudad_id`, `telefono`, `rol`,`status`) 
        VALUES ('$email','$password','$name','$appa','$amma','$fechan','$pais','$estado','$municipio','$numero','$rol','1')";


        $consulta1 = mysqli_query($conex, "SELECT * FROM users  WHERE email='$email'");


        if(mysqli_num_rows($consulta1)>0){
            echo "El correo ingresado se repite por favor ingresa otro";
            exit();
        }


        
        //ponemos que el resulatdo es con la conexion y el insert
	    $resultado = mysqli_query($conex,$consulta);
	    //si los datos se insertaron correctamente 
	    if ($resultado) {
	    	?> 
	    	<h3 class="ok">¡Te has inscripto correctamente!</h3>
           <?php
           
           }
           //si existe un error
           else {
               echo $conex->error
	    	?> 
	    	<h3 class="bad">¡Ups ha ocurrido un error!</h3>
           <?php
	    }
    }   else {
        //si el usuario no ha completado todos los campos
	    	?> 
	    	<h3 class="bad">¡Por favor complete los campos!</h3>
           <?php
    
}}

?>