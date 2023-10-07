<?php

include_once __DIR__."/../session.php";

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    echo "Metode HTTP yang tidak diizinkan";
    exit();
}

$name           = $_POST['name'];
$description    = $_POST['description'];
$threshold      = $_POST['threshold'];
$difficulty     = $_POST['difficulty'];
$group_id       = $_POST['type'];

$conn = Database::getInstance();
$sql = "INSERT INTO achievement (name, description, threshold, difficulty, group_id) VALUES ('$name', '$description', '$threshold', '$difficulty', '$group_id')";
$result = $conn->query($sql);

echo $sql;
?>