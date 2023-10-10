<?php 






/*

se necesitan hacer multiples mejoras para evitar que si subo exactamente el mismo video con mismo tirulo y 
descripcion haya duplicados de video , esto se lograria creando otra variable autoincrementable independiente al
id , si , una matricula de video era necesaria.

aparte se necesita hacer lo mismo para prevenir suplicado de videos.




*/




function quitarCaracteresEspeciales($cadena) {
    // Eliminar caracteres especiales y dejar solo letras y números
    $cadenaLimpia = preg_replace('/[^a-zA-Z0-9]/', '', $cadena);
    return $cadenaLimpia;
}












session_start();

require_once __DIR__ . "../../php-aouth/database.php";

$title = $_POST["titulo"];

$titleLimpio = quitarCaracteresEspeciales($title);

$description = $_POST["descripcion"];
$ilovepoland = "";



if (empty($title)){
echo "<h1>Un titulo es obligatorio</h1>";
exit();
}







$vidmad;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_SESSION["user_id"])) {
        $sql = "SELECT * FROM user WHERE id = {$_SESSION["user_id"]}";
        $result = $mysqli->query($sql);
        if ($result) {
            $user = $result->fetch_assoc();
            $ilovepoland = $user["name"];
        }
    }
    if (empty($ilovepoland)) {
        header("Location: ../extra-pages/vunl.html");
        exit;
    }
}




$matricula = "";
$sql = "SELECT matricula FROM user WHERE name = ?";
$stmt = $mysqli->prepare($sql);
$stmt->bind_param("s", $ilovepoland);
$stmt->execute();
$stmt->bind_result($matricula);
if ($stmt->fetch()) {
    $matriculaUsuario = $matricula;
} 



else {

}


$stmt->close();

$randnum1 = rand(1,100);
$randnum2 = rand(1,100);
$dia = date("d");
$mes = date("m");
$año = date("Y");
$fecha = "$dia/$mes/$año";




$dangerousExtensions1 = array("exe", "sh", "bat", "cmd", "com", "vb", "vbs", "ps1", "js", "jse", "jar", "war", "ear", "php", "asp", "aspx", "jsp", "jspx", "cfm", "pl", "py", "rb", "cgi", "dll", "so", "app", "dmg", "iso", "img", "zip", "rar", "tar", "gz", "bz2", "7z", "tgz", "tar.bz2", "tar.xz", "sql", "mdb", "accdb", "bak", "db", "ini", "conf", "env", "config", "htaccess", "htpasswd", "log", "txt", "csv", "xlsx", "doc", "docx", "pdf", "ppt", "pptx", "xls", "xml", "json", "svg", "ico", "html", "scr","jepg","png","jpg","png","gif","svg","tiff");


$dangerousExtensions2 = array("exe", "sh", "bat", "cmd", "com", "vb", "vbs", "ps1", "js", "jse", "jar", "war", "ear", "php", "asp", "aspx", "jsp", "jspx", "cfm", "pl", "py", "rb", "cgi", "dll", "so", "app", "dmg", "iso", "img", "zip", "rar", "tar", "gz", "bz2", "7z", "tgz", "tar.bz2", "tar.xz", "sql", "mdb", "accdb", "bak", "db", "ini", "conf", "env", "config", "htaccess", "htpasswd", "log", "txt", "csv", "xlsx", "doc", "docx", "pdf", "ppt", "pptx", "xls", "xml", "json", "svg", "ico", "html", "scr","mp4","avi","mov");


if (in_array(pathinfo($_FILES['archivo1']['name'], PATHINFO_EXTENSION), $dangerousExtensions1)) {
    echo "Solo soportamos archivos mp4 para tu video";
}

elseif (in_array(pathinfo($_FILES['archivo2']['name'], PATHINFO_EXTENSION), $dangerousExtensions2)) {
echo "Solo soportamos archivos de imagen para tu miniatura";


} 

else {











    if(isset($_FILES['archivo1']) && $_FILES['archivo1']['error'] == UPLOAD_ERR_OK &&
    isset($_FILES['archivo2']) && $_FILES['archivo2']['error'] == UPLOAD_ERR_OK) {

    $Video = $_FILES['archivo1']['tmp_name'];
    $DestinoVideo = "../videos/" . $_FILES['archivo1']['name']; // Ruta de destino para el archivo de video
    move_uploaded_file($Video, $DestinoVideo);

    $Miniatura = $_FILES['archivo2']['tmp_name'];
    $DestinoMiniatura = "../thumbnails/" . $_FILES['archivo2']['name']; // Ruta de destino para el archivo de miniatura
    move_uploaded_file($Miniatura, $DestinoMiniatura);

    $rr = $_FILES['archivo2']['name'];

    $rminiatura = "thumbnails/$rr";


    
        $mysqli = require __DIR__ . "../videosdb.php";
        $sql = "INSERT INTO videos (titulo, matricula, descripcion, miniatura, video, fecha, nombre_de_usuario) VALUES (?, ?, ?, ?, ?, ?, ?)";
        $stmt = $mysqli->prepare($sql);
    
        if (!$stmt) {

            die("SQL error: " . $mysqli->error);

        }
    
        $stmt->bind_param("sssssss", $title, $matricula, $description, $rminiatura, $DestinoVideo, $fecha, $ilovepoland);
    
        if (!$stmt->execute()) {
            die($mysqli->error . " " . $mysqli->errno); // Falta punto y coma al final
            echo "ocurrio un error"; // Este echo nunca se ejecutará debido al die anterior
        }
        
    
        $stmt->close();
    }
    
    
    
    else {
        echo "Error en la subida de archivos.";
    }



    require_once __DIR__ . "../videosdb.php";
    


    $sql = "SELECT vidmad FROM videos WHERE matricula = '$matricula' AND titulo = '$title'";

    // Ejecutar la consulta
    $result = $conn->query($sql);
    
    // Verificar si se encontraron resultados
    if ($result->num_rows > 0) {
        // Obtener el resultado como un array asociativo
        $row = $result->fetch_assoc();
        $vidmad = $row["vidmad"];
        echo "El valor de vidmad es: " . $vidmad;
    } else {
        echo "No se encontraron resultados para la matrícula: " . $matricula;
    }
















    

   $datos = '
   
   <?php
   require_once __DIR__ . "../../php-aouth/database.php";
   
   
   
   
   
   
   
   $matricula = "'.$matricula.'"; // se necesita agregar una matricula proporcionado por upload.php al subir video
   
   
   
   
   
   
   
   
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
   
   
   
   
   
   
   $vidmad = "'.$vidmad.'"; // se necesita proporcionar un vidmad proporcionado por upload.php a la hora de subir el video
   
   
   
   
   
   
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
   
   
   
   
   ';


   $directorio ="../watch";
   $tituloar = "$titleLimpio.$randnum1.$vidmad.$ilovepoland.php";
   $rutaArchivo = "$directorio/$tituloar";

   $SS="watch/$tituloar";

if (file_put_contents($rutaArchivo, $datos) !== false) {
    echo "El archivo se ha creado y los datos se han escrito correctamente.   ";


} 



else {
    echo "Ha ocurrido un error al intentar crear el archivo.";
}





    
    
$rutaArchivoPHP = mysqli_real_escape_string($mysqli, $SS);
$updateQuery = "UPDATE videos SET archivo_php = '$rutaArchivoPHP' WHERE vidmad = $vidmad";
$mysqli->query($updateQuery);
    
    














header("Location: ../index.php");
}
?>
