$(document).ready(function(){ setInterval(loadClima,5000);
});

function loadClima(){ $("#actualizar").load("submonitoreo.php"); } 