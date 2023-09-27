<?php

// Database connection
$server = "localhost:3308"; // NOTE: ini 3308 port yang dipake Willy, defaultnya 3306
$username = "root";
$password = "";
$database = "Mahasiswa_Leveling";

$conn = new mysqli($server, $username, $password);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$query = "CREATE DATABASE IF NOT EXISTS $database";
$conn->query($query);
$conn->close();

$conn = new mysqli($server, $username, $password, $database);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$tableExists = $conn->query("SHOW TABLES LIKE 'users'");
if ($tableExists->num_rows == 0) {
    // Table doesn't exist, so create it
    $createTableSQL = "CREATE TABLE users (
        id INT PRIMARY KEY AUTO_INCREMENT,
        username TEXT NOT NULL,
        email TEXT NOT NULL,
        password TEXT NOT NULL,
        isAdmin INT DEFAULT 0
    )";
    $conn->query($createTableSQL);
}

?>