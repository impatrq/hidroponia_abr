<?php
include('login.php'); // Includes Login Script
if(isset($_SESSION['login_user'])){
header("location: profile.php"); // Redirecting To Profile Page
}
?>
<!DOCTYPE html>
    <html>
    <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Hidroponia ABR</title>
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
<link href="style.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.3/css/bulma.min.css">
<style>
  .footer {
background-color: #17A3E1;
color: #fff;
bottom: 0;  
border-top: 10px solid #81BB34;
width: 100%;
height: 35px;

 }

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

  .navbar-item, .navbar-link {
  color: #fff;

}

.navbar-dropdown .navbar-item {
    color: #000;
    padding-left: 1.5rem;
    padding-right: 1.5rem;
}


.navbar {
background-color: #17A3E1;
border-bottom: 10px solid #81BB34;

}

.navbar-item:hover{
  background-color: #0000;

}
</style>
<link rel="shortcut icon" type="image/png" href="/minilogo.png"/>

</head>
<body>
<center>
        <section class="section">
    <div class="container">
    <div id="login">
    <p class="title">
       Logeo</p>
       <p class="subtitle">Ingresá tu cuenta para acceder al sistema.</p>
       <form action="" method="post" class="box" style="width: 700px;">
  <div class="field">
  &nbsp;<img src="https://imgur.com/FX6p4Nv.png" width="200" height="28">
<label class="label"><ion-icon name="person-circle-outline"></ion-icon>Nombre del Sistema:</label>
<div class="control">
<input class="input" style="border: 2px solid #81BB34; width: 220px;" id="name" name="username" placeholder="Sistema" type="text">
</div>
</div>
<div class="field">
<label class="label"><ion-icon name="key-outline"></ion-icon>Contraseña:</label>
<div class="control">
<input class="input" style="border: 2px solid #81BB34; width: 220px;" id="password" name="password" placeholder="**********" type="password"><br><br>
</div>
  </div>
<input name="submit" type="submit" value=" Ingresar " class="button is-primary"style="background-color: #81BB34;"><br><br>
<span><?php echo $error;?></span>
</form>
</div>
</div>
</section>
<?php include 'footer.html';?>
</body>
</html>