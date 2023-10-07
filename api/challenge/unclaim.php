<?php

include_once __DIR__."/../session.php";

if ($_SERVER['REQUEST_METHOD'] === 'DELETE') {
    parse_str(file_get_contents('php://input'), $_DELETE);
    $user_id = $_DELETE['user_id'];
    $quest_id = $_DELETE['quest_id'];

    $conn = Database::getInstance();

    $sql = "DELETE FROM user_quest WHERE user_id = $user_id AND quest_id = $quest_id";
    $result = $conn->query($sql);
    
    echo $sql;
} else {
    http_response_code(405);
    echo "Metode HTTP yang tidak diizinkan";
}