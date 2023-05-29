<?php
include_once "funciones.php";
if (!isset($_POST["id_pro"])) {
    exit("No hay id_producto");
}
agregarProductoAlCarrito($_POST["id_pro"]);
header("Location: carrito.php");

?>