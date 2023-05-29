<!DOCTYPE html>
<html lang="es">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0,
	maximum-scale:2.0, user scalable-1" />
	<!--llamamos a nuestros estilos de css-->
	<link rel="stylesheet" href="../../assets/styles/style.css?uuid=<?php echo uniqid();?>" />
	<link rel="stylesheet" href="../../assets/styles/spacing.css?uuid=<?php echo uniqid();?>" />
	<link rel="stylesheet" href="https://fonts.googleapis.com/styles2?family=Roboto+Bold">
	<!--titulo de nuestra pagina-->
	<title> Login </title>
</head>
<!--encabezado de nuestra pagina-->
<nav>
  <ul class="choose-color">
      <li><a href="./registro.php">Registro</a></li><!--enlace para llevarte al registro-->
  </ul>
</nav>
<body class="background">
	<script src="./validacionFormato.js"></script>

	<main>
		<table class="align-x w-2 cmy-6">
			<tr>
			    
			    
				<!-- CONTENIDO (LOGIN) -->


				<td class=" cp-5 ta-c" id="data-content">
				    <!--la imagen-->
				    <img src="../../assets/images/logo/logo.jpg" alt="">
				    <h1 class="align-x w-5 fc-1 fs-1 cmb-4 ta-c"> ¡Ingresa a Coffee Shop! </h1><!--titulo-->
				    <!--formulario que te lleva a la validacion de login-->
					<form action="../../controllers/validaciones/validacionLogin.php" method="post">
						<!--input para el email-->
						<div class="form-input-container">
							<input id="input-login" placeholder=" " class="form-input w-4" placeholder=" " requiered type="email"    name="email" id="email" value="<?php if(isset($email)) echo "$email" ?>" required>
							<label class="floating-label">Email</label>
						</div>
						<!--input para la contraseña-->
						<div class="form-input-container">
							<input id="input-login" placeholder=" " class="form-input w-4" requiered type="password" name="password" required type="text">
							<label class="floating-label">Contraseña</label>
						</div>
						
						<!--boton submit para enviar datos-->
						<button type="submit" class="submit-button w-4 fs-5"> Iniciar sesion </button>
						

						
					</form>

				</td>
			</tr>
		</table>
	</main>

</body>





