<?php

session_start();
include_once __DIR__."/../session.php";

if ($_SERVER['REQUEST_METHOD'] === 'DELETE') {
    parse_str(file_get_contents('php://input'), $_DELETE);
    $id = $_DELETE['id'];

    $file_path = "../../public/audio/";
    $conn = Database::getInstance();
    $sqllink = "SELECT link FROM collection WHERE id = $id";
    $resultlink = $conn->query($sqllink);
    $link = $resultlink->fetch_all(MYSQLI_ASSOC);
    $link = $link[0]['link'];
    if (file_exists($file_path.$link)) {
        unlink($file_path.$link);
    }
    
    $sql = "DELETE FROM collection WHERE id = $id";
    $result = $conn->query($sql);
    
    echo $sql;
} else {
    http_response_code(405);
    echo "Metode HTTP yang tidak diizinkan";
}
