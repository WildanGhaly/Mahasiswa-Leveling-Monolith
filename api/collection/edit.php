<?php

session_start();
include_once __DIR__."/../session.php";

if ($_SERVER['REQUEST_METHOD'] === 'PUT') {
    parse_str(file_get_contents('php://input'), $_PUT);
    $name = $_PUT['name'];
    $description = $_PUT['description'];
    $id = $_PUT['id'];
    
    $conn = Database::getInstance();
    $sql = "UPDATE collection SET";
    if ($name !== '') {
        $sql .= " name = '$name'";
    }
    if ($description !== '' && $name !== '') {
        $sql .= ",";
    }
    if ($description !== '') {
        $sql .= " description = '$description'";
    }
    $sql .= " WHERE id = $id";
    $result = $conn->query($sql);

    echo $sql;
} else {
    http_response_code(405);
    echo "Metode HTTP yang tidak diizinkan";
}
?>
