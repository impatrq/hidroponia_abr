<?php
$conexion=mysqli_connect("localhost","root","","prueba");

    $ss=mysqli_query($conexion,"SELECT * FROM systems WHERE usuario= 'system2' ORDER BY id DESC LIMIT 1");
    while($rr=mysqli_fetch_array($ss)){
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
      <td><p>pH <span id="phValue"><?php echo $rr['nivelph']; ?></span></p>  
      </td>
      <td>
      <?php 
      if ([$rr['nivelph'] == 3]){
        echo 'pH estable';
      }
      else 'pH inestable'
      ?>
      </td>
  </tbody>
  <tbody>
    <tr>
      <th>Caudalímetro <ion-icon name="speedometer-outline"></ion-icon></th>
      <td><p><?php echo $rr['caudal'];?> L/min</p>  
      </td>
      <td><?php 
      if ([$rr['caudal'] > 1]){
        echo 'El agua está circulando bien';
      }
      else 'No está llegando suficiente agua'
      ?></td>
  </tbody>
  <tbody>
    <tr>
      <th>Temperatura del ambiente <ion-icon name="thermometer-outline"></ion-icon></th>
      <td><p><?php echo $rr['temperatura'];?>° en <?php echo $rr['lugar'];?></p>
      </td>
      <td><?php 
      if ([$rr['temperatura'] <= 26]){
        echo 'Temperatura aceptable';
      }
      else 'Poner botella de hielo'
      ?></td>
  </tbody>
  <tbody>
    <tr>
      <th>Temperatura del agua <ion-icon name="thermometer-outline"></ion-icon></th>
      <td><p><?php echo $rr['tempagua'];?></p>
      </td>
      <td><?php 
      if ([$rr['tempagua'] <= 26]){
        echo 'Temperatura aceptable';
      }
      else 'Poner botella de hielo'
      ?></td>
  </tbody>
  <tbody>
    <tr>
      <th>Bomba subir pH <ion-icon name="arrow-up-outline"></ion-icon></th>
      <td><span><?php 
      if ([$rr['nivelph'] < 3]){
        echo 'Apagado - pH estable';
      }
      else 'Bomba activada'
      ?></span>
      </td>
      <td><?php 
      if ([$rr['nivelph'] == 7]){
        echo 'pH estable';
      }
      else 'pH inestable'
      ?></td>
  </tbody>
  <tbody>
    <tr>
      <th>Bomba bajar pH <ion-icon name="arrow-down-outline"></ion-icon></th>
      <td><span><?php 
      if ([$rr['nivelph'] > 3]){
        echo 'Apagado - pH estable';
      }
      else 'Bomba activada'
      ?></span>
      </td>
      <td>
      <?php 
      if ([$rr['nivelph'] == 3]){
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
</div>
<?php
}
?>