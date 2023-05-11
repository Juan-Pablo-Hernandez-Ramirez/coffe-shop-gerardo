<?php
    session_start();

    if(isset($_GET['id'])){
        $id=$_GET['id'];
        if(isset($_SESSION['rol'])){
        $ids=$_SESSION['id'];

    if ($_SESSION['rol'] == 'P' || $ids=$id){
        include_once "funciones.php";
        $productos = obtenerProductosEnCarritoqr($id);
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
    
    }else{
        header('Location: ../../index.php');
    }
}else{
        header('Location: ../../index.php');
    }
    

   
	

    }else{
        header('Location: ../../index.php');
    }

?>