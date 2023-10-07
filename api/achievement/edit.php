<?php

session_start();
include_once __DIR__."/../session.php";

if ($_SERVER['REQUEST_METHOD'] === 'PUT') {
    parse_str(file_get_contents('php://input'), $_PUT);
    $name           = $_PUT['name'];
    $description    = $_PUT['description'];
    $threshold      = $_PUT['threshold'];
    $difficulty     = $_PUT['difficulty'];
    $group_id       = $_PUT['type'];
    $id             = $_PUT['id'];
    
    $conn = Database::getInstance();
    $sql = "UPDATE achievement SET";
    if ($name !== '') {
        $sql .= " name = '$name'";
    }
    if ($description !== '' && $name !== '') {
        $sql .= ",";
    }
    if ($description !== '') {
        $sql .= " description = '$description'";
    }
    if ($threshold !== '' && ($name !== '' || $description !== '')) {
        $sql .= ",";
    }
    if ($threshold !== '') {
        $sql .= " threshold = '$threshold'";
    }
    if ($difficulty !== '' && ($name !== '' || $description !== '' || $threshold !== '')) {
        $sql .= ",";
    }
    if ($difficulty !== '') {
        $sql .= " difficulty = '$difficulty'";
    }
    if ($group_id !== '' && ($name !== '' || $description !== '' || $threshold !== '' || $difficulty !== '')) {
        $sql .= ",";
    }
    if ($group_id !== '') {
        $sql .= " group_id = '$group_id'";
    }
    $sql .= " WHERE id = $id";
    $result = $conn->query($sql);

    echo $sql;
} else {
    http_response_code(405);
    echo "Metode HTTP yang tidak diizinkan";
}
?>
