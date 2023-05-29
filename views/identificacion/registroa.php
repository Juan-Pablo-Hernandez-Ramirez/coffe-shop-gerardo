<?php
include "../../controllers/conexiones/conexionMain.php"; //Se incluye el archivo coneccion php
$db = connects(); //variable que devuelve la coneccion
$query = $db->query("select * from paises"); //variable que llama a db que esta haciendo una seleccion a paises
$countries = array(); //variable que se identifica como un archivo json
while ($r = $query->fetch_object()) { //r es lo que devuelve el query, y se incerta dentro del archivo json
  $countries[] = $r;
};

?>


<?php
  if(isset($_POST['registrar'])){
    $email=$_POST['email'];
    $apPaterno=$_POST['apPaterno'];
    $apMaterno=$_POST['apMaterno'];
    $nombre = $_POST['nombre'];
    $telefono = $_POST['telefono'];
    $expresion = "/   ?/i";
    $expass = "/[1? 2? 3? 4? 5? 6? 7? 8? 9? 0? $? #? &? :? ;? ,? .? !? ]/";
    
  }
  
  if (isset($_POST['apellidos'])){
  $apellido = $_POST['apellidos']; 


$domains = explode(' ', $apellido);
  
  $app = $domains[0];
  if(isset($domains[1]))$apm = $domains[1];
  $nombres = $_POST['nombres'];
  $emails = $_POST['emails'];
  }
?>



<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Registro</title>
  <!--Libreria para hacer modificaciones dinamicas -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
  <!--este php hace que se actualice el css-->
  <link rel="stylesheet" href="../../assets/styles/style.css?uuid=<?php echo uniqid(); ?>" type="text/css" />
  <link rel="stylesheet" href="../../assets/styles/spacing.css?uuid=<?php echo uniqid(); ?>" type="text/css" />

</head>

<!--encabezado de la pagina-->
<nav>
  <ul class="choose-color">
      <li><a href="../../index.php">Home</a></li><!--enlace para llevarte al home-->
      <li><a href="./login.php"> Login</a></li>
  </ul>
</nav>

<!--cuerpo de la pagina-->
<body>


  <script src="./validacionFormato.js"></script>
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


    <!--Formulario de Login y registro-->
  <div class="container align-x w-5 cmy-5 cp-5">
    <!--Register-->
    <form method="post" class="formulario__register"   >

        <!--la imagen-->
	  <img src="../../assets/images/logo/logo.jpg" alt="">
      <!--Inicio del formulario-->
      <h1 class="align-x w-5 fc-1 fs-1 cmb-4 ta-c"> ¡Registrate! </h1><!--titulo-->
      <!--minleingth es el minimo de caracteres, maxlength es el numero de caracteres maxlength el numero de caracteres maximos-->
      <!--input para el apellido paterno-->
      <input id="input-registro" placeholder="Apellido paterno" type="text" name="apPaterno" id="apPaterno" minlength="1" maxlength="20" value="<?php if(isset($apPaterno)) echo $apPaterno;
                                           if(isset($app)) echo $app;?>" required />
      
      

      <!--input para el apellido materno-->
      <input id="input-registro" type="text" name="apMaterno" placeholder="Apellido materno" id="apMaterno" minlength="1" maxlength="20" value="<?php if(isset($apMaterno)) echo $apMaterno;
                                           if(isset($apm)) echo $apm;?>" required/>

      
      <!--input para el nombre-->
      <input id="input-registro" type="text" name="nombre" placeholder="Nombres" id="nombre" minlength="1" maxlength="30"  value="<?php if(isset($nombre)) echo $nombre;
                                if(isset($nombres)) echo $nombres;?>" pattern="[A-Z a-z]*" required />
      


      <!--Fieldset es un cuadrito donde se ingresa la informacion-->
      <!--Cada input es una caja de texto vacia que permite ingresar datos-->
      <input id="input-registro" class="form-control text-bg-light" min="1960-12-31" max="2010-12-31" type="text" name="fechaNacimiento" placeholder="Fecha de nacimiento" onclick="ocultarError();" required onfocus="(this.type='date')" onblur="(this.type='text')">
      <!--un select para paises-->
      <select id="continente_id" name="continente_id" required>

        <option value="146">Mexico</option>
        <?php foreach ($countries as $c) : ?>
          <option value="<?php echo $c->id; ?>" disabled><?php echo $c->nombre; ?></option>
        <?php endforeach; ?>
      </select>
      
      <!--un select para el estado-->
     <select id="pais_id" name="pais_id" required>
        <option value="1">Aguascalientes</option>
    </select>
    <!--select para el municipio-->
    <select id="ciudad_id" name="ciudad_id" required>
      <option value="1">Aguascalientes</option>
    </select>
    
    <!--input para el telefono-->
      <input id="input-registro" type="tel" name="telefono" placeholder="Numero" id="tel" minlength="10" maxlength="10" pattern="[0-9]*" value="<?php if(isset($telefono)) echo $telefono; ?>" required/>
      <!--input para el email-->
      <input id="input-registro" type="email" placeholder="Correo elctronico" name="email" id="email" value="<?php    if(isset($emails)) echo $emails;?>"/>
      <!--input para la contraseña-->

      
      <input id="input-registro" type="hidden" name="rol" value="N" required>
      
       

        <!--boton submit para enviar los datos-->
      <button class="submit-button w-5 fs-3" type="submit" name="registrar" value="registrar">
        Registrarme
      </button>
      
    </form>
    <?php
    include('../../controllers/conexiones/registrar.php');
    ?>
    
  </div>
</body>

</html>