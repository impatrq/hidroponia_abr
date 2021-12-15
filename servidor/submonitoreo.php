<?php
$conexion=mysqli_connect("localhost","root","","prueba");


    $sql="SELECT * FROM roberto ORDER BY id DESC LIMIT 1";
    $result=mysqli_query($conexion,$sql);

    while($mostrar=mysqli_fetch_array($result)){
    ?>
    </div>
    <div id="actualizar">
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
      if ([$mostrar['nivelph'] == 3]){
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
      if ([$mostrar['caudal'] > 1]){
        echo 'El agua está circulando bien';
      }
      else 'No está llegando suficiente agua'
      ?></td>
  </tbody>
  <tbody>
    <tr>
      <th>Temperatura del ambiente <ion-icon name="thermometer-outline"></ion-icon></th>
      <td><p><?php echo $mostrar['temperatura'];?>° en <?php echo $mostrar['lugar'];?></p>
      </td>
      <td><?php 
      if ([$mostrar['temperatura'] <= 26]){
        echo 'Temperatura aceptable';
      }
      else 'Poner botella de hielo'
      ?></td>
  </tbody>
  <tbody>
    <tr>
      <th>Temperatura del agua <ion-icon name="thermometer-outline"></ion-icon></th>
      <td><p><?php echo $mostrar['tempagua'];?></p>
      </td>
      <td><?php 
      if ([$mostrar['tempagua'] <= 26]){
        echo 'Temperatura aceptable';
      }
      else 'Poner botella de hielo'
      ?></td>
  </tbody>
  <tbody>
    <tr>
      <th>Bomba subir pH <ion-icon name="arrow-up-outline"></ion-icon></th>
      <td><span><?php 
      if ([$mostrar['nivelph'] < 3]){
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
      if ([$mostrar['nivelph'] > 3]){
        echo 'Apagado - pH estable';
      }
      else 'Bomba activada'
      ?></span>
      </td>
      <td>
      <?php 
      if ([$mostrar['nivelph'] == 3]){
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
<?php
}
?>
</div>