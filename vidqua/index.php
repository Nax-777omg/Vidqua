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
<link rel="stylesheet" href="css/index.css?=fffffhhhhkkllllddddd            ">
<link rel="icon" href="
multimedia/1.jpg">
<title>Vidqua</title>
</head>


<body>



<header>

<div class="contenedor">

<img id="logo" src="multimedia/1.jpg">

    <h2 class="font1">Vidqua ™</h2>   

<input type="text" id="search" placeholder="Buscar en Vidqua">






    <?php if (isset($user)): ?>
    
<?php

if (isset($_SESSION["user_id"])) {
    $mysqli = require __DIR__ . "/php-aouth/database.php";
    
    $sql = "SELECT user_pic FROM user
            WHERE id = {$_SESSION["user_id"]}";
            
    $result = $mysqli->query($sql);
    

    if ($result && $result->num_rows > 0) {
        $userpic = $result->fetch_assoc(); 

        echo "<img id=\"ppic\" src=\"" . $userpic['user_pic'] . "\">";


    } 
}
?>
        
        <p id="text1"class="font1">Hola <?= htmlspecialchars($user["name"])  ?> </p>
        
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










<?php
// Primera conexión a la base de datos 'videos_db'
require_once __DIR__ . "/php/videosdb.php";

$sql = "SELECT * FROM videos WHERE vidmad IS NOT NULL;";
$result = $conn_videos->query($sql);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $matricula = $row['matricula'];

        // Segunda conexión a la base de datos 'login_db'
        require_once __DIR__ . "/php-aouth/database.php";

        $matricula = mysqli_real_escape_string($conn_oauth, $matricula);
        $sql_user = "SELECT user_pic FROM user WHERE matricula = '$matricula'";
        $user_result = $conn_oauth->query($sql_user);
        
        if ($user_result->num_rows > 0) {
            $user_row = $user_result->fetch_assoc();
            $user_picss = $user_row['user_pic'];
        } else {
            $user_picss = "ruta_por_defecto_si_no_se_encuentra_la_imagen.jpg";
        }

        echo "<div id=\"respectivo\" onclick=\"func_" . $row['vidmad'] . "()\">";
        echo "<img id=\"miniatura\" src='" . $row['miniatura'] . "' >";
        echo "<br><br><h4 class=\"fontmin1\">" . $row['titulo'] . "</h4>";
        echo "<img id=\"ppicss\" src='" . $user_picss . "' >";
        echo "<p class=\"fontmin2\">" . $row['nombre_de_usuario'] . "</p>";
        echo "<p class=\"fontmin3\">" . $row['fecha'] . "</p>";
        echo "</div>";

        echo "<script>
        function func_" . $row['vidmad'] . "() {
            window.location.href = '" . $row['archivo_php'] . "';
        }
        </script>";
    }
} else {
    echo "<h1 class=\"font1\"> Al parecer no se han subido videos a Vidqua.</h1>";
    echo "<p class=\"font1\">Codigo de error 001</p>";
}

// Cerrar las conexiones al final del script
$conn_videos->close();
$conn_oauth->close();
?>


















































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