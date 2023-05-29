<?php
    session_start();
    if(isset($_SESSION['email'])){
?>


<?php
$conexion = mysqli_connect('localhost', 'id20540950_eltioessus', 'R^oY=SP33fs?Yr~9', 'id20540950_coffeeshop');
?>




<!DOCTYPE html>
<html lang="en" class="visualizarProductos">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=}, initial-scale=1.0">
    <link rel="stylesheet" href="../../../assets/styles/style.css?uuid=<?php echo uniqid();?>">
    <link rel="stylesheet" href="../../../assets/styles/spacing.css?uuid=<?php echo uniqid();?>">
    <title> Gestion de productos </title>
</head>

<nav>
  <ul class="choose-color">
    <li><a href="../../administrador/paginaPrincipal.php">Volver</a></li>
    <li><a href="../../administrador/adminstrarUsuarios/visualizarUsuario.php">Usuarios</a></li>
  </ul>
</nav>

<body>



    <div class="container w-10 align-x">
        <h1 class="ta-l" style="float:left"> Gestión de productos </h1>

       <button style="float:right" class="cp-2">
            <a class="add-button w-1 fs-3" id="./agregarArticulos.php" href="./cargaProductos.php">Importar productos</a>
        </button>
        
        <button style="float:right" class="cp-2">
            <a class="add-button w-1 fs-3" href="./altaProductos.php">Alta</a>
        </button>
        
        <table cellpadding="10" class="container align-x w-10">
            <thead>
                <tr>
                    <!-- Se crean 3 columnas dentro de una fila -->
                    <th style="width: 24%; height: 50px;">Nombre</th>
                    <th style="width: 24%; height: 50px;">Precio</th>
                    <th style="width: 24%; height: 50px;">Existencia</th>
                    <th style="width:  8%; height: 50px;">Editar </th>
                    <th style="width:  8%; height: 50px;">Borrar </th>
                    <th style="width:  8%; height: 50px;">Descuento </th>

    
                </tr>
            </thead>
    
    
    
            <tbody>
    
                <?php
                $sql = "SELECT * FROM articulos";
                $result = mysqli_query($conexion, $sql);
    
                while ($mostrar = mysqli_fetch_array($result)) {
                ?>
    
                    <tr class="product">    
                        <td><?php echo $mostrar['nombre'] ?></td>
                        <td><?php echo $mostrar['precio'] ?></td>
                        <td><?php echo $mostrar['existencia'] ?></td>
                        
                        <td>
                            <form action="./editaProductos.php" method="post">
                            <input id="input-edita-usuario" type="hidden" name="id" value="<?php echo $mostrar['Id_art'] ?>">
                                <button class="edit-button fs-3"> Editar </button>
                            </form>
                        </td>
    
                        
                        
                        <td>
                            <form action="./borrarProductos.php" method="post">

                                <input id="input-edita-usuario" type="hidden" name="id" value="<?php echo $mostrar['Id_art'] ?>">
                                <button class="delete-button fs-3"> Borrar </button>
                            </form>
                        </td>
                        <td>
                            <form action="./upDescuento.php" method="post">
                                <button class="edit-button fs-3"> Descuento </button>
                            </form>
                            <input id="descuento" type="num" name="Descuento" placeholder="0-100" id="Des" minlength="0" maxlength="100" pattern="[0-9]*">
                        </td>
                    </tr>
    
    
    
                <?php
                }
                ?>
    
            </tbody>
        </table>
    

    </div>
    

</body>

</html>

<?php  
    }else{
        header('location: ../../../index.php');
    }
?>