<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Codigo QR</title>
</head>
<body>
<?php 
   
	
	require "phpqrcode/qrlib.php";    
	
	$dir = 'temp/';
	
	
	if (!file_exists($dir))
        mkdir($dir);
    
	
        
	$filename = $dir.'test'.$_SESSION['id'].'.png';

	$tamanio = 10; 
	$level = 'H'; 
	$framSize = 3; 
	$contenido = 'https://proyectocafeteriaeltio.000webhostapp.com/views/usuario/comprar.php'; 
	    
	QRcode::png($contenido, $filename, $level, $tamanio, $framSize); 

	echo '<img src="'.$dir.basename($filename).'" /><hr/>';  
?>




</body>
</html>



