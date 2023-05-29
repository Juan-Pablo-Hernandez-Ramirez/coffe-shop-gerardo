<?php 
    //hacemos una conexion a la bd
    $con = mysqli_connect("localhost","id20540950_eltioessus","R^oY=SP33fs?Yr~9","id20540950_coffeeshop");
    
    
    if(isset($_POST['id_art'])){
    $idart = $_POST['id_art'];
        
    

    $sql2 = "SELECT * FROM articulos WHERE id_art = '$idart'";
    $result2 = mysqli_query($con, $sql2);
    $mostrar2 = mysqli_fetch_array($result2);
    

    $precio = $mostrar2['precio'];
    $descuento = $mostrar2['descuento']/100;
    $precioDes = $mostrar2['precio']*$descuento;
    
    

    $sql3 = "UPDATE articulos SET descuento = '$precioDes' WHERE id_art = $idart";
    $result3 = mysqli_query($con, $sql3);
    
    
    if($result3){
            header('location: ./visualizarProductos.php');
        }else{
            echo "no";
        }
        
        
    }
?>