<?php

$host = "localhost";
$dbname = "videos_db";
$username = "root";
$password = "";

$conn_videos = new mysqli($host, $username, $password, $dbname);

$mysqli = new mysqli($host, $username, $password, $dbname);

if ($mysqli->connect_errno) {
    die("Connection error: " . $mysqli->connect_error);
}

return $mysqli;