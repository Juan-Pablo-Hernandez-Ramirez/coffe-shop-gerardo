<?php
    include_once "funciones.php";
    $productos = obtenerProductosEnCarrito();
    echo "compraste <br>";

    $total=0;

    foreach ($productos as $producto) {
        $total += $producto[3];
        
        echo $producto[1].'<br>';
    }

    echo "el total es ".$total;

    echo '<br>';
    echo '<br>';
    echo '<br>';
    echo '<br>';

    echo 'tu ticket es el';

   
	
	require "phpqrcode/qrlib.php";    
	
	$dir = 'temp/';
	
	
	if (!file_exists($dir))
        mkdir($dir);
    
	
        
	$filename = $dir.'test'.$_SESSION['id'].'.png';

	$tamanio = 3; 
	$level = 'H'; 
	$framSize = 3; 
	$contenido = 'https://proyectocafeteriaeltio.000webhostapp.com/views/usuario/comprarqr.php?id='.$_SESSION['id']; 
	    
	QRcode::png($contenido, $filename, $level, $tamanio, $framSize); 

	echo '<img src="'.$dir.basename($filename).'" /><hr/>';  

?>