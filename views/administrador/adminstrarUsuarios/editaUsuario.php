<?php
    //si la sesion esta activa te llevara al email
    session_start();
    if(isset($_SESSION['email'])){
?>


<?php
//conexion a la base de datos 
$conexion = mysqli_connect('localhost', 'id20540950_eltioessus', 'R^oY=SP33fs?Yr~9', 'id20540950_coffeeshop');
//definimos la variable id 
$id = trim($_POST['id']);
//echo $id;

?>

<?php
//incluimos una conexion a la base de datos que se encuentra en la carpeta controllers
include('../../../controllers/conexiones/conexionMain.php'); 
$db = connects(); //variable que devuelve la conexion
$query = $db->query("select * from paises"); //variable que llama a db que esta haciendo una seleccion a paises
$countries = array(); //variable que se identifica como un archivo json
while ($r = $query->fetch_object()) { //r es lo que devuelve el query, y se incerta dentro del archivo json
    $countries[] = $r;
};


?>

<?php
    //definimos unas variables que son para las validaciones que se ejecutaran al dar click en el boton de submit
  if(isset($_POST['editar'])){
    $email=$_POST['email'];
    $apPaterno=$_POST['apPaterno'];
    $apMaterno=$_POST['apMaterno'];
    $nombre = $_POST['nombre'];
    $telefono = $_POST['telefono'];
    $expresion = "/   ?/i";
    //expresion de caracteres opcionales para la contraseña
    $expass = "/[1? 2? 3? 4? 5? 6? 7? 8? 9? 0? $? #? &? :? ;? ,? .? !? ]/";
    
  }
?>


<!DOCTYPE html>
<!--inicio del html-->
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    <!--hacemos un llamado a los css para los estilos-->
    <link rel="stylesheet" href="../../../assets/styles/style.css?uuid=<?php echo uniqid(); ?>">
    <link rel="stylesheet" href="../../../assets/styles/spacing.css?uuid=<?php echo uniqid(); ?>">
    <!--titulo de la pagina-->
    <title>Editar Usuario</title>
</head>

<!--encabezado de nuestra pagina-->
<nav>
  <ul class="choose-color">
      <!--enlaces que estan en el encabezado-->
    <li><a href="./visualizarUsuario.php">Volver</a></li>
    <li><a href="./altaUsuario.php">Alta</a></li>
  </ul>
</nav>

<!--cuerpo del archivo-->
<body>
    <script src="./validacionUsuario.js"></script>
    <div class="container align-x w-5 cmy-5 cp-5">

        <!--etiqueta para el titulo-->
        <h2> Edita un Usuario </h2>
        <!--abrimos formulario-->
        <form action="./updateUsuario.php" method="post" onsubmit="return validar();">
    
            <?php

            //un php donde seleccione al id
    
            $sql = "SELECT * FROM `users` WHERE id = $id ";
            $result = mysqli_query($conexion, $sql);
            
    
            $mostrar =  mysqli_fetch_array($result);
            
            
            ?>
    
    
            <!--input que no se vea para el id-->
            <input id="input-edita-usuario" name="id" type="hidden" value="<?php echo $mostrar['id'] ?>">
            
            <!--campo para ingresar el email-->
            <input id="input-edita-usuario" type="text" name="email" id="email" required value="<?php echo $mostrar['email'] ?>"> 
            
            <!--input para el nombre-->
            
            <input id="input-edita-usuario" type="text" name="nombre" id="nom" required value="<?php echo $mostrar['nombre'] ?>"> 
            
            <!--input para el apellido paterno-->
            <input id="input-edita-usuario" type="text" name="apPaterno" id="pat" required value="<?php echo $mostrar['apPaterno'] ?>"> 
            
            <!--input para el apellido materno-->
            <input id="input-edita-usuario" type="text" name="apMaterno" id="mat" required value="<?php echo $mostrar['apMaterno'] ?>"> 
            <!--input para la fecha de nacimiento-->
            <input id="input-edita-usuario" type="date" name="fechaNacimiento" id="date" required value="<?php echo $mostrar['fechaNacimiento'] ?>"> 
 


            <!--pais-->
            <label>Pais</label>
            <!--el pais por defecto sera México-->
            <select id="continente_id" name="continente_id" required>
                <option value="146">Mexico</option>
                <option value="146">Mexico</option>
                <?php foreach ($countries as $c) : ?>
                  <option value="<?php echo $c->id; ?>" disabled><?php echo $c->nombre; ?></option>
                <?php endforeach; ?>
            </select>

            <?php
            //hacemos en un php una llamada a la base de datos para estados

            $id_e = $mostrar['pais_id'];
    
            $sqls = "SELECT * FROM `estados` WHERE id = $id_e";
            $resulte = mysqli_query($conexion, $sqls);
            
    
            $mostrar_e =  mysqli_fetch_array($resulte);
            
            
            ?>
      
            <!--select de estados aqui con el php te pondra el estado que se selecciono cuando el usuario se registro-->
            <label>Estado</label>
            <select id="pais_id" name="pais_id" required>
                <option value="<?php echo  $mostrar['pais_id'] ?>"><?php echo $mostrar_e['estado'] ?></option>
            </select>

            <?php
            //php para llamar a los municipios

            $id_m = $mostrar['ciudad_id'];
    
            $sqlss = "SELECT * FROM `municipios` WHERE id = $id_m";
            $resultm = mysqli_query($conexion, $sqlss);
            
    
            $mostrar_m =  mysqli_fetch_array($resultm);
            
            
            ?>
             <!--select de estados aqui con el php te pondra el municipio que se selecciono cuando el usuario se registro-->
            <label>Municipio</label>
            <select id="ciudad_id" name="ciudad_id" required>
              <option value="<?php echo $mostrar['ciudad_id'] ?>"><?php echo $mostrar_m['municipio'] ?></option>
            </select>
            
            <!--campo para el telefono -->
            <input id="input-edita-usuario" type="number" name="telefono" id="tel" required value="<?php echo $mostrar['telefono'] ?>"> 

            <!--select para escoger el tipo de rol-->
            <select name="rol" id="rol" required>
                <option value="">Roles</option>
                <option value="A">Administrador</option>
                <option value="U">Usuario</option>
                <option value="P">Personal</option>
            </select>
            <!--boton para enviar los datos-->
            <button type="submit" class="submit-button w-5 fs-3" value="editar" name="editar"> Editar usuario </button>
            
            
            <?php
      
        //validacion para el email
        if(isset($_POST['editar'])){
          if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
              echo "<p> El email es correcto </p>";
            return false;

        }

        }
      ?>
    
    
        </form>
        
    </div>



    <script type="text/javascript">
  $(document).ready(function(){
    $("#continente_id").change(function(){
      $.get("Paises.php","continente_id="+$("#continente_id").val(), function(data){
        $("#pais_id").html(data);
        console.log(data);
      });
    });

    $("#pais_id").change(function(){
      $.get("Ciudades.php","pais_id="+$("#pais_id").val(), function(data){
        $("#ciudad_id").html(data);
        console.log(data);
      });
    });
  });
</script>
</body>

</html>


<?php  
    //si la sesion esta cerrada te llevara al index
    }else{
        header('location: ../../../index.php');
    }
?>