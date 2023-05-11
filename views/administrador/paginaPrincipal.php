<?php
    session_start();
    if(isset($_SESSION['email'])){
        
   
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../../assets/styles/style.css?uuid=<?php echo uniqid();?>">
    <link rel="stylesheet" href="../../../assets/styles/spacing.css?uuid=<?php echo uniqid();?>">
    <title>Administrador</title>
</head>

<nav>
  <ul class="choose-color">
    <li><a href="../../controllers/validaciones/logout.php">Logout</a></li>
  </ul>
</nav>

<body>

    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container w-6 cmt-4 cpx-10 cpy-5 align-x">

        <h2 class="cmb-5">
            ¡Hola
            <?php echo $_SESSION['email'] ?>!¿Que deseas hacer?
             <?php echo $_SESSION['id'] ?>
            
        </h2>
        
        <a class="admin-link" href="../../views/administrador/administrarMenu/visualizarProductos.php">
                <button class="admin-button fs-3">Articulos </button>
            </a>

            <a class="admin-link" href="../../views/administrador/adminstrarUsuarios/visualizarUsuario.php">
                <button class="admin-button fs-3">Usuarios</button>
            </a>

        </div>

    </nav>

</body>
</html>

<?php  
    }else{
        header('location: ../../index.php');
    }
?>