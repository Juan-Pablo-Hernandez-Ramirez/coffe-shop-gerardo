<?php
//llamamos a la conexion con la base de datos
include "connee.php";


//esto funciona para hacer una validacion del registro
if (isset($_POST['registrar'])) {
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
        $rol=trim($_POST['rol']);
        $_SESSION['email']=$email;
        
        //hacemos un insert de datos que se pusieron al registrarse
	    $consulta = "INSERT INTO users (`email`, `nombre`, `apPaterno`, `apMaterno`, `fechaNacimiento`, `continente_id`, `pais_id`, `ciudad_id`, `telefono`, `rol`,`status`) 
        VALUES ('$email','$name','$appa','$amma','$fechan','$pais','$estado','$municipio','$numero','$rol','1')";


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
        <script>
location.href ='../../views/identificacion/login.php';
</script>
<?php
           
           }
           //si existe un error
           else {
               echo $conex->error
	    	?> 
	    	<h3 class="bad">¡Ups ha ocurrido un error!</h3>
           <?php
	    }
    }

?>