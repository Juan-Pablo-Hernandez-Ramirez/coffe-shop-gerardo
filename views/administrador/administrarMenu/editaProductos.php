<?php
    //aqui si la sesion esta activa te llevara al html siguiente
    session_start();
    if(isset($_SESSION['email'])){
?>


<?php
//conexion 
$conexion = mysqli_connect('localhost', 'id20540950_eltioessus', 'R^oY=SP33fs?Yr~9', 'id20540950_coffeeshop');

?>


<?php
    //definimos la variable id
    $id = trim($_POST['id']);
    //requermimos una conexion a la bd
    require("../../../controllers/conexiones/conexionme.php");
    //preparamos una consulta a nuestra bd en la tabla tipo_articulos
    $response = $connection->prepare("SELECT * FROM tipo_articulo");
    //ejecutamos
    $response->execute();
    
?>


<!DOCTYPE html>
<html lang="en">


<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--conexion a la css-->
    <link rel="stylesheet" href="../../../assets/styles/style.css?uuid=<?php echo uniqid(); ?>">
    <link rel="stylesheet" href="../../../assets/styles/spacing.css?uuid=<?php echo uniqid(); ?>">
    <!--titulo de la pagina-->
    <title>Editar Producto</title>
</head>

<!--encabezado-->
<nav>
    <ul class="choose-color">
        <!--enlace para volver a la tabla de productos-->
        <li><a href="./visualizarProductos.php">Volver</a></li>
        <!--boton para dar de alta-->
        <li><a href="./altaProductos.php">Alta de Productos</a></li>
    </ul>
</nav>

<!--cuerpo del html-->
<body>
    <script src="./validacionProducto.js"></script>
    <div class="container align-x w-5 cmy-5 cp-5">

        <!--titulo-->
            <h2> Edita un producto existente </h2>
            <!--formulario-->
        <form action="./update.php" method="post" onsubmit="return validar();" enctype="multipart/form-data">

            <!--un select para opciones-->
            <label>
                Tipo de producto
            </label>
            <select name="tipo_art" required>
                <option disabled> Selecciona un producto </option>
                <?php foreach ($response as $r) {
                    echo "<option value=" . $r[0] . ">" . $r[1] . "</option>";
                } ?>

            </select>

            <br>

            <?php
            //consulta a la bd que identifique al id
            $sql = "SELECT * FROM articulos WHERE Id_art = $id  ";
            $result = mysqli_query($conexion, $sql);
            $mostrar = mysqli_fetch_array($result);
            $row = $result->fetch_assoc();
            
            ?>


            <!--el input para el id-->
            <input name="id" type="hidden" value="<?php echo $mostrar['Id_art'] ?>" pattern="[A-Z a-z áéíóúÁÉÍÓÚñÑ]*" requerid>
            <!--input para el nombre-->
            <label>
                Nombre
            </label>
            <input id="input-edita-productos" type="text" name="nombre" id="nom"
                value="<?php echo $mostrar['nombre'] ?>" pattern="[a-zA-Z0-9\s\S]+" requerid> <br>
            <!--input para la descripcion-->
            <label>
                Descripcion
            </label>
            <input id="input-edita-productos" type="text" name="descripcion" id="descrip"
                value="<?php echo $mostrar['descripcion'] ?>" pattern="[a-zA-Z0-9\s\S]+" requerid><br>
            <!--input para el costo-->
            <label>
                Costo
            </label>
            <input id="input-edita-productos" type="number" name="costo" id="cos"
                value="<?php echo $mostrar['costo'] ?>" pattern="[0-9]*" requerid> <br>
            <!--input para el precio-->
            <label>
                Precio
            </label>
            <input id="input-edita-productos" type="number" name="precio" id="pre"
                value="<?php echo $mostrar['precio'] ?>" pattern="[0-9]*" requerid> <br>
            <!--input para la unidad-->
            <label>
                Unidad
            </label>
            <input id="input-edita-productos" type="number" name="unidad" id="uni"
                value="<?php echo $mostrar['unidad'] ?>" pattern="[0-9]*"  requerid> <br>
            <!--input para la existencia-->
            <label>
                Existencia
            </label>
            <input id="input-edita-productos" type="number" name="existencia" id="exi"
                value="<?php echo $mostrar['existencia'] ?>" pattern="[0-9]*" requerid> <br>
                
            <!--input para cargar una imagen-->
            <label>
                Imagen
            </label>
            <br>
            <input  accept="image/png, image/jpeg" class="w-4"style="width: 460px;" type="file" name="Imagen" required>
            <!--boton para enviar los datos-->
            <button type="submit" class="submit-button w-5 fs-3" value="editar"> Editar producto </button>

        </form>
    </div>
</body>

</html>
<?php  
    //si la sesion esta cerrada te llevara al index
    }else{
        header('location: ../../../index.php');
    }
?>