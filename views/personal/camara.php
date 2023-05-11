<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>


<body>
  <h1>scanear qr</h1>

  <video id="qr" style="width:100px height:120px;"></video>

  <!--llama a una libreria de java script-->
  <script src="https://rawgit.com/schmich/instascan-builds/master/instascan.min.js"></script>

  <script>

    //creo una variable como scanner

    let scanner = new Instascan.Scanner({
      //selecciono un elememto por el id 
      video: document.getElementById('qr')
    });


    //scanea el qr 
    scanner.addListener('scan', function(content) {
      //aqui imprimimos lo del qr en consola
      console.log(content);
      window.location.href=content;
    });

    //accede a la camara 
    Instascan.Camera.getCameras().then(function(cameras) {
      if (cameras.length > 0) {
        scanner.start(cameras[0]);
      } else {
        console.error('no se han encontrado las camaras mi estimado');
      }
    });


  </script>

</body>

</html>