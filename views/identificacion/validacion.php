<?php 

session_start();

$email=$_POST['email'];
$nombre = $_POST['nombre'];
$apellido = $_POST['apellidos']; 

$conexion = mysqli_connect("localhost","id20540950_eltioessus","R^oY=SP33fs?Yr~9","id20540950_coffeeshop"); 
    
$consulta="SELECT * FROM users where email='$email'";

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
if($_SESSION['rol'] == "U"){
        header('Location: ../../views/usuario/menu.php');
    }else if($_SESSION['rol'] == "P"){
        header('Location: ../../views/personal/paginaPersonal.php');
    }else if($_SESSION['rol'] == "A"){
        //si el rol es de administrador entonces te llevara a la pagina de de administrador
        header('Location: ../../views/administrador/paginaPrincipal.php');
    }else{
        header('Location: ../../index.php');
    }
}else{



$domain = explode('@', $email);


?>
<!DOCTYPE html>

<html lang="es">

<head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
</head>
<body>

<script>
     
     function redirect_by_post(purl, pparameters, in_new_tab) {
    pparameters = (typeof pparameters == 'undefined') ? {} : pparameters;
    in_new_tab = (typeof in_new_tab == 'undefined') ? true : in_new_tab;

    var form = document.createElement("form");
    $(form).attr("id", "reg-form").attr("name", "reg-form").attr("action", purl).attr("method", "post").attr("enctype", "multipart/form-data");
    if (in_new_tab) {
        $(form).attr("target", "_blank");
    }
    $.each(pparameters, function(key) {
        $(form).append('<input type="text" name="' + key + '" value="' + this + '" />');
    });
    document.body.appendChild(form);
    form.submit();
    document.body.removeChild(form);

    return false;
}
    
     redirect_by_post('<?php
     if($domain[1] == 'cetis155.edu.mx'){
    echo './registro.php';
}else{
    echo './registroa.php';
}

}
     ?>',{
        emails : '<?php echo $email ?>',
        nombres : '<?php echo $nombre ?>',
        apellidos : '<?php echo $apellido ?>'
    }, false);
 
</script>
</body>