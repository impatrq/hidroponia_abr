<?php 
$conexion=mysqli_connect("localhost","root","","prueba");
?>
<!DOCTYPE html>
    <html>
    <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Hidroponia ABR</title>
    <script type="text/javascript" src="layout.js"></script>
    <link rel="shortcut icon" type="image/png" href="/minilogo.png"/>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.3/css/bulma.min.css">
<style>
  .parche {
    flex-grow: 1;
    margin: 100 auto;
    position: absolute;,
    width: 100%;
}
</style>
            <!-------------------------JavaScript------------------------->
  <script>
    setInterval(function()
    {
      getPHval();
    }, 2000);
    
    function getPHval()
    {
      var PHvalRequest = new XMLHttpRequest();
      PHvalRequest.onreadystatechange = function()
      {
        if(this.readyState == 4 && this.status == 200)
        {
          document.getElementsByTagName('body')[0].innerHTML = 
          this.responseText;
        }
      };
      PHvalRequest.open("GET", "readPH", true);
      PHvalRequest.send();
    }
    </script>
    </head>

    <body>
<nav></nav>
        <section class="section">
    <div class="container">
      <p class="title">
        Monitoreo del sistema<strong> Hidroponia ABR</strong>
        <br></br>
      </p>
      </div>
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
      <th>pH Sensor <spab></th>
      <td><p>Nivel de pH: <strong><span id="PHvalue"></span><?php echo $mostrar['nivelph']; ?></strong></p>  
      </td>
      <td>pH estable</td>
  </tbody>
  <tbody>
    <tr>
      <th>Caudalímetro</th>
      <td><p><strong><?php echo $mostrar['caudal']; ?> L/min</strong></p>
      </td>
      <td>El agua circula bien</td>
  </tbody>
  <tbody>
    <tr>
      <th>Bomba subir pH ↑</th>
      <td><span>Apagado</span>
      </td>
      <td>pH estable</td>
  </tbody>
  <tbody>
    <tr>
      <th>Bomba bajar pH ↓</th>
      <td><span>Apagado</span>
      </td>
      <td>pH estable</td>
  </tbody>
    <tr>
      <th>Nutrientes</th>
      <td><span><strong>1mL/24 Horas</span></strong>
      </td>
      <td>Nutrientes estables</td>
  </tbody>
</table>
</section>
<?php
}
?>


    <pie></pie>


        </body>
        </html>