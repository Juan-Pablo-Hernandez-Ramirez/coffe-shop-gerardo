<?php
    session_start();
    $con = mysqli_connect('localhost', 'id20540950_eltioessus', 'R^oY=SP33fs?Yr~9', 'id20540950_coffeeshop');

    if(isset($_GET['id'])){
        $id=$_GET['id'];
        if(isset($_SESSION['rol'])){

        include_once "funciones.php";
        $productos = obtenerProductoscompra($id);
$total = 0;

function generate_qr_code($ids)
{
    require "phpqrcode/qrlib.php";
    $dir = 'temp/';
    if (!file_exists($dir))
        mkdir($dir);

    $filename = $dir . 'test' . $ids . '.png';
    $tamanio = 10;
    $level = 'M';
    $framSize = 1;
    $contenido = 'https://proyectocafeteriaeltio.000webhostapp.com/views/usuario/ticket.php?id=' . $ids;

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

<?php if($_SESSION['rol'] != 'P'){ ?>
<nav>
    <ul class="choose-color">
        <li><a href="./menu.php">Regresar al menu</a></li><!--enlace para llevarte al carrito-->
    </ul>
</nav>

<?php
        }else{
            ?>
            <nav>
    <ul class="choose-color">
        <li><a href="../personal/paginaPersonal.php">Regresar al menu de personal</a></li><!--enlace para llevarte al carrito-->
    </ul>
</nav>
<?php } ?>

<body>



    <div class="ticket cp-2 align-x " >
        <h2 class="cmb-4"> Detalle de compra </h2>
        
        <h2 class="cmb-4">Estado: <?php echo $productos[0][5]?></h2>

        <table cellpadding="10" class="align-x">
            <thead>
                <tr>
                    <!-- Se crean 3 columnas dentro de una fila -->
                    <th style="width: 18%; height: 50px;"> Producto </th>
                    <th style="width: 18%; height: 50px;"> Precio </th>
                    <th style="width: 18%; height: 50px;"> Cantidad </th>

                </tr>
            </thead>


            <tbody>

                <?php
                foreach ($productos as $producto) {
                    $total += $producto[2]*$producto[3];
                    ?>
                    <tr>
                        <td>
                            <?php echo $producto[1] . '<br>'; ?>
                        </td>
                        <td>
                            <?php echo $producto[2] . '<br>'; ?>
                        </td>
                        <td>
                            <?php echo $producto[3] . '<br>'; ?>
                        </td>
                    </tr>
                    <?php
                }
                ?>

            </tbody>
        </table>

        <div class="ta-l cml-1 cmt-3 cp-2" style="background-color: rgb(240, 240, 240);">
            El total es
            <?php echo $total; ?>
        </div>

        <?php if($_SESSION['rol'] != 'P'){ ?>

        <div class="show-qr-code align-x cm-5">
            <?php generate_qr_code($id); ?>
        </div>

        <div class="ta-c cml-1 cmt-3 cp-2" style="background-color: rgb(240, 240, 240);">
            ¡¡Gracias por su compra!!
        </div>
        
        <?php
        
        }else{
            ?>
            <form action="./updateticket.php" method="post" enctype="multipart/form-data">
                        <input type="hidden" name="ticket" value='<?php echo $id ?>'>
                        <button class="delete-button fs-3" type="submit"><?php echo $productos[0][5]?> </button>
                    </form>
            <?php
        }
            }else{
                header('Location: ../../index.php');
            }
        }else{
                header('Location: ../../index.php');
            }
    ?>


    </div>

</body>

</html>


