<?php
    //llamamos a una conexion a la base de datos
    require('../../../controllers/conexiones/conexionme.php');

        //definimos todas las variables necesarias
        $id = trim($_POST['id']);
        $tipo_art = trim($_POST['tipo_art']);
        $nombre = trim($_POST['nombre']);
        $descripcion = trim($_POST['descripcion']);
        $costo = trim($_POST['costo']);
        $precio = trim($_POST['precio']);
        $unidad = trim($_POST['unidad']);
        $existencia = trim($_POST['existencia']);
        
        //Cremos las variables nesesarias para el campo de imagen
        if ($_FILES['Imagen']['name']!= null){
        $tipoArchivo = $_FILES['Imagen']['type'];
        $nombreArchivo = $_FILES['Imagen']['name'];
        $tamanoArchivo = $_FILES['Imagen']['size'];
        $imagenSubida = fopen($_FILES['Imagen']['tmp_name'], 'r');
        $binariosImagens = fread($imagenSubida, $tamanoArchivo);
        
        //una conexion a la base de datos
        $conex = mysqli_connect("localhost","id20540950_eltioessus","R^oY=SP33fs?Yr~9","id20540950_coffeeshop"); 
        //la imagen
        $binariosImagen = mysqli_escape_string($conex, $binariosImagens);
        //consulta a la bd para editar un producto de acuerdo con su menu
        $sql = "UPDATE articulos SET tipo_art='$tipo_art', nombre= '$nombre', descripcion= '$descripcion', costo='$costo', precio='$precio', unidad='$unidad', existencia='$existencia',Imagen='$binariosImagen'  WHERE Id_art = $id ";
        //Ejecuta ambas sentencias
        $stmt = mysqli_query($conex,$sql);
        
    }else{
        
        //actualiza los valores dentro de la base de datos
        $sql = "UPDATE articulos SET tipo_art=:tip, nombre= :nom, descripcion= :descrip, costo=:cos, precio=:pre, unidad=:uni, existencia=:exi  WHERE Id_art = :id ";
        $stmt=$connection->prepare($sql);
        $stmt->bindParam(":tip",$tipo_art);
        $stmt->bindParam(":nom",$nombre);
        $stmt->bindParam(":descrip",$descripcion);
        $stmt->bindParam(":cos",$costo);
        $stmt->bindParam(":pre",$precio);
        $stmt->bindParam(":uni",$unidad);
        $stmt->bindParam(":exi",$existencia);
        $stmt->bindParam(":id",$id);
        $stmt->execute();
    }
       
        
        //si se editaron correctamente te regresa a la visualizacion si no te muesta el mensaje de No
        if($stmt){
            header('location: ../administrarMenu/visualizarProductos.php');
        }else{
            echo "no";
        }

?>