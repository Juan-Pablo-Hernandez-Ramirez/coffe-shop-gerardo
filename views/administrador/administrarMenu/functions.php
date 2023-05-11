<?php

    // Se crea una funcion para insercion de datos
    // De acuerdo a los campos de la base de datos
    // Solo se ponen los datos que no son autoincrementos
    function insertar_datos($tipo_art,$nombre,$descripcion,$costo,$precio,$unidad,$existencia,$Imagen){
        // Se crea la variable conexion global para poder utilizarla 
        global $conexion;
        $Imagens = mysqli_escape_string($conexion, $Imagen);
        // Query para la insercion de los datos en la base de datos
        // Se espesifican los campos donde se insertaran los datos
        // Se inserta los datos en su lugar correspondiente 
        $setencia = "insert into articulos (tipo_art,nombre,descripcion,costo,precio,unidad,existencia,Imagen) values ('$tipo_art','$nombre', '$descripcion', '$costo', '$precio',
        '$unidad', '$existencia', '$Imagens')";
        $ejecutar = mysqli_query($conexion, $setencia);
        return $ejecutar;

    }

?>
