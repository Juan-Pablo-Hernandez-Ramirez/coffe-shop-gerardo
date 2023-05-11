<?php
//llamamos a la conexion
    $conex = mysqli_connect("localhost","id20540950_eltioessus","R^oY=SP33fs?Yr~9","id20540950_coffeeshop"); 
    
    $tart = $_POST['tipo_art'];
    $nom = $_POST['nombre'];
    $descrip = $_POST['descripcion'];
    $costo = $_POST['costo'];
    $precio = $_POST['precio'];
    $unidad = $_POST['unidad'];
    $existen = $_POST['existencia'];
    
//aqui se va a hacer una insercion de datos a la base de datos
    
    if (isset($_FILES['Imagen']['name'])){
        $tipoArchivo = $_FILES['Imagen']['type'];
        $nombreArchivo = $_FILES['Imagen']['name'];
        $tamanoArchivo = $_FILES['Imagen']['size'];
        $imagenSubida = fopen($_FILES['Imagen']['tmp_name'], 'r');
        $binariosImagens = fread($imagenSubida, $tamanoArchivo);
        $binariosImagen = mysqli_escape_string($conex, $binariosImagens);
        $sql = "INSERT INTO articulos(tipo_art, nombre, descripcion, costo, precio, unidad, existencia, Imagen)values('$tart', '$nom', '$descrip', '$costo', '$precio', '$unidad', '$existen', '$binariosImagen')";
        
        $response = mysqli_query($conex,$sql);
        
    }
    
//hacemos una condicion que es si todo se inserto correcto entonces nos va a llevar a la tabla 
    if($response){
        header("Location: ../../views/administrador/administrarMenu/visualizarProductos.php");
        //si no le escribimos que no se pudieron insertar los datos
    }else{
        echo("no se pudieron insertar los datos correctamente");
        echo mysqli_error($conex);
    }
    
    
    
?>