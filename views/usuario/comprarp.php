<?php

session_start();
    $con = mysqli_connect('localhost', 'id20540950_eltioessus', 'R^oY=SP33fs?Yr~9', 'id20540950_coffeeshop');

?>

<?php

if(isset($_GET['id'])){
    $id=$_GET['id'];
    if(isset($_SESSION['rol'])){
            include_once "funciones.php";
            $productos = obtenerProductoscompra($id);
            $bal = QueNoComprenMasDeUnaVez();
     $valor = $bal[0][0];
        
        $total=0;
?>


<?php
function generate_qr_code()
{
    require "phpqrcode/qrlib.php";
    $dir = 'temp/';
    if (!file_exists($dir))
        mkdir($dir);

    $filename = $dir . 'test' . $id . '.png';
    $tamanio = 10;
    $level = 'M';
    $framSize = 1;
    $contenido = 'https://proyectocafeteriaeltio.000webhostapp.com/views/usuario/comprarp.php?id=' . $id;

    QRcode::png($contenido, $filename, $level, $tamanio, $framSize);

    echo '<img src="' . $dir . basename($filename) . '" c    />';
}


?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./../../assets/styles/spacing.css?uuid=<?php echo uniqid(); ?>">
    <link rel="stylesheet" href="./../../assets/styles/style.css?uuid=<?php echo uniqid(); ?>">
    <title>Comprar</title>
</head>

<nav>
    <ul class="choose-color">
        <li><a href="./carrito.php">Regresar al carrito</a></li><!--enlace para llevarte al carrito-->
    </ul>
</nav>


<body>

<div class="container align-x w-5 cmy-5">

<div class="ticket">
    <h2 class="cmb-4"> Detalle de compra </h2>

    <table cellpadding="10" class="container align-x">
        <thead>
            <tr>
                <!-- Se crean 3 columnas dentro de una fila -->
                <th style="width: 18%; height: 50px;"> Producto </th>
                <th style="width: 18%; height: 50px;"> Precio </th>

            </tr>
        </thead>


        <tbody>

        <?php
                    foreach ($productos as $producto) {
                        $total += $producto[2];
                        ?>
                        <tr>
                            <td>
                                <?php echo $producto[1] . '<br>'; ?>
                            </td>

                            
                            <td>
                <?php
                    echo $total ;
                ?>
            </td>
                        </tr>
                        <?php
                    }
                    ?>


        </tbody>
    </table>

    <div class="ta-l cmt-3 cp-2" style="background-color: rgb(240, 240, 240);">
        El total es
        <?php echo $total; ?>
    </div>

    <div class="show-qr-code align-x cm-5">
        <?php generate_qr_code(); ?>
    </div>

    <div class="ta-c cml-1 cmt-3 cp-2" style="background-color: rgb(240, 240, 240);">
                ¡¡Gracias por su compra!!
            </div>


        </div>
    </div>

    <?php
            }else{
                header('Location: ../../index.php');
            }
        }else{
                header('Location: ../../index.php');
            }
    ?>

</body>

</html>

    