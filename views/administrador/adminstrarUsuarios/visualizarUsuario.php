<?php
$conexion = mysqli_connect('localhost', 'id20540950_eltioessus', 'R^oY=SP33fs?Yr~9', 'id20540950_coffeeshop');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=}, initial-scale=1.0">
    <link rel="stylesheet" href="../../../assets/styles/style.css?uuid=<?php echo uniqid();?>">
    <link rel="stylesheet" href="../../../assets/styles/spacing.css?uuid=<?php echo uniqid();?>">
    <title> Usuarios </title>
</head>

<nav>
  <ul class="choose-color">
    <li><a href="../../administrador/paginaPrincipal.php">Volver</a></li>
    <li><a href="../administrarMenu/visualizarProductos.php">Articulos</a></li>
  </ul>
</nav>


<body>
    
    <div class="container w-10 align-x">
    <h1 class="ta-l" style="float:left"> Gestion de usuarios </h1>
    
    
        <table cellpadding="10" class="container align-x w-10">
            <thead>
                <tr>
                    <!-- Se crean 3 columnas dentro de una fila -->
                    <th style="width: 18%; height: 50px;"> Nombre </th>
                    <th style="width: 18%; height: 50px;"> Apellido Paterno </th>
                    <th style="width: 18%; height: 50px;"> Telefono </th>
                    <th style="width: 18%; height: 50px;"> Rol </th>
                    <th style="width:  8%; height: 50px;"> Editar </th>
                    <th style="width:  8%; height: 50px;"> borrar </th>
    
                </tr>
            </thead>
    
    
    
            <tbody>
    
                <?php
                $sql = "SELECT * FROM users";
                $result = mysqli_query($conexion, $sql);
    
                while ($mostrar = mysqli_fetch_array($result)) {
                ?>
    
                    <tr>
                       <td><?php echo $mostrar['nombre'] ?></td>
                        <td><?php echo $mostrar['apPaterno'] ?></td>
                        <td><?php echo $mostrar['telefono'] ?></td>
                        <td><?php echo $mostrar['rol'] ?></td>
                        
                        <td>
                            <form action="./editaUsuario.php" method="post">
                                <input type="hidden" name="id" value="<?php echo $mostrar['id'] ?>">
                                <button type="submit" value="Editar" class="edit-button fs-3"> Editar </button>
                            </form>
                            <input id="descuento" type="num" name="Descuento" placeholder="0-100" id="Des" minlength="0" maxlength="100" pattern="[0-9]*">
                        </td>
    
                        <td>
                            <form action="./borrarUsuario.php" method="post">
                                <input type="hidden" name="id" value="<?php echo $mostrar['id'] ?>">
                                <button type="submit" value="Borrar" class="delete-button fs-3"> Borrar </button>
                            </form>
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