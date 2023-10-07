<?php

include_once __DIR__."/../session.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    parse_str(file_get_contents('php://input'), $_POST);
    $user_id    = $_POST['user_id'];
    $quest_id   = $_POST['quest_id'];

    $conn = Database::getInstance();

    $sql = "INSERT INTO user_quest (user_id, quest_id) VALUES ($user_id, $quest_id)";
    $result = $conn->query($sql);

    echo $sql;

} else {
    http_response_code(405);
    echo "Metode HTTP yang tidak diizinkan";
}