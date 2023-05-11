<?php
function obtenerProductosEnCarrito()
{
    require('../../controllers/conexiones/conexionme.php');

    iniciarSesionSiNoEstaIniciada();
    $sentencia = $connection->prepare("SELECT articulos.Id_art , articulos.nombre, articulos.descripcion, articulos.precio
     FROM articulos
     INNER JOIN carrito
     ON articulos.Id_art  = carrito.id_producto
     WHERE carrito.id_session = ?");
    $idSesion = $_SESSION['id'];
    $sentencia->execute([$idSesion]);
    return $sentencia->fetchAll();
}

function obtenerProductosEnCarritoqr($id)
{
    require('../../controllers/conexiones/conexionme.php');

    $sentencia = $connection->prepare("SELECT articulos.Id_art , articulos.nombre, articulos.descripcion, articulos.precio
     FROM articulos
     INNER JOIN carrito
     ON articulos.Id_art  = carrito.id_producto
     WHERE carrito.id_session = ?");
    $sentencia->execute([$id]);
    return $sentencia->fetchAll();
}

function creartivket()
{
    require('../../controllers/conexiones/conexionme.php');
    iniciarSesionSiNoEstaIniciada();
    $idsesion=$_SESSION['id'];
    $sentencia = $connection->prepare("INSERT INTO ticket(Id_compra) VALUES (?)");
    return $sentencia->execute([$idsesion]);
}

function quitarProductoDelCarrito($idProducto)
{
    require('../../controllers/conexiones/conexionme.php');

    iniciarSesionSiNoEstaIniciada();
    $idSesion = $_SESSION['id'];
    $sentencia = $connection->prepare("DELETE FROM carrito WHERE id_session = ? AND id_producto = ?");
    return $sentencia->execute([$idSesion, $idProducto]);
}

function agregarProductoAlCarrito($idProducto)
{
    // Ligar el id del producto con el usuario a través de la sesión
    require('../../controllers/conexiones/conexionme.php');

    iniciarSesionSiNoEstaIniciada();
    $idSesion = $_SESSION['id'];
    $sentencia = $connection->prepare("INSERT INTO carrito(id_session, id_producto) VALUES (?, ?)");
    return $sentencia->execute([$idSesion, $idProducto]);
}


function iniciarSesionSiNoEstaIniciada()
{
    if (session_status() !== PHP_SESSION_ACTIVE) {
        session_start();
    }
}
?>