<!DOCTYPE html>
<html lang="es">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0,
	maximum-scale:2.0, user scalable-1" />
	<!--hacemos las conexiones hacia los estilos de css-->
	<link rel="stylesheet" href="../../assets/styles/style.css?uuid=<?php echo uniqid();?>" />
	<link rel="stylesheet" href="../../assets/styles/spacing.css?uuid=<?php echo uniqid();?>" />
	<link rel="stylesheet" href="https://fonts.googleapis.com/styles2?family=Roboto+Bold">
	<!--Titulo-->
	<title> Login </title>
</head>
<!--nuestro encabezado de la pagina aqui va el enlace para registrarse-->
<nav>
  <ul class="choose-color">
      <li><a href="../../views/identificacion/registro.php">Registro</a></li>
  </ul>
</nav>
<body class="background">
	<script src="./validacionFormato.js"></script>

	<main>
		<table class="align-x w-2 cmy-6">
			<tr>
			    
			    
				<!-- CONTENIDO (LOGIN) -->


				<td class=" cp-5 ta-c" id="data-content">
				    <img src="../../assets/images/logo/logo.jpg" alt="">
				    <!--titulo -->
				    <h1 class="align-x w-5 fc-1 fs-1 cmb-4 ta-c"> LOGIN </h1>
					<form action="/controllers/validaciones/validacionLogin.php" method="post">
						<h2 class="fc-3 fs-2"> Email </h2>
						<!--input para poner datos-->
						<input id="input-login" placeholder="Email"      class="login-input" requiered type="email"    name="email" id="email" value="<?php if(isset($email)) echo "$email" ?>">
						<h2 class="fc-3 fs-2"> Contraseña </h2>
						<!--input para datos-->
						<input id="input-login" placeholder="Contraseña" class="login-input" requiered type="password" name="password">
						<!--boton tipo submit para enviar datos-->
						<button type="submit" class="submit-button w-4 fs-3"> Iniciar sesion </button>
						

                    <!--se cierran todas las etiquetas-->
						
					</form>

				</td>
			</tr>
		</table>
	</main>

</body>