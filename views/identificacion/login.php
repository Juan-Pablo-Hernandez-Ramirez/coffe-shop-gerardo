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
	<script src="https://accounts.google.com/gsi/client" async defer></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    <script src="https://unpkg.com/jwt-decode/build/jwt-decode.js"></script>
	<!--titulo de nuestra pagina-->
	<title> Login </title>
</head>
<!--encabezado de nuestra pagina-->
<nav>
  <ul class="choose-color">
      <li><a href="../index.php">Menu</a></li><!--enlace para llevarte al registro-->
  </ul>
</nav>
<body class="background">

	<main>
		<table class="align-x w-2 cmy-6">
			<tr>
			    
			    
				<!-- CONTENIDO (LOGIN) -->


				<td class=" cp-5 ta-c" id="data-content">
				    <!--la imagen-->
				    <img src="../../assets/images/logo/logo.jpg" alt="">
				    <h1 class="align-x w-5 fc-1 fs-1 cmb-4 ta-c"> ¡Ingresa a Coffee Shop! </h1><!--titulo-->
				    <!--formulario que te lleva a la validacion de login-->
						<!--input para el email-->
   <div id="g_id_onload"
     data-client_id="286577150804-8qfbf77i9lj1rinqct5rpmdhbh1s7pst.apps.googleusercontent.com"
     data-context="signin"
     data-ux_mode="popup"
     data-callback="handleCredentialResponse"
     data-itp_support="true">
</div>

<div class="g_id_signin"
     data-type="standard"
     data-shape="pill"
     data-theme="outline"
     data-text="signin_with"
     data-size="large"
     data-logo_alignment="left">
</div>

				</td>
			</tr>
		</table>
	</main>

<script>
  function handleCredentialResponse(response) {
     // decodeJwtResponse() is a custom function defined by you
     // to decode the credential response.
     const responsePayload =jwt_decode(response.credential);
     
     
     
     function redirect_by_post(purl, pparameters, in_new_tab) {
    pparameters = (typeof pparameters == 'undefined') ? {} : pparameters;
    in_new_tab = (typeof in_new_tab == 'undefined') ? true : in_new_tab;

    var form = document.createElement("form");
    $(form).attr("id", "reg-form").attr("name", "reg-form").attr("action", purl).attr("method", "post").attr("enctype", "multipart/form-data");
    if (in_new_tab) {
        $(form).attr("target", "_blank");
    }
    $.each(pparameters, function(key) {
        $(form).append('<input type="text" name="' + key + '" value="' + this + '" />');
    });
    document.body.appendChild(form);
    form.submit();
    document.body.removeChild(form);

    return false;
}
    
     redirect_by_post('./validacion.php',{
        email : responsePayload.email,
        nombre : responsePayload.given_name,
        apellidos : responsePayload.family_name
    }, false);
}
 
</script>
</body>