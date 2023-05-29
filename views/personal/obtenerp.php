<?php
    session_start();
    if(isset($_SESSION['email'])){
?>


<?php
require('../../controllers/conexiones/conexionme.php');

    $sentencia = $connection->prepare("SELECT c.ticket , a.nombre, a.precio, b.cantidad,d.nombre , c.status FROM articulos a , compras b , tickets c, users d WHERE  a.id_art = b.id_producto AND b.id_compra =c.id_compra AND b.id_usuario = d.id");
    $sentencia->execute();
    $result = $sentencia->fetchAll();
?>

<?php
  $conexio = mysqli_connect("localhost","id20540950_eltioessus","R^oY=SP33fs?Yr~9","id20540950_coffeeshop");
  $consulta="SELECT status FROM tickets";
  $resultado=mysqli_query($conexio,$consulta);
  $rowData = mysqli_fetch_array($resultado);
  $_status=['status'];
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
    <li><a href="./paginaPersonal.php">Volver</a></li>
  </ul>
</nav>

<body>



    <div class="container w-10 align-x">
        <h1 class="ta-l" style="float:left"> Gestión de pedidos </h1>

        
        <table cellpadding="10" class="container align-x w-10">
            <thead>
                <tr>
                    <!-- Se crean 3 columnas dentro de una fila -->
                    <th style="width: 24%; height: 50px;">ticket</th>
                    <th style="width: 24%; height: 50px;">Nombre</th>
                    <th style="width: 24%; height: 50px;">Precio</th>
                    <th style="width:  8%; height: 50px;">cantidad</th>
                    <th style="width: 24%; height: 50px;">total</th>
                    <th style="width:  8%; height: 50px;">usuario</th>
                    <th style="width:  8%; height: 50px;">status </th>

    
                </tr>
            </thead>
    
    
    
            <tbody>
    
                
                
                <?php
    
                foreach ($result as $mostrar) {
                    $total = $mostrar[2] * $mostrar[3];
                    if ($mostrar[5] != 'Entregado'){
                ?>
    
                    <tr class="product">    
                        <td><?php echo $mostrar[0] ?></td>
                        <td><?php echo $mostrar[1] ?></td>
                        <td><?php echo $mostrar[2] ?></td>
                        <td><?php echo $mostrar[3] ?></td>
                        <td><?php echo $total ?></td>
                        <td><?php echo $mostrar[4] ?></td>
                    <form action="./UpdateStatus.php" method="post" enctype="multipart/form-data">
                        <input type="hidden" name="ticket" value='<?php echo $mostrar[0] ?>'>
                        <td><button class="delete-button fs-3" type="submit"><?php echo $mostrar[5]?> </button></td>
                    </form>
                    </tr>
    
    
    
                <?php
                    }
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