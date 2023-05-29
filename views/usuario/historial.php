<?php
session_start();
$con = mysqli_connect('localhost', 'id20540950_eltioessus', 'R^oY=SP33fs?Yr~9', 'id20540950_coffeeshop');
?>
<ul>
        <li><a href="./menu.php">Volver</a></li>
    </ul>
       <h1>Compras</h1>
        <table cellpadding="10" class="container align-x w-10">
            <thead>
                <tr>
                    <!-- Se crean 3 columnas dentro de una fila -->
                    <th style="width: 24%; height: 50px;">No. Ticket</th>
                    <th style="width: 24%; height: 50px;">Nombre producto</th>
                    <th style="width: 24%; height: 50px;">Precio</th>
                    <th style="width: 24%; height: 50px;">Cantidad</th>
                    <th style="width: 24%; height: 50px;">Status</th>


    
                </tr>
            </thead>
    
    
    
            <tbody>
    
                <?php
            
                $id = $_SESSION['id'];
                $sql = "SELECT c.ticket ,  a.precio, b.cantidad, d.nombre , c.status , a.nombre , d.id FROM articulos a , compras b , tickets c, users d WHERE  a.id_art = b.id_producto AND b.id_compra = c.id_compra AND d.id = b.id_usuario AND b.id_usuario = $id AND c.status != 'Entregado'";
                $result = mysqli_query($con, $sql);
    
                while ($mostrar = mysqli_fetch_array($result)) {
                ?>
                    <tr> 
                        <td  style="width: 24%; height: 50px;"><?php echo $mostrar[0] ?></td>
                        <td  style="width: 24%; height: 50px;"><?php echo $mostrar[5] ?></td>
                        <td  style="width: 24%; height: 50px;"><?php echo $mostrar[1] ?></td>
                        <td  style="width: 24%; height: 50px;"><?php echo $mostrar[2] ?></td>
                        <td  style="width: 24%; height: 50px;"><?php echo $mostrar[4] ?></td>
                    </tr>
    
    
    
                <?php
                }
                ?>
    
            </tbody>
        </table>
        <h1>Historial</h1>
        <table cellpadding="10" class="container align-x w-10">
            <thead>
                <tr>
                    <!-- Se crean 3 columnas dentro de una fila -->
                    <th style="width: 24%; height: 50px;">No. Ticket</th>
                    <th style="width: 24%; height: 50px;">Nombre producto</th>
                    <th style="width: 24%; height: 50px;">Precio</th>
                    <th style="width: 24%; height: 50px;">Cantidad</th>
                    <th style="width: 24%; height: 50px;">Status</th>
                    


    
                </tr>
            </thead>
    
    
    
            <tbody>
    
                <?php
                $sql2 = "SELECT c.ticket ,  a.precio, b.cantidad, d.nombre , c.status , a.nombre , d.id FROM articulos a , compras b , tickets c, users d WHERE  a.id_art = b.id_producto AND b.id_compra = c.id_compra AND d.id = b.id_usuario AND b.id_usuario = $id AND c.status = 'Entregado'";
                $result2 = mysqli_query($con, $sql2);
    
                while ($mostrar2 = mysqli_fetch_array($result2)) {
                ?>
    
                    <tr> 
                        <td><?php echo $mostrar2[0] ?></td>
                        <td><?php echo $mostrar2[5] ?></td>
                        <td><?php echo $mostrar2[1] ?></td>
                        <td><?php echo $mostrar2[2] ?></td>
                        <td><?php echo $mostrar2[4] ?></td>
                    </tr>
    
    
    
                <?php
                }
                ?>
    
            </tbody>
        </table>
        