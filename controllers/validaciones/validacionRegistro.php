<?php
//conexion a la base de datos
    $conexion = mysqli_connect("localhost","id20540950_eltioessus","R^oY=SP33fs?Yr~9","id20540950_coffeeshop"); 
    $email=$_POST['email'];
    //se inicia la sesion por el email
    session_start();
    $_SESSION['email']=$email;

//hacemos una consulta a la base de datos
    $consulta="SELECT*FROM users where email='$email'";

    //resulatdo con conexion y la consulta
    $resultado=mysqli_query($conexion,$consulta);

    //variable devuelve simplemente el número delíneas de un resultado
    $filas=mysqli_num_rows($resultado);

    //si se ingresan bien entonces te lleva a la pagina de registro
    if($filas){
       header('location: ../../views/identificacion/registro.php');
    }else{
        //si los datos ingresados no son iguales a los de la base de datos entonces no te dejara entrar
        ?>
        <?php
        include('../../views/identificacion/registro.php');
        ?>
        <h3>Usuario y/o Contraseña incorrectos</h3>
        <?php
    }

 



   
    //cerramos la base de datos
    mysqli_free_result($resultado);
    mysqli_close($conexion);

   

?>