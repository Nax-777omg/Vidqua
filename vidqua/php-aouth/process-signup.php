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

$shmnscmm = rand(1,100); 

// Verificar si los campos están vacíos
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

$matricula = implode(",", [$name, $shmnscmm, $dia, $mes, $año]);

$password_hash = password_hash($password, PASSWORD_DEFAULT);

$mysqli = require __DIR__ . "/database.php";

$sql = "INSERT INTO user (name, email, password_hash, matricula) VALUES (?, ?, ?, ?)";


$stmt = $mysqli->stmt_init();

if (!$stmt->prepare($sql)) {
    die("SQL error: " . $mysqli->error);
}

$stmt->bind_param("ssss", $name, $email, $password_hash, $matricula);

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
