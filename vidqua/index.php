<?php

session_start();

if (isset($_SESSION["user_id"])) {
    
    $mysqli = require __DIR__ . "/php-aouth/database.php";
    
    $sql = "SELECT * FROM user
            WHERE id = {$_SESSION["user_id"]}";
            
    $result = $mysqli->query($sql);
    
    $user = $result->fetch_assoc();
}
?>


<html>
<head>
<meta charset="UTF-8">
<link rel="stylesheet" href="css/index.css?=                ">
<link rel="icon" href="">
<title>Vidqua</title>
</head>


<body>



<header>

<div class="contenedor">

<img id="logo" src="multimedia/1.jpg">

    <h2 class="font1">Vidqua ™</h2>   

<input type="text" id="search" placeholder="Buscar en Vidqua">






    <?php if (isset($user)): ?>
        
        <p id="text1"class="font1">Hola <?= htmlspecialchars($user["name"])  ?> ! </p>
        
        <a class="font1" href="php-aouth/logout.php">Log out</a>
        
    <?php else: ?>
        
        <a id="text1" class="font1" href="extra-pages/aouth.html">Login / Registrarse</a>    
        
    <?php endif; ?>



    
</div>

    <p id="randomtext" class="font2"></p>

</header>
<div id="cpanel">
<br>
<br>
<a class="font3" href="#">Inicio</a>
<br>
<br>
<a class="font3">Configuracion</a>
<br>
<br>
<a href="extra-pages/congress.html" class="font3">Votar</a>
<br>
<br>
<a href="extra-pages/blog/DMCACLAIMS.html" class="font3">Copyright ©</a>
<br>
<br>
<a href="extra-pages/upload.html"class="font3">Subir video</a>
<br>
<br>
<a href="extra-pages/abds.html"class="font3">ABDS™</a>
<br>
<br>
<a href="extra-pages/blogindex.html"class="font3">Blogs</a>
<br>
<br>
<br>

<h4 class="font4" >Noticias vidqua</h4>


<p class="font5">1.- Vidqua abre sus puertas</p>

<p class="font5">
Vidqua abre sus puertas a toda la comunidad del tec de monterrey campus ccm , este es un projecto nuevo que hemos estado realizando
y estamos muy orgullosos de que todas la personas en la comunidad lo puedan conocer .
</p>
<br>
<p class="font5">2.- Cambios a las normativas</p>
<p class="font5">
Se le infroma a toda la comunidad de vidqua de que se han estado realizado cambios a todas la normativas de la comunidad
</p>
<br>
<p class="font5">2.- Rompiendo records</p>
<p class="font5">
hemos presentado nuestro primer usuario , eso significa que ahora tenemos infinitas veces mas usuarios que antes
por lo que ahora somos los reyes del hosting de video , JAJAJAJAJA
</p>
<br>
<br>
<h2 class="font4">Videos Nuevos</h2>

<p class="font5">lo sentimos, no hay videos nuevos.</p>

<img id="banner" src="multimedia/2.png">






</div>


<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>

<footer>


<h2 class="font1">Vidqua ™</h2>

<hr>

<p class="font2">Sitio programado por @nax_isma</p>

<p class="font2">Html🌐  Css🎨  Js🖥️  php🐘</p>
<p class="font2">#Team php ∞</p>
</footer>


</body>

<script></script>
<script src="javascript/wordchanging.js"></script>

</html>