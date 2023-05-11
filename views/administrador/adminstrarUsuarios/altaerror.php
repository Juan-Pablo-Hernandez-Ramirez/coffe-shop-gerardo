<?php
    //si la sesion esta iniciada entonces te llevara al html
    session_start();
    if(isset($_SESSION['email'])){
?>



<?php
//incluimos una conexion a la bd
include('../../../controllers/conexiones/conexionMain.php'); 
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
    $password = $_POST['password'];
    $expresion = "/   ?/i";
    $expass = "/[1? 2? 3? 4? 5? 6? 7? 8? 9? 0? $? #? &? :? ;? ,? .? !? ]/";
    
  }
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Alta Usuario</title>
      <!--Libreria para hacer modificaciones dinamicas -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    <!--este php hace que se actualice el css-->
    <link rel="stylesheet" href="../../../assets/styles/style.css?uuid=<?php echo uniqid(); ?>">
    <link rel="stylesheet" href="../../../assets/styles/spacing.css?uuid=<?php echo uniqid(); ?>">

</head>

<!--encabezado -->
<nav>
  <ul class="choose-color">
      <!--un enlace hacia la tabla de usuarios-->
    <li><a href="./visualizarUsuario.php">Volver</a></li>
  </ul>
</nav>

<!--cuerpo del html-->
<body>

    <script src="./validacionUsuario.js"></script>
    <div class="container align-x w-5 cmy-5 cp-5">

        <!--titulo en grande-->
        <h2 class=""> Registra un nuevo Usuario </h2>
        
        <!--Register-->
       <form action="../../../controllers/conexiones/conexionAltaUsuario.php" method="post">
            <!--Inicio del formulario-->
            <!--minleingth es el minimo de caracteres, maxlength es el numero de caracteres maxlength el numero de caracteres maximos-->

            <!--un input para el email-->
            <input id="input-alta-usuario" type="email" placeholder="Correo elctronico" name="email" id="email"  minlength="4" maxlength="40"  required/>
                    
            <!--input para la contraseña-->  
            <input id="input-alta-usuario" name="password" type="password" placeholder="Contraseña" id="password" minlength="10" maxlength="30" pattern="[A-Z a-z áéíóúÁÉÍÓÚñÑ 0-9 $]*" required/>
                    
            <!--input para el nombre-->    
            <input id="input-alta-usuario" type="text" name="nombre" placeholder="Nombres" id="nombre" pattern="[A-Z a-z áéíóúÁÉÍÓÚñÑ]*" minlength="4" maxlength="40" pattern="[A-Z a-z áéíóúÁÉÍÓÚñÑ]*" required />
      
            <!--input para el apellido paterno-->
            <input id="input-alta-usuario" type="text" placeholder="Apellido paterno" name="apPaterno" id="apPaterno" pattern="[A-Z a-z áéíóúÁÉÍÓÚñÑ]*" minlength="4" maxlength="40" pattern="[A-Z a-z áéíóúÁÉÍÓÚñÑ]*" required/>
            <!--input para el apellido materno-->
            <input id="input-alta-usuario" type="text" name="apMaterno" placeholder="Apellido materno" id="apMaterno" pattern="[A-Z a-z áéíóúÁÉÍÓÚñÑ]*" minlength="4" maxlength="40" pattern="[A-Z a-z áéíóúÁÉÍÓÚñÑ]*" required/>
            


            <!--Fieldset es un cuadrito donde se ingresa la informacion-->
            <!--Cada input es una caja de texto vacia que permite ingresar datos-->
            
            
            <!--input para la fecha de nacimiento-->
            <input id="input-alta-usuario" name="fechaNacimiento" id="fecha" type="date" min="1960-12-31" max="2010-12-31" required />
            

            <!--un select para ociones de paises-->
            <select id="continente_id" name="continente_id" required>
    
                <option value="null"><b>Selecciona un pais </b></option>
                <option value="146">Mexico</option>
                <?php foreach ($countries as $c) : ?>
                  <option value="<?php echo $c->id; ?>" disabled><?php echo $c->nombre; ?></option>
                <?php endforeach; ?>
            </select>
      
            <!--un select para estados-->
            <select id="pais_id" name="pais_id" required>
                <option value="null">--Selecciona un estado--</option>
            </select>
            <!--un select para municipios-->
            <select id="ciudad_id" name="ciudad_id" required>
              <option value="null">--Selecciona un municipio--</option>
            </select>
            
            
            <!--input para agregar el telefono-->
            <input id="input-alta-usuario" type="tel" name="telefono" placeholder="Numero" id="tel" minlength="10" maxlength="10" pattern="[0-9]*" required/>
            
            <!--select para los roles-->
            <select name="rol" id="rol" required>
                <option value="">Roles</option>
                <option value="A">Administrador</option>
                <option value="U">Usuario</option>
            </select>
            
            <p>*La contraseña ingresada no es valida incluye una mayuscula, minusculas, numeros y un caracter especial ($ #)</p>
            <!--boton submit para enviar datos-->
            <button type="submit" class="submit-button w-5 fs-3" value="registrar" name="registrar"> Registrar usuario </button>
            

        </form>
            
    </div>


    
<script type="text/javascript">
//fffff
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
  