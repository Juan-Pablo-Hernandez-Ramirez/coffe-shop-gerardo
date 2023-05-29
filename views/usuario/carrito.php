<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../../assets/styles/spacing.css">
    <link rel="stylesheet" href="../../assets/styles/style.css">
    <title> Menu </title>
</head>
<body>
<?php
include_once "funciones.php";


$productos = obtenerProductosEnCarrito();
?>
<ul class="choose-color">
        <li><a href="./menu.php">Volver</a></li>
    </ul>

    <div class="container w-10 align-x">
    <h1 class="ta-l" style="float:left"> Carro de Compras </h1>
    
    
        <table cellpadding="10" class="container align-x w-10">
            <thead>
                <tr>
                    <!-- Se crean 3 columnas dentro de una fila -->
                    <th style="width: 18%; height: 50px;"> Nombre </th>
                    <th style="width: 18%; height: 50px;"> Descripcion </th>
                    <th style="width: 18%; height: 50px;"> Cantidad </th>
                    <th style="width: 18%; height: 50px;"> Precio </th>
                    <th style="width: 18%; height: 50px;"> Aregar </th>
                    <th style="width: 18%; height: 50px;"> Borrar </th>
                </tr>
            </thead>
    
    
    
            <tbody>
    
            <?php
                    $total = 0;
                    foreach ($productos as $producto) {
                        $multiplicacion = $producto[3] * $producto[4];
                        $total += $multiplicacion ;
                    ?>
    
                    <tr>
                       <td><?php echo $producto[1] ?></td>
                        <td><?php echo $producto[2] ?></td>
                        <td><?php echo $producto[4] ?></td>
                        <td>$<?php echo number_format($multiplicacion, 2) ?></td>
                        
                        <td>
                            <form action="./agrega.php" method="post">
                                <input type="hidden" name="id_pro" value="<?php echo $producto[5]?>">
                                <button class="edit-button fs-3">  +  </button>
                            </form>
                        </td>
                        <td>
                            <form action="./eliminar.php" method="post">
                                <input type="hidden" name="id" value="<?php echo $producto[0]?>">
                                <button type="submit" value="Borrar" class="delete-button fs-3"> Borrar </button>
                            </form>
                            
                        </td>
                    </tr>
    
    
    
                <?php
                }
                ?>
    
            </tbody>
            <tfoot>
                    <tr>
                        <td colspan="3" ><strong>Total</strong></td>
                        <td colspan="2" >
                            $<?php echo number_format($total, 2) ?>
                        </td>
                        <td>
                            <form action="crearhistorial.php">
                            <button type="submit" value="Comprar" name="Comprar" class="edit-button fs-3"> Comprar </button>
                            </form>
                        </td>
                    </tr>
                </tfoot>
        </table>
    
    </div>

</body>
</html>