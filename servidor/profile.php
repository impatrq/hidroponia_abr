<?php
include('session.php');
$conexion=mysqli_connect("localhost","root","","prueba");
if(isset($_POST['mail']) && !empty($_POST['mail'])){


	$mail = $_POST['mail'];
	
	$query = "INSERT INTO `systemsmails` (mail, username) VALUES ('$mail', '$user_check')";
		$resultt = mysqli_query($conexion, $query);
		echo "<center>E-Mail cargado en el sistema con éxito. Le llegaran alertas cuando haya problemas con tu cultivo.</center>";
	}
if(!isset($_SESSION['login_user'])){
header("location: index.php"); // Redirecting To Home Page
}
?>
<!DOCTYPE html>
    <html>
    <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Hidroponia ABR</title>
    <script type="text/javascript" src="layout.js"></script>
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    <link rel="shortcut icon" type="image/png" href="/minilogo.png"/>
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
  <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    <link href="https://fonts.googleapis.com/css?family=Roboto:300&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="estilos.css">
    
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.3/css/bulma.min.css">
<style>
  .parche {
    flex-grow: 1;
    margin: 100 auto;
    position: absolute;,
    width: 100%;
}
  .message {
    background-color: #81BB34;
    border-bottom: 10px solid;

  }
  .contenido-slider{
    width: 100%;
    height: 310px;
    display: flex;
    justify-content: space-around;
    align-items: center;
    flex-shrink: 0;
}º

.contenido-slider:nth-child(2){
    background: #0A4057;
}

body{
    font-family: 'Roboto', sans-serif;
    background: #fff;
}
.contenido-slider b{
    color: #fff;
    background: #81BB34;
    width: 100px;
    display: block;
    padding: 15px 0;
    text-align: center;
    border-radius: 3px;
    margin-top: 20px;
    text-decoration: none;
}



.contenido-slider a{
    color: #fff;
    background: #17A3E1;
    width: 100px;
    display: block;
    padding: 15px 0;
    text-align: center;
    border-radius: 3px;
    margin-top: 20px;
    text-decoration: none;
}

.contenido-slider:nth-child(3){
    background: #46641E;
    color: #fff;
}
</style>
<script type="text/javascript">

if ( window.history.replaceState ) {
  window.history.replaceState( null, null, window.location.href );
}


    </script>
<body>
<nav></nav>
<div id="profile">
<section class="section">
    <div class="container">
      <p class="title" id="welcome">
       Bienvenido! tu sistema se llama:<strong style= "color:#17A3E1";> <?php echo $login_session; ?><ion-icon name="desktop-outline"></ion-icon></strong><br>
       <br>
       <p class="subtitle">Escribí tu email para que te lleguen alertas cuando haya problemas<br>
       El sistema registrará tu útlimo email que hayas cargado y además podrás cambiarlo cuantas veces lo necesites.</p>
        <form class="form-contact" method="POST">
        <label for="inputEmail" class="sr-only">Mail</label>
        <br>
        	<input type="mail" name="mail" id="inputEmail" class="button" style="border: 2px solid #81BB34;" placeholder="nombre@email.com" required>
          <button id="sumbit" type="submit" class="button is-primary" style="background: #81BB34;">Enviar</button>
          </form>
      </p>
      <br>
      <br>
      <?php
      $ss=mysqli_query($conexion,"SELECT * FROM systemsmails WHERE username= '$user_check' ORDER BY id DESC LIMIT 1");
    while($rr=mysqli_fetch_array($ss)){
        ?>
        <p class="title">Los datos de tu sistema:</p>
    </br>
      <p class="subtitle">Último email registrado: <strong style= "color:#17A3E1";><?php echo $rr['mail'];}?></strong></p>
      <?php 
      $quer = mysqli_query($conexion,"SELECT * from systems where username = '$user_check' ORDER BY id DESC LIMIT 1");
      while($sos=mysqli_fetch_array($quer)){
      
      ?>
      <p class="subtitle">Capacidad de plantación: <strong style= "color:#17A3E1";><?php echo $sos['capacidad'];?></strong></p>
      <p class="subtitle">Versión del sistema: <strong style= "color:#17A3E1";><?php echo $sos['systype'];}?></strong></p>
      
    </section> 
  
    </div>
       <div class="contenedor">
        <div class="slider-contenedor">
            <section class="contenido-slider">
                <div>
                <h4 class="subtitle is-4">AUTOMATICO <ion-icon name="cog-outline"></ion-icon></h4>
                <h2 style="color: #000">Hidroponia ABR tine un sistema de automatización que controla el pH sin ningún tipo de problemas, vierte las nutrientes que requieren las plantas, y oxigena el agua.
                  Si el automático de su sistema tiene alguna falla, por favor contáctenos!
                </h2>
                    <a href="#" style="background: #81BB34;">Contactar</a>
                </div>
                <img src="automatic.png" alt="">

            </section>
            <section class="contenido-slider">
                <div>
                  <h4 class="subtitle is-4" style="color: #fff">MONITOREO <ion-icon name="desktop-outline"></ion-icon></h4>
                    <h2>Es posible ver constantemente los datos que entregan los sensores mediante nuestra plataforma de monitoreo!</h2>
                    <a href="./monitoreo.php">Monitoreo</a>
                </div>
                <img src="animacion.svg" alt="">

            </section>
        <section class="contenido-slider">
            <div>
              <h4 class="subtitle is-4" style="color: #fff">PROGRESO <ion-icon name="bar-chart-outline"></ion-icon></h4>
                <h2 style="color: #fffff;">Nuestro sistema de hidroponia da excelentes resultados a sus usuarios, además tenemos un sistema para poder regristrar el progreso de tu cultivo!</h2>
                <a href="./miprogreso.php">Mi progreso</a>
            </div>
            <img src="animacion3.svg" alt="">

        </section>
        <section class="contenido-slider">
            <div>
            <h4 class="subtitle is-4">AUTOMATICO <ion-icon name="cog-outline"></ion-icon></h4>
                <h2 style="color: #000">>Hidroponia ABR tine un sistema de automatización que controla el pH sin ningún tipo de problemas, vierte las nutrientes que requieren las plantas, y oxigena el agua.
                Si el automático de su sistema tiene alguna falla, por favor contáctenos!
                </h2>
                <a href="#" style="background: #81BB34;">Contactar</a>
            </div>
            <img src="automatic.png" alt="">

        </section>
    </div>
    </div>
    <br>
    <script src="main.js"></script>

    <section class="section">
    <div class="container">
  
      <a href="logout.php"><button id="logout" class="button is-primary"style="background-color: #81BB34; width:140px;">Cerrar Sesión</button></a>
</section></div>
<pie><?php
include 'footer.html';
?></pie>
</body>
</html>