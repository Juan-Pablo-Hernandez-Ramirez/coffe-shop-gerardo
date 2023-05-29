<?php

session_start();//se activa la sesion


if(isset($_SESSION['rol'])){

if($_SESSION['rol'] == "U"){
    header('Location: ./views/usuario/menu.php');
}else if ($_SESSION['rol'] == "A"){
    header('Location: ../../views/administrador/paginaPrincipal.php');
}else if ($_SESSION['rol'] == "P"){
    header('Location: ../../views/personal/paginaPersonal.php');
}else{
 $aes = 'A la espera de la solicitud';
}}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/styles/style.css?uuid=<?php echo uniqid();?>">
    <link rel="stylesheet" href="../assets/styles/spacing.css?uuid=<?php echo uniqid();?>">
    <title>Principal</title>
</head>

<nav>
  <ul class="choose-color">
    <li><a href="./views/identificacion/login.php">Login</a></li>
  </ul>
</nav>

<body class="home-background">
  <tbody class="align-x w-2 cmy-6 pt-5">
    <td class="cp-5 ta-c pt-5" id="data-content">
      <img class="align-x" src="./assets/images/logo/logo-home.jpg" alt="">
      <h2>
        ¡Bienvenido a Coffee Shop!
      </h2>
    </td>
    <td class="cp-5 ta-c pt-5" id="data-content">
      <h2>
        <?php
        if(isset($aes)){
            echo $aes;
        }
        ?>
      </h2>
    </td>
  </tbody>
</body>
</html>