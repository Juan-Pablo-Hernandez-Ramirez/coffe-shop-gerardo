<?php

include_once "funciones.php";

 
     hacerQueNoComprenMasDeUnaVez();
 
 $idco = crearhistorial();

 $idtic = crearticket($idco);

 header('Location: ./ticket.php?id='.$idtic);
?>