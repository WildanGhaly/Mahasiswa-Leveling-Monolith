<?php

session_start();
include_once __DIR__."/../session.php";

if ($_SERVER['REQUEST_METHOD'] === 'DELETE') {
    parse_str(file_get_contents('php://input'), $_DELETE);
    $id = $_DELETE['id'];

    $conn = Database::getInstance();

    $sql = "DELETE FROM achievement WHERE id = $id";
    $result = $conn->query($sql);
    
    echo $sql;
} else {
    http_response_code(405);
    echo "Metode HTTP yang tidak diizinkan";
}