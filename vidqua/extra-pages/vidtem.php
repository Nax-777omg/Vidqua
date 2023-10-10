<?php
require_once __DIR__ . "../../php-aouth/database.php";







$matricula = "-----insertar matricula------"; // se necesita agregar una matricula proporcionado por upload.php al subir video








$sql = "SELECT name FROM user WHERE matricula = ?";
$stmt = $mysqli->prepare($sql);
$stmt->bind_param("s", $matricula);
$stmt->execute();
$stmt->bind_result($user);

if ($stmt->fetch()) {
    $ilovemexico = $user;
} else {
    echo "Error: Usuario no encontrado";
    exit(); // Termina el script si el usuario no se encuentra
}

$stmt->close();

// Segunda parte

require_once __DIR__ . "../../php/videosdb.php";






$vidmad = "----insertar vidmad----"; // se necesita proporcionar un vidmad proporcionado por upload.php a la hora de subir el video






$sql = "SELECT titulo, descripcion, fecha, video FROM videos WHERE vidmad = ?";
$stmt = $mysqli->prepare($sql);
$stmt->bind_param("s", $vidmad);
$stmt->execute();
$stmt->bind_result($mititulo, $midescripcion, $mifecha, $mivideo);

if ($stmt->fetch()) {
    // La consulta se ejecutó con éxito
} else {
    echo "Error: Video no encontrado";
    exit(); // Termina el script si el video no se encuentra
}

$stmt->close();
$mysqli->close();
?>

<!DOCTYPE html>
<html>
<meta charset="UTF-8">
<link rel="stylesheet" href="../css/vidtemplate1.css">
<body>
<div class="contenedor">
    <img id="logo" src="../multimedia/1.jpg">
    <h2 ><a class="font1" href="../index.php">Vidqua™</a></h2>
    <input type="text" id="search" placeholder="Buscar en Vidqua">
    <button>buscar</button>
</div>

<video id="v51" src="<?php echo $mivideo; ?>" controls></video>
<h1 class="fontai1"><?php echo $mititulo; ?></h1>
<h4 class="font2">Publicado por <?php echo $ilovemexico; ?> el <?php echo $mifecha; ?></h4>
<button id="mostrarOcultar">Ver descripcion</button>
<p id="texto"><?php echo $midescripcion; ?></p>
<br>
<h4 class="font1">Comentarios</h4>
<script src="../javascript/descvid.js?=77dd"></script>
</body>
</html>
