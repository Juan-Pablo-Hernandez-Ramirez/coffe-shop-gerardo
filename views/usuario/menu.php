<?php
//se hace una conexion a la base de datos
session_start();
$conexion = mysqli_connect('localhost', 'id20540950_eltioessus', 'R^oY=SP33fs?Yr~9', 'id20540950_coffeeshop');
?>

<html lang="es">

<head>
    <meta charset="UTF-8">
    <!--se llaman a los estilos de css-->
    <link rel="stylesheet" href="../../../assets/styles/spacing.css?uuid=<?php echo uniqid();?>">
    <link rel="stylesheet" href="../../../assets/styles/style.css?uuid=<?php echo uniqid();?>">
    <title> Menu </title>
</head>
<body>
    <!--boton para cerrar sesion-->
    <ul class="choose-color">
        <li><a href="../../controllers/validaciones/logout.php"> Logout</a></li>
        <li><a href="./carrito.php">Carrito</a></li>
        <li><a href="./historial.php">Historial</a></li>
    </ul>
    
    <h2>Hola 
        <?php
            echo $_SESSION['email'];
        ?>
        con id: 
        <?php
            echo $_SESSION['id'];
        ?>
    </h2>
    
    <?php 
    
    //hacemos una consulta a la bdarticulos
    $query = mysqli_query($conexion, "SELECT * FROM articulos");
    $result = mysqli_num_rows($query);
    

    //este igual funciona para que si es correcta la conexion te aparezcan los datos que se extraen de la bd
    while ($mostrar = mysqli_fetch_array($query)) {
    ?> 
    
    <!-- Contenedor blanco -->
    <div class="container w-10 h-2 cmt-3 cp-1 align-x">

        <!-- Imagen -->
        <div class="product-image">
            <img height="700px" widht="650px" src="data:image/jpg;base64, <?php echo base64_encode($mostrar['Imagen']);?>" alt="">
        </div>
        <!-- Nombre descripcion y precio -->
        <div class="product description">
            <h1 class="ta-l">
                <?php echo $mostrar['nombre'] ?>
            </h1>
            <p class="fw-l">
                <?php echo $mostrar['descripcion'] ?>
            </p>
            
            <!--<img height="50px" src="data:image/jpg;base64, <?php echo base64_encode($mostrar['Imagen']);?>">-->
            
           <form action="./agregacar.php" method="post">
                <input type="hidden" value="<?php echo $mostrar['Id_art'] ?>" name="id_pro">
            <?php if($mostrar['descuento'] > 1 ){ ?>
            
            <button class="submit-button fs-3">
                Descuento <?php 
                $des = $mostrar['descuento']/100;
                echo $mostrar['precio']* $des;?>
            </button>
            <?php  }else{ ?>
            <button class="submit-button fs-3">
                comprar $
                <?php echo $mostrar['precio']?>
            </button>
            <?php } ?>
            </form>
        </div>

    </div>
    
    <?php
    //se cierra la el while que se abre abajo de la consulta a la bd
    }
    ?>
                    
                  

</body>

</html>