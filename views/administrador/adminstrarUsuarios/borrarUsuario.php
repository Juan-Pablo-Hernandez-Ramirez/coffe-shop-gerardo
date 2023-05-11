<?php

//conexion a la bd
$servername = "localhost";
$username = "id20540950_eltioessus";
$password = "R^oY=SP33fs?Yr~9";
$dbname = "id20540950_coffeeshop";


$conn = mysqli_connect($servername, $username, $password, $dbname);
//definimos la variable id
$id = trim($_POST['id']);

//una cosulta que borrara todos los datos de acuerdo con el id
$sql = "DELETE FROM users WHERE `users`.`id` = $id";

$res=$conn->query($sql);

//si se borro bien te llevara al la tabla de usuario
if($res){
    header("Location: ../adminstrarUsuarios/visualizarUsuario.php");
}else{
    //si no le escribimos que no se pudo borrar
    echo "No se pudo borrar";
}
//cerramos la conexion

mysqli_close($conn);

?>