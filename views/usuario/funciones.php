<?php
function obtenerProductosEnCarrito()
{
    require('../../controllers/conexiones/conexionme.php');

    iniciarSesionSiNoEstaIniciada();
    $sentencia = $connection->prepare("SELECT articulos.Id_art , articulos.nombre, articulos.descripcion, articulos.precio,carrito.cantidad,carrito.id_producto
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

    $sentencia = $connection->prepare("SELECT articulos.Id_art , articulos.nombre, articulos.descripcion, articulos.precio,carrito.cantidad
     FROM articulos
     INNER JOIN carrito
     ON articulos.Id_art  = carrito.id_producto
     WHERE carrito.id_session = ?");
    $sentencia->execute([$id]);
    return $sentencia->fetchAll();
}


function quitarProductoDelCarrito($idProducto)
{
    require('../../controllers/conexiones/conexionme.php');

    iniciarSesionSiNoEstaIniciada();
    $idSesion = $_SESSION['id'];
    $sentencias = $connection->prepare("SELECT * FROM carrito WHERE id_session = ? AND id_producto = ?");
    $sentencias->execute([$idSesion, $idProducto]);
    $resultado = $sentencias->fetchAll();
    if($resultado[0][2] >= 2){
        $cantidad = $resultado[0][2] -= 1;
        $sentencia = $connection->prepare("UPDATE carrito SET cantidad = ? WHERE id_session = ? AND id_producto = ?");
        return $sentencia->execute([$cantidad,$idSesion, $idProducto]);
    }else{
    $sentencia = $connection->prepare("DELETE FROM carrito WHERE id_session = ? AND id_producto = ?");
    return $sentencia->execute([$idSesion, $idProducto]);
 }
}

function agregarProductoAlCarrito($idProducto)
{
    // Ligar el id del producto con el usuario a través de la sesión
    require('../../controllers/conexiones/conexionme.php');

    iniciarSesionSiNoEstaIniciada();
    $idSesion = $_SESSION['id'];
    $sentencias = $connection->prepare("SELECT * FROM carrito WHERE id_session = ? AND id_producto = ?");
    $sentencias->execute([$idSesion, $idProducto]);
    $resultado = $sentencias->fetchAll();
    if(isset($resultado[0])){
        $cantidad = $resultado[0][2] += 1;
        $sentencia = $connection->prepare("UPDATE carrito SET cantidad = ? WHERE id_session = ? AND id_producto = ?");
        return $sentencia->execute([$cantidad,$idSesion, $idProducto]);
    }else{
    $sentencia = $connection->prepare("INSERT INTO carrito(id_session, id_producto, cantidad) VALUES (?,?, ?)");
    return $sentencia->execute([$idSesion, $idProducto,1]);
 }
}


//******************************************Sistema tickets***********************************************************

function crearhistorial()
{
    // Ligar el id del producto con el usuario a través de la sesión
    require('../../controllers/conexiones/conexionme.php');
    
    iniciarSesionSiNoEstaIniciada();
    $idSesion = $_SESSION['id'];
    $sentencias = $connection->prepare("SELECT * FROM compras");
    $sentencias->execute();
    $resultado = $sentencias->fetchAll();
    $numeroco = count($resultado) - 1;
    $idco = $resultado[$numeroco][0] + 1;
    $sentencia = $connection->prepare("INSERT INTO compras (id_compra,id_usuario, id_producto, cantidad) SELECT ?,id_session,id_producto,cantidad FROM carrito WHERE id_session=?");
    $sentencia->execute([$idco, $idSesion,]);
    
    $sentenciaa = $connection->prepare("DELETE FROM carrito WHERE id_session = ?");
    $sentenciaa->execute([$idSesion]);
    return $idco;
    
    

}

function crearticket($idco)
{
    require('../../controllers/conexiones/conexionme.php');
    iniciarSesionSiNoEstaIniciada();
    $idsesion=$_SESSION['id'];
    $sentencia = $connection->prepare("INSERT INTO tickets(Id_compra,status) VALUES (?,?)");
    $sentencia->execute([$idco,'Pedido']);
    $sentencias = $connection->prepare("SELECT * FROM tickets");
    $sentencias->execute();
    $resultado = $sentencias->fetchAll();
    $numeticket = count($resultado);
    return $numeticket;
}

function obtenerProductoscompra($idticket)
{
    require('../../controllers/conexiones/conexionme.php');

    iniciarSesionSiNoEstaIniciada();
    $sentencia = $connection->prepare("SELECT a.Id_art , a.nombre, a.precio, b.cantidad , c.ticket, c.status FROM articulos a , compras b , tickets c WHERE  a.id_art = b.id_producto AND b.id_compra =c.id_compra AND c.ticket = ?");
    $idSesion = $_SESSION['id'];
    $sentencia->execute([$idticket]);
    return $sentencia->fetchAll();
}

function hacerQueNoComprenMasDeUnaVez(){
    require('../../controllers/conexiones/conexionme.php');

    iniciarSesionSiNoEstaIniciada();
    $idSesion = $_SESSION['id'];
    $sentencia = $connection->prepare("UPDATE users SET status = ? WHERE id = ? ");
    return $sentencia->execute([2,$idSesion]);
}

function hacerQueNoComprenMasDeUnaVes(){
    require('../../controllers/conexiones/conexionme.php');

    iniciarSesionSiNoEstaIniciada();
    $idSesion = $_SESSION['id'];
    $sentencia = $connection->prepare("UPDATE users SET status = ? WHERE id = ? ");
    return $sentencia->execute([1,$idSesion]);
}

function QueNoComprenMasDeUnaVez(){
    require('../../controllers/conexiones/conexionme.php');
    
    iniciarSesionSiNoEstaIniciada();
    $idSesion = $_SESSION['id'];
    $sentencias = $connection->prepare("SELECT status FROM users WHERE id = ?");
    $sentencias->execute([$idSesion]);
    return $sentencias->fetchAll();
}

function yacompre(){
    require('../../controllers/conexiones/conexionme.php');
    
    iniciarSesionSiNoEstaIniciada();
    $idSesion = $_SESSION['id'];
    $sentencias = $connection->prepare("SELECT * FROM compras WHERE id_usuario = ? ");
    $sentencias->execute([$idSesion]);
    $resultado = $sentencias->fetchAll();
    $numeroco = count($resultado) - 1;
    $idco = $resultado[$numeroco][0];
    $sentencia = $connection->prepare("SELECT * FROM tickets WHERE id_compra = ?");
    $sentencia->execute([$idco]);
    return $sentencia->fetchAll();
}

function iniciarSesionSiNoEstaIniciada()
{
    if (session_status() !== PHP_SESSION_ACTIVE) {
        session_start();
    }
}
?>