<?php
    //llamamos a una conexion a la bd
    require("../../../controllers/conexiones/conexionme.php");
    //preparar una conexion hacia la tabla tipo_articulos
    $response = $connection->prepare("SELECT * FROM tipo_articulo");
    //se ejecuta
    $response->execute();
    //si la sesion esta activa te llevarva al html
    session_start();
    if(isset($_SESSION['email'])){
?>




<!DOCTYPE html>
<!--abrimos el html-->
<html lang="en">
<head>
    <!--el encabezado del html-->
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--se conecta el css-->
    <link rel="stylesheet" href="../../../assets/styles/style.css?uuid=<?php echo uniqid(); ?>">
    <link rel="stylesheet" href="../../../assets/styles/spacing.css?uuid=<?php echo uniqid(); ?>">
    <!--titulo-->
    <title>Nuevo Producto</title>
</head>

<!--Encabezado-->
<nav>
    <!--enlaces-->
  <ul class="choose-color">
    <li><a href="./visualizarProductos.php">Volver</a></li>
  </ul>
</nav>

<!--Cuerpo-->
<body>

    <script src="./validacionProducto.js"></script>
    <div class="container align-x w-5 cmy-5 cp-5">

    <!--Titulo de registro de productos-->
    <h2 class=""> Registra un nuevo producto </h2>
        <!--Abre el formulario-->
        <form action="../../../controllers/conexiones/conexionmenu.php" method="post" onsubmit="return validar();" enctype="multipart/form-data" >
    
            
            <!--select para el producto-->
            <select name="tipo_art" required>
                <option disabled> Selecciona un producto </option>
                <?php foreach($response as $r){ 
                    echo "<option value=".$r[0].">".$r[1]."</option>";
                } ?>
            </select>
            
            <!--meter una imagen -->
            <!--<input type="file" name="Imagen" id="img">-->
    
            <!--Nombre del producto-->
            <input id="input-alta-productos" placeholder="Nombre del producto" type="text" name="nombre" id="nom"
                pattern="[a-zA-Z0-9\s\S]+" required minlength="4" maxlength="40">
    
            <!--Descripcion-->
            <input id="input-alta-productos" placeholder="Descripción" type="text" name="descripcion" id="descrip"
                pattern="[a-zA-Z0-9\s\S]+" required minlength="4" maxlength="100">
                
            <!--Costo-->    
            <input id="input-alta-productos" placeholder="Costo (entrada)" type="number" name="costo" id="cos" minlength="1" maxlength="4" pattern="[0-9]*" required>

            <!--Precio de salida-->
            <input id="input-alta-productos" placeholder="Precio (salida)" type="number" name="precio" id="pre" minlength="1" maxlength="4" pattern="[0-9]*" required>

            <!--Unidad-->
            <input id="input-alta-productos" placeholder="Unidad" type="number" name="unidad" id="uni" minlength="1" maxlength="4" pattern="[0-9]*"  required>

            <!--existencias-->
            <input id="input-alta-productos" placeholder="Existencias" type="number" name="existencia" id="exi" minlength="1" maxlength="4" pattern="[0-9]*" required>
            
           <input  accept="image/png, image/jpeg" class="w-4"style="width: 460px;" type="file" name="Imagen" id="img" required>
    
    
    
            <!--boton para enviar-->
            <button type="submit" class="submit-button w-5 fs-3"> Registrar producto </button>
    
        </form>
        </div>
</body>
</html>

<?php
    //aqui si la cuenta esta cerrada y quieres meterte a esta pagina te llevara al index 
    }else{
        header('location: ../../../index.php');
    }
?>