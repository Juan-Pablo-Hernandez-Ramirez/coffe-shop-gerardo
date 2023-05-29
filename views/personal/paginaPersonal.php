 <?php
    
    $conexion = mysqli_connect('localhost', 'id20540950_eltioessus', 'R^oY=SP33fs?Yr~9', 'id20540950_coffeeshop');
 ?>
 
 <!--se llaman a los estilos de css-->
 <link rel="stylesheet" href="../../../assets/styles/spacing.css?uuid=<?php echo uniqid();?>">
    <link rel="stylesheet" href="../../../assets/styles/style.css?uuid=<?php echo uniqid();?>">
    <title> Personal </title>
</head>
<body>

    <!--boton para cerrar sesion-->
    <ul class="choose-color">
        <li><a href="../../controllers/validaciones/logout.php"> Logout</a></li>
    </ul>
    <ul class="choose-color">
        <li><a href="./obtenerp.php"> Pedidos</a></li>
    </ul>

    <ul class="choose-color">
        <li><a href="camara.php">Scanear QR</a></li>
    </ul>
    
    
    <!--<ul class="choose-color">
        <li><a href="index.html">prueba</a></li>
    </ul>-->


</body>

</html>