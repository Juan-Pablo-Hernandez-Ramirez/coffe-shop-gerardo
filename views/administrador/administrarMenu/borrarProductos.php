<?php


//conexion a la base de datos
$servername = "localhost"; //servidor
$username = "id20540950_eltioessus"; //usuario
$password = "R^oY=SP33fs?Yr~9";//contraseña
$dbname = "id20540950_coffeeshop"; //nombre de la bd

//una conexion 
$conn = mysqli_connect($servername, $username, $password, $dbname);
//declaramos la variable id
$id = trim($_POST['id']);

//hacemos una consulta que borre en la tabla articulos donde se seleccione el id
$sql = "DELETE FROM articulos WHERE `articulos`.`Id_art` = $id";

//un query
$res=$conn->query($sql);

//si se borro correctamente te llevara a la tabla de productos
if($res){
    header("Location: ./visualizarProductos.php");
}else{
    echo "No se pudo borrar"; //si no le escribimos que no se borro
}

//cerramos la conexion
mysqli_close($conn);

?>