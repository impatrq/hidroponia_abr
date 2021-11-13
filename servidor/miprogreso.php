<?php 
    $conexion=mysqli_connect("localhost","root","","hidroponiabr");

    if(!empty($_POST['nombre'])){
        $nombre=$_POST['nombre'];

        if(!empty($_POST['id'])){
            $id_maximo=$_POST['id'];
            mysqli_query($conexion,"UPDATE persona SET nombre='$nombre' WHERE id='$id_maximo'");
            echo '&nbsp<p class="subtitle">&nbspSE HA ACTUALIZADO LA INFORMACION CON EXITO</p><br>';
        }else{
            $sql=mysqli_query($conexion,"SELECT id FROM persona WHERE nombre='$nombre'");
            if($row=mysqli_fetch_array($sql)){
                echo '&nbsp<p class="subtitle">&nbspNO SE PERMITEN DATOS DUPLICADOS EN LA BASE DE DATOS</p><BR><BR>';
        }else{ 
            mysqli_query($conexion,"INSERT INTO persona (nombre) VALUES ('$nombre')");
            $ss=mysqli_query($conexion,"SELECT MAX(id) as id_maximo FROM persona");
            if($rr=mysqli_fetch_array($ss)){
                 $id_maximo=$rr['id_maximo'];
            }
            echo '&nbsp<p class="subtitle">&nbspSE HA REGISTRADO CON EXTIO</p><br>';
            
        }
    }
        $nameimagen=$_FILES['imagen']['name'];
        $tmpimagen=$_FILES['imagen']['tmp_name'];
        $urlnueva="imagen/foto_".$id_maximo.".jpg";
        if(is_uploaded_file($tmpimagen)){
                copy($tmpimagen,$urlnueva);
                echo '&nbsp<p class="subtitle">&nbspIMAGEN CARGADA CON EXITO</p>';
        }else{
                echo '&nbsp<p class="subtitle">&nbspERROR AL CARGAR LA IMAGEN</p>';

            }
}

?>
<title>Mi progreso</title>
<script type="text/javascript" src="layout.js"></script>
<script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
<link rel="shortcut icon" type="image/png" href="/minilogo.png"/>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.3/css/bulma.min.css">
<style>
  .parche {
    flex-grow: 1;
    margin: 100 auto;
    position: absolute;
    width: 100%;
}

</style>

<script>

if ( window.history.replaceState ) {
  window.history.replaceState( null, null, window.location.href );
}

    </script>

<nav></nav>
<form name="form" action="" method="post" enctype="multipart/form-data">
<section class="section">
    <div class="container">
      <p class="title">
        Sistema de progreso de<strong> Hidroponia ABR <ion-icon name="bar-chart-outline"></ion-icon></strong>
      </p>
      <p class="subtitle">Mediante esta función podrás guardar tus fotos semanales del progreso de tu cultivo!</p>

      <p class="subtitle">Semana <ion-icon name="calendar-outline"></ion-icon></p>
    <input class="button" name="nombre" automplete="off" required value="" style="border: 2px solid #81BB34;" placeholder="Número de semana"><br><br>

    <p class="subtitle">Seleccionar Imagen <ion-icon name="image-outline"></ion-icon> </p>
    <input type="file" class="button is-link" style="background: #17A3E1" name="imagen" id="imagen"><br><br>
    <button type="sumbit" class="button is-primary" style="background: #81BB34;">Aceptar</button>
</form><br><br>
</div>


<table class="table is-striped" width="100%">
<thead>
      
<tr>    

        <td><center><p class="subtitle"><strong>Imagen del cultivo <ion-icon name="image-outline"></strong></p></center></td>
        <td><center><p class="subtitle"><strong>Semana <ion-icon name="calendar-outline"></strong></p></center></td>
        <td><center><p class="subtitle"><strong>Arreglar <ion-icon name="build-outline"></ion-icon></strong></p></center></td>
       
</tr>

</thead>
<?php
    $ss=mysqli_query($conexion,"SELECT * FROM persona ORDER BY nombre");
    while($rr=mysqli_fetch_array($ss)){
?>
<tr>
    <td>
        <br><br>
        <center>
            <img src="imagen/foto_<?php echo $rr['id']; ?>.jpg?<?php echo rand(0,1000);?>" width="500px" height="500px">
        </center>
        <br>

    <br>
    </td>
    <td><center><p class="subtitle" style="margin-top: 44px"><?php echo $rr['nombre']; ?></td></p></center>
    <td>
        <center>
            <form name="form" action="" method="post" enctype="multipart/form-data">
                <input type="hidden" name="id" value="<?php echo $rr[0]; ?>">
                <p class="subtitle">Semana</p>
                <input type="text" class="button" name="nombre" automplete="off" style="border: 2px solid #81BB34;" required value="<?php echo $rr['nombre']; ?>"><br><br>
                <p class="subtitle">Seleccionar Imagen</p>
                <input type="file" class="button is-link" style="background: #17A3E1" name="imagen" id="imagen"><br><br>
                <button type="sumbit" class="button is-primary" style="background: #81BB34;">Arreglar</button>
                </form>
        </center>
    </td>
    </tr>
    <?php } ?>
    </table>
    </section>
    <div class="parche">

    <pie></pie>
    </div>


    
