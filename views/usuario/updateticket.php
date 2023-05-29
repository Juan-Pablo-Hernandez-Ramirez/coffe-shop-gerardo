<?php 
    //hacemos una conexion a la bd
    $con = mysqli_connect("localhost","id20540950_eltioessus","R^oY=SP33fs?Yr~9","id20540950_coffeeshop");
    
    
    if(isset($_POST['ticket'])){
    $idticket = $_POST['ticket'];
        
    

    $sql2 = "SELECT status FROM tickets WHERE ticket = '$idticket'";
    $result2 = mysqli_query($con, $sql2);
    $mostrar2 = mysqli_fetch_array($result2);
    

    $status = $mostrar2[0];
    
     
    $new_status = 'text';
    
    if(isset($status)){
    if($status == "Pedido"){
        $new_status = 'Preparandose';
    }else if($status == "Preparandose"){
        $new_status = 'Listo para entregar';
    }else if($status == "Listo para entregar"){
        $new_status = 'Entregado';
    }
    }
    
    

    $sql3 = "UPDATE tickets SET status= '$new_status' WHERE ticket = $idticket";
    $result3 = mysqli_query($con, $sql3);
    
    
    if($result3){
            if($new_status == 'Entregado'){
            header('location: ../personal/paginaPersonal.php');
            }else{
                header('location: ./ticket.php?id='.$idticket);
            }
        }else{
            echo "no";
        }
        
        
    }
?>