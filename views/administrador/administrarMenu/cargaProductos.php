<?php

if(isset($_POST["enviar"])){ // nos permite recepcionar una variable que exista y que no este null 
    header('location: ./visualizarProductos.php');
    // Se llama a nuestros archivos
    require_once("conexion.php");
    require_once("functions.php");
    
        $tipoArchivo = $_FILES['Imagen']['type'];
        $nombreArchivo = $_FILES['Imagen']['name'];
        $tamanoArchivo = $_FILES['Imagen']['size'];
        $imagenSubida = fopen($_FILES['Imagen']['tmp_name'], 'r');
        $binariosImagens = fread($imagenSubida, $tamanoArchivo);
    

    // Variable con el parametro de nombre
    $archivo = $_FILES["archivo"]["name"];
    // Variable para copiar el archivo que se sube
    $archivo_copiado =$_FILES["archivo"]["tmp_name"];
    // Se guada el archivo que se envia
    $archivo_guardado = "copia_".$archivo;

    // Se ponen parametros
    if(copy($archivo_copiado, $archivo_guardado)){
        // Muestra si se copio bien
        echo "se copio correctamente el archivo temporalmente <br/> ";
    }else{
        // Muestra si se copio mal
        echo "hubo un error <br/>";
    }

    // If para comparar el archivo guardado
    
    if (file_exists($archivo_guardado)){
        // Variable que nos permite abrir un archivo
        // r = leer
        // Se lee el archivo guardado
        $fp = fopen($archivo_guardado,"r");
        // Variable row
        $rows = 0;
        // While para recorrer filas y columnas
        // Se pone un limite de 1000 filas o columnas
        // Se espesifica el tipo de separador del archivo
        while ($datos = fgetcsv($fp, 1000, ",")){
            // Incremento del row
            $rows ++;
            // Nuestra variable row es mayor a 1 se ejecuta
            // 1 es el numero de la primera fila
            if ($rows > 1){
                // Variable que regresa una funcion
                // Se mandan los valores 
                $resultado = insertar_datos($datos[0],$datos[1],$datos[2],$datos[3],$datos[4],$datos[5],$datos[6],$binariosImagens);
                if ($resultado){
                    // Dide si se inserto bien los datos
                    echo " se inserto los datos correctamente<br/>";
                }else{
                    // Dide si se inserto mal los datos
                    echo "no se inserto <br/>";
                }
            }
        }
    

    }else{
        echo "no existe el archivo copiado <br/>";
    }
}

?>

<!-- Se crea codigo html -->

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../../assets/styles/style.css">
    <link rel="stylesheet" href="../../../assets/styles/spacing.css">
    <title>Importar Archivos</title>
</head>


<body>
    
    <!-- Barra de navegacionl -->
    <nav>
    <ul class="choose-color">
        <li><a href="./visualizarProductos.php">Volver</a></li>
    </ul>
    </nav>
    
        <div class="container align-x w-5 cmt-5" style="text-align: center;">
            <!-- Se crea el formulario -->
            <form action="cargaProductos.php" class="formulariocompleto" method="post" enctype="multipart/form-data">
                <img src="../../../assets/images/img.jpg" CLASS="cmy-5">
                <div class="form-control">
                <label>Archivo CSV</label>
                <br>
                <!-- Se especifica el tirpo de archivo que se subira -->
                <input  accept=".csv" class="w-3" type="file" name="archivo">
                </div>
                <div class="form-control">
                    <label>Imagen</label>
                <br>
                <!-- Se especifica el tirpo de imagen que se subira -->
                <input  accept="image/png, image/jpeg" class="w-3" type="file"  class="form-control" name="Imagen">
                </div>
                <!-- Se crea el boton para enviar la informacion resivida -->
                <input class="w-4" style="width: 344px;" type="submit" value="ENVIAR" class="form-control" name="enviar">
            </form>
        </div>
    </body>

</html>
