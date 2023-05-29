<?php

    //la validacion para el login
    
    
    
    //hacemos una conexion con la base de datos
    $conexion = mysqli_connect("localhost","id20540950_eltioessus","R^oY=SP33fs?Yr~9","id20540950_coffeeshop"); 
    $email=$_POST['email'];
    //se encripta la contraseña
    
    session_start();//se activa la sesion
    

    //hacemos una consulta con la base de datos
    $consulta="SELECT*FROM users where email='$email'";

    //hacemos un resulatdo con la conexion y la consulta
    $resultado=mysqli_query($conexion,$consulta);


    //una variable que  devuelve simplemente el número delíneas de un resultado
    $filas=mysqli_num_rows($resultado);

    //una condicion para los roles 
    
    if($filas){
        while($rowData = mysqli_fetch_array($resultado)){
            //la sesion se va a activar por el email
            $_SESSION['id'] = $rowData['id'];
            $_SESSION['email']=$rowData['nombre'];
            $_SESSION['rol']=$rowData['rol'];
}
      //si el rol es de usuario entonces te llevara a la pagina de usuarios
    if($_SESSION['rol'] == "U"){
        header('Location: ../../views/usuario/menu.php');
    }else if($_SESSION['rol'] == "P"){
        header('Location: ../../views/personal/paginaPersonal.php');
    }else{
        //si el rol es de administrador entonces te llevara a la pagina de de administrador
        header('Location: ../../views/administrador/paginaPrincipal.php');
    }
       
    }else{
        //si los datos ingresados no son iguales a los de la base de datos entonces no te dejara entrar
        ?>
        <?php
        include('./login.php');
        ?>
        <h3>Usuario y/o Contraseña incorrectos</h3>
        <?php
    }




   
    //cerramos la base de datos
    mysqli_free_result($resultado);
    mysqli_close($conexion);

   

?>