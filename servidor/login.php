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


    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
<script type="text/javascript" src="ajax.js"></script>
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
<center>
        <section class="section">
    <div class="container">
    <p class="title">
       Logeo</p>
       <p class="subtitle">Ingresá tu cuenta para acceder al sistema.</p>
    <form class="box" style="width: 700px;">
  <div class="field">
    <label class="label">Email</label>
    <div class="control">
      <input class="input" type="email" style="border: 2px solid #81BB34; width: 220px;" placeholder="e.g. alex@example.com">
    </div>
  </div>

  <div class="field">
    <label class="label">Contraseña</label>
    <div class="control">
      <input class="input" type="password" style="border: 2px solid #81BB34; width: 220px;" placeholder="********">
    </div>
  </div>

  <button class="button is-primary" style="background-color: #81BB34;">Ingresar</button>
</form>
      </p>
      <br>
</section>
</div>
</center>
      </div>
    <pie></pie>
        </body>
        </html>