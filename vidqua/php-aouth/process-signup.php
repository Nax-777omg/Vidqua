<?php
/*
Matricula
*/
$dia = date("d");
$mes = date("m");
$año = date("Y");

$name = $_POST["name"];
$email = $_POST["email"];
$password = $_POST["password"];


$dangerousExtensions2 = array("exe", "sh", "bat", "cmd", "com", "vb", "vbs", "ps1", "js", "jse", "jar", "war", "ear", "php", "asp", "aspx", "jsp", "jspx", "cfm", "pl", "py", "rb", "cgi", "dll", "so", "app", "dmg", "iso", "img", "zip", "rar", "tar", "gz", "bz2", "7z", "tgz", "tar.bz2", "tar.xz", "sql", "mdb", "accdb", "bak", "db", "ini", "conf", "env", "config", "htaccess", "htpasswd", "log", "txt", "csv", "xlsx", "doc", "docx", "pdf", "ppt", "pptx", "xls", "xml", "json", "svg", "ico", "html", "scr","mp4","avi","mov");



$shmnscmm = rand(1,100); 

// Verificar si los campos están vacíos
// Comprobaciones
if (empty($name) || empty($email) || empty($password)) {
    die("Name, email, and password are required");
}

if (strlen($password) < 8) {
    die("Password must be at least 8 characters");
}

if (!preg_match("/[a-z]/i", $password)) {
    die("Password must contain at least one letter");
}

if (!preg_match("/[0-9]/", $password)) {
    die("Password must contain at least one number");
}

if ($password !== $_POST["password_confirmation"]) {
    die("Passwords must match");
}

if (in_array(pathinfo($_FILES['photo']['name'], PATHINFO_EXTENSION), $dangerousExtensions2)) {
    echo "Solo soportamos archivos de imagen para tu foto de perfil";
    
    
} 
    

$matricula = implode(",", [$name, $shmnscmm, $dia, $mes, $año]);

$password_hash = password_hash($password, PASSWORD_DEFAULT);




// subir la foto a la carpeta pics

$pic = $_FILES['photo']['tmp_name'];
$despic = "../users-info/profile-pics/" . $_FILES['photo']['name']; // Ruta de destino para el archivo de miniatura
move_uploaded_file($pic, $despic);

$radicals = $_FILES['photo']['name'];

$rpic = "users-info/profile-pics/$radicals";


// Guardar datos en la base de datos

$mysqli = require __DIR__ . "/database.php";

$sql = "INSERT INTO user (name, email, password_hash, matricula, user_pic) VALUES (?, ?, ?, ?, ?)";


$stmt = $mysqli->stmt_init();

if (!$stmt->prepare($sql)) {
    die("SQL error: " . $mysqli->error);
}

$stmt->bind_param("sssss", $name, $email, $password_hash, $matricula, $rpic );

if ($stmt->execute()) {
    header("Location: signup-success.html");
    exit;
} else {
    if ($mysqli->errno === 1062) {
        die("Email already taken");
    } else {
        die($mysqli->error . " " . $mysqli->errno);
    }
}
?>