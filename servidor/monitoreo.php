<?php 
$conexion=mysqli_connect("localhost","root","","prueba");
if(isset($_POST['mail']) && !empty($_POST['mail'])){


	$mail = $_POST['mail'];
	
	$queries = "INSERT INTO `persona` (mail) VALUES ('$mail')";
		$resultt = mysqli_query($conexion, $queries);
		echo "<center>E-Mail cargado en el sistema con éxito. Le llegaran alertas cuando haya problemas con tu cultivo.</center>";
	}
?>

<!DOCTYPE html>
    <html>
    <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Hidroponia ABR</title>
    <script type="text/javascript" src="layout.js"></script>
    <script type="text/javascript" src="ajax.js"></script>

    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    <link rel="shortcut icon" type="image/png" href="/minilogo.png"/>
    
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
</style>
            <!-------------------------JavaScript------------------------->
<script type="text/javascript">

if ( window.history.replaceState ) {
  window.history.replaceState( null, null, window.location.href );
}


    </script>
    </head>

    <body>
<nav></nav>
        <section class="section">
    <div class="container">
      <p class="title">
        Monitoreo del sistema<strong> Hidroponia ABR <ion-icon name="tv-outline"></ion-icon></strong>
        <br>
        <p class="subtitle">Escribí tu E-Mail para que te lleguen alertas cuando haya problemas.</p>
        <form class="form-contact" method="POST">
        <label for="inputEmail" class="sr-only">E-Mail</label>
        <br>
        	<input type="name" name="mail" id="inputEmail" class="button" style="border: 2px solid #81BB34;" placeholder="nombre@email.com" required>
          <button type="submit" class="button is-primary" style="background: #81BB34;">Enviar</button>
          </form>
      </p>
      <br>
      </div>
<<<<<<< Updated upstream
      <?php

    $sql="SELECT * FROM roberto ORDER BY id DESC LIMIT 1";
    $result=mysqli_query($conexion,$sql);

    while($mostrar=mysqli_fetch_array($result)){
    ?>
     <table class="table is-striped is-narrow is-hoverable is-fullwidth">
  <thead>
    <tr>
      <th>Tipo</th>
      <th>Niveles</th>
      <th>Estado</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th>pH Sensor <ion-icon name="water-outline"></ion-icon></th>
      <td><p>pH <span id="phValue"><?php echo $mostrar['nivelph']; ?></span></p>  
      </td>
      <td>
      <?php 
      if ([$mostrar['nivelph'] == 7]){
        echo 'pH estable';
      }
      else 'pH inestable'
      ?>
      </td>
  </tbody>
  <tbody>
    <tr>
      <th>Caudalímetro <ion-icon name="speedometer-outline"></ion-icon></th>
      <td><p><?php echo $mostrar['caudal'];?> L/min</p>  
      </td>
      <td><?php 
      if ($mostrar['caudal'] < 1){
        echo 'No está llegando suficiente agua';
      }
      else 'El agua está circulando bien'
      ?></td>
  </tbody>
  <tbody>
    <tr>
      <th>Temperatura <ion-icon name="thermometer-outline"></ion-icon></th>
      <td><p><?php echo $mostrar['temperatura'];?>° en <?php echo $mostrar['lugar'];?></p>
      </td>
      <td><?php 
      if ($mostrar['temperatura'] <= 26){
        echo 'Temperatura aceptable';
      }
      else 'Poner botella de hielo'
      ?></td>
  </tbody>
  <tbody>
    <tr>
      <th>Bomba subir pH <ion-icon name="arrow-up-outline"></ion-icon></th>
      <td><span><?php 
      if ([$mostrar['nivelph'] < 7]){
        echo 'Apagado - pH estable';
      }
      else 'Bomba activada'
      ?></span>
      </td>
      <td><?php 
      if ([$mostrar['nivelph'] == 7]){
        echo 'pH estable';
      }
      else 'pH inestable'
      ?></td>
  </tbody>
  <tbody>
    <tr>
      <th>Bomba bajar pH <ion-icon name="arrow-down-outline"></ion-icon></th>
      <td><span><?php 
      if ([$mostrar['nivelph'] > 7]){
        echo 'Apagado - pH estable';
      }
      else 'Bomba activada'
      ?></span>
      </td>
      <td>
      <?php 
      if ([$mostrar['nivelph'] == 7]){
        echo 'pH estable';
      }
      else 'pH inestable'
      ?>
      </td>
  </tbody>
    <tr>
      <th>Nutrientes <ion-icon name="leaf-outline"></ion-icon></th>
      <td><span>1mL/24 Horas</span>
      </td>
      <td>Nutrientes estables</td>
  </tbody>
</table>
</section>
=======
>>>>>>> Stashed changes
<?php
include 'submonitoreo.php';
?>
<<<<<<< Updated upstream


=======
>>>>>>> Stashed changes
    <pie></pie>

<script>
var datosreload = new XMLHttpRequest();
datosreload.open('GET', 'datos.php');
// datosreload.setRequestHeader('Content-Type', 'text/plain');
datosreload.send();
datosreload.onload = function (data) {
    // document.querySelector("pie").innerHTML = data.currentTarget.response;
    console.log(datosreload.content)
    };
</script>
        </body>
        </html>